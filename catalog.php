<?php
require('rooms_db.php');
require('dbconnect.php');
$limit = 3;
$page = intval($_GET['page']) ?: 1;
$offset = ($page - 1) * $limit;
//Запрос для получения количества записей в таблице
$result = $conn->query("SELECT count(*) AS C FROM Room");
$row = $result->fetch();
$products_quantity = $row['C'];
//Запрос для получения записей из таблицы
$result = $conn->query("SELECT * FROM Room LIMIT ".$limit." OFFSET ".$offset);

$pages = $products_quantity / $limit;
$pages_total = ceil($pages);


require ('auth.php');
require('components/header.php');
require('components/room_list.php');
require('components/footer.php');
