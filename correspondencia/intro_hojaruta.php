<?php include("../inc.config.php");?>
<?php
$origen = $_POST["origen"];
$fecha 	= date("d/m/Y");

$sqlh = "  SELECT idcorres, gestion, correlativo, idusuario, no_control ";
$sqlh.= "  FROM corres WHERE origen= '$origen' ORDER BY idcorres DESC LIMIT 1";
$resulth = mysqli_query($link,$sqlh);
$rowh = mysqli_fetch_array($resulth);
$nuevo= $rowh[2]+1;
?>
<form name="FORM9" action="guarda_hoja_ruta.php" method="post">
<div class="box-area">
<div class="row">
			<div class="col-lg-12">
				<h2 class="text-primary">HOJA DE RUTA <?php echo $origen; ?> N° <?php echo $nuevo;?></h2>
			</div>
		</div>
<div class="row">
  <div class="col-md-2"><h4>REFERENCIA</h4></div>
  <div class="col-md-10"><textarea class="form-control" rows="3" name="referencia" autofocus required></textarea></div>
</div>
<div class="row">
  <div class="col-md-2"><h4>PROCEDENCIA</h4></div>
  <div class="col-md-4">
      <select size="1" name="tipo_procedencia" id="tipo_procedencia" class="form-control" required>
      <option value="">Seleccionar</option>
      <option value="EMPRESA">EMPRESA PÚBLICA</option>
      <option value="OTRA">OTRA</option>
      </select>
  </div>
  <input type="hidden" name="origen" value="<?php echo $origen;?>">
  <div class="col-md-6"><div id="procedencia"></div>
</div>
</div>
<div class="row">
<div class="col-md-2"><h4>N° DE CONTROL:</h4></div>
<div class="col-md-3"><input type="text" class="form-control" name="no_control" required/></div>
<div class="col-md-2"><h4>FECHA:</h4></div>
<div class="col-md-3"><input type="text" id="fecha1" class="form-control" name="fecha_corres" value="<?php echo $fecha;?>"></div>
<div class="col-md-1"><h5>FOJAS:</h5></div>
<div class="col-md-1"><input type="text" class="form-control" name="anexo"></div>
</div>
<div class="row">
<div class="col-md-1"><h5>ARCH.:</h5></div>
<div class="col-md-1"><input type="text" class="form-control" name="arch"></div>
<div class="col-md-1"><h5>ANILLADO:</h5></div>
<div class="col-md-1"><input type="text" class="form-control" name="anillado"></div>
<div class="col-md-1"><h5>LEGAJO:</h5></div>
<div class="col-md-1"><input type="text" class="form-control" name="legajo"></div>
<div class="col-md-1"><h5>EJEMPLAR:</h5></div>
<div class="col-md-1"><input type="text" class="form-control" name="ejemplar"></div>
<div class="col-md-1"><h5>ENGRAPADO:</h5></div>
<div class="col-md-1"><input type="text" class="form-control" name="engrapado"></div>
<div class="col-md-1"><h5>CD:</h5></div>
<div class="col-md-1"><input type="text" class="form-control" name="cd"></div>
</div>
<div class="row">
  <div class="col-md-4"><h4>CLASIFICACIÓN:</h4></div>
  <div class="col-md-8">
  <select name="idcontrol"  id="idcontrol" class="form-control" required>
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
  <select name="idtipo_hojaruta" id="idtipo_hojaruta" class="form-control" required></select>
  </div>
</div>

<div class="row">
  <div class="col-md-4"><h4>BUSCAR CITE DE OFICIO RELACIONADO (ANTERIOR):</h4></div>
  <div class="col-md-8"> 
  <input type="text" class="form-control" id="busqueda_v" />
  <div id="resultado_v"></div>
  </div>
</div>

<div class="row">
  <div class="col-md-4"><h4></h4></div>
  <div class="col-md-8" id="resultado_v"></div>
</div>

<div class="row">
  <div class="col-md-3"><h4></h4></div>
  <div class="col-md-9">    
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  REGISTRAR HOJA DE RUTA
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
        <h5 class="modal-title" id="exampleModalLabel">REGISTRO HOJA DE RUTA</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ¿Esta seguro de Registrar esta HOJA DE RUTA?
       </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">CANCELAR</button>
        <button type="submit" class="btn btn-primary pull-center">CONFIRMAR REGISTRO</button>     
      </div>
    </div>
  </div>
</div>
</form>
<script src="../js/datepicker-es.js"></script>
<script>
    $("#fecha1").datepicker($.datepicker.regional[ "es" ]);
</script>
<script language="javascript">
    $(document).ready(function(){
    $("#idcontrol").change(function () {
            $("#idcontrol option:selected").each(function () {
                control=$(this).val();
                $.post("tipo_hojaruta.php", { control: control }, function(data){
                $("#idtipo_hojaruta").html(data);
                });
            });
    })
    });
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
						   url: "buscar_corres_v.php",
						   data: "b="+consulta,
						   dataType: "html",
						   beforeSend: function(){
									  //imagen de carga
								   $("#resultado_v").html("<p align='center'><img src='ajax-loader.gif' /></p>");
						   },
						   error: function(){
								   alert("error peticion ajax");
							 },
						  success: function(data){
								$("#resultado_v").empty();
								$("#resultado_v").append(data);
								//$("#busqueda").val(consulta);
							}
					});
		  });
	});

</script>