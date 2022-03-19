<?php

require_once "bootstrap.php";

/**
 * @var $container
 */
$DBManager = $container->getDBManager();
$name = $DBManager->GetData('SELECT mus_name from musea where id='.$_GET['mus_id']);
$makeHTML = $container->getMakeHTML();
$arts = $container->getArtLoader()->getItems($_GET['mus_id']);

$makeHTML->PrintHead();
$makeHTML->PrintJumbo($title = $name[0]['mus_name'], $subtitle = "" );
$makeHTML->PrintNavbar();
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
        $data = $arts;

        //get template
        $template = file_get_contents("templates/art_column.html");

        //merge
        $output = $makeHTML->MergeMuseum( $template, $data );
        print $output;

        ?>

    </div>
</div>
</body>
</html>