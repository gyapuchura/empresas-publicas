<?php include("../cabf.php");?>
<?php include("../inc.config.php");?>
<?php

date_default_timezone_set('UTC');
$fecha_ram		= date("Ymd");
$fecha 				= date("Y-m-d");

$idusuario_ss  =  $_SESSION['idusuario_ss'];
$idnombre_ss   =  $_SESSION['idnombre_ss'];
$perfil_ss     =  $_SESSION['perfil_ss'];

$idtipo_hojaruta  =  $_GET['idtipo_hojaruta'];

$gestion       = date("Y");
$sql = " SELECT tipo_hojaruta FROM tipo_hojaruta WHERE idtipo_hojaruta='$idtipo_hojaruta'  ";
$result = mysqli_query($link,$sql);
$row_e = mysqli_fetch_array($result);
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>DETALLE HOJAS DE RUTA</title>
  <style type="text/css">
<!--
.Estilo1 {
	font-family: Arial, Helvetica, sans-serif;
	color: #003366;
	font-size: 14px;
	font-weight: bold;
}
.Estilo10 {color: #000000; font-size: 14px; font-family: Arial, Helvetica, sans-serif;}
.Estilo16 {color: #003366; font-size: 14px; font-family: Arial, Helvetica, sans-serif;}
.Estilo17 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 14px;
}
.Estilo18 {
	font-family: Arial, Helvetica, sans-serif;
	font-weight: bold;
	color: #003366;
}
.Estilo18 {
    font-family: Times New Roman;
    font-size: 12px;
    text-align: center;
}
.times {
    font-family: Times New Roman;
    font-size: 12px;
}
.Estilo1 tbody tr td table tbody tr .Estilo10 {
    font-family: Times New Roman;
}
.Estilo1 tbody tr td table tbody tr td {
    font-family: Times New Roman;
}
.Estilo1 tbody tr td table tbody tr td {
    font-family: Times New Roman;
}
.Estilo1 tbody tr td table tbody tr td {
    font-family: Times New Roman;
}
.Estilo1 tbody tr td table tbody tr td {
    font-family: Times New Roman;
    font-size: 14px;
}
-->
  </style>
</head>

<body>
<table width="688" border="0" align="center" cellspacing="0">
  <tr>
    <td width="682"><p style="text-align: center; color: #002D5B;"><strong>HOJAS DE RUTA</strong></p>
      <p style="text-align: center"><?php echo $row_e[0];?></p>
      <table width="685" border="1">
        <tbody>
          <tr>
            <td style="color: #002D5B; font-family: Arial; font-size: 12px;">CODIGO</td>
            <td style="color: #002D5B; font-family: Arial; font-size: 12px;">HOJA DE RUTA</td>
            <td style="font-size: 12px; font-family: Arial; color: #002D5B;">N° CONTROL<span style="text-align: center"></span></td>
            <td style="font-size: 12px; color: #002D5B; font-family: Arial;">PROCEDENCIA</td>
            <td style="font-size: 12px; color: #002D5B; font-family: Arial;">REFERENCIA</td>
            <td style="font-size: 12px; font-family: Arial; color: #002D5B;">FECHA(HR)</td>
            <td style="font-size: 12px; color: #002D5B; font-family: Arial; text-align: center;">TIPO </td>
            <td style="font-size: 12px; color: #002D5B; font-family: Arial; text-align: center;">VER </td>
          </tr>
          <?php
$sql =" SELECT corres.idcorres, corres.gestion, corres.correlativo, corres.idusuario, corres.referencia, corres.procedencia, ";
$sql.=" corres.no_control, corres.fecha_corres, corres.anexo, corres.idestado, corres.codigo, corres.origen, tipo_hojaruta.tipo_hojaruta ";
$sql.=" FROM corres, tipo_hojaruta WHERE corres.idtipo_hojaruta=tipo_hojaruta.idtipo_hojaruta AND corres.gestion='$gestion' AND corres.idtipo_hojaruta='$idtipo_hojaruta' ORDER BY corres.idcorres ";
$result = mysqli_query($link,$sql);
if ($row = mysqli_fetch_array($result)){
mysqli_field_seek($result,0);
while ($field = mysqli_fetch_field($result)){
} do {
?>
          <tr>
            <td style="font-family: Arial; font-size: 12px; text-align: center;"><?php echo $row[10]?></td>
            <td style="font-family: Arial; font-size: 12px; text-align: center;"><?php echo $row[11]?></td>
            <td style="font-family: Arial; font-size: 12px; text-align: center;"><?php echo $row[6]?></td>
            <td style="font-family: Arial; font-size: 12px;"><?php echo $row[5]?></td>
            <td style="font-family: Arial; font-size: 12px;"><?php echo $row[4]?></td>
            <td style="text-align: center; font-family: Arial; font-size: 12px;">
            <?php 
            $fecha_elab        = explode('-',$row[7]);
            $f_corres     = $fecha_elab[2].'/'.$fecha_elab[1].'/'.$fecha_elab[0];
            echo $f_corres;
            ?>
            </td>
            <td style="font-family: Arial; font-size: 12px; text-align: center;"><?php echo $row[12]?></td>
            <td style="font-family: Arial; font-size: 12px; text-align: center;">
            <a href="../impresion_documentos/imprime_ficha_control.php?idcorres=<?php echo $row[0]?>" target="_blank" class="Estilo12" onClick="window.open(this.href, this.target, 'width=750,height=850,scrollbars=YES,top=80,left=300'); return false;"><h5 class="text-warning">FICHA DE CONTROL</h5></a>    
            </td>
          </tr>
<?php 
}
  while ($row = mysqli_fetch_array($result));
} else {
}
?>
        </tbody>
      </table>
      <p>&nbsp;</p>
    <p>&nbsp;</p></td>
  </tr>
</table>
<p>&nbsp; </p>
</body>

</html>