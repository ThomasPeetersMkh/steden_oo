<?php

use Service\Container;

error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

$public_access = true;
require_once "bootstrap.php";

$old_post = $_SESSION["OLD_POST"];

if(isset($configuration)){
    $container = new Container($configuration);
}
$makeHTML = $container->getMakeHTML();
$security = $container->getSecurity();

$makeHTML->PrintHead();
$makeHTML->PrintJumbo( $title = "Registreer", $subtitle = "" );
?>

<div class="container">
    <div class="row">

        <?php
            //get data
            if ( count($old_post) > 0 )
            {
                $data = [ 0 => [
                                             "usr_voornaam" => $old_post['usr_voornaam'],
                                             "usr_naam" => $old_post['usr_naam'],
                                             "usr_email" => $old_post['usr_email'],
                                             "usr_password" => $old_post['usr_password']
                                           ]
                              ];
            }
            else $data = [ 0 => [ "usr_voornaam" => "", "usr_naam" => "", "usr_email" => "", "usr_password" => "" ]];

            //get template
            $output = file_get_contents("templates/register.html");

            //add extra elements
            $extra_elements['csrf_token'] = $security->GenerateCSRF( "register.php"  );

            //merge
            $output = $makeHTML->MergeViewWithData( $output, $data );
            $output = $makeHTML->MergeViewWithExtraElements( $output, $extra_elements );
            $output = $makeHTML->MergeViewWithErrors( $output, $errors );
            $output = $makeHTML->RemoveEmptyErrorTags( $output, $data );

            print $output;
        ?>

    </div>
</div>

</body>
</html>