<?php
require('dbconnect.php');
require('auth.php');
require('components/header.php');

if ($_SESSION['username']) {
    require('components/guest_del.php');

    if ($_POST['guestdel']){
        $guestdel = $_POST['guestdel'];
        $result = $conn->query("SELECT * FROM Guest WHERE id='$guestdel'");
        if ($row = $result->fetch()){
            // $conn->query("DELETE FROM Guest WHERE Guest.id='$guestdel'");
            try {
                $sql = "DELETE FROM Guest WHERE Guest.id='$guestdel'";
                $stmt = $conn->prepare($sql);
                $stmt->bindValue(":userid", $_POST["guestdel"]);
                $stmt->execute();
            }
            catch (PDOException $e) {
                $message = 'Гость не удален, т.к. есть связанные с ним бронирования';
            }
           // $message = 'Гость удален';
        }
        else $message = 'Гость не найден';
        require('components/message.php');
    }

    $sql = "SELECT * FROM Guest";
    if($result = $conn->query($sql))
    {
        echo "<table><a><tr> <th>Код гостя</th> <th>ФИО гостя</th></tr>";
        foreach($result as $row){
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["Full_name"] . "</td>";
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
