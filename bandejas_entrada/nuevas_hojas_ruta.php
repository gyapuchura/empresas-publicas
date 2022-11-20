<?php include("../cabf.php");?>
<?php include("../inc.config.php");?>
<?php

date_default_timezone_set('America/La_Paz');
$fecha_ram				= date("Ymd");
$fecha 					= date("Y-m-d");

$idusuario_ss  =  $_SESSION['idusuario_ss'];
$idnombre_ss   =  $_SESSION['idnombre_ss'];
$perfil_ss     =  $_SESSION['perfil_ss'];

$gestion       =  date("Y");
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

				<a class="navbar-brand" href="../intranet.php"><img src="../img/logo.png" alt="logo"/></a>

                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                  
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
				<h2 class="pageTitle">HOJAS DE RUTA POR RECIBIR</h2>
			</div>
		</div>
	</div>
</section>
<div class="container contenido">

<div class="row" align="center"><h2> </h2></div>

<div class="row">
			<div class="col-md-12">
				<table id="example" class="table table-striped table-bordered table-hover" cellspacing="1" width="100%">
			        <thead>
			        <tr>

      <th>CODIGO</th>
	    <th>N° CONTROL</th>
      <th>PROCEDENCIA</th>
      <th>USUARIO ORIGEN</th>
      <th>REFERENCIA</th>
      <th>FECHA DE DERIVACIÓN</th>
      <th>ACCION</th>
			        </tr>
			        </thead>
			        <tbody>
<?php
$sql =" SELECT deriva_corres.idderiva_corres, corres.correlativo, deriva_corres.idusuarioo, deriva_corres.idusuariod, corres.referencia, deriva_corres.comentario, ";
$sql.=" deriva_corres.fecha_deriva, deriva_corres.idcorres, corres.codigo, corres.origen, corres.procedencia, corres.idempresa, corres.no_control  ";
$sql.=" FROM deriva_corres, corres, instruccion WHERE deriva_corres.idinstruccion=instruccion.idinstruccion AND corres.idcorres=deriva_corres.idcorres ";
$sql.=" AND deriva_corres.idusuariod='$idusuario_ss' AND deriva_corres.derivada='SI' AND deriva_corres.recibida='NO' ";
$sql.=" ORDER BY deriva_corres.idderiva_corres ";
$result = mysqli_query($link,$sql);
if ($row = mysqli_fetch_array($result)){
mysqli_field_seek($result,0);
while ($field = mysqli_fetch_field($result)){
} do {
?>
      <tr>
    <td><?php echo $row[8]?></td>
	  <td><?php echo $row[12]?></td>
    <td><?php echo $row[10]?></td>
      <td>
      <?php

$sqlo =" SELECT nombres.nombres, nombres.paterno, nombres.materno FROM nombres, usuarios WHERE usuarios.idnombre=nombres.idnombre AND usuarios.idusuario='$row[2]' ";
$resulto = mysqli_query($link,$sqlo);
$rowo = mysqli_fetch_array($resulto);
?>
        <?php echo $rowo[0];?> <?php echo $rowo[1];?> <?php echo $rowo[2];?></p>
      </td>
     
      <td><?php echo $row[4]?></td>
      <td>
		  <?php 
            $fecha_elab1 = explode('-',$row[6]);
            $f_corres    = $fecha_elab1[2].'/'.$fecha_elab1[1].'/'.$fecha_elab1[0];
            echo $f_corres;
      ?>	
	  </td>
      <td>

<form name="RECIBE" action="guarda_recepcion.php" method="post">
	  <input type="hidden" id="idderiva_corres"  name="idderiva_corres" value="<?php echo $row[0];?>">
		<input type="hidden" id="idcorres"  name="idcorres" value="<?php echo $row[7];?>">	
    <input type="hidden" id="idempresa"  name="idempresa" value="<?php echo $row[11];?>">	
		<button type="submit" class="btn btn-primary">RECIBIR HOJA DE RUTA</button>
</form>


      </td>
      </tr>
 <?php
   }
  while ($row = mysqli_fetch_array($result));
} else {
}
?>
			        </tbody>
			    </table>
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