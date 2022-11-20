<?php include("../cabf.php");?>
<?php include("../inc.config.php");?>
<?php

date_default_timezone_set('America/La_Paz');
$fecha 			= date("Y-m-d");
$idusuario_ss   = $_SESSION['idusuario_ss'];
$perfil_ss      = $_SESSION['perfil_ss'];
$idcorres_ss    = $_SESSION['idcorres_ss'];

$gestion        = date("Y");

$referencia     = $link->real_escape_string($_POST['referencia']);
$no_control     = $link->real_escape_string($_POST['no_control']);
$fecha_corres   = $link->real_escape_string($_POST['fecha_corres']);
$anexo          = $link->real_escape_string($_POST['anexo']);

$idcontrol       = $_POST['idcontrol'];
$idtipo_hojaruta = $_POST['idtipo_hojaruta'];
    
    $sql8 =" UPDATE corres SET referencia='$referencia', no_control='$no_control', fecha_corres='$fecha_corres', ";
    $sql8.=" anexo='$anexo', idtipo_hojaruta='$idtipo_hojaruta' WHERE idcorres='$idcorres_ss' ";
    $result8 = mysqli_query($link,$sql8);

    header("Location: modifica_hoja_ruta.php");
?>