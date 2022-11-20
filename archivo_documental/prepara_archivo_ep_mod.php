<?php include("../cabf.php");?>
<?php include("../inc.config.php");?>
<?php
date_default_timezone_set('America/La_Paz');
$fecha_ram	  = date("Ymd");
$fecha 	      = date("Y-m-d");

$idusuario_ss = $_SESSION['idusuario_ss'];
$idnombre_ss  = $_SESSION['idnombre_ss'];
$perfil_ss    = $_SESSION['perfil_ss'];

$gestion  = date("Y");

$subfondo = "SCEP";

$idcorres_ss       = $_SESSION['idcorres_ss'];
$idform_archivo_ss = $_SESSION['idform_archivo_ss'];
$idempresa_ss      = $_SESSION['idempresa_ss'];
$codigo_form_ss    = $_SESSION['codigo_form_ss'];
$codigo_item_ss    = $_SESSION['codigo_item_ss'];
$iditem_archivo_ss = $_SESSION['iditem_archivo_ss'];

$sqls =" SELECT item_archivo.iditem_archivo, item_archivo.idform_archivo, item_archivo.idempresa, item_archivo.idserie_documental, item_archivo.codigo, item_archivo.iddepartamento, item_archivo.idcaja, ";
$sqls.=" item_archivo.fecha_despacho, item_archivo.fecha_hr, item_archivo.idtomo, item_archivo.contenido, item_archivo.no_fojas, item_archivo.idcubierta, item_archivo.cantidad, item_archivo.descripcion, ";
$sqls.=" item_archivo.idobserv_archivo, item_archivo.idusuario_arch, item_archivo.idcorres, corres.codigo, corres.referencia, empresa.razon_social, corres.comentario_conclusion, corres.comentario_archivo, corres.no_control ";
$sqls.=" FROM item_archivo, serie_documental, cubierta, departamento, corres, empresa  WHERE item_archivo.idempresa=empresa.idempresa AND item_archivo.idcorres=corres.idcorres AND item_archivo.idserie_documental=serie_documental.idserie_documental ";
$sqls.=" AND item_archivo.idcubierta=cubierta.idcubierta AND item_archivo.iddepartamento=departamento.iddepartamento AND item_archivo.iditem_archivo='$iditem_archivo_ss' ";
$results = mysqli_query($link,$sqls);
$rows = mysqli_fetch_array($results);
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
<link rel="stylesheet" href="../ss/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="../css/jquery-ui.min.css">
<link rel="stylesheet" href="../css/style.css">
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
				<h2 class="pageTitle">MODIFICAR ARCHIVO DOCUMENTAL</h2>
			</div>
		</div>
	</div>
</section>
<div class="container contenido">

<div class="row">
<div class="col-md-4"> </div>
<div class="col-md-4">

<form name="VOLVER" action="elab_formulario.php" method="post">
<h3><button type="submmit" class="btn-link" >VOLVER</button></h3>
</form>
</div>
<div class="col-md-4"></div>
</div>

<!------- subtitulos de el modulo -------->

<div class="box-area">
<div class="row">
<div class="col-md-2"><h4>N° CONTROL:</h4></div>
<div class="col-md-2"><h4 class="text-muted"><?php echo $rows[23];?></h4></div>
<div class="col-md-2"><h4>EMPRESA:</h4></div>
<div class="col-md-6"><h4 class="text-muted"><?php echo $rows[20];?></h4></div>
</div>
<div class="row">
<div class="col-md-2"><h4>CÓDIGO HOJA DE RUTA:</h4></div>
<div class="col-md-3"><h4 class="text-muted"><?php echo $rows[18];?></h4></div>
<div class="col-md-2"><h4>REFERENCIA:</h4></div>
<div class="col-md-5"><h4 class="text-muted"><?php echo $rows[19];?></h4></div>
</div>
<div class="row">
<div class="col-md-2"><h4>CÓDIGO FORMULARIO ARCHIVO:</h4></div>
<div class="col-md-3"><h4 class="text-muted"><?php echo $codigo_form_ss;?></h4></div>
<div class="col-md-2"><h4>CÓDIGO ARCHIVO DOCUMENTAL:</h4></div>
<div class="col-md-5"><h4 class="text-muted"><?php echo $codigo_item_ss;?></h4></div>
</div>

<div class="row">
<div class="col-md-3"><h4>COMENTARIO A LA CONCLUSIÓN DE LA HOJA DE RUTA:</h4></div>
<div class="col-md-6"><h4 class="text-muted"><?php echo $rows[21];?></h4></div>
<div class="col-md-3"><a href="../impresion_documentos/imprime_hoja_ruta_ver.php?idcorres=<?php echo $idcorres_ss;?>" target="_blank" class="Estilo12" onClick="window.open(this.href, this.target, 'width=750,height=850,scrollbars=YES,top=50,left=200'); return false;"><h4>VER HOJA RUTA COMPLETA</a></h4></div>
</div>
</div>
  
