<?php include("../cabf.php");?>
<?php include("../inc.config.php");?>
<?php
date_default_timezone_set('America/La_Paz');
$fecha_ram		= date("Ymd");
$fecha 				= date("Y-m-d");

$idusuario_ss  =  $_SESSION['idusuario_ss'];
$idnombre_ss   =  $_SESSION['idnombre_ss'];
$perfil_ss     =  $_SESSION['perfil_ss'];
$idcorres_ss   =  $_SESSION['idcorres_ss'];

if($_SESSION['perfil_ss'] != "ADMINISTRADOR"){ 		
	header("Location:../index.php");	
}

$sqlh = "  SELECT idcorres, gestion, correlativo, origen, referencia, procedencia, no_control, fecha_corres, anexo, codigo,";
$sqlh.= "  idtipo_hojaruta FROM corres WHERE idcorres='$idcorres_ss'";
$resulth = mysqli_query($link,$sqlh);
$rowh = mysqli_fetch_array($resulth);
$codigo= $rowh[9];
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<title>SUBCONTRALORIA EMPRESAS PUBLICAS</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="" />
<meta name="author" content="http://webthemez.com" />
<!-- c+ss -->
<link href="../css/bootstrap.min.css" rel="stylesheet" />
<link href="../css/fancybox/jquery.fancybox.css" rel="stylesheet">
<link href="../css/flexslider.css" rel="stylesheet" />
<link href="../css/style.css" rel="stylesheet" />

<link rel="stylesheet" href="../css/jquery-ui.min.css">
<link rel="stylesheet" href="../css/style.css">

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
$rowus = mysqli_fetch_array($resultus);?>
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
                  <a class="navbar-brand" href="../inicio.php"><img src="../img/logo.png" alt="logo"/></a>
                </div>
                <?php include("../menu_corres.php");?>
            </div>
        </div>
	</header><!-- end header -->
	<section id="inner-headline">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h2 class="pageTitle">HOJA DE RUTA <?php echo $rowh[9];?></h2>
			</div>
		</div>
	</div>
	</section>
	<section id="content">

	<div class="container">

		<div class="row">
		<div class="tg-main-section tg-banner tg-haslayout parallax-window" data-parallax="scroll" data-bleed="100" data-speed="0.2" data-image-src="images/slider/img-03.jpg">
		</div>

   	<div class="about-logo">
      <h3 align="center"><a href="para_modificar_hr.php">VOLVER</a></h3>
      <h3>MODIFICAR LA HOJA DE RUTA</h3>
	  
       <p>EN ESTA SECCION SE REALIZA LA MODIFICACION EN CASO DE ERRORES DE FORMA EN LA REDACCIÓN DE LOS DATOS DE LA MISMA.</p>
    </div>

    </div>

<div class="container">

<form name="FORM9" action="guarda_modificacion_hr.php" method="post">

<div class="box-area">

<div class="row">
  <div class="col-md-2"><h4>REFERENCIA</h4></div>
  <div class="col-md-10"><textarea class="form-control" rows="3" name="referencia" required><?php echo $rowh[4];?></textarea></div>
</div>

<div class="row">
  <div class="col-md-2"><h4>PROCEDENCIA</h4></div>
  <div class="col-md-6"><?php echo $rowh[5];?></div>
  <div class="col-md-2"><h4>NÚMERO DE CONTROL:</h4></div>
  <div class="col-md-2"><input type="text" class="form-control" name="no_control" value="<?php echo $rowh[6];?>" required/></div>
</div>

<div class="row">
<div class="col-md-2"><h4>INT./EXT.:</h4></div>
<div class="col-md-3">
<?php echo $rowh[3];?>
</div>
<div class="col-md-1"><h4>FECHA:</h4></div>
<div class="col-md-2">
<input type="text" class="form-control" name="fecha_corres" value="<?php echo $rowh[7];?>" required/>
</div>
<div class="col-md-1"><h4>ANEXOS:</h4></div>
<div class="col-md-3"><textarea class="form-control" rows="2" name="anexo" required><?php echo $rowh[8];?></textarea></div>
</div>

<div class="row">
  <div class="col-md-4"><h4>TiPO HOJA DE RUTA:</h4></div>
  <div class="col-md-8">
<?php
$sql_co = "SELECT idcontrol FROM tipo_hojaruta  ";
$result_co = mysqli_query($link,$sql_co);
$row_co = mysqli_fetch_array($result_co);
?>

<select name="idcontrol"  id="idcontrol" class="form-control">
<option selected>Seleccione</option>
<?php
$sql = "SELECT idcontrol, control FROM control ";
$result = mysqli_query($link,$sql);
if ($row = mysqli_fetch_array($result)){
mysqli_field_seek($result,0);
while ($field = mysqli_fetch_field($result)){
} do {
?>
<option value="<?php echo $row[0]; ?>" <?php if ($row[0]==$row_co[0]) echo "selected";?> ><?php echo $row[1];?></option>
<?php
} while ($row = mysqli_fetch_array($result));
} else {
}
?>
</select>
  </div>
</div>

<div class="row">
  <div class="col-md-4"><h4>TiPO HOJA DE RUTA:</h4></div>
  <div class="col-md-8">
<select name="idtipo_hojaruta"  id="idtipo_hojaruta" class="form-control">
<option selected>Seleccione</option>
<?php
$sql = "SELECT idtipo_hojaruta, tipo_hojaruta FROM tipo_hojaruta ";
$result = mysqli_query($link,$sql);
if ($row = mysqli_fetch_array($result)){
mysqli_field_seek($result,0);
while ($field = mysqli_fetch_field($result)){
} do {
?>
<option value="<?php echo $row[0]; ?>" <?php if ($row[0]==$rowh[10]) echo "selected";?> ><?php echo $row[1];?></option>
<?php
} while ($row = mysqli_fetch_array($result));
} else {
}
?>
</select>
  </div>
</div>

<div class="row">
  <div class="col-md-3"><h4></h4></div>
  <div class="col-md-9">    
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
MODIFICAR HOJA DE RUTA
  </button>
  </div>
  </div>
</div>
</br>
<!---- --->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">MODIFICAR HOJA DE RUTA</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ¿Esta seguro de MODIFICAR esta HOJA DE RUTA?
       </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">CANCELAR</button>

        <button type="submit" class="btn btn-primary pull-center">CONFIRMAR MODIFICACIÓN</button>
     
      </div>
    </div>
  </div>
</div>

</div>
</form>

  </section>
	<footer>
	<?php include("../footer.php");?>
	</footer>
</div>
<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>
<!-- javascript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="../js/jquery.js"></script>
<script src="../js/jquery.easing.1.3.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/jquery.fancybox.pack.js"></script>
<script src="../js/jquery.fancybox-media.js"></script>
<script src="../js/jquery.flexslider.js"></script>
<script src="../js/animate.js"></script>
<!-- Vendor Scripts -->
<script src="../js/modernizr.custom.js"></script>
<script src="../js/jquery.isotope.min.js"></script>
<script src="../js/jquery.magnific-popup.min.js"></script>
<script src="../js/animate.js"></script>
<script src="../js/custom.js"></script>
<script src="../contact/jqBootstrapValidation.js"></script>
<script src="../contact/contact_me.js"></script>
<script language="javascript" src="../js/jquery-3.1.1.min.js"></script>
</body>
</html>