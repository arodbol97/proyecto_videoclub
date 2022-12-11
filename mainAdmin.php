<?php
include_once "autoload.php";
session_start();

use ProyectoVideoclub\Videoclub as V;

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
        <form action="formCreateCliente.php" method="post">            
            <input type="submit" value="Crear nuevo cliente">
        </form>
    </div>
    <div>
        <?php        
        //listo los socios
        $vc->listarSocios();
        //listo los productos
        $vc->listarProductos();
        ?>
    </div>
</body>
</html>