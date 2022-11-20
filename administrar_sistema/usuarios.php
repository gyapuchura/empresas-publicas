<?php include("../cabf.php");?>
<?php include("../inc.config.php");?>
<?php

if($_SESSION['perfil_ss'] != "ADMINISTRADOR"){ 		
	header("Location:../index.php");	
}
date_default_timezone_set('America/La_Paz');

$fecha_ram				= date("Ymd");
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

	</header><!-- end header -->
	<section id="inner-headline">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h2 class="pageTitle">USUARIOS</h2>
			</div>
		</div>
	</div>
	</section>
	<section id="content">


	<div class="container">
		<div class="row">
		<div class="tg-main-section tg-banner tg-haslayout parallax-window" data-parallax="scroll" data-bleed="100" data-speed="0.2" data-image-src="images/slider/img-03.jpg">
		</div>
   	<div class="about-logo">
      <h3 align="center"> </h3>
      <h3>REALIZA LA GESTIÓN DE USUARIOS</h3>
       <p>EN ESTA SECCION SE REALIZA LA GESTION DE USUARIOS PARA ASIGNAR ROLES, DAR DE BAJA Y ALTA A LOS MISMOS.</p>
    </div>
    </div>

    <div class="row">
        <form name="FORMU" action="nuevo_usuario.php" method="post">
        <button type="submit" class="btn btn-primary">NUEVO USUARIO</button>
        </form>
    </div>

<div class="container">

<!--- gestion de usuarios ---->

<div class="table-responsive">
                                <table class="table table-bordered" id="example" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>Nª</th>
							<th>NOMBRE DE USUARIO</th>
							<th>USUARIO</th>
							<th>CONDICIÓN</th>
							<th>PERFIL</th>
							<th>CONFIGURACIÓN DE USUARIO</th>
						</tr>
					</thead>
					<tbody>
					<?php
$numero=1;
$sql =" SELECT usuarios.idusuario, nombres.nombres, nombres.paterno, nombres.materno, usuarios.usuario, usuarios.password, usuarios.fecha, usuarios.condicion, usuarios.perfil  ";
$sql.=" , usuarios.idnombre FROM usuarios, nombres WHERE usuarios.idnombre=nombres.idnombre ORDER BY nombres.nombres";
$result = mysqli_query($link,$sql);
if ($row = mysqli_fetch_array($result)){
mysqli_field_seek($result,0);
while ($field = mysqli_fetch_field($result)){
} do {
?>
					<tr>
						<td><?php echo $numero;?></td>
						<td><?php echo $row[1]?> <?php echo $row[2]?> <?php echo $row[3]?></td>
						<td><?php echo $row[4]?></td>
						<td><?php echo $row[7]?></td>
						<td><?php echo $row[8]?></td>
						<td>                                                
						<form name="VALIDA" action="valida_usuario_mod.php" method="post">
						<input name="idusuario_adm" type="hidden" value="<?php echo $row[0];?>">
						<input name="idnombre_adm" type="hidden" value="<?php echo $row[9];?>">
						<button type="submit" class="btn-primary btn-user btn-block">ADMINISTRAR USUARIO</button></form>
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

<!--- gestion de usuarios ---->

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
<script src="../js/jquery.dataTables.min.js"></script>
<script src="../js/script.js"></script>
<script src="../js/dataTables.bootstrap.min.js"></script>
</body>
</html>