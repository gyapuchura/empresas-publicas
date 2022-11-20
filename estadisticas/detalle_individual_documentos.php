<?php include("../cabf.php");?>
<?php include("../inc.config.php");?>
<?php
date_default_timezone_set('America/La_Paz');
$fecha_ram	= date("Ymd");
$fecha 	    = date("Y-m-d");

$idusuario_rep =  $_GET['idusuario_rep'];

$sqlh =" SELECT nombres.nombres, nombres.paterno, nombres.materno FROM nombres, usuarios ";
$sqlh.="  WHERE nombres.idnombre=usuarios.idnombre AND usuarios.idusuario='$idusuario_rep' ";
$resulth = mysqli_query($link,$sqlh);
$rowh = mysqli_fetch_array($resulth);

// --- $idusuario_rep = $_POST['idusuario_rep']; para un usuario especifico ---//

$gestion       =  date("Y");
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>REPORTE HOJAS DE RUTA POR USUARIO</title>
</head>
	<body>
  <h3 style="font-family: Arial; text-align: center;">REPORTE DOCUMENTAL DEL SUPERVISOR:</h3>
  <h2 style="font-family: Arial; text-align: center; font-size: 18px;"><?php echo $rowh[0]; ?> <?php echo $rowh[1]; ?> <?php echo $rowh[2]; ?></h2>
	<table width="664" border="1" align="center">
	  <tbody>
	    <tr>
	    <td width="17" style="font-family: Arial; font-size: 12px;"><strong>N°</strong></td>
      <td width="62" style="font-family: Arial; font-size: 12px;"><strong>TIPO</strong></td>
      <td width="47" style="font-family: Arial; font-size: 12px;"><strong>N° DOCUMENTO</strong></td>
	    <td width="78" style="font-size: 12px; font-family: Arial;"><strong>REFERENCIA DEL DOCUMENTO</strong></td>
	    <td width="88" style="font-family: Arial; font-size: 12px; text-align: center;"><strong>DESTINATARIO</strong></td>
      <td width="51" style="font-family: Arial; font-size: 12px; text-align: center;"><strong>HOJA DE RUTA</strong></td>
	    <td width="54" style="font-family: Arial; font-size: 12px; text-align: center;"><strong>FECHA DEL DOCUMENTO</strong></td>	
      <td width="52" style="font-family: Arial; font-size: 12px; text-align: center;"><strong>RESPONSABLE</strong></td>	
      </tr>

        <?php
            $numero=1;
            $sql =" SELECT adjunto_hr.idadjunto_hr, adjunto_hr.idcorres, tipo_documento.tipo_documento, adjunto_hr.cite, adjunto_hr.ref, adjunto_hr.fecha, adjunto_hr.destino ";
            $sql.=" , adjunto_hr.entidad_destino, adjunto_hr.hoja_ruta, adjunto_hr.idusuario FROM adjunto_hr, tipo_documento WHERE adjunto_hr.idtipo_documento=tipo_documento.idtipo_documento AND adjunto_hr.idusuario='$idusuario_rep' ORDER BY adjunto_hr.idtipo_documento ";
            $result = mysqli_query($link,$sql);
            if ($row = mysqli_fetch_array($result)){
            mysqli_field_seek($result,0);
            while ($field = mysqli_fetch_field($result)){
            } do {
            ?>

	    <tr>
        <td style="font-family: Arial; font-size: 12px;"><?php echo $numero;?></td>
        <td style="font-family: Arial; font-size: 12px;"><?php echo $row[2];?></td>
        <td style="font-family: Arial; font-size: 12px;"><?php echo $row[3];?></td>
        <td style="font-family: Arial; font-size: 12px;"><?php echo $row[4];?></td>
        <td style="font-family: Arial; font-size: 12px;"><?php echo $row[6];?> <?php echo $row[7];?></td>
        <td style="font-family: Arial; font-size: 12px;"><?php echo $row[8];?></td>
	    <td>
        <span style="text-align: center; font-family: Arial; font-size: 12px;"><?php  
        $fecha_elab1 = explode('-',$row[5]);
        $f_corres    = $fecha_elab1[2].'/'.$fecha_elab1[1].'/'.$fecha_elab1[0];
        echo $f_corres;
        ?>
        </span></td>
        <td style="font-family: Arial; font-size: 12px;">
        <?php 
$sqld =" SELECT nombres.nombres, nombres.paterno, nombres.materno, nombres.titulo, cargo.cargo FROM nombres, usuarios, cargo  ";
$sqld.=" WHERE usuarios.idnombre=nombres.idnombre AND usuarios.idcargo=cargo.idcargo AND usuarios.idusuario='$row[9]' ";
$resultd = mysqli_query($link,$sqld);
$rowd = mysqli_fetch_array($resultd);
?>
<?php echo $rowd[3];?> <?php echo $rowd[0];?> <?php echo $rowd[1];?> <?php echo $rowd[2];?>
        <?php echo $row[8];?></td>
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

	<p>&nbsp;</p>

</body>
</html>
