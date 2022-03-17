<?php

error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

$public_access =  true;

require_once "bootstrap.php";
/**
 * @var $container
 */
$DBManager = $container->getDBManager();
$makeHTML = $container->getMakeHTML();
$security = $container->getSecurity();

$makeHTML->PrintHead();
$makeHTML->PrintJumbo( $title = "Login", $subtitle = "" );
?>

<div class="container">
    <div class="row">

        <?php
            //get data
            $data = [ 0 => [ "usr_email" => "", "usr_password" => "" ]];

            //get template
            $output = file_get_contents("templates/login.html");

            //add extra elements
            $extra_elements['csrf_token'] = $security->GenerateCSRF( "login.php"  );

            //merge
            $output = $makeHTML->MergeViewWithData( $output, $data );
            $output = $makeHTML->MergeViewWithExtraElements( $output, $extra_elements );

            print $output;
        ?>

    </div>
</div>

</body>
</html>