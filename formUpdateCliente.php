<?php
include_once "autoload.php";

session_start();

use ProyectoVideoclub\Videoclub as V;

$vc = $_SESSION["data"];
$clientUser = $_GET["user"];
$from = $_GET["from"];

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
    <link rel="stylesheet" href="style.css">
    <title>Actualizar cliente</title>
</head>
<body>
    <form action="updateCliente.php" method="post">
        <input type="hidden" id="previousUser" name="previousUser" value="<?=$clientUser?>">
        <input type="hidden" id="from" name="from" value="<?=$from?>">
        <input type="text" id="user" name="user" class="form_elem" value="<?=$client->getUser()?>" required>
        <input type="password" id="pass" name="pass" class="form_elem" value="<?=$client->getPass()?>" required>
        <input type="text" id="name" name="name" class="form_elem" value="<?=$client->nombre?>" required>
        <input type="text" id="max" name="max" class="form_elem" placeholder="Cupo de alquileres (opcional)">
        <input type="submit" class="form_elem" id="submit">
    </form>
    <?php
    if(isset($_COOKIE["incorrectClient"])){
        echo "<p style='color:red'>".$_COOKIE["incorrectClient"]."</p>";
        setcookie('incorrectClient', null, -1);
    }
    ?>
</body>
</html>