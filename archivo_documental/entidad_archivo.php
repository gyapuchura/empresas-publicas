<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
  <title>ARCHIVO</title>
</head>
<body>
<option value="0">Elegir ENTIDAD/EMPRESA/UNIDAD</option>
<?php
include("../inc.config.php");
$options="";
$idcategoria_archivo = $_POST["categoria_archivo"];
/*
Realizamos una consulta ala tabla autor
para mostrar los datos en un combo
*/
$sql = " SELECT identidad_archivo, entidad_archivo FROM entidad_archivo  ";
$sql.= " WHERE idcategoria_archivo ='$idcategoria_archivo' ORDER BY identidad_archivo";
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