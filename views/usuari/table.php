<?php $mysql = new mysqli("localhost", "root", "", "login");
        if ($mysql->connect_error) {
            die('Problemas con la conexion a la base de datos');
        }
        if(isset($_GET["rol"])){
            $sql = "SELECT `username`, `password`, `email`, `foto`, `data_naixement`, `rol` 
            FROM `usuari` WHERE rol = '" . $_GET["rol"] . "'";
            $r = $mysql->query($sql);
        }
        else{
            $sql = "SELECT `username`, `password`, `email`, `foto`, `data_naixement`, `rol` 
        FROM `usuari`";
        $r = $mysql->query($sql);
        }
        
?>
<table class="table">
    <tr>
    <th>username</th>
    <th>email</th>
    <th>data naixement</th>
    <th>rol</th>
    <th>foto</th>
    
    </tr>
    <?php 
    while($row = $r->fetch_assoc()){
     echo "<tr>";
     echo "<td>".$row['username']."</td>";
     echo "<td>".$row['email']."</td>";
     echo "<td>".$row['data_naixement']."</td>";
     echo "<td>".$row['rol']."</td>";
     echo "<td><img src='views/usuari/img/" .$row['foto']."'  width=\"50\" height=\"60\"></td>";
     echo "</tr>";
 }
 echo "</table>"; 
 $mysql->close();
?> 