<?php

require("./entity/utilisateur.php");

class utilisateurcontroller {
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

    public function create(utilisateur $utilisateur)
    {
        $req = $this->db->prepare("INSERT INTO `utilisateur` ( nom_utilisateur, mot_de_passe, histoire, droit, email) VALUE ( :nom_utilisateur, :mot_de_passe, :histoire, :droit, :email)");
        $req->bindValue(":nom_utilisateur", $utilisateur->getNom_utilisateur(), PDO::PARAM_STR);
        $req->bindValue(":mot_de_passe", $utilisateur->getMot_de_passe(), PDO::PARAM_STR);
        $req->bindValue(":histoire", $utilisateur->getHistoire(), PDO::PARAM_STR);
        $req->bindValue(":droit", $utilisateur->getDroit(), PDO::PARAM_INT);
        $req->bindValue(":email", $utilisateur->getEmail(), PDO::PARAM_INT);
        $req->execute();
    }

    public function getAll() : array
    {
        $utilisateurs = [];
        $req = $this->db->query("SELECT * FROM `utilisateur` ORDER BY nom_utilisateur");
        $datas = $req->fetchALL();
        foreach ($datas as $data) {
            $utilisateur = new utilisateur($data);
            $utilisateurs[] = $utilisateur;
        }
        $req->closeCursor();
        return $utilisateurs;
    }

    public function get(int $id)
    {
        $req = $this->db->prepare("SELECT * FROM `utilisateur` WHERE id = :id");
        $req->bindParam(":id", $id, PDO::PARAM_INT);
        $req->execute();
        $data = $req->fetch();
        $utilisateur = new utilisateur($data);
        return $utilisateur;
    }

    public function delete (int $id) : void
    {
        $req = $this->db->prepare ("DELETE FROM `utilisateur` WHERE id= :id");
        $req->bindParam("id", $id ,PDO::PARAM_INT);
        $req->execute();
     }
}