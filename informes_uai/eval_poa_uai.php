<?php include("../cabf.php");?>
<?php include("../inc.config.php");?>
<?php
date_default_timezone_set('America/La_Paz');
$fecha_ram			= date("Ymd");
$fecha 			    = date("Y-m-d");

$idusuario_ss  =  $_SESSION['idusuario_ss'];
$idnombre_ss   =  $_SESSION['idnombre_ss'];
$perfil_ss     =  $_SESSION['perfil_ss'];

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
                <?php include("../menu_ci.php");?>
            </div>
        </div>
	</header><!-- end header -->
	<section id="inner-headline">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h2 class="pageTitle">INFORMES DE EVALUACIÓN POA - UAI</h2>
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
       <p>EN ESTA SECCIÓN SE ENCUENTRAN LOS REGISTROS DE INFORMES POA EVALUADOS A LAS UAIs</p>
    </div>
    </div>
    <div class="row">
    <div class="col-md-4">
        <form name="FORMU" action="nuevo_poa_uai.php" method="post">
        <button type="submit" class="btn btn-primary">NUEVO REGISTRO</button>
        </form>
    </div>
    <div class="col-md-4"></div>
    <div class="col-md-4">
    <h4><a href="../estadisticas/poa_empresas_uai.php" target="_blank" onClick="window.open(this.href, this.target, 'width=1000,height=700,scrollbars=YES'); return false;">
    GRÁFICO INFORMES POA UAIS-EMPRESAS</a></h4>
    </div>
    
    </div>

<div class="container">
<div class="row">
</div>
<!--- CONFIABILIDAD DE ESTADOS FINANCIEROS---->

<div class="table-responsive">
      <table class="table table-bordered" id="example" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>CÓDIGO</th>
                    <th>GESTIÓN</th>
                    <th>EMPRESA</th>
                    <th>TIPO DE INFORME</th>
                    <th>INFORME EMITIDO SCEP</th>
                    <th>ELABORADO POR</th>
                    <th>ACCIÓN</th>
                </tr>
            </thead>
			<tbody>
            <?php
            $numero=1;
            $sql =" SELECT uai_trabajo.iduai_trabajo, uai_trabajo.codigo, uai_trabajo.gestion, empresa.razon_social, uai_trabajo.tipo_informe, tipo_hojaruta.tipo_hojaruta, ";
            $sql.=" uai_trabajo.informe_emitido, uai_trabajo.elaborador, uai_trabajo.url FROM uai_trabajo, empresa, tipo_hojaruta WHERE uai_trabajo.idempresa=empresa.idempresa ";
            $sql.=" AND uai_trabajo.idtipo_hojaruta=tipo_hojaruta.idtipo_hojaruta AND uai_trabajo.idtipo_hojaruta='29' ORDER BY uai_trabajo.iduai_trabajo ";
            $result = mysqli_query($link,$sql);
            if ($row = mysqli_fetch_array($result)){
            mysqli_field_seek($result,0);
            while ($field = mysqli_fetch_field($result)){
            } do {
            ?>
				<tr>
                <td><?php echo $row[1];?></td>
				<td><?php echo $row[2];?></td>
				<td><?php echo $row[3];?></td>
                <td><?php echo $row[4];?></td>
                <td>
                <button onclick="openModelPDF('<?php echo $row[8];?>')" class="btn-link" type="button">
               <?php  if ($row[8] != '') { echo " VER INFORME "; } else { } ?>
                </button>
                <a class="btn-link" target="_black" href="<?php echo 'http://' . $_SERVER['HTTP_HOST'].'/scep_2022/'.$row[8]; ?>" >
                <?php  if ($row[8] != '') { echo " PAGINA COMPLETA "; } else { } ?></a>
                
                        <!-- Modal ver el archivo -->
                        <div class="modal fade" id="modalPdf" tabindex="-1" aria-labelledby="modalPdf" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Ver Informe</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <iframe id="iframePDF" frameborder="0" scrolling="no" width="100%" height="500px"></iframe>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
        <!-- Modal ver el archivo -->
            </td>
            <td><?php echo $row[7];?></td>
            <td>
                <form name="VALIDA" action="valida_poa_uai.php" method="post">
                <input name="iduai_trabajo" type="hidden" value="<?php echo $row[0];?>">
                <button type="submit" class="btn-link">VER/EDITAR</button></form>
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
<script language="javascript" src="../js/jquery-3.1.1.min.js"></script>
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
<script>
        function openModelPDF(url) {
            $('#modalPdf').modal('show');
            $('#iframePDF').attr('src','<?php echo 'http://' . $_SERVER['HTTP_HOST']. '/informes_uai/'; ?>'+url);
        }
</script>
</body>
</html>
