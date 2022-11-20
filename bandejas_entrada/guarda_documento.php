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

$ref              = $link->real_escape_string($_POST['ref']);
$destino          = $link->real_escape_string($_POST['destino']);

$idcorres_ss      = $_SESSION['idcorres_ss'];
$idempresa_ss     = $_SESSION['idempresa_ss'];


if ($idtipo_documento == '' || $cite == '' || $fecha_doc == '' || $ref == '' || $destino == '')

    {
    header("Location:deriva_hoja_ruta_corres.php");
    }

else {   

    //----- Desde aqui verificamos si se trata de una emopresa o otra entidad publica ------//

    if ($idempresa_ss != "555") {

        $idempresa = $idempresa_ss;
    
        $sql1 = " SELECT idempresa, razon_social, sigla FROM empresa WHERE idempresa='$idempresa' ";
        $result1 = mysqli_query($link,$sql1);
        $row1 = mysqli_fetch_array($result1);
    
        $entidad_destino = $row1[1];
    
    } else {   

        $idempresa = '555';
        
        $sql_p = " SELECT idcorres, procedencia FROM corres WHERE idcorres='$idcorres_ss' ";
        $result_p = mysqli_query($link,$sql_p);
        $row_p = mysqli_fetch_array($result_p);

        $entidad_destino = $row_p[1];
    }
    //----- Hasta aqui verificamos si se trata de una emopresa o otra entidad publica ------//

        $sql8 =" INSERT INTO adjunto_hr ( idcorres, idtipo_documento, cite, ref, fecha, destino, idusuario, idempresa, entidad_destino ) ";
        $sql8.=" VALUES ( '$idcorres_ss','$idtipo_documento','$cite','$ref','$fecha_doc','$destino','$idusuario_ss','$idempresa','$entidad_destino' ) ";
        $result8 = mysqli_query($link,$sql8);
        
        header("Location:deriva_hoja_ruta_corres.php");

    }
?>