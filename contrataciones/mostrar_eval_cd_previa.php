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

$idempresa_ss        =  $_SESSION['idempresa_ss'];
$idformulario_cd_ss  =  $_SESSION['idformulario_cd_ss'];
$codigo_form_ss      =  $_SESSION['codigo_form_ss'];

$sql1 =" SELECT idformulario_cd, iddeclaracion_cd, idempresa, correlativo, codigo, cuce, codigo_int, ";
$sql1.=" objeto_cd, importe, proveedor, plazo, reglamento_especifico, idusuario, fecha_form, gestion, ";
$sql1.=" idatribucion_cd, idcumplimiento, comentario_observacion, idapoyo_cd, idtipo_contratacion, nb_sabs, re_sabs, re_remision, idposible_dano, ";
$sql1.=" comentario_dano FROM formulario_cd WHERE idformulario_cd='$idformulario_cd_ss'";
$result1 = mysqli_query($link,$sql1);
$row1 = mysqli_fetch_array($result1);

$sql_e  = " SELECT idempresa, razon_social, cod_presup, sigla FROM empresa WHERE idempresa='$idempresa_ss' ";
$result_e = mysqli_query($link,$sql_e);
$row_e    = mysqli_fetch_array($result_e);
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
				<h2 class="pageTitle">EVALUACIÓN <?php echo $codigo_form_ss;?></h2>
			</div>
		</div>
	</div>
</section>
<div class="container contenido">
</br>

<div class="row"> 
<div class="col-md-12"></div>
</div>

<div class="row"> 
<div class="col-md-12"><h3>I. DATOS BÁSICOS DE LA CONTRATACIÓN DIRECTA</h3></div>
</div>

<div class="box-area">
<div class="row">
  <div class="col-md-2"><h4>EMPRESA:</h4></div>
  <div class="col-md-3"><h4 class="text-muted"><?php echo $row_e[1];?></h4></div>  
  <div class="col-md-2"><h4>CÓDIGO INSTITUCIONAL:</h4></div>
  <div class="col-md-1"><h4 class="text-muted"><?php echo $row_e[2];?></h4></div>  
  <div class="col-md-1"><h4>CUCE:</h4></div>
  <div class="col-md-3"><h4 class="text-muted"><?php echo $row1[5];?></h4></div>  
</div>

<div class="row">
  <div class="col-md-2"><h4>CÓDIGO INTERNO:</h4></div>
  <div class="col-md-3"><h4 class="text-muted"><?php echo $row1[6];?></h4></div>  
  <div class="col-md-2"><h4>OBJETO DE CONTRATACIÓN:</h4></div>
  <div class="col-md-5"><h4 class="text-muted"><?php echo $row1[7];?></h4></div>  
</div>

<div class="row">
  <div class="col-md-2"><h4>IMPORTE TOTAL CONTRATADO EN Bs.:</h4></div>
  <div class="col-md-3"><h4 class="text-muted"><?php echo $row1[8];?></h4></div>  
  <div class="col-md-3"><h4>PROVEEDOR CONTRATADO:</h4></div>
  <div class="col-md-4"><h4 class="text-muted"><?php echo $row1[9];?></h4></div>   
</div>

<div class="row">
<div class="col-md-1"><h4>PLAZO:</h4></div>
  <div class="col-md-4"><h4 class="text-muted"><?php echo $row1[10];?></h4></div>  
  <div class="col-md-3"><h4>REGLAMENTO ESPECÍFICO UTILIZADO Y DOCUMENTO DE APROBACIÓN:</h4></div>
  <div class="col-md-4"><h4 class="text-muted"><?php echo $row1[11];?></h4></div>  
</div>
</div>

<div class="row"> 
<div class="col-md-3"></div> 
<div class="col-md-6"><h2 align="center">EVALUACIÓN</h2></div>
<div class="col-md-3"></div> 
</div>

<div class="row"> 
<div class="col-md-3"></div> 
<div class="col-md-6"><h3 align="center">ANÁLISIS</h></div>
<div class="col-md-3"></div> 
</div>

<div class="box-area">
<div class="row">
<div class="col-md-12"><h3>1.- EL OBJETO CONTRATADO ESTA DENTRO DE LAS ATRIBUCIONES DE LA EMPRESA PÚBLICA:</h3></div>
</div>

