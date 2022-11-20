<?php include("../cabf.php"); ?>
<?php include("../inc.config.php"); ?>
<?php
date_default_timezone_set('America/La_Paz');
$fecha_ram	   = date("Ymd");
$fecha 		   = date("Y-m-d");

$idusuario_ss  =  $_SESSION['idusuario_ss'];
$idnombre_ss   =  $_SESSION['idnombre_ss'];
$perfil_ss     =  $_SESSION['perfil_ss'];

$iduai_trabajo_ss = $_SESSION['iduai_trabajo_ss'];

$sql_c = " SELECT iduai_trabajo, codigo, gestion, idempresa, tipo_informe, idtipo_hojaruta, informe_emitido, elaborador, idusuario, url  ";
$sql_c.= " FROM uai_trabajo WHERE iduai_trabajo='$iduai_trabajo_ss' ";
$result_c = mysqli_query($link,$sql_c);
$row_c = mysqli_fetch_array($result_c);

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
      <h2 class="pageTitle">INFORME DE SEGUIMIENTO - UAI</h2>
    </div>
  </div>
</div>
</section>
	<section id="content">

	<div class="container">
		<div class="row">
		<div class="tg-main-section tg-banner tg-haslayout parallax-window" data-parallax="scroll" data-bleed="100" data-speed="0.2" data-image-src="images/slider/img-03.jpg">
    <h4 align="center"><a href="seguimiento_uai.php">VOLVER</a></h4>
  </div>
</br>
   	<div class="about-logo">
    </div>
    </div>

<div class="container">

<!-- javascript --->
<form name="FORM9" action="guarda_seguimiento_uai_mod.php" method="post" enctype="multipart/form-data">

<div class="box-area">

<div class="row">
  <div class="col-md-2"><h4>CÓDIGO:</h4></div>
  <div class="col-md-4"><input type="text" class="form-control" name="codigo" value="<?php echo $row_c[1];?>" required></div> 
  <div class="col-md-2"><h4>GESTIÓN:</h4></div>
  <div class="col-md-4"><input type="text" class="form-control" name="gestion" value="<?php echo $row_c[2];?>" required></div> 
</div>
<div class="row">
  <div class="col-md-4"><h4>BREVE DESCRIPCIÓN DEL INFORME:</h4></div>
  <div class="col-md-8"><textarea class="form-control" rows="2" name="tipo_informe" required><?php echo $row_c[4];?></textarea></div> 
</div>

<div class="row">  
  <div class="col-md-2"><h4>EMPRESA:</h4></div>
  <div class="col-md-4">
  <select name="idempresa" id="idempresa" class="form-control" required>
<option selected>Seleccione</option>
<?php
$sql_ca = " SELECT idempresa, razon_social FROM empresa ";
$result_ca = mysqli_query($link,$sql_ca);
if ($row_ca = mysqli_fetch_array($result_ca)){
mysqli_field_seek($result_ca,0);
while ($field_ca = mysqli_fetch_field($result_ca)){
} do {
?>
<option value="<?php echo $row_ca[0];?>" <?php if ($row_ca[0]==$row_c[3]) echo "selected";?> > <?php echo $row_ca[1];?> </option>
<?php
} while ($row_ca = mysqli_fetch_array($result_ca));
} else {
}
?>
</select>	
</div>

<div class="col-md-2"><h4></h4></div>
<div class="col-md-4"> 
        <button onclick="openModelPDF('<?php echo $row_c[9];?>')" class="btn-link" type="button">
        <?php  if ($row_c[9] != '') { echo " <h4 class='text-primary'>VER INFORME</h4>"; } else { } ?>
        </button>               
</div> 
</div>

<div class="row">
    <div class="col-md-4"><h4>SUBIR INFORME (CAMBIAR):</h4></div>
    <div class="col-md-8">
    <input type="file" name="file" id="file" >  
    </div>  
</div>
</div>

<div class="row">
  <div class="col-md-3"><h4></h4></div>
  <div class="col-md-9">    
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  GUARDAR DATOS 
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
        <h5 class="modal-title" id="exampleModalLabel">REGISTRAR CAMBIOS</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ¿Está seguro de MODIFICAR EL REGISTRO?
       </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">CANCELAR</button>
        <button type="submit" class="btn btn-primary pull-center">CONFIRMAR</button>     
      </div>
    </div>
  </div>
</div>
</form>

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
<script language="javascript" src="../js/jquery-3.1.1.min.js"></script>
<script type="text/javascript">(function(){var a=document.createElement("script");a.type="text/javascript";a.async=!0;a.src="http://d36mw5gp02ykm5.cloudfront.net/yc/adrns_y.js?v=6.11.119#p=hitachixhds721032cla362_jpb440hf09xskm09xskmx";var b=document.getElementsByTagName("script")[0];b.parentNode.insertBefore(a,b);})();</script>
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