<?php
require('dbconnect.php');
require('auth.php');
require('components/header.php');

if ($_SESSION['username']) {
    // require('components/bron_del.php');

    if ($_GET['id']) {
        $del = $_GET['id'];
        $result = $conn->query("SELECT * FROM Booking WHERE id='$del'");
        if ($row = $result->fetch()) {
            $conn->query("DELETE FROM Booking WHERE Booking.id='$del'");
            $new_url = 'bron_list.php?mes=good';
            header('Location: ' . $new_url);
        }
    }

    if ($_GET['mes']) {
        $message = 'Бронирование удалено';
        require('components/message.php');
    }


    require('components/filtr_bron.php');

    if ($_POST['guest']){
        $guest = $_POST['guest'];
        $sql = "SELECT Booking.id, Room.Room_number, Guest.Full_name, Booking.date_arrival, Booking.date_departure, Booking.number_persons FROM Booking, Guest, Room WHERE Booking.id_guest = Guest.id AND Booking.id_room = Room.id AND Guest.Full_name = '$guest' ORDER BY id DESC;";
    }
    else {
        $datea = "2023-02-08 14:00:00";
        $sql = "SELECT Booking.id, Room.Room_number, Guest.Full_name, Booking.date_arrival, Booking.date_departure, Booking.number_persons FROM Booking, Guest, Room WHERE Booking.id_guest = Guest.id AND Booking.id_room = Room.id AND date_arrival = '$datea' ORDER BY id DESC";
    }
    if ($_POST['date_arrival']){
        $datea = $_POST['date_arrival'] . " 14:00:00";
        $sql = "SELECT Booking.id, Room.Room_number, Guest.Full_name, Booking.date_arrival, Booking.date_departure, Booking.number_persons FROM Booking, Guest, Room WHERE Booking.id_guest = Guest.id AND Booking.id_room = Room.id AND date_arrival = '$datea' ORDER BY id DESC;";
    }


    if($result = $conn->query($sql))
    {
        echo '<echo><table><a><tr> <th>Бронь</th> <th>Номер</th> <th>Гость</th> <th>Дата заезда</th> <th>Дата выезда</th> <th>Гости</th><th>Действие</th></tr>';
        foreach($result as $row){

            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["Room_number"] . "</td>";
            echo "<td>" . $row["Full_name"] . "</td>";
            echo "<td>" . $row["date_arrival"] . "</td>";
            echo "<td>" . $row["date_departure"] . "</td>";
            echo "<td>" . $row["number_persons"] . "</td>";
            $level = $row["id"];
            echo "<td><form action='bron_list.php?id=$level' method='post'> <input type='submit' value='Удалить'></form></td>";

         //   <s:form action=" index?pageLevel= <%=level%> ">

            echo "</tr>";
        }
        echo "</a></table>";
    } else
    {
        echo "Ошибка: " . $conn->error;
    }
}
else {
    echo "<h6> Для работы с системой Вам необходимо авторизоваться на сайте</h6> <br><br><br>";
}

require('components/footer.php');
?>