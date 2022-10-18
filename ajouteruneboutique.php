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
    $boutique = new boutiquecontroller();
    $boutiquelists = $boutique->getall();
    $utilisateur = new utilisateurcontroller();
    $utilisateurs = $utilisateur->getall();
    $franchise = new franchisecontroller();
    $franchiselists = $franchise->getall();
    $envoyerdesemails = new envoyerdesemailscontroller();
    $envoyerdesemailss = $envoyerdesemails->getall();
    $fleurspecial = new fleurspecialcontroller();
    $fleurspecials = $fleurspecial->getall();
    $email = new envoyerdesemailscontroller();
    $fleur = new fleurspecialcontroller();
    $franch = new franchisecontroller();
    if ($_POST) {
        $ville = $_POST["ville"];
        $adresseboutique = $_POST["adresseboutique"];
        $mailresponsable = $_POST["mailresponsable"];
        $envoyeremail = $_POST["envoyeremail"];
        $fleurspeciale = $_POST["fleurspeciale"];
        $newboutique = new boutique([
            "ville" => $ville,
            "adresseboutique" => $adresseboutique,
            "mailresponsable" => $mailresponsable,
            "envoyeremail" => $envoyeremail,
            "fleurspeciale" => $fleurspeciale,
        ]);
        $boutique->create($newboutique);
        $to      = $mailresponsable;
        $subject = 'Sujet';
        $message = 'Bonjour,
        Vous avez votre boutique sur FLOWERBUSINESS. Vous pouvez comme visiteur, voir vos droits de boutique.
        Ne pas répondre à  cet email : message automatique.';
        $headers = 'From: webmaster@flowerbusiness.com' . "\r\n";
        mail($to, $subject, $message, $headers);
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
            include('../elementphp/searchbar.php');
            ?>
            <?php if ($_POST) {
                echo " le formulaire a ete soumis";
            } ?>
            <div class="mainmenu">
                <div class="container mt-5" style="max-width:50%;">
                    <h3>AJOUTER UNE BOUTIQUE </h3>
                    <form method="post" enctype="multipart/form-data">

                        <label for="ville" class="form-label">Ville</label>
                        <select name="ville" id="ville" class="form-control">
                            <?php foreach ($franchiselists as $franchiselist) : ?>
                                <option value="<?= $franchiselist->getId() ?>"><?= $franchiselist->getVille() ?> </option>
                            <?php endforeach ?>
                        </select>
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
                        <input type="submit" class="btn btn-success mt-5" value="Creer">
                    </form>
                </div>
            </div>
            <section class="d-flex flex-wrap justify-content-center">
                <?php foreach ($boutiquelists as $boutiquelist) :
                    $fleurs =  $fleur->get($boutiquelist->getFleurspeciale());
                    $emaildroit = $email->get($boutiquelist->getEnvoyeremail());
                    $franchville = $franch->get($boutiquelist->getVille());
                ?>
                    <div class="card rougefleur m-4 shadow">
                        <div class="card-body">
                            <h5 class="card-title">ROUGE FLEUR </h5>
                            <p class="card-text"><strong>Ville : </strong> <?php echo $franchville->getVille() ?></p>
                            <p class="card-text"><strong>Adresse : </strong> <?php echo $boutiquelist->getadresseboutique() ?></p>
                            <p class="card-text"><strong>Email responsable : </strong><?php echo $boutiquelist->getMailresponsable() ?></p>
                            <p class="card-text"><strong>Fleur speciale: </strong><?php echo $fleurs->getTypededroit() ?></p>
                            <p class="card-text"><strong>Option Email Client : </strong> <?php echo $emaildroit->getDescription() ?></p>
                        </div>
                    </div>
                <?php endforeach ?>
            </section>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="stylescriptpage/script2.js"></script>
</body>

</html>