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


$sqle =" SELECT corres.idcorres, empresa.razon_social, corres.referencia, corres.codigo, corres.comentario_conclusion, corres.fecha_corres, corres.no_control FROM corres, empresa ";
$sqle.=" WHERE corres.idempresa=empresa.idempresa AND corres.idcorres='$idcorres_ss' ";
$resulte = mysqli_query($link,$sqle);
$rowe = mysqli_fetch_array($resulte);

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
				<h2 class="pageTitle">ARCHIVO DE CORRESPONDENCIA</h2>
			</div>
		</div>
	</div>
</section>
<div class="container contenido">

<div class="row">
<div class="col-md-4"> </div>
<div class="col-md-4">

<form name="VOLVER" action="concluidas.php" method="post">
<h3><button type="submmit" class="btn-link" >VOLVER</button></h3>
</form>
</div>
<div class="col-md-4"></div>
</div>
<!------- subtitulos de el modulo -------->

<div class="box-area">
<div class="row">
<div class="col-md-2"><h4>N° CONTROL:</h4></div>
<div class="col-md-3"><h4 class="text-muted"><?php echo $rowe[6];?></h4></div>
<div class="col-md-2"><h4>EMPRESA:</h4></div>
<div class="col-md-5"><h4 class="text-muted"><?php echo $rowe[1];?></h4></div>
</div>
<div class="row">
<div class="col-md-2"><h4>CODIGO HOJA DE RUTA:</h4></div>
<div class="col-md-3"><h4 class="text-muted"><?php echo $rowe[3];?></h4></div>
<div class="col-md-2"><h4>REFERENCIA:</h4></div>
<div class="col-md-5"><h4 class="text-muted"><?php echo $rowe[2];?></h4></div>
</div>
<div class="row">
<div class="col-md-4"><h4>CÓDIGO FORMULARIO ARCHIVO:</h4></div>
<div class="col-md-8"><h4 class="text-muted"><?php echo $codigo_form_ss;?></h4></div>
</div>
<div class="row">
<div class="col-md-3"><h4>COMENTARIO A LA CONCLUSIÓN DE LA HOJA DE RUTA:</h4></div>
<div class="col-md-6"><h4 class="text-muted"><?php echo $rowe[4];?></h4></div>
<div class="col-md-3"><a href="../impresion_documentos/imprime_hoja_ruta_ver.php?idcorres=<?php echo $idcorres_ss;?>" target="_blank" class="Estilo12" onClick="window.open(this.href, this.target, 'width=750,height=850,scrollbars=YES,top=50,left=200'); return false;"><h4>VER HOJA RUTA COMPLETA</a></h4></div>
</div>
</div>
  
<!------ EMISION DE REPORTES INSTATANEOM Y EXCEL ----->

<!------ FORMULARIO DE INGRESO DE DATOS ----->
<div class="row">
<h2>INGRESAR DATOS PARA ARCHIVO DOCUMENTAL</h2>
</div>
<div class="row">
<div class="col-md-12"><p>Ingresar los datos de cada archivo documental, el resultado será mostrando en el módulo de FORMULARIO ARCHIVO.</p></div>
</div>
<div class="box-area">
  
<form method="post" action="guarda_item_archivo_ep.php" >
<div class="row">
    <div class="col-md-2"><h4>SERIE DOCUMENTAL:</h4></div>
    <div class="col-md-3">
    <select name="idserie_documental" id="idserie_documental" class="form-control" required>
  <option value="">ELEGIR</option>
 <?php
$sql1 = " SELECT idserie_documental, serie_documental FROM serie_documental";
$result1 = mysqli_query($link,$sql1);
if ($row1 = mysqli_fetch_array($result1)){
mysqli_field_seek($result1,0);
while ($field1 = mysqli_fetch_field($result1)){
} do {
echo "<option value=".$row1[0].">".$row1[1]."</option>";
} while ($row1 = mysqli_fetch_array($result1));
} else {
echo "No se encontraron resultados!";
}
?>
</select>    
    </div>  
    <div class="col-md-2"><h4>CÓDIGO DOCUMENTAL:</h4></div>
    <div class="col-md-5" id="correlativo_nuevo"></div>
    </div>  
<div class="row">
    <div class="col-md-3"><h4>DEPARTAMENTO:</h4></div>
    <div class="col-md-3">
    <select name="iddepartamento"  id="iddepartamento" class="form-control" required>
  <option value="">ELEGIR</option>
 <?php
$sql1 = " SELECT iddepartamento, departamento FROM departamento";
$result1 = mysqli_query($link,$sql1);
if ($row1 = mysqli_fetch_array($result1)){
mysqli_field_seek($result1,0);
while ($field1 = mysqli_fetch_field($result1)){
} do {
echo "<option value=".$row1[0].">".$row1[1]."</option>";
} while ($row1 = mysqli_fetch_array($result1));
} else {
echo "No se encontraron resultados!";
}
?>
</select>     
    </div>    
    <div class="col-md-3"><h4>NÚMERO DE CAJA:</h4></div>
    <div class="col-md-3">
    <select name="idcaja"  id="idcaja" class="form-control" required>
