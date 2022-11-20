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
$idempresa     = $_POST['idempresa'];
$idusuarioe    = $_POST['idusuario'];
$codigo        = $_POST['codigo'];
$mes           = $_POST['mes'];

$_SESSION['iddeclaracion_cd_ss']  = $iddeclaracion_cd;
$_SESSION['idempresa_ss']         = $idempresa;
$_SESSION['idusuarioe_ss']        = $idusuarioe;
$_SESSION['codigo_ss']            = $codigo;
$_SESSION['mes_ss']               = $mes;

header("Location:declaracion_cd.php");

?>