<?php
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

require_once "Bootstrap.php";

if(isset($configuration)){
    $container = new Container($configuration);
}
$cityLoader = $container->getCityloader();
$cities = $cityLoader->getCities();

//var_dump($cities);die;

PrintHead();
PrintJumbo( $title = "OOP Steden" ,
                        $subtitle = "Tips voor citytrips voor vrolijke vakantiegangers!" );
PrintNavbar();
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
    $output = MergeViewWithData( $template, $data );
    print $output;
?>

    </div>
</div>

</body>
</html>