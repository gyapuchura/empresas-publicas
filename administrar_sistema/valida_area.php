<?php include("../cabf.php");?>
<?php include("../inc.config.php");?>
<?php

date_default_timezone_set('America/La_Paz');

$fecha_ram	  = date("Ymd");
$fecha 	      = date("Y-m-d");
$gestion      = date("Y");

$idusuario_ss = $_SESSION['idusuario_ss'];
$idnombre_ss  = $_SESSION['idnombre_ss'];
$perfil_ss    = $_SESSION['perfil_ss'];

$iddireccion_ss = $_SESSION['iddireccion_ss'];

$idarea = $_POST['idarea'];

$_SESSION['idarea_ss'] = $idarea;

header("Location:cargos_cge.php");

?>