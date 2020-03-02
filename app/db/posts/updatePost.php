<?php
session_start();
require_once "bootstrap.php";
if(!isset($_GET['id'])||empty($_GET['id'])){
exit;

}
$post=$dataPost->getPostsID($_GET['id']);


if(count($_POST)>0){
    if (file_exists('uploads/' . $post->photo)) {
        if ($post->photo != 'default.jpg') {
            unlink('uploads/' . $post->photo);
        }
    }
        $fileName = $_FILES['photo']['name'];
        $fileTemp = $_FILES['photo']['tmp_name'];
        $fileType = $_FILES['photo']['type'];
        $fileSize = $_FILES['photo']['size'];
        $fileError = $_FILES['photo']['error'];

        $fileExt = strtolower(end(explode('.', $fileName)));


        $fileName = explode('.', $fileName)[0];

        $extentions = ['jpg', 'jpeg', 'png'];
        if (in_array($fileExt, $extentions)) {

            if ($fileSize < 5000000) {

                if ($fileError === 0) {
                    $_POST['photo'] = implode('.', [$fileName, $fileExt]);
                }
            }
        } else {
            $_POST['photo'] = "default.jpg";
        }
    $_POST["id"]=$_GET['id'];
    $id=$dataPost->updatePost($_POST);
        if ($id != null) {
            $fileDestination = "uploads/" . $_POST['photo'];
            move_uploaded_file($fileTemp, $fileDestination);
        }



    header("Location: /");
    exit;

}

require_once "views/posts/updatePost.view.php";