<?php include("../cabf.php");?>
<?php include("../inc.config.php");?>
<?php
date_default_timezone_set('America/La_Paz');
$fecha_ram = date("Ymd");
$fecha 		 = date("Y-m-d");
$gestion   = date("Y");

$idusuario_ss  =  $_SESSION['idusuario_ss'];
$idnombre_ss   =  $_SESSION['idnombre_ss'];
$perfil_ss     =  $_SESSION['perfil_ss'];

if($_SESSION['perfil_ss'] != "DAF-EMPRESA"){ 		
	header("Location:../index.php");	
}
$iddeclaracion_cd_ss =  $_SESSION['iddeclaracion_cd_ss'];
$idempresa_ss        =  $_SESSION['idempresa_ss'];
$codigo_ss           =  $_SESSION['codigo_ss'];
$idformulario_cd_ss  =  $_SESSION['idformulario_cd_ss'];
$codigo_form_ss      =  $_SESSION['codigo_form_ss'];

$sql1 =" SELECT idformulario_cd, iddeclaracion_cd, idempresa, correlativo, codigo, cuce, codigo_int, objeto_cd, importe, proveedor, ";
$sql1.=" plazo, reglamento_especifico, idusuario, fecha_form, gestion, idmodalidad_cd, idtipo_contratacion, idsubmodalidad_cd";
$sql1.=" FROM formulario_cd WHERE idempresa ='$idempresa_ss' AND iddeclaracion_cd='$iddeclaracion_cd_ss' AND idformulario_cd='$idformulario_cd_ss'";
$result1 = mysqli_query($link,$sql1);
$row1 = mysqli_fetch_array($result1);

$sql_e    = " SELECT idempresa, razon_social, cod_presup, sigla FROM empresa WHERE idempresa='$idempresa_ss' ";
$result_e = mysqli_query($link,$sql_e);
$row_e    = mysqli_fetch_array($result_e);
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<title>SUBCONTRALORIA EMPRESAS PUBLICAS</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="" />
<meta name="author" content="http://webthemez.com" />
<!-- css -->
<link href="../css/bootstrap.min.css" rel="stylesheet" />
<link href="../css/fancybox/jquery.fancybox.css" rel="stylesheet">
<link href="../css/flexslider.css" rel="stylesheet" />
<link href="../css/style.css" rel="stylesheet" />
<link rel="stylesheet" href="../css/dataTables.bootstrap.min.css">
</head>
<body>

<div id="wrapper">
<div class="topbar">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
         <p class="pull-left hidden-xs">CONTRALORIA GENERAL DEL ESTADO</p>
        <p class="pull-right"><i class="fa fa-user"></i>
<?php

$sqlus =" SELECT nombres, paterno, materno FROM nombres WHERE idnombre='$idnombre_ss'";
$resultus = mysqli_query($link,$sqlus);
$rowus = mysqli_fetch_array($resultus);
?>
        <?php echo $rowus[0];?> <?php echo $rowus[1];?> <?php echo $rowus[2];?></p>
      </div>
    </div>
  </div>
</div>

<!-- start header -->
	<header>
        <div class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                  <a class="navbar-brand" href="../intranet.php"><img src="../img/logo.png" alt="logo"/></a>
                </div>
                <?php include("../menu_ce.php");?>
            </div>
        </div>
	</header>
	<!-- end header -->

<section id="inner-headline">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h2 class="pageTitle">FORMULARIO F-3009</h2>
			</div>
		</div>
	</div>
</section>
<div class="container contenido">

<div class="row"> 
<div class="col-md-4"></div> 
<div class="col-md-4"><h2 align="center"><?php echo $codigo_form_ss;?></h2></div>
<div class="col-md-4"></div> 
</div>

<div class="row"> 
<div class="col-md-12"><h3>I. DATOS BÁSICOS DE LA CONTRATACIÓN</h3></div>
</div>
<!------------ Datos Basicos de la Contratacion FORMULARIO MOSTRADO --------------->

<form name="FORM9" action="guarda_formulario_cd_elab.php" method="post">

<div class="box-area">

<div class="row">
  <div class="col-md-2"><h4>EMPRESA:</h4></div>
  <div class="col-md-3"><h4 class="text-muted"><?php echo $row_e[1];?></h4></div>  
  <div class="col-md-2"><h4>CÓDIGO INSTITUCIONAL:</h4></div>
  <div class="col-md-1"><h4 class="text-muted"><?php echo $row_e[2];?></h4></div>  
  <div class="col-md-1"><h4>CUCE:</h4></div>
  <div class="col-md-3"><input type="text" class="form-control" name="cuce" value="<?php echo $row1[5];?>" required></div>  
</div>

<div class="row">
  <div class="col-md-2"><h4>CÓDIGO INTERNO:</h4></div>
  <div class="col-md-3"><input type="text" class="form-control" name="codigo_int" value="<?php echo $row1[6];?>" required></div>  
  <div class="col-md-2"><h4>OBJETO DE CONTRATACIÓN:</h4></div>
  <div class="col-md-5"><textarea class="form-control" rows="3" name="objeto_cd" required><?php echo $row1[7];?></textarea></div>  
</div>

