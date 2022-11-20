<?php include("../cabf.php");?>
<?php include("../inc.config.php");?>
<?php
date_default_timezone_set('America/La_Paz');
$fecha_ram			= date("Ymd");
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
<link href="../css/style.css" rel="stylesheet"/>
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
				<h2 class="pageTitle">SEGUIMIENTO GENERAL</h2>
			</div>
		</div>
	</div>
</section>
<div class="container contenido">
<div class="row" align="center"><h2> </h2></div>
</br>
<div class="row">
			<div class="col-md-12">
				<table id="example" class="table table-striped table-bordered table-hover" cellspacing="1" width="100%">
			        <thead>
			        <tr>
      <th>CODIGO</th>
      <th>N° CONTROL</th>
      <th>PROCEDENCIA</th>
      <th>REFERENCIA</th>
	    <th>TIPO HOJA DE RUTA</th>
      <th>ULTIMA DERIVACIÓN</th>
      <th>COMENTARIOS (CONCLUSION Y ARCHIVO)</th>
      <th>IMPRIMIR HOJA DE RUTA</th>
      <th>HISTOGRAMA</th>
			        </tr>
			        </thead>
			        <tbody>
<?php
$sql =" SELECT corres.idcorres, corres.gestion, corres.correlativo, corres.idusuario, corres.referencia, corres.procedencia, ";
$sql.=" corres.no_control, corres.fecha_corres, corres.anexo, corres.idestado, corres.codigo, corres.origen, tipo_hojaruta.tipo_hojaruta, ";
$sql.=" corres.comentario_conclusion, corres.comentario_archivo, corres.idcorres_h FROM corres, tipo_hojaruta WHERE corres.idtipo_hojaruta=tipo_hojaruta.idtipo_hojaruta AND corres.gestion='$gestion' ORDER BY corres.idcorres ";
$result = mysqli_query($link,$sql);
if ($row = mysqli_fetch_array($result)){
mysqli_field_seek($result,0);
while ($field = mysqli_fetch_field($result)){
} do {
?>
      <tr>
      <td><?php echo $row[10]?></td>
      <td><?php echo $row[6]?></td>
      <td><?php echo $row[5]?></td>
      <td><?php echo $row[4]?></td>
	    <td><?php echo $row[12]?></td>
      <td>

	  <?php
$sql3 = " SELECT idderiva_corres, idcorres, idusuarioo, idusuariod, fecha_recibe, comentario, derivada, recibida,";
$sql3.= " hora_recibe FROM deriva_corres WHERE derivada='SI' AND recibida='NO' AND idcorres='$row[0]'";

$result3 = mysqli_query($link,$sql3);

if ($row3 = mysqli_fetch_array($result3)){

mysqli_field_seek($result3,0);
while ($field3 = mysqli_fetch_field($result3)){
} do {
?>

<?php
$origen = $row3[2];
$destino = $row3[3];
$sql4 = " SELECT nombres.nombres, nombres.paterno, nombres.materno, cargo.cargo ";
$sql4.= "  FROM usuarios, nombres, cargo WHERE usuarios.idnombre=nombres.idnombre ";
$sql4.= " AND usuarios.idcargo=cargo.idcargo ";
$sql4.= " AND usuarios.idusuario='$origen' ";

$result4 = mysqli_query($link,$sql4);
$row4 = mysqli_fetch_array($result4);

$sql5 = " SELECT nombres.nombres, nombres.paterno, nombres.materno, cargo.cargo ";
$sql5.= "  FROM usuarios, nombres, cargo WHERE usuarios.idnombre=nombres.idnombre ";
$sql5.= " AND usuarios.idcargo=cargo.idcargo ";
$sql5.= " AND usuarios.idusuario='$destino' ";

$result5 = mysqli_query($link,$sql5);
$row5 = mysqli_fetch_array($result5);
?>

De: <?php echo $row4[0]; ?> <?php echo $row4[1]; ?> <?php echo $row4[2]; ?> </br>
A: <?php echo $row5[0]; ?> <?php echo $row5[1]; ?> <?php echo $row5[2]; ?></br>

Recibida: <?php echo $row3[7]; ?> </br>


<?php } while ($row3 = mysqli_fetch_array($result3));

} else {
/*
Si no se encontraron resultados

fecha.corres,detalle.corres,nombreunidad.unidad,nombredireccion.direccion,monto.corres,evento.corres,cite.corres,preventivo.corres,nombre.profesionales,observaciones.corres ";
$sql .=" where citedgaa = '$cite' AND idunidad.corres=idunidad.unidad AND iddireccion.corres=ididreccion.direccion AND idprofesional.corres=idprofesional.profesionales";
se muestra el siguiente mensaje
*/
}
?>
<?php
$sql3 = " SELECT idderiva_corres, idcorres, idusuarioo, idusuariod, fecha_recibe, comentario, derivada, recibida,";
$sql3.= " hora_recibe FROM deriva_corres WHERE derivada='NO' AND recibida='SI' AND idcorres='$row[0]'";

$result3 = mysqli_query($link,$sql3);

if ($row3 = mysqli_fetch_array($result3)){

mysqli_field_seek($result3,0);
while ($field3 = mysqli_fetch_field($result3)){
} do {
?>
<?php
$origen = $row3[2];
$destino = $row3[3];

$sql4 = " SELECT nombres.nombres, nombres.paterno, nombres.materno, cargo.cargo ";
$sql4.= "  FROM usuarios, nombres, cargo WHERE usuarios.idnombre=nombres.idnombre ";
$sql4.= " AND usuarios.idcargo=cargo.idcargo ";
$sql4.= " AND usuarios.idusuario='$origen' ";

$result4 = mysqli_query($link,$sql4);
$row4 = mysqli_fetch_array($result4);

$sql5 = " SELECT nombres.nombres, nombres.paterno, nombres.materno, cargo.cargo ";
$sql5.= "  FROM usuarios, nombres, cargo WHERE usuarios.idnombre=nombres.idnombre ";
$sql5.= " AND usuarios.idcargo=cargo.idcargo ";
$sql5.= " AND usuarios.idusuario='$destino' ";
$result5 = mysqli_query($link,$sql5);
$row5 = mysqli_fetch_array($result5);

?>
De: <?php echo $row4[0]; ?> &nbsp;<?php echo $row4[1]; ?> &nbsp;<?php echo $row4[2]; ?></br>
A: <?php echo $row5[0]; ?> &nbsp;<?php echo $row5[1]; ?> &nbsp;<?php echo $row5[2]; ?></br>
Recibida: <?php echo $row3[7]; ?> </br>
Fecha: <?php echo $row3[4]; ?></br>
hora de recepción: <?php echo $row3[8]; ?>
<?php } while ($row3 = mysqli_fetch_array($result3));

} else {
/*
Si no se encontraron resultados

fecha.corres,detalle.corres,nombreunidad.unidad,nombredireccion.direccion,monto.corres,evento.corres,cite.corres,preventivo.corres,nombre.profesionales,observaciones.corres ";
$sql .=" where citedgaa = '$cite' AND idunidad.corres=idunidad.unidad AND iddireccion.corres=ididreccion.direccion AND idprofesional.corres=idprofesional.profesionales";
se muestra el siguiente mensaje
*/
}
?>	
	</td>
      <td><?php echo $row[13]?> </br><?php echo $row[14]?></td>
      <td>     
    <a href="../impresion_documentos/imprime_hoja_ruta_ver.php?idcorres=<?php echo $row[0]?>" target="_blank" class="Estilo12" onClick="window.open(this.href, this.target, 'width=750,height=850,scrollbars=YES,top=50,left=200'); return false;">IMPRIMIR HOJA RUTA COMPLETA</a>  
      
	  <a href="../impresion_documentos/imprime_ficha_control.php?idcorres=<?php echo $row[0]?>" target="_blank" class="Estilo12" onClick="window.open(this.href, this.target, 'width=750,height=850,scrollbars=YES,top=50,left=200'); return false;"><h5 class="text-warning">IMPRIMIR FICHA DE CONTROL</h5></a>    
	  </td>
      <td>
    <a href="../estadisticas/historicouno.php?idcorres=<?php echo $row[0];?>" target="_blank" class="Estilo5" onClick="window.open(this.href, this.target, 'width=1000,height=600,scrollbars=YES'); return false;">VER HISTOGRAMA</a>  

    <a href="../impresion_documentos/imprime_hoja_ruta_ver.php?idcorres=<?php echo $row[15];?>" target="_blank" class="Estilo12" onClick="window.open(this.href, this.target, 'width=750,height=800,scrollbars=YES,left=400,top=50'); return false;"><h5 class="text-success">
<?php
if ($row[15] != "0") {
 echo "VER HOJA DE RUTA RELACIONADA";
} else {
}
?>
</h5></a>
    
   </a>  
   
  </td>
      </tr>
 <?php }
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