<!------ EMISION DE REPORTES INSTATANEOM Y EXCEL ----->

<!------ FORMULARIO DE INGRESO DE DATOS ----->
<div class="row">
<h2>MODIFICAR DATOS PARA ARCHIVO DOCUMENTAL</h2>
</div>
<div class="row">
<div class="col-md-12"><p>Ingresar los datos de cada archivo documental, el resultado será mostrando en el módulo de FORMULARIO ARCHIVO.</p></div>
</div>
<div class="box-area">

<form method="post" action="guarda_item_archivo_ep_mod.php" >
<div class="row">
    <div class="col-md-2"><h4>SERIE DOCUMENTAL:</h4></div>
    <div class="col-md-2">

<select name="idserie_documental" id="idserie_documental" class="form-control">

<?php
$sql_ca = " SELECT idserie_documental, serie_documental FROM serie_documental ";
$result_ca = mysqli_query($link,$sql_ca);
if ($row_ca = mysqli_fetch_array($result_ca)){
mysqli_field_seek($result_ca,0);
while ($field_ca = mysqli_fetch_field($result_ca)){
} do {
?>
<option value="<?php echo $row_ca[0];?>" <?php if ($row_ca[0]==$rows[3]) echo "selected";?> > <?php echo $row_ca[1];?> </option>
<?php
} while ($row_ca = mysqli_fetch_array($result_ca));
} else {
}
?>
</select>

    </div>  
    <div class="col-md-2"><h4>DEPARTAMENTO:</h4></div>
    <div class="col-md-2">
    <select name="iddepartamento" id="iddepartamento" class="form-control">
<?php
$sql_ca = " SELECT iddepartamento, departamento FROM departamento ";
$result_ca = mysqli_query($link,$sql_ca);
if ($row_ca = mysqli_fetch_array($result_ca)){
mysqli_field_seek($result_ca,0);
while ($field_ca = mysqli_fetch_field($result_ca)){
} do {
?>
<option value="<?php echo $row_ca[0];?>" <?php if ($row_ca[0]==$rows[5]) echo "selected";?> > <?php echo $row_ca[1];?> </option>
<?php
} while ($row_ca = mysqli_fetch_array($result_ca));
} else {
}
?>
</select>   
    </div>    
    <div class="col-md-2"><h4>NÚMERO DE CAJA:</h4></div>
    <div class="col-md-2">
    <select name="idcaja" id="idcaja" class="form-control">
      <?php
      $sql_ca = " SELECT idcaja, caja FROM caja ";
      $result_ca = mysqli_query($link,$sql_ca);
      if ($row_ca = mysqli_fetch_array($result_ca)){
      mysqli_field_seek($result_ca,0);
      while ($field_ca = mysqli_fetch_field($result_ca)){
      } do {
      ?>
      <option value="<?php echo $row_ca[0];?>" <?php if ($row_ca[0]==$rows[6]) echo "selected";?> > <?php echo $row_ca[1];?> </option>
      <?php
      } while ($row_ca = mysqli_fetch_array($result_ca));
      } else {
      }
      ?>
    </select> 
    </div>   
</div>

<div class="row">
    <div class="col-md-2"><h4>FECHA ADE DESPACHO</h4></div>
    <div class="col-md-2">
    <input type="text" id="fecha1" class="form-control" name="fecha_despacho" value="<?php 
    $fecha_i        = explode('-',$rows[7]);
    $f_despacho     = $fecha_i[2].'/'.$fecha_i[1].'/'.$fecha_i[0];
    echo $f_despacho;?>">     
    </div>  
    <div class="col-md-2"><h4>FECHA DE LA HOJA DE RUTA (HR):</h4></div>
    <div class="col-md-2"><h4 class="text-muted">
    <?php   $fecha_i        = explode('-',$rows[8]);
            $f_hojaruta     = $fecha_i[2].'/'.$fecha_i[1].'/'.$fecha_i[0];
            echo $f_hojaruta;
            ?></h4>
 
    </div>    
    <div class="col-md-2"><h4>N° TOMO:</h4></div>
    <div class="col-md-2">
    <select name="idtomo" id="idtomo" class="form-control">

