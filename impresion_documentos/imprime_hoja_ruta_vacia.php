<?php include("../cabf.php");?>
<?php include("../inc.config.php");?>
<?php

date_default_timezone_set('UTC');
$fecha_ram				= date("Ymd");
$fecha 					= date("Y-m-d");

$idusuario_ss  =  $_SESSION['idusuario_ss'];
$idnombre_ss   =  $_SESSION['idnombre_ss'];
$perfil_ss     =  $_SESSION['perfil_ss'];

$idcorres_ss   =  $_SESSION['idcorres_ss'];
$idusuariod_ss =  $_SESSION['idusuariod_ss'];

$gestion       = date("Y");

$sql1 = " SELECT idcorres, gestion, correlativo, idusuario, referencia, procedencia, no_control, ";
$sql1.= " fecha_corres, anexo FROM corres WHERE idcorres='$idcorres_ss' ";
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
    <td width="309"><p align="center"><img src="cge_logo.jpg" width="294" height="67"></p>    </td>
    <td width="272"><div align="center"><span class="Estilo1">&nbsp;</span></div></td>
    <td width="101" align="center"><p style="font-size: 12px; font-family: 'Times New Roman';"><strong>F-001</strong></p>
      <table width="88" border="1" cellspacing="0">
        <tbody>
          <tr>
            <td width="83" align="center" style="font-size: 12px; font-family: 'Times New Roman';"><strong>RI/IC-097</strong></td>
          </tr>
        </tbody>
      </table>
    <p style="font-size: 9px; font-family: 'Times New Roman';">Cód. de la Norma</p></td>
  </tr>
  <tr>
      <td colspan="3" align="center" valign="middle" style="text-align: center; font-family: 'Times New Roman'; font-style: normal; font-weight: normal; font-size: 14px;">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" align="center"><table width="349" border="1" cellspacing="0">
      <tbody>
        <tr>
          <td width="343" align="center"><strong>HOJA DE RUTA</strong></td>
        </tr>
      </tbody>
    </table></td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3"><table width="698" border="0" cellspacing="0">
      <tbody>
        <tr>
          <td width="110" style="font-family: Arial; font-size: 12px;">REFERENCIA:</td>
          <td colspan="5"><table width="572" border="1" cellspacing="0">
            <tbody>
              <tr>
                <td>&nbsp;</td>
              </tr>
            </tbody>
          </table></td>
          </tr>
        <tr>
          <td><span style="font-family: Arial; font-size: 12px;">PROCEDENCIA</span>:</td>
          <td colspan="5"><table width="572" border="1" cellspacing="0">
            <tbody>
              <tr>
                <td>&nbsp;</td>
              </tr>
            </tbody>
          </table></td>
          </tr>
        <tr>
          <td style="font-size: 12px; font-family: Arial;">N° DE CONTROL:</td>
          <td width="122"><table width="110" border="1" cellspacing="0">
            <tbody>
              <tr>
                <td width="124">&nbsp;</td>
              </tr>
            </tbody>
          </table></td>
          <td width="43" style="font-family: Arial; font-size: 12px;"> FECHA:</td>
          <td width="203"><table width="180" border="1" cellspacing="0">
            <tbody>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
            </tbody>
          </table></td>
          <td width="95" style="font-size: 12px; font-family: Arial;">ANEXO HOJAS:</td>
          <td width="113"><table width="100" border="1" cellspacing="0">
            <tbody>
              <tr>
                <td>&nbsp;</td>
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
    <td colspan="3"><table width="685" border="1" cellspacing="0">
      <tbody>
        <tr>
          <td width="175"><table width="175" border="0" cellspacing="0">
            <tbody>
              <tr>
                <td style="font-family: Arial; font-size: 10px;"><strong>FECHA DE RECEPCIÓN:</strong></td>
              </tr>
              <tr>
                <td><table width="200" border="1" cellspacing="0">
                  <tbody>
                    <tr>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                  </tbody>
                </table></td>
              </tr>
              <tr>
                <td style="font-family: Arial; font-size: 10px;"><strong>FIRMA:</strong></td>
              </tr>
              <tr>
                <td><table width="200" border="1" cellspacing="0">
                  <tbody>
                    <tr>
                      <td><p>&nbsp;</p>
                        <p>&nbsp;</p></td>
                    </tr>
                  </tbody>
                </table></td>
              </tr>
            </tbody>
          </table></td>
          <td width="495"><table width="473" border="0" cellspacing="0">
            <tbody>
              <tr>
                <td width="80" style="font-family: Arial; font-size: 10px;"><strong>DESTINATARIO:                  </strong></td>
                <td width="265"><table width="261" border="1" cellspacing="0">
                  <tbody>
                    <tr>
                      <td width="246">&nbsp;</td>
                    </tr>
                  </tbody>
                </table></td>
                <td width="77"><strong style="font-family: Arial; font-size: 10px;">INSTRUCCIÓN:</strong></td>
                <td width="43"><table width="41" border="1" cellspacing="0">
                  <tbody>
                    <tr>
                      <td>&nbsp;</td>
                    </tr>
                  </tbody>
                </table></td>
              </tr>
              <tr>
                <td style="font-family: Arial; font-size: 10px;"><strong>COMENTARIOS:</strong></td>
                <td colspan="3">&nbsp;</td>
              </tr>
              <tr>
                <td colspan="4"><table width="469" border="0" cellspacing="0">
                  <tbody>
                    <tr>
                      <td style="font-family: Arial; font-size: 10px;">Firma:</td>
                      <td style="font-size: 10px; font-family: Arial;">Sello:</td>
                      <td style="font-family: Arial; font-size: 10px;">Fecha:</td>
                      </tr>
                    <tr>
                      <td><table width="180" border="1" cellspacing="0">
                        <tbody>
                          <tr>
                            <td>&nbsp;</td>
                          </tr>
                        </tbody>
                      </table></td>
                      <td><table width="180" border="1" cellspacing="0">
                        <tbody>
                          <tr>
                            <td>&nbsp;</td>
                          </tr>
                        </tbody>
                      </table></td>
                      <td><table width="90" border="1" cellspacing="0">
                        <tbody>
                          <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                          </tr>
                        </tbody>
                      </table></td>
                      </tr>
                    </tbody>
                  </table></td>
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
    <td colspan="3">&nbsp;</td>
  </tr>
</table>
<p>&nbsp; </p>
</body>

</html>