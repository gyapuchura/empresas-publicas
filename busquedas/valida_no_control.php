<?php include("../cabf.php");?>
<?php include("../inc.config.php");?>
<?php
date_default_timezone_set('America/La_Paz');
$fecha_ram	= date("Ymd");
$fecha 		= date("Y-m-d");

$idusuario_ss = $_SESSION['idusuario_ss'];
$idnombre_ss  = $_SESSION['idnombre_ss'];

$no_control_f = $_POST['no_control'];
$no_control   = $link->real_escape_string($no_control_f);

if ($no_control != "") {

$sql1 =" SELECT idcorres, gestion, correlativo, idusuario, referencia, procedencia, no_control, ";
$sql1.=" fecha_corres, anexo FROM corres WHERE no_control = '$no_control' ";
$result1 = mysqli_query($link,$sql1);

if ($row1 = mysqli_fetch_array($result1)) {
    $idcorres = $row1[0];

$_SESSION['idcorres_ss'] = $idcorres;

header("Location:no_control_encontrado.php");

} else {
    header("Location:busquedas.php");
}

} else {  
    header("Location:busquedas.php");
}
?>
