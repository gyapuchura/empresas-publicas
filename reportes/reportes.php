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

<link rel="stylesheet" href="../css/jquery-ui.min.css">

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

				<a class="navbar-brand" href="../intranet.php"><img src="../img/logo.png" alt="logo"/></a>

                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>                 
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
				<h2 class="pageTitle">REPORTES</h2>
			</div>
		</div>
	</div>
</section>
<div class="container contenido">
</hr>
<div class="row">
<div class="col-md-12"><h3> </h3></div>
</div>

<div class="row">
<div class="col-md-12"><h3> </h3></div>
</div>

<form name="INDIV" action="reporte_individual.php" method="post">
<div class="box-area">
<div class="row">
<div class="col-md-3"><h3> REPORTE INDIVIDUAL </h3></div>
<div class="col-md-9"><h3> 

<select name="idusuario_rep"  id="idusuario_rep" class="form-control">
   <option value="">-SELECCIONE-</option>
<?php
$sql1 = " SELECT usuarios.idusuario, nombres.nombres, nombres.paterno, nombres.materno, nombres.titulo ,cargo.cargo FROM usuarios, nombres, cargo WHERE usuarios.idnombre=nombres.idnombre";
$sql1.= " AND usuarios.idcargo=cargo.idcargo AND usuarios.condicion='ACTIVO' AND usuarios.idarea='12' ";
$result1 = mysqli_query($link,$sql1);
if ($row1 = mysqli_fetch_array($result1)){
mysqli_field_seek($result1,0);
while ($field1 = mysqli_fetch_field($result1)){
} do {
echo "<option value=". $row1[0]. ">". $row1[4]." ". $row1[1]." ". $row1[2]." ". $row1[3]." - ". $row1[5]."</option>";
} while ($row1 = mysqli_fetch_array($result1));
} else {
echo "No se encontraron usuarios";
}
?>
</select>

</h3></div>
</div>
</div>
</form>
<div class="row">    
    <div class="col-lg-12"></div>
</div>

<div id="reporte_usuario"></div>
<!------- Begin Reporte por Empresa ----->

<form name="INDIV" action="reporte_individual.php" method="post">
<div class="box-area">
<div class="row">
<div class="col-md-3"><h3> REPORTE POR EMPRESA PÚBLICA </h3></div>
<div class="col-md-9"><h3> 

<select name="idempresa"  id="idempresa" class="form-control">
<option value="">ELEGIR EMPRESA</option>
 <?php
/*
Realizamos una consulta ala tabla EMPRESA
para mostrar los datos en un combo
*/
$sql2 = " SELECT idempresa, razon_social, sigla FROM empresa ORDER BY sigla ";
$result2 = mysqli_query($link,$sql2);
if ($row2 = mysqli_fetch_array($result2)){
mysqli_field_seek($result2,0);
while ($field2 = mysqli_fetch_field($result2)){
} do {
echo "<option value=".$row2[0].">".$row2[2]." - ".$row2[1]."</option>";
} while ($row2 = mysqli_fetch_array($result2));
} else {
echo "No se encontraron resultados!";
}
?>
</select>
</h3></div>
</div>
</div>
</form>
<div class="row">    
    <div class="col-lg-12"></div>
</div>

<div id="reporte_empresa"></div>

<!------- End Reporte por Empresa ----->
<div class="box-area">
<div class="row">
<div class="col-md-6"><h3> REPORTE DE USUARIOS POR ESTADOS </h3></div>
<div class="col-md-6"><h3> <h4>
  <a href="../estadisticas/cantidad_usuario.php" target="_blank" onClick="window.open(this.href, this.target, 'width=1200,height=700,scrollbars=YES'); return false;">
    MOSTRAR REPORTE </a></h4> </h3></div>
</div>
</div>
<div class="row">    
    <div class="col-lg-12"></div>
</div>
<form name="TIPO_HR" action="reporte_tipo_hr.php" method="post">
<div class="box-area">
<div class="row">
<div class="col-md-12"><h3> REPORTE POR TIPO DE HOJA DE RUTA </h3></div>
</div>
<div class="row">
  <div class="col-md-4"><h4>CLASIFICACIÓN:</h4></div>
  <div class="col-md-8">
  <select name="idcontrol"  id="idcontrol" class="form-control">
<option value="">ELEGIR</option>
<?php
/*
Realizamos una consulta ala tabla autor
para mostrar los datos en un combo
*/
$sql1 = " SELECT idcontrol, control FROM control ";
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
  <div class="col-md-4"><h4>TIPO DE HOJA DE RUTA:</h4></div>
  <div class="col-md-8">
  <select name="idtipo_hojaruta" id="idtipo_hojaruta" class="form-control"></select>
  </div>
</div>

<div class="row">
<div class="col-md-6"></div>
<div class="col-md-6"><h3><button type="submit" class="btn btn-primary">GENERAR REPORTE</button></h3></div>
</div>
</form>
</div>

<div class="row">
<div class="col-md-12"><h3> </h3></div>
</div>

<form name="GLOBAL" action="reporte_individual_fechas.php" method="post">
<div class="box-area">
<div class="row">
<div class="col-md-12"><h3> REPORTE INDIVIDUAL POR FECHAS </h3></div>
</div>
<div class="row">
<div class="col-md-3"><h3>USUARIO:</h3></div>
<div class="col-md-9">
<select name="idusuario_report"  id="idusuario_report" class="form-control">
   <option value="">-SELECCIONE-</option>
