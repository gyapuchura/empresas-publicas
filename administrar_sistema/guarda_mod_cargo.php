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
$idcargo_ss     = $_SESSION['idcargo_ss'];


$cargo        = $link->real_escape_string(htmlentities($_POST['cargo']));
$item         = $link->real_escape_string(htmlentities($_POST['item']));
$vigente      = $_POST['vigente'];

    
$sql8 =" UPDATE cargo SET cargo='$cargo', item='$item', ";
$sql8.=" vigente='$vigente' WHERE idcargo ='$idcargo_ss' ";
$result8 = mysqli_query($link,$sql8);

header("Location:mostrar_cargo.php");
?>