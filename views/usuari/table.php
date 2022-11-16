<?php 
@session_start();

$mysql = new mysqli("localhost", "root", "", "login");
        if ($mysql->connect_error) {
            die('Problemas con la conexion a la base de datos');
        }
        $sql = "SELECT `username`, `password`, `email`, `foto`, `data_naixement`, `rol` 
            FROM `usuari` WHERE";
        if(isset($_GET["rol"])){ // views/usuari/table.php?rol=" + str -> quan seleccionem el filtre rol
            $_SESSION["filtrerol"]=$_GET["rol"];
        } 
        if(isset($_GET["rol"]) and $_GET["rol"] ==""){
            unset($_SESSION["filtrerol"]);
        }
        if(isset($_GET["foto"])){ //views/usuari/table.php?foto=" + str -> quan seleccionem el filtre foto
            $_SESSION["filtrefoto"]=$_GET["foto"];
        }
        if(isset($_GET["foto"]) and $_GET["foto"] ==""){
            unset($_SESSION["filtrefoto"]);
        }
        if(isset($_SESSION["filtrerol"])){ // comprovo que s'ha aplicat algun cop el filtre de rol i concateno
            $sql = $sql . " rol = '" . $_SESSION["filtrerol"] . "' AND ";
        }
        if(isset($_SESSION["filtrefoto"])){ // comprovo que s'ha aplicat algun cop el filtre de foto i
            $sql = $sql . " foto = '" . $_SESSION["filtrefoto"] . "' AND ";
        } 
        $sql = $sql . " 1 ";
        echo $sql;
        $r = $mysql->query($sql);
        
        
?>
<!-- <table class="table">
    <tr>
    <th>username</th>
    <th>email</th>
    <th>data naixement</th>
    <th>rol</th>
    <th>foto</th>
    
    </tr> -->
    <?php 
/*     while($row = $r->fetch_assoc()){
     echo "<tr>";
     echo "<td>".$row['username']."</td>";
     echo "<td>".$row['email']."</td>";
     echo "<td>".$row['data_naixement']."</td>";
     echo "<td>".$row['rol']."</td>";
     echo "<td><img src='views/usuari/img/" .$row['foto']."'  width=\"50\" height=\"60\"></td>";
     echo "</tr>";
 }
 echo "</table>"; 
 $mysql->close(); */
?> 
<div class="row">
<?php while($row = $r->fetch_assoc()){?>
<div class="card col-md-6 col-lg-4 col-xl-3">
  <img class="card-img-top" src="views/usuari/img/<?php echo $row['foto'];?>" alt="Card image cap">
  <div class="card-body">
	<h5 class="card-title"><?php echo $row['username'] . " -> " . $row['username'];?></h5>
	<p class="card-text">Email: <?php echo $row['email'];?> €</p>
	<p class="card-text">Data: <?php echo $row['data_naixement'];?></p>
   
	<a href="index.php?controller=vol&action=modificarvols&codi=<?php echo $row['rol'];?>" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a>
	<a href="index.php?controller=vol&action=eliminarvols&codi=<?php echo $row['username'];?>" class="btn btn-primary"><i class="bi bi-trash"></i></a>
  <a href="index.php?controller=reserva&action=insertarreserves&codi=<?php echo $row['username'];?>" class="btn btn-primary"><i class="bi bi-calendar2-plus"></i></a>
  </div>
</div>
<?php } 
$mysql->close(); ?>
</div>