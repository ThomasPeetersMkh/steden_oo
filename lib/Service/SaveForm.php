<?php
//Namespace used for the autoloading function
namespace Service;

//used to save the forms
class SaveForm
{
    private $DBManager;
    private $sanitize;
    private $validate;

    public function __construct(DBManager $DBManager,Sanitize $sanitize,Validate $validate)
    {
        $this->DBManager = $DBManager;
        $this->sanitize = $sanitize;
        $this->validate = $validate;
    }

    function SaveFormData()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            //controle CSRF token
            if (!key_exists("csrf", $_POST)) die("Missing CSRF");
            if (!hash_equals($_POST['csrf'], $_SESSION['lastest_csrf'])) die("Problem with CSRF");

            $_SESSION['lastest_csrf'] = "";

            //sanitization
            $_POST = $this->sanitize->StripSpaces($_POST);
            $_POST = $this->sanitize->ConvertSpecialChars($_POST);

            $table = $pkey = $update = $insert = $where = $str_keys_values = "";

            //get important metadata
            if (!key_exists("table", $_POST)) die("Missing table");
            if (!key_exists("pkey", $_POST)) die("Missing pkey");

            $table = $_POST['table'];
            $pkey = $_POST['pkey'];

            //validation
            $sending_form_uri = $_SERVER['HTTP_REFERER'];
            $this->validate->CompareWithDatabase($table, $pkey);

            //Validaties voor het registratieformulier
            if ($table == "user") {
                $this->validate->ValidateUsrPassword($_POST['usr_password']);
                $this->validate->ValidateUsrEmail($_POST['usr_email']);
                $this->validate->CheckUniqueUsrEmail($_POST['usr_email']);
            }

            //terugkeren naar afzender als er een fout is
            if (count($_SESSION['errors']) > 0) {
                $_SESSION['OLD_POST'] = $_POST;
                header("Location: " . $sending_form_uri);
                exit();
            }

            //insert or update?
            if ($_POST["$pkey"] > 0) $update = true;
            else $insert = true;

            if ($update) $sql = "UPDATE $table SET ";
            if ($insert) $sql = "INSERT INTO $table SET ";

            //make key-value string part of SQL statement
            $keys_values = [];

            foreach ($_POST as $field => $value) {
                //skip non-data fields
                if (in_array($field, ['table', 'pkey', 'afterinsert', 'afterupdate', 'csrf'])) continue;

                //handle primary key field
                if ($field == $pkey) {
                    if ($update) $where = " WHERE $pkey = $value ";
                    continue;
                }

                if ($field == "usr_password") //encrypt usr_password
                {
                    $value = password_hash($value, PASSWORD_BCRYPT);
                    $keys_values[] = " $field = '$value' ";

                    $_SESSION['msgs'][] = "Bedankt voor uw registratie";
                } else //all other data-fields
                {
                    $keys_values[] = " $field = '$value' ";
                }

            }

            $str_keys_values = implode(" , ", $keys_values);

            //extend SQL with key-values
            $sql .= $str_keys_values;

            //extend SQL with WHERE
            $sql .= $where;

            //run SQL
            $result = $this->DBManager->ExecuteSQL($sql);

            //output if not redirected
            print $sql;
            print "<br>";
            print $result->rowCount() . " records affected";

            //redirect after insert or update
            if ($insert and $_POST["afterinsert"] > "") header("Location: ../" . $_POST["afterinsert"]);
            if ($update and $_POST["afterupdate"] > "") header("Location: ../" . $_POST["afterupdate"]);
        }
    }
}