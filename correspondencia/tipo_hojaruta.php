<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
  <title>TIPO HOJA RUTA</title>
</head>
<body>
<option value="0">Elegir TIPO HOJA DE RUTA</option>
<?php
include("../inc.config.php");
$options="";
$idcontrol = $_POST["control"];
/*
Realizamos una consulta ala tabla autor
para mostrar los datos en un combo
*/
$sql = " SELECT idtipo_hojaruta, tipo_hojaruta FROM tipo_hojaruta ";
$sql.= " WHERE idcontrol ='$idcontrol' ORDER BY idtipo_hojaruta";
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