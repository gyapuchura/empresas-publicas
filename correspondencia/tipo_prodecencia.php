<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
  <title>TIPO PROCEDENCIA</title>
</head>
<body>
<?php
include("../inc.config.php");

$tipo_procedencia = $_POST['tipo_procedencia'];

if ($tipo_procedencia == 'EMPRESA') {

    //--- ELEGIRA EMPRESA PUBLICA ------//
?>
<select name="idempresa"  id="idempresa" class="form-control" required>
<option value="">ELEGIR EMPRESA</option>
 <?php
/*
Realizamos una consulta ala tabla EMPRESA
para mostrar los datos en un combo
*/
$sql1 = " SELECT idempresa, razon_social, sigla FROM empresa WHERE vigente='VIGENTE' ORDER BY sigla ";
$result1 = mysqli_query($link,$sql1);
$numero=1;
if ($row1 = mysqli_fetch_array($result1)){
mysqli_field_seek($result1,0);
while ($field1 = mysqli_fetch_field($result1)){
} do {
echo "<option value=".$row1[0].">".$numero.".- ".$row1[2]." </option>";
$numero=$numero+1;
} while ($row1 = mysqli_fetch_array($result1));
} else {
echo "No se encontraron resultados!";
}
?>
</select>

<?php 
} else {
     //--- ESCRIBIRA CAMPO DE TEXTO INDICANDO PROCEDNECIA ------//
    ?>   
<textarea class="form-control" rows="2" name="entidad_int" required></textarea> <!-- deberia ser entidad --->
SOLO EN CASO DE EMPRESA RELACIONADA:

        <select name="idempresa_int"  id="idempresa_int" class="form-control" required>
            <option value="555">SIN EMPRESA RELACIONADA</option>
            <?php
            /*
            Realizamos una consulta ala tabla EMPRESA
            para mostrar los datos en un combo
            */

            $sql1 = " SELECT idempresa, razon_social, sigla FROM empresa WHERE vigente='VIGENTE' ORDER BY sigla ";
            $result1 = mysqli_query($link,$sql1);
            $numero=1;
            if ($row1 = mysqli_fetch_array($result1)){
            mysqli_field_seek($result1,0);
            while ($field1 = mysqli_fetch_field($result1)){
            } do {
            echo "<option value=".$row1[0].">".$numero.".- ".$row1[2]." </option>";
            $numero=$numero+1;
            } while ($row1 = mysqli_fetch_array($result1));
            } else {
            echo "No se encontraron resultados!";
            }
            ?>
        </select>
        <?php    
        }
        ?>
</body>
</html>