<?php
require("./entity/franchise.php");

class franchisecontroller
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

    public function create(franchise $franchise)
    {
        $req = $this->db->prepare("INSERT INTO `franchise` ( ville, statut, utilisateur) VALUE ( :ville, :statut, :utilisateur)");
        $req->bindValue(":ville", $franchise->getVille(), PDO::PARAM_STR);
        $req->bindValue(":statut", $franchise->getStatut(), PDO::PARAM_STR);
        $req->bindValue(":utilisateur", $franchise->getUtilisateur(), PDO::PARAM_INT);
        $req->execute();
    }

    public function getAll() : array
    {
        $franchises = [];
        $req = $this->db->query("SELECT * FROM `franchise` ORDER BY ville");
        $datas = $req->fetchALL();
        foreach ($datas as $data) {
            $franchise = new franchise($data);
            $franchises[] = $franchise;
        }
        $req->closeCursor();
        return $franchises;
    }

    public function get(int $id)
    {
        $req = $this->db->prepare("SELECT * FROM `franchise` WHERE id = :id");
        $req->bindParam(":id", $id, PDO::PARAM_INT);
        $req->execute();
        $data = $req->fetch();
        $franchise = new franchise($data);
        return $franchise;
    }

    public function delete (int $id) : void
    {
        $req = $this->db->prepare ("DELETE FROM `franchise` WHERE id= :id");
        $req->bindParam("id", $id ,PDO::PARAM_INT);
        $req->execute();
     }
}
