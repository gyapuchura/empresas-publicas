<?php include("../cabf.php");?>
<?php include("../inc.config.php");?>
<?php
date_default_timezone_set('America/La_Paz');
$fecha_ram	= date("Ymd");
$fecha 		= date("Y-m-d");

$idusuario_ss = $_SESSION['idusuario_ss'];
$idnombre_ss  = $_SESSION['idnombre_ss'];
$perfil_ss    = $_SESSION['perfil_ss'];
$idarea_ss    = $_SESSION['idarea_ss'];

$idadjunto_hr       = $_POST['idadjunto_hr'];
$idcorres_ss        = $_SESSION['idcorres_ss'];
$idempresa_ss       = $_SESSION['idempresa_ss'];
$idderiva_corres_ss = $_SESSION['idderiva_corres_ss'];

/* BORRAMOS EL REGISTRO DE LA ACTUALIZACION DE ESTADO */

$sql = " DELETE FROM adjunto_hr WHERE idadjunto_hr ='$idadjunto_hr'";
$result = mysqli_query($link,$sql);

header("Location:deriva_hoja_ruta_corres.php");
?>