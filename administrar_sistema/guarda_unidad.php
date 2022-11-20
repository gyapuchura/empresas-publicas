<?php include("../cabf.php");?>
<?php include("../inc.config.php");?>
<?php
date_default_timezone_set('America/La_Paz');

$fecha 		 = date("Y-m-d");
$gestion     = date("Y");

$idusuario_ss  =  $_SESSION['idusuario_ss'];
$idnombre_ss   =  $_SESSION['idnombre_ss'];
$perfil_ss     =  $_SESSION['perfil_ss'];

$direccion     = $link->real_escape_string(htmlentities($_POST['direccion']));
$sigla         = $link->real_escape_string(htmlentities($_POST['sigla']));

if ( $direccion == '' || $sigla == '' ) {

    header("Location:unidades_areas.php");

} else {

    $sql8 =" INSERT INTO direccion (direccion, sigla, vigente, idusuario ) ";
    $sql8.=" VALUES ('$direccion','$sigla','VIGENTE','$idusuario_ss') ";
    $result8 = mysqli_query($link,$sql8);

    header("Location:unidades_areas.php");
}
?>