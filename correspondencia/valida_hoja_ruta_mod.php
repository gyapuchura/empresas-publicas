<?php include("../cabf.php");?>
<?php include("../inc.config.php");?>
<?php
date_default_timezone_set('America/La_Paz');
$fecha_ram				= date("Ymd");
$fecha 					= date("Y-m-d");

$idusuario_ss   = $_SESSION['idusuario_ss'];
$idnombre_ss    = $_SESSION['idnombre_ss'];

$idcorres       = $_POST['idcorres'];

$_SESSION['idcorres_ss']    = $idcorres;

header("Location:modifica_hoja_ruta.php");

?>