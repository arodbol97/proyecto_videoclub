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
    <link rel="stylesheet" href="style.css">
    <title>Main</title>
</head>
<body style="text-align:center">
    <header>
        <h2>Bienvenido <?=$_SESSION["user"]?></h2>
        <div>
            <a href="index.php?cs=true"><button>Cerrar Sesión</button></a>
            <a href="formCreateCliente.php"><button>Crear cliente nuevo</button></a>
        </div>
    </header>
    <section>
        <?php
        //listo los productos
        $vc->listarProductos();
        ?>
    </section>
    <aside>
        <?php
        //listo los socios
        $vc->listarSocios();
        ?>
    </aside>
</body>
</html>