<?php include("../cabf.php");?>
<?php include("../inc.config.php");?>
<?php

date_default_timezone_set('America/La_Paz');

$fecha 		  = date("Y-m-d");
$idusuario_ss = $_SESSION['idusuario_ss'];
$idnombre_ss  = $_SESSION['idnombre_ss'];
$perfil_ss    = $_SESSION['perfil_ss'];

$paterno    = $link->real_escape_string(htmlentities($_POST['paterno']));
$materno    = $link->real_escape_string(htmlentities($_POST['materno']));
$nombres    = $link->real_escape_string(htmlentities($_POST['nombres']));
$ci         = $link->real_escape_string(htmlentities($_POST['ci']));
$exp        = $link->real_escape_string(htmlentities($_POST['exp']));
$usuario_in = $link->real_escape_string(htmlentities($_POST['usuario']));
$pass       = $link->real_escape_string(htmlentities($_POST['password']));

$password   = sha1($pass);

$perfil     = $_POST['perfil'];

$idarea     = $_POST['idarea'];
$idcargo    = $_POST['idcargo'];
$idempresa  = $_POST['idempresa'];

$cargo_e    = $link->real_escape_string(htmlentities($_POST['cargo_e']));


if ($paterno == '' || $materno == '' || $nombres == '' || $ci == '' || $exp  == '' || $usuario_in  == '' || $pass == '' )
{
header("Location:nuevo_usuario.php");
}
else {

$sql8 = " SELECT idnombre, paterno, materno, nombres, ci FROM nombres WHERE ci='$ci' ";
$result8 = mysqli_query($link,$sql8);

    if ($row8 = mysqli_fetch_array($result8)) {
    header("Location:usuario_existe.php");
    }

    else {
        
    $sql9 = " SELECT idusuario, usuario FROM usuarios WHERE usuario='$usuario_in' ";
    $result9 = mysqli_query($link,$sql9);

    if ($row9 = mysqli_fetch_array($result9)) {
        header("Location:usuario_nombre_existe.php");
    } else {

/* Insertamos los nuevos datos */
$sql0 = " INSERT INTO nombres ( paterno, materno, nombres, ci, exp ) ";
$sql0.= " VALUES ('$paterno', '$materno', '$nombres', '$ci', '$exp') ";
$result0 = mysqli_query($link,$sql0);

$idnombre_in=mysqli_insert_id($link);

if ($perfil == "DAF-EMPRESA" || $perfil == "UAI-EMPRESA") {
    
    $sql7 = " INSERT INTO usuarios (idnombre, usuario, password, fecha, condicion, perfil, idarea, idcargo, idempresa, cargo_e ) ";
    $sql7.= " VALUES ('$idnombre_in','$usuario_in','$password','$fecha','ACTIVO','$perfil','0','0','$idempresa','$cargo_e')";
    $result7 = mysqli_query($link,$sql7);   
    /* redireccionamos a la pagina de usuarios registrados */
    header("Location:usuarios.php");
    
} else {
    $sql7 = " INSERT INTO usuarios (idnombre, usuario, password, fecha, condicion, perfil, idarea, idcargo, idempresa, cargo_e ) ";
    $sql7.= "  VALUES ('$idnombre_in','$usuario_in','$password','$fecha','ACTIVO','$perfil','$idarea','$idcargo','0','')";
    $result7 = mysqli_query($link,$sql7);   
    /* redireccionamos a la pagina de usuarios registrados */
    header("Location:usuarios.php");
}
}
}
}
?>