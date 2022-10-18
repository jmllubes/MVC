<?php
@session_start();
require_once "models/usuari.php";
class usuariController {

    public function hola(){
        echo "hola PAU";
    }

    public function login(){

        $usuari = new usuari();
        $usuari->setEmail($_POST["email"]);
        $usuari->setPassword($_POST["pswd"]);
        $usuari->login();
        
    }

    public function register(){
        $usuari = new usuari(); //crea instancia
        $usuari->setUsername($_POST["txt"]); //emplenar
        $usuari->setEmail($_POST["email"]);
        $usuari->setPassword($_POST["pswd"]);
        $r = $usuari->register(); //cridar metode

        if($r == 1){
            header("Location:index.php");
            echo "<script> alert('Usuari registrat correctament');</script>";
        }
        else{            
            header("Location:index.php");
            echo "<script> alert('Error al registrar usuari');</script>";
        }
    }

    public function perfil(){
        $usuari = new usuari();
        $usuari->setEmail($_SESSION["email"]);
        $r = $usuari->buscar();
        $row = $r->fetch_assoc();
        require_once "views/usuari/perfil.php";

    }

}



?>