<?php
$sql_ca = " SELECT idtomo, tomo FROM tomo ";
$result_ca = mysqli_query($link,$sql_ca);
if ($row_ca = mysqli_fetch_array($result_ca)){
mysqli_field_seek($result_ca,0);
while ($field_ca = mysqli_fetch_field($result_ca)){
} do {
?>
<option value="<?php echo $row_ca[0];?>" <?php if ($row_ca[0]==$rows[9]) echo "selected";?> > <?php echo $row_ca[1];?> </option>
<?php
} while ($row_ca = mysqli_fetch_array($result_ca));
} else {
}
?>
</select> 
    </div>   
</div>

<div class="row">
<div class="col-md-2"><h4>CONTENIDO O NOMBRE DEL DOCUMENTO:</h4></div>

<div class="col-md-5"><h4 class="text-muted"><?php echo $rows[10];?></h4></div>
<div class="col-md-2"><h4>N° FOJAS:</h4></div>
<div class="col-md-3"><input type="text"  class="form-control" name="no_fojas" value="<?php echo $rows[11];?>" required></div> 
</div> 

<div class="row">
<div class="col-md-2"><h4>CUBIERTA:</h4></div>
<div class="col-md-5">
<select name="idcubierta" id="idcubierta" class="form-control">

<?php
$sql_ca = " SELECT idcubierta, cubierta FROM cubierta ";
$result_ca = mysqli_query($link,$sql_ca);
if ($row_ca = mysqli_fetch_array($result_ca)){
mysqli_field_seek($result_ca,0);
while ($field_ca = mysqli_fetch_field($result_ca)){
} do {
?>
<option value="<?php echo $row_ca[0];?>" <?php if ($row_ca[0]==$rows[12]) echo "selected";?> > <?php echo $row_ca[1];?> </option>
<?php
} while ($row_ca = mysqli_fetch_array($result_ca));
} else {
}
?>
</select> 
    </div>    
    <div class="col-md-2"><h4>CANTIDAD:</h4></div>
    <div class="col-md-3">
    <input type="text"  class="form-control" name="cantidad" value="<?php echo $rows[13];?>" required>
    </div>   
</div>

<div class="row">
    <div class="col-md-2"><h4>DESCRIPCIÓN:</h4></div>
    <div class="col-md-4"><textarea class="form-control" rows="3" name="descripcion" required><?php echo $rows[14];?></textarea></div>
    <div class="col-md-2"><h4>OBSERVACIONES:</h4></div>
    <div class="col-md-4">
      <select name="idobserv_archivo" id="idobserv_archivo" class="form-control">
      <?php
      $sql_ca = " SELECT idobserv_archivo, observ_archivo FROM observ_archivo ";
      $result_ca = mysqli_query($link,$sql_ca);
      if ($row_ca = mysqli_fetch_array($result_ca)){
      mysqli_field_seek($result_ca,0);
      while ($field_ca = mysqli_fetch_field($result_ca)){
      } do {
      ?>
      <option value="<?php echo $row_ca[0];?>" <?php if ($row_ca[0]==$rows[15]) echo "selected";?> > <?php echo $row_ca[1];?> </option>
      <?php
      } while ($row_ca = mysqli_fetch_array($result_ca));
      } else {
      }
      ?>
      </select> 

    </div> 
</div> 

<div class="row">
<div class="col-md-4"><h4>COMENTARIO (PARA REPORTE SCEP):</h4></div>
<div class="col-md-8"><textarea class="form-control" rows="3" name="comentario_archivo" required><?php echo $rows[22];?></textarea></div>
</div> 

<div class="row">
<div class="col-md-4">
</div>
<div class="col-md-8">
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#actualiza">GUARDAR CAMBIOS</button>
</div>
</div>
</div>
<!----- modal de actualizacion de estado ---->
<div class="modal fade" id="actualiza" tabindex="-1" role="dialog" aria-labelledby="actualiza" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="actualizaLabel">MODIFICACIÓN DE ARCHIVO DOCUMENTAL</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
          ¿Esta seguro de MODIFICAR EL REGISTRO DE ARCHIVO DE LA HOJA DE RUTA?
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">CANCELAR</button>
        <button type="submit" class="btn btn-primary pull-center">CONFIRMAR</button>
      </div>
    </div>
  </div>
</div>
<!----- modal de GUARDADO DE ITEM ---->
</form>

 </div>
    </br>

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
  <script src="../js/jquery.js"></script>
  <script src="../js/jquery-ui.min.js"></script>
  <script src="../js/datepicker-es.js"></script>
  <script>
    $("#fecha1").datepicker($.datepicker.regional[ "es" ]);
  </script>
   <script>
    $("#fecha2").datepicker($.datepicker.regional[ "es" ]);
  </script>
</body>
</html>