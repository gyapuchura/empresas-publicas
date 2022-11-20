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

if($_SESSION['perfil_ss'] != "DAF-EMPRESA"){ 		
	header("Location:../index.php");	
}
$iddeclaracion_cd_ss =  $_SESSION['iddeclaracion_cd_ss'];
$idempresa_ss        =  $_SESSION['idempresa_ss'];
$codigo_ss           =  $_SESSION['codigo_ss'];
$idformulario_cd_ss  =  $_SESSION['idformulario_cd_ss'];
$codigo_form_ss      =  $_SESSION['codigo_form_ss'];

$sql1 ="SELECT idformulario_cd, iddeclaracion_cd, idempresa, correlativo, codigo, cuce, codigo_int ";
$sql1.=", objeto_cd, importe, proveedor, plazo, reglamento_especifico, idusuario, fecha_form, gestion, estado ";
$sql1.=" FROM formulario_cd WHERE idempresa ='$idempresa_ss' AND iddeclaracion_cd='$iddeclaracion_cd_ss' AND idformulario_cd='$idformulario_cd_ss'";
$result1 = mysqli_query($link,$sql1);
$row1 = mysqli_fetch_array($result1);

if ($row1[15] == 'FINALIZADO' ) {
  header("Location:../index.php");
} 
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
				<h2 class="pageTitle">FORMULARIO F-3009</h2>
			</div>
		</div>
	</div>
</section>
<div class="container contenido">

<div class="row"> 
<div class="col-md-4"></div> 
<div class="col-md-4"><h2 align="center"><?php echo $codigo_form_ss;?></h2></div>
<div class="col-md-4"></div> 
</div>

<div class="row"> 
<div class="col-md-12"><h3>III. PROCESO DE CONTRATACIÓN</h3></div>
</div>

<?php
   
    $sql4 =" SELECT registro_cd.idregistro_cd, punto_cd.indice, punto_cd.punto_cd, registro_cd.idcumplimiento FROM registro_cd, punto_cd ";
    $sql4.=" WHERE registro_cd.idpunto_cd=punto_cd.idpunto_cd AND registro_cd.idformulario_cd='$idformulario_cd_ss' AND registro_cd.idetapa_cd='2' ";
    $result4 = mysqli_query($link,$sql4);
    if ($row4 = mysqli_fetch_array($result4)){
    mysqli_field_seek($result4,0);
    while ($field4 = mysqli_fetch_field($result4)){
    } do { 
?>

<div class="box-area">
 <div class="row">
  <div class="col-md-8"><h4 <?php if ($row4[3] != '0') { echo 'class="text-success"';} else { echo 'class="text-danger"'; }?>><?php echo $row4[1];?> <?php echo $row4[2];?></h4></div>
  <div class="col-md-2">
  <form name="FORM-3009" action="guardar_cd_reg2.php" method="post">

  <input type="hidden" name="idregistro_cd" value="<?php echo $row4[0];?>">

  <select name="idcumplimiento" id="idcumplimiento" class="form-control" <?php if ($row4[3] != '0') { } else { echo "autofocus"; }?> required>
  <option selected>Seleccione</option>
  <?php
  $sql_c = " SELECT idcumplimiento, cumplimiento FROM cumplimiento ";
  $result_c = mysqli_query($link,$sql_c);
  if ($row_c = mysqli_fetch_array($result_c)){
  mysqli_field_seek($result_c,0);
  while ($field_c = mysqli_fetch_field($result_c)){
  } do {
  ?>
  <option value="<?php echo $row_c[0];?>" <?php if ($row_c[0]==$row4[3]) echo "selected";?> ><?php echo $row_c[1];?></option>
  <?php
  } while ($row_c = mysqli_fetch_array($result_c));
  } else {
  }
  ?>
  </select>

</div>
  <div class="col-md-2">
  <button type="submit" class="btn btn-primary">GUARDAR</button></form></div>
</div>

<?php
        $sql5 =" SELECT subregistro_cd.idsubregistro_cd, subpunto_cd.subindice, subpunto_cd.subpunto_cd, subregistro_cd.documento_cd, subregistro_cd.fecha_doc_cd, subregistro_cd.justificacion, subregistro_cd.aclaracion ";
        $sql5.=" FROM subregistro_cd, subpunto_cd WHERE subregistro_cd.idsubpunto_cd=subpunto_cd.idsubpunto_cd AND subregistro_cd.idregistro_cd ='$row4[0]' "; 
        $result5 = mysqli_query($link,$sql5);
        if ($row5 = mysqli_fetch_array($result5)){
        mysqli_field_seek($result5,0);
        while ($field5 = mysqli_fetch_field($result5)){
        } do {         
?>
<div class="row">
  <div class="col-md-12"><h4 <?php if ($row5[3] != '') { echo 'class="text-success"';} else {echo 'class="text-danger"';}?>><?php echo $row5[1];?> <?php echo $row5[2];?></h4></div>
</div>
<div class="row">

  <form name="FORM-3009" action="guardar_cd_subreg2.php" method="post">
  <input type="hidden" name="idsubregistro_cd" value="<?php echo $row5[0];?>">

  <div class="col-md-2"><textarea class="form-control" rows="3" name="documento_cd" placeholder="N° Documento" <?php if ($row4[3] != '0') { } else { echo "disabled"; }?> <?php if ($row5[3] != '') { } else { echo "autofocus"; }?> required><?php echo $row5[3];?></textarea></div> 
  <div class="col-md-2"><textarea class="form-control" rows="3" name="fecha_doc_cd" placeholder="dd/mm/aaaa" <?php if ($row4[3] != '0') { } else { echo "disabled"; }?> required><?php echo $row5[4];?></textarea></div> 
  <div class="col-md-3"><textarea class="form-control" rows="3" name="justificacion" placeholder="Juatificación Normativa" <?php if ($row4[3] != '0') { } else { echo "disabled"; }?> required><?php echo $row5[5];?></textarea></div> 
  <div class="col-md-3"><textarea class="form-control" rows="3" name="aclaracion" placeholder="Aclaración" <?php if ($row4[3] != '0') { } else { echo "disabled"; }?> required><?php echo $row5[6];?></textarea></div> 
  <div class="col-md-2"><button type="submit" class="btn btn-primary" <?php if ($row4[3] != '0') { } else { echo "disabled"; }?>>GUARDAR</button></div>
  </form>
</div>

<?php
        }
        while ($row5 = mysqli_fetch_array($result5));
      } else {
      }
?>

</div>
</br>
</br>
<?php

    }
   while ($row4 = mysqli_fetch_array($result4));
 } else {
 }
?>

<div class="row">
<div class="col-md-4">
<a href="formulario_cd_previo.php"><h4 class="text-primary">VOLVER A ACTIVIDADES PREVIAS</h4></a>
</div>

<div class="col-md-4"></div>
<div class="col-md-4">
<a href="verifica_llenado_cd.php"><h4 class="text-primary">REVISAR FORMULARIO</h4></a>
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