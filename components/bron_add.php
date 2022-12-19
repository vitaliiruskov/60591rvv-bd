<section class="form">
    <div class="container">
        <h1 class="catalog-title">Создание бронирования</h1>
        <form method="post" action="..\new_broninf.php" enctype="multipart/form-data">
            <p>
                <label for="id1">Дата заезда:</label>
                <input type="date" name="date_arrival" id="id1">
            </p>
            <p>
                <label for="id2">Дата выезда:</label>
                <input type="date" name="date_departure" id="id2">
            </p>

            <p>
                <label for="id3">Количество персон:</label>
                <select name="number_persons" id="id3">
                    <option value="1">1</option>
                    <option value="2">2</option>
                </select>
            </p>

            <p><input type="submit" value="Проверить наличие номеров"></p>
        </form>
    </div>
</section>