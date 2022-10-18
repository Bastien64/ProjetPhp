<?php

require("./entity/fleurspecial.php");

class fleurspecialcontroller
{
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


    public function getAll()
    {
        $fleurspecials = [];
        $req = $this->db->query("SELECT * FROM `fleurspecial` ORDER BY typededroit");
        $datas = $req->fetchALL();
        foreach ($datas as $data) {
            $fleurspecial = new  fleurspecial($data);
            $fleurspecials[] = $fleurspecial;
        }
        $req->closeCursor();
        return $fleurspecials;
    }


    public function get(int $id) : fleurspecial
    {
        $req = $this->db->prepare("SELECT * FROM `fleurspecial` WHERE id = :id");
        $req->bindParam(":id", $id, PDO::PARAM_INT);
        $req->execute();
        $data = $req->fetch();
        $fleurspecial = new fleurspecial($data);
        return $fleurspecial;
    }
}