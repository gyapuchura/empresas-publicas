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

$iddeclaracion_cd_ss =  $_SESSION['iddeclaracion_cd_ss'];
$idempresa_ss        =  $_SESSION['idempresa_ss'];
$codigo_ss           =  $_SESSION['codigo_ss'];
$idformulario_cd_ss  =  $_SESSION['idformulario_cd_ss'];
$codigo_form_ss      =  $_SESSION['codigo_form_ss'];
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
<div class="row">
<div class="col-md-12"></div>
</div>

<div class="row">
<div class="col-md-6"></div>
<div class="col-md-6"><h3><a href="evalua_puntos_cd.php">VOLVER</a></h3></div>
</div>

<div class="box-area">
<div class="row">
<div class="col-md-12"><h2 class="text-success">III. EVALUACIÓN DE ETAPA DE PROCESO DE CONTRATACIÓN</h2></div>
</div>

<?php
$numero=1;
    $sql4 =" SELECT registro_cd.idregistro_cd, punto_cd.indice, punto_cd.punto_cd, cumplimiento.cumplimiento, registro_cd.idverificacion_cd, registro_cd.comentario_verif_cd FROM registro_cd, punto_cd, cumplimiento ";
    $sql4.=" WHERE registro_cd.idpunto_cd=punto_cd.idpunto_cd AND registro_cd.idcumplimiento=cumplimiento.idcumplimiento AND registro_cd.idformulario_cd='$idformulario_cd_ss' AND registro_cd.idetapa_cd='2' ";
    $result4 = mysqli_query($link,$sql4);
    if ($row4 = mysqli_fetch_array($result4)){
    mysqli_field_seek($result4,0);
    while ($field4 = mysqli_fetch_field($result4)){
    } do { 
?>

<div class="row">
<div class="col-md-11"><h4 class="text-success"><?php echo $row4[1];?> <?php  echo $row4[2];?></h4></div>
<div class="col-md-1"><h4 class="text-muted"><?php  echo $row4[3];?></h4></div>
</div>

<?php
 $numero=1;
        $sql5 =" SELECT subregistro_cd.idsubregistro_cd, subpunto_cd.subindice, subpunto_cd.subpunto_cd, subregistro_cd.documento_cd, subregistro_cd.fecha_doc_cd, subregistro_cd.justificacion, subregistro_cd.aclaracion ";
        $sql5.=" FROM subregistro_cd, subpunto_cd WHERE subregistro_cd.idsubpunto_cd=subpunto_cd.idsubpunto_cd AND subregistro_cd.idregistro_cd ='$row4[0]' "; 
        $result5 = mysqli_query($link,$sql5);
        if ($row5 = mysqli_fetch_array($result5)){
        mysqli_field_seek($result5,0);
        while ($field5 = mysqli_fetch_field($result5)){
        } do {         
?>
<div class="row">
  <div class="col-md-1"></div> 
  <div class="col-md-11"><h4 class="text-success"><?php echo $row5[1];?> <?php echo $row5[2];?></h4></div>
</div>
<div class="row">
  <div class="col-md-1"></div> 
  
  <div class="col-md-2"><h5 class="text-success">N° de DOCUMENTO: </h5><h5 class="text-muted"><?php echo $row5[3];?></h5></div>
  <div class="col-md-2"><h5 class="text-success">FECHA DOC.:</h5><h5 class="text-muted"> <?php echo $row5[4];?></h5></div>
  <div class="col-md-4"><h5 class="text-success">JUSTIFICACIÓN NORMATIVA:</h5><h5 class="text-muted"><?php echo $row5[5];?></h5></div> 
  <div class="col-md-3"><h5 class="text-success">ACLARACIÓN:</h5><h5 class="text-muted"><?php echo $row5[6];?></h5></div> 

</div>

        <?php
        $numero=$numero+1;
                }
                while ($row5 = mysqli_fetch_array($result5));
            } else {
            }
        ?>


<div class="row">
<div class="col-md-2"><h4 <?php if ($row4[4] == '1' || $row4[4] == '2') { echo 'class="text-success"';} else { echo 'class="text-danger"'; }?> >VERIFICACIÓN</h4></div>
<div class="col-md-4">

<form name="VERIFICA" action="guardar_verif_cd_reg2.php" method="post">

<input type="hidden" name="idregistro_cd" value="<?php echo $row4[0];?>">

<select name="idverificacion_cd" id="idverificacion_cd" class="form-control">
<option selected>Seleccione</option>
<?php
$sql_ca = " SELECT idverificacion_cd, verificacion_cd FROM verificacion_cd ";
$result_ca = mysqli_query($link,$sql_ca);
if ($row_ca = mysqli_fetch_array($result_ca)){
mysqli_field_seek($result_ca,0);
while ($field_ca = mysqli_fetch_field($result_ca)){
} do {
?>
<option value="<?php echo $row_ca[0];?>" <?php if ($row_ca[0]==$row4[4]) echo "selected";?> > <?php echo $row_ca[1];?></option>
<?php
} while ($row_ca = mysqli_fetch_array($result_ca));
} else {
}
?>
</select>	
</div>
<div class="col-md-4"><textarea class="form-control" rows="3" name="comentario_verif_cd" placeholder="COMENTARIOS Y/O OBSERVACIONES"><?php echo $row4[5];?></textarea></div>
<div class="col-md-2"><button type="submit" class="btn btn-primary">GUARDAR</button></div>
</div>
</form>
    <?php  
    $numero = $numero+1;     
        }
    while ($row4 = mysqli_fetch_array($result4));
    } else {
    }
    ?>
</div>
</br>
<div class="row">
<div class="col-md-4"><h4><a href="evalua_puntos_cd.php">VOLVER</a></h4></div>
<div class="col-md-4"></div>
<div class="col-md-4">
<a href="verifica_form_eval_cd.php"><h4 class="text-primary">REVISAR LA EVALUACIÓN</h4></a>
</div>
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



