<?php
require_once "bootstrap.php";
session_start();
$posts=$dataPost->getAllPosts();
$_SESSION["msg"] =$_SESSION["msg"]?? "Заполните все поля анкеты...";
$_SESSION["alert"] =$_SESSION["alert"]??  "alert-warning";
require_once "views/posts/index.view.php";
