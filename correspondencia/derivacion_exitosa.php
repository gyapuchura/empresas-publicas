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
$idusuariod_ss =  $_SESSION['idusuariod_ss'];

$gestion       = date("Y");


$sql1 = " SELECT idcorres, gestion, correlativo, idusuario, referencia, procedencia, no_control, ";
$sql1.= " fecha_corres, anexo FROM corres WHERE idcorres='$idcorres_ss' ";
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

                <?php include("../menu_corres.php");?>

            </div>
        </div>
	</header>
	<!-- end header -->

<section id="inner-headline">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h2 class="pageTitle">INICIACIÓN DE HOJA DE RUTA </h2>
			</div>
		</div>
	</div>
</section>

<div class="container contenido">

<div class="row">
<div class="col-md-12"><h2 class="text-primary"> </h2></div>
</div>

<div class="box-area">
<div class="row">
<div class="col-md-3"> </div>
<div class="col-md-6"><h2 class="text-primary">LA HOJA DE RUTA N° <?php echo $row1[2];?></h2></div>
<div class="col-md-3"> </div>
</div>
<div class="row">
<div class="col-md-4"><h2 class="text-primary">FUE ENVIADA A: </h2></div>
<div class="col-md-8"><h2 class="text-muted">
<?php

$sqlud =" SELECT nombres.titulo, nombres.nombres, nombres.paterno, nombres.materno FROM nombres, usuarios ";
$sqlud.=" WHERE usuarios.idnombre=nombres.idnombre AND usuarios.idusuario='$idusuariod_ss' ";
$resultud = mysqli_query($link,$sqlud);
$rowud = mysqli_fetch_array($resultud);
?>
        <?php echo $rowud[0];?> <?php echo $rowud[1];?> <?php echo $rowud[2];?> <?php echo $rowud[3];?>
</h2>
</div>
</div>

</div>

<div class="row">
<div class="col-md-12"><h3 class="text-warning">	  
<form name="DERIVA" action="para_iniciar.php" method="post">
	  <input type="hidden" id="idcorres"  name="idcorres" value="<?php echo $row[0]?>">
	  <button type="submit" class="btn-link">VOLVER </button>
	  </form></h3></div>


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