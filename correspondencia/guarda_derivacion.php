<?php include("../cabf.php");?>
<?php include("../inc.config.php");?>
<?php
date_default_timezone_set('America/La_Paz');

$fecha 		  = date("Y-m-d");
$idusuario_ss = $_SESSION['idusuario_ss'];
$perfil_ss    = $_SESSION['perfil_ss'];
$idarea_ss    = $_SESSION['idarea_ss'];

$idcorres_ss  = $_SESSION['idcorres_ss'];

$gestion      = date("Y");

$idusuariod    = $_POST['idusuariod'];
$idinstruccion = $_POST['idinstruccion'];
$comentario    = $_POST['comentario'];

if ($idinstruccion == '')
{
header("Location:deriva_hoja_ruta.php");
}
else {

$sql8    = " UPDATE corres SET idestado='2' WHERE idcorres='$idcorres_ss' ";
$result8 = mysqli_query($link,$sql8);

$sql7   = " INSERT INTO deriva_corres (idcorres, idusuarioo, idusuariod, idinstruccion, comentario, fecha_deriva, fecha_recibe, derivada, recibida) ";
$sql7.= " VALUES ('$idcorres_ss','$idusuario_ss','$idusuariod','$idinstruccion','$comentario','$fecha','1111-11-11','SI','NO') ";
$result7 = mysqli_query($link,$sql7);

$_SESSION['idusuariod_ss']    = $idusuariod;

header("Location:derivacion_exitosa.php");

}

?>