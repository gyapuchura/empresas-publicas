<?php include("../cabf.php");?>
<?php include("../inc.config.php");?>
<?php
date_default_timezone_set('America/La_Paz');
$fecha_ram				= date("Ymd");
$fecha 					= date("Y-m-d");

$idempresa = $_GET['idempresa'];
$gestion_c = $_GET['gestion'];
$idtipo_hojaruta = $_GET['idtipo_hojaruta'];

$sqlh =" SELECT idempresa, razon_social, sigla FROM empresa ";
$sqlh.="  WHERE idempresa='$idempresa' ";
$resulth = mysqli_query($link,$sqlh);
$rowh = mysqli_fetch_array($resulth);

$gestion       =  date("Y");

?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TRABAJOS UAIS</title>
</head>
	<body>
<?php
$sql7 = " SELECT tipo_hojaruta FROM tipo_hojaruta WHERE idtipo_hojaruta='$idtipo_hojaruta' ";
$result7 = mysqli_query($link,$sql7);
$row7 = mysqli_fetch_array($result7); ?>

  <h3 style="font-family: Arial; text-align: center;"><?php echo $row7[0];?></h3>
  <h2 style="font-family: Arial; text-align: center; font-size: 18px;"><?php echo $rowh[1]; ?></h2>


	<table width="664" border="1" align="center">
	  <tbody>
        <tr>
          <td width="17" style="font-family: Arial; font-size: 12px;"><strong>N°</strong></td>
          <td width="62" style="font-family: Arial; font-size: 12px;"><strong>CODIGO</strong></td>
          <td width="47" style="font-family: Arial; font-size: 12px;"><strong>GESTIÓN</strong></td>
          <td width="78" style="font-size: 12px; font-family: Arial;"><strong>TIPO DE INFORME</strong></td>
          <td width="51" style="font-family: Arial; font-size: 12px; text-align: center;"><strong>ELABORADO POR</strong></td>
          <td width="54" style="font-family: Arial; font-size: 12px; text-align: center;"><strong>VER INFORME</strong></td>
        </tr>
      <?php
$numero=1;
$sql =" SELECT uai_trabajo.iduai_trabajo, uai_trabajo.codigo, uai_trabajo.gestion, empresa.razon_social, uai_trabajo.tipo_informe, uai_trabajo.tipo_trabajo, tipo_hojaruta.tipo_hojaruta, ";
$sql.=" uai_trabajo.informe_emitido, uai_trabajo.elaborador, uai_trabajo.url FROM uai_trabajo, empresa, tipo_hojaruta WHERE uai_trabajo.idempresa=empresa.idempresa ";
$sql.=" AND uai_trabajo.idtipo_hojaruta=tipo_hojaruta.idtipo_hojaruta AND uai_trabajo.idtipo_hojaruta='$idtipo_hojaruta' AND uai_trabajo.idempresa='$idempresa' AND uai_trabajo.gestion='$gestion_c' ";
$sql.=" ORDER BY uai_trabajo.iduai_trabajo ";
$result = mysqli_query($link,$sql);
if ($row = mysqli_fetch_array($result)){
mysqli_field_seek($result,0);
while ($field = mysqli_fetch_field($result)){
} do {

    ?>
	    <tr>
        <td style="font-family: Arial; font-size: 12px;"><?php echo $numero;?></td>
        <td style="font-family: Arial; font-size: 12px;"><?php echo $row[1];?></td>
        <td style="font-family: Arial; font-size: 12px;"><?php echo $row[2];?></td>
        <td style="font-family: Arial; font-size: 12px;"><?php echo $row[4];?></td>
        <td style="font-family: Arial; font-size: 12px;"><?php echo $row[8];?></td>    
        <td>  
        <a class="btn-link" target="_black" href="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/empresas-publicas/' . $row[9]; ?>" >
                <?php  if ($row[9] != '') { echo "VER INFORME"; } else { } ?></a>

        </td>	
        </tr>
		<?php
$numero = $numero+1; 
}
  while ($row = mysqli_fetch_array($result));
} else {
  echo " ";
}
?>
      </tbody>
    </table>



</body>
</html>