<div class="row">
  <div class="col-md-2"><h4>MODALIDAD DE CONTRATACIÓN:</h4></div>
  <div class="col-md-5">
  <select name="idmodalidad_cd"  id="idmodalidad_cd" class="form-control" required>
			<option selected>Seleccione</option>
			<?php
			$sql_c = " SELECT idmodalidad_cd, modalidad_cd FROM modalidad_cd ";
			$result_c = mysqli_query($link,$sql_c);
			if ($row_c = mysqli_fetch_array($result_c)){
			mysqli_field_seek($result_c,0);
			while ($field_c = mysqli_fetch_field($result_c)){
			} do {
			?>
			<option value="<?php echo $row_c[0];?>" <?php if ($row_c[0]==$row1[15]) echo "selected";?> ><?php echo $row_c[1];?></option>
			<?php
			} while ($row_c = mysqli_fetch_array($result_c));
			} else {
			}
			?>
</select>	
  </div>  
  <div class="col-md-2"><h4>TIPO DE CONTRATACIÓN:</h4></div>
  <div class="col-md-3">
  <select name="idtipo_contratacion"  id="idtipo_contratacion" class="form-control" required>
			<option selected>Seleccione</option>
			<?php
			$sql_c = " SELECT idtipo_contratacion, tipo_contratacion FROM tipo_contratacion WHERE tipo='VALIDO' ";
			$result_c = mysqli_query($link,$sql_c);
			if ($row_c = mysqli_fetch_array($result_c)){
			mysqli_field_seek($result_c,0);
			while ($field_c = mysqli_fetch_field($result_c)){
			} do {
			?>
			<option value="<?php echo $row_c[0];?>" <?php if ($row_c[0]==$row1[16]) echo "selected";?> ><?php echo $row_c[1];?></option>
			<?php
			} while ($row_c = mysqli_fetch_array($result_c));
			} else {
			}
			?>
</select>	 
  </div>  
</div>

<?php

if ($row1[15] == '6') {

//--- ELEGIRA SUBMODALIDAD DE CONTRATACION ------//
?>
<div class="row">
<div class="col-md-2"><h4>OBJETO ESPECĪFICO:</h4></div>
<div class="col-md-10">
<select name="idsubmodalidad_cd"  id="idsubmodalidad_cd" class="form-control" required>
			<option selected>Seleccione</option>
			<?php
			$sql_c = " SELECT idsubmodalidad_cd, submodalidad_cd FROM submodalidad_cd ";
			$result_c = mysqli_query($link,$sql_c);
			if ($row_c = mysqli_fetch_array($result_c)){
			mysqli_field_seek($result_c,0);
			while ($field_c = mysqli_fetch_field($result_c)){
			} do {
			?>
			<option value="<?php echo $row_c[0];?>" <?php if ($row_c[0]==$row1[17]) echo "selected";?> ><?php echo $row_c[1];?></option>
			<?php
			} while ($row_c = mysqli_fetch_array($result_c));
			} else {
      }
			?>
</select>	
</div>
</div>
<?php 
} else {
  ?>
  <input name="idsubmodalidad_cd" type="hidden" value="<?php echo $row1[17];?>">
<?php
    }

?>
<div class="row">
  <div class="col-md-2"><h4>IMPORTE TOTAL CONTRATADO EN Bs.:</h4></div>
  <div class="col-md-3"><input type="text" class="form-control" name="importe" value="<?php echo $row1[8];?>" required></div>  
  <div class="col-md-3"><h4>PROVEEDOR CONTRATADO:</h4></div>
  <div class="col-md-4"><textarea class="form-control" rows="3" name="proveedor" required><?php echo $row1[9];?></textarea></div>   
</div>

<div class="row">
<div class="col-md-1"><h4>PLAZO:</h4></div>
  <div class="col-md-4"><textarea class="form-control" rows="3" name="plazo" required><?php echo $row1[10];?></textarea></div>  
  <div class="col-md-3"><h4>REGLAMENTO ESPECÍFICO UTILIZADO Y DOCUMENTO DE APROBACIÓN:</h4></div>
  <div class="col-md-4"><textarea class="form-control" rows="3" name="reglamento_especifico" required><?php echo $row1[11];?></textarea></div>  
</div>

<div class="row">
  <div class="col-md-9"><h4></h4></div>
  <div class="col-md-3">    
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
   MODIFICAR FORMULARIO
  </button>
  </div>
  </div>
</div>

<!---- END MODAL --->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">DATOS BÁSICOS DE LA CONTRATACIÓN</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ¿Esta seguro de cambiar los DATOS BÁSICOS DE LA CONTRATACIÓN?
       </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">CANCELAR</button>
        <button type="submit" class="btn btn-primary pull-center">CONFIRMAR REGISTRO</button>     
      </div>
    </div>
  </div>
</div>
</form>

<!------------ Datos Basicos de la Contratacion FORMULARIO MOSTRADO --------------->

<!------------ desde aqui se avanza a la siguiente instancia --------------->

<div class="row">
<div class="col-md-4"><h3>
<form name="EVENTO" action="declaracion_cd.php" method="post">
<button type="submit" class="btn-link"><h4 class="text-primary">VOLVER A FORMULARIOS</h4></button></form>
</h3></div>
<div class="col-md-6"></div>
<div class="col-md-2">
<h3>
<form name="EVENTO" action="formulario_cd_previo.php" method="post">
<button type="submit" class="btn-link"><h4 class="text-primary">CONTINUAR</h4></button></form>
</h3>
</div>
</div>

 </div>
 </div>
	<footer>
	<?php include("../footer.php");?>
	</footer>
</div>
<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>
	<script src="../js/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/jquery.dataTables.min.js"></script>
	<script src="../js/script.js"></script>
	<script src="../js/dataTables.bootstrap.min.js"></script>
</body>
</html>