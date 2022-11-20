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
    $sql4 =" SELECT subregistro_cd.idsubregistro_cd, subpunto_cd.subindice, subpunto_cd.subpunto_cd, subregistro_cd.documento_cd, subregistro_cd.fecha_doc_cd, subregistro_cd.justificacion, subregistro_cd.aclaracion ";
    $sql4.=" FROM subregistro_cd, subpunto_cd WHERE subregistro_cd.idsubpunto_cd=subpunto_cd.idsubpunto_cd AND subregistro_cd.idformulario_cd ='$idformulario_cd_ss' AND subregistro_cd.documento_cd ='' "; 
    $result4 = mysqli_query($link,$sql4);
    if ($row4 = mysqli_fetch_array($result4)){
    mysqli_field_seek($result4,0);
    while ($field4 = mysqli_fetch_field($result4)){
    } do { 
        header("Location:formulario_cd_subverificado.php");
    }
    while ($row4 = mysqli_fetch_array($result4));
    } else {
            header("Location:formulario_revision.php");
    }
?>