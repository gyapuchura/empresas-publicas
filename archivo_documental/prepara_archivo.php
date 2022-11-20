<?php include("../cabf.php");?>
<?php include("../inc.config.php");?>
<?php
date_default_timezone_set('America/La_Paz');

$fecha_ram	= date("Ymd");
$fecha 		  = date("Y-m-d");

$idusuario_ss  =  $_SESSION['idusuario_ss'];
$idnombre_ss   =  $_SESSION['idnombre_ss'];
$perfil_ss     =  $_SESSION['perfil_ss'];

$idcorres_ss       =  $_SESSION['idcorres_ss'];
$idempresa_ss      =  $_SESSION['idempresa_ss'];
$idform_archivo_ss =  $_SESSION['idform_archivo_ss'];
$gestion           =  date("Y");

$sql1 = " SELECT corres.idcorres, corres.gestion, corres.correlativo, corres.idusuario, corres.referencia, corres.procedencia, corres.no_control, ";
$sql1.= " corres.fecha_corres, corres.anexo, corres.codigo, corres.origen, tipo_hojaruta.tipo_hojaruta ";
$sql1.= " FROM corres, tipo_hojaruta WHERE corres.idtipo_hojaruta=tipo_hojaruta.idtipo_hojaruta AND idcorres='$idcorres_ss' ";
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
				<h2 class="pageTitle">ARCHIVAR HOJA DE RUTA N° <?php echo $row1[2];?>/<?php echo $row1[1];?></h2>
			</div>
		</div>
	</div>
</section>
<div class="container contenido">
</br>
<div class="row"><a href="concluidas.php"><h4 class="text-primary" align="center" >VOLVER</h4></a> </div>

 <div class="row" align="center"><h3>
<div class="box-area">
 <div class="row">
  <div class="col-md-2"><h4>CODIGO:</h4></div>
  <div class="col-md-2"><h4 class="text-muted"><?php echo $row1[9];?></h4></div>
  <div class="col-md-2"><h4>REFERENCIA</h4></div>
  <div class="col-md-6"><h4 class="text-muted"><?php echo $row1[4];?></h4></div>
</div>

<div class="row">
  <div class="col-md-4"><h4>TIPO DE HOJA DE RUTA:</h4></div>
  <div class="col-md-8"><h4 class="text-muted"><?php echo $row1[11];?></h4></div>
</div>

<div class="row">
  <div class="col-md-2"><h4>PROCEDENCIA</h4></div>
  <div class="col-md-2"><h4 class="text-muted"><?php echo $row1[5];?></h4></div>
  <div class="col-md-2"><h4>NUMERO DE CONTROL:</h4></div>
  <div class="col-md-2"><h4 class="text-muted"><?php echo $row1[6];?></h4></div>
  <div class="col-md-2"><h4>FECHA:</h4></div>
  <div class="col-md-2"><h4 class="text-muted">
  <?php 
            $fecha_recib        = explode('-',$row1[7]);
            $f_recibido     = $fecha_recib[2].'/'.$fecha_recib[1].'/'.$fecha_recib[0];
            echo $f_recibido;
            ?>
</h4></div>
</div>
</div>
<!------ AQUI SE ELEGIURA LA UBICACION FISICA DEL ARCHIVO HOJA DE RUTA ----->

<div class="row">
    <div class="col-lg-12">
        <h2 class="text-primary">ELEGIR LA UBICACIÓN FÍSICA</h2>
    </div>
</div>

<form name="ARCHIVA" action="guarda_archivo_hr.php" method="post">
<div class="box-area">
<div class="row">
  <div class="col-md-4"><h4>CATEGORÍA DE ARCHIVO:</h4></div>
  <div class="col-md-8">
  <select name="idcategoria_archivo"  id="idcategoria_archivo" class="form-control">
<option value="">ELEGIR</option>
 <?php
$sql1 = " SELECT idcategoria_archivo, categoria_archivo FROM categoria_archivo WHERE idcategoria_archivo='1'";
$result1 = mysqli_query($link,$sql1);
if ($row1 = mysqli_fetch_array($result1)){
mysqli_field_seek($result1,0);
while ($field1 = mysqli_fetch_field($result1)){
} do {
echo "<option value=". $row1[0]. ">". $row1[1]. "</option>";
} while ($row1 = mysqli_fetch_array($result1));
} else {
echo "No se encontraron resultados!";
}
?>
</select>
  </div>
  </div>

<div class="row">
  <div class="col-md-4"><h4>ENTIDAD/UNIDAD:</h4></div>
  <div class="col-md-8">
  <select name="identidad_archivo" id="identidad_archivo" class="form-control"></select>
  </div>
</div>
<div class="row">
  <div class="col-md-4"><h4>UBICACIÓN FÍSICA ESPECÍFICA:</h4></div>
  <div class="col-md-8">
  <select name="idubicacion_archivo" id="idubicacion_archivo" class="form-control"></select>
  </div>
</div>

<div class="row">
  <div class="col-md-4"><h4>COMENTARIO (AL MOMENTO DE ARCHIVAR LA HOJA DE RUTA):</h4></div>
  <div class="col-md-8"><textarea class="form-control" rows="3" name="comentario_archivo"></textarea></div>
</div>


<div class="row">
  <div class="col-md-3"><h4></h4></div>
  <div class="col-md-9">    
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  ARCHIVAR HOJA DE RUTA
  </button>
  </div>
  </div>
</div>
</div>

</div>
<!---- --->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ARCHIVAR HOJA DE RUTA</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ¿Esta seguro de ARCHIVAR esta HOJA DE RUTA?
       </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">CANCELAR</button>
        <button type="submit" class="btn btn-primary pull-center">CONFIRMAR ARCHIVADO</button>     
      </div>
    </div>
  </div>
</div>
</form>


<!------ HASTA AQUI SE ELEGIURA LA UBICACION FISICA DEL ARCHIVO HOJA DE RUTA ----->

 <div class="row">

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

  <script language="javascript">
        $(document).ready(function(){
        $("#idcategoria_archivo").change(function () {
                $("#idcategoria_archivo option:selected").each(function () {
                    categoria_archivo=$(this).val();
                    $.post("entidad_archivo.php", { categoria_archivo: categoria_archivo }, function(data){
                    $("#identidad_archivo").html(data);
                    });
                });
        })
        });
  </script>
        <script language="javascript">
        $(document).ready(function(){
        $("#identidad_archivo").change(function () {
                $("#identidad_archivo option:selected").each(function () {
                    entidad_archivo=$(this).val();
                    $.post("ubicacion_archivo.php", { entidad_archivo: entidad_archivo }, function(data){
                    $("#idubicacion_archivo").html(data);
                    });
                });
        })
        });
    </script>

</body>
</html>