<?php include("../cabf.php");?>
<?php include("../inc.config.php");?>
<?php
date_default_timezone_set('America/La_Paz');
$fecha_ram			= date("Ymd");
$fecha 					= date("Y-m-d");

$idusuario_ss  =  $_SESSION['idusuario_ss'];
$idnombre_ss   =  $_SESSION['idnombre_ss'];
$perfil_ss     =  $_SESSION['perfil_ss'];

if($_SESSION['perfil_ss'] != "ADMINISTRADOR"){ 		
	header("Location:../index.php");	
}
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
                <?php include("../menu_corres.php");?>
            </div>
        </div>
	</header><!-- end header -->
	<section id="inner-headline">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h2 class="pageTitle">NUEVO DOCUMENTO EMITIDO</h2>
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
      <h3 align="center"> <a href="documentos_emitidos.php">VOLVER</a></h3>
      <h3>REGISTRAR NUEVO DOCUMENTO</h3>
    </div>
    </div>
<div class="container">

<!-- javascript --->
<div class="box-area">

      <form name="FORM9" action="guarda_registro_documento.php" method="post">
      <div class="row">
      <div class="col-md-2"><h4>TIPO DE DOCUMENTO:</h4></div>
      <div class="col-md-2">
          <select name="idtipo_documento"  id="idtipo_documento" class="form-control" required>
          <option value="">-SELECCIONE-</option>
            <?php
            $sql8 = " SELECT idtipo_documento, tipo_documento FROM tipo_documento ";
            $result8 = mysqli_query($link,$sql8);
            if ($row8 = mysqli_fetch_array($result8)){
            mysqli_field_seek($result8,0);
            while ($field8 = mysqli_fetch_field($result8)){
            } do {
            echo "<option value=". $row8[0]. ">". $row8[1]. "</option>";
            } while ($row8 = mysqli_fetch_array($result8));
            } else {
            echo "No se encontraron resultados!";
            }
            ?>
          </select>  
      </div>
      <div class="col-md-2"><h4>CITE:</h4></div>
      <div class="col-md-2"><input type="text" class="form-control" name="cite" required></div>
      <div class="col-md-2"><h4>FECHA:</h4></div>
      <div class="col-md-2"><input type="text" id="fecha1" class="form-control" name="fecha_doc" required></div>
      </div>

  <div class="row">
  <div class="col-md-3"><h4>RESPONSABLE</h4></div>
  <div class="col-md-9">
  <select name="idusuario_r"  id="idusuario_r" class="form-control" required>
  <option value="">-SELECCIONE-</option>
      <?php
      $sql1 = " SELECT usuarios.idusuario, nombres.nombres, nombres.paterno, nombres.materno, nombres.titulo ,cargo.cargo FROM usuarios, nombres, cargo WHERE usuarios.idnombre=nombres.idnombre";
      $sql1.= " AND usuarios.idcargo=cargo.idcargo AND usuarios.condicion='ACTIVO' AND usuarios.idarea='12'  ";
      $result1 = mysqli_query($link,$sql1);
      if ($row1 = mysqli_fetch_array($result1)){
      mysqli_field_seek($result1,0);
      while ($field1 = mysqli_fetch_field($result1)){
      } do {
      echo "<option value=". $row1[0]. ">". $row1[4]." ". $row1[1]." ". $row1[2]." ". $row1[3]." - ". $row1[5]."</option>";
      } while ($row1 = mysqli_fetch_array($result1));
      } else {
      echo "No se encontraron resultados!";
      }
      ?>
  </select>
  </div>
  </div>
     
    <div class="row">
    <div class="col-md-3"><h4>EMPRESA/ENTIDAD:</h4></div>
        <div class="col-md-3">
        <select size="1" name="tipo_procedencia" id="tipo_procedencia" class="form-control" required>
        <option value="">Seleccionar</option>
        <option value="EMPRESA">EMPRESA PÚBLICA</option>
        <option value="OTRA">OTRA</option>
        </select>
        </div>
        <input type="hidden" name="origen" value="<?php echo $origen;?>">
        <div class="col-md-6"  id="procedencia"></div>
        </div>

      <div class="row">
      <div class="col-md-2"><h4>REFERENCIA DEL DOCUMENTO:</h4></div>
      <div class="col-md-4"><textarea class="form-control" rows="3" name="ref" required></textarea></div>
      <div class="col-md-3"><h4>DESTINATARIO (AUTORIDAD/CARGO):</h4></div>
      <div class="col-md-3"><textarea class="form-control" rows="3" name="destino" required></textarea></div>
      </div>

      <div class="row">
      <div class="col-md-6"><h4>ASOCIAR CON HOJA DE RUTA DE SISTEMA (POR CÓDIGO):</h4></div>
      <div class="col-md-6"><input type="text" class="form-control" id="busqueda_v" required>
      <div id="resultado_h"></div>
      </div>
      </div>

      <div class="row">
      <div class="col-md-12"> <h4 class="text-success">EN CASO DE SER UN OFICIO NUEVO (SIN HOJA DE RUTA EN SISTEMA):</h4> 
      </div>
      </div>
      
    <div class="row">
    <div class="col-md-3"><h4>ASOCIAR CON DOCUMENTO (HOJA DE RUTA-OFICIO) ANTERIOR:</h4></div>
    <div class="col-md-3"><input type="text" class="form-control" name="hoja_ruta"></div>
    <div class="col-md-3"><h4>N° CODIGO INTERNO:</h4></div>
    <div class="col-md-3"><input type="text" class="form-control" name="no_interno"></div>
    </div>

    <div class="row">
    <div class="col-md-2"><h4>DESPACHADO:</h4></div>
    <div class="col-md-2"><input type="text" id="fecha2" class="form-control" name="despachado" required></div>
    <div class="col-md-2"><h4>OBSERVACIÓN:</h4></div>
    <div class="col-md-4"><textarea class="form-control" rows="3" name="observacion"></textarea></div>
    <div class="col-md-2"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal3">REGISTRAR</button></div>
    </div>

    </div>

