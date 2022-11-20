<?php include("../cabf.php");?>
<?php include("../inc.config.php");?>
<?php

date_default_timezone_set('America/La_Paz');
$fecha_ram	= date("Ymd");
$fecha 		  = date("Y-m-d");
$gestion    = date("Y");

$idusuario_ss  =  $_SESSION['idusuario_ss'];
$idnombre_ss   =  $_SESSION['idnombre_ss'];
$perfil_ss     =  $_SESSION['perfil_ss'];

$iddeclaracion_cd_ss =  $_SESSION['iddeclaracion_cd_ss'];
$idempresa_ss        =  $_SESSION['idempresa_ss'];
$codigo_ss           =  $_SESSION['codigo_ss'];
$idformulario_cd_ss  =  $_SESSION['idformulario_cd_ss'];
$codigo_form_ss      =  $_SESSION['codigo_form_ss'];

$sql1 ="SELECT idformulario_cd, iddeclaracion_cd, idempresa, correlativo, codigo, cuce, codigo_int ";
$sql1.=", objeto_cd, importe, proveedor, plazo, reglamento_especifico, idusuario, fecha_form, gestion ";
$sql1.=" FROM formulario_cd WHERE idempresa ='$idempresa_ss' AND iddeclaracion_cd='$iddeclaracion_cd_ss' AND idformulario_cd='$idformulario_cd_ss'";
$result1 = mysqli_query($link,$sql1);
$row1 = mysqli_fetch_array($result1);
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
<div class="col-md-12"><h3>FINALIZACIÓN DEL FORMULARIO - 3009</h3></div>
</div>
<div class="row"> 
<div class="col-md-12"><h3 class="text-muted">ACABA DE FINALIZAR EL FORMULARIO F-3009, AHORA PODRÁ GENERARLO E IMPRIMIRLO PARA SU FIRMA Y REMISIÓN A LA CGE.</h3></div>
</div>
<div class="box-area">
<div class="row"> 
<div class="col-md-4"></div>
<div class="col-md-4"></div>
<div class="col-md-4"></div>
</div>
<div class="row"> 
<div class="col-md-4"></div>
<div class="col-md-4"><a href="../impresion_documentos/imprime_formulario_cd.php?idformulario_cd=<?php echo $idformulario_cd_ss;?>" target="_blank" class="Estilo12" onClick="window.open(this.href, this.target, 'width=750,height=850,scrollbars=YES,top=50,left=200'); return false;"><h4 class="text-primary">IMPRIMIR FORMULARIO - 3009</h4></a></div>   
<div class="col-md-4"></div>
</div>
</div>

<div class="row">
<div class="col-md-4"><h3>
<form name="EVENTO" action="declaracion_cd.php" method="post">
<button type="submit" class="btn btn-primary">VOLVER A DECLARACIÓN JURADA</button></form>
</h3></div>
<div class="col-md-6"></div>
<div class="col-md-2">
<h3>
<form name="EVENTO" action="nuevo_formulario_cd.php" method="post">
<button type="submit" class="btn btn-primary">SIGUIENTE FORMULARIO</button></form>
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
  <script src="../js/jquery-ui.min.js"></script>

</body>
</html>