<?php include("../cabf.php");?>
<?php include("../inc.config.php");?>
<?php
date_default_timezone_set('America/La_Paz');

$fecha_ram	  = date("Ymd");
$fecha 		  = date("Y-m-d");
$gestion      = date("Y");

$idusuario_ss = $_SESSION['idusuario_ss'];
$idnombre_ss  = $_SESSION['idnombre_ss'];

$idcorres   = $_POST['idcorres'];
$idempresa  = $_POST['idempresa'];

$sql    = "SELECT idform_archivo, codigo, idempresa FROM form_archivo WHERE idempresa='$idempresa' AND gestion='$gestion' ";
$result = mysqli_query($link,$sql);
$row    = mysqli_fetch_array($result);
$idform_archivo = $row[0];
$codigo_form = $row[1];

$_SESSION['idcorres_ss']       = $idcorres;
$_SESSION['idempresa_ss']      = $idempresa;
$_SESSION['idform_archivo_ss'] = $idform_archivo;
$_SESSION['codigo_form_ss']    = $codigo_form;

if ($idempresa != '555') {

    header("Location:prepara_archivo_ep.php");

} else {

    header("Location:prepara_archivo.php");
}
?>