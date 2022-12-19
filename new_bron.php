<?php
require('dbconnect.php');
require('auth.php');
require('components/header.php');

if ($_SESSION['username']){
    if ($_POST['date_arrival1']){

        $date1 = $_POST['date_arrival1'] . " 14:00:00";
        $date2 = $_POST['date_departure'] . " 12:00:00";

        $result = $conn->query("INSERT INTO Booking(id_room, id_guest, date_arrival, date_departure, number_persons)
             VALUES ('".$_POST['id_room']."','".$_POST['id_guest']."','".$date1."','".$date2."','".$_POST['number_persons']."')");
        $message = 'БРОНИРОВАНИЕ СОЗДАНО';
    }
    require('components/bron_add.php');
}
else{
    $_SESSION['message'] = 'Для создания бронирования войдите в систему';
    header("Location: login.php");
    die();
}
require ('components/message.php');
require('components/footer.php');




