<?php
require('dbconnect.php');
require('auth.php');
require('components/header.php');

    if ($_SESSION['username']){

        if ($_POST['date_arrival1']) {

            $date1 = $_POST['date_arrival1'] . " 14:00:00";
            $date2 = $_POST['date_departure'] . " 12:00:00";

            $seat = $_POST['number_persons'];
            $id_room = $_POST['id_room'];
            $sql = "with zn as (SELECT id_room FROM (SELECT id_room FROM Booking WHERE (date_arrival <= '$date1' AND date_departure >= '$date1') OR (date_arrival <= '$date2' AND date_departure >= '$date1')) zanroom) SELECT id, Room_number FROM Room LEFT JOIN zn ON Room.id = zn.id_room WHERE zn.id_room IS NULL AND Number_of_seats = '$seat' AND id = '$id_room'";
            $result = $conn->query($sql);
            foreach ($result as $row)
                $pr = $row["id"];

            if (is_numeric($pr)){

                if (is_numeric($_POST['id_guest'])){

                    $result = $conn->query("INSERT INTO Booking(id_room, id_guest, date_arrival, date_departure, number_persons)
             VALUES ('".$_POST['id_room']."','".$_POST['id_guest']."','".$date1."','".$date2."','".$_POST['number_persons']."')");

                    $message = 'БРОНИРОВАНИЕ СОЗДАНО';
                }
                else {
                    $result = $conn->query("INSERT INTO Guest(Full_name)
             VALUES ('".$_POST['id_guest']."')");

                    $sql = "SELECT MAX(id) FROM Guest";
                    $result = $conn->query($sql);
                    foreach($result as $row)
                        $id_guest = $row["MAX(id)"];

                    $result = $conn->query("INSERT INTO Booking(id_room, id_guest, date_arrival, date_departure, number_persons)
             VALUES ('".$_POST['id_room']."','".$id_guest."','".$date1."','".$date2."','".$_POST['number_persons']."')");

                    $message = 'БРОНИРОВАНИЕ СОЗДАНО';
                    //            $sql = "INSERT INTO `Guest` (`id`, `Full_name`) VALUES (NULL, \'Тестовое имя отчество\');";
                }

            }
            else {
                $message = 'Ошибка создания бронирования. Данный номер уже занят';
            }
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
