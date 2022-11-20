<?php include("../cabf.php");?>
<?php include("../inc.config.php");?>
<?php
date_default_timezone_set('America/La_Paz');
$fecha_ram			= date("Ymd");
$fecha 					= date("Y-m-d");

$idusuario_ss  =  $_SESSION['idusuario_ss'];
$idnombre_ss   =  $_SESSION['idnombre_ss'];
$perfil_ss     =  $_SESSION['perfil_ss'];

if($_SESSION['perfil_ss'] != "DAF-EMPRESA"){ 		
	header("Location:../index.php");	
}
$iddeclaracion_cd_ss = $_SESSION['iddeclaracion_cd_ss'];
$idempresa_ss  =  $_SESSION['idempresa_ss'];
$codigo_ss     =  $_SESSION['codigo_ss'];

$sql_e    = " SELECT idempresa, razon_social, cod_presup, sigla FROM empresa WHERE idempresa='$idempresa_ss' ";
$result_e = mysqli_query($link,$sql_e);
$row_e    = mysqli_fetch_array($result_e);

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>SUBCONTRALORIA EMPRESAS PUBLICAS</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="" />
<meta name="author" content="http://webthemez.com" />
<!-- c+ss -->
<link href="../css/bootstrap.min.css" rel="stylesheet" />
<link href="../css/fancybox/jquery.fancybox.css" rel="stylesheet">
<link href="../css/flexslider.css" rel="stylesheet" />
<link href="../css/style.css" rel="stylesheet" />

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
$rowus = mysqli_fetch_array($resultus);?>
        <?php echo $rowus[0];?> <?php echo $rowus[1];?> <?php echo $rowus[2];?> - <?php echo $row_e[3];?></p>
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
	</header><!-- end header -->
	<section id="inner-headline">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h2 class="pageTitle">NUEVO FORMULARIO - 3009</h2>
			</div>
		</div>
	</div>
	</section>
	<section id="content">

	<div class="container">
		<div class="row">
		<div class="tg-main-section tg-banner tg-haslayout parallax-window" data-parallax="scroll" data-bleed="100" data-speed="0.2" data-image-src="images/slider/img-03.jpg">
    <h4 align="center"><a href="declaracion_cd.php">VOLVER A FORMULARIOS</a></h4>
  </div>
</br>
   	<div class="about-logo">
    <h3>1.- DATOS BÁSICOS DE LA CONTRATACIÓN</h3>    
    </div>
    </div>

<div class="container">

<!-- javascript --->

<form name="FORM9" action="guarda_formulario_cd.php" method="post">

<div class="box-area">

<div class="row">
  <div class="col-md-2"><h4>EMPRESA:</h4></div>
  <div class="col-md-3"><h4 class="text-muted"><?php echo $row_e[1];?></h4></div>  
  <div class="col-md-2"><h4>CÓDIGO INSTITUCIONAL:</h4></div>
  <div class="col-md-1"><h4 class="text-muted"><?php echo $row_e[2];?></h4></div>  
  <div class="col-md-1"><h4>CUCE:</h4></div>
  <div class="col-md-3"><input type="text" class="form-control" name="cuce" required></div>  
</div>

<div class="row">
  <div class="col-md-2"><h4>CÓDIGO INTERNO:</h4></div>
  <div class="col-md-3"><input type="text" class="form-control" name="codigo_int" required></div>  
  <div class="col-md-2"><h4>OBJETO DE CONTRATACIÓN:</h4></div>
  <div class="col-md-5"><textarea class="form-control" rows="3" name="objeto_cd" required></textarea></div>  
</div>

