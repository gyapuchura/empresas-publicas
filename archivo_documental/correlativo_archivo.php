<?php include("../cabf.php");?>
<?php include("../inc.config.php");?>
<?php
date_default_timezone_set('America/La_Paz');
$fecha_ram	  = date("Ymd");
$fecha 	      = date("Y-m-d");

$idusuario_ss = $_SESSION['idusuario_ss'];
$idnombre_ss  = $_SESSION['idnombre_ss'];
$perfil_ss    = $_SESSION['perfil_ss'];

$gestion  = date("Y");

$subfondo = "SCEP";

$idcorres_ss       = $_SESSION['idcorres_ss'];
$idform_archivo_ss = $_SESSION['idform_archivo_ss'];
$idempresa_ss      = $_SESSION['idempresa_ss'];
$codigo_form_ss    = $_SESSION['codigo_form_ss'];

$idserie_documental = $_POST['idserie_documental'];

$sqle    = " SELECT MAX(correlativo) FROM item_archivo WHERE idform_archivo='$idform_archivo_ss' AND idserie_documental='$idserie_documental' AND idempresa='$idempresa_ss' AND gestion='$gestion' ";
$resulte = mysqli_query($link,$sqle);
$rowe    = mysqli_fetch_array($resulte);

$correlativo = $rowe[0]+1;

$sql_s="SELECT idempresa, sigla FROM empresa WHERE idempresa='$idempresa_ss'";
$result_s=mysqli_query($link,$sql_s);
$row_s=mysqli_fetch_array($result_s);

$sigla = $row_s[1];

$sql_se = "SELECT idserie_documental, serie_documental, sigla FROM serie_documental WHERE idserie_documental='$idserie_documental'";
$result_se = mysqli_query($link,$sql_se);
$row_se=mysqli_fetch_array($result_se);

$sigla_doc = $row_se[2];

$codigo = "SCEP-".$sigla."-".$sigla_doc."-".$correlativo."/".$gestion;
echo "<h4 class='text-success'>";
echo $codigo;
echo "</h4>";
?>
