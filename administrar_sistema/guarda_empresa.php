<?php include("../cabf.php");?>
<?php include("../inc.config.php");?>
<?php
date_default_timezone_set('America/La_Paz');

$fecha 		 = date("Y-m-d");
$gestion     = date("Y");

$idusuario_ss  =  $_SESSION['idusuario_ss'];
$idnombre_ss   =  $_SESSION['idnombre_ss'];
$perfil_ss     =  $_SESSION['perfil_ss'];

$cod_presup   = $link->real_escape_string(htmlentities($_POST['cod_presup']));
$razon_social = $link->real_escape_string(htmlentities($_POST['razon_social']));
$sigla        = $link->real_escape_string(htmlentities($_POST['sigla']));
$idcaracter   = $link->real_escape_string(htmlentities($_POST['idcaracter']));
$presupuesto  = $link->real_escape_string(htmlentities($_POST['presupuesto']));
$rubro        = $link->real_escape_string(htmlentities($_POST['rubro']));

if ( $cod_presup == '' || $razon_social == '' || $sigla == '' || $idcaracter == ''|| $presupuesto == '' || $rubro == '' ) {

    header("Location:empresas.php");

} else {

    $sql8 =" INSERT INTO empresa (cod_presup, razon_social, sigla, idcaracter, presupuesto, rubro, vigente, idusuario) ";
    $sql8.=" VALUES ('$cod_presup','$razon_social','$sigla','$idcaracter','$presupuesto','$rubro','VIGENTE','$idusuario_ss') ";
    $result8 = mysqli_query($link,$sql8);

    header("Location:empresas.php");
}
?>