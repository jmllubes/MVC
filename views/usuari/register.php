<?php

$user = $_POST["txt"];
$email= $_POST["email"];
$password= $_POST["pswd"];

$mysql=new mysqli("localhost","root","","login");   
if ($mysql->connect_error){
die('Problemas con la conexion a la base de datos');
}

$password = md5($password);

$sql = "INSERT INTO usuari (username,password,email) 
    VALUES ('$user','$password','$email')";
$mysql->query($sql);
header("Location:login.php#login")






?>
