<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
  <title>Areas</title>
</head>
<body>
<option value="0">Elegir UNIDAD</option>
<?php
include("../inc.config.php");
$options="";
$iddireccion = $_POST["direccion"];
/*
Realizamos una consulta ala tabla autor
para mostrar los datos en un combo
*/
$sql = " SELECT area.idarea, direccion.direccion, area.area FROM area, direccion ";
$sql.= " WHERE direccion.iddireccion=area.iddireccion AND area.iddireccion='$iddireccion' ORDER BY area.idarea ";
$result = mysqli_query($link,$sql);
if ($row = mysqli_fetch_array($result)){
mysqli_field_seek($result,0);
while ($field = mysqli_fetch_field($result)){
} do {
echo "<option value=". $row[0]. ">". $row[2]."</option>";
} while ($row = mysqli_fetch_array($result));
} else {
echo "No se encontraron resultados!";
}
?>
</body>
</html>