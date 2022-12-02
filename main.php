<?php
session_start();
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
    <p>Bienvenido <?=$_SESSION["user"]?></p>
    <div>
        <form action="index.php" method="post">
            <input type="hidden" value="cerrarSesion">
            <input type="submit" value="Cerrar sesión">
        </form>
    </div>
</body>
</html>