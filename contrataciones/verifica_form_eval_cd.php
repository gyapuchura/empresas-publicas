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

$iddeclaracion_cd_ss =  $_SESSION['iddeclaracion_cd_ss'];
$idempresa_ss        =  $_SESSION['idempresa_ss'];
$codigo_ss           =  $_SESSION['codigo_ss'];
$idformulario_cd_ss  =  $_SESSION['idformulario_cd_ss'];
$codigo_form_ss      =  $_SESSION['codigo_form_ss'];
?>
<?php
    $sql4 =" SELECT registro_cd.idregistro_cd, punto_cd.indice, punto_cd.punto_cd, registro_cd.idcumplimiento FROM registro_cd, punto_cd ";
    $sql4.=" WHERE registro_cd.idpunto_cd=punto_cd.idpunto_cd AND registro_cd.idformulario_cd='$idformulario_cd_ss' AND registro_cd.estado_eval ='REGISTRADO' ";
    $result4 = mysqli_query($link,$sql4);
    if ($row4 = mysqli_fetch_array($result4)){
    mysqli_field_seek($result4,0);
    while ($field4 = mysqli_fetch_field($result4)){
    } do { 

        header("Location:evaluacion_cd_incompleta.php");  //--- Revision Incompleta -----//
        
    }
   while ($row4 = mysqli_fetch_array($result4));
 } else {

        header("Location:evaluacion_cd_completa.php");      //--- Revision Completa -----//
 
    }
?>