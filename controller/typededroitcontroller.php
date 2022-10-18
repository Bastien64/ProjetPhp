<?php

require("./entity/typededroit.php");

class typededroitcontroller {
    private $db;
    
    public function __construct()
    {
        try {
            (new DotEnv(__DIR__ . '/../.env'))->load();
            $this->db = new PDO(getenv('DATABASE_DNS'), getenv('DATABASE_USER'), getenv('DATABASE_PASSWORD'));
        } catch (PDOException $exception) {
            echo $exception->getMessage();
        }
    }

    public function create(typededroit $typededroit)
    {
        $req = $this->db->prepare("INSERT INTO `typededroit` ( type, description ) VALUE ( :type, :description)");
        $req->bindValue(":type", $typededroit->getType(), PDO::PARAM_STR);
        $req->bindValue(":description", $typededroit->getDescription(), PDO::PARAM_STR);

        $req->execute();
    }

    public function getAll() : array
    {
        $typededroits = [];
        $req = $this->db->query("SELECT * FROM `typededroit` ORDER BY type");
        $datas = $req->fetchALL();
        foreach ($datas as $data) {
            $typededroit = new typededroit($data);
            $typededroits[] = $typededroit;
        }
        $req->closeCursor();
        return $typededroits;
    }

    public function get(int $id)
    {
        $req = $this->db->prepare("SELECT * FROM `typededroit` WHERE id = :id");
        $req->bindParam(":id", $id, PDO::PARAM_INT);
        $req->execute();
        $data = $req->fetch();
        $typededroit = new typededroit($data);
        return $typededroit;
    }

    public function delete (int $id) : void
    {
        $req = $this->db->prepare ("DELETE FROM `typededroit` WHERE id= :id");
        $req->bindParam("id", $id ,PDO::PARAM_INT);
        $req->execute();
     }
}