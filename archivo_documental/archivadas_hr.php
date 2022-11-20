<?php include("../cabf.php");?>
<?php include("../inc.config.php");?>
<?php

date_default_timezone_set('America/La_Paz');
$fecha_ram			= date("Ymd");
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
				<h2 class="pageTitle">HOJAS DE RUTA ARCHIVADAS</h2>
			</div>
		</div>
	</div>
</section>
<div class="container contenido">
</br>
<div class="row" align="center"><h2> </h2></div>

<div class="row">
			<div class="col-md-12">
				<table id="example" class="table table-striped table-bordered table-hover" cellspacing="1" width="100%">
			        <thead>
			        <tr>

      <th>CÓDIGO</th>
      <th>REFERENCIA</th>
      <th>PROCEDENCIA</th>
      <th>Nro. CONTROL</th>
      <th>COMENTARIO ARCHIVO</th>
      <th>UBICACION (ARCHIVO)</th>
      <th>ESTADO</th>
      <th>VER HOJA DE RUTA</th>
			        </tr>
			        </thead>
			        <tbody>
<?php

$sql =" SELECT corres.idcorres, corres.gestion, corres.correlativo, corres.idusuario, corres.referencia, corres.procedencia, corres.no_control, corres.fecha_corres, ";
$sql.=" corres.anexo, estado.estado, corres.codigo, ubicacion_archivo.ubicacion_archivo, corres.fecha_archivo, usuarios.usuario, entidad_archivo.entidad_archivo, corres.comentario_conclusion, corres.comentario_archivo  ";
$sql.=" FROM corres, ubicacion_archivo, estado, usuarios, entidad_archivo WHERE corres.idubicacion_archivo=ubicacion_archivo.idubicacion_archivo  ";
$sql.=" AND corres.idestado=estado.idestado AND corres.usr_archivo=usuarios.idusuario AND ubicacion_archivo.identidad_archivo=entidad_archivo.identidad_archivo AND corres.idestado='4' ORDER BY corres.idcorres ";
$result = mysqli_query($link,$sql);
if ($row = mysqli_fetch_array($result)){
mysqli_field_seek($result,0);
while ($field = mysqli_fetch_field($result)){
} do {
?>
      <tr>
      <td><?php echo $row[10]?></td>
      <td><?php echo $row[4]?></td>
      <td><?php echo $row[5]?></td>
      <td><?php echo $row[6]?></td>
      <td><?php echo $row[15]?> </br> <?php echo $row[16]?></td>
      <td>Ubicacion: </br><?php echo $row[14];?> </br><?php echo $row[11];?>
      </td>
      <td><?php echo $row[9]?> por <?php echo $row[13]?>
      </br> 
      <?php 
            $fecha_recib        = explode('-',$row[12]);
            $f_recibida     = $fecha_recib [2].'/'.$fecha_recib [1].'/'.$fecha_recib [0];
            echo $f_recibida;
            ?> 
    </td>
      <td>

      <a href="../impresion_documentos/imprime_hoja_ruta_ver.php?idcorres=<?php echo $row[0]?>" target="_blank" class="Estilo12" onClick="window.open(this.href, this.target, 'width=750,height=800,scrollbars=YES,left=400,top=50'); return false;"><h5 class="text-info">VER HOJA DE RUTA</h5></a>
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