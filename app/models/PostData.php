<?php

namespace helper\models;
use helper\db\components\queryHelper;

class PostData
{
    protected $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAllPosts()
    {
       $posts = $this->pdo->getAll("posts","datePublication");
       require_once __DIR__."/../views/posts/index.view.php";
    }

    public function insertPost($data)
    {
        $stmt = $this->pdo->prepare("INSERT INTO posts (title,description,datePublication,photo,id_user)
        values (:title,:description,:datePublication,:photo,:id_user)");
        if ($stmt->execute([
            "title" => $data["title"],
            "description" => $data["description"],
            "datePublication" => $data["datePublication"],
            "photo"=>$data["photo"],
            "id_user"=>$data["id_user"]])) {
            return $this->pdo->lastInsertId();
        };
        return -1;
    }

    public function deletePost($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM posts WHERE id=:id");
        if ($stmt->execute(["id" => $id])) {
            return 1;
        };
        return -1;
    }

    public function getPostsID($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM posts WHERE id=:id");
        if ($stmt->execute(["id" => $id])) {
            return $stmt->fetch();
        };
        return null;
    }

    public function updatePost($data)
    {
        $stmt = $this->pdo->prepare("UPDATE posts set title=:title, 
description=:description, photo=:photo WHERE id=:id ");
        if ($stmt->execute([
            "id"=>$data["id"],
            "title" => $data["title"],
            "description" => $data["description"],
            "photo"=>$data["photo"]

        ])) {
            return 1;
        };
        return -1;
    }


}