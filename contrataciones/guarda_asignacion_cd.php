<?php include("../cabf.php");?>
<?php include("../inc.config.php");?>
<?php
date_default_timezone_set('America/La_Paz');
$fecha 			= date("Y-m-d");

$idusuario_ss  =  $_SESSION['idusuario_ss'];
$idnombre_ss   =  $_SESSION['idnombre_ss'];
$perfil_ss     =  $_SESSION['perfil_ss'];

$idempresa_ss     = $_SESSION['idempresa_ss'];

$idformulario_cd  = $_POST['idformulario_cd'];
$supervisor       = $_POST['supervisor'];
            
    $sql8 =" UPDATE formulario_cd SET supervisor = '$supervisor', estado_eval='ASIGNADO' WHERE idformulario_cd = '$idformulario_cd' ";
    $result8 = mysqli_query($link,$sql8);
    
    header("Location:formularios_para_asignar.php");

?>