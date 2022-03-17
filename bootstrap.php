<?php

use Service\Container;

session_start();

spl_autoload_register(function($className) {
    $path = __DIR__.'/lib/'.str_replace('\\', '/', $className).'.php';
    if (file_exists($path)) {
        require $path;
    }
    // we don't support this class!
});

$configuration = array(
    'db_dsn'  => 'mysql:host=localhost;dbname=steden',
    'db_user' => 'root',
    'db_pass' => ''
);

$container = new Container($configuration);

$errors = [];

if ( key_exists( 'errors', $_SESSION ) AND is_array( $_SESSION['errors']) )
{
    $errors = $_SESSION['errors'];
    $_SESSION['errors'] = [];
}


//initialize $msgs array
$msgs = [];

if ( key_exists( 'msgs', $_SESSION ) AND is_array( $_SESSION['msgs']) )
{
    $msgs = $_SESSION['msgs'];
    $_SESSION['msgs'] = [];
}

//initialize $old_post
$old_post = [];

if ( key_exists( 'OLD_POST', $_SESSION ) AND is_array( $_SESSION['OLD_POST']) )
{
    $old_post = $_SESSION['OLD_POST'];
    $_SESSION['OLD_POST'] = [];
}
