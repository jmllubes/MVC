<form action="index.php?controller=usuari&action=actualitzar" method="post" 
enctype="multipart/form-data">

<img src="views/usuari/img/<?php echo $row["foto"];?>"  width="20%" class="img-fluid img-thumbnail mb-3" >
<br>
<label for="username"> Username</label>
<input type="text"  class="form-control mb-3" name="username" value="<?php echo $row["username"];?>">

<label for="contrasenya"> Password</label>
<input type="password"  class="form-control mb-3" name="password" value="<?php echo $row["password"];?>">


<label for="data"> Data naixement</label>
<input type="date" class="form-control mb-3" name="data" value="<?php echo $row["data_naixement"];?>">

<label for="foto"> Foto</label>
<input type="file" name="foto" class="form-control-file mb-3" value="<?php echo $row["foto"];?>">

<input type="submit" value="Actualitzar" class="btn btn-primary" name="actualitza">





</form>