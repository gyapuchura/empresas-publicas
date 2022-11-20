<?php include("../cabf.php");?>
<?php include("../inc.config.php");?>
<?php
date_default_timezone_set('America/La_Paz');
$fecha_ram			= date("Ymd");
$fecha 					= date("Y-m-d");

$idusuario_ss = $_SESSION['idusuario_ss'];
$idnombre_ss  = $_SESSION['idnombre_ss'];
$perfil_ss    = $_SESSION['perfil_ss'];
$idarea_ss    = $_SESSION['idarea_ss'];

$idcorres_ss        = $_SESSION['idcorres_ss'];
$idempresa_ss       = $_SESSION['idempresa_ss'];
$idderiva_corres_ss = $_SESSION['idderiva_corres_ss'];

$gestion      = date("Y");

$sql1 = " SELECT corres.idcorres, corres.gestion, corres.correlativo, corres.idusuario, corres.referencia, corres.procedencia, corres.no_control, ";
$sql1.= " corres.fecha_corres, corres.anexo, corres.codigo, corres.origen, documento_adj.documento_adj, corres.fecha_recib, corres.hora_recib, ";
$sql1.= " tipo_hojaruta.tipo_hojaruta, corres.idtipo_hojaruta FROM corres, documento_adj, tipo_hojaruta WHERE corres.iddocumento_adj=documento_adj.iddocumento_adj  ";
$sql1.= " AND corres.idtipo_hojaruta=tipo_hojaruta.idtipo_hojaruta AND corres.idcorres='$idcorres_ss' ";
$result1 = mysqli_query($link,$sql1);
$row1 = mysqli_fetch_array($result1);
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
<link rel="stylesheet" href="../css/dataTables.bootstrap.min.css">
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
			    <h2 class="pageTitle">ATENCIÓN A: <?php echo $row1[9];?></h2>
			</div>
		</div>
	</div>
</section>
<div class="container contenido">
<div class="row">
<div class="col-md-4"> </div>
<div class="col-md-4">
<form name="VOLVER" action="hojas_ruta_recibidas.php" method="post">
<h3><button type="submmit" class="btn-link" >VOLVER</button></h3>
</form>
</div>
<div class="col-md-4"></div>
</div>

<div class="box-area">
 <div class="row">
  <div class="col-md-2"><h4>N° CONTROL:</h4></div>
  <div class="col-md-2"><h4 class="text-muted"><?php echo $row1[6];?></h4></div>
  <div class="col-md-2"><h4>REFERENCIA</h4></div>
  <div class="col-md-6"><h4 class="text-muted"><?php echo $row1[4];?></h4></div>
 </div>

<div class="row">
  <div class="col-md-2"><h4>CODIGO</h4></div>
  <div class="col-md-2"><h4 class="text-muted"><?php echo $row1[9];?></h4></div>
  <div class="col-md-2"><h4>PROCEDENCIA</h4></div>
  <div class="col-md-3"><h4 class="text-muted"><?php echo $row1[5];?></h4></div>
  <div class="col-md-1"><h4>FECHA:</h4></div>
  <div class="col-md-2"><h4 class="text-muted">
    <?php 
            $fecha_elab1 = explode('-',$row1[7]);
            $f_corres    = $fecha_elab1[2].'/'.$fecha_elab1[1].'/'.$fecha_elab1[0];
            echo $f_corres;
      ?>
  </h4></div>
</div>
</div>
<!------- BEGIN bitacora de actualizaciones --->

<div class="row">
<div class="col-md-4"><h3>TIPO DE HOJA DE RUTA:</h3></div>
<div class="col-md-8"><h2 class="text-muted"><?php echo $row1[14];?></h2></div>
</div>

<div class="row">
<div class="col-md-12">
<div class="container contenido">
<table class="table">
  <thead>
    <tr>
      <th scope="col"><h5>N°</h5></th>
      <th scope="col"><h5>FECHA</h5></th>
      <th scope="col"><h5>ESTADO TRÁMITE</h5></th>
      <th scope="col"><h5>RESUMEN</h5></th>
<!--  <th scope="col"><h5>CODIGO ARCHIVO DIGITAL</h5></th>
      <th scope="col"><h5>DOCUMENTO ELABORADO</h5></th> ---->
      <th scope="col"><h5>AJUSTAR ESTADO</h5></th>
    </tr>
  </thead>
  <tbody>
  <?php
