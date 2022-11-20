<?php include("../cabf.php");?>
<?php include("../inc.config.php");?>
<?php

date_default_timezone_set('America/La_Paz');
$fecha 		  = date("Y-m-d");

$idusuario_ss = $_SESSION['idusuario_ss'];
$perfil_ss    = $_SESSION['perfil_ss'];

$idusuario_adm_ss  =  $_SESSION['idusuario_adm_ss'];
$idnombre_adm_ss   =  $_SESSION['idnombre_adm_ss'];

$gestion     = date("Y");


$usuario   = $link->real_escape_string(htmlentities($_POST['usuario']));
$pass      = $link->real_escape_string(htmlentities($_POST['password']));
$password  = sha1($pass);
$condicion = $_POST['condicion'];
$perfil    = $_POST['perfil'];

$idcargo   = $link->real_escape_string($_POST['idcargo']);

$usuario_e   = $link->real_escape_string(htmlentities($_POST['usuario_e']));
$pass_e      = $link->real_escape_string(htmlentities($_POST['password_e']));
$password_e  = sha1($pass_e);
$condicion_e = $_POST['condicion_e'];
$perfil_e    = $_POST['perfil_e'];
$idempresa   = $_POST['idempresa'];
$cargo_e     = $link->real_escape_string(htmlentities($_POST['cargo_e']));

if ($perfil_e == 'DAF-EMPRESA' || $perfil_e == 'UAI-EMPRESA' ) {

    $sql8 =" UPDATE usuarios SET usuario='$usuario_e', password='$password_e', condicion='$condicion_e', perfil='$perfil_e', idcargo='0', ";
    $sql8.=" idempresa='$idempresa', cargo_e='$cargo_e' WHERE idusuario='$idusuario_adm_ss' ";
    $result8 = mysqli_query($link,$sql8);
        
    header("Location:modifica_usuario.php");

} else {
    
    $sql8 =" UPDATE usuarios SET usuario='$usuario', password='$password', condicion='$condicion', perfil='$perfil', idcargo='$idcargo' ";
    $sql8.=" WHERE idusuario='$idusuario_adm_ss' ";
    $result8 = mysqli_query($link,$sql8);
    
    header("Location:modifica_usuario.php");
}
?>