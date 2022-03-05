<?php
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

require_once "Bootstrap.php";
if(isset($configuration)){
    $container = new Container($configuration);
}
$cityLoader = $container->getCityloader();
$city = $cityLoader->findOneById($_GET['img_id']);

PrintHead();
PrintJumbo();
PrintNavbar();
?>

<div class="container">
    <div class="row">

        <?php

        if ( ! is_numeric( $_GET['img_id']) ) die("Ongeldig argument " . $_GET['img_id'] . " opgegeven");

        $data = $city->getDataAsArray();

        //get template
        $template = file_get_contents("templates/column_full.html");

        //merge

            $output = $template;

            foreach( array_keys($data) as $field )
            {
                $output = str_replace( "@$field@", $data["$field"], $output );
            }
            print $output;


        ?>

    </div>
</div>

</body>
</html>