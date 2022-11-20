<?php	
header('Content-type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=REPORTE SEGUIMIENTO HOJAS DE RUTA.xls");
header("Pragma: no-cache");
header("Expires: 0");
?> 
<?php include("../cabf.php");?>
<?php include("../inc.config.php");?>
<?php
date_default_timezone_set('America/La_Paz');
$fecha_ram		= date("Ymd");
$fecha 				= date("Y-m-d");

$idusuario_ss  =  $_SESSION['idusuario_ss'];
$idnombre_ss   =  $_SESSION['idnombre_ss'];
$perfil_ss     =  $_SESSION['perfil_ss'];

// --- $idusuario_rep = $_POST['idusuario_rep']; para un usuario especifico ---//

$gestion       =  date("Y");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>REPORTE HOJAS DE RUTA POR USUARIO</title>
</head>
	<body>
<h2>REPORTE GENERAL DE HOJAS DE RUTA AL 
<?php 
$fecha_rep = explode('-',$fecha);
$f_reporte    = $fecha_rep[2].'/'.$fecha_rep[1].'/'.$fecha_rep[0];
echo $f_reporte;
?> </h2>
	<table width="200" border="1">
	  <tbody>

	    <tr>
	      <td>N°</td>
        <td>N° CONTROL</td>
        <td>CODIGO</td>
	      <td>REFERENCIA</td>
	      <td>PROCEDENCIA</td>
        <td>TIPO HOJA DE RUTA</td>
	      <td>FECHA DE LA HOJA DE RUTA</td>
        <td>ULTIMA DERIVACIÓN</td>
        <td>INSTRUCCIÓN</td>
        <td>ESTADO HOJA DE RUTA</td>
	      <td>ETAPA DEL TRAMITE</td>
        </tr>
<?php
$numero=1;
$sql =" SELECT corres.idcorres, corres.no_control, corres.referencia, corres.procedencia, corres.fecha_corres, corres.codigo, corres.idestado, corres.correlativo, tipo_hojaruta.tipo_hojaruta, estado.estado FROM corres, tipo_hojaruta, estado ";
$sql.=" WHERE corres.idtipo_hojaruta=tipo_hojaruta.idtipo_hojaruta AND corres.idestado=estado.idestado AND corres.gestion='$gestion'";
$result = mysqli_query($link,$sql);
if ($row = mysqli_fetch_array($result)){
mysqli_field_seek($result,0);
while ($field = mysqli_fetch_field($result)){
} do {

    ?>
	    <tr>
      <td><?php echo $numero;?></td>
      <td><?php echo $row[1];?></td>
      <td><?php echo $row[5];?></td>
      <td><?php echo $row[2];?></td>
      <td><?php echo $row[3];?></td>
      <td><?php echo $row[8];?></td>
	    <td>
      <?php 
      $fecha_elab1 = explode('-',$row[4]);
      $f_corres    = $fecha_elab1[2].'/'.$fecha_elab1[1].'/'.$fecha_elab1[0];
      echo $f_corres;
      ?>
      </td>
      
      <td><?php     
      $sqlu =" SELECT idderiva_corres, idusuarioo, idusuariod FROM deriva_corres WHERE idcorres='$row[0]' ORDER by idderiva_corres DESC LIMIT 1";
      $resultu = mysqli_query($link,$sqlu);
      
      if ($rowu = mysqli_fetch_array($resultu)){
      $sqlh =" SELECT nombres.nombres, nombres.paterno, nombres.materno FROM nombres, usuarios ";
      $sqlh.="  WHERE nombres.idnombre=usuarios.idnombre AND usuarios.idusuario='$rowu[2]' ";
      $resulth = mysqli_query($link,$sqlh);
      $rowh = mysqli_fetch_array($resulth);  
      }      
      ?>
      <?php echo $rowh[0];?> <?php echo $rowh[1];?> <?php echo $rowh[2];?>            
      </td>
      <td><?php 
      
      $sql4 =" SELECT deriva_corres.idderiva_corres, instruccion.instruccion FROM deriva_corres, instruccion WHERE deriva_corres.idinstruccion=instruccion.idinstruccion ";
$sql4.=" AND deriva_corres.idcorres='$row[0]' ORDER by deriva_corres.idderiva_corres DESC LIMIT 1 ";
$result4 = mysqli_query($link,$sql4);
if($row4 = mysqli_fetch_array($result4))      
      {
        echo $row4[1];
        }?></td>
      <td><?php echo $row[9];?></td>
      <td>
      <?php
        //--- se extrae el estado de la tabla bitacora----//
        $sql3 = " SELECT bitacora_estado.idcorres, bitacora_estado.correlativo, estado.estado ";
        $sql3.= " FROM bitacora_estado, estado WHERE bitacora_estado.idestado=estado.idestado AND bitacora_estado.idcorres='$row[0]'";
        $sql3.= " ORDER BY bitacora_estado.idbitacora_estado DESC limit 1; ";
        $result3 = mysqli_query($link,$sql3);
        if ($row3 = mysqli_fetch_array($result3)){
          echo $row3[2];
        }      
      ?>       
     </td>	
      </tr>
<?php
$numero = $numero+1; 

}
  while ($row = mysqli_fetch_array($result));
} else {
}
?>
      </tbody>
    </table>

</body>
</html>
