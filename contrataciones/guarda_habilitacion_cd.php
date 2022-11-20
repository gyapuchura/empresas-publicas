<?php include("../cabf.php");?>
<?php include("../inc.config.php");?>
<?php

date_default_timezone_set('America/La_Paz');
$fecha_ram	= date("Ymd");
$fecha 		= date("Y-m-d");
$gestion    = date("Y");

$idusuario_ss  =  $_SESSION['idusuario_ss'];
$idnombre_ss   =  $_SESSION['idnombre_ss'];
$perfil_ss     =  $_SESSION['perfil_ss'];

$iddeclaracion_cd_ss =  $_SESSION['iddeclaracion_cd_ss'];
$idempresa_ss        =  $_SESSION['idempresa_ss'];
$codigo_ss           =  $_SESSION['codigo_ss'];
$idformulario_cd     =  $_POST['idformulario_cd'];

$sql8 =" UPDATE formulario_cd SET estado = '', supervisor = '0' ";
$sql8.=" WHERE idformulario_cd = '$idformulario_cd' ";
$result8 = mysqli_query($link,$sql8);

header("Location:habilitacion_formulario_cd.php");
?>