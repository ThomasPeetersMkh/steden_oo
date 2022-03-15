<?php
require_once __DIR__ . '/lib/Model/City.php';
require_once __DIR__ . '/lib/Model/Country.php';
require_once __DIR__ . '/lib/Service/Logger.php';
require_once __DIR__ . '/lib/Model/Task.php';
require_once __DIR__ . '/lib/Model/User.php';
require_once __DIR__ . '/lib/Service/CityLoader.php';
require_once __DIR__ . '/lib/Service/CityStorage.php';
require_once __DIR__ . '/lib/Service/Container.php';
require_once __DIR__ . '/lib/html_functions.php';
require_once __DIR__ . '/lib/form_elements.php';

$configuration = array(
    'db_dsn'  => 'mysql:host=localhost;dbname=steden',
    'db_user' => 'root',
    'db_pass' => ''
);