$contador=1;
$sql_e =" SELECT bitacora_estado.idbitacora_estado, bitacora_estado.idcorres, bitacora_estado.correlativo, estado.estado, bitacora_estado.resumen, ";
$sql_e.=" bitacora_estado.codigo_doc, bitacora_estado.archivo_id, bitacora_estado.hash, bitacora_estado.fecha, bitacora_estado.idusuario FROM bitacora_estado, estado WHERE idcorres='$idcorres_ss' ";
$sql_e.=" AND bitacora_estado.idestado=estado.idestado ORDER BY bitacora_estado.idbitacora_estado ";
$result_e = mysqli_query($link,$sql_e);
if ($row_e = mysqli_fetch_array($result_e)){
mysqli_field_seek($result_e,0);
while ($field_e = mysqli_fetch_field($result_e)){
} do {
?>    
    <tr>
      <th scope="row"><h5 class="text-muted"><?php echo $contador;?></h5></th>
      <td><h5 class="text-muted"> 
      <?php 
            $fecha_elab3 = explode('-',$row_e[8]);
            $f_bitacora  = $fecha_elab3[2].'/'.$fecha_elab3[1].'/'.$fecha_elab3[0];
            echo $f_bitacora;
      ?>  
      </h5></td>
      <td> <h5 class="text-muted"><?php echo $row_e[3];?></h5></td>
      <td> <h5 class="text-muted"><?php echo $row_e[4];?></h5></td>
<!--- <td> <h5 class="text-muted"><?php echo $row_e[5];?></h5></td> ------>
<!--- <td> ---->
<!--- aqui obtiene el archivo en pdf-->

<!--- <a href="obtiene_archivo_cge.php?id_archivo=<?php echo $row_e[6];?>&hash=<?php echo $row_e[7];?>" target="_blank" class="btn-link" onClick="window.open(this.href, this.target, 'width=800,height=1000,scrollbars=YES, left=300'); return false;"> --->
<!--- <h5 class="text-success">  
<?php
if ($row_e[6] != "" ) {
  echo "OBTENER DOCUMENTO";
} else {
}
?>
</h5></a>  ---->
<!--- aqui obtiene el archivo en pdf-->
    <!---  </td> ----------->
      <td>

      <?php
      if ($row_e[6] == '' && $row_e[9]==$idusuario_ss) {
      ?>
            <form name="AJUSTA" action="elimina_bitacora_estado.php" method="post">
            <input type="hidden" name="idbitacora_estado" value="<?php echo $row_e[0];?>">
            <input type="hidden" name="idcorres" value="<?php echo $row_e[1];?>">
            <button tipe="submit" class="btn-link"><h5 class="text-danger">QUITAR</h5></button>
            </form>  
      <?php
      } else {
      }
      ?>
            <form name="AJUSTA" action="valida_bitacora_estado.php" method="post">
            <input type="hidden" name="idbitacora_estado" value="<?php echo $row_e[0];?>">
            <input type="hidden" name="idcorres" value="<?php echo $row_e[1];?>">
            <button tipe="submit" class="btn-link"><h5 class="text-primary">
            <?php  
         //---   if ($row_e[9] == $idusuario_ss) {  ---//
         //--     echo "AJUSTES"; ----//
         //---   } else {  -------//    
         //---   }  ----//
          ?>  
            </h5></button>
            </form>                 
          </td>
          </tr>
          <?php 
        $contador=$contador+1;  
        }
        while ($row_e = mysqli_fetch_array($result_e));

      } else {
      }
        ?>   
    </tbody>
    </table>
   </div>
  </div>
</div>
<!------- END bitacora de actualizaciones --->

<div class="row">
<h2>ACTUALIZACIÓN DE ESTADO DEL TRÁMITE</h2>
</div>

<div class="box-area">
<div class="row">

<form method="post" action="subida_doc_respaldo.php" enctype="multipart/form-data">
    <div class="col-md-4"><h4>ESTADO DEL TRÁMITE:</h4></div>
      <div class="col-md-8">
            <select name="idestado"  id="idestado" class="form-control" required>
            <option value="">-SELECCIONE-</option>
          <?php
          $sql2 = "select idestado, estado from estado where tipo_estado='DINAMICO' AND idtipo_hojaruta='$row1[15]' ";
          $result2 = mysqli_query($link,$sql2);
          if ($row2 = mysqli_fetch_array($result2)){
          mysqli_field_seek($result2,0);
          while ($field2 = mysqli_fetch_field($result2)){
          } do {
          echo "<option value=". $row2[0]. ">". $row2[1]. "</option>";
          } while ($row2 = mysqli_fetch_array($result2));
          } else {
          echo "No se encontraron resultados!";
          }
          ?>
          </select>
      </div>      
    </div>
