<?php include("../cabf.php");?>
<?php include("../inc.config.php");?>
<?php
date_default_timezone_set('UTC');
$fecha_ram	= date("Ymd");
$fecha 		= date("Y-m-d");

$idusuario_ss = $_SESSION['idusuario_ss'];
$idnombre_ss  = $_SESSION['idnombre_ss'];

$correlativo_f = $_POST['correlativo'];
$correlativo   = $link->real_escape_string($correlativo_f);

$origen_f     = $_POST['origen'];
$origen       = $link->real_escape_string($origen_f);

if ($correlativo != "") {
    
$sql1="SELECT idcorres, gestion, correlativo, idusuario, referencia, procedencia, no_control, ";
$sql1.="fecha_corres, anexo FROM corres WHERE correlativo='$correlativo' AND origen='$origen'";
$result1 = mysqli_query($link,$sql1);

if ($row1 = mysqli_fetch_array($result1)) {
  
$idcorres = $row1[0];

$_SESSION['idcorres_ss']=$idcorres;

    header("Location:correlativo_encontrado.php");
    
} else {
    header("Location:busquedas.php");
}
    
} else {
    header("Location:busquedas.php");
}

?>