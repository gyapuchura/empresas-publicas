<?php include("../cabf.php");?>
<?php include("../inc.config.php");?>
<?php

date_default_timezone_set('America/La_Paz');
$fecha_ram				= date("Ymd");
$fecha 					= date("Y-m-d");

$idusuario_ss  =  $_SESSION['idusuario_ss'];
$idnombre_ss   =  $_SESSION['idnombre_ss'];
$perfil_ss     =  $_SESSION['perfil_ss'];

$idcorres_ss   =  $_SESSION['idcorres_ss'];

$gestion       = date("Y");

$sql1 = " SELECT idcorres, gestion, correlativo, idusuario, referencia, procedencia, no_control, ";
$sql1.= " fecha_corres, anexo, codigo FROM corres WHERE idcorres='$idcorres_ss' ";
$result1 = mysqli_query($link,$sql1);
$row1 = mysqli_fetch_array($result1);
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>HOJA DE RUTA</title>
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
    <td width="682"><table width="691" border="0" cellspacing="0">
      <tbody>
        <tr>
          <th scope="col">&nbsp;</th>
          <th scope="col"><table width="200" border="0" cellspacing="0">
            <tbody>
              <tr>
                <th scope="col">&nbsp;</th>
                <th scope="col"><table width="200" border="0" cellspacing="0">
                  <tbody>
                    <tr>
                      <th scope="col">&nbsp;</th>
                      <th scope="col">&nbsp;</th>
                      <th scope="col">&nbsp;</th>
                    </tr>
                  </tbody>
                </table></th>
                <th scope="col">&nbsp;</th>
              </tr>
            </tbody>
          </table></th>
          <th scope="col">&nbsp;</th>
        </tr>
      </tbody>
    </table></td>
  </tr>
  <tr>
    <td><table width="691" border="0" cellspacing="0">
      <tbody>
        <tr>
          <th scope="col">&nbsp;</th>
          <th scope="col"><table width="200" border="0" cellspacing="0">
            <tbody>
              <tr>
                <th scope="col">&nbsp;</th>
                <th scope="col"><table width="200" border="0" cellspacing="0">
                  <tbody>
                    <tr>
                      <th scope="col">&nbsp;</th>
                      <th scope="col">&nbsp;</th>
                      <th scope="col">&nbsp;</th>
                    </tr>
                  </tbody>
                </table></th>
                <th scope="col">&nbsp;</th>
              </tr>
            </tbody>
          </table></th>
          <th scope="col">&nbsp;</th>
        </tr>
      </tbody>
    </table></td>
  </tr>
  <tr>
    <td><table width="698" border="0" cellspacing="0">
      <tbody>
        <tr>
          <td width="117" style="font-family: Arial; font-size: 12px;">&nbsp;</td>
          <td colspan="5"><table width="572" border="0" cellspacing="0">
            <tbody>
              <tr>
                <td style="font-family: 'Arial'; font-size: 12px;"><?php echo $row1[4];?></td>
              </tr>
            </tbody>
          </table></td>
          </tr>
        <tr>
          <td>&nbsp;</td>
          <td colspan="5"><table width="572" border="0" cellspacing="0">
            <tbody>
              <tr>
                <td style="font-family: 'Arial'; font-size: 12px;"><?php echo $row1[5];?></td>
              </tr>
            </tbody>
          </table></td>
          </tr>
        <tr>
          <td style="font-size: 12px; font-family: Arial;">&nbsp;</td>
          <td>&nbsp;</td>
          <td style="font-family: Arial; font-size: 12px;">&nbsp;</td>
          <td>&nbsp;</td>
          <td style="font-size: 12px; font-family: Arial;">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td style="font-size: 12px; font-family: Arial;">&nbsp;</td>
          <td width="153"><table width="101" border="0" cellspacing="0">
            <tbody>
              <tr>
                <td width="99" align="center" style="font-family: 'Arial'; font-size: 12px;"><?php echo $row1[6];?></td>
              </tr>
            </tbody>
          </table></td>
          <td width="36" style="font-family: Arial; font-size: 12px;">&nbsp;</td>
          <td width="186"><table width="180" border="0" cellspacing="0">
            <tbody>
              <tr>

<?php
$fecha_i        = explode('-',$row1[7]);
$fecha_hoja         = $fecha_i[2].'-'.$fecha_i[1].'-'.$fecha_i[0];
?>

                <td align="center" style="font-family: 'Arial'; font-size: 12px;"><?php echo $fecha_i[2];?></td>
                <td align="center" style="font-family: 'Arial'; font-size: 12px;"><?php echo $fecha_i[1];?></td>
                <td align="center" style="font-family: 'Arial'; font-size: 12px;"><?php echo $fecha_i[0];?></td>
              </tr>
            </tbody>
          </table></td>
          <td width="87" style="font-size: 12px; font-family: Arial;">&nbsp;</td>
          <td width="107"><table width="100" border="0" cellspacing="0">
            <tbody>
              <tr>
                <td align="center" style="font-family: 'Arial'; font-size: 12px;"><?php echo $row1[8];?></td>
              </tr>
            </tbody>
          </table></td>
        </tr>
      </tbody>
    </table></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
<p>&nbsp; </p>
</body>

</html>