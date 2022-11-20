<?php include("../cabf.php");?>
<?php include("../inc.config.php");?>
<?php
date_default_timezone_set('America/La_Paz');

$fecha 	 = date("Y-m-d");
$hora    = date("H:i");
$gestion = date("Y");

$idusuario_ss   = $_SESSION['idusuario_ss'];
$idnombre_ss   =  $_SESSION['idnombre_ss'];
$perfil_ss      = $_SESSION['perfil_ss'];

$iddeclaracion_cd_ss =  $_SESSION['iddeclaracion_cd_ss'];
$idempresa_ss        =  $_SESSION['idempresa_ss'];
$codigo_ss           =  $_SESSION['codigo_ss'];
$idformulario_cd_ss  =  $_SESSION['idformulario_cd_ss'];
$codigo_form_ss      =  $_SESSION['codigo_form_ss'];

$cuce       = $link->real_escape_string($_POST['cuce']);
$codigo_int = $link->real_escape_string($_POST['codigo_int']);
$objeto_cd  = $link->real_escape_string($_POST['objeto_cd']);
$importe    = $link->real_escape_string($_POST['importe']);

$idmodalidad_cd      = $_POST['idmodalidad_cd'];
$idsubmodalidad_cd      = $_POST['idsubmodalidad_cd'];

$idtipo_contratacion = $_POST['idtipo_contratacion'];

$proveedor = $link->real_escape_string($_POST['proveedor']);
$plazo     = $link->real_escape_string($_POST['plazo']);
$reglamento_especifico = $link->real_escape_string($_POST['reglamento_especifico']);

if ($cuce == '' || $codigo_int == '' || $objeto_cd == '' || $importe == '' || $proveedor == '' || $plazo == '')
{
    header("Location:formulario_cd_elab.php");
}
else {
    
    $sql8 =" UPDATE formulario_cd SET cuce='$cuce', codigo_int='$codigo_int', objeto_cd='$objeto_cd', importe='$importe', proveedor='$proveedor', plazo='$plazo', reglamento_especifico='$reglamento_especifico', ";
    $sql8.=" idmodalidad_cd='$idmodalidad_cd', idsubmodalidad_cd='$idsubmodalidad_cd', idtipo_contratacion='$idtipo_contratacion' WHERE idformulario_cd='$idformulario_cd_ss' ";
    $result8 = mysqli_query($link,$sql8);

    header("Location:formulario_cd_elab.php");
    
    }
?>