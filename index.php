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
    if(isset($_POST["cerrarSesion"])){
        session_start();
        session_destroy();
    }
    ?>
</body>
</html>
