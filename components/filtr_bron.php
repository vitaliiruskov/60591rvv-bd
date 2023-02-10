<section class="form">
    <div class="container">
        <form method="post" action="bron_list.php" enctype="multipart/form-data">
            <label for="id1">Дата заезда:</label>
            <input type="date" name="date_arrival" id="id1">

            <label for="id2">ФИО:</label>
            <input type="text" name="guest" list="guest"/>
            <input type="submit" value="ФИЛЬТР">

            <?php
            $sql = "SELECT * FROM Guest";
            echo ' <datalist id="guest">';
            if($result = $conn->query($sql))
            {
                foreach($result as $row)
                    echo "<option value='" . $row["Full_name"] . "'>" . $row["id"] . "</option>";
                echo "</select>";
            } else echo "Ошибка: " . $conn->error;
            '</datalist>';
            ?>
        </form>
    </div>
</section>
