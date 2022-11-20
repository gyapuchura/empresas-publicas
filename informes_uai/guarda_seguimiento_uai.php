<?php include("../cabf.php");?>
<?php include("../inc.config.php");?>
<?php
date_default_timezone_set('America/La_Paz');
$fecha_ram	   = date("Ymd");
$fecha 		   = date("Y-m-d");

$idusuario_ss  =  $_SESSION['idusuario_ss'];
$idnombre_ss   =  $_SESSION['idnombre_ss'];
$perfil_ss     =  $_SESSION['perfil_ss'];

$codigo        = $link->real_escape_string(htmlentities($_POST['codigo']));
$gestion       = $link->real_escape_string(htmlentities($_POST['gestion']));
$idempresa     = $link->real_escape_string(htmlentities($_POST['idempresa']));
$tipo_informe  = $link->real_escape_string(htmlentities($_POST['tipo_informe']));

$sqlus =" SELECT nombres.nombres, nombres.paterno, nombres.materno FROM usuarios, nombres ";
$sqlus.=" WHERE usuarios.idnombre=nombres.idnombre AND usuarios.idusuario='$idusuario_ss' ";
$resultus = mysqli_query($link,$sqlus);
$rowus = mysqli_fetch_array($resultus);
$elaborador = $rowus[0]." ".$rowus[1]." ".$rowus[2];

$file_name = $_FILES['file']['name'];

$directorio = 'files/';

if ($codigo =='' || $gestion =='' || $idempresa =='' || $tipo_informe =='') {

    header("Location:seguimiento_uai.php"); 

} else {
    
    if ($file_name != '' || $file_name != null) {

        $subir_archivo = $directorio.basename($file_name);

    if (move_uploaded_file($_FILES['file']['tmp_name'],'../'.$subir_archivo)) {

        $ins = $link->query(" INSERT INTO uai_trabajo ( codigo, gestion, idempresa, tipo_informe, idtipo_hojaruta, elaborador, idusuario, url ) VALUES ( '$codigo','$gestion','$idempresa','$tipo_informe','22','$elaborador','$idusuario_ss','$subir_archivo') "); 

            header("Location:seguimiento_uai.php");
  
        } else {                    
            header("Location:seguimiento_uai.php");
        }
    }
else
{
        header("Location:seguimiento_uai.php"); 
}  

}
?>