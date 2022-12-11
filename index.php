<?php
session_start();
include_once "autoload.php";

use ProyectoVideoclub\Videoclub as V;

$vc = new V("Severo 8A");
        
$vc->incluirJuego("God of War", 19.99, "PS4", 1, 1)
->incluirJuego("The Last of Us Part II", 49.99, "PS4", 1, 1)
->incluirDvd("Torrente", 4.5, "es","16:9")
->incluirDvd("Origen", 4.5, "es,en,fr", "16:9")
->incluirDvd("El Imperio Contraataca", 3, "es,en","16:9")
->incluirCintaVideo("Los cazafantasmas", 3.5, 107)
->incluirCintaVideo("El nombre de la Rosa", 1.5, 140);       
                
$vc->incluirSocio("Amancio Ortega","aortega","aortega")
->incluirSocio("Pablo Picasso","ppicasso","ppicasso", 2);

$vc->alquilaSocioProducto(1,2)
->alquilaSocioProducto(1,3)       
->alquilaSocioProducto(1,6);

$_SESSION["data"]=$vc;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
</head>
<body>
    <form action="login.php" method="post">
        <input type="text" id="user" name="user" placeholder="Usuario">
        </br>
        <input type="text" id="pass" name="pass" placeholder="Contraseña">
        </br>
        <input type="submit">
    </form>
    <?php
    if(isset($_COOKIE["incorrectAccess"])){
        echo "<p style='color:red'>".$_COOKIE["incorrectAccess"]."</p>";
        setcookie('incorrectAccess', null, -1);
    }
    ?>
</body>
</html>
