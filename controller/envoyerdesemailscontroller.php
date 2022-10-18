<?php

require("./entity/envoyerdesemails.php");

class envoyerdesemailscontroller
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
        $envoyerdesemailss = [];
        $req = $this->db->query("SELECT * FROM `envoyerdesemails` ORDER BY typededroit");
        $datas = $req->fetchALL();
        foreach ($datas as $data) {
            $envoyerdesemails = new envoyerdesemails($data);
            $envoyerdesemailss[] = $envoyerdesemails;
        }
        $req->closeCursor();
        return $envoyerdesemailss;
    }

    public function get( $id) : envoyerdesemails
    {
        $req = $this->db->prepare("SELECT * FROM `envoyerdesemails` WHERE id = :id");
        $req->bindParam(":id", $id, PDO::PARAM_INT);
        $req->execute();
        $data = $req->fetch();
        $envoyerdesemails = new envoyerdesemails($data);
        return $envoyerdesemails;
    }
}