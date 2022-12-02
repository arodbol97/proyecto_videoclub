<?php
session_start();
$correctUser = array("admin","usuario");
$correctPass = array("admin","usuario");
$correct = false;

for($i=0;$i<count($correctUser);$i++){
    if($_POST["user"]==$correctUser[$i]){
        if($_POST["pass"]==$correctPass[$i]){
            $correct = true;
            $_SESSION["user"]=$_POST["user"];
            if($_POST["user"]=="admin"){
                header('Location: mainAdmin.php');
            }else{
                header('Location: main.php');
            }
        }
    }
}

if(!$correct){
    setcookie("incorrectAccess","Usuario o contraseña incorrectos");
    header('Location: index.php');
}