<?php include("../cabf.php");?>
<?php include("../inc.config.php");?>
<?php
date_default_timezone_set('America/La_Paz');

$fecha 			= date("Y-m-d");

$idusuario_ss   = $_SESSION['idusuario_ss'];
$idnombre_ss    = $_SESSION['idnombre_ss'];
$perfil_ss      = $_SESSION['perfil_ss'];

$gestion = date("Y");

?>
<!DOCTYPE html>
<html lang="en">
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

	<link href="../assets/css/bootstrap-datepicker.css" rel="stylesheet" />
	<script src="../jquery/jquery-1.10.2.js" type="text/javascript"></script>
    <script src="../assets/js/bootstrap-datepicker.js"></script>

<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

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
                  <a class="navbar-brand" href="../intranet.php"><img src="../img/logo.png" alt="logo"/></a>
                </div>
                <?php include("../menu_corres.php");?>
            </div>
        </div>
	</header><!-- end header -->
	<section id="inner-headline">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h2 class="pageTitle">ESTADÍSTICAS</h2>
			</div>
		</div>
	</div>
	</section>
	<section id="content">
	<div class="container">

<div class="box-area">

<div class="row">
  <div class="col-md-6"><h4>HOJAS DE RUTA DIARIAS:</h4><h4 class="text-muted">&nbsp;</h4></div>
  <div class="col-md-6"><h4>
  <a href="hojas_ruta_diaria.php" target="_blank" onClick="window.open(this.href, this.target, 'width=1000,height=700,scrollbars=YES'); return false;">
    MOSTRAR REPORTE </a></h4></div>
</div>

<div class="row">
  <div class="col-md-6"><h4>REPORTE HOJAS DE RUTA EMPRESAS:</h4><h4 class="text-muted">&nbsp;</h4></div>
  <div class="col-md-6"><h4>
  <a href="hojasruta_empresas.php" target="_blank" onClick="window.open(this.href, this.target, 'width=900,height=1000,scrollbars=YES'); return false;">
    MOSTRAR REPORTE </a></h4></div>
</div>

<div class="row">
  <div class="col-md-6"><h4>REPORTE HOJAS DE RUTA USUARIOS:</h4><h4 class="text-muted">&nbsp;</h4></div>
  <div class="col-md-6"><h4>
  <a href="cantidad_usuario.php" target="_blank" onClick="window.open(this.href, this.target, 'width=1200,height=700,scrollbars=YES'); return false;">
    MOSTRAR REPORTE </a></h4></div>
</div>

 <div class="row">
  <div class="col-md-6"><h4>POR ESTADO DE HOJAS DE RUTA:</h4><h4 class="text-muted">&nbsp;</h4></div>
  <div class="col-md-6"><h4><a href="por_estado_hr.php" target="_blank" onClick="window.open(this.href, this.target, 'width=1000,height=700,scrollbars=YES'); return false;">
  MOSTRAR REPORTE</a></h4> </div>
</div>

<div class="row">
  <div class="col-md-6"><h4>CONTROL INTERNO:</h4><h4 class="text-muted">&nbsp;</h4></div>
  <div class="col-md-6"><h4>
  <a href="control_interno.php" target="_blank" onClick="window.open(this.href, this.target, 'width=1000,height=700,scrollbars=YES'); return false;">
    MOSTRAR REPORTE </a></h4></div>
</div>
<div class="row">
  <div class="col-md-6"><h4>CONTROL EXTERNO POSTERIOR:</h4><h4 class="text-muted">&nbsp;</h4></div>
  <div class="col-md-6"><h4>
  <a href="control_externo.php" target="_blank" onClick="window.open(this.href, this.target, 'width=1000,height=700,scrollbars=YES'); return false;">
    MOSTRAR REPORTE </a></h4></div>
</div>
<div class="row">
  <div class="col-md-6"><h4>OTROS TRÁMITES ATENDIDOS POR LA SCEP:</h4><h4 class="text-muted">&nbsp;</h4></div>
  <div class="col-md-6"><h4>
  <a href="otras_hr.php" target="_blank" onClick="window.open(this.href, this.target, 'width=1000,height=700,scrollbars=YES'); return false;">
    MOSTRAR REPORTE </a></h4></div>
</div>

</div>
	</div>
 	</section>

	<!---- finaliza el cotenido de la pagina ---->
	<footer>
	<?php include("footer.php");?>
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

</body>
</html>
</html>