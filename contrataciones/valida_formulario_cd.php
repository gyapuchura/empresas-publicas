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

$iddeclaracion_cd_ss = $_SESSION['iddeclaracion_cd_ss'];
$idempresa_ss  =  $_SESSION['idempresa_ss'];
$codigo_ss     =  $_SESSION['codigo_ss'];

$idformulario_cd = $_POST['idformulario_cd'];
$codigo_form     = $_POST['codigo_form'];

$_SESSION['idformulario_cd_ss'] = $idformulario_cd;
$_SESSION['codigo_form_ss']     = $codigo_form;

header("Location:formulario_cd_elab.php");
?>