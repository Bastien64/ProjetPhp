<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <div id="content">
        <link rel="stylesheet" href="stylescriptpage/style2.css" media="screen" type="text/css" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    </div>
    <title>FLOWERBUSINESS</title>
</head>
<body>
    <?php
    session_start();
    if ($_SESSION['droit']) {
        $user = $_SESSION['droit'];
    } else {
        echo "<script>window.location.href='index.php'</script>";
    }
    ?>
    <?php
    function loadClass(string $class)
    {
        if ($class === "DotEnv") {
            require_once "config/$class.php";
        } else if (str_contains($class, "controller")) {
            require_once "controller/$class.php";
        } else {
            require_once "entity/$class.php";
        }
    }
    spl_autoload_register("loadcLass");
    $utilisateur = new utilisateurcontroller();
    $typededroit = new typededroitcontroller();
    $typededroits = $typededroit->getAll();
    if ($_POST) {
        if ($_POST["mot_de_passe"] === $_POST["confirmmot_de_passe"]) {

            $nom_utilisateur = $_POST["nom_utilisateur"];
            $mot_de_passe = password_hash($_POST["mot_de_passe"], PASSWORD_DEFAULT, ['cost' => 12]);
            $histoire = $_POST["histoire"];
            $droit = $_POST["droit"];
            $email = $_POST["email"];
            echo " ";
        } else {
            echo "<p>Le mot passe ne correspond pas.</p>";
        }
        $newutilisateur = new utilisateur([
            "nom_utilisateur" => $nom_utilisateur,
            "mot_de_passe" => $mot_de_passe,
            "histoire" => $histoire,
            "droit" => $droit,
            "email" => $email,
        ]);
        $utilisateur->create($newutilisateur);
        $to      = $email;
        $subject = 'Sujet';
        $message = 'Bonjour,
        Voici vos identifiants pour vous connecter au site FLOWERBUSINESS Mot de passe : ' . $mot_de_passe . '
        Ne pas répondre à  cet droit : message automatique.';
        $headers = 'From: webmaster@flowerbusiness.com' . "\r\n";
        mail($to, $subject, $message, $headers);
    }
    ?>
    <main>
        <?php
        include('elementphp/navbar.php');
        ?>
        <!-- MENU DROIT  -->
        <div class="carredroit">
            <?php
            include('elementphp/searchbar.php');
            ?>
            <div class="mainmenu">
                <div class="container mt-5" style="max-width:50%;">
                    <h3>AJOUTER UN UTILISATEUR </h3>
                    <form method="post" enctype="multipart/form-data">

                        <label for="nom_utilisateur" class="form-label">Nom d'utilisateur</label>
                        <input type="text" name="nom_utilisateur" id="nom_utilisateur" class="form-control" placeholder="Nom d'utilisateur" required>

                        <label for="mot_de_passe" class="form-label">Password Gerance</label>
                        <input type="password" name="mot_de_passe" id="mot_de_passe" class="form-control" placeholder="Votre mot de passe" minlength="8" required>

                        <label for="confirmmot_de_passe">Confirmer le mot de passe</label>
                        <input type="password" class="form-control" name="confirmmot_de_passe" id="confirmmot_de_passe" placeholder="Confirmez votre mot de passe" required>

                        <label for="histoire" class="form-label">Description</label>
                        <input type="text" name="histoire" id="histoire" class="form-control" placeholder="Description" required>

                        <label for="droit" class="form-label">Droit</label>
                        <select name="droit" id="droit" class="form-control" placeholder="Droit" required>
                            <?php foreach ($typededroits as $typededroit) : ?>
                                <option value="<?= $typededroit->getId() ?>"><?= $typededroit->getType() ?> </option>
                            <?php endforeach ?>
                        </select>
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="droitGerance@flowerbusiness.com" required>
                        </select>
                        <input type="submit" class="btn btn-success mt-3" value="Creer">
                    </form>
                </div>
            </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="stylescriptpage/script2.js"></script>
</body>

</html>