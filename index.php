<link rel = "stylesheet" href="style.css">

<table>
    <tr>
        <th>id</th>
        <th>№ корпуса</th>
        <th>№ комнаты</th>
        <th>Количество мест</th>
        <th>Цена</th>
    </tr>

<?php
require('dbconnect.php');

$result = $conn->query('SELECT * FROM `Room`');

for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
$result = '';
foreach ($data as $elem){
    $result .='<tr> ';
    $result .= '<th> ' .$elem['id'] . ' </th>';
    $result .= '<th> ' .$elem['id_building'] . ' </th>';
    $result .= '<th> ' .$elem['Room_number'] . ' </th>';
    $result .= '<th> ' .$elem['Number_of_seats'] . ' </th>';
    $result .= '<th> ' .$elem['Price'] . ' </th>';
    $result .=' </tr>';
}
echo $result;
?>
</table>

