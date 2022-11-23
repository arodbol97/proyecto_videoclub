<?php

/*--320--*/

include "Soporte.php";

$soporte1 = new Soporte("Tenet", 22, 3);
echo "<strong>" . $soporte1->titulo . "</strong>";
echo "<br>Precio: " . $soporte1->getPrecio() . " euros";
echo "<br>Precio IVA incluido: " . $soporte1->getPrecioConIVA() . " euros<br>";
$soporte1->muestraResumen();

/*--321--*/

include "CintaVideo.php";

$miCinta = new CintaVideo("Los cazafantasmas", 23, 3.5, 107);
echo "<br><strong>" . $miCinta->titulo . "</strong>";
echo "<br>Precio: " . $miCinta->getPrecio() . " euros";
echo "<br>Precio IVA incluido: " . $miCinta->getPrecioConIva() . " euros";
$miCinta->muestraResumen();

/*--322--*/

include "Dvd.php";

$miDvd = new Dvd("Origen", 24, 15, "es,en,fr", "16:9");
echo "<br><br><strong>" . $miDvd->titulo . "</strong>";
echo "<br>Precio: " . $miDvd->getPrecio() . " euros";
echo "<br>Precio IVA incluido: " . $miDvd->getPrecioConIva() . " euros";
$miDvd->muestraResumen();

/*--323--*/

include "Juego.php";

$miJuego = new Juego("The Last of Us Part II", 26, 49.99, "PS4", 1, 1);
echo "<br><br><strong>" . $miJuego->titulo . "</strong>";
echo "<br>Precio: " . $miJuego->getPrecio() . " euros";
echo "<br>Precio IVA incluido: " . $miJuego->getPrecioConIva() . " euros";
$miJuego->muestraResumen();

/*--324--*/

include "Cliente.php";

$soportes = array($miCinta,$miJuego);
$cliente = new Cliente("Antonio",7);
echo "<br>";
$cliente->muestraResumen();

/*--325--*/

echo "<br>";
$cliente->alquilar($miDvd);
if(!$cliente->tieneAlquilado($miDvd)){
    $cliente->alquilar($miDvd);
}

/*--326--*/

echo "<br>";
$cliente->listaAlquileres();
echo "<br>";
if($cliente->devolver(24)){
    echo "<br>";
    $cliente->listaAlquileres();
}