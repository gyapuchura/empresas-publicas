<?php include("../cabf.php");?>
<?php include("../inc.config.php");?>
<?php
date_default_timezone_set('America/La_Paz');

$fecha 			    = date("Y-m-d");
$idusuario_ss       = $_SESSION['idusuario_ss'];
$perfil_ss          = $_SESSION['perfil_ss'];

$idcorres_ss        = $_SESSION['idcorres_ss'];
$idform_archivo_ss  = $_SESSION['idform_archivo_ss'];
$idempresa_ss       = $_SESSION['idempresa_ss'];
$codigo_form_ss     = $_SESSION['codigo_form_ss'];

$gestion            = date("Y");

$idcorres_ss        = $_SESSION['idcorres_ss'];

$idserie_documental = $_POST['idserie_documental'];
$iddepartamento     = $_POST['iddepartamento'];
$idcaja             = $_POST['idcaja'];

$fecha_com        = $_POST['fecha_despacho'];
$fecha_i          = explode('/',$fecha_com);
$fecha_despacho   = $fecha_i[2].'-'.$fecha_i[1].'-'.$fecha_i[0];

$fecha_hr         = $_POST['fecha_hr'];

$idtomo           = $_POST['idtomo'];
$contenido        = $_POST['contenido'];
$no_fojas         = $link->real_escape_string(htmlentities($_POST['no_fojas']));
$idcubierta       = $_POST['idcubierta'];
$cantidad         = $link->real_escape_string(htmlentities($_POST['cantidad']));
$descripcion      = $link->real_escape_string(htmlentities($_POST['descripcion']));
$idobserv_archivo = $_POST['idobserv_archivo'];
$comentario_archivo = $link->real_escape_string(htmlentities($_POST['comentario_archivo']));

if ( $idserie_documental == '' || $iddepartamento == '' || $descripcion == '' || $comentario_archivo == ''|| $fecha_despacho == '0000-00-00' || $idcaja == '' || $idobserv_archivo == '' || $idcubierta == '' || $cantidad == '' ) {

    header("Location:concluidas.php");

} else {

 //--------------- GUARDA REGISTRO PARA EL REPORTE SUBCEP -------------------//   

    $sql8 =" UPDATE corres SET idubicacion_archivo='289', fecha_archivo='$fecha', idestado='4', usr_archivo='$idusuario_ss', comentario_archivo='$comentario_archivo' WHERE idcorres='$idcorres_ss' ";
    $result8 = mysqli_query($link,$sql8);

 //---------------- GUARDA REGISTRO PARA EL REPORTE ARCHIVO DOCUMENTAL -----//  

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

    $sql8 =" INSERT INTO item_archivo ( idform_archivo, idempresa, idcorres, correlativo, codigo, idserie_documental, iddepartamento, idcaja, fecha_despacho, ";
    $sql8.=" fecha_hr, idtomo, contenido, no_fojas, idcubierta, cantidad, descripcion, idobserv_archivo, fecha_arch, idusuario_arch ) ";
    $sql8.=" VALUES ('$idform_archivo_ss','$idempresa_ss','$idcorres_ss','$correlativo','$codigo','$idserie_documental','$iddepartamento','$idcaja ','$fecha_despacho', ";
    $sql8.=" '$fecha_hr','$idtomo','$contenido','$no_fojas','$idcubierta','$cantidad','$descripcion','$idobserv_archivo','$fecha','$idusuario_ss')";
    $result8 = mysqli_query($link,$sql8);

    header("Location:mensaje_archivado_ep.php");

}
?>