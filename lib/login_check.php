<?php

use Service\Container;

error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

$public_access = true;
require_once "../bootstrap.php";
if(isset($configuration)){
    $container = new Container($configuration);
}
$loginChecker = $container->getLoginChecker();

$user = $loginChecker->LoginCheck();

if ( $user )
{
    $_SESSION['user'] = $user;
    $_SESSION['msgs'][] = "Welkom, " . $_SESSION['user']['usr_voornaam'];
    header("Location: ../steden.php");
}
else
{
    unset( $_SESSION['user'] );
    GoToNoAccess();
}

