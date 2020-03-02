<?php
session_start();
require_once "bootstrap.php";
if (!isset($_GET['id']) || empty($_GET['id'])) {
    exit;
}

$post = $dataPost->getPostsID($_GET["id"]);

if (isset($_POST['btnDel'])) {
    if (file_exists('uploads/' . $post->photo)) {
        if ($post->photo != 'default.jpg') {
            unlink('uploads/' . $post->photo);
        }
        $dataPost->deletePost($_GET['id']);
    }
    header("Location: /");
    exit;

}

require_once "views/posts/deletePost.view.php";