<?php include("../cabf.php");?>
<?php include("../inc.config.php");?>
<?php
date_default_timezone_set('America/La_Paz');

$fecha_ram	  = date("Ymd");
$fecha 		  = date("Y-m-d");
$gestion      = date("Y");

$idusuario_ss      = $_SESSION['idusuario_ss'];
$idnombre_ss       = $_SESSION['idnombre_ss'];
$idform_archivo_ss = $_SESSION['idform_archivo_ss'];
$idempresa_ss      = $_SESSION['idempresa_ss'];

$idcorres        = $_POST['idcorres'];
$codigo_item     = $_POST['codigo_item'];

$iditem_archivo  = $_POST['iditem_archivo'];

$sql    = "SELECT idform_archivo, codigo, idempresa FROM form_archivo WHERE idform_archivo='$idform_archivo_ss'  ";
$result = mysqli_query($link,$sql);
$row    = mysqli_fetch_array($result);

$codigo_form = $row[1];

$_SESSION['idcorres_ss']       = $idcorres;
$_SESSION['codigo_item_ss']    = $codigo_item;

$_SESSION['codigo_form_ss']    = $codigo_form;
$_SESSION['iditem_archivo_ss'] = $iditem_archivo;

    header("Location:prepara_archivo_ep_mod.php");

?>