<div class="row">
<div class="col-md-4"><h4>RESUMEN DE ESTADO:</h4></div>
<div class="col-md-8"><textarea class="form-control" rows="3" name="resumen"></textarea></div>
</div>
<div class="row">
<div class="col-md-12">
<input type="hidden" id="idcorres"  name="idcorres" value="<?php echo $row1[0]?>"> 
<input type="hidden" id="referencia"  name="referencia" value="<?php echo $row1[4]?>"> 
<input type="hidden" id="codigo"  name="codigo" value="<?php echo $row1[9];?>"> 
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#actualiza">
  ACTUALIZAR ESTADO DEL TRAMITE
</button>
</div>
</div>
</div>

<!----- BEGIN modal de actualizacion de estado ---->
<div class="modal fade" id="actualiza" tabindex="-1" role="dialog" aria-labelledby="actualiza" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="actualizaLabel">ACTUALIZAR ESTADO</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
          ¿Esta seguro de ACTUALIZAR EL ESTADO DEL TRAMITE?
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">CANCELAR</button>
        <button type="submit" class="btn btn-primary pull-center">CONFIRMAR ACTUALIZACIÓN</button>
      </div>
    </div>
  </div>
</div>
</form>
<!----- END modal de actualizacion de estado ---->
<div class="row">
<h2>DERIVACIÓN DE HOJA DE RUTA <?php echo $row1[9];?></h2>
 </div>

<!------- BEGIN REGISTRO DE DOCUMENTOS ---->

<div class="row">
  <div class="col-md-12"><h4>DOCUMENTOS PRODUCIDOS</h4></div>
</div>

<div class="row">
  <div class="col-md-12">
    <!----- tabla documentos ---->
    <div class="container contenido">
  <table class="table">
  <thead>
    <tr>
      <th scope="col"><h5>N°</h5></th>
      <th scope="col"><h5>TIPO DOCUMENTO</h5></th>
      <th scope="col"><h5>REFERENCIA DEL DOCUMENTO</h5></th>
      <th scope="col"><h5>CITE</h5></th>
      <th scope="col"><h5>DESTINATARIO</h5></th>
      <th scope="col"><h5>ACCIÓN</h5></th>
    </tr>
  </thead>
  <tbody>

<?php
$contador2=1;
$sql7 =" SELECT adjunto_hr.idadjunto_hr, adjunto_hr.idcorres, tipo_documento.tipo_documento, adjunto_hr.cite, adjunto_hr.ref, adjunto_hr.fecha, adjunto_hr.destino ";
$sql7.=" FROM adjunto_hr, tipo_documento WHERE adjunto_hr.idtipo_documento=tipo_documento.idtipo_documento AND adjunto_hr.idcorres='$idcorres_ss'";
$result7 = mysqli_query($link,$sql7);
if ($row7 = mysqli_fetch_array($result7)){
mysqli_field_seek($result7,0);
while ($field7 = mysqli_fetch_field($result7)){
} do {
?>  
      <tr>
      <td><h5 class="text-muted"> <?php echo $contador2;?></h5></td>
      <td><h5 class="text-muted"> <?php echo $row7[2];?> </h5></td>
      <td><h5 class="text-muted"> <?php echo $row7[4];?> </h5></td>
      <td><h5 class="text-muted"> <?php echo $row7[3];?> </h5></td>
      <td><h5 class="text-muted"> <?php echo $row7[6];?> </h5></td>
      <td>
          <form name="AJUSTA" action="elimina_adjunto_hr.php" method="post">
          <input type="hidden" name="idadjunto_hr" value="<?php echo $row7[0];?>">
          <button tipe="submit" class="btn-link"><h5 class="text-danger">QUITAR</h5></button>
          </form>  
      </td>
      </tr>
      <?php 
        $contador2=$contador2+1;  
        }
        while ($row7 = mysqli_fetch_array($result7));
      } else {
      } 
      ?>   
  </tbody>
</table>
    </div>
    </div>
    </div>
