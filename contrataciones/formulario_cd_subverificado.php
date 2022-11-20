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
				<h2 class="pageTitle">F-3009 <?php echo $codigo_ss;?></h2>
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
<div class="col-md-3"></div>
<div class="col-md-6"><h2 class="text-danger">VERIFICAR LO SIGUIENTE!</h2></div>
<div class="col-md-3"></div>
</div>

<?php
        $sql5 =" SELECT subregistro_cd.idsubregistro_cd, subpunto_cd.subindice, subpunto_cd.subpunto_cd, subregistro_cd.documento_cd, subregistro_cd.fecha_doc_cd, subregistro_cd.justificacion, subregistro_cd.aclaracion ";
        $sql5.=" FROM subregistro_cd, subpunto_cd WHERE subregistro_cd.idsubpunto_cd=subpunto_cd.idsubpunto_cd AND subregistro_cd.idformulario_cd ='$idformulario_cd_ss' AND subregistro_cd.documento_cd = '' "; 
        $result5 = mysqli_query($link,$sql5);
        if ($row5 = mysqli_fetch_array($result5)){
        mysqli_field_seek($result5,0);
        while ($field5 = mysqli_fetch_field($result5)){
        } do { 
?>
<div class="row">
<div class="col-md-2"></div>
<div class="col-md-10"><h4 class="text-danger">
<?php  echo "NO SE HA RESPONDIDO EL SUB-PUNTO ".$row5[1]; ?>    
</h4></div>
</div>

<?php       
    }
   while ($row5 = mysqli_fetch_array($result5));
 } else {
    
 }
?>

<div class="row">
<div class="col-md-3"></div>
<div class="col-md-6"><h4 class="text-warning">	  
<form name="VOLVER" action="formulario_cd_previo.php" method="post">	  
<button type="submit" class="btn-link">VOLVER A REGISTRO</button>
</form></h4></div>
<div class="col-md-3"></div>
</div>

</div>
</br>
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



