<?php include("../cabf.php");?>
<?php include("../inc.config.php");?>
<?php
date_default_timezone_set('America/La_Paz');

$fecha 			  = date("Y-m-d");
$idusuario_ss     = $_SESSION['idusuario_ss'];
$perfil_ss        = $_SESSION['perfil_ss'];

$idtipo_documento = $_POST['idtipo_documento'];

$cite             = $link->real_escape_string($_POST['cite']);

$f_doc	          = $_POST['fecha_doc'];
$fecha_i          = explode('/',$f_doc);
$fecha_doc        = $fecha_i[2].'-'.$fecha_i[1].'-'.$fecha_i[0];

$idusuario_r      = $_POST['idusuario_r'];
$idempresa_p	  = $_POST['idempresa'];

$ent_emp          = $link->real_escape_string($_POST['entidad_int']);
$ref              = $link->real_escape_string($_POST['ref']);
$destino          = $link->real_escape_string($_POST['destino']);

$idcorres_v       = $_POST['idcorres'];

$hoja_ruta_v      = $link->real_escape_string($_POST['hoja_ruta']);

$no_interno       = $link->real_escape_string($_POST['no_interno']);


$desp	          = $_POST['despachado'];
$fecha_d          = explode('/',$desp);
$despachado       = $fecha_d[2].'-'.$fecha_d[1].'-'.$fecha_d[0];

$observacion      = $link->real_escape_string($_POST['observacion']);

if ($idtipo_documento == '' || $cite == '' || $fecha_doc == '' || $ref == '' )

    {
    header("Location:nuevo_registro_documento.php");
    }
    
else {

    if ($idempresa_p != "") {

        $idempresa = $idempresa_p;
    
        $sql1 = " SELECT idempresa, razon_social, sigla FROM empresa WHERE idempresa='$idempresa' ";
        $result1 = mysqli_query($link,$sql1);
        $row1 = mysqli_fetch_array($result1);
    
        $entidad_destino = $row1[1];
    
    } else {   
        $idempresa = '555';
        $entidad_destino = $ent_emp;
    }

    if ($idcorres_v != "") {

        $sql_v = " SELECT idcorres, no_control FROM corres WHERE idcorres='$idcorres_v' ";
        $result_v = mysqli_query($link,$sql_v);
        $row_v = mysqli_fetch_array($result_v);
    
        $hoja_ruta = $row_v[1];
        $idcorres = $idcorres_v;

    } else {
        $hoja_ruta = $hoja_ruta_v; 
        $idcorres = '0';
    }
    
    $sql8 =" INSERT INTO adjunto_hr (idcorres, idtipo_documento, cite, ref, fecha, destino, idusuario, idempresa, entidad_destino, hoja_ruta, no_interno, despachado, observacion) ";
    $sql8.=" VALUES ('$idcorres','$idtipo_documento','$cite','$ref','$fecha_doc','$destino','$idusuario_r','$idempresa','$entidad_destino','$hoja_ruta','$no_interno','$despachado','$observacion') ";
    $result8 = mysqli_query($link,$sql8);
        
    header("Location:documentos_emitidos.php");

    }
?>