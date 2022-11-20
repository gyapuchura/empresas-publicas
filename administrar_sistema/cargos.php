<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>CARGOS</title>
</head>
<body>
<option value="">Elegir CARGO:</option>
<?php
include("../inc.config.php");
$options="";
$idarea = $_POST["area"];
/*
Realizamos una consulta ala tabla autor
para mostrar los datos en un combo
*/
$sql2 = "SELECT idcargo, cargo FROM cargo WHERE idarea='$idarea' ";
$result2 = mysqli_query($link,$sql2);
if ($row2 = mysqli_fetch_array($result2)){
mysqli_field_seek($result2,0);
while ($field2 = mysqli_fetch_field($result2)){
} do {
echo "<option value=".$row2[0].">".$row2[1]."</option>";
} while ($row2 = mysqli_fetch_array($result2));
} else {
echo "No se encontraron resultados!";
}
?>
</body>
</html>