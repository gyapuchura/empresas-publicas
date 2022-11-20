<?php include("../cabf.php");?>
<?php include("../inc.config.php");?>
<?php

date_default_timezone_set('America/La_Paz');
$fecha_ram				= date("Ymd");
$fecha 					= date("Y-m-d");

$idusuario_ss  =  $_SESSION['idusuario_ss'];
$idnombre_ss   =  $_SESSION['idnombre_ss'];
$perfil_ss     =  $_SESSION['perfil_ss'];

$idcorres_ss        = $_SESSION['idcorres_ss'];
$idderiva_corres_ss = $_SESSION['idderiva_corres_ss'];

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
				<h2 class="pageTitle">CONCLUSION DE HOJA DE RUTA </h2>
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
<div class="col-md-6"><h2 class="text-primary">LA HOJA DE RUTA N° <?php echo $row1[2];?>/<?php echo $row1[1];?></h2></div>
<div class="col-md-3"> </div>
</div>
<div class="row">
<div class="col-md-12"><h2 class="text-muted">FUE CONCLUIDA Y SE ENCUENTRA EN LA BANDEJA DE HOJAS DE RUTA CONCLUIDAS.</h2></div>
</div>

</div>

<div class="row">
<div class="col-md-12"><h3 class="text-warning">	  
<form name="VOLVER" action="para_iniciar.php" method="post">
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