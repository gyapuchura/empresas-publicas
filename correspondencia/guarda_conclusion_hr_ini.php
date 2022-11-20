<?php include("../cabf.php");?>
<?php include("../inc.config.php");?>
<?php
date_default_timezone_set('America/La_Paz');

$fecha 		  = date("Y-m-d");
$idusuario_ss = $_SESSION['idusuario_ss'];
$perfil_ss    = $_SESSION['perfil_ss'];
$perfil_ss    = $_SESSION['perfil_ss'];
$idarea_ss    = $_SESSION['idarea_ss'];

$idcorres_ss           = $_SESSION['idcorres_ss'];
$idderiva_corres_ss    = $_SESSION['idderiva_corres_ss'];

$comentario_conclusion = $_POST['comentario_conclusion'];

$idcontrol             = $_POST['idcontrol'];
$idtipo_hojaruta       = $_POST['idtipo_hojaruta'];
$comentario_conclusion = $_POST['comentario_conclusion'];


$sql3 = "UPDATE deriva_corres SET derivada='NO', recibida='NO' WHERE idderiva_corres='$idderiva_corres_ss'";
$result3 = mysqli_query($link,$sql3);

$sql7 = " UPDATE corres SET idestado='3', comentario_conclusion='$comentario_conclusion' WHERE idcorres='$idcorres_ss' ";
$result7 = mysqli_query($link,$sql7);

//---- buscamos el documento elaborado INFORME Y/O OFICIO ----//

$sql_adj =" SELECT adjunto_hr.idadjunto_hr, adjunto_hr.idcorres, tipo_documento.tipo_documento, adjunto_hr.cite, adjunto_hr.ref, adjunto_hr.fecha, adjunto_hr.destino, ";
$sql_adj.=" adjunto_hr.entidad_destino, adjunto_hr.hoja_ruta, adjunto_hr.idusuario, adjunto_hr.idempresa FROM adjunto_hr, tipo_documento WHERE adjunto_hr.idtipo_documento=tipo_documento.idtipo_documento ";
$sql_adj.=" AND adjunto_hr.idtipo_documento='2' AND adjunto_hr.idcorres = '$idcorres_ss'";
$result_adj = mysqli_query($link,$sql_adj);

    if ($row_adj = mysqli_fetch_array($result_adj)){

        $codigo_inf   = $row_adj[3];
        $gestion      = date("Y");
        $idempresa    = $row_adj[10];
        $tipo_informe = $row_adj[4];       
        $idelaborador = $row_adj[9];

        $sqlus =" SELECT nombres.nombres, nombres.paterno, nombres.materno FROM usuarios, nombres ";
        $sqlus.=" WHERE usuarios.idnombre=nombres.idnombre AND usuarios.idusuario='$idelaborador' ";
        $resultus = mysqli_query($link,$sqlus);
        $rowus = mysqli_fetch_array($resultus);

        $elaborador = $rowus[0]." ".$rowus[1]." ".$rowus[2];

    if ($idcontrol == '1') {
        
        $sql9 = " INSERT INTO uai_trabajo ( codigo, gestion, idempresa, tipo_informe, idtipo_hojaruta, elaborador, idusuario, url ) ";
        $sql9.= " VALUES ( '$codigo_inf','$gestion','$idempresa','$tipo_informe','$idtipo_hojaruta','$elaborador','$idelaborador','' ) ";
        $result9 = mysqli_query($link,$sql9);
        
        header("Location:mostrar_conclusion_hr_ini.php");

    } else {
    
        header("Location:mostrar_conclusion_hr_ini.php");

    }

} 
else {
        header("Location:mostrar_conclusion_hr_ini.php");
}


?>