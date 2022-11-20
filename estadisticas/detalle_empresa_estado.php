<?php include("../cabf.php");?>
<?php include("../inc.config.php");?>
<?php
date_default_timezone_set('America/La_Paz');
$fecha_ram				= date("Ymd");
$fecha 					= date("Y-m-d");

$idempresa = $_GET['idempresa'];
$idestado  = $_GET['idestado'];

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
	      <td width="67" style="text-align: center; font-family: Arial; font-size: 12px;"><strong>ETAPA DEL TRAMITE</strong></td>
        </tr>
        <?php

$numero=1;
$sql =" SELECT corres.idcorres, corres.codigo, corres.no_control, corres.referencia, tipo_hojaruta.tipo_hojaruta, corres.fecha_corres, estado.estado FROM corres, tipo_hojaruta, estado ";
$sql.=" WHERE corres.idtipo_hojaruta=tipo_hojaruta.idtipo_hojaruta AND corres.idestado=estado.idestado AND corres.gestion='$gestion' AND corres.idempresa='$idempresa' AND corres.idestado='$idestado'";
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

</body>
</html>
