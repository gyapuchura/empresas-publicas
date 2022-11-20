<?php include("../cabf.php");?>
<?php include("../inc.config.php");?>
<?php
date_default_timezone_set('America/La_Paz');
$fecha_ram	  = date("Ymd");
$fecha 	      = date("Y-m-d");

$idusuario_ss = $_SESSION['idusuario_ss'];
$idnombre_ss  = $_SESSION['idnombre_ss'];
$perfil_ss    = $_SESSION['perfil_ss'];

$gestion      = date("Y");

$subfondo      = "SCEP";

$idform_archivo_ss = $_SESSION['idform_archivo_ss'];
$idempresa_ss      = $_SESSION['idempresa_ss'];
$idusuario_arch_ss = $_SESSION['idusuario_arch_ss'];
$codigo_form_ss    = $_SESSION['codigo_form_ss'];

$sqle =" SELECT idempresa, razon_social, sigla FROM empresa WHERE idempresa='$idempresa_ss'";
$resulte = mysqli_query($link,$sqle);
$rowe = mysqli_fetch_array($resulte);
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
				<h2 class="pageTitle">FORMULARIO DE ARCHIVO</h2>
			</div>
		</div>
	</div>
</section>
<div class="container contenido">

<div class="row">
<div class="col-md-4"> </div>
<div class="col-md-4">

<form name="VOLVER" action="formularios_archivo.php" method="post">
<h3><button type="submmit" class="btn-link" >VOLVER</button></h3>
</form>
</div>
<div class="col-md-4"></div>
</div>
<!------- subtitulos de el modulo -------->

<div class="row">
<div class="col-md-2"><h4>CODIGO FORMULARIO:</h4></div>
<div class="col-md-3"><h4 class="text-muted"><?php echo $codigo_form_ss;?></h4></div>
<div class="col-md-2"><h4>EMPRESA:</h4></div>
<div class="col-md-5"><h4 class="text-muted"><?php echo $rowe[1];?></h4></div>
</div>

<div class="row">
			<div class="col-md-12">
				<table id="example" class="table table-striped table-bordered table-hover" cellspacing="1" width="100%">
			        <thead>
			        <tr>
      <th scope="col"><h5>N°</h5></th>
      <th scope="col"><h5>N° CONTROL</h5></th>
      <th scope="col"><h5>SUBFONDO/</br>SECCIÓN</h5></th>
      <th scope="col"><h5>SERIE DOCUMENTAL</h5></th>
      <th scope="col"><h5>CÓDIGO DEL DOCUMENTO ARCHIVADO</h5></th>
      <th scope="col"><h5>ENTIDAD</h5></th>
      <th scope="col"><h5>CONTENIDO O NOMBRE DEL DOCUMENTO</h5></th>
      <th scope="col"><h5>DPTO.</h5></th>
      <th scope="col"><h5>Nº DE CAJA</h5></th>
      <th scope="col"><h5>FECHA DESPACHO</h5></th>
      <th scope="col"><h5>ACCION</h5></th>
			        </tr>
			        </thead>
			        <tbody>
<?php
$contador=1;
$sql =" SELECT item_archivo.iditem_archivo, item_archivo.idform_archivo, item_archivo.idempresa, serie_documental.serie_documental, item_archivo.codigo ";
$sql.=" , departamento.departamento, caja.caja, item_archivo.fecha_despacho, item_archivo.fecha_hr, tomo.tomo, item_archivo.contenido, ";
$sql.=" item_archivo.no_fojas, cubierta.cubierta, item_archivo.cantidad, item_archivo.descripcion, observ_archivo.observ_archivo, item_archivo.idusuario_arch, item_archivo.idcorres, corres.no_control, corres.idcorres ";
$sql.=" FROM item_archivo, serie_documental, cubierta, departamento, caja, tomo, observ_archivo, corres WHERE item_archivo.idserie_documental=serie_documental.idserie_documental ";
$sql.=" AND item_archivo.idcubierta=cubierta.idcubierta AND item_archivo.idcaja=caja.idcaja AND item_archivo.idtomo=tomo.idtomo AND item_archivo.idobserv_archivo=observ_archivo.idobserv_archivo ";
$sql.=" AND item_archivo.idcorres=corres.idcorres AND item_archivo.iddepartamento=departamento.iddepartamento AND item_archivo.idform_archivo='$idform_archivo_ss' ";
$result = mysqli_query($link,$sql);
if ($row = mysqli_fetch_array($result)){
mysqli_field_seek($result,0);
while ($field = mysqli_fetch_field($result)){
} do {
?> 
  <tr>
      <th scope="row"> <h5 class="text-muted"> <?php echo $contador;?> </h5></th>
      <td> <h5 class="text-muted"><?php echo $row[18];?></h5></td>
      <td> <h5 class="text-muted"> <?php echo $subfondo;?></h5></td>
      <td> <h5 class="text-muted"> <?php echo $row[3];?> </h5></td>
      <td> <h5 class="text-muted"> <?php echo $row[4];?> </h5></td>
      <td> <h5 class="text-muted"> <?php echo $rowe[2];?> </h5></td>
      <td> <h5 class="text-muted"> <?php echo $row[10];?> </h5></td>
      <td> <h5 class="text-muted"> <?php echo $row[5];?> </h5></td>
      <td> <h5 class="text-muted"> <?php echo $row[6];?> </h5></td>

      <td> <h5 class="text-muted">
      <?php 
            $fecha_elab2 = explode('-',$row[8]);
            $f_hr        = $fecha_elab2[2].'/'.$fecha_elab2[1].'/'.$fecha_elab2[0];
            echo $f_hr;
      ?>	
      </h5></td>
      <td>
            <form name="BORRA" action="valida_item_archivo.php" method="post">
            <input type="hidden" name="iditem_archivo" value="<?php echo $row[0];?>">
            <input type="hidden" name="codigo_item" value="<?php echo $row[4];?>">
            <input type="hidden" id="idcorres" name="idcorres" value="<?php echo $row[19];?>">
            <button tipe="submit" class="btn-link"><h5 class="text-primary">MODIFICAR</h5></button>
            </form>                
      </td>
      </tr>
          <?php 
        $contador=$contador+1;  
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