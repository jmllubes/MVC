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

    public function mostrar(){

        $usuari = new usuari();
        $r= $usuari->mostrar(); //faci la consulta a la bdç
        $rows = $r->fetch_all(MYSQLI_ASSOC);
        require_once("views/usuari/mostrar.php");
        
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

    public function actualitzar(){
        $usuari = new usuari();
        $usuari->setUsername($_POST["username"]); //emplenar
        $usuari->setPassword($_POST["password"]);
        $usuari->setEmail($_SESSION["email"]);        
        $nom = round(microtime(true) * 1000) . $_FILES['foto']['name']; //guardo nom foto temps+nom
        copy($_FILES['foto']['tmp_name'], "views/usuari/img/".$nom); // moc la foto a la carpeta
        $usuari->setFoto($nom);
        $usuari->setData($_POST["data"]);
        $usuari->actualitzar();
        header("Location:index.php?controller=usuari&action=perfil");

    }
    public function logout(){
        session_destroy();
        header("Location:index.php");
    }

}



?>