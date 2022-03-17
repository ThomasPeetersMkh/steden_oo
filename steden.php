<?php

use Service\Container;

error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

require_once "bootstrap.php";

if(isset($configuration)){
    $container = new Container($configuration);
}
$cityLoader = $container->getCityloader();
$cities = $cityLoader->getCities();
$makeHTML = $container->getMakeHTML();

//var_dump($cities);die;

$makeHTML->PrintHead();
$makeHTML->PrintJumbo($title = "OOP Steden" ,
                        $subtitle = "Tips voor citytrips voor vrolijke vakantiegangers!" );
$makeHTML->PrintNavbar();
//PrintMessages();
?>

<div class="container">
    <div class="row">

<?php
    //toon messages als er zijn
//    foreach ( $msgs as $msg )
//    {
//        print '<div class="msgs">' . $msg . '</div>';
//    }

    //get data
    $data = $cities;

    //get template
    $template = file_get_contents("templates/column.html");

    //merge
    $output = $makeHTML->MergeViewWithDataObjects( $template, $data );
    print $output;
?>

    </div>
</div>

</body>
</html>