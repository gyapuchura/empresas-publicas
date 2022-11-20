<?php include("../cabf.php");?>
<?php include("../inc.config.php");?>
<?php
date_default_timezone_set('America/La_Paz');

$fecha 	 = date("Y-m-d");
$hora    = date("H:i");
$gestion = date("Y");

$idusuario_ss    = $_SESSION['idusuario_ss'];
$idnombre_ss     = $_SESSION['idnombre_ss'];
$perfil_ss       = $_SESSION['perfil_ss'];

$iddeclaracion_cd_ss = $_SESSION['iddeclaracion_cd_ss'];
$idempresa_ss        = $_SESSION['idempresa_ss'];
$usuarioe_ss         = $_SESSION['usuarioe_ss'];
$codigo_ss           = $_SESSION['codigo_ss'];

$cuce       = $link->real_escape_string(htmlentities($_POST['cuce']));
$codigo_int = $link->real_escape_string(htmlentities($_POST['codigo_int']));

$idmodalidad_cd      = $_POST['idmodalidad_cd'];
$idsubmodalidad      = $_POST['idsubmodalidad_cd'];

if ($idsubmodalidad == '') { 
    $idsubmodalidad_cd = '0';   
} else {
    $idsubmodalidad_cd = $idsubmodalidad;
}

$idtipo_contratacion = $_POST['idtipo_contratacion'];

$objeto_cd   = $link->real_escape_string(htmlentities($_POST['objeto_cd']));
$importe     = $link->real_escape_string(htmlentities($_POST['importe']));
$proveedor   = $link->real_escape_string(htmlentities($_POST['proveedor']));
$plazo       = $link->real_escape_string(htmlentities($_POST['plazo']));
$reglamento_especifico = $link->real_escape_string(htmlentities($_POST['reglamento_especifico']));

$sql_ep =" SELECT idempresa, sigla FROM empresa WHERE idempresa='$idempresa_ss' ";
$result_ep = mysqli_query($link,$sql_ep);
$row_ep = mysqli_fetch_array($result_ep);

$sigla = $row_ep[1];

if ($cuce == '' || $codigo_int == '' || $objeto_cd == '' || $importe == '' || $proveedor == '' || $plazo == '' || $idmodalidad_cd == '')
{
header("Location:nuevo_formulario_cd.php");
}
else {
    
    //--------- verificamos la existencia de la declaracion anteriror --------//

    $sql = " SELECT idformulario_cd, iddeclaracion_cd, idempresa FROM formulario_cd ";
    $sql.= " WHERE cuce='$cuce' AND gestion='$gestion' ";
    $result = mysqli_query($link,$sql);
    if ($row = mysqli_fetch_array($result)) {

        header("Location:formulario_cd_existe.php");

    } else {
             
    $sqle="SELECT MAX(correlativo) FROM formulario_cd WHERE idempresa='$idempresa_ss' AND gestion='$gestion'";
    $resulte=mysqli_query($link,$sqle);
    $rowe=mysqli_fetch_array($resulte);

    $correlativo=$rowe[0]+1;
    $codigo_e="F-3009-".$sigla."-".$correlativo."/".$gestion;
           
    $sql8 = " INSERT INTO formulario_cd (iddeclaracion_cd, idempresa, correlativo, codigo, cuce, codigo_int, objeto_cd, idmodalidad_cd, idsubmodalidad_cd, idtipo_contratacion, importe, proveedor, plazo, reglamento_especifico, idusuario, fecha_form, gestion, estado ) ";
    $sql8.= " VALUES ('$iddeclaracion_cd_ss','$idempresa_ss','$correlativo','$codigo_e','$cuce','$codigo_int ','$objeto_cd','$idmodalidad_cd','$idsubmodalidad_cd','$idtipo_contratacion','$importe','$proveedor','$plazo','$reglamento_especifico','$idusuario_ss','$fecha','$gestion','' ) ";
    $result8 = mysqli_query($link,$sql8);
    
    $idformulario_cd = mysqli_insert_id($link);
    $_SESSION['idformulario_cd_ss'] = $idformulario_cd;
    $_SESSION['codigo_form_ss'] = $codigo_e;
  
    //------ ITERACIONES PARA GUARDAR LOS 14 PUNTOS DEL FORMULARIO 3009 -------//

    $numero=1;
    $sql4 =" SELECT idpunto_cd, indice, punto_cd FROM punto_cd ";
    $result4 = mysqli_query($link,$sql4);
    if ($row4 = mysqli_fetch_array($result4)){
    mysqli_field_seek($result4,0);
    while ($field4 = mysqli_fetch_field($result4)){
    } do { 

        if ($numero <= '5') {
            $idetapa_cd = 1 ;
        } else {
            $idetapa_cd = 2 ;
        }

        $sql2 = " INSERT INTO registro_cd (idempresa, iddeclaracion_cd, idformulario_cd, idetapa_cd, idpunto_cd, idcumplimiento, estado_eval ) ";
        $sql2.= " VALUES ('$idempresa_ss','$iddeclaracion_cd_ss','$idformulario_cd', '$idetapa_cd','$row4[0]','0','REGISTRADO' ) ";
        $result2 = mysqli_query($link,$sql2);
        $idregistro_cd = mysqli_insert_id($link);

        $sql5 = " SELECT idsubpunto_cd, idpunto_cd, subindice, subpunto_cd FROM subpunto_cd WHERE idpunto_cd ='$row4[0]' ";
        $result5 = mysqli_query($link,$sql5);
        if ($row5 = mysqli_fetch_array($result5)){
        mysqli_field_seek($result5,0);
        while ($field5 = mysqli_fetch_field($result5)){
        } do { 

            $sql2 = " INSERT INTO subregistro_cd (idempresa, iddeclaracion_cd, idformulario_cd, idregistro_cd, idsubpunto_cd, documento_cd, fecha_doc_cd, justificacion, aclaracion ) ";
            $sql2.= " VALUES ('$idempresa_ss','$iddeclaracion_cd_ss','$idformulario_cd', '$idregistro_cd','$row5[0]','','','','' ) ";
            $result2 = mysqli_query($link,$sql2);

        }
        while ($row5 = mysqli_fetch_array($result5));
      } else {
      }      
        $numero=$numero+1;
       }
        while ($row4 = mysqli_fetch_array($result4));
        } else {
        }
        header("Location:formulario_cd.php");
    }
   
    }

?>