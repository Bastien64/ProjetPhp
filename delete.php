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

var_dump($franchise);
$franchise->delete($_GET["id"]);
echo "<script>window.location.href='touteslesfranchises.php'</script>";