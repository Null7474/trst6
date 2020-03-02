<?php
session_start();
require_once "bootstrap.php";
if (count($_POST) > 0) {
    $_POST["datePublication"] = date("Y-m-d");
    //работа с фото

    $fileName = $_FILES['photo']['name'];
    $fileTemp = $_FILES['photo']['tmp_name'];
    $fileType = $_FILES['photo']['type'];
    $fileSize = $_FILES['photo']['size'];
    $fileError = $_FILES['photo']['error'];

    $fileExt = strtolower(end(explode('.', $fileName)));

    $_POST['id_user']=$id->id;
    $fileName = explode('.', $fileName)[0];
$fileNameLast = implode('!',[$_POST['id_user'],$fileName]);
    $extentions = ['jpg', 'jpeg', 'png'];
    if (in_array($fileExt, $extentions)) {

        if ($fileSize < 5000000) {

            if ($fileError === 0) {
                $_POST['photo'] = implode('.', [$fileNameLast, $fileExt]);
            }
        }
    } else {
        $_POST['photo'] = "default.jpg";
    }

    $id = $dataPost->insertPost($_POST);
    if ($id != null) {
        $fileDestination = "uploads/" . $_POST['photo'];
        move_uploaded_file($fileTemp, $fileDestination);
    }
   header("Location: /");
    exit;
}
require_once "views/posts/insertPost.view.php";