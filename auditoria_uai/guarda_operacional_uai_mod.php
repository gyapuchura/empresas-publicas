<?php include("../cabf.php");?>
<?php include("../inc.config.php");?>
<?php
date_default_timezone_set('America/La_Paz');
$fecha_ram	   = date("Ymd");
$fecha 		   = date("Y-m-d");

$idusuario_ss  =  $_SESSION['idusuario_ss'];
$idnombre_ss   =  $_SESSION['idnombre_ss'];
$perfil_ss     =  $_SESSION['perfil_ss'];

$iduai_trabajo_ss  = $_SESSION['iduai_trabajo_ss'];

$codigo        = $link->real_escape_string(htmlentities($_POST['codigo']));
$gestion       = $link->real_escape_string(htmlentities($_POST['gestion']));
$idempresa     = $link->real_escape_string(htmlentities($_POST['idempresa']));
$tipo_informe  = $link->real_escape_string(htmlentities($_POST['tipo_informe']));

$sqlus =" SELECT nombres.nombres, nombres.paterno, nombres.materno FROM usuarios, nombres ";
$sqlus.=" WHERE usuarios.idnombre=nombres.idnombre AND usuarios.idusuario='$idusuario_ss' ";

$resultus = mysqli_query($link,$sqlus);
$rowus = mysqli_fetch_array($resultus);

$elaborador_u = $rowus[0]." ".$rowus[1]." ".$rowus[2];

$file_name = $_FILES['file']['name'];

$directorio = 'files/';

if ($codigo =='' || $gestion =='' || $idempresa =='' || $tipo_informe =='') {

    header("Location:mostrar_operacional_uai.php");

} else {
   
        if ($file_name != '' || $file_name != null) {

                    $subir_archivo = $directorio.basename($file_name);

                if (move_uploaded_file($_FILES['file']['tmp_name'],'../'.$subir_archivo)) {

                    $ins = $link->query(" UPDATE uai_trabajo SET codigo='$codigo', gestion='$gestion', idempresa='$idempresa', tipo_informe='$tipo_informe', idtipo_hojaruta='2', elaborador='$elaborador_u', idusuario='$idusuario_ss', url='$subir_archivo' WHERE iduai_trabajo='$iduai_trabajo_ss' "); 

                    header("Location:mostrar_operacional_uai.php");
      
                    } else {
                    
                        header("Location:mostrar_operacional_uai.php");
                    }
                }
        else
            {
                $actualiza = $link->query("UPDATE uai_trabajo SET codigo='$codigo', gestion='$gestion', idempresa='$idempresa', tipo_informe='$tipo_informe', idtipo_hojaruta='2', elaborador='$elaborador_u', idusuario='$idusuario_ss' WHERE iduai_trabajo='$iduai_trabajo_ss'"); 

                header("Location:mostrar_operacional_uai.php");        
            }  

}

?>