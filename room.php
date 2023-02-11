<?php

require('dbconnect.php');
require('auth.php');
require('components/header.php');

require('components/message.php');

if ($_SESSION['username']) {

    require('components/new_room.php');

    $sql = "SELECT * FROM Room";

    if($result = $conn->query($sql))
    {
        echo "<table><tr> <th>id</th> <th>№ корпуса</th> <th>№ комнаты</th> <th>Количество мест</th> <th>Цена</th> <th>Действие</th></tr>";
        foreach($result as $row){
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["id_building"] . "</td>";
            echo "<td>" . $row["Room_number"] . "</td>";
            echo "<td>" . $row["Number_of_seats"] . "</td>";
            echo "<td>" . $row["Price"] . "</td>";
            $level = $row["id"];
            echo "<td><form action='deleteroom.php?id=$level' method='post'> <input type='submit' value='Удалить'></form></td>";
            echo "</tr>";
        }
        echo "</table>";
    } else
    {
        echo "Ошибка: " . $conn->error;
    }
}
else {
    $message = 'Для работы с системой Вам необходимо авторизоваться на сайте';
}

require('components/footer.php');
?>