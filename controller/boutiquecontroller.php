<?php

require("./entity/boutique.php");

class boutiquecontroller
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

    
    public function create(boutique $boutique)
    {
        $req = $this->db->prepare("INSERT INTO `boutique` ( ville, adresseboutique, mailresponsable, envoyeremail, fleurspeciale) VALUE ( :ville, :adresseboutique, :mailresponsable, :envoyeremail, :fleurspeciale)");
        $req->bindValue(":ville", $boutique->getVille(), PDO::PARAM_STR);
        $req->bindValue(":adresseboutique", $boutique->getAdresseboutique(), PDO::PARAM_STR);
        $req->bindValue(":mailresponsable", $boutique->getMailresponsable(), PDO::PARAM_STR);
        $req->bindValue(":envoyeremail", $boutique->getEnvoyeremail(), PDO::PARAM_STR);
        $req->bindValue(":fleurspeciale", $boutique->getFleurspeciale(), PDO::PARAM_STR);
        $req->execute();
    }

    public function update(boutique $boutique)
    {
        $req = $this->db->prepare("UPDATE `boutique` ( ville, adresseboutique, mailresponsable, envoyeremail, fleurspeciale) VALUE ( :ville, :adresseboutique, :mailresponsable, :envoyeremail, :fleurspeciale)");
        $req->bindValue(":ville", $boutique->getVille(), PDO::PARAM_STR);
        $req->bindValue(":adresseboutique", $boutique->getAdresseboutique(), PDO::PARAM_STR);
        $req->bindValue(":mailresponsable", $boutique->getMailresponsable(), PDO::PARAM_STR);
        $req->bindValue(":envoyeremail", $boutique->getEnvoyeremail(), PDO::PARAM_STR);
        $req->bindValue(":fleurspeciale", $boutique->getFleurspeciale(), PDO::PARAM_STR);
        $req->execute();
    }


    public function getAll()
    {
        $boutiques = [];
        $req = $this->db->query("SELECT * FROM `boutique` ORDER BY ville");
        $datas = $req->fetchALL();
        foreach ($datas as $data) {
            $boutique = new boutique($data);
            $boutiques[] = $boutique;
        }
        $req->closeCursor();
        return $boutiques;
    }

    public function get( $ville): boutique
    {
        $req = $this->db->prepare("SELECT * FROM `boutique` WHERE ville = :ville");
        $req->bindParam(":ville", $ville, PDO::PARAM_INT);
        $req->execute();
        $data = $req->fetch();
        $boutique = new boutique($data);
        return $boutique;
    }

    public function getid( $id): boutique
    {
        $req = $this->db->prepare("SELECT * FROM `boutique` WHERE id = :id");
        $req->bindParam(":id", $id, PDO::PARAM_INT);
        $req->execute();
        $data = $req->fetch();
        $boutique = new boutique($data);
        return $boutique;
    }


 public function delete (int $id) {
    $req = $this->db->prepare ("DELETE FROM `boutique` WHERE id= :id");
    $req->bindValue("id", $id ());
    $req->execute();
 }
}
