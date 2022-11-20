<?php include("../cabf.php");?>
<?php include("../inc.config.php");?>
<?php

date_default_timezone_set('America/La_Paz');
$fecha_ram				= date("Ymd");
$fecha 					= date("Y-m-d");

$idusuario_ss  =  $_SESSION['idusuario_ss'];
$idnombre_ss   =  $_SESSION['idnombre_ss'];
$perfil_ss     =  $_SESSION['perfil_ss'];

$gestion       =  date("Y");
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
				<h2 class="pageTitle">REGISTRO INDIVIDUAL</h2>
			</div>
		</div>
	</div>
</section>
<div class="container contenido">

<div class="row" align="center"><h2> </h2></div>

<div class="row">
			<div class="col-md-12">
			
			<table id="example" class="table table-striped table-bordered table-hover" cellspacing="1" width="100%">
			        <thead>
                    <tr>
	    <th>N°</th>
        <th>CORRELATIVO</th>
        <th>ORIGEN</th>
        <td>CODIGO</td>
	      <th>REFERENCIA</th>
	      <th>PROCEDENCIA</th>
        <th>TIPO DE HOJA DE RUTA</th>
	      <th>FECHA DE LA HOJA DE RUTA</th>	
        <th>ESTADO HOJA DE RUTA</th>		
	      <th>VER HOJA DE RUTA</th>
        </tr>
			        </thead>
			        <tbody>

<?php
$numero=1;
$sql =" SELECT idcorres FROM deriva_corres WHERE idusuariod='$idusuario_ss' GROUP BY idcorres  ";
$result = mysqli_query($link,$sql);
if ($row = mysqli_fetch_array($result)){
mysqli_field_seek($result,0);
while ($field = mysqli_fetch_field($result)){
} do {

$sql2 =" SELECT corres.idcorres, corres.origen, corres.referencia, corres.procedencia, corres.fecha_corres, corres.codigo, corres.idestado, corres.correlativo  ";
$sql2.=" ,tipo_hojaruta.tipo_hojaruta, estado.estado FROM corres, tipo_hojaruta, estado WHERE corres.idtipo_hojaruta=tipo_hojaruta.idtipo_hojaruta AND corres.idestado=estado.idestado AND corres.idcorres ='$row[0]' ";
$result2 = mysqli_query($link,$sql2);
$row2 = mysqli_fetch_array($result2);
?>
    <tr>
        <td><?php echo $numero;?> </td>
		    <td><?php echo $row2[7];?> </td>
        <td><?php echo $row2[1];?></td>
        <td><?php echo $row2[5];?></td>
        <td><?php echo $row2[2];?></td>
        <td><?php echo $row2[3];?></td>
        <td><?php echo $row2[8];?></td>
	      <td><?php  
        $fecha_elab1 = explode('-',$row2[4]);
        $f_corres    = $fecha_elab1[2].'/'.$fecha_elab1[1].'/'.$fecha_elab1[0];
        echo $f_corres;
        ?></td>
        <td><?php echo $row2[9];?></td>
        <td>
        <a href="../impresion_documentos/imprime_hoja_ruta_ver.php?idcorres=<?php echo $row2[0]?>" target="_blank" class="Estilo12" onClick="window.open(this.href, this.target, 'width=750,height=850,scrollbars=YES,top=50,left=200'); return false;">IMPRIMIR HOJA RUTA COMPLETA</a>           
        </td>	
    </tr>
    
 <?php
$numero=$numero+1;
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