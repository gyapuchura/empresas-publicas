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

$idform_archivo = $_POST['idform_archivo'];
$idempresa      = $_POST['idempresa'];
$idusuario_arch = $_POST['idusuario_arch'];
$codigo_form    = $_POST['codigo_form'];


$_SESSION['idform_archivo_ss']  = $idform_archivo;
$_SESSION['idempresa_ss']       = $idempresa;
$_SESSION['idusuario_arch_ss']  = $idusuario_arch;
$_SESSION['codigo_form_ss']     = $codigo_form;

header("Location:elab_formulario.php");

?>