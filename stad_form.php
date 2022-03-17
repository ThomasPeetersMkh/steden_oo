<?php

use Service\Container;

error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

require_once "bootstrap.php";

if(isset($configuration)){
    $container = new Container($configuration);
}
$DBManager = $container->getDBManager();
$makeHTML = $container->getMakeHTML();
$makeForm = $container->getMakeForm();
$security = $container->getSecurity();

$makeHTML->PrintHead();
$makeHTML->PrintJumbo( $title = "Bewerk afbeelding", $subtitle = "" );
$makeHTML->PrintNavbar();
?>

<div class="container">
    <div class="row">

        <?php
            if ( ! is_numeric( $_GET['img_id']) ) die("Ongeldig argument " . $_GET['img_id'] . " opgegeven");

            //get data
            $data = $DBManager->GetData( "select * from image where img_id=" . $_GET['img_id'] );
            $row = $data[0]; //there's only 1 row in data

            //add extra elements
            $extra_elements['csrf_token'] = $security->GenerateCSRF( "stad_form.php"  );
            $extra_elements['select_land'] = $makeForm->MakeSelect( $fkey = 'img_lan_id',
                                                                                            $value = $row['img_lan_id'] ,
                                                                                            $sql = "select lan_id, lan_land from land", $DBManager );


            //get template
            $output = file_get_contents("templates/stad_form.html");

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