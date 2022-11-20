<?php include("../cabf.php");?>
<?php include("../inc.config.php");?>
<?php
date_default_timezone_set('America/La_Paz');
$fecha_ram				= date("Ymd");
$fecha 					= date("Y-m-d");

$idusuario_ss = $_SESSION['idusuario_ss'];
$idnombre_ss  = $_SESSION['idnombre_ss'];
$perfil_ss    = $_SESSION['perfil_ss'];
$idarea_ss    = $_SESSION['idarea_ss'];

$idcorres_ss        = $_SESSION['idcorres_ss'];

$gestion      = date("Y");

$idcorres       = $_POST['idcorres'];
$idbitacora_estado = $_POST['idbitacora_estado'];

$_SESSION['idcorres_ss']           = $idcorres;
$_SESSION['idbitacora_estado_ss']  = $idbitacora_estado;

header("Location:ajusta_actualizacion_hr.php");

?>