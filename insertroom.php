<?php
require "dbconnect.php";


if (strlen($_POST['id_building'])){
    //получение загруженного файла
    if ($file = fopen($_FILES['filename']['tmp_name'], 'r+')){
        //получение расширения
        $ext = explode('.', $_FILES["filename"]["name"]);
        $ext = $ext[count($ext) - 1];
        $filename = 'file' . rand(100000, 999999) . '.' . $ext;
echo $filename;
        $resource = Container::getFileUploader()->store($file, $filename);
        $picture_url = $resource['ObjectURL'];
    }

    try {
        $sql = 'INSERT INTO Room(id_building, Room_number, Number_of_seats, Price, img_url) VALUES(:id_building,:Room_number,:Number_of_seats,:Price, :picture_url)';
        $stmt = $conn->prepare($sql);
           $stmt->bindValue(':id_building', $_POST['id_building']);
           $stmt->bindValue(':Room_number', $_POST['Room_number']);
           $stmt->bindValue(':Number_of_seats', $_POST['Number_of_seats']);
           $stmt->bindValue(':Price', $_POST['Price']);
           $stmt->bindValue(':picture_url', $picture_url);

        $stmt->execute();
        $_SESSION['msg'] = "Номер успешно создан";
      //  return generated id
        // $id = $pdo->lastInsertId('id');

    } catch (PDOexception $error) {
        $_SESSION['msg'] = "Ошибка создания номера: " . $error->getMessage();
    }
}


// перенаправление на страницу категорий
header('Location: http://ish/room.php');
exit( );