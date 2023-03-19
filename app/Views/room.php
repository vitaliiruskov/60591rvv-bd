<?php require 'app/views/header.php'?>


    <h1 style="margin: 6% 1px 1% 10px">Список номеров</h1>

        <table class="table table-hover" style="width: 70%; margin: auto; text-align: center">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">№ здания</th>
                <th scope="col">Номер комнаты</th>
                <th scope="col">Количество мест</th>
                <th scope="col">Цена</th>
                <th scope="col">Действие</th>
            </tr>
            </thead>
            <tbody>

            <?php
            foreach($data['rooms'] as $Room){
            echo "<tr>";
                echo "<th scope='row' class='align-middle'>" . $Room->id . "</th>";
                echo "<td class='align-middle'>" . $Room->id_building . "</td>";
                echo "<td class='align-middle'>" . $Room->Room_number . "</td>";
                echo "<td class='align-middle'>" . $Room->Number_of_seats . "</td>";
                echo "<td class='align-middle'>" . $Room->Price . "</td>";

            if ($data['user']) {
                echo "<td><a href='deleteroom.php' class='btn btn-danger'> Удалить</a></td>";
                echo "</tr>";
            }
            else{
                echo "<td><a href='deleteroom.php' class='btn btn-danger'> Открыть</a></td>";
                echo "</tr>";
            }

            }
            ?>
            </tbody>
        </table>


<?php require 'app/views/footer.php'?>