<div class="row">
  <div class="col-md-2"><h4>MODALIDAD DE CONTRATACIÓN:</h4></div>
  <div class="col-md-4">
        <select name="idmodalidad_cd"  id="idmodalidad_cd" class="form-control" required>
        <option value="">ELEGIR</option>
        <?php
        /*
        Realizamos una consulta ala tabla autor
        para mostrar los datos en un combo
        */
        $sql1 = " SELECT idmodalidad_cd, modalidad_cd FROM modalidad_cd ";
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
  <div class="col-md-3"><h4>TIPO DE CONTRATACIÓN:</h4></div>
  <div class="col-md-3">
  <select name="idtipo_contratacion"  id="idtipo_contratacion" class="form-control" required>
        <option value="">ELEGIR</option>
        <?php
        /*
        Realizamos una consulta ala tabla autor
        para mostrar los datos en un combo
        */
        $sql1 = " SELECT idtipo_contratacion, tipo_contratacion FROM tipo_contratacion WHERE tipo='VALIDO' ";
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
<div class="row" id="submodalidad_cd">
</div>
<div class="row">
  <div class="col-md-2"><h4>IMPORTE TOTAL CONTRATADO EN Bs.:</h4></div>
  <div class="col-md-3"><input type="text" class="form-control" name="importe" placeholder="Escriba sin decimales"
  required pattern="[0-9]{5,15}$" title="El importe solo debe contener nümeros sin puntos, comas y o decimales." ></div>  
  <div class="col-md-3"><h4>PROVEEDOR CONTRATADO:</h4></div>
  <div class="col-md-4"><textarea class="form-control" rows="3" name="proveedor" required></textarea></div>   
</div>

<div class="row">
<div class="col-md-1"><h4>PLAZO:</h4></div>
  <div class="col-md-4"><textarea class="form-control" rows="3" name="plazo" required></textarea></div>  
  <div class="col-md-3"><h4>REGLAMENTO ESPECÍFICO UTILIZADO Y DOCUMENTO DE APROBACIÓN:</h4></div>
  <div class="col-md-4"><textarea class="form-control" rows="3" name="reglamento_especifico" required></textarea></div>  
</div>

<div class="row">
  <div class="col-md-3"><h4></h4></div>
  <div class="col-md-9">    
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  GUARDAR FORMULARIO
  </button>
  </div>
  </div>
</div>
</div>
<!---- --->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">REGISTRO FORMULARIO-3009</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ¿Esta seguro de Registrar este FORMULARIO-3009?
       </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">CANCELAR</button>
        <button type="submit" class="btn btn-primary pull-center">CONFIRMAR REGISTRO</button>     
      </div>
    </div>
  </div>
</div>
</form>

</br>
<div class="row">
<div class="col-md-12">  
</div>
</div>

<!-- javascript --->
</div>
</br>
  </section>
	<footer>
	<?php include("../footer.php");?>
	</footer>
</div>
<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>
<!-- javascript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="../js/jquery.js"></script>
<script src="../js/jquery.easing.1.3.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/jquery.fancybox.pack.js"></script>
<script src="../js/jquery.fancybox-media.js"></script>
<script src="../js/jquery.flexslider.js"></script>
<script src="../js/animate.js"></script>
<script language="javascript" src="../js/jquery-3.1.1.min.js"></script>
<!-- Vendor Scripts -->
<script src="../js/modernizr.custom.js"></script>
<script src="../js/jquery.isotope.min.js"></script>
<script src="../js/jquery.magnific-popup.min.js"></script>
<script src="../js/animate.js"></script>
<script src="../js/custom.js"></script>
<script src="../contact/jqBootstrapValidation.js"></script>
<script src="../contact/contact_me.js"></script>
<script src="../js/jquery-ui.min.js"></script>
<script src="../js/datepicker-es.js"></script>
<script>
    $("#fecha1").datepicker($.datepicker.regional[ "es" ]);
</script>
<script language="javascript">
$(document).ready(function(){
   $("#idmodalidad_cd").change(function () {
           $("#idmodalidad_cd option:selected").each(function () {
            modalidad_cd=$(this).val();
            $.post("submodalidad_cd.php", { modalidad_cd:modalidad_cd }, function(data){
            $("#submodalidad_cd").html(data);
            });
        });
   })
});
</script>
</body>
</html>