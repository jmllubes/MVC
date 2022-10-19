<form action="index.php?controller=usuari&action=actualitzar" method="post" 
enctype="multipart/form-data">

<img src="views/usuari/img/<?php echo $row["foto"];?>" width="50px" height="50px">

<label for="username"> Username</label>
<input type="text" name="username" value="<?php echo $row["username"];?>">

<label for="contrasenya"> Password</label>
<input type="password" name="password" value="<?php echo $row["password"];?>">


<label for="data"> Data naixement</label>
<input type="date" name="data" value="<?php echo $row["data_naixement"];?>">

<label for="foto"> Foto</label>
<input type="file" name="foto" value="<?php echo $row["foto"];?>">

<input type="submit" value="Actualitzar" name="actualitza">





</form>