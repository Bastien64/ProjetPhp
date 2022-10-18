

<div class="menugauche">
    <div class="gestion">
        <div class="image">
            <img class="logogestion" src="image/bar-chart-steps.svg" alt="">
            <img class="logogestion" src="image/bar-chart-steps.svg" alt="">
        </div>
        <h3>GESTION</h3>
    </div>

    <?php
            if ($_SESSION['droit'] === '1') {
                include('elementphp/ifnavbar.php');
            } else {
                print_r('');
            }

            ?>

        <div>
            <?=
                $_SESSION ? '<a class="nav-link" href="disconnect.php">Se déconnecter</a>' :
                    '<a class="nav-link" href="index.php">Se connecter</a>'
            ?>
        </div>

        <!--
        <div>
            <img class="logo" src="image/3-circle.svg" alt="">
            <a href="modifierunefranchise.php">Modifier une Franchise</a>
        </div>
        -->
    </div>


</div>