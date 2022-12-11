<?php
include_once "autoload.php";

session_start();

use ProyectoVideoclub\Videoclub as V;

$vc = $_SESSION["data"];

$user = $_POST["user"];

$socios = $vc->getSocios();

for ($i=0;$i<count($socios);$i++){
    if($socios[$i]->getUser()==$user){                        
        unset($socios[$i]);
        $socios = array_values($socios);
        $i = count($socios)+1;
    }
}
$vc->setSocios($socios);
$_SESSION["data"] = $vc;
header('Location: mainAdmin.php');