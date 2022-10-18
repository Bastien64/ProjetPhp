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
    $franchise = new franchisecontroller();
    $franchises = $franchise ->getall();
    $util = new utilisateurcontroller();
    $utils = $util ->getall();
    if ($_POST) {
        $ville = $_POST["ville"];
        $statut = $_POST["statut"];
        $utilisateur = $_POST["utilisateur"];
        echo " la Franchise a ete soumis";   

        $newfranchise = new franchise([
            "ville" => $ville,
            "statut" => $statut,
            "utilisateur" => $utilisateur,
        ]);
        $franchise->create($newfranchise);
    } 
    ?>
    <!-- tester si l'utilisateur est connecté -->
    <main>
        <?php
        include('elementphp/navbar.php');
        ?>
                <div id="barre1">
            <?php
            if ($_SESSION['droit'] === '1') {
                include('elementphp/barreacceuiladduser.php');
            } else {
                include('');
            }
            ?>
                </div>
        <!-- MENU DROIT  -->
        <div class="carredroit">
            <?php
            include('elementphp/searchbar.php');
            ?>
            <div class="mainmenu">
                <div class="container mt-5" style="max-width:50%;">
                    <h3>AJOUTER UNE FRANCHISE </h3>
                    <form method="post" enctype="multipart/form-data">

                        <label for="utilisateur" class="form-label">utilisateur Gerance</label>
                        <select name="utilisateur" id="utilisateur" class="form-control" placeholder="Utilisateur" required>
                        <?php foreach ($utils as $util) : ?>
                                <option value="<?= $util->getId() ?>"><?= $util->getNom_Utilisateur() ?> </option>
                            <?php endforeach ?>
                        </select>
                        <label for="ville" class="form-label">Ville</label>
                        <input type="text" name="ville" id="ville" class="form-control" placeholder="Ex : Lyon" required>
                        <label for="statut" class="form-label">Statut</label>
                        <select name="statut" id="statut" class="form-control" required>
                        <option value="Close">Ferme</option>
                        <option value="Open">Ouvert</option>
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