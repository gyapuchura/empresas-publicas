<?php include("../cabf.php");?>
<?php include("../inc.config.php");?>
<?php
date_default_timezone_set('America/La_Paz');

$fecha 			   = date("Y-m-d");
$gestion           = date("Y");
$idusuario_ss      = $_SESSION['idusuario_ss'];
$perfil_ss         = $_SESSION['perfil_ss'];

$idcorres_ss       = $_SESSION['idcorres_ss'];
$idform_archivo_ss = $_SESSION['idform_archivo_ss'];
$idempresa_ss      = $_SESSION['idempresa_ss'];
$codigo_form_ss    = $_SESSION['codigo_form_ss'];
$iditem_archivo_ss = $_SESSION['iditem_archivo_ss'];

$idcorres_ss       =  $_SESSION['idcorres_ss'];

$idserie_documental = $_POST['idserie_documental'];
$iddepartamento     = $_POST['iddepartamento'];
$idcaja             = $_POST['idcaja'];

$fecha_com          = $_POST['fecha_despacho'];
$fecha_i            = explode('/',$fecha_com);
$fecha_despacho     = $fecha_i[2].'-'.$fecha_i[1].'-'.$fecha_i[0];

$idtomo             = $_POST['idtomo'];
$no_fojas           = $link->real_escape_string(htmlentities($_POST['no_fojas']));
$idcubierta         = $_POST['idcubierta'];
$cantidad           = $link->real_escape_string(htmlentities($_POST['cantidad']));
$descripcion        = $link->real_escape_string(htmlentities($_POST['descripcion']));
$idobserv_archivo   = $_POST['idobserv_archivo'];
$comentario_archivo = $link->real_escape_string(htmlentities($_POST['comentario_archivo']));

 //--------------- ACTUALIZAMOS LOS DATOS A MODIFICAR EN ARCHIVO DOCUMENTAL -------------------//   

    $sql8 =" UPDATE item_archivo SET idserie_documental='$idserie_documental', iddepartamento='$iddepartamento', idcaja='$idcaja', fecha_despacho='$fecha_despacho', idtomo='$idtomo', ";
    $sql8.=" no_fojas='$no_fojas', idcubierta='$idcubierta', cantidad='$cantidad', descripcion='$descripcion', idobserv_archivo='$idobserv_archivo' ";
    $sql8.=" WHERE iditem_archivo='$iditem_archivo_ss' ";
    $result8 = mysqli_query($link,$sql8);

    $sql9 = " UPDATE corres SET comentario_archivo='$comentario_archivo' WHERE idcorres='$idcorres_ss' ";
    $result9 = mysqli_query($link,$sql9);

 //---------------- redirecciona a la pagina de modificcion -----//  

 header("Location:prepara_archivo_ep_mod.php");

?>