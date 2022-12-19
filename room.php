<?php

require('dbconnect.php');
require('auth.php');
require('components/header.php');

if ($_SESSION['username']) {

    $sql = "SELECT * FROM Room";

    if($result = $conn->query($sql))
    {
        echo "<table><tr> <th>id</th> <th>№ корпуса</th> <th>№ комнаты</th> <th>Количество мест</th> <th>Цена</th> </tr>";
        foreach($result as $row){
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["id_building"] . "</td>";
            echo "<td>" . $row["Room_number"] . "</td>";
            echo "<td>" . $row["Number_of_seats"] . "</td>";
            echo "<td>" . $row["Price"] . "</td>";
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
require('components/message.php');
require('components/footer.php');
?>