<div class="row">
<div class="col-md-12">

<select name="idatribucion_cd" id="idatribucion_cd" class="form-control">

<?php
$sql_ca = " SELECT idatribucion_cd, atribucion_cd FROM atribucion_cd ";
$result_ca = mysqli_query($link,$sql_ca);
if ($row_ca = mysqli_fetch_array($result_ca)){
mysqli_field_seek($result_ca,0);
while ($field_ca = mysqli_fetch_field($result_ca)){
} do {
?>
<option value="<?php echo $row_ca[0];?>" <?php if ($row_ca[0]==$row1[15]) echo "selected";?> disabled> <?php echo $row_ca[1];?></option>
<?php
} while ($row_ca = mysqli_fetch_array($result_ca));
} else {
}
?>
</select>	

</div>
</div>
</div>
<!-------- begin dependiendo de la atribucion de la Empresa Pública -------->
<?php
if ($row1[15] == '1') {
    ?>    
    <div class="box-area" id="evaluacion_cd">

    <form name="FORM_EV" action="guarda_eval_form_cd.php" method="post">

<div class="row"> 
<div class="col-md-4"><h4 class="text-muted">LOS DATOS BÁSICOS ESTÁN CORRECTAMENTE LLENADOS:</h4></div> 
<div class="col-md-2">

<select name="idcumplimiento" id="idcumplimiento" class="form-control">

<?php
$sql_ca = " SELECT idcumplimiento, cumplimiento FROM cumplimiento ";
$result_ca = mysqli_query($link,$sql_ca);
if ($row_ca = mysqli_fetch_array($result_ca)){
mysqli_field_seek($result_ca,0);
while ($field_ca = mysqli_fetch_field($result_ca)){
} do {
?>
<option value="<?php echo $row_ca[0];?>" <?php if ($row_ca[0]==$row1[16]) echo "selected";?> disabled> <?php echo $row_ca[1];?></option>
<?php
} while ($row_ca = mysqli_fetch_array($result_ca));
} else {
}
?>
</select>	

</div> 
<div class="col-md-2"><h4 class="text-muted">COMENTARIOS Y/O OBSERVACIONES</h4></div> 
<div class="col-md-4"><textarea class="form-control" rows="3" name="comentario_observacion" disabled><?php echo $row1[17];?></textarea></div> 
</div>


<div class="row">
<div class="col-md-12"><h3>2.- NATURALEZA Y MAGNITUD DE OPERACIONES DE LA EMPRESA PÚBLICA</h3></div>
</div>

<div class="row">
<div class="col-md-4"><h4 class="text-muted">LA CONTRATACIÓN APOYA A LAS ACTIVIDADES PRODUCTIVAS O ADMINISTRATIVAS</h4></div>
<div class="col-md-4">

<select name="idapoyo_cd" id="idapoyo_cd" class="form-control">

<?php
$sql_ca = " SELECT idapoyo_cd, apoyo_cd FROM apoyo_cd ";
$result_ca = mysqli_query($link,$sql_ca);
if ($row_ca = mysqli_fetch_array($result_ca)){
mysqli_field_seek($result_ca,0);
while ($field_ca = mysqli_fetch_field($result_ca)){
} do {
?>
<option value="<?php echo $row_ca[0];?>" <?php if ($row_ca[0]==$row1[18]) echo "selected";?> disabled> <?php echo $row_ca[1];?></option>
<?php
} while ($row_ca = mysqli_fetch_array($result_ca));
} else {
}
?>
</select>	

</div>

<div class="col-md-2"><h4>TIPO DE CONTRATACIÓN:</h4></div>
<div class="col-md-2">

<select name="idtipo_contratacion" id="idtipo_contratacion" class="form-control">

<?php
$sql_ca = " SELECT idtipo_contratacion, tipo_contratacion FROM tipo_contratacion ";
$result_ca = mysqli_query($link,$sql_ca);
if ($row_ca = mysqli_fetch_array($result_ca)){
mysqli_field_seek($result_ca,0);
while ($field_ca = mysqli_fetch_field($result_ca)){
} do {
?>
<option value="<?php echo $row_ca[0];?>" <?php if ($row_ca[0]==$row1[19]) echo "selected";?> disabled> <?php echo $row_ca[1];?></option>
<?php
} while ($row_ca = mysqli_fetch_array($result_ca));
} else {
}
?>
</select>	
</div>
</div>

<div class="row">
<div class="col-md-12"><h4>3.- CUMPLIMIENTO DE DISPOSICIONES LEGALES</h4></div>
</div>

<div class="row">
<div class="col-md-6"><h4 class="text-muted">3.1.- Normas Básicas del Sistema de Administración de Bienes y Servicios</h4></div>
<div class="col-md-6"><textarea name="nb_sabs"  rows="2" class="form-control" disabled><?php echo $row1[20];?></textarea></div>
</div>
<div class="row">
<div class="col-md-6"><h4 class="text-muted">3.2.- Reglamento Especifico del Sistema de Administracion de Bienes y Servicios RE-SABS</h4></div>
<div class="col-md-6"><textarea name="re_sabs"  rows="2" class="form-control" disabled><?php echo $row1[21];?></textarea></div>
</div>
<div class="row">
<div class="col-md-6"><h4 class="text-muted">3.3.- Reglamento para la Remisión de Informacion de Procesos de Contratación Directa de Empresas Públicas RE/CE-086</h4></div>
<div class="col-md-6"><textarea name="re_remision"  rows="2" class="form-control" disabled><?php echo $row1[22];?></textarea></div>
</div>

<div class="row">
<div class="col-md-9"></div>
<div class="col-md-3"><a href="formulario_cd_scep_eval.php">EVALUAR NUEVAMENTE</a></div>
</div>


    </div>    
    <?php
} else {
    ?>
    <div class="box-area" id="evaluacion_cd">

    <div class="row">
<div class="col-md-12"><h3 class="text-warning">2.- DETERMINACIÓN DE POSIBLES DAÑOS</h3></div>
</div>

<div class="row">
<div class="col-md-6"><h3 class="text-warning">2.1,- SE DETERMINA EL POSIBLE DAÑO DEL TIPO:</h3></div>
<div class="col-md-6">
<select name="idposible_dano" id="idposible_dano" class="form-control">
<?php
$sql_ca = " SELECT idposible_dano, posible_dano FROM posible_dano ";
$result_ca = mysqli_query($link,$sql_ca);
if ($row_ca = mysqli_fetch_array($result_ca)){
mysqli_field_seek($result_ca,0);
while ($field_ca = mysqli_fetch_field($result_ca)){
} do {
?>
<option value="<?php echo $row_ca[0];?>" <?php if ($row_ca[0]==$row1[23]) echo "selected";?> disabled> <?php echo $row_ca[1];?></option>
<?php
} while ($row_ca = mysqli_fetch_array($result_ca));
} else {
}
?>
</select>	
</div>
</div>

<div class="row">
<div class="col-md-6"><h4 class="text-warning">2.2.- COMENTARIO Y/O OBSERRVACIÓN</h4></div>
<div class="col-md-6"><textarea name="comentario_dano"  rows="4" class="form-control" disabled><?php echo $row1[24];?></textarea></div>
</div>  

<div class="row">
<div class="col-md-9"></div>
<div class="col-md-3"><a href="formulario_cd_scep_eval.php">EVALUAR NUEVAMENTE</a></div>
</div>

</div>

<?php
}
?>


<!-------- begin dependiendo de la atribucion de la Empresa Pública -------->

<div class="row">
<div class="col-md-4"></div>
<div class="col-md-4"></div>
</div>

<div class="row">
<div class="col-md-4">
<a href="formularios_asignados.php"><h4 class="text-primary">VOLVER A FORMULARIOS ASIGNADOS</h4></a>
</div>
<div class="col-md-4"></div>
<div class="col-md-4">
<a href="evalua_puntos_cd.php"><h4 class="text-primary">CONTINUAR EVALUACIÓN</h4></a>
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
  <script language="javascript" src="../js/jquery-3.1.1.min.js"></script>

  <script language="javascript">
  $(document).ready(function(){
    $("#idatribucion_cd").change(function () {
        $("#idatribucion_cd option:selected").each(function () {
          atribucion_cd=$(this).val();
          $.post("intro_evaluacion_cd.php", {atribucion_cd:atribucion_cd}, function(data){
          $("#evaluacion_cd").html(data);
          });
      });
    })
  });
  </script>
  
</body>
</html>