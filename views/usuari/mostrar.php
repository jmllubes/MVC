<h1>Filtres</h1>
<select name="rol" id="rols" onchange="showCustomer(this.value)">
  <option value=""></option>

  <?php
  foreach ($rows as $row) {
    echo "<option value=" . $row['rol'] . ">" . $row['rol'] . "</option>";
  }
  ?>
</select>

<select name="rol2" id="rols2" onchange="showCustomer(this.value)">
  <option value=""></option>

  <?php
  foreach ($rows as $row) {
    echo "<option value=" . $row['rol'] . ">" . $row['rol'] . "</option>";
  }
  ?>
</select>
<div id="usuaris" class="msg"></div>
<script>
  function showCustomer(str) {
    if (str == "") {
      document.getElementById("usuaris").innerHTML = "";
      return;
    }
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
      document.getElementById("usuaris").innerHTML = this.responseText;
    }
    xhttp.open("GET", "views/usuari/table.php?rol=" + str);
    xhttp.send();
  }
</script>


<script type="text/javascript">
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