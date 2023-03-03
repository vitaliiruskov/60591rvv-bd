<?php

namespace Framework;

use Dotenv\Dotenv;

class Application
{
    public static function init(){
        require "app/routes.php";
        echo "Приложение инициализировано<p>";

    }
}