<?php include("../cabf.php");?>
<?php include("../inc.config.php");?>
<?php
date_default_timezone_set('America/La_Paz');
$fecha 			= date("Y-m-d");
$idusuario_ss   = $_SESSION['idusuario_ss'];
$perfil_ss      = $_SESSION['perfil_ss'];

$gestion        = date("Y");

$origen         = $_POST['origen'];

$referencia     = $link->real_escape_string($_POST['referencia']);
$no_control     = $link->real_escape_string($_POST['no_control']);
$fecha_com      = $_POST['fecha_corres'];

$fecha_i        = explode('/',$fecha_com);
$fecha_corres   = $fecha_i[2].'-'.$fecha_i[1].'-'.$fecha_i[0];

$anexo          = $link->real_escape_string($_POST['anexo']);
$arch           = $link->real_escape_string($_POST['arch']);
$anillado       = $link->real_escape_string($_POST['anillado']);
$legajo         = $link->real_escape_string($_POST['legajo']);
$ejemplar       = $link->real_escape_string($_POST['ejemplar']);
$engrapado      = $link->real_escape_string($_POST['engrapado']);
$cd             = $link->real_escape_string($_POST['cd']);

$idtipo_hojaruta = $_POST['idtipo_hojaruta'];

//---- VARIABLES EN CASO DE LLEGAR POR MEDIO DE GERENCIA DEPARTAMENTAL -----//

$idempresa_p     = $_POST['idempresa'];
$idempresa_int   = $_POST['idempresa_int'];

$entidad_int     = $_POST['entidad_int'];

$idadjunto_hg    = $_POST['idadjunto_h'];
$idcorres_hg     = $_POST['idcorres_h'];
 
if ($anexo == '' && $arch == '' && $anillado == '' && $legajo == '' && $ejemplar == '' && $engrapado == '' && $cd == '' ) {

    header("Location:mensaje_hojaruta_vacia.php");

    } else {

    if ($referencia == '' || $origen == '' || $idtipo_hojaruta == '')
        {
        header("Location:mensaje_hojaruta_vacia.php");
        }
    else {

        $sql = " SELECT idcorres, gestion, correlativo, idusuario, no_control ";
        $sql.= " FROM corres WHERE  no_control= '$no_control' AND origen='EXTERNA' ";
        $result = mysqli_query($link,$sql);
        if ($row = mysqli_fetch_array($result)){
        mysqli_field_seek($result,0);
        while ($field = mysqli_fetch_field($result)){
        } do {
    
            header("Location:hoja_ruta_existe.php");
        
        } while ($row = mysqli_fetch_array($result));
        } else {

        if ($origen == 'INTERNA' ) {

        $sqlm="SELECT MAX(correlativo) FROM corres WHERE origen='$origen' AND gestion='$gestion' ";
        $resultm=mysqli_query($link,$sqlm);
        $rowm=mysqli_fetch_array($resultm);
        $correlativo=$rowm[0]+1;

        $codigo="SCEP-INT-".$correlativo."/".$gestion;

            if ($idempresa_p != '' ) {

                $sql1 = " SELECT idempresa, razon_social, sigla FROM empresa WHERE idempresa='$idempresa_p' ";
                $result1 = mysqli_query($link,$sql1);
                $row1 = mysqli_fetch_array($result1);
                
                $idempresa   = $idempresa_p;
                $procedencia = $row1[1]; 

            } else {   

                $sql3 = " SELECT idempresa, razon_social, sigla FROM empresa WHERE idempresa='$idempresa_int' ";
                $result3 = mysqli_query($link,$sql3);
                $row3 = mysqli_fetch_array($result3);

                $idempresa   = $idempresa_int;
                $procedencia = $entidad_int." ".$row3[2];
            }

            if ($idadjunto_hg != '' && $idcorres_hg != '' ) {
                $idadjunto_h = $idadjunto_hg;  
                $idcorres_h  = $idcorres_hg;  
            } else {
                $idadjunto_h = '0';
                $idcorres_h  = '0';
            }

        $sql7=" INSERT INTO corres (gestion, correlativo, idusuario, referencia, idempresa, procedencia, no_control, fecha_corres, anexo, arch, anillado, legajo, ejemplar, engrapado, cd, idestado, origen, codigo, idtipo_hojaruta, iddocumento_adj, hora_recib, idadjunto_h, idcorres_h ) ";
        $sql7.=" VALUES ('$gestion','$correlativo','$idusuario_ss','$referencia','$idempresa','$procedencia','$no_control','$fecha_corres','$anexo','$arch','$anillado','$legajo','$ejemplar','$engrapado','$cd','1','$origen','$codigo','$idtipo_hojaruta','3',' ','$idadjunto_h','$idcorres_h') ";
        $result7 = mysqli_query($link,$sql7);

        $idcorres = mysqli_insert_id($link);
        $_SESSION['idcorres_ss']= $idcorres;

        header("Location:mostrar_hoja_ruta.php");

        } else {

            if ($idempresa_p != '') {

                $sql2 = " SELECT idempresa, razon_social, sigla FROM empresa WHERE idempresa='$idempresa_p' ";
                $result2 = mysqli_query($link,$sql2);
                $row2 = mysqli_fetch_array($result2);

                $idempresa   = $idempresa_p;
                $procedencia = $row2[1];

            } else {   

                $sql4 = " SELECT idempresa, razon_social, sigla FROM empresa WHERE idempresa='$idempresa_int' ";
                $result4 = mysqli_query($link,$sql4);
                $row4 = mysqli_fetch_array($result4);

                $idempresa   = $idempresa_int;
                $procedencia = $entidad_int." ".$row4[2];
            }
            
            $sqle = "SELECT MAX(correlativo) FROM corres WHERE origen='$origen' AND gestion='$gestion'";
            $resulte = mysqli_query($link,$sqle);
            $rowe = mysqli_fetch_array($resulte);
            $correlativoe = $rowe[0]+1;

            $codigoe="SCEP-EXT-".$correlativoe."/".$gestion;

            if ($idadjunto_hg != '' && $idcorres_hg != '') {
                $idadjunto_h = $idadjunto_hg;
                $idcorres_h  = $idcorres_hg;      
            } else {
                $idadjunto_h = '0';
                $idcorres_h  = '0';
            }
                
        $sql8="INSERT INTO corres (gestion, correlativo, idusuario, referencia, idempresa, procedencia, no_control, fecha_corres, anexo, arch, anillado, legajo, ejemplar, engrapado, cd, idestado, origen, codigo, idtipo_hojaruta, iddocumento_adj, hora_recib, idadjunto_h, idcorres_h ) ";
        $sql8.="VALUES ('$gestion','$correlativoe','$idusuario_ss','$referencia','$idempresa','$procedencia','$no_control','$fecha_corres','$anexo','$arch','$anillado','$legajo','$ejemplar','$engrapado','$cd','1','$origen','$codigoe','$idtipo_hojaruta','3',' ','$idadjunto_h','$idcorres_h' ) ";
        $result8 = mysqli_query($link,$sql8);
        
        $idcorres = mysqli_insert_id($link);
        $_SESSION['idcorres_ss']= $idcorres;
            
            header("Location:mostrar_hoja_ruta.php");
        }

    }

    }

}
?>