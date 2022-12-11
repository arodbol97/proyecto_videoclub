<?php
include_once "autoload.php";

session_start();

use ProyectoVideoclub\Videoclub as V;

$vc = $_SESSION["data"];
$clientUser = $_POST["user"];
$from = $_POST["from"];

foreach ($vc->getSocios() as $socio) {
    if($socio->getUser()==$clientUser){
        $client = $socio;
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar cliente</title>
</head>
<body>
    <form action="updateCliente.php" method="post">
        <input type="hidden" id="previousUser" name="previousUser" value="<?=$clientUser?>">
        <input type="hidden" id="from" name="from" value="<?=$from?>">
        <input type="text" id="user" name="user" value="<?=$client->getUser()?>" required>
        </br>
        <input type="text" id="pass" name="pass" value="<?=$client->getPass()?>" required>
        </br>
        <input type="text" id="name" name="name" value="<?=$client->nombre?>" required>
        </br>
        <input type="text" id="max" name="max" placeholder="Cupo de alquileres (opcional)">
        </br>
        <input type="submit">
    </form>
    <?php
    if(isset($_COOKIE["incorrectClient"])){
        echo "<p style='color:red'>".$_COOKIE["incorrectClient"]."</p>";
        setcookie('incorrectClient', null, -1);
    }
    ?>
</body>
</html>