<select name="rol" id="rols" onchange="showCustomer(this.value)">
<option value=""></option>
    
<?php 
 while($row = $r->fetch_assoc()){
     echo "<option value=".$row['rol'].">".$row['rol']."</option>";
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
  xhttp.open("GET", "views/usuari/table.php?rol="+str);
  xhttp.send();
}
</script>



