<?php
//Namespace used for the autoloading function
namespace Service;

//Generates a form
class MakeForm
{
    function MakeSelect( $fkey, $value, $sql,$DBManager)
    {
        $select = "<select id=$fkey name=$fkey value=$value>";
        $select .= "<option value='0'></option>";

        $data =  $DBManager->GetData($sql);

        foreach ( $data as $row )
        {
            if ( $row[0] == $value ) $selected = " selected ";
            else $selected = "";

            $select .= "<option $selected value=" . $row[0] . ">" . $row[1] . "</option>";
        }

        $select .= "</select>";

        return $select;
    }
}