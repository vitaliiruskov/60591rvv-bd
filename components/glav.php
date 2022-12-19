<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Информационная система отеля "HOTEL"</title>
    <link href="style.css" rel="stylesheet">
</head>

<body>
<header class="glav">

    ИНФОРМАЦИОННАЯ СИСТЕМА ОТЕЛЯ <p>

    <?php
    if ($_SESSION['username']) {
        if ($_SESSION['admin']) {
        }
    }
    else {
        echo "<h6> Для работы с системой Вам необходимо авторизоваться на сайте</h6> <br><br><br>";
    }
    ?>
</header>