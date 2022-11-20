<?php include("../cabf.php");?>
<?php include("../inc.config.php");?>
<?php
date_default_timezone_set('America/La_Paz');
$fecha_ram			= date("Ymd");
$fecha 			    = date("Y-m-d");

$idusuario_ss  =  $_SESSION['idusuario_ss'];
$idnombre_ss   =  $_SESSION['idnombre_ss'];
$perfil_ss     =  $_SESSION['perfil_ss'];

if($_SESSION['perfil_ss'] != "DAF-EMPRESA"){ 		
	header("Location:../index.php");	
}

$cargo_ss      =  $_SESSION['cargo_ss'];
$idempresa_ss  =  $_SESSION['idempresa_ss'];

$sql_e =" SELECT idempresa, razon_social, sigla FROM empresa WHERE idempresa='$idempresa_ss'";
$result_e = mysqli_query($link,$sql_e);
$row_e = mysqli_fetch_array($result_e);
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
        <?php echo $rowus[0];?> <?php echo $rowus[1];?> <?php echo $rowus[2];?> - <?php echo $row_e[2];?></p>
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

<script language="javascript" src="../js/jquery-3.1.1.min.js"></script>

	</header><!-- end header -->
	<section id="inner-headline">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h2 class="pageTitle">DECLARACIONES JURADAS  <?php echo $row_e[2];?></h2>
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
       <p>ESTE MÓDULO PERMITE REALIZAR LA DECLARACIÓN JURADA DE PROCESOS DE CONTRATACION A CADA EMPRESA PÚBLICA DEL ESTADO.</p>
    </div>
    </div>
    <div class="row">
        <form name="FORMU" action="nueva_declaracion_cd.php" method="post">
        <button type="submit" class="btn btn-primary">NUEVA DECLARACIÓN JURADA</button>
        </form>
    </div>
<div class="container">
<div class="row">
<div class="col-lg-12">
<h3>DECLARACIONES JURADAS.- <?php echo $row_e[2];?></h3>
</div>
</div>
<!--- GESTION DE EMPRESAS ---->

<div class="table-responsive">
      <table class="table table-bordered" id="example" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nª</th>
                        <th>CÓDIGO DE DECLARACIÓN</th>
                        <th>ENTIDAD/EMPRESA</th>
                        <th>TIPO DE PRESUPUESTO</th>
                        <th>MES DE LA DECLARACIÓN</th>
                        <th>FECHA DE LA DECLARACIÓN</th>
                        <th>ACCIÓN</th>
                    </tr>
                </thead>
					<tbody>
          <?php
            $numero=1;
            $sql =" SELECT declaracion_cd.iddeclaracion_cd, empresa.sigla, tipo_presupuesto.tipo_presupuesto, declaracion_cd.correlativo, declaracion_cd.codigo, ";
            $sql.=" declaracion_cd.mes, declaracion_cd.dj_fecha, declaracion_cd.dj_hora, declaracion_cd.idusuario, declaracion_cd.idempresa FROM declaracion_cd, empresa, tipo_presupuesto ";
            $sql.=" WHERE declaracion_cd.idempresa=empresa.idempresa AND declaracion_cd.idtipo_presupuesto=tipo_presupuesto.idtipo_presupuesto AND declaracion_cd.idempresa='$idempresa_ss' ORDER BY declaracion_cd.iddeclaracion_cd ";
            $result = mysqli_query($link,$sql);
            if ($row = mysqli_fetch_array($result)){
            mysqli_field_seek($result,0);
            while ($field = mysqli_fetch_field($result)){
            } do {
            ?>
				<tr>
				<td><?php echo $numero;?></td>
        <td><?php echo $row[4];?></td>
				<td><?php echo $row[1];?></td>
				<td><?php echo $row[2];?></td>
				<td><?php echo $row[5];?></td>
				<td>
        <?php 
            $fecha_elab1 = explode('-',$row[6]);
            $f_declaracion = $fecha_elab1[2].'/'.$fecha_elab1[1].'/'.$fecha_elab1[0];
            echo $f_declaracion;
          ?>  
        </td>
              <td>                                                
              <form name="VALIDA" action="valida_declaracion_cd.php" method="post">
              <input name="iddeclaracion_cd" type="hidden" value="<?php echo $row[0];?>">
              <input name="idempresa" type="hidden" value="<?php echo $row[9];?>">
              <input name="idusuario" type="hidden" value="<?php echo $row[8];?>">
              <input name="codigo" type="hidden" value="<?php echo $row[4];?>">
              <input name="mes" type="hidden" value="<?php echo $row[5];?>">
              <button type="submit" class="btn-link">FORMULARIOS-3009</button></form>
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
<!--- END DELCARACION DE CONTRATACIONES DIRECTAS ---->
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