<option value="">ELEGIR</option>
<?php
$sql1 = " SELECT idcaja, caja FROM caja ";
$result1 = mysqli_query($link,$sql1);
if ($row1 = mysqli_fetch_array($result1)){
mysqli_field_seek($result1,0);
while ($field1 = mysqli_fetch_field($result1)){
} do {
echo "<option value=".$row1[0].">".$row1[1]."</option>";
} while ($row1 = mysqli_fetch_array($result1));
} else {
echo "No se encontraron resultados!";
}
?>
</select> 
    </div>   
</div>

<div class="row">
    <div class="col-md-2"><h4>FECHA ADE DESPACHO</h4></div>
    <div class="col-md-2">
    <input type="text" id="fecha1" class="form-control" name="fecha_despacho">     
    </div>  
    <div class="col-md-2"><h4>FECHA DE LA HOJA DE RUTA (HR):</h4></div>
    <div class="col-md-2"><h4 class="text-muted">
    <?php   $fecha_i        = explode('-',$rowe[5]);
            $f_hojaruta     = $fecha_i[2].'/'.$fecha_i[1].'/'.$fecha_i[0];
            echo $f_hojaruta;
            ?></h4>
    <input type="hidden" name="fecha_hr" value="<?php echo $rowe[5];?>">
    </div>    
    <div class="col-md-2"><h4>N° TOMO:</h4></div>
    <div class="col-md-2">
    <select name="idtomo"  id="idtomo" class="form-control">
<?php
$sql1 = " SELECT idtomo, tomo FROM tomo ";
$result1 = mysqli_query($link,$sql1);
if ($row1 = mysqli_fetch_array($result1)){
mysqli_field_seek($result1,0);
while ($field1 = mysqli_fetch_field($result1)){
} do {
echo "<option value=".$row1[0].">".$row1[1]."</option>";
} while ($row1 = mysqli_fetch_array($result1));
} else {
echo "No se encontraron resultados!";
}
?>
</select> 
    </div>   
</div>

<div class="row">
<div class="col-md-2"><h4>CONTENIDO O NOMBRE DEL DOCUMENTO:</h4></div>
<input type="hidden" name="contenido" value="<?php echo $rowe[2];?>">
<div class="col-md-5"> <h4 class="text-muted"><?php echo $rowe[2];?></h4></div>
<div class="col-md-2"><h4>N° FOJAS:</h4></div>
<div class="col-md-3"><input type="text"  class="form-control" name="no_fojas" required></div> 
</div> 

<div class="row">
<div class="col-md-2"><h4>CUBIERTA:</h4></div>
<div class="col-md-5">
<select name="idcubierta"  id="idcubierta" class="form-control" required>
<option value="">ELEGIR</option>
<?php
$sql1 = " SELECT idcubierta, cubierta FROM cubierta ";
$result1 = mysqli_query($link,$sql1);
if ($row1 = mysqli_fetch_array($result1)){
mysqli_field_seek($result1,0);
while ($field1 = mysqli_fetch_field($result1)){
} do {
echo "<option value=".$row1[0].">".$row1[1]."</option>";
} while ($row1 = mysqli_fetch_array($result1));
} else {
echo "No se encontraron resultados!";
}
?>
</select>   
    </div>    
    <div class="col-md-2"><h4>CANTIDAD:</h4></div>
    <div class="col-md-3">
    <input type="text"  class="form-control" name="cantidad" required>
    </div>   
</div>

<div class="row">
<div class="col-md-2"><h4>DESCRIPCIÓN:</h4></div>
<div class="col-md-4"><textarea class="form-control" rows="3" name="descripcion" required></textarea></div>
<div class="col-md-2"><h4>OBSERVACIONES:</h4></div>
<div class="col-md-4">
<select name="idobserv_archivo"  id="idobserv_archivo" class="form-control" required>
<option value="">ELEGIR</option>
<?php
$sql1 = " SELECT idobserv_archivo, observ_archivo FROM observ_archivo ";
$result1 = mysqli_query($link,$sql1);
if ($row1 = mysqli_fetch_array($result1)){
mysqli_field_seek($result1,0);
while ($field1 = mysqli_fetch_field($result1)){
} do {
echo "<option value=".$row1[0].">".$row1[1]."</option>";
} while ($row1 = mysqli_fetch_array($result1));
} else {
echo "No se encontraron resultados!";
}
?>
</select> 
</div> 
</div> 

<div class="row">
<div class="col-md-4"><h4>COMENTARIO (PARA REPORTE SCEP):</h4></div>
<div class="col-md-8"><textarea class="form-control" rows="3" name="comentario_archivo" required></textarea></div>
</div> 

<div class="row">
<div class="col-md-4">
</div>
<div class="col-md-8">
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#actualiza">REGISTRAR ARCHIVO</button>
</div>
</div>
</div>
<!----- modal de actualizacion de estado ---->
<div class="modal fade" id="actualiza" tabindex="-1" role="dialog" aria-labelledby="actualiza" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="actualizaLabel">REGISTRO DE ARCHIVO DOCUMENTAL</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
          ¿Esta seguro de ARCHIVAR LA DOCUMENTACION DE LA HOJA DE RUTA?
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
  <script language="javascript" src="js/jquery-3.1.1.min.js"></script>
<script language="javascript">
$(document).ready(function(){
   $("#idserie_documental").change(function () {
           $("#idserie_documental option:selected").each(function () {
            idserie_documental=$(this).val();
            $.post("correlativo_archivo.php", {idserie_documental:idserie_documental}, function(data){
            $("#correlativo_nuevo").html(data);
            });
        });
   })
});
</script>
</body>
</html>