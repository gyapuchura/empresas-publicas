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

$sql1 = "SELECT idformulario_cd, iddeclaracion_cd, idempresa, correlativo, codigo, cuce, codigo_int ";
$sql1.= ", objeto_cd, importe, proveedor, plazo, reglamento_especifico, idusuario, fecha_form, gestion, estado ";
$sql1.= " FROM formulario_cd WHERE idempresa ='$idempresa_ss' AND iddeclaracion_cd='$iddeclaracion_cd_ss' AND idformulario_cd='$idformulario_cd_ss'";
$result1 = mysqli_query($link,$sql1);
$row1 = mysqli_fetch_array($result1);

if ($row1[15] == 'FINALIZADO' ) {
  header("Location:formulario_cd_finalizado.php");
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
<div class="col-md-12"><h3>REVISIÓN DEL FORMULARIO - 3009</h3></div>
</div>

<?php   
    $sql4 =" SELECT registro_cd.idregistro_cd, punto_cd.indice, punto_cd.punto_cd, cumplimiento.cumplimiento FROM registro_cd, punto_cd, cumplimiento ";
    $sql4.=" WHERE registro_cd.idpunto_cd=punto_cd.idpunto_cd AND registro_cd.idcumplimiento=cumplimiento.idcumplimiento AND registro_cd.idformulario_cd='$idformulario_cd_ss'";
    $result4 = mysqli_query($link,$sql4);
    if ($row4 = mysqli_fetch_array($result4)){
    mysqli_field_seek($result4,0);
    while ($field4 = mysqli_fetch_field($result4)){
    } do { 
?>

 <div class="box-area">
 <div class="row">
  <div class="col-md-8"><h4 <?php if ($row4[3] != '0') { echo 'class="text-primary"';} else { echo 'class="text-danger"'; }?>><?php echo $row4[1];?> <?php echo $row4[2];?></h4></div>
  <div class="col-md-2"><h4>Rpta:</h4> </div>
  <div class="col-md-2"><h4 <?php if ($row4[3] != '0') { echo 'class="text-primary"';} else { echo 'class="text-danger"'; }?>><?php echo $row4[3];?></h4>
  </div>
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
  <div class="col-md-12"><h4 <?php if ($row5[3] != '') { echo 'class="text-primary"';} else {echo 'class="text-danger"';}?>> <?php echo $row5[1];?> <?php echo $row5[2];?></h4></div>
</div>
<div class="row">
  <div class="col-md-2"><h5>N° Documento:</h5> <h4 <?php if ($row4[3] != '') { echo 'class="text-primary"';} else { echo 'class="text-danger"'; }?>><?php echo $row5[3];?> </h4></div>
  <div class="col-md-2"><h5>Fecha Documento:</h5> <h4 <?php if ($row4[3] != '') { echo 'class="text-primary"';} else { echo 'class="text-danger"'; }?>><?php echo $row5[4];?> </h4></div>
  <div class="col-md-4"><h5>Justificacion:</h5> <h4 <?php if ($row4[3] != '') { echo 'class="text-primary"';} else { echo 'class="text-danger"'; }?>><?php echo $row5[5];?></h4></div> 
  <div class="col-md-4"><h5>Aclaración:</h5> <h4 <?php if ($row4[3] != '') { echo 'class="text-primary"';} else { echo 'class="text-danger"'; }?>><?php echo $row5[6];?></h4></div> 
  </form>
</div>

<?php
 $numero=$numero+1;
        }
        while ($row5 = mysqli_fetch_array($result5));
      } else {
      }
?>

</div>
</br>
</br>
<?php
        $numero=$numero+1;
    }
   while ($row4 = mysqli_fetch_array($result4));
 } else {
 }
?>
<div class="row">
<div class="col-md-4">
<a href="formulario_cd_pc.php"><h4 class="text-primary">VOLVER</h4></a>
</div>
<div class="col-md-4"></div>
<div class="col-md-4">
<form name="EVENTO" action="guarda_finalizacion_cd.php" method="post">
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
 FINALIZAR EL FORMULARIO
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
        <h5 class="modal-title" id="exampleModalLabel">CONCLUIR REGISTRO DE F-3009</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ¿Esta seguro de CONCLUIR este FORMULARIO F-3009?

        <h4>Luego no se podra realizar cambios!</h4>
       </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">CANCELAR</button>
        <button type="submit" class="btn btn-primary pull-center">CONCLUIR</button>     
      </div>
    </div>
  </div>
</div>
</form>


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
  <script src="../js/jquery-ui.min.js"></script>

</body>
</html>