<?php
include_once "autoload.php";

session_start();

use ProyectoVideoclub\Videoclub as V;

$vc = $_SESSION["data"];
$previousUser = $_POST["previousUser"];
$from = $_POST["from"];
$user = $_POST["user"];
$pass = $_POST["pass"];
$name = $_POST["name"];
$socios = $vc->getSocios();

$repeat = false;
foreach ($vc->getSocios() as $socio) {
    if($socio->getUser()==$user && $user!=$previousUser){
        $repeat = true;
    }
}

if(!$repeat){
    foreach ($socios as $socio) {
        if($socio->getUser()==$previousUser){
            $socio->nombre = $name;
            $socio->setUser($user);
            $socio->setPass($pass);
            if(isset($_POST["max"])){
                $max = $_POST["max"];
                $socio->setMaxAlquilerConcurrente($max);
            }            
        }
    }
    $vc->setSocios($socios);
    $_SESSION["data"] = $vc;
    if($from=="mainCliente.php"){
        $_SESSION["user"] = $user;
    }
    header('Location: '.$from);
}else{
    setcookie("incorrectClient","Cliente incorrecto");
    header('Location: formUpdateCliente.php');
}