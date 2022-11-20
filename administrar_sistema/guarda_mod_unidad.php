<?php include("../cabf.php");?>
<?php include("../inc.config.php");?>
<?php

date_default_timezone_set('America/La_Paz');

$fecha 		   = date("Y-m-d");
$gestion       = date("Y");

$idusuario_ss  =  $_SESSION['idusuario_ss'];
$idnombre_ss   =  $_SESSION['idnombre_ss'];
$perfil_ss     =  $_SESSION['perfil_ss'];

$iddireccion_ss  =  $_SESSION['iddireccion_ss'];

$direccion   = $link->real_escape_string(htmlentities($_POST['direccion']));
$sigla       = $link->real_escape_string(htmlentities($_POST['sigla']));
$vigente     = $link->real_escape_string($_POST['vigente']);
    
$sql8 =" UPDATE direccion SET direccion='$direccion', sigla='$sigla', ";
$sql8.=" vigente='$vigente' WHERE iddireccion ='$iddireccion_ss' ";
$result8 = mysqli_query($link,$sql8);

header("Location:mostrar_unidad.php");

?>