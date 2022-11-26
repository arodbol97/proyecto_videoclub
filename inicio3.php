<?php

include_once "autoload.php";

use ProyectoVideoclub\Videoclub as V;

$vc = new V("Severo 8A");

//voy a incluir unos cuantos soportes de prueba
$vc->incluirJuego("God of War", 19.99, "PS4", 1, 1)
->incluirJuego("The Last of Us Part II", 49.99, "PS4", 1, 1)
->incluirDvd("Torrente", 4.5, "es","16:9")
->incluirDvd("Origen", 4.5, "es,en,fr", "16:9")
->incluirDvd("El Imperio Contraataca", 3, "es,en","16:9")
->incluirCintaVideo("Los cazafantasmas", 3.5, 107)
->incluirCintaVideo("El nombre de la Rosa", 1.5, 140);

//listo los productos
$vc->listarProductos();

//voy a crear algunos socios
$vc->incluirSocio("Amancio Ortega")
->incluirSocio("Pablo Picasso", 2);

$vc->alquilaSocioProducto(1,2)
->alquilaSocioProducto(1,3)
//alquilo otra vez el soporte 2 al socio 1.
// no debe dejarme porque ya lo tiene alquilado
->alquilaSocioProducto(1,2)
//alquilo el soporte 6 al socio 1.
//no se puede porque el socio 1 tiene 2 alquileres como máximo
->alquilaSocioProducto(1,6);

//listo los socios
$vc->listarSocios();

/*--336--*/
//alquilo soportes 0 y 1 al socio 0
$arrayProds=array(0,1);
$vc->alquilarSocioProductos(0,$arrayProds);
//intento alquilar soportes 0 y 4 pero 0 ya está alquilado
$arrayProds2=array(0,4);
try{
    $vc->alquilarSocioProductos(1,$arrayProds2);
}catch(Exception $e){
    echo "<strong>".$e."</strong>";
}