<!-- Modal -->
<div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModal3Label" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModal3Label">REGISTRO DE DOCUMENTO</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ¿Esta seguro de registrar el documento?
       </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">CANCELAR</button>
        <button type="submit" class="btn btn-primary pull-center">CONFIRMAR REGISTRO</button>
           </div>
    </div>
  </div>
</div>
</form>

<div class="row">
<div class="col-md-12"></div>
</div>
</div>
</br>
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
<script language="javascript">
$(document).ready(function(){
   $("#origen").change(function () {
           $("#origen option:selected").each(function () {
            origen=$(this).val();
            $.post("intro_hojaruta.php", {origen:origen}, function(data){
            $("#nueva_hojaruta").html(data);
            });
        });
   })
});
</script>
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
<script>
    $("#fecha2").datepicker($.datepicker.regional[ "es" ]);
</script>
<script language="javascript">
    $(document).ready(function(){
    $("#tipo_procedencia").change(function () {
            $("#tipo_procedencia option:selected").each(function () {
              tipo_procedencia=$(this).val();
                $.post("tipo_prodecencia.php", { tipo_procedencia:tipo_procedencia }, function(data){
                $("#procedencia").html(data);
                });
            });
    })
    });
</script>
<script>
	$(document).ready(function(){
		  var consulta;

		  //hacemos focus al campo de b�squeda
		  $("#busqueda_v").focus();

		  //comprobamos si se pulsa una tecla
		  $("#busqueda_v").keyup(function(e){

				//obtenemos el texto introducido en el campo de b�squeda
				consulta = $("#busqueda_v").val();

				 //hace la b�squeda

					 $.ajax({
						   type: "POST",
						   url: "buscar_corres_h.php",
						   data: "b="+consulta,
						   dataType: "html",
						   beforeSend: function(){
									  //imagen de carga
								   $("#resultado_h").html("<p align='center'><img src='ajax-loader.gif' /></p>");
						   },
						   error: function(){
								   alert("error petici�n ajax");
							 },
						  success: function(data){
								$("#resultado_h").empty();
								$("#resultado_h").append(data);
								//$("#busqueda").val(consulta);
							}
					});
		  });
	});
</script>
</body>
</html>