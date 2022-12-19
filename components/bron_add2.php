<section class="form">
    <div class="container">
        <h1 class="catalog-title">Создание бронирования</h1>
        <form method="post" action="..\new_bron.php" enctype="multipart/form-data">

            <?php
                echo "<label for='id1'>Дата заезда:</label>";
                echo '<input readonly type="date" name="date_arrival1" id="id1" value="'.$date1.'">';
                ?>

            <?php
            echo "<label for='id2'>Дата выезда:</label>";
            echo '<input readonly type="date" name="date_departure" id="id2" value="'.$date2.'">';
            ?>

            <?php
            echo "<label for='id3'>Количество персон:</label>";
            echo '<input readonly name="number_persons" id="id3" value="'.$_POST['number_persons'].'">';
            ?>

            <?php
            $datea = $date1 . " 14:00:01";
            $dated = $date2 . " 14:00:01";
            $seat = $_POST['number_persons'];

            $sql = "with zn as (SELECT id_room FROM (SELECT id_room FROM Booking WHERE (date_arrival <= '$datea' AND date_departure >= '$datea') OR (date_arrival <= '$dated' AND date_departure >= '$datea')) zanroom) SELECT id, Room_number FROM Room LEFT JOIN zn ON Room.id = zn.id_room WHERE zn.id_room IS NULL AND Number_of_seats = '$seat'";
            echo "<label for='id4'>Номер:</label>";
            echo "<select name='id_room' id='id4'>";
            if($result = $conn->query($sql))
            {
                foreach($result as $row)
                    echo "<option value='" . $row["id"] . "'>" . $row["Room_number"] . "</option>";
                echo "</select>";
            } else echo "Ошибка: " . $conn->error;
            ?>

            <?php
            $sql = "SELECT * FROM Guest";
            echo "<label for='id5'>ФИО:</label>";
            echo "<select name='id_guest' id='id5'>";
            if($result = $conn->query($sql))
            {
                foreach($result as $row)
                    echo "<option value='" . $row["id"] . "'>" . $row["Full_name"] . "</option>";
                echo "</select>";
            } else echo "Ошибка: " . $conn->error;
            ?>
            <p><input type="submit" value="Создать бронирование"></p>
        </form>
    </div>
</section>