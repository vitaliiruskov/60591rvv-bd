<?php

namespace App\Controllers;

class homeController extends \Framework\Controller
{
    public function rooms($value=null){
        return $this->view('rooms.php', ['value' => $value]);
    }
}