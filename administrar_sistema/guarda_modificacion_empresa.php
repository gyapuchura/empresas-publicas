<?php include("../cabf.php");?>
<?php include("../inc.config.php");?>
<?php

date_default_timezone_set('America/La_Paz');

$fecha 		   = date("Y-m-d");
$gestion       = date("Y");

$idusuario_ss  =  $_SESSION['idusuario_ss'];
$idnombre_ss   =  $_SESSION['idnombre_ss'];
$perfil_ss     =  $_SESSION['perfil_ss'];

$idempresa_ss  =  $_SESSION['idempresa_ss'];


$cod_presup     = $link->real_escape_string(htmlentities($_POST['cod_presup']));
$razon_social   = $link->real_escape_string(htmlentities($_POST['razon_social']));
$sigla          = $link->real_escape_string(htmlentities($_POST['sigla']));
$idcaracter     = $_POST['idcaracter'];
$presupuesto    = $link->real_escape_string(htmlentities($_POST['presupuesto']));
$rubro          = $link->real_escape_string(htmlentities($_POST['rubro']));
$vigente        = $_POST['vigente'];
    
$sql8 =" UPDATE empresa SET cod_presup='$cod_presup', razon_social='$razon_social', sigla='$sigla', idcaracter='$idcaracter', ";
$sql8.=" presupuesto='$presupuesto', rubro='$rubro', vigente='$vigente' WHERE idempresa='$idempresa_ss' ";
$result8 = mysqli_query($link,$sql8);

header("Location:mostrar_empresa.php");

?>