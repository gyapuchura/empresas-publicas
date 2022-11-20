<?php include("../cabf.php");?>
<?php include("../inc.config.php");?>
<?php
date_default_timezone_set('America/La_Paz');

$fecha 		 = date("Y-m-d");
$gestion     = date("Y");

$idusuario_ss  =  $_SESSION['idusuario_ss'];
$idnombre_ss   =  $_SESSION['idnombre_ss'];
$perfil_ss     =  $_SESSION['perfil_ss'];

$iddireccion_ss = $_SESSION['iddireccion_ss'];
$idarea_ss      = $_SESSION['idarea_ss'];

$cargo  = $link->real_escape_string(htmlentities($_POST['cargo']));
$item   = $link->real_escape_string(htmlentities($_POST['item']));

if ( $cargo == '' || $item == '' ) {

    header("Location:cargos_cge.php");

} else {

    $sql8 = " INSERT INTO cargo (idarea, cargo, item, vigente, idusuario ) ";
    $sql8.= " VALUES ('$idarea_ss','$cargo','$item','VIGENTE','$idusuario_ss') ";
    $result8 = mysqli_query($link,$sql8);

    header("Location:cargos_cge.php");
}
?>
