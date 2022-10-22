<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylescriptpage/style2.css" media="screen" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>FLOWERBUSINESS</title>
</head>
<body>
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
    $franchiselists = $franchise->get($_GET["id"]);


    $boutique = new boutiquecontroller();

    $boutiquelists = $boutique->get($franchiselists->getId());
   

    $utilisateur = new utilisateurcontroller();
    $utilisateurs = $utilisateur -> getall();

    $envoyerdesemail = new envoyerdesemailscontroller();
    $emaildroit = $envoyerdesemail->get($boutiquelists->getEnvoyeremail());  
    $fleurspecial = new fleurspecialcontroller();
    $fleurs =  $fleurspecial->get($boutiquelists->getFleurspeciale());

    ?>

    <?php
    session_start();
    if ($_SESSION['droit']) {
        $user = $_SESSION['droit'];
    } else {
        echo "<script>window.location.href='index.php'</script>";
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
                <section class="d-flex flex-wrap justify-content-center">
                    <div class="card rougefleur m-4 shadow">
                        <div class="card-body">
                            <h5 class="card-title">Franchise de <?php echo $franchiselists->getVille() ?> </h5>
                            <p class="card-text"><strong>Statut : </strong><?php echo $franchiselists->getStatut() ?> </p>
                        </div>
                    </div>
                </section>
            </div>
            <section class="d-flex flex-wrap justify-content-center">
                <div class="card rougefleur m-4 shadow">
                    <div class="card-body">
                        <h4>Boutique de la Franchise <?php echo $franchiselists->getVille() ?></h4>
                        <p class="card-text"><strong>Adresse :</strong> <?php echo  $boutiquelists->getAdresseboutique(); ?>
                        </p>
                        <p class="card-text"><strong>Mail responsable : </strong> <?php echo  $boutiquelists->getMailresponsable();?>
                        </p>
                         <p class="card-text"><strong>Option Email Client : </strong> <?php echo $emaildroit->getDescription() ?></p>
                         <p class="card-text"><strong>Fleur speciale:  </strong><?php echo $fleurs->getTypededroit()?></p>
                        <p class="card-text">Comme la Franchise de <?php echo $franchiselists->getVille() ?> est actuellement <strong><?php echo $franchiselists->getStatut() ?></strong> la boutique est elle aussi <strong><?php echo $franchiselists->getStatut() ?></strong> </p>
                    </div>
                </div>
            </section>
        </div>
    </main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="stylescriptpage/script2.js"></script>
</body>

</html>