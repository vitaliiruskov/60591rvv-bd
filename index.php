<?php

use Framework\Request;
use Framework\Router;
use Framework\Application;

if ( file_exists(dirname(__FILE__).'/vendor/autoload.php') ) {
    require_once dirname(__FILE__).'/vendor/autoload.php';
}

$request = new Request();
Application::init();
echo (new Router($request))->getContent();

exit();

require('dbconnect.php');

require ('auth.php');
require('components/header.php');
require ('components/message.php');
require ('components/glav.php');
require('components/footer.php');
?>
