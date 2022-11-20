<?php include("../cabf.php");?>
<?php include("../inc.config.php");?>
<?php
date_default_timezone_set('America/La_Paz');

$fecha 		  = date("Y-m-d");

$idusuario_ss = $_SESSION['idusuario_ss'];
$perfil_ss    = $_SESSION['perfil_ss'];

$idcorres_ss        = $_SESSION['idcorres_ss'];
$idderiva_corres_ss = $_SESSION['idderiva_corres_ss'];

$gestion       = date("Y");

$idusuariod    = $_POST['idusuariod'];
$idinstruccion = $_POST['idinstruccion'];

$comentario    = $link->real_escape_string($_POST['comentario']);

if ( $idusuariod == '' || $idinstruccion == '' || $comentario == '' )

{

header("Location:deriva_hoja_ruta_corres.php");

}
else {

//---- veirficamos que le usuario destino sea de otra unidad externa a la SCEP para concluir la hoja de ruta ------//

$sql_a = " SELECT usuarios.idusuario, usuarios.idarea, nombres.titulo, nombres.nombres, nombres.paterno, nombres.materno, area.area, direccion.direccion ";
$sql_a.= " FROM usuarios, area, direccion, nombres WHERE usuarios.idarea=area.idarea AND area.iddireccion=direccion.iddireccion ";
$sql_a.= " AND usuarios.idnombre=nombres.idnombre AND usuarios.idusuario='$idusuariod' ";
$result_a = mysqli_query($link,$sql_a);
$row_a = mysqli_fetch_array($result_a);

if ($row_a[1] == "12") {

    //---- El usuario destino PERTENECE a la SCEP ------//

$sql3 = "UPDATE deriva_corres SET derivada='SI', recibida='SI' WHERE idderiva_corres='$idderiva_corres_ss'";
$result3 = mysqli_query($link,$sql3);


$sql7 = " INSERT INTO deriva_corres (idcorres, idusuarioo, idusuariod, idinstruccion, comentario, fecha_deriva, fecha_recibe, derivada, recibida) ";
$sql7.= " VALUES ('$idcorres_ss','$idusuario_ss','$idusuariod','$idinstruccion','$comentario','$fecha','1111-11-11','SI','NO') ";
$result7 = mysqli_query($link,$sql7);

$_SESSION['idusuariod_ss'] = $idusuariod;

header("Location:derivacion_exitosa_hr.php");

} else {

    //------------------------ El usuario destino corresponde a otra Unidad Externa a la SCEP ------------------------//

    $comentario_conclusion = "La hoja de ruta fue derivada a ".$row_a[2]." ".$row_a[3]." ".$row_a[4]." ".$row_a[5]." de ".$row_a[6]." - ".$row_a[7];

    $sql3 = "UPDATE deriva_corres SET derivada='SI', recibida='SI' WHERE idderiva_corres='$idderiva_corres_ss'";
    $result3 = mysqli_query($link,$sql3);

    $sql7 = " INSERT INTO deriva_corres (idcorres, idusuarioo, idusuariod, idinstruccion, comentario, fecha_deriva, fecha_recibe, derivada, recibida) ";
    $sql7.= " VALUES ('$idcorres_ss','$idusuario_ss','$idusuariod','$idinstruccion','$comentario','$fecha','$fecha','NO','NO') ";
    $result7 = mysqli_query($link,$sql7);

    $_SESSION['idusuariod_ss'] = $idusuariod;

    $sql7 = " UPDATE corres SET idestado='3', comentario_conclusion='$comentario_conclusion' WHERE idcorres='$idcorres_ss' ";
    $result7 = mysqli_query($link,$sql7);

header("Location:derivacion_exitosa_hr.php");

}
}
?>