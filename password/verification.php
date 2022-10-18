<?php
session_start();
require("../config/DotEnv.php");

if(isset($_POST['username']) && isset($_POST['password']))
{

   (new DotEnv(__DIR__ . '/../.env'))->load();

   $db = mysqli_connect(getenv('DATABASE_HOST'), getenv('DATABASE_USER'), getenv('DATABASE_PASSWORD'),getenv('DATABASE_NAME'))
          or die('could not connect to database');
    
    // on applique les deux fonctions mysqli_real_escape_string et htmlspecialchars
    // pour éliminer toute attaque de type injection SQL et XSS
    $username = mysqli_real_escape_string($db,htmlspecialchars($_POST['username'])); 
    $password = mysqli_real_escape_string($db,htmlspecialchars($_POST['password']));
    if($username !== "" && $password !== "")
    {
        $requete = "SELECT droit FROM utilisateur where 
              nom_utilisateur = '".$username."' and mot_de_passe = '".$password."' ";
        $exec_requete = mysqli_query($db,$requete);
        $reponse      = mysqli_fetch_array($exec_requete);
        $count = $reponse['droit'];
        if($count!=0) // nom d'utilisateur et mot de passe correctes
        {
           $_SESSION['droit'] = $count;
           header('Location: ../touteslesfranchises.php');
        }
        else
        {
           header('Location: ../index.php'); // utilisateur ou mot de passe incorrect
        }
    }
    else
    {
       header('Location: ../index.php'); // utilisateur ou mot de passe vide
    }
   }
?>