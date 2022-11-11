<?php
@session_start();
require_once "models/producte.php";
class producteController {

    public function hola(){
        echo "hola PAU";
    }

    public function login(){

        $producte = new producte();
        $producte->setEmail($_POST["email"]);
        $producte->setPassword($_POST["pswd"]);
        $producte->login();
        
    }

    public function mostrar(){

        $producte = new producte();
        $r= $producte->mostrar(); //faci la consulta a la bdç
        $rows = $r->fetch_all(MYSQLI_ASSOC);
        require_once("views/producte/mostrar.php");
        
    }


    public function register(){
        $producte = new producte(); //crea instancia
        $producte->setUsername($_POST["txt"]); //emplenar
        $producte->setEmail($_POST["email"]);
        $producte->setPassword($_POST["pswd"]);
        $r = $producte->register(); //cridar metode

        if($r == 1){
            header("Location:index.php");
            echo "<script> alert('producte registrat correctament');</script>";
        }
        else{            
            header("Location:index.php");
            echo "<script> alert('Error al registrar producte');</script>";
        }
    }

    public function perfil(){
        $producte = new producte();
        $producte->setEmail($_SESSION["email"]);
        $r = $producte->buscar();
        $row = $r->fetch_assoc();
        require_once "views/producte/perfil.php";

    }

    public function actualitzar(){
        $producte = new producte();
        $producte->setUsername($_POST["username"]); //emplenar
        $producte->setPassword($_POST["password"]);
        $producte->setEmail($_SESSION["email"]);        
        $nom = round(microtime(true) * 1000) . $_FILES['foto']['name']; //guardo nom foto temps+nom
        copy($_FILES['foto']['tmp_name'], "views/producte/img/".$nom); // moc la foto a la carpeta
        $producte->setFoto($nom);
        $producte->setData($_POST["data"]);
        $producte->actualitzar();
        header("Location:index.php?controller=producte&action=perfil");

    }
    public function logout(){
        session_destroy();
        header("Location:index.php");
    }

}



?>