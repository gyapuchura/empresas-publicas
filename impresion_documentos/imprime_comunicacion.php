<?php include("../cabf.php");?>
<?php include("../inc.config.php");?>
<?php

date_default_timezone_set('America/La_Paz');
$fecha_ram				= date("Ymd");
$fecha 					= date("Y-m-d");

$idusuario_ss  =  $_SESSION['idusuario_ss'];
$idnombre_ss   =  $_SESSION['idnombre_ss'];
$perfil_ss     =  $_SESSION['perfil_ss'];
$idarea_ss     =  $_SESSION['idarea_ss'];

$idcomunicacion_ss = $_SESSION['idcomunicacion_ss'];

$gestion       = date("Y");


$sql1 = " SELECT idcomunicacion, cite, origen, destino, fecha, referencia, descripcion ";
$sql1.= " FROM comunicacion WHERE idcomunicacion='$idcomunicacion_ss' ";
$result1 = mysqli_query($link,$sql1);
$row1 = mysqli_fetch_array($result1);

?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>SUBCONTRALORIA EMPRESAS PUBLICAS</title>
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

<table width="600" border="0" align="center" cellspacing="0">
  <tr>
    <td width="290"><p align="center"><img src="cge_logo.jpg" width="294" height="67"></p>    </td>
    <td width="102"><div align="center"><span class="Estilo1">&nbsp;</span></div></td>
    <td width="273">&nbsp;</td>
  </tr>
    <tr>
    <td colspan="3"><div align="center" class="Estilo18">&nbsp;</div></td>
  </tr>
  <tr>
      <td colspan="3" style="font-size: 14px; font-family: 'Times New Roman'; text-align: center;"><strong>COMUNICACION INTERNA (CI)</strong></td>
  </tr>
  <tr>
    <td colspan="3"><div align="center" class="Estilo18">_____________________________________________________________________________________________________________</div></td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><table width="271" border="0">
      <tbody>
        <tr>
          <td width="48"><strong class="Estilo18">N°:</strong></td>
          <td width="213">
            <table width="200" border="1" cellspacing="0">
              <tbody>
                <tr>
                  <td align="center"><?php echo $row1[1];?></td>
                </tr>
              </tbody>
            </table></td>
        </tr>
        <tr>
          <td><strong class="Estilo18">FECHA:</strong></td>
          <td><table width="200" border="1" cellspacing="0">
            <tbody>
            <tr>
<?php
$fecha_i        = explode('-',$row1[4]);
$fecha_com         = $fecha_i[2].'-'.$fecha_i[1].'-'.$fecha_i[0];
?>

                <td align="center" style="font-family: 'Times New Roman'; font-size: 14px;"><?php echo $fecha_i[2];?></td>
                <td align="center" style="font-family: 'Times New Roman'; font-size: 14px;"><?php echo $fecha_i[1];?></td>
                <td align="center" style="font-family: 'Times New Roman'; font-size: 14px;"><?php echo $fecha_i[0];?></td>
              </tr>
              </tbody>
          </table></td>
          </tr>
      </tbody>
    </table></td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3"><table width="669" border="1" cellspacing="0" class="Estilo1" color="#FFFFFF">
      <tbody>
        <tr>
          <td><table width="663" border="0">
            <tbody>
            <tr>
                <td width="52" class="Estilo18" style="text-align: right">De:</td>
                <td width="601"><?php
                
                $sql2 = " SELECT nombres.nombres, nombres.paterno, nombres.materno, cargo.cargo, nombres.titulo, nombres.iniciales FROM usuarios, nombres, cargo ";
                $sql2.= " WHERE usuarios.idnombre=nombres.idnombre AND usuarios.idcargo=cargo.idcargo AND usuarios.idusuario='$row1[2]' AND usuarios.perfil='ADMINISTRADOR' ";
                $result2 = mysqli_query($link,$sql2);
                $row2 = mysqli_fetch_array($result2);
                ?>                  <?php echo $row2[4];?> <?php echo $row2[0];?> <?php echo $row2[1];?> <?php echo $row2[2];?></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td><p class="times" style="font-size: 12px"><strong><?php echo $row2[3];?></strong></p></td>
              </tr>
              <tr>
                <td class="Estilo18">&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td class="Estilo18" style="text-align: right">A:</td>
                <td>
                  <?php
                
                $sql3 = " SELECT nombres.nombres, nombres.paterno, nombres.materno, cargo.cargo, nombres.titulo FROM usuarios, nombres, cargo ";
                $sql3.= " WHERE usuarios.idnombre=nombres.idnombre AND usuarios.idcargo=cargo.idcargo AND usuarios.idusuario='$row1[3]' AND usuarios.perfil='ADMINISTRADOR' ";
                $result3 = mysqli_query($link,$sql3);
                $row3 = mysqli_fetch_array($result3);
                ?>
                  
                  <?php echo $row3[4];?>  <?php echo $row3[0];?> <?php echo $row3[1];?> <?php echo $row3[2];?></td>
              </tr>
              <tr>
                <td style="text-align: right">&nbsp;</td>
                <td><strong class="times"><?php echo $row3[3];?></strong></td>
              </tr>
              <tr>
                <td class="Estilo18" style="text-align: right">&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td class="Estilo18" style="text-align: right">Ref:</td>
                <td><strong><?php echo $row1[5];?></strong></td>
              </tr>
            </tbody>
          </table></td>
        </tr>
      </tbody>
    </table></td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3"> De mi consideración:</td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" style="font-family: 'Times New Roman'; font-size: 14px;"><?php echo $row1[6];?></td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3">Con este motivo saludo a usted atentamente.</td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" style="font-family: 'Times New Roman'; font-size: 14px;"><?php echo $row2[4];?> <?php echo $row2[0];?> <?php echo $row2[1];?> <?php echo $row2[2];?></td>
  </tr>
  <tr>
    <td colspan="3"><strong style="font-size: 12px; font-family: 'Times New Roman';"><?php echo $row2[3];?></strong></td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
  <td colspan="3" style="font-family: 'Times New Roman'; font-size: 8px;"><?php echo $row2[5];?></td>
  </tr>
  <tr>
  <td colspan="3" style="font-family: 'Times New Roman'; font-size: 8px;">c.c: Archivo</td>
  </tr>
</table>
<p>&nbsp; </p>
</body>

</html>