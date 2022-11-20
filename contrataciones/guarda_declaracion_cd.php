<?php include("../cabf.php");?>
<?php include("../inc.config.php");?>
<?php
date_default_timezone_set('America/La_Paz');

$fecha 	 = date("Y-m-d");
$hora    = date("H:i");
$gestion = date("Y");

$idusuario_ss = $_SESSION['idusuario_ss'];
$perfil_ss    = $_SESSION['perfil_ss'];
$cargo_ss     = $_SESSION['cargo_ss'];
$idempresa_ss = $_SESSION['idempresa_ss'];

$idtipo_presupuesto = $_POST['idtipo_presupuesto'];
$mes                = $_POST['mes'];

if ( $idtipo_presupuesto == '' || $mes == '')
{
header("Location:declaraciones_juradas_vacio_ep.php");
}
else {
    
    //--------- verificamos la existencia de la declaracion anteriror --------//

    $sql = " SELECT iddeclaracion_cd, idempresa, codigo FROM declaracion_cd ";
    $sql.= " WHERE idempresa='$idempresa_ss' AND mes='$mes' AND gestion='$gestion' ";
    $result = mysqli_query($link,$sql);
    if ($row = mysqli_fetch_array($result)){
    mysqli_field_seek($result,0);
    while ($field = mysqli_fetch_field($result)){
    } do {
   
    header("Location:declaracion_existe.php");
    
    } while ($row = mysqli_fetch_array($result));
    } else {
        
    $sqle="SELECT MAX(correlativo) FROM declaracion_cd WHERE idempresa='$idempresa_ss' AND gestion='$gestion'";
    $resulte=mysqli_query($link,$sqle);
    $rowe=mysqli_fetch_array($resulte);

    $correlativo=$rowe[0]+1;
    $codigo="CGE-SCEP/DJ-".$correlativo."/".$gestion;
           
    $sql8 = "INSERT INTO declaracion_cd (idempresa, idtipo_presupuesto, correlativo, codigo, mes, dj_fecha, dj_hora, idusuario, gestion) ";
    $sql8.= "VALUES ('$idempresa_ss','$idtipo_presupuesto','$correlativo','$codigo','$mes','$fecha','$hora','$idusuario_ss','$gestion') ";
    $result8 = mysqli_query($link,$sql8);
    
    $iddeclaracion_cd = mysqli_insert_id($link);
    $_SESSION['iddeclaracion_cd_ss']= $iddeclaracion_cd;
    
    header("Location:declaraciones_juradas_ep.php");
    }

}
?>