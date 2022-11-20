<?php include("../cabf.php");?>
<?php include("../inc.config.php");?>
<?php
date_default_timezone_set('America/La_Paz');

$fecha 	 = date("Y-m-d");
$hora    = date("H:i");
$gestion = date("Y");

$idusuario_ss   = $_SESSION['idusuario_ss'];
$idnombre_ss   =  $_SESSION['idnombre_ss'];
$perfil_ss      = $_SESSION['perfil_ss'];

$iddeclaracion_cd_ss = $_SESSION['iddeclaracion_cd_ss'];
$idempresa_ss  =  $_SESSION['idempresa_ss'];
$usuarioe_ss   =  $_SESSION['usuarioe_ss'];
$codigo_ss     =  $_SESSION['codigo_ss'];

$idregistro_cd = $_POST['idregistro_cd'];
$idcumplimiento  = $_POST['idcumplimiento'];

if ($idregistro_cd == '' || $idcumplimiento == '') {

    header("Location:formulario_cd_previo.php");

} else {

$sql8 =" UPDATE registro_cd SET idcumplimiento='$idcumplimiento' ";
$sql8.=" WHERE idregistro_cd='$idregistro_cd' ";
$result8 = mysqli_query($link,$sql8);

header("Location:formulario_cd_previo.php");
}

?>