<?php include("../cabf.php");?>
<?php include("../inc.config.php");?>
<?php

date_default_timezone_set('America/La_Paz');
$fecha_ram			= date("Ymd");
$fecha 					= date("Y-m-d");

$idusuario_ss = $_SESSION['idusuario_ss'];
$idnombre_ss  = $_SESSION['idnombre_ss'];
$perfil_ss    = $_SESSION['perfil_ss'];
$idarea_ss    = $_SESSION['idarea_ss'];

$idcorres_ss  = $_SESSION['idcorres_ss'];

$gestion      = date("Y");

$sql1 = " SELECT idcorres, gestion, correlativo, idusuario, referencia, procedencia, no_control, ";
$sql1.= " fecha_corres, anexo, origen, codigo FROM corres WHERE idcorres='$idcorres_ss' ";
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
				<h2 class="pageTitle">INICIA LA HOJA DE RUTA <?php echo $row1[9];?> </h2>
			</div>
		</div>
	</div>
</section>
<div class="container contenido">

<div class="row"> </div>

 <div class="row" align="center"> <h3>

<form name="EVENTO" action="guarda_derivacion.php" method="post">
  
<div class="box-area">
 <div class="row">
  <div class="col-md-2"><h4>CODIGO</h4></div>
  <div class="col-md-2"><h4 class="text-muted"><?php echo $row1[10];?></h4></div>
  <div class="col-md-2"><h4>REFERENCIA</h4></div>
  <div class="col-md-6"><h4 class="text-muted"><?php echo $row1[4];?>
</h4></div>
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
            $f_recibida     = $fecha_recib [2].'/'.$fecha_recib [1].'/'.$fecha_recib [0];
            echo $f_recibida;
            ?>  
</h4></div>
</div>

</div>

<div class="row">
  <div class="col-md-4"><h4></h4></div>
  <div class="col-md-4"><h4 class="text-sucess">
<a href="../impresion_documentos/imprime_inicializacion.php?idcomunicacion=<?php echo $row1[0]?>" target="_blank" class="Estilo12" onClick="window.open(this.href, this.target, 'width=750,height=800,scrollbars=YES,left=400,top=50'); return false;">IMPRIMIR INICIALIZACIÓN</a> 
 </h4></div>
  <div class="col-md-4"><h4></h4></div>
</div>

<div class="row">
<h2>INICIACIÓN DE HOJA DE RUTA <?php echo $row1[9];?> N° <?php echo $row1[10];?></h2>
</div>

 <div class="box-area">
 <div class="row">
  <div class="col-md-3"><h4>DESTINATARIO</h4></div>
  <div class="col-md-9">
  <select name="idusuariod"  id="idusuariod" class="form-control">
   <option value="">-SELECCIONE-</option>
<?php

$sql1 = " SELECT usuarios.idusuario, nombres.nombres, nombres.paterno, nombres.materno, nombres.titulo, cargo.cargo FROM usuarios, nombres, cargo ";
$sql1.= " WHERE usuarios.idnombre=nombres.idnombre AND usuarios.idcargo=cargo.idcargo AND usuarios.condicion='ACTIVO' ";
$result1 = mysqli_query($link,$sql1);
if ($row1 = mysqli_fetch_array($result1)){
mysqli_field_seek($result1,0);
while ($field1 = mysqli_fetch_field($result1)){
} do {
echo "<option value=". $row1[0]. ">". $row1[4]." ". $row1[1]." ". $row1[2]." ". $row1[3]." - ". $row1[5]."</option>";
} while ($row1 = mysqli_fetch_array($result1));
} else {
echo "No se encontraron resultados!";
}
?>
</select>
</div>
</div>

<div class="row">
  <div class="col-md-3"><h4>INSTRUCCION:</h4></div>
  <div class="col-md-9">
  <select name="idinstruccion"  id="idinstruccion" class="form-control">
   <option value="">-SELECCIONE-</option>
<?php
$sql1 = "SELECT idinstruccion, instruccion FROM instruccion";
$result1 = mysqli_query($link,$sql1);
if ($row1 = mysqli_fetch_array($result1)){
mysqli_field_seek($result1,0);
while ($field1 = mysqli_fetch_field($result1)){
} do {
echo "<option value=". $row1[0]. ">". $row1[0].".- ". $row1[1]. "</option>";
} while ($row1 = mysqli_fetch_array($result1));
} else {
echo "No se encontraron resultados!";
}
?>
</select>
  </div>
  </div>

  <div class="row"> 
  <div class="col-md-3"><h4>COMENTARIO:</h4></div>
  <div class="col-md-9"><textarea class="form-control" rows="3" name="comentario"></textarea></div>
  </div>

 </div>

 </div>

 <div class="row">
  <div class="col-md-3"><h4></h4></div>
    <div class="col-md-9">    
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        DERIVAR HOJA DE RUTA
      </button>
    </div>
 </div>


 <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">INICIAR HOJA DE RUTA</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ¿Esta seguro de iniciar esta HOJA DE RUTA?
       </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">CANCELAR</button>

        <button type="submit" class="btn btn-primary pull-center">CONFIRMAR INICIACIÓN</button>
     
      </div>
    </div>
  </div>
</div>
 </form>

 <form name="CONCLUYE" action="concluye_hoja_ruta_ini.php" method="post">
 <div class="row"> 
 <div class="col-md-4"></div>
 <div class="col-md-8"><h4></h4>
  <button type="submmit" class="btn-link">
  <h3 class="text-warning">
  <?php
if ($perfil_ss == "ADMINISTRADOR") {
 echo "CONCLUIR LA HOJA DE RUTA";
} else { 
}
?>
</h3>
</button>
  </div>
  </div>
  </div>
  </form>

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