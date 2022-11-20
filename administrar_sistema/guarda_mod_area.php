<?php include("../cabf.php");?>
<?php include("../inc.config.php");?>
<?php
date_default_timezone_set('America/La_Paz');

$fecha 		   = date("Y-m-d");
$gestion       = date("Y");

$idusuario_ss  =  $_SESSION['idusuario_ss'];
$idnombre_ss   =  $_SESSION['idnombre_ss'];
$perfil_ss     =  $_SESSION['perfil_ss'];

$iddireccion_ss = $_SESSION['iddireccion_ss'];
$idarea_ss      = $_SESSION['idarea_ss'];

$area        = $link->real_escape_string(htmlentities($_POST['area']));
$sigla       = $link->real_escape_string(htmlentities($_POST['sigla']));
$vigente     = $link->real_escape_string(htmlentities($_POST['vigente']));
    
$sql8 =" UPDATE area SET area='$area', sigla='$sigla', ";
$sql8.=" vigente='$vigente' WHERE idarea ='$idarea_ss' ";
$result8 = mysqli_query($link,$sql8);

header("Location:mostrar_area.php");

?>