<?php include("../cabf.php");?>
<?php include("../inc.config.php");?>
<?php

date_default_timezone_set('America/La_Paz');

$fecha_ram	= date("Ymd");
$fecha 		= date("Y-m-d");
$gestion    = date("Y");

$idusuario_ss  =  $_SESSION['idusuario_ss'];
$idnombre_ss   =  $_SESSION['idnombre_ss'];
$perfil_ss     =  $_SESSION['perfil_ss'];

$iddeclaracion_cd_ss =  $_SESSION['iddeclaracion_cd_ss'];
$idempresa_ss        =  $_SESSION['idempresa_ss'];
$codigo_ss           =  $_SESSION['codigo_ss'];
$idformulario_cd_ss  =  $_SESSION['idformulario_cd_ss'];
$codigo_form_ss      =  $_SESSION['codigo_form_ss'];

$idcumplimiento         = $_POST['idcumplimiento'];
$comentario_observacion = $link->real_escape_string(htmlentities($_POST['comentario_observacion']));
$idatribucion_cd        = $_POST['idatribucion_cd'];
$idapoyo_cd             = $_POST['idapoyo_cd'];

$nb_sabs     = $link->real_escape_string(htmlentities($_POST['nb_sabs']));
$re_sabs     = $link->real_escape_string(htmlentities($_POST['re_sabs']));
$re_remision = $link->real_escape_string(htmlentities($_POST['re_remision']));

$idposible_dano  = $_POST['idposible_dano'];
$comentario_dano = $link->real_escape_string(htmlentities($_POST['comentario_dano']));
       
if ($idposible_dano == '0' || $comentario_dano == '' ) {

    $sql8 =" UPDATE formulario_cd SET idcumplimiento='$idcumplimiento', comentario_observacion='$comentario_observacion', idatribucion_cd='$idatribucion_cd', ";
    $sql8.=" idapoyo_cd='$idapoyo_cd', nb_sabs='$nb_sabs', re_sabs='$re_sabs', re_remision='$re_remision',  ";
    $sql8.=" idposible_dano='0', comentario_dano='', estado_eval='EN_EVALUACION' WHERE idformulario_cd='$idformulario_cd_ss' ";
    $result8 = mysqli_query($link,$sql8);

    header("Location:evalua_puntos_cd.php");

} else {
    
    $sql9 =" UPDATE formulario_cd SET idcumplimiento='2', comentario_observacion='', idatribucion_cd='2', idapoyo_cd='3', ";
    $sql9.=" nb_sabs='', re_sabs='', re_remision='', idposible_dano='$idposible_dano', ";
    $sql9.=" comentario_dano='$comentario_dano', estado_eval='EN_EVALUACION' WHERE idformulario_cd='$idformulario_cd_ss' ";
    $result9 = mysqli_query($link,$sql9);

    header("Location:finaliza_eval_cd.php");

}
?>