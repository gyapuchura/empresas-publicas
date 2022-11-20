<?php
include("../inc.config.php");

$idmodalidad_cd = $_POST['modalidad_cd'];

if ($idmodalidad_cd == '6') {

    //--- ELEGIRA EMPRESA PUBLICA ------//
?>
<div class="col-md-2"><h4>OBJETO ESPECĪFICO:</h4></div>
<div class="col-md-10">
<select name="idsubmodalidad_cd"  id="idsubmodalidad_cd" class="form-control">
<option value="">ELEGIR OBJETO ESPECĪFICO</option>
 <?php
/*
Realizamos una consulta ala tabla submodalidad 
para mostrar los datos en un combo
*/
$sql1 = " SELECT idsubmodalidad_cd, submodalidad_cd FROM submodalidad_cd WHERE idmodalidad_cd='$idmodalidad_cd' ORDER BY idsubmodalidad_cd";
$result1 = mysqli_query($link,$sql1);
$numero=1;
if ($row1 = mysqli_fetch_array($result1)){
mysqli_field_seek($result1,0);
while ($field1 = mysqli_fetch_field($result1)){
} do {
echo "<option value=".$row1[0].">".$row1[1]." </option>";
$numero=$numero+1;
} while ($row1 = mysqli_fetch_array($result1));
} else {
echo "No se encontraron resultados!";
}
?>
</select>
</div>
<?php 
} else {
     //--- NO MOSTRARA PARA EL RESTO DE MODALIDADES ------//
 
        }
        ?>
