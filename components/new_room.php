<h2>Создание номера</h2>
<form method="post" action="insertroom.php" enctype="multipart/form-data">
    <p><label>
            Номер корпуса: <input type="text" name="id_building" list="id_b">
        </label>
    <p><label>
            Номер номера: <input type="text" name="Room_number">
        </label>
    <p><label>
            Количество мест: <input type="text" name="Number_of_seats">
        </label>
    <p><label>
            Цена: <input type="text" name="Price">
        </label>
    <p><label>
            Изображение: <input type="file" name="filename">
        </label>
    <p><input type="submit" value="Создать">

        <?php
        $sql = "SELECT * FROM Building";
        echo ' <datalist id="id_b">';
        if($result = $conn->query($sql))
        {
            foreach($result as $row)
                echo "<option value='" . $row["id"] . "'>" . $row["Name_of_building"] . "</option>";
            echo "</select>";
        } else echo "Ошибка: " . $conn->error;
        '</datalist>';
        ?>

</form>