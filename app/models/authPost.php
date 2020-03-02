<?php
require_once "bootstrap.php";
$msg="";
$_SESSION["msg"] = "Заполните поля";
$_SESSION["alert"] = "alert-warning";
session_start();

$_SESSION["login"] = trim(filter_var($_POST["login"] ?? "", FILTER_SANITIZE_STRING));
$_SESSION["pass"] = trim(filter_var($_POST["pass"] ?? "", FILTER_SANITIZE_STRING));


$_SESSION["auth"] = true;

$error = [];
if (isset($_POST['goAuth'])) {
    $res=$dataUser->getUser($_POST);


    if (!$_SESSION["auth"]) {
        header("Location:index.php");
    } else {
        $id = $dataUser->authUser($_POST);
        $_SESSION["msg"] = "Вы успешно авторизировались под Логином :  ".$_SESSION["login"];
        $_SESSION["alert"] = "alert-success";
        header("Location: /");
        exit;
    }



}
require_once "views/posts/authPost.view.php";