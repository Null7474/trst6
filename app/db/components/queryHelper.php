<?php
namespace helper\db\components;

class queryHelper
{
    public $pdo;

    function __construct()
    {
        $config = require_once __DIR__ . "/../config.php";
        $this->pdo=connection::make($config);
    }

    function getOne($table, $id)
    {
    $sql = "select * from $table where id=:id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute(["id" => $id]);
    return $stmt->fetch();
    }

    public function getAll($table, $order="")
    {
        $sql="Select * from $table ORDER BY :order";
        $stmt=$this->pdo->prepare($sql);
        $stmt->execute(
            [
                "order"=>$order
            ]
        );
        $res=$stmt->fetchAll();
        return $res;
    }

    public function getRow($table,$id,$search="id")
    {
        $sql=prepare("SELECT * FROM $table WHERE $search=:x");
        $stmt=$this->pdo->prepare($sql);
        if ($stmt->execute(["x" => $id])) {
            return $stmt->fetch();
        };
        return null;
    }

    public function store($table,$data)
    {
        $f=array_keys($data);
        $fields=implode(',', $f);
        $values=":".implode(',:',$f);
        $sql="insert into $table($fields)values($values)";
        $stmt=$this->pdo->prepare($sql);
        $stmt->execute($data);
        return $this->pdo->lastInsertId();
    }

    public function updateRow($table,$data)
    {
        $fields="";
        foreach($data as $key=>$v){
            if($key!="id")
            {
                $fields.= $key."=:".key.=",";
            }
            $fields=rtrim($fields,',');
        }
        $sql="Update $table set $fields where id=:id";
        $stmt=$this->pdo->prepare($sql);
        $stmt->execute($data);
    }

    public function delete($table,$id)
    {
        $sql="delete from $table where id=:id";
        $stmt=$this->pdo->prepare($sql);

        return $stmt->execute(["id"=>$id]);
    }




}