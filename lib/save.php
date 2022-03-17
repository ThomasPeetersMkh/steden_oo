<?php

use Service\Container;

error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

$public_access = true;
require_once "../bootstrap.php";

if(isset($configuration)){
    $container = new Container($configuration);
}
$DBManager = $container->getDBManager();
$container->getSaveForm()->SaveFormData();

