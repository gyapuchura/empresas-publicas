<?php	
header('Content-type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=REPORTE HOJAS DE RUTA POR EMPRESA.xls");
header("Pragma: no-cache");
header("Expires: 0");?>

<?php include("../cabf.php");?>
<?php include("../inc.config.php");?>
<?php
date_default_timezone_set('America/La_Paz');
$fecha_ram			= date("Ymd");
$fecha 					= date("Y-m-d");

$idempresa =  $_POST['idempresa'];

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

  <title>REPORTE HOJAS DE RUTA POR EMPRESA</title>
</head>
	<body>
  <h3 style="font-family: Arial; text-align: center;">REPORTE DE HOJAS DE RUTA:</h3>
  <h2 style="font-family: Arial; text-align: center; font-size: 18px;"><?php echo $rowh[1]; ?></h2>
	<table width="664" border="1" align="center">
	  <tbody>
	    <tr>
	      <td width="17" style="font-family: Arial; font-size: 12px;"><strong>N°</strong></td>
        <td width="62" style="font-family: Arial; font-size: 12px;"><strong>CODIGO</strong></td>
        <td width="47" style="font-family: Arial; font-size: 12px;"><strong>N° CONTROL</strong></td>
	      <td width="78" style="font-size: 12px; font-family: Arial;"><strong>REFERENCIA</strong></td>
        <td width="51" style="font-family: Arial; font-size: 12px; text-align: center;"><strong>TIPO DE HOJA DE RUTA</strong></td>
	      <td width="54" style="font-family: Arial; font-size: 12px; text-align: center;"><strong>FECHA DE LA HOJA DE RUTA</strong></td>
          <td width="52" style="font-family: Arial; font-size: 12px; text-align: center;"><strong>ÚLTIMA DERIVACIÓN</strong></td>	
        <td width="52" style="font-family: Arial; font-size: 12px; text-align: center;"><strong>INSTRUCCIÓN</strong></td>	
        <td width="52" style="font-family: Arial; font-size: 12px; text-align: center;"><strong>ESTADO HOJA DE RUTA</strong></td>		
	      <td width="67" style="text-align: center; font-family: Arial; font-size: 12px;"><strong>DOCUMENTOS PRODUCIDOS</strong></td>
        </tr>
        <?php

$numero=1;
$sql =" SELECT corres.idcorres, corres.codigo, corres.no_control, corres.referencia, tipo_hojaruta.tipo_hojaruta, corres.fecha_corres, estado.estado FROM corres, tipo_hojaruta, estado ";
$sql.=" WHERE corres.idtipo_hojaruta=tipo_hojaruta.idtipo_hojaruta AND corres.idestado=estado.idestado AND corres.gestion='$gestion' AND corres.idempresa='$idempresa'";
$result = mysqli_query($link,$sql);
if ($row = mysqli_fetch_array($result)){
mysqli_field_seek($result,0);
while ($field = mysqli_fetch_field($result)){
} do {

    $sql4 =" SELECT deriva_corres.idderiva_corres, instruccion.instruccion, deriva_corres.idusuariod FROM deriva_corres, instruccion WHERE deriva_corres.idinstruccion=instruccion.idinstruccion ";
    $sql4.=" AND deriva_corres.idcorres='$row[0]' ORDER by deriva_corres.idderiva_corres DESC LIMIT 1 ";
    $result4 = mysqli_query($link,$sql4);
    $row4 = mysqli_fetch_array($result4);

    ?>
	    <tr>
        <td style="font-family: Arial; font-size: 12px;"><?php echo $numero;?></td>
        <td style="font-family: Arial; font-size: 12px;"><?php echo $row[1];?></td>
        <td style="font-family: Arial; font-size: 12px;"><?php echo $row[2];?></td>
        <td style="font-family: Arial; font-size: 12px;"><?php echo $row[3];?></td>
        <td style="font-family: Arial; font-size: 12px;"><?php echo $row[4];?></td>
	    <td>
        <span style="text-align: center; font-family: Arial; font-size: 12px;"><?php  
        $fecha_elab1 = explode('-',$row[5]);
        $f_corres    = $fecha_elab1[2].'/'.$fecha_elab1[1].'/'.$fecha_elab1[0];
        echo $f_corres;
        ?>
        </span></td>
        <td style="font-family: Arial; font-size: 12px;">
        <?php 
        $sql5 = " SELECT usuarios.idusuario, nombres.nombres, nombres.paterno, nombres.materno, nombres.titulo ,cargo.cargo FROM usuarios, nombres, cargo WHERE usuarios.idnombre=nombres.idnombre";
        $sql5.= " AND usuarios.idcargo=cargo.idcargo AND usuarios.idusuario='$row4[2]'";
        $result5 = mysqli_query($link,$sql5);
        $row5 = mysqli_fetch_array($result5);
        ?>
        <?php echo $row5[4];?> <?php echo $row5[1];?> <?php echo $row5[2];?> <?php echo $row5[3];?>
        </td>    
        <td style="font-family: Arial; font-size: 12px;"><?php echo $row4[1];?></td>
        <td style="font-family: Arial; font-size: 12px;"><?php echo $row[6];?></td>
        <td>
        <span style="text-align: center; font-family: Arial; font-size: 12px;">
        <?php 
              $sql3 = " SELECT adjunto_hr.idadjunto_hr, adjunto_hr.idcorres, tipo_documento.tipo_documento, adjunto_hr.cite, adjunto_hr.ref, adjunto_hr.fecha ";
              $sql3.= " FROM adjunto_hr, tipo_documento WHERE adjunto_hr.idtipo_documento=tipo_documento.idtipo_documento AND adjunto_hr.idcorres='$row[0]'";
              $result3 = mysqli_query($link,$sql3);
              if ($row3 = mysqli_fetch_array($result3)){
              mysqli_field_seek($result3,0);
              while ($field3 = mysqli_fetch_field($result3)){
              } do {
              echo $row3[2].":".$row3[3]."</br>";
              }
                while ($row3 = mysqli_fetch_array($result3));
              } else {
                echo " ";
              }
        ?> 
     </span></td>	
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

	<table width="317" border="1" align="center">
	  <tbody>
	    <tr>
	      <td width="193" style="font-family: Arial; font-size: 12px;"><strong>ESTADO HOJA DE RUTA</strong></td>
	      <td width="108" style="font-family: Arial; font-size: 12px; text-align: center;"><strong>CANTIDAD</strong></td>
        </tr>
        <?php
$sql_p =" SELECT COUNT(idcorres) FROM corres WHERE idempresa='$idempresa' AND idestado='1' ";
$result_p = mysqli_query($link,$sql_p);
$row_p = mysqli_fetch_array($result_p);
?> 
	    <tr>
	      <td style="font-family: Arial; font-size: 12px;">&nbsp;REGISTRADAS SIN ASIGNAR</td>
	      <td>&nbsp;<span style="font-size: 12px; font-family: Arial;"><span style="text-align: center"></span><?php echo $row_p[0]; ?></span></td>
        </tr>
        <?php
$sql_p =" SELECT COUNT(idcorres) FROM corres WHERE idempresa='$idempresa' AND idestado='2' ";
$result_p = mysqli_query($link,$sql_p);
$row_p = mysqli_fetch_array($result_p);
?> 
	    <tr>
	      <td style="font-family: Arial; font-size: 12px;">&nbsp;EN PROCESO</td>
	      <td>&nbsp;<span style="font-size: 12px; font-family: Arial;"><span style="text-align: center"></span><?php echo $row_p[0]; ?></span></td>
        </tr>
	    <tr>
	      <td>&nbsp;<span style="font-family: Arial; font-size: 12px;">CONCLUIDAS</span></td>
        <?php
$sql_c =" SELECT COUNT(idcorres) FROM corres WHERE idempresa='$idempresa' AND idestado='3' ";
$result_c = mysqli_query($link,$sql_c);
$row_c = mysqli_fetch_array($result_c);
?> 
	      <td style="font-size: 12px; font-family: Arial;">&nbsp;<?php echo $row_c[0]; ?></td>
        </tr>
        <?php
$sql_a =" SELECT COUNT(idcorres) FROM corres WHERE idempresa='$idempresa' AND idestado='4' ";
$result_a = mysqli_query($link,$sql_a);
$row_a = mysqli_fetch_array($result_a);
?>   
	    <tr>
	      <td>&nbsp;<span style="font-family: Arial; font-size: 12px;">ARCHIVADAS</span></td>
	      <td style="font-family: Arial; font-size: 12px;">&nbsp;<?php echo $row_a[0]; ?></td>
        </tr>
        <?php
$sql_t =" SELECT COUNT(idcorres) FROM corres WHERE idempresa='$idempresa' ";
$result_t = mysqli_query($link,$sql_t);
$row_t = mysqli_fetch_array($result_t);
?>  
        <tr>
	      <td style="font-size: 12px; font-family: Arial;">&nbsp;TOTAL</td>
	      <td>&nbsp;<span style="font-size: 12px; font-family: Arial;"><?php echo $row_t[0]; ?></span></td>
        </tr>
      </tbody>
    </table>
	<p>&nbsp;</p>



</body>
</html>
