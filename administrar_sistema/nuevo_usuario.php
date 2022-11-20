<?php include("../cabf.php");?>
<?php include("../inc.config.php");?>
<?php

if($_SESSION['perfil_ss'] != "ADMINISTRADOR"){ 		
	header("Location:../index.php");	
}

date_default_timezone_set('America/La_Paz');
$fecha_ram			= date("Ymd");
$fecha 					= date("Y-m-d");

$idusuario_ss  =  $_SESSION['idusuario_ss'];
$idnombre_ss   =  $_SESSION['idnombre_ss'];
$perfil_ss     =  $_SESSION['perfil_ss'];

$sqlh = "  SELECT idcorres, gestion, correlativo, idusuario, no_control ";
$sqlh.= "  FROM corres WHERE origen= 'INTERNA' ORDER BY idcorres DESC LIMIT 1";
$resulth = mysqli_query($link,$sqlh);
$rowh = mysqli_fetch_array($resulth);
$nuevo= $rowh[2]+1;
?>
<!DOCTYPE html>
<html lang="es">
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
				<h2 class="pageTitle">NUEVO USUARIO</h2>
			</div>
		</div>
	</div>
	</section>
	<section id="content">

	<div class="container">
		<div class="row">
		<div class="tg-main-section tg-banner tg-haslayout parallax-window" data-parallax="scroll" data-bleed="100" data-speed="0.2" data-image-src="images/slider/img-03.jpg">
		</div>
		<div class="row">
            <div class="col-md-4"></div>
			<div class="col-md-8">
				<h3 class="row"><a href="usuarios.php">VOLVER</a></h3>
			</div>
		</div>
        <div class="about-logo">
        <h3>INGRESAR NUEVO USUARIO</h3>
        <p>EN ESTA SECCION SE REALIZA EL REGISTRO DE UN NUEVO USUARIO EN EL SISTEMA</p>
        </div>
        </div>
        <div class="container">
        <div class="box-area">

<!--------- agrega nuevo usuario begin  ------------>

<form class="user" method="post" action="guarda_usuario.php" >

<div class="form-group row">
    <div class="col-sm-4 mb-3 mb-sm-0">
    <h4>NOMBRES:</h4>
    <input type="text" class="form-control" name="nombres" placeholder="Nombres" 
    required pattern="^([A-ZÁÉÍÓÚ]{1}[a-zñáéíóú]+[\s]*)+$" 
    title="El nombre con letra mayúscula al inicio "
    />
    </div>
    <div class="col-sm-4">
    <h4>PATERNO:</h4>
    <input type="text" class="form-control" name="paterno" placeholder="Paterno" 
    required pattern="^([A-ZÁÉÍÓÚ]{1}[a-zñáéíóú]+[\s]*)+$" 
    title="El apellido paterno con letra mayúscula al inicio"
    />
    </div>
    <div class="col-sm-4">
    <h4>MATERNO:</h4>
    <input type="text" class="form-control" name="materno" placeholder="Materno"
    required pattern="^([A-ZÁÉÍÓÚ]{1}[a-zñáéíóú]+[\s]*)+$" 
    title="El apellido materno con letra mayúscula al inicio"
    />
    </div>
</div>

<div class="form-group row">
    <div class="col-sm-6 mb-3 mb-sm-0">
    <h4>CEDULA DE IDENTIDAD:</h4>
    <input type="text" class="form-control" name="ci" placeholder="N° de CI"
    required pattern="[A-Z0-9_-]{5,12}$" 
    title="El numero de CI solo puede contener DIGITOS numéricos." >
    </div>
    <div class="col-sm-6">
    <h4>EXPEDIDO EN:</h4>
    <select size="1" name="exp" class="form-control" required>
        <option value="">Seleccione</option>
        <option value="LP">LP</option>
        <option value="CBBA">CBBA</option>
        <option value="CH">CH</option>
        <option value="TA">TA</option>
        <option value="OR">OR</option>
        <option value="PT">PT</option>
        <option value="PN">PN</option>
        <option value="SC">SC</option>
        <option value="BN">BN</option>
    </select>
    </div>
</div>

<div class="form-group row">
    <div class="col-sm-4 mb-3 mb-sm-0">
    <h4>USUARIO DE SISTEMA:</h4>
    <input type="text" class="form-control" name="usuario" placeholder="usuario" 
    required pattern="[a-z]{5,16}" 
  title="Para el usuario solo se admiten minúsculas (hasta 16 letras ."
    >
    </div>
    <div class="col-sm-4">
    <h4>CONTRASEÑA:</h4>
    <input type="password" class="form-control" name="password" placeholder="Contraseña"
    required pattern="^(?=.*\d)(?=.*[\u0021-\u002b\u003c-\u0040])(?=.*[A-Z])(?=.*[a-z])\S{8,25}$" 
  title="La contraseña debe tener al menos un dígito numérico, al menos una minúscula, al menos una mayúscula y al menos un caracter no alfanumérico"
    >
    </div>
    <div class="col-sm-4">
    <h4>PERFIL:</h4>
    <select size="1" name="perfil" id="perfil" class="form-control" required>
        <option value="">Seleccione</option>
        <option value="ADMINISTRADOR">ADMINISTRADOR</option>
        <option value="GERENTE">GERENTE</option>
        <option value="USUARIO">USUARIO</option>
        <option value="DAF-EMPRESA">DAF-EMPRESA</option>
        <option value="UAI-EMPRESA">UAI-EMOPRESA</option>
    </select>
    </div>
</div>

<div class="row">
    <div class="col-sm-12" id="dependencia">
    </div>
</div>

<div class="row">
<div class="col-sm-12">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#saveModal">
            REGISTRAR NUEVO USUARIO DE SISTEMA
    </button>
</div>
</div>
<!--  Modal para envio a guardar -->
<div class="modal fade" id="saveModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2"
aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel2">¿ESTA SEGURO DE REGISTRAR EL NUEVO USUARIO?</h5>
<button class="close" type="button" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">×</span>
</button>
</div>
<div class="modal-body">Seleccione la opción GUARDAR para realizar el registro, luego recien se podra pasar a aprobación.</div>
<div class="modal-footer">
<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
<button class="btn btn-primary" type="submit">Guardar DATOS DE USUARIO</a>
</div>
</div>
</div>
</div>
<hr>
</form>
<!-------- agrega nuevo usuario end --------->
        </div>
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
<!-- Vendor Scripts -->
<script src="../js/modernizr.custom.js"></script>
<script src="../js/jquery.isotope.min.js"></script>
<script src="../js/jquery.magnific-popup.min.js"></script>
<script src="../js/animate.js"></script>
<script src="../js/custom.js"></script>
<script src="../contact/jqBootstrapValidation.js"></script>
<script src="../contact/contact_me.js"></script>
<script language="javascript" src="../js/jquery-3.1.1.min.js"></script>
<script>$("#fecha1").datepicker($.datepicker.regional[ "es" ]);</script>
<script>$("#fecha2").datepicker($.datepicker.regional[ "es" ]);</script>

<script language="javascript">
$(document).ready(function(){
   $("#perfil").change(function () {
           $("#perfil option:selected").each(function () {
            perfil=$(this).val();
            $.post("intro_usuario.php", {perfil:perfil}, function(data){
            $("#dependencia").html(data);
            });
        });
   })
});
</script>

</body>
</html>