<?php
$sql4 = " SELECT usuarios.idusuario, nombres.nombres, nombres.paterno, nombres.materno, nombres.titulo ,cargo.cargo FROM usuarios, nombres, cargo WHERE usuarios.idnombre=nombres.idnombre";
$sql4.= " AND usuarios.idcargo=cargo.idcargo AND usuarios.condicion='ACTIVO'  ";
$result4 = mysqli_query($link,$sql4);
if ($row4 = mysqli_fetch_array($result4)){
mysqli_field_seek($result4,0);
while ($field4 = mysqli_fetch_field($result4)){
} do {
echo "<option value=". $row4[0]. ">". $row4[4]." ". $row4[1]." ". $row4[2]." ". $row4[3]." - ". $row4[5]."</option>";
} while ($row4 = mysqli_fetch_array($result4));
} else {
echo "No se encontraron usuarios";
}
?>
</select>
</div>

</div>
<div class="row">
<div class="col-md-3"><h3>EXTERNA/INTERNA:</h3></div>
<div class="col-md-3">
<select size="1" name="origen" id="origen" class="form-control">
  <option value="">Seleccionar</option>
  <option value="INTERNA">INTERNA</option>
  <option value="EXTERNA">EXTERNA</option>
</select>
</div>
<div class="col-md-1"><h3>DE FECHA:</h3></div>
<div class="col-md-2">
<input type="text" id="fecha_ini" class="form-control" name="fecha_ini">
</div>
<div class="col-md-1"><h3>A FECHA:</h3></div>
<div class="col-md-2">
<input type="text" id="fecha_fin" class="form-control" name="fecha_fin">
</div>
</div>

<div class="row">
<div class="col-md-6"><h3>  </h3></div>
<div class="col-md-6"><h3><button type="submit" class="btn btn-primary">GENERAR REPORTE</button></h3></div>
</div>
</div>
</form>
<div class="row">
<div class="col-md-12"><h3></h3></div>
</div>
<form name="GLOBAL" action="reporte_global_fechas.php" method="post">
<div class="box-area">
<div class="row">
<div class="col-md-12"><h3> REPORTE SEGUIMIENTO POR FECHAS </h3></div>
</div>
<div class="row">
<div class="col-md-3"><h3>DE FECHA:</h3></div>
<div class="col-md-3">
<input type="text" id="fecha_1" class="form-control" name="fecha_1">
</div>
<div class="col-md-3"><h3>A FECHA:</h3></div>
<div class="col-md-3">
<input type="text" id="fecha_2" class="form-control" name="fecha_2">
</div>
</div>
<div class="row">
<div class="col-md-6"><h3>  </h3></div>
<div class="col-md-6"><h3><button type="submit" class="btn btn-primary">GENERAR REPORTE</button></h3></div>
</div>
</div>
</form>
<div class="row">
<div class="col-md-12"><h3></h3></div>
</div>
<form name="GLOBAL" action="reporte_seguimiento_global.php" method="post">
<div class="box-area">
<div class="row">
<div class="col-md-6"><h3> REPORTE SEGUIMIENTO GENERAL EN EXCEL </h3></div>
<div class="col-md-6"><h3><button type="submit" class="btn btn-primary">GENERAR REPORTE</button></h3></div>
</div>
</div>
</form>


<div class="row">
<div class="col-md-12"><h3> </h3></div>
</div>
</div>
	<footer>
	<?php include("../footer.php");?>
	</footer>
</div>
<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>
<script src="../js/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>

<script language="javascript" src="../js/jquery-3.1.1.min.js"></script>



    <script>
	$(document).ready(function(){
		  var consulta;
		  //hacemos focus al campo de b�squeda
		  $("#busqueda").focus();
		  //comprobamos si se pulsa una tecla
		  $("#busqueda").keyup(function(e){
				//obtenemos el texto introducido en el campo de b�squeda
				consulta = $("#busqueda").val();
				 //hace la b�squeda
					 $.ajax({
						   type: "POST",
						   url: "buscar_corres.php",
						   data: "b="+consulta,
						   dataType: "html",
						   beforeSend: function(){
									  //imagen de carga
								   $("#resultado").html("<p align='center'><img src='ajax-loader.gif' /></p>");
						   },
						   error: function(){
								   alert("error petici�n ajax");
							 },
						  success: function(data){
								$("#resultado").empty();
								$("#resultado").append(data);
								//$("#busqueda").val(consulta);
							}
					});
		  });
	});
</script>
<script language="javascript">
    $(document).ready(function(){
    $("#idcontrol").change(function () {
            $("#idcontrol option:selected").each(function () {
                control=$(this).val();
                $.post("../correspondencia/tipo_hojaruta.php", { control: control }, function(data){
                $("#idtipo_hojaruta").html(data);
                });
            });
    })
    });
</script>
<script language="javascript">
$(document).ready(function(){
   $("#idusuario_rep").change(function () {
           $("#idusuario_rep option:selected").each(function () {
            usuario_rep=$(this).val();
            $.post("reporte_usuario.php", {usuario_rep:usuario_rep}, function(data){
            $("#reporte_usuario").html(data);
            });
        });
   })
});
</script>
<script language="javascript">
$(document).ready(function(){
   $("#idempresa").change(function () {
           $("#idempresa option:selected").each(function () {
            empresa=$(this).val();
            $.post("reporte_empresa.php", { empresa: empresa }, function(data){
            $("#reporte_empresa").html(data);
            });
        });
   })
});
</script>
<script src="../js/jquery.js"></script>
<script src="../js/jquery-ui.min.js"></script>
<script src="../js/datepicker-es.js"></script>
<script>
    $("#fecha_ini").datepicker($.datepicker.regional[ "es" ]);
</script>
<script>
    $("#fecha_fin").datepicker($.datepicker.regional[ "es" ]);
</script>
<script>
    $("#fecha_1").datepicker($.datepicker.regional[ "es" ]);
</script>
<script>
    $("#fecha_2").datepicker($.datepicker.regional[ "es" ]);
</script>
</body>
</html>