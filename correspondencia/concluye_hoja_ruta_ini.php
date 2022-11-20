<?php include("../cabf.php");?>
<?php include("../inc.config.php");?>
<?php
date_default_timezone_set('America/La_Paz');
$fecha_ram		  = date("Ymd");
$fecha 			  = date("Y-m-d");

$idusuario_ss = $_SESSION['idusuario_ss'];
$idnombre_ss  = $_SESSION['idnombre_ss'];
$perfil_ss    = $_SESSION['perfil_ss'];

if($_SESSION['perfil_ss'] != "ADMINISTRADOR"){ 		
	header("Location:../index.php");	
}

$idarea_ss    = $_SESSION['idarea_ss'];

$idcorres_ss        = $_SESSION['idcorres_ss'];
$idderiva_corres_ss = $_SESSION['idderiva_corres_ss'];

$gestion       = date("Y");

$sql1 = " SELECT corres.idcorres, corres.gestion, corres.correlativo, corres.idusuario, corres.referencia, corres.procedencia, corres.no_control, ";
$sql1.= " corres.fecha_corres, corres.anexo, tipo_hojaruta.tipo_hojaruta, control.control, corres.idtipo_hojaruta, control.idcontrol FROM corres, tipo_hojaruta, control ";
$sql1.= " WHERE corres.idtipo_hojaruta=tipo_hojaruta.idtipo_hojaruta AND tipo_hojaruta.idcontrol=control.idcontrol AND idcorres='$idcorres_ss' ";
$result1 = mysqli_query($link,$sql1);
$row1 = mysqli_fetch_array($result1);

$sql_adj =" SELECT adjunto_hr.idadjunto_hr, adjunto_hr.idcorres, tipo_documento.tipo_documento, adjunto_hr.cite, adjunto_hr.ref, adjunto_hr.fecha, adjunto_hr.destino, ";
$sql_adj.=" adjunto_hr.entidad_destino, adjunto_hr.hoja_ruta, adjunto_hr.idusuario, adjunto_hr.idempresa FROM adjunto_hr, tipo_documento WHERE adjunto_hr.idtipo_documento=tipo_documento.idtipo_documento ";
$sql_adj.=" AND adjunto_hr.idtipo_documento='2' AND adjunto_hr.idcorres = '$idcorres_ss'";
$result_adj = mysqli_query($link,$sql_adj);
$row_adj = mysqli_fetch_array($result_adj);

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
				<h2 class="pageTitle">CONCLUIR HOJA DE RUTA N° <?php echo $row1[2];?>/<?php echo $row1[1];?></h2>
			</div>
		</div>
	</div>
</section>
<div class="container contenido">

<div class="row" align="center"> 
<div class="col-md-12"><h2>
<a href="deriva_hoja_ruta_corres.php">VOLVER</a></h2>
</div>
</div>

<div class="row" align="center">
<div class="box-area">
 <div class="row">
  <div class="col-md-2"><h4>CORRELATIVO</h4></div>
  <div class="col-md-2"><h4 class="text-muted"><?php echo $row1[2];?>/<?php echo $row1[1];?></h4></div>
  <div class="col-md-2"><h4>REFERENCIA</h4></div>
  <div class="col-md-6"><h4 class="text-muted"><?php echo $row1[4];?></h4></div>
</div>

<div class="row">
  <div class="col-md-2"><h4>PROCEDENCIA</h4></div>
  <div class="col-md-4"><h4 class="text-muted"><?php echo $row1[5];?></h4></div>
  <div class="col-md-2"><h4>NUMERO DE CONTROL:</h4></div>
  <div class="col-md-1"><h4 class="text-muted"><?php echo $row1[6];?></h4></div>
  <div class="col-md-1"><h4>FECHA:</h4></div>
  <div class="col-md-2"><h4 class="text-muted"><?php echo $row1[7];?></h4></div>
</div>
</div>
<div class="row"> 
</div>
<form name="CONCLUYE" action="guarda_conclusion_hr_ini.php" method="post">

<input type="hidden" name="idcontrol" value="<?php echo $row1[12];?>">
<input type="hidden" name="idtipo_hojaruta" value="<?php echo $row1[11];?>">

<div class="box-area">
<div class="row">
  <div class="col-md-4"><h4>COMENTARIO A LA CONCLUSIÓN DE LA HOJA DE RUTA:</h4></div>
  <div class="col-md-8"><textarea class="form-control" rows="3" name="comentario_conclusion"></textarea></div>
</div>
<div class="row">
  <div class="col-md-3"><h4>IMPORTANTE:</h4></div>
  <div class="col-md-9"><h4 class="text-muted">El DOCUMENTO <?php echo $row_adj[2];?> <?php echo $row_adj[3];?></h4>
  <h4 class="text-muted">RELACIONADO A <?php echo $row1[9];?> SERÁ REGISTRADO EN EL MÓDULO DE <?php echo $row1[10];?> (INICIO)</h4>
</div>
</div>
</div>
<div class="row">
  <div class="col-md-12"><h4> </h4></div>
</div>
<div class="row">
  <div class="col-md-12">  
  <button class="btn btn-primary" data-toggle="modal" data-target="#recibir">
CONCLUIR HOJA DE RUTA</button>
<div class="modal fade" id="recibir" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel"></h5>
         <div class="panel panel-info">
  				<div class="panel-heading"><h3>¿Esta seguro de concluir esta HOJA DE RUTA?</h3></div>
         </div>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">          
        </button>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">CONCLUIR HOJA DE RUTA</button>
        
      </div>
    </div>
  </div>
</div>
</form>
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