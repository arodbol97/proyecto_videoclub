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
    <div>
        <?php
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
                        
        $vc->incluirSocio("Amancio Ortega")
        ->incluirSocio("Pablo Picasso", 2);
        
        $vc->alquilaSocioProducto(1,2)
        ->alquilaSocioProducto(1,3)
               
        ->alquilaSocioProducto(1,6);
        
        //listo los socios
        $vc->listarSocios();
        //listo los productos
        $vc->listarProductos();
        ?>
    </div>
</body>
</html>