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

$idsubregistro_cd = $_POST['idsubregistro_cd'];

$documento_cd  = $link->real_escape_string(htmlentities($_POST['documento_cd']));
$fecha_doc_cd  = $link->real_escape_string(htmlentities($_POST['fecha_doc_cd']));
$justificacion = $link->real_escape_string(htmlentities($_POST['justificacion']));
$aclaracion    = $link->real_escape_string(htmlentities($_POST['aclaracion']));

$sql8 =" UPDATE subregistro_cd SET documento_cd='$documento_cd', fecha_doc_cd='$fecha_doc_cd', justificacion='$justificacion', aclaracion='$aclaracion' ";
$sql8.=" WHERE idsubregistro_cd='$idsubregistro_cd' ";
$result8 = mysqli_query($link,$sql8);

header("Location:formulario_cd_previo.php");

?>