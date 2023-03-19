<?php
namespace App\Controllers;

use App\Models\RoomModel;
use Framework\Container;
use Framework\Controller;
use Framework\Request;

class RoomController extends Controller
{
    public function index(Request $request){
        return $this->view('room.php', ['user' =>  $request->getUser(), 'message' => $request->getSession()['msg'], 'rooms' => RoomModel::all()]);
    }
}