<?php include("../cabf.php");?>
<?php include("../inc.config.php");?>
<?php
date_default_timezone_set('America/La_Paz');
$fecha_ram	= date("Ymd");
$fecha 		= date("Y-m-d");

$idusuario_ss = $_SESSION['idusuario_ss'];
$idnombre_ss  = $_SESSION['idnombre_ss'];

$codigo_f = $_POST['codigo'];

$codigo   = $link->real_escape_string($codigo_f);

if ($codigo != "") {

$sql1 =" SELECT idcorres, gestion, correlativo, idusuario, referencia, procedencia, no_control, ";
$sql1.=" fecha_corres, anexo FROM corres WHERE codigo LIKE '%$codigo%' ";
$result1 = mysqli_query($link,$sql1);
;

if ($row1 = mysqli_fetch_array($result1)) {
    
$idcorres = $row1[0];
$_SESSION['idcorres_ss'] = $idcorres;

header("Location:correlativo_encontrado.php");
} else {
    header("Location:busquedas.php");
}

} else {  
    header("Location:busquedas.php");
}
?>
