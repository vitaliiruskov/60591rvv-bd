<?php
require('dbconnect.php');
require('auth.php');
require('components/header.php');

    if ($_SESSION['username']) {
        require('components/bron_del.php');
        if ($_POST['brdel']){
            $del = $_POST['brdel'];
            $result = $conn->query("SELECT * FROM Booking WHERE id='$del'");
            if ($row = $result->fetch()){
                $conn->query("DELETE FROM Booking WHERE Booking.id='$del'");
                $message = 'Бронирование удалено';}
            else $message = 'Бронирование не найдено';
        require('components/message.php');
        }

        $sql = "SELECT Booking.id, Booking.id_room, Guest.Full_name, Booking.date_arrival, Booking.date_departure, Booking.number_persons FROM Booking, Guest WHERE Booking.id_guest = Guest.id ORDER BY id DESC ";

        if($result = $conn->query($sql))
        {
            echo "<table><a><tr> <th>Бронь</th> <th>Номер</th> <th>№ гостя</th> <th>Дата заезда</th> <th>Дата выезда</th> <th>Гости</th></tr>";
            foreach($result as $row){
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["id_room"] . "</td>";
                echo "<td>" . $row["Full_name"] . "</td>";
                echo "<td>" . $row["date_arrival"] . "</td>";
                echo "<td>" . $row["date_departure"] . "</td>";
                echo "<td>" . $row["number_persons"] . "</td>";
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
