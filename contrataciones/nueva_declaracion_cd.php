<?php include("../cabf.php");?>
<?php include("../inc.config.php");?>
<?php
date_default_timezone_set('America/La_Paz');
$fecha_ram			= date("Ymd");
$fecha 					= date("Y-m-d");

$idusuario_ss  =  $_SESSION['idusuario_ss'];
$idnombre_ss   =  $_SESSION['idnombre_ss'];
$perfil_ss     =  $_SESSION['perfil_ss'];

if($_SESSION['perfil_ss'] != "DAF-EMPRESA"){ 		
	header("Location:../index.php");	
}

$cargo_ss      =  $_SESSION['cargo_ss'];
$idempresa_ss  =  $_SESSION['idempresa_ss'];

$sql_e =" SELECT idempresa, razon_social, sigla FROM empresa WHERE idempresa='$idempresa_ss'";
$result_e = mysqli_query($link,$sql_e);
$row_e = mysqli_fetch_array($result_e);

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
        <?php echo $rowus[0];?> <?php echo $rowus[1];?> <?php echo $rowus[2];?> - <?php echo $row_e[2];?></p>
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
	</header><!-- end header -->
	<section id="inner-headline">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h2 class="pageTitle">NUEVA DECLARACIÓN JURADA - <?php echo $row_e[2];?></h2>
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
      <h4 align="center"> <a href="declaraciones_juradas_ep.php">VOLVER A DECLARACIONES JURADAS</a></h4>
</br>
      <h3>PROCESOS DE CONTRATACIÓN</h3>
       <p>EN ESTA SECCIÓN SE REALIZA EL REGISTRO DE UNA NUEVA DECLARACIÓN JURADA DE PROCESOS DE CONTRATACIÓN REALIZADOS POR LAS EMPRESAS PÚBLICAS</p>
      </div>
    </div>

<div class="container">

<!-- javascript --->
<form name="FORM9" action="guarda_declaracion_cd.php" method="post">
<div class="box-area">

<div class="row">
  <div class="col-md-2"><h4>EMPRESA:</h4></div>
  <div class="col-md-4">
  
       <h4 class="text-muted"> <?php echo $row_e[1];?> </h4>
  </div>
  <div class="col-md-4"><h4>FECHA DE LA DECLARACIÓN</h4></div>
  <div class="col-md-2"><h4 class="text-muted">
  <?php 
    $fecha_elab1 = explode('-',$fecha);
    $f_declaracion = $fecha_elab1[2].'/'.$fecha_elab1[1].'/'.$fecha_elab1[0];
    echo $f_declaracion;
          ?>
  </h4></div>  
</div>

<div class="row">
<div class="col-md-2"><h4>MES DE LA DECLARACIÓN:</h4></div>
<div class="col-md-2">
<select name="mes" id="mes" class="form-control" required>
      <option value="">ELEGIR </option>
      <option value="ENERO">ENERO</option>
      <option value="FEBRERO">FEBRERO</option>
      <option value="MARZO">MARZO</option>
      <option value="ABRIL">ABRIL</option>   
      <option value="MAYO">MAYO</option>  
      <option value="JUNIO">JUNIO</option>  
      <option value="JULIO">JULIO</option>  
      <option value="AGOSTO">AGOSTO</option>  
      <option value="SEPTIEMBRE">SEPTIEMBRE</option>  
      <option value="OCTUBRE">OCTUBRE</option>  
      <option value="NOVIEMBRE">NOVIEMBRE</option>  
      <option value="DICIEMBRE">DICIEMBRE</option>  
      </select>
</div>
  <div class="col-md-3"><h4>TIPO DE PRESUPUESTO:</h4></div>
  <div class="col-md-5">
  <select name="idtipo_presupuesto"  id="idtipo_presupuesto" class="form-control" required>
<option value="">ELEGIR TIPO</option>
 <?php
/*
Realizamos una consulta ala tabla autor
para mostrar los datos en un combo
*/
$numero=1;
$sql1 = " SELECT idtipo_presupuesto, tipo_presupuesto FROM tipo_presupuesto";
$result1 = mysqli_query($link,$sql1);
if ($row1 = mysqli_fetch_array($result1)){
mysqli_field_seek($result1,0);
while ($field1 = mysqli_fetch_field($result1)){
} do {
echo "<option value=".$row1[0].">".$row1[1]."</option>";
$numero=$numero+1;
} while ($row1 = mysqli_fetch_array($result1));
} else {
echo "No se encontraron resultados!";
}
?>
</select>
  </div>
</div>

<div class="row">
  <div class="col-md-3"><h4></h4></div>
  <div class="col-md-9">    
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  GUARDAR DECLARACIÓN JURADA
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
        <h5 class="modal-title" id="exampleModalLabel">REGISTRO DECLARACIÓN JURADA</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ¿Esta seguro de Registrar LA DECLARACIÓN JURADA?
       </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">CANCELAR</button>
        <button type="submit" class="btn btn-primary pull-center">CONFIRMAR REGISTRO</button>     
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
<script>
    $("#fecha1").datepicker($.datepicker.regional[ "es" ]);
</script>
</body>
</html>