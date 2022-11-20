<?php include("../cabf.php");?>
<?php include("../inc.config.php");?>
<?php
date_default_timezone_set('America/La_Paz');
$fecha_ram  = date("Ymd");
$fecha 			= date("Y-m-d");

$idusuario_ss  =  $_SESSION['idusuario_ss'];
$idnombre_ss   =  $_SESSION['idnombre_ss'];
$perfil_ss     =  $_SESSION['perfil_ss'];

$gestion       =  date("Y");
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
				<h2 class="pageTitle">HOJAS DE RUTA PARA INICIAR</h2>
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
      <th>HOJA DE RUTA</th>
      <th>REFERENCIA</th>
      <th>FECHA DE REGISTRO</th>
      <th>LIBRO DE REGISTRO</th>
      <th>ACCION</th>
			        </tr>
			        </thead>
			        <tbody>
<?php
$sql =" SELECT idcorres, gestion, correlativo, idusuario, referencia, procedencia, no_control, fecha_corres, ";
$sql.=" anexo, idestado, codigo, origen FROM corres WHERE gestion='$gestion' AND idusuario='$idusuario_ss' AND idestado='1' ORDER BY idcorres";
$result = mysqli_query($link,$sql);
if ($row = mysqli_fetch_array($result)){
mysqli_field_seek($result,0);
while ($field = mysqli_fetch_field($result)){
} do {
?>
      <tr>
      <td><?php echo $row[10]?></td>
      <td><?php echo $row[11]?></td>
      <td><?php echo $row[4]?></td>
      <td>
	  <?php 
            $fecha_recibe = explode('-',$row[7]);
            $f_recibe    = $fecha_recibe[2].'/'.$fecha_recibe[1].'/'.$fecha_recibe[0];
            echo $f_recibe;
      ?>	  
	  </td>
    <td>
    <a href="../impresion_documentos/libro_superior.php?idcorres=<?php echo $row[0]?>&origen=<?php echo $row[11]?>" target="_blank" class="Estilo12" onClick="window.open(this.href, this.target, 'width=870,height=850,scrollbars=YES,top=50,left=200'); return false;">SUPERIOR</a> </br> 
	  <a href="../impresion_documentos/libro_medio.php?idcorres=<?php echo $row[0]?>&origen=<?php echo $row[11]?>" target="_blank" class="Estilo12" onClick="window.open(this.href, this.target, 'width=870,height=850,scrollbars=YES,top=50,left=200'); return false;">MEDIO</a>  </br>
    <a href="../impresion_documentos/libro_inferior.php?idcorres=<?php echo $row[0]?>&origen=<?php echo $row[11]?>" target="_blank" class="Estilo12" onClick="window.open(this.href, this.target, 'width=870,height=850,scrollbars=YES,top=50,left=200'); return false;">INFERIOR</a>    
    </td>
      <td>
	  <form name="DERIVA" action="valida_hoja_ruta.php" method="post">
	  <input type="hidden" id="idcorres"  name="idcorres" value="<?php echo $row[0]?>">
	  <button type="submit" class="btn-link">INICIAR HOJA DE RUTA</button>
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