<?php
include_once "autoload.php";

session_start();

use ProyectoVideoclub\Videoclub as V;

$vc = $_SESSION["data"];
$user = $_POST["user"];
$pass = $_POST["pass"];
$name = $_POST["name"];

$repeat = false;
foreach ($vc->getSocios() as $socio) {
    if($socio->getUser()==$user){
        $repeat = true;
    }
}

if(!$repeat){
    if(isset($_POST["max"])){
        $max = $_POST["max"];
        $vc->incluirSocio($name,$user,$pass,$max);
    }else{
        $vc->incluirSocio($name,$user,$pass);
    }
    $_SESSION["data"] = $vc;
    header('Location: mainAdmin.php');
}else{
    setcookie("incorrectClient","Cliente incorrecto");
    header('Location: formCreateCliente.php');
}