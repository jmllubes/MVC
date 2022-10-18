<?php 
session_start();
if(!isset($_SESSION["email"])){ //comprova la variable session
    header("Location: views/usuari/login.php"); //canvia de pagina
}

include "views/header.php"; ?>
<div class="row">
  <div class="side">
  
  </div>
  <div class="main">
    <?php
    require_once "autoload.php";
    if(isset($_GET["controller"])){
        $controller = $_GET["controller"] . "Controller"; //usuariController
        if(class_exists($controller)){
            $controller = new $controller();
            if(isset($_GET["action"])){
                $action=$_GET["action"];
                if(method_exists($controller,$action)){
                    $controller->$action();
                }
                else{
                    echo "No existeix el metode";
                }
            }
        }
        else{
            echo "No existeix el controlador";
        }
    }


?>
  </div>
</div>


<?php include "views/footer.php"; ?>