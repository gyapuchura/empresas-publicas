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

$idempresa    = $_POST['idempresa'];

$_SESSION['idempresa_ss'] = $idempresa;

header("Location:mostrar_empresa.php");

?>