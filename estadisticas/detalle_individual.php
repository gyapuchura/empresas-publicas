<?php include("../cabf.php");?>
<?php include("../inc.config.php");?>
<?php
date_default_timezone_set('America/La_Paz');
$fecha_ram			= date("Ymd");
$fecha 					= date("Y-m-d");

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
  <h3 style="font-family: Arial; text-align: center;">REPORTE DE HOJAS DE RUTA ASIGNADAS A:</h3>
  <h2 style="font-family: Arial; text-align: center; font-size: 18px;"><?php echo $rowh[0]; ?> <?php echo $rowh[1]; ?> <?php echo $rowh[2]; ?></h2>
	<table width="664" border="1" align="center">
	  <tbody>
	    <tr>
	      <td width="17" style="font-family: Arial; font-size: 12px;"><strong>N°</strong></td>
        <td width="62" style="font-family: Arial; font-size: 12px;"><strong>CODIGO</strong></td>
        <td width="47" style="font-family: Arial; font-size: 12px;"><strong>N° CONTROL</strong></td>
	      <td width="78" style="font-size: 12px; font-family: Arial;"><strong>REFERENCIA</strong></td>
	      <td width="88" style="font-family: Arial; font-size: 12px; text-align: center;"><strong>PROCEDENCIA</strong></td>
        <td width="51" style="font-family: Arial; font-size: 12px; text-align: center;"><strong>TIPO DE HOJA DE RUTA</strong></td>
	      <td width="54" style="font-family: Arial; font-size: 12px; text-align: center;"><strong>FECHA DE LA HOJA DE RUTA</strong></td>	
        <td width="52" style="font-family: Arial; font-size: 12px; text-align: center;"><strong>INSTRUCCIÓN</strong></td>	
        <td width="52" style="font-family: Arial; font-size: 12px; text-align: center;"><strong>ESTADO HOJA DE RUTA</strong></td>		
	      <td width="67" style="text-align: center; font-family: Arial; font-size: 12px;"><strong>ETAPA DEL TRAMITE</strong></td>
        </tr>
<?php
$numero=1;
$sql =" SELECT idcorres FROM deriva_corres WHERE idusuariod='$idusuario_rep' GROUP BY idcorres ";
$result = mysqli_query($link,$sql);
if ($row = mysqli_fetch_array($result)){
mysqli_field_seek($result,0);
while ($field = mysqli_fetch_field($result)){
} do {

$sql2 =" SELECT corres.idcorres, corres.origen, corres.referencia, corres.procedencia, corres.fecha_corres, corres.codigo, corres.idestado, corres.correlativo  ";
$sql2.=" ,tipo_hojaruta.tipo_hojaruta, estado.estado, corres.no_control FROM corres, tipo_hojaruta, estado WHERE corres.idtipo_hojaruta=tipo_hojaruta.idtipo_hojaruta AND corres.idestado=estado.idestado AND corres.idcorres ='$row[0]' ";
$result2 = mysqli_query($link,$sql2);
$row2 = mysqli_fetch_array($result2);

$sql4 =" SELECT deriva_corres.idderiva_corres, instruccion.instruccion FROM deriva_corres, instruccion WHERE deriva_corres.idinstruccion=instruccion.idinstruccion ";
$sql4.=" AND deriva_corres.idcorres='$row[0]' ORDER by deriva_corres.idderiva_corres DESC LIMIT 1 ";
$result4 = mysqli_query($link,$sql4);
$row4 = mysqli_fetch_array($result4);

    ?>
	    <tr>
        <td style="font-family: Arial; font-size: 12px;"><?php echo $numero;?></td>
        <td style="font-family: Arial; font-size: 12px;"><?php echo $row2[5];?></td>
        <td style="font-family: Arial; font-size: 12px;"><?php echo $row2[10];?></td>
        <td style="font-family: Arial; font-size: 12px;"><?php echo $row2[2];?></td>
        <td style="font-family: Arial; font-size: 12px;"><?php echo $row2[3];?></td>
        <td style="font-family: Arial; font-size: 12px;"><?php echo $row2[8];?></td>
	      <td>
        <span style="text-align: center; font-family: Arial; font-size: 12px;"><?php  
        $fecha_elab1 = explode('-',$row2[4]);
        $f_corres    = $fecha_elab1[2].'/'.$fecha_elab1[1].'/'.$fecha_elab1[0];
        echo $f_corres;
        ?>
        </span></td>
        <td style="font-family: Arial; font-size: 12px;"><?php echo $row4[1];?></td>
        <td style="font-family: Arial; font-size: 12px;"><?php echo $row2[9];?></td>
        <td>
        <span style="text-align: center; font-family: Arial; font-size: 12px;"><?php 
        $sql3 = " SELECT bitacora_estado.idcorres, bitacora_estado.correlativo, estado.estado ";
        $sql3.= " FROM bitacora_estado, estado WHERE bitacora_estado.idestado=estado.idestado AND bitacora_estado.idcorres='$row[0]'";
        $sql3.= " ORDER BY bitacora_estado.idbitacora_estado DESC limit 1; ";
        $result3 = mysqli_query($link,$sql3);
        if ($row3 = mysqli_fetch_array($result3)){
          echo $row3[2];
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
	<p style="font-family: Arial; font-size: 16px; text-align: center;">CUADRO RESUMEN</p>
	<table width="317" border="1" align="center">
	  <tbody>
	    <tr>
	      <td width="193" style="font-family: Arial; font-size: 12px;"><strong>ESTADO HOJA DE RUTA</strong></td>
	      <td width="108" style="font-family: Arial; font-size: 12px; text-align: center;"><strong>CANTIDAD</strong></td>
        </tr>
        <?php
$sql_p =" SELECT COUNT(corres.idcorres) FROM corres, deriva_corres WHERE corres.idcorres=deriva_corres.idcorres AND deriva_corres.idusuariod='$idusuario_rep' AND corres.idestado='2'";
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
$sql_c =" SELECT COUNT(corres.idcorres) FROM corres, deriva_corres WHERE corres.idcorres=deriva_corres.idcorres AND deriva_corres.idusuariod='$idusuario_rep' AND corres.idestado='3'";
$result_c = mysqli_query($link,$sql_c);
$row_c = mysqli_fetch_array($result_c);
?> 
	      <td style="font-size: 12px; font-family: Arial;">&nbsp;<?php echo $row_c[0]; ?></td>
        </tr>
        <?php
$sql_a =" SELECT COUNT(corres.idcorres) FROM corres, deriva_corres WHERE corres.idcorres=deriva_corres.idcorres AND deriva_corres.idusuariod='$idusuario_rep' AND corres.idestado='4'";
$result_a = mysqli_query($link,$sql_a);
$row_a = mysqli_fetch_array($result_a);
?>   
	    <tr>
	      <td>&nbsp;<span style="font-family: Arial; font-size: 12px;">ARCHIVADAS</span></td>
	      <td style="font-family: Arial; font-size: 12px;">&nbsp;<?php echo $row_a[0]; ?></td>
        </tr>
        <?php
$sql_t =" SELECT COUNT(corres.idcorres) FROM corres, deriva_corres WHERE corres.idcorres=deriva_corres.idcorres AND deriva_corres.idusuariod='$idusuario_rep' ";
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
