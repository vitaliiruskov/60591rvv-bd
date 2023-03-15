<?php

use Dotenv\Dotenv;
use Framework\Container;

session_start(["use_strict_mode" => true]);

date_default_timezone_set('Asia/Yekaterinburg');
if ( file_exists(dirname(__FILE__).'/vendor/autoload.php') ) {
    require_once dirname(__FILE__).'/vendor/autoload.php';
}
if (file_exists(".env"))
{
    $dotenv = Dotenv::createImmutable(__DIR__);
    $dotenv->load(); //все параметры окружения помещаются в массив $_ENV
    echo "Окружение загружено<p>";
    // var_dump($_ENV);
}
else {
    echo "Ошибка загрузки ENV<br>";
}
Container::getApp()->run();


exit();


require('dbconnect.php');

require ('auth.php');
require('components/header.php');
require ('components/message.php');
require ('components/glav.php');
require('components/footer.php');
?>
