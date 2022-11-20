<?php include("../cabf.php");?>
<?php include("../inc.config.php");?>
<?php

date_default_timezone_set('America/La_Paz');
$fecha 			= date("Y-m-d");

$idusuario_ss   = $_SESSION['idusuario_ss'];
$perfil_ss      = $_SESSION['perfil_ss'];

$idusuario_adm_ss  =  $_SESSION['idusuario_adm_ss'];
$idnombre_adm_ss   =  $_SESSION['idnombre_adm_ss'];

$gestion     = date("Y");


$nombres  = $link->real_escape_string(htmlentities($_POST['nombres']));
$paterno  = $link->real_escape_string(htmlentities($_POST['paterno']));
$materno  = $link->real_escape_string(htmlentities($_POST['materno']));
$ci       = $link->real_escape_string(htmlentities($_POST['ci']));
$exp      = $link->real_escape_string(htmlentities($_POST['exp']));
$titulo   = $link->real_escape_string(htmlentities($_POST['titulo']));

    
$sql8 =" UPDATE nombres SET nombres='$nombres', paterno='$paterno', materno='$materno', ci='$ci', ";
$sql8.=" exp='$exp', titulo='$titulo' WHERE idnombre='$idnombre_adm_ss' ";
$result8 = mysqli_query($link,$sql8);

header("Location:modifica_usuario.php");

?>