<!--- FORMULARIO DE REGISTRO ---->
    <form name="DOCUM" action="guarda_documento.php" method="post">
      <div class="box-area">
      <div class="row">
      <div class="col-md-2"><h4>TIPO DE DOCUMENTO:</h4></div>
      <div class="col-md-2">
      <select name="idtipo_documento"  id="idtipo_documento" class="form-control" required>
            <option value="">-SELECCIONE-</option>
          <?php
          $sql8 = "SELECT idtipo_documento, tipo_documento FROM tipo_documento ";
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
      <div class="col-md-1"><h4>CITE:</h4></div>
      <div class="col-md-4"><input type="text" class="form-control" name="cite" required></div>
      <div class="col-md-1"><h4>FECHA:</h4></div>
      <div class="col-md-2"><input type="text" id="fecha1" class="form-control" name="fecha_doc" required>
    </div>
      </div>
      <div class="row">
      <div class="col-md-2"><h4>REFERENCIA:</h4></div>
      <div class="col-md-4"><textarea class="form-control" rows="3" name="ref" required></textarea></div>
      <div class="col-md-2"><h4>DESTINATARIO:</h4></div>
      <div class="col-md-2"><textarea class="form-control" rows="3" name="destino" required></textarea></div>
      <div class="col-md-2">
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal3">REGISTRAR</button>
      </div>
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

<!----------- END REGISTRO DE DOCUMENTOS --------------->
<div class="row">
<h4>DATOS PARA LA DERIVACIÓN DE LA HOJA DE RUTA</h>
 </div>
<!---------- BEGIN DERIVACION DE LA HOJA DE RUTA ------------->

 <form name="DERIVACION" action="guarda_derivacion_corres_hr.php" method="post">
 <div class="box-area">
 <div class="row">
  <div class="col-md-3"><h4>DESTINATARIO</h4></div>
  <div class="col-md-9">
  <select name="idusuariod"  id="idusuariod" class="form-control" required>
   <option value="">-SELECCIONE-</option>
<?php
$sql1 = " SELECT usuarios.idusuario, nombres.nombres, nombres.paterno, nombres.materno, nombres.titulo ,cargo.cargo FROM usuarios, nombres, cargo WHERE usuarios.idnombre=nombres.idnombre";
$sql1.= " AND usuarios.idcargo=cargo.idcargo AND usuarios.condicion='ACTIVO'  ";
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
  <div class="col-md-3"><h4>INSTRUCCION:</h4></div>
  <div class="col-md-9">
  <select name="idinstruccion"  id="idinstruccion" class="form-control" required>
   <option value="">-SELECCIONE-</option>
<?php

$sql1 = "select idinstruccion, instruccion from instruccion";
$result1 = mysqli_query($link,$sql1);
if ($row1 = mysqli_fetch_array($result1)){
mysqli_field_seek($result1,0);
while ($field1 = mysqli_fetch_field($result1)){
} do {
echo "<option value=". $row1[0]. ">". $row1[0]. ".- ". $row1[1]. "</option>";
} while ($row1 = mysqli_fetch_array($result1));
} else {
echo "No se encontraron resultados!";
}
?>
</select>
  </div>
  </div>

  <div class="row"> 
  <div class="col-md-3"><h4>COMENTARIO:</h4></div>
  <div class="col-md-9"><textarea class="form-control" rows="3" name="comentario" required></textarea></div>
  </div>

 </div>

 </div>

 <div class="row">
 <div class="col-md-4"></div>
  <div class="col-md-8">    
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  DERIVAR LA HOJA DE RUTA
</button>
  </div>

 </div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">DERIVAR HOJA DE RUTA</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ¿Esta seguro de derivar esta HOJA DE RUTA?
       </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">CANCELAR</button>
        <button type="submit" class="btn btn-primary pull-center">CONFIRMAR DERIVACION</button>
           </div>
    </div>
  </div>
</div>
</form>

<!---------- END DERIVACION DE LA HOJA DE RUTA ------------->


<!---------- BEGIN CONCLUSION DE LA HOJA DE RUTA ------------->

  <?php
      $sqld = " SELECT idderiva_corres, idinstruccion FROM deriva_corres WHERE idderiva_corres='$idderiva_corres_ss' ";
      $resultd = mysqli_query($link,$sqld);
      $rowd = mysqli_fetch_array($resultd); ?>


<form name="CONCLUYE" action="concluye_hoja_ruta.php" method="post">
 <div class="row"> 
 <div class="col-md-4"></div>
 <div class="col-md-8"><h4></h4>
  <button type="submmit" class="btn-link">
  <h3 class="text-success">
  <?php
if ($perfil_ss == "ADMINISTRADOR") {
 echo "CONCLUIR LA HOJA DE RUTA";
} else { 
}
?>
</h3>
</button>
  </div>
  </div>
  </div>
  </form>
<!---------- END CONCLUSION DE LA HOJA DE RUTA ------------->

<!------- END DE LA PAGINA DE ATENCIPON A HOJA DE RUTA --->
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
  <script src="../js/jquery-ui.min.js"></script>
  <script src="../js/datepicker-es.js"></script>
  <script>
    $("#fecha1").datepicker($.datepicker.regional[ "es" ]);
  </script>
</body>
</html>