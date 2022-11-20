<?php include("../cabf.php");?>
<?php include("../inc.config.php");?>
<?php
date_default_timezone_set('America/La_Paz');
$fecha_ram	  = date("Ymd");
$fecha 	      = date("Y-m-d");

$idusuario_ss = $_SESSION['idusuario_ss'];
$idnombre_ss  = $_SESSION['idnombre_ss'];
$perfil_ss    = $_SESSION['perfil_ss'];

$gestion      = date("Y");

$iddeclaracion_cd = $_POST['iddeclaracion_cd'];
$idempresa        = $_POST['idempresa'];
$codigo           = $_POST['codigo'];

$_SESSION['iddeclaracion_cd_ss']  = $iddeclaracion_cd;
$_SESSION['idempresa_ss']         = $idempresa;
$_SESSION['codigo_ss']            = $codigo;

header("Location:declaracion_cd_scep.php");
?>