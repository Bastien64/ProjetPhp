<!DOCTYPE html>
<html lang="fr-FR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <link rel="stylesheet" href="stylescriptpage/style.css" media="screen" type="text/css" />

    <title>FLOWERBUSINESS</title>
</head>

<body>
    <html>

    <!-- OVERLAY
    =============================== -->
    <div class="overlay first"></div>
    <div class="overlay second"></div>
    <div class="overlay third"></div>

    <div id="container">
        <!-- zone de connexion    
             =============================== -->
        <form action="password/verification.php" method="POST">
            <h1>Connexion</h1>

            <label><b>Nom d'utilisateur</b></label>
            <input type="text" placeholder="Entrer le nom d'utilisateur" name="username" required>

            <label><b>Mot de passe</b></label>
            <input type="password" placeholder="Entrer le mot de passe" name="password" required>

            <input type="submit" id='submit' value='LOGIN'>

            <a href="touteslesfranchises.php" class="btn btn-danger ">Visiteur</a>
        </form>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.2.6/gsap.min.js"></script>

    <script src="stylescriptpage/script.js"></script>
</body>

</html>