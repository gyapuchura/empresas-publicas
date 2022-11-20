<?php include("../inc.config.php");?>
<?php
$idatribucion_cd = $_POST["atribucion_cd"];
$fecha 	= date("d/m/Y");

if ($idatribucion_cd == "1") {
    ?>

<form name="FORM_EV" action="guarda_eval_form_cd.php" method="post">
<div class="box-area">
<div class="row"> 
<div class="col-md-4"><h4 class="text-muted">LOS DATOS BÁSICOS ESTÁN CORRECTAMENTE LLENADOS:</h4></div> 
<div class="col-md-2">

<select name="idcumplimiento"  id="idcumplimiento" class="form-control">
<option value="">ELEGIR</option>
 <?php
/*
Realizamos una consulta ala tabla autor
para mostrar los datos en un combo
*/
$sql1 = " SELECT idcumplimiento, cumplimiento FROM cumplimiento ";
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
<div class="col-md-2"><h4 class="text-muted">COMENTARIOS Y/O OBSERVACIONES</h4></div> 
<div class="col-md-4"><textarea class="form-control" rows="3" name="comentario_observacion"></textarea></div> 
</div>
</div>

<div class="row">
<div class="col-md-12"><h3>2.- NATURALEZA Y MAGNITUD DE OPERACIONES DE LA EMPRESA PÚBLICA</h3></div>
</div>

<div class="row">
<div class="col-md-6"><h4 class="text-muted">LA CONTRATACIÓN APOYA A LAS ACTIVIDADES PRODUCTIVAS O ADMINISTRATIVAS</h4></div>
<div class="col-md-6">

<input name="idatribucion_cd" type="hidden" value="<?php echo $idatribucion_cd;?>">

<select name="idapoyo_cd"  id="idapoyo_cd" class="form-control">
<option value="">ELEGIR</option>
 <?php
/*
Realizamos una consulta ala tabla autor
para mostrar los datos en un combo
*/
$sql1 = " SELECT idapoyo_cd, apoyo_cd FROM apoyo_cd WHERE tipo_apoyo='ACTIVO' ";
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
<div class="col-md-12"><h4>3.- CUMPLIMIENTO DE DISPOSICIONES LEGALES</h4></div>
</div>

<div class="row">
<div class="col-md-6"><h4 class="text-muted">3.1.- Normas Básicas del Sistema de Administración de Bienes y Servicios</h4></div>
<div class="col-md-6"><textarea name="nb_sabs"  rows="2" class="form-control"></textarea></div>
</div>
<div class="row">
<div class="col-md-6"><h4 class="text-muted">3.2.- Reglamento Especifico del Sistema de Administracion de Bienes y Servicios RE-SABS</h4></div>
<div class="col-md-6"><textarea name="re_sabs"  rows="2" class="form-control"></textarea></div>
</div>
<div class="row">
<div class="col-md-6"><h4 class="text-muted">3.3.- Reglamento para la Remisión de Informacion de Procesos de Contratación Directa de Empresas Públicas RE/CE-086</h4></div>
<div class="col-md-6"><textarea name="re_remision"  rows="2" class="form-control"></textarea></div>
</div>
<input name="idposible_dano" type="hidden" value="0">
<input name="comentario_dano" type="hidden" value="">

<div class="row">
  <div class="col-md-8"><h4></h4></div>
  <div class="col-md-4">    
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  GUARDAR Y CONTINUAR EVALUACIÓN
  </button>
  </div>
  </div>
</div>
</div>

<!---- BEGIN MODAL GUARDAR EVALUACION DATOS BASICOS--->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">GUARDAR EVALUACIÓN DE DATOS Y CONTINUAR</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ¿Esta seguro de guardar y conttinuar?
       </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">CANCELAR</button>
        <button type="submit" class="btn btn-primary pull-center">CONFIRMAR GUARDAR</button>     
      </div>
    </div>
  </div>
</div>
</form>

<!----  END MODAL GUARDAR EVALUACION DATOS BASICOS--->

<div class="row">
<div class="col-md-4"><h4></h4></div>
<div class="col-md-8"></div>
</div>

    <?php    
  } else {
    ?>
  
<form name="FORM_DANO" action="guarda_eval_form_cd.php" method="post">

<input name="idatribucion_cd" type="hidden" value="<?php echo $idatribucion_cd;?>">

<div class="row">
<div class="col-md-12"><h3 class="text-warning">2.- DETERMINACIÓN DE POSIBLES DAÑOS</h3></div>
</div>

<div class="row">
<div class="col-md-6"><h3 class="text-warning">2.1,- SE DETERMINA EL POSIBLE DAÑO DEL TIPO:</h3></div>
<div class="col-md-6">

<select name="idposible_dano"  id="idposible_dano" class="form-control">
<option value="">ELEGIR</option>
 <?php
/*
Realizamos una consulta ala tabla autor
para mostrar los datos en un combo
*/
$sql1 = " SELECT idposible_dano, posible_dano FROM posible_dano ";
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
<div class="col-md-6"><h4 class="text-warning">2.2.- COMENTARIO Y/O OBSERRVACIÓN</h4></div>
<div class="col-md-6"><textarea name="comentario_dano"  rows="4" class="form-control"></textarea></div>
</div>

<div class="row">
  <div class="col-md-8"><h4></h4></div>
  <div class="col-md-4">    
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal2">
  GUARDAR Y CONCLUIR EVALUACIÓN
  </button>
  </div>
  </div>
</div>
</div>
<!---- BEGIN MODAL GUARDAR EVALUACION DATOS BASICOS--->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel2" class="text-warningclear">GUARDAR CONCLUSIÓN</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ¿Esta seguro de Guardar y Concluir Evaluación?
       </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">CANCELAR</button>
        <button type="submit" class="btn btn-primary pull-center">CONCLUIR EVALUACIÓN</button>     
      </div>
    </div>
  </div>
</div>

</form>

<!----  END MODAL GUARDAR EVALUACION DATOS BASICOS--->
   
    <?php
  }
?>