<h1>Filtres</h1>
<select name="rol" id="rols" onchange="showCustomer(this.value)">
  <option value=""></option>

  <?php
  $llistarols=[];
  foreach ($rows as $row) {    
    if(!in_array($row['rol'],$llistarols)){ //filtre per treure duplicats
      $llistarols[] = $row['rol'];
      echo "<option value=" . $row['rol'] . ">" . $row['rol'] . "</option>";
    }    
  }
  ?>
</select>

<select name="foto" id="foto" onchange="showFoto(this.value)">
  <option value=""></option>

  <?php
  $llistafoto=[];
  foreach ($rows as $row) {    
    if(!in_array($row['foto'],$llistafoto)){//filtre per treure duplicats
      $llistafoto[] = $row['foto'];
    echo "<option value=" . $row['foto'] . ">" . $row['foto'] . "</option>";
  }    
}
  ?>
</select>
<div id="usuaris" class="msg">
<!-- taula d'usuaris que es genera per funció ajax-->
</div>
<script>
  function showCustomer(str) {
    
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
      document.getElementById("usuaris").innerHTML = this.responseText;
    }
    xhttp.open("GET", "views/usuari/table.php?rol=" + str);
    xhttp.send();
  }
</script>

<script>
  function showFoto(str) {
    
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
      document.getElementById("usuaris").innerHTML = this.responseText;
    }
    xhttp.open("GET", "views/usuari/table.php?foto=" + str);
    xhttp.send();
  }
</script>


<script>
  function my_code() {
    var xhr = new XMLHttpRequest();
    xhr.onload = function() {
      document.getElementById("usuaris").innerHTML = this.responseText;
    }
    xhr.open("GET", "views/usuari/table.php");
    xhr.send();
  }

  window.onload = my_code();
</script>