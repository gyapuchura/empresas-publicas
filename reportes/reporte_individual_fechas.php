<?php	
header('Content-type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=REPORTE SEGUIMIENTO HOJAS DE RUTA.xls");
header("Pragma: no-cache");
header("Expires: 0");?>
<?php include("../cabf.php");?>
<?php include("../inc.config.php");?>
<?php
date_default_timezone_set('America/La_Paz');
$fecha_ram			= date("Ymd");
$fecha 					= date("Y-m-d");

$idusuario_ss  =  $_SESSION['idusuario_ss'];
$idnombre_ss   =  $_SESSION['idnombre_ss'];
$perfil_ss     =  $_SESSION['perfil_ss'];

$idusuario_rep =  $_POST['idusuario_report'];
$origen        =  $_POST['origen'];

$fecha1  = $_POST['fecha_ini'];
$fecha2  = $_POST['fecha_fin'];

$fecha_in    = explode('/',$fecha1);
$fecha_ini   = $fecha_in[2].'-'.$fecha_in[1].'-'.$fecha_in[0];

$fecha_out   = explode('/',$fecha2);
$fecha_fin   = $fecha_out[2].'-'.$fecha_out[1].'-'.$fecha_out[0];

$sqlh =" SELECT nombres.nombres, nombres.paterno, nombres.materno FROM nombres, usuarios ";
$sqlh.="  WHERE nombres.idnombre=usuarios.idnombre AND usuarios.idusuario='$idusuario_rep' ";
$resulth = mysqli_query($link,$sqlh);
$rowh = mysqli_fetch_array($resulth);

$gestion = date("Y");
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
  <h3>REPORTE DE HOJAS DE RUTA ASIGNADAS A:</h3>
  <h2><?php echo $rowh[0]; ?> <?php echo $rowh[1]; ?> <?php echo $rowh[2]; ?></h2>
  <h2>DEL: <?php echo $fecha1; ?> AL: <?php echo $fecha2; ?> </h2>
	<table width="200" border="1">
	  <tbody>
	    <tr>
	    <td>N°</td>
        <td>N° CONTROL</td>
        <td>ORIGEN</td>
        <td>CODIGO</td>
        <td>REFERENCIA</td>
        <td>PROCEDENCIA</td>
        <td>TIPO DE HOJA DE RUTA</td>
	      <td>FECHA DE LA HOJA DE RUTA</td>	
        <td>INSTRUCCIÓN</td>	
        <td>ESTADO HOJA DE RUTA</td>		
	      <td>DOCUMENTOS PRODUCIDOS</td>
        </tr>
<?php
$numero=1;
$sql =" SELECT deriva_corres.idcorres FROM corres, deriva_corres WHERE corres.idcorres=deriva_corres.idcorres AND deriva_corres.idusuariod='$idusuario_rep' AND corres.origen='$origen' ";
$sql.=" AND corres.fecha_corres BETWEEN '$fecha_ini' AND '$fecha_fin' GROUP BY deriva_corres.idcorres ";
$result = mysqli_query($link,$sql);
if ($row = mysqli_fetch_array($result)){
mysqli_field_seek($result,0);
while ($field = mysqli_fetch_field($result)){
} do {
  
$sql2 =" SELECT corres.idcorres, corres.origen, corres.referencia, corres.procedencia, corres.fecha_corres, corres.codigo, corres.idestado, corres.correlativo ";
$sql2.=" ,tipo_hojaruta.tipo_hojaruta, estado.estado, corres.no_control FROM corres, tipo_hojaruta, estado WHERE corres.idtipo_hojaruta=tipo_hojaruta.idtipo_hojaruta ";
$sql2.=" AND corres.idestado=estado.idestado AND corres.idcorres ='$row[0]' ";
$result2 = mysqli_query($link,$sql2);
$row2 = mysqli_fetch_array($result2);

$sql4 =" SELECT deriva_corres.idderiva_corres, instruccion.instruccion FROM deriva_corres, instruccion WHERE deriva_corres.idinstruccion=instruccion.idinstruccion ";
$sql4.=" AND deriva_corres.idcorres='$row[0]' ORDER by deriva_corres.idderiva_corres DESC LIMIT 1 ";
$result4 = mysqli_query($link,$sql4);
$row4 = mysqli_fetch_array($result4);
    ?>
	    <tr>
        <td><?php echo $numero;?></td>
		    <td><?php echo $row2[10];?></td>
        <td><?php echo $row2[1];?></td>
        <td><?php echo $row2[5];?></td>
        <td><?php echo $row2[2];?></td>
        <td><?php echo $row2[3];?></td>
        <td><?php echo $row2[8];?></td>
	      <td><?php  
        $fecha_elab1 = explode('-',$row2[4]);
        $f_corres    = $fecha_elab1[2].'/'.$fecha_elab1[1].'/'.$fecha_elab1[0];
        echo $f_corres;
        ?></td>
        <td><?php echo $row4[1];?></td>
        <td><?php echo $row2[9];?></td>
        <td>
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
	<p>CUADRO RESUMEN</p>
	<table width="428" border="1">
	  <tbody>
	    <tr>
	      <td width="226">ESTADO HOJA DE RUTA</td>
	      <td width="186">CANTIDAD</td>
        </tr>
        <?php
$sql_p =" SELECT COUNT(corres.idcorres) FROM corres, deriva_corres WHERE corres.idcorres=deriva_corres.idcorres AND deriva_corres.idusuariod='$idusuario_rep' AND corres.idestado='2'";
$result_p = mysqli_query($link,$sql_p);
$row_p = mysqli_fetch_array($result_p);
?> 
	    <tr>
	      <td>&nbsp;EN PROCESO</td>
	      <td>&nbsp;<?php echo $row_p[0]; ?></td>
        </tr>
	    <tr>
	      <td>&nbsp;CONCLUIDAS</td>
        <?php
$sql_c =" SELECT COUNT(corres.idcorres) FROM corres, deriva_corres WHERE corres.idcorres=deriva_corres.idcorres AND deriva_corres.idusuariod='$idusuario_rep' AND corres.idestado='3'";
$result_c = mysqli_query($link,$sql_c);
$row_c = mysqli_fetch_array($result_c);
?> 
	      <td>&nbsp;<?php echo $row_c[0]; ?></td>
        </tr>
        <?php
$sql_a =" SELECT COUNT(corres.idcorres) FROM corres, deriva_corres WHERE corres.idcorres=deriva_corres.idcorres AND deriva_corres.idusuariod='$idusuario_rep' AND corres.idestado='4'";
$result_a = mysqli_query($link,$sql_a);
$row_a = mysqli_fetch_array($result_a);
?>   
	    <tr>
	      <td>&nbsp;ARCHIVADAS</td>
	      <td>&nbsp;<?php echo $row_a[0]; ?></td>
        </tr>
        <?php
$sql_t =" SELECT COUNT(corres.idcorres) FROM corres, deriva_corres WHERE corres.idcorres=deriva_corres.idcorres AND deriva_corres.idusuariod='$idusuario_rep' ";
$result_t = mysqli_query($link,$sql_t);
$row_t = mysqli_fetch_array($result_t);
?>  
        <tr>
	      <td>&nbsp;TOTAL</td>
	      <td>&nbsp;<?php echo $row_t[0]; ?></td>
        </tr>
      </tbody>
    </table>
	<p>&nbsp;</p>



</body>
</html>
