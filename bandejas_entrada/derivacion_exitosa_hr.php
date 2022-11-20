<?php include("../cabf.php");?>
<?php include("../inc.config.php");?>
<?php

date_default_timezone_set('America/La_Paz');
$fecha_ram				= date("Ymd");
$fecha 					= date("Y-m-d");

$idusuario_ss  =  $_SESSION['idusuario_ss'];
$idnombre_ss   =  $_SESSION['idnombre_ss'];
$perfil_ss     =  $_SESSION['perfil_ss'];

$idcorres_ss   =  $_SESSION['idcorres_ss'];
$idusuariod_ss =  $_SESSION['idusuariod_ss'];

$gestion       = date("Y");

$sql1 = " SELECT idcorres, gestion, correlativo, idusuario, referencia, procedencia, no_control, ";
$sql1.= " fecha_corres, anexo, codigo, origen FROM corres WHERE idcorres='$idcorres_ss' ";
$result1 = mysqli_query($link,$sql1);
$row1 = mysqli_fetch_array($result1);
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
				<h2 class="pageTitle">DERIVACIÓN DE HOJA DE RUTA </h2>
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
<div class="col-md-2"> </div>
<div class="col-md-8"><h2 class="text-primary">LA HOJA DE RUTA N° <?php echo $row1[9];?></h2></div>
<div class="col-md-2"> </div>
</div>
<div class="row">
<div class="col-md-4"><h2 class="text-primary">FUE DERIVADA A: </h2></div>
<div class="col-md-8"><h2 class="text-muted">
<?php

$sqlud="SELECT nombres.titulo, nombres.nombres, nombres.paterno, nombres.materno FROM nombres, usuarios ";
$sqlud.=" WHERE nombres.idnombre=usuarios.idnombre AND usuarios.idusuario='$idusuariod_ss'";
$resultud = mysqli_query($link,$sqlud);
$rowud = mysqli_fetch_array($resultud);
?>
        <?php echo $rowud[0];?> <?php echo $rowud[1];?> <?php echo $rowud[2];?> <?php echo $rowud[3];?>
</h2>
</div>
</div>

</div>

<!---------  SE MUESTRA EL HISTORIAL DE LA HOJA DE RUTA ----->

<div class="row">
<div class="col-md-12"><h3>HISTORIAL DE LA HOJA DE RUTA <?php echo $row1[10];?> </h3></div>
</div>

<div class="row">
<div class="col-md-2"><h4>REFERENCIA:</h4></div>
<div class="col-md-10"><h4 class="text-muted"><?php echo $row1[4];?></h4></div>
</div>

<div class="row">
			<div class="col-md-12">
				<table  class="table table-striped table-bordered table-hover" cellspacing="1" width="100%">
			        <thead>
			        <tr>

      <th>DERIVACION</th>
      <th>USUARIO ORIGEN</th>
      <th>USUARIO DESTINO</th>
      <th>COMENTARIO</th>
      <th>FECHA DE DERIVACION</th>
      <th>FECHA DE RECEPCIÓN</th>
			        </tr>
			        </thead>
			        <tbody>
<?php

$sql =" SELECT deriva_corres.idderiva_corres, corres.correlativo, deriva_corres.idusuarioo, deriva_corres.idusuariod,  ";
$sql.=" corres.referencia, deriva_corres.comentario, deriva_corres.fecha_deriva, deriva_corres.fecha_recibe FROM deriva_corres, corres, instruccion ";
$sql.=" WHERE deriva_corres.idinstruccion=instruccion.idinstruccion AND corres.idcorres=deriva_corres.idcorres ";
$sql.=" AND deriva_corres.idcorres='$idcorres_ss' ";
$sql.=" ORDER BY deriva_corres.idderiva_corres  ";
$result = mysqli_query($link,$sql);
if ($row = mysqli_fetch_array($result)){
mysqli_field_seek($result,0);
while ($field = mysqli_fetch_field($result)){
} do {
?>
      <tr>
      <td><?php echo $row[0]?></td>
      <td>
      <?php

$sqlo =" SELECT nombres.nombres, nombres.paterno, nombres.materno FROM nombres, usuarios  ";
$sqlo.=" WHERE usuarios.idnombre=nombres.idnombre AND usuarios.idusuario='$row[2]' ";
$resulto = mysqli_query($link,$sqlo);
$rowo = mysqli_fetch_array($resulto);
?>
<?php echo $rowo[0];?> <?php echo $rowo[1];?> <?php echo $rowo[2];?>
      </td>
      <td>
      <?php

$sqld =" SELECT nombres.nombres, nombres.paterno, nombres.materno FROM nombres, usuarios  ";
$sqld.=" WHERE usuarios.idnombre=nombres.idnombre AND usuarios.idusuario='$row[3]' ";
$resultd = mysqli_query($link,$sqld);
$rowd = mysqli_fetch_array($resultd);
?>
<?php echo $rowd[0];?> <?php echo $rowd[1];?> <?php echo $rowd[2];?>
      </td>
      <td><?php echo $row[5]?></td>
      <td><?php 
	 $fecha_d      = explode('-',$row[6]);
	 $f_derivacion = $fecha_d[2].'/'.$fecha_d[1].'/'.$fecha_d[0];
	 echo $f_derivacion;
	 ?>
	 </td>
	  <td>
	  <?php
	  if ($row[7] =="1111-11-11") {
		echo "SIN RECIBIR";
	  } else {

		$fecha_r     = explode('-',$row[7]);
		$f_recepcion = $fecha_r[2].'/'.$fecha_r[1].'/'.$fecha_r[0];
		echo $f_recepcion;

	  }
	  ?></td>
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

		<div class="row">
		<div class="col-md-4"><h2>
		</div>
<div class="col-md-4"><h3>
<a href="../impresion_documentos/imprime_hoja_ruta.php" target="_blank" class="Estilo12" onClick="window.open(this.href, this.target, 'width=750,height=800,scrollbars=YES,left=400,top=50'); return false;">IMPRIMIR HOJA DE RUTA</a>
</h3></div>
<div class="col-md-4"></div>
		</div>

		<div class="row">
		<div class="col-md-4"><h2>
		</div>
<div class="col-md-4">
<form name="IRINICIO" action="nuevas_hojas_ruta.php" method="post">
<h2>
<button type="submmit" class="btn btn-primary" >
 IR AL INICIO
</button>
</form>
</h2></div>
<div class="col-md-4"><h2>
		</div>
		</div>


</div>

<!---------------------------------------------------------------------->

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