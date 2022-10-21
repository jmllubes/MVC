<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="views/style.css">

  </head>
<body>

<!-- Header -->
<div class="header">
  <h1>My Website</h1>
  <p>With a <b>flexible</b> layout.</p>
</div>

<!-- Navigation Bar -->
<div class="navbar">
  <a href="index.php?controller=usuari&action=perfil">Perfil usuari</a>
  <a href="#">Link</a>
  <a href="#">Link</a>
  <a href="#">Link</a>
  <a href=""><form action="index.php" method="post">
        <input type="submit" name="logout" value="logout">
    </form> </a>
</div>

<!-- The flexible grid (content) -->

    
    <?php
    if(isset($_POST["logout"])){ //destruir sessió
        session_destroy();
        header("Location:../index.php"); //redirigim a login

    }  ?>



