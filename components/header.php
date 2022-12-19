<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Информационная система отеля "HOTEL"</title>
    <link href="style.css" rel="stylesheet">
</head>

<body>
<header class="site-header">
    <nav class="site-navigation">
        <a href="index.php">
            <img src="img/hotel_logo.png" width="auto" height= 70px alt="Логотип отеля">
        </a>
        <ul class="navigation-list">

            <?php
            if ($_SESSION['username']) {
                if ($_SESSION['admin']) {
                    echo ('<li><a href="product_add.php">Добавить продукт</a></li>');;
                }

                echo ('<li><a href="room.php">Номера</a></li>');
                echo ('<li><a href="bron_list.php">Бронирования</a></li>');
                echo ('<li><a href="guest.php">Гости</a></li>');
                echo ('<li><a href="new_bron.php">Новая бронь</a></li>');
                echo ('<li><a href="index.php?logout=1">'.$_SESSION['username'].' (Выйти) </a></li>');
            }
            else {
                echo ('<li><a href="catalog.php">Наши номера</a></li>');

                echo <<<HTML
                <form method="post" action="../index.php">
                    <input type="text" placeholder="Логин" name="login" id="id1">
                    <input type="password" placeholder="Пароль" name="password" id="id2">
                    <input type="submit" value="Войти">
                </form> 
                HTML;
            }
            ?>

        </ul>
    </nav>
</header>