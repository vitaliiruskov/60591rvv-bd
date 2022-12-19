<?php
//require('products_db.php');
require('dbconnect.php');
require ('auth.php');
require('components/header.php');

$id = $_GET['id'];;

$result = $conn->query("SELECT * FROM Room WHERE id=".$id);
$row = $result->fetch();
$Room_number = $row['Room_number'];
$img_url = $row['img_url'];
$Price = $row['Price'];

require('components/room_info.php');
require('components/footer.php');