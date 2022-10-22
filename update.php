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
    $utilisateurs = $utilisateur->getall();
    $franchise = new franchisecontroller();
    $franchiselists = $franchise->getall();
    $envoyerdesemails = new envoyerdesemailscontroller();
    $envoyerdesemailss = $envoyerdesemails->getall();
    $fleurspecial = new fleurspecialcontroller();
    $fleurspecials = $fleurspecial->getall();

    $boutique = new boutiquecontroller();
    $boutiqueupdate = $boutique->get($_GET["id"]);

    $x = ($boutiqueupdate -> getId());
    print_r($x);

    print_r($_POST);
    if ($_POST) {
        $x->hydrate($_POST);

        $boutique->update($x);
              print_r($boutique);


    } ?>
    
    ?>
    <main>
        <?php
        include('elementphp/navbar.php');;
        ?>
        <!-- MENU DROIT  -->
        <div class="carredroit">

            <div class="mainmenu">

            </div>
            <div class="carredroit">
                <div class="mainmenu">
                    <div class="container mt-5" style="max-width:50%;">
                        <form method="post" enctype="multipart/form-data">
                            <label for="ville" class="form-label"><h4>Modifier la boutique <?php echo $boutiqueupdate->getville() ?> </label>
                            <input type="text" name="ville" id="ville" class="form-control" placeholder="<?php echo $boutiqueupdate->getville() ?>" required>
</br>
                            <label for="adresseboutique" class="form-label">Adresse de la boutique</label>
                            <input type="text" name="adresseboutique" id="adresseboutique" class="form-control" placeholder="Ex : 12 rue Montreil" required>
                            <label for="mailresponsable" class="form-label">Email responsable</label>
                            <input type="email" name="mailresponsable" id="mailresponsable" class="form-control" placeholder="Adresse Email du responsable" required="email">
                            <h3 class="m-5 justify-content-center">OPTION DES BOUTIQUES</h3>
                            <label for="envoyeremail" class="form-label">Option Email Clients</label>
                            <select name="envoyeremail" id="envoyeremail" class="form-control">
                                <?php foreach ($envoyerdesemailss as $envoyerdesemails) : ?>
                                    <option value="<?= $envoyerdesemails->getId() ?>"><?= $envoyerdesemails->getTypededroit() ?> </option>
                                <?php endforeach ?>
                            </select>
                            <label for="fleurspeciale" class="form-label">Option fleur speciale</label>
                            <select name="fleurspeciale" id="fleurspeciale" class="form-control">
                                <?php foreach ($fleurspecials as $fleurspecial) : ?>
                                    <option value="<?= $fleurspecial->getId() ?>"><?= $fleurspecial->getTypededroit() ?> </option>
                                <?php endforeach ?>
                            </select>
                            <input type="submit" class="btn btn-success mt-5" value="Update">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>