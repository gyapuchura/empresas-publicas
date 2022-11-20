<?php include("../inc.config.php");?>
<?php
$perfil = $_POST['perfil'];
$fecha 	= date("d/m/Y");

if ($perfil == "DAF-EMPRESA" || $perfil == "UAI-EMPRESA") {
 /*  si el nuevo usuario corresponde a la DAF-EMPRESA o UAI-EMPRESA */ ?>

<div class="form-group row">
<div class="col-sm-6">
    <h4>EMPRESA PÚBLICA:</h4> 
<select name="idempresa"  id="idempresa" class="form-control" required>
<option value="">ELEGIR EMPRESA</option>
<?php
/*
Realizamos una consulta ala tabla empresa
para mostrar los datos en un combo
*/
$numero=1;
$sql1 = " SELECT idempresa, sigla, razon_social FROM empresa WHERE vigente='VIGENTE' ORDER BY sigla";
$result1 = mysqli_query($link,$sql1);
if ($row1 = mysqli_fetch_array($result1)){
mysqli_field_seek($result1,0);
while ($field1 = mysqli_fetch_field($result1)){
} do {
echo "<option value=".$row1[0].">".$numero." .- ".$row1[1]."</option>";
$numero=$numero+1;
} while ($row1 = mysqli_fetch_array($result1));
} else {
echo "No se encontraron resultados!";
}
?>
</select>

</div>
<div class="col-sm-6">
    <h4>CARGO:</h4>
    <textarea name="cargo_e" rows="3" class="form-control" required></textarea>                                   
    </div>
</div>

    <?php    
  } else {

  /*  si el nuevo usuario forma parte de la CGE o SCEP  */  ?>
  
<div class="form-group row">
<div class="col-sm-12 mb-3 mb-sm-0">
<h4>UNIDAD ORGANIZACIONAL</h4>
<select name="iddireccion"  id="iddireccion" class="form-control" required>
    <option value="">Elegir </option>
    <?php
/*
Realizamos una consulta ala tabla autor
para mostrar los datos en un combo
*/
$sql1 = "select iddireccion,direccion from direccion";
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

<div class="form-group row">
<div class="col-sm-12 mb-3 mb-sm-0">
<h4>ÁREA ORGANIZACIONAL</h4>
<select name="idarea"  id="idarea" class="form-control" required></select>
</div>
</div>

<div class="form-group row">
<div class="col-sm-12 mb-3 mb-sm-0">
<h4>CARGO:</h4>
<select name="idcargo" id="idcargo" class="form-control" required></select>                                    
</div>
</div>
</div>
<br>

<?php
  }
?>
<script language="javascript">
    $(document).ready(function(){
    $("#iddireccion").change(function () {
            $("#iddireccion option:selected").each(function () {
                direccion=$(this).val();
                $.post("unidades.php", { direccion: direccion }, function(data){
                $("#idarea").html(data);
                });
            });
    })
    });
</script>
<script language="javascript">
    $(document).ready(function(){
    $("#idarea").change(function () {
            $("#idarea option:selected").each(function () {
                area=$(this).val();
                $.post("cargos.php", {area:area}, function(data){
                $("#idcargo").html(data);
                });
            });
    })
    });
</script>