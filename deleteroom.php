<?php
require "dbconnect.php";



if ($_GET['id']) {
    $del = $_GET['id'];

    try {
        $sql = "SELECT * FROM Room WHERE Room.id=".$_GET['id'];
        $result = $conn->query($sql);
        foreach($result as $row)
            $url = $row['img_url'];


        try {
            $resource = Container::getFileUploader()->delete($url);
            echo "Пытаемся удалить";
        } catch (S3Exception $e) {
            $_SESSION['msg'] = $e->getMessage();
        }

        $result = $conn->query("SELECT * FROM Room WHERE id=".$_GET['id']);
        if ($result->rowCount() == 0) throw new PDOException('Номер не найден', 1111 );
        $sql = 'DELETE FROM Room WHERE id=:id';
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':id', $_GET['id']);
        $stmt->execute();
        $_SESSION['msg'] = "Номер удален";
        // return generated id
        // $id = $pdo->lastInsertId('id');


    } catch (PDOexception $error) {
        $_SESSION['msg'] = "Ошибка удаления категории: " . $error->getMessage();
    }
    // перенаправление на главную страницу приложения
    header('Location: http://ish/room.php');
    exit( );


}
