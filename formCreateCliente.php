<?php
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear cliente</title>
</head>
<body>
    <form action="createCliente.php" method="post">
        <input type="text" id="user" name="user" placeholder="Usuario" required>
        </br>
        <input type="text" id="pass" name="pass" placeholder="Contraseña" required>
        </br>
        <input type="text" id="name" name="name" placeholder="Nombre" required>
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