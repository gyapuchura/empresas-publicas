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

$idempresa_ss        =  $_SESSION['idempresa_ss'];
$idformulario_cd_ss  =  $_SESSION['idformulario_cd_ss'];
$codigo_form_ss      =  $_SESSION['codigo_form_ss'];

$idregistro_cd        = $_POST['idregistro_cd'];
$idverificacion_cd    = $_POST['idverificacion_cd'];
$comentario_verif_cd  = $_POST['comentario_verif_cd'];
            
    $sql8 =" UPDATE registro_cd SET idverificacion_cd = '$idverificacion_cd', comentario_verif_cd='$comentario_verif_cd', estado_eval='EVALUADO' WHERE idregistro_cd = '$idregistro_cd' ";
    $result8 = mysqli_query($link,$sql8);
    
    header("Location:evalua_puntos_cd.php");
?>