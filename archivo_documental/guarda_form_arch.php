<?php include("../cabf.php");?>
<?php include("../inc.config.php");?>
<?php
date_default_timezone_set('America/La_Paz');
$fecha   = date("Y-m-d");
$gestion = date("Y");

$idusuario_ss  = $_SESSION['idusuario_ss'];
$perfil_ss     = $_SESSION['perfil_ss'];

$idempresa   = $_POST['idempresa'];

if ($idempresa == '' )
{
header("Location:nuevo_formulario_arch.php");
}
else {

    $sql = "  SELECT idempresa, idusuario, fecha_form FROM form_archivo ";
    $sql.= "  WHERE idempresa='$idempresa'AND gestion='$gestion' ";
    $result = mysqli_query($link,$sql);
    if ($row = mysqli_fetch_array($result)){
    mysqli_field_seek($result,0);
    while ($field = mysqli_fetch_field($result)){
    } do {
   
         header("Location:formulario_arch_existe.php");
    
    } while ($row = mysqli_fetch_array($result));
    } else {
        
    $sqle="SELECT MAX(correlativo) FROM form_archivo WHERE gestion='$gestion'";
    $resulte=mysqli_query($link,$sqle);
    $rowe=mysqli_fetch_array($resulte);

    $correlativo = $rowe[0]+1;

    $sql_s="SELECT idempresa, sigla FROM empresa WHERE idempresa='$idempresa'";
    $result_s=mysqli_query($link,$sql_s);
    $row_s=mysqli_fetch_array($result_s);

    $sigla = $row_s[1];

    $codigo="SCEP-".$sigla."-".$correlativo."/".$gestion;
           
    $sql8 ="INSERT INTO form_archivo (correlativo, codigo, idempresa, idusuario, fecha_form, gestion ) ";
    $sql8.=" VALUES ('$correlativo','$codigo','$idempresa','$idusuario_ss','$fecha','$gestion' ) ";
    $result8 = mysqli_query($link,$sql8);
    
    header("Location:formularios_archivo.php");
    }
}
?>