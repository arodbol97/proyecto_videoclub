<?php
session_start();

$vc = $_SESSION["data"];
        
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main</title>
</head>
<body style="text-align:center">
    <h2>Bienvenido <?=$_SESSION["user"]?></h2>
    <div>
        <form action="index.php" method="post">
            <input type="hidden" value="cerrarSesion">
            <input type="submit" value="Cerrar sesión">
        </form>
    </div>
    <div>
        <h3>Soportes alquilados</h3>
        <?php        
            for($i=0;$i<count($soportesAlquilados);$i++){
                echo "<br>";
                $soportesAlquilados[$i]->muestraResumen();
                echo "<br>";
            }
        ?>
    </div>
</body>
</html>