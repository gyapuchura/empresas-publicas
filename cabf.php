<?php
//VALIDA SESSION/////////////////////////
session_start();
if($_SESSION['idusuario_ss'] == "" || $_SESSION['idnombre_ss'] == "" || $_SESSION['perfil_ss'] == ""){
	header("Location:../index.php");
}
/////////////////////////////////////////

?>