<?php include("../cabf.php");?>
<?php include("../inc.config.php");?>
<?php
date_default_timezone_set('America/La_Paz');
$fecha_ram				= date("Ymd");
$fecha 					= date("Y-m-d");

$idusuario_ss   =  $_SESSION['idusuario_ss'];
$idnombre_ss    =  $_SESSION['idnombre_ss'];
$perfil_ss      =  $_SESSION['perfil_ss'];

$idusuario_adm  =  $_POST['idusuario_adm'];
$idnombre_adm   =  $_POST['idnombre_adm'];

$_SESSION['idusuario_adm_ss'] = $idusuario_adm;
$_SESSION['idnombre_adm_ss']  = $idnombre_adm;

header("Location:modifica_usuario.php");


?>