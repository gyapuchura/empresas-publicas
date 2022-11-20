<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
  <title>ARCHIVO</title>
</head>
<body>
<option value="0">Elegir UBICACION DEL ARCHIVO</option>
<?php
include("../inc.config.php");
$options="";
$identidad_archivo = $_POST["entidad_archivo"];
/*
Realizamos una consulta ala tabla autor
para mostrar los datos en un combo
*/
$sql = " SELECT idubicacion_archivo, ubicacion_archivo FROM ubicacion_archivo  ";
$sql.= " WHERE identidad_archivo ='$identidad_archivo' ORDER BY idubicacion_archivo";
$result = mysqli_query($link,$sql);
if ($row = mysqli_fetch_array($result)){
mysqli_field_seek($result,0);
while ($field = mysqli_fetch_field($result)){
} do {
echo "<option value=". $row[0]. ">". $row[1]."</option>";
} while ($row = mysqli_fetch_array($result));
} else {
echo "No se encontraron resultados!";
}
?>
</body>
</html>