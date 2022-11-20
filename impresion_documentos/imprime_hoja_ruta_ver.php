<?php include("../cabf.php");?>
<?php include("../inc.config.php");?>
<?php

date_default_timezone_set('America/La_Paz');
$fecha_ram			= date("Ymd");
$fecha 					= date("Y-m-d");

$idusuario_ss  =  $_SESSION['idusuario_ss'];
$idnombre_ss   =  $_SESSION['idnombre_ss'];
$perfil_ss     =  $_SESSION['perfil_ss'];

$idcorres      =  $_GET['idcorres'];

$gestion       =  date("Y");

$sql1 = " SELECT idcorres, gestion, correlativo, idusuario, referencia, procedencia, no_control, ";
$sql1.= " fecha_corres, anexo, codigo, comentario_conclusion, comentario_archivo, idestado FROM corres WHERE idcorres='$idcorres' ";
$result1 = mysqli_query($link,$sql1);
$row1    = mysqli_fetch_array($result1);
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
    <td width="309"><p align="center"><img src="../cge_logo.jpg" width="294" height="67"></p>    </td>
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
          <td width="343" align="center"><strong>HOJA DE RUTA N° <?php echo $row1[9];?></strong></td>
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
                <td style="font-family: 'Times New Roman'; font-size: 12px;"><?php echo $row1[4];?></td>
              </tr>
            </tbody>
          </table></td>
          </tr>
        <tr>
          <td><span style="font-family: Arial; font-size: 12px;">PROCEDENCIA</span>:</td>
          <td colspan="5"><table width="572" border="1" cellspacing="0">
            <tbody>
              <tr>
                <td style="font-family: 'Times New Roman'; font-size: 12px;"><?php echo $row1[5];?></td>
              </tr>
            </tbody>
          </table></td>
          </tr>
        <tr>
          <td style="font-size: 12px; font-family: Arial;">N° DE CONTROL:</td>
          <td width="122"><table width="110" border="1" cellspacing="0">
            <tbody>
              <tr>
                <td width="124" align="center" style="font-family: 'Times New Roman'; font-size: 12px;"><?php echo $row1[6];?></td>
              </tr>
            </tbody>
          </table></td>
          <td width="43" style="font-family: Arial; font-size: 12px;"> FECHA:</td>
          <td width="203"><table width="180" border="1" cellspacing="0">
            <tbody>
              <tr>

<?php
$fecha_i        = explode('-',$row1[7]);
$fecha_hoja         = $fecha_i[2].'-'.$fecha_i[1].'-'.$fecha_i[0];
?>

                <td align="center" style="font-family: 'Times New Roman'; font-size: 12px;"><?php echo $fecha_i[2];?></td>
                <td align="center" style="font-family: 'Times New Roman'; font-size: 12px;"><?php echo $fecha_i[1];?></td>
                <td align="center" style="font-family: 'Times New Roman'; font-size: 12px;"><?php echo $fecha_i[0];?></td>
              </tr>
            </tbody>
          </table></td>
          <td width="95" style="font-size: 12px; font-family: Arial;">ANEXO HOJAS:</td>
          <td width="113"><table width="100" border="1" cellspacing="0">
            <tbody>
              <tr>
                <td align="center" style="font-family: 'Times New Roman'; font-size: 12px;"><?php echo $row1[8];?></td>
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
    <td colspan="3">
<?php
$sql =" SELECT deriva_corres.idderiva_corres, corres.correlativo, deriva_corres.idusuarioo, deriva_corres.idusuariod, corres.referencia,  ";
$sql.=" deriva_corres.comentario, deriva_corres.fecha_deriva, deriva_corres.fecha_recibe, deriva_corres.idinstruccion FROM deriva_corres, corres, instruccion ";
$sql.=" WHERE deriva_corres.idinstruccion=instruccion.idinstruccion AND corres.idcorres=deriva_corres.idcorres ";
$sql.=" AND deriva_corres.idcorres='$idcorres' ";
$sql.=" ORDER BY deriva_corres.idderiva_corres  ";
$result = mysqli_query($link,$sql);
if ($row = mysqli_fetch_array($result)){
mysqli_field_seek($result,0);
while ($field = mysqli_fetch_field($result)){
} do {
?>   
    <table width="685" border="1" cellspacing="0">
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
                      <td align="center" valign="top" style="font-family: Arial; font-size: 8px;">Hora</td>
                      <?php

  $fecha_r     = explode('-',$row[7]);
$fecha_recep = $fecha_r[2].'-'.$fecha_r[1].'-'.$fecha_r[0];

?>
                      <td align="center" style="font-family: 'Times New Roman'; font-size: 12px;">
                      <?php
                      if ($fecha_r[2]=="11") {
                    echo "&nbsp;&nbsp;";
                      } else {
                        echo $fecha_r[2];
                      }?>
                      </td>
                      <td align="center" style="font-family: 'Times New Roman'; font-size: 12px;">
                      <?php
                      if ($fecha_r[1]=="11") {
                        echo "&nbsp;&nbsp;";
                      } else {
                        echo $fecha_r[1];
                      }?>
                      </td>
                      <td align="center" style="font-family: 'Times New Roman'; font-size: 12px;">
                      <?php
                      if ($fecha_r[0]=="1111") {
                        echo "&nbsp;&nbsp;&nbsp;&nbsp;";
                      } else {
                        echo $fecha_r[0];
                      }?>
                      </td>
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
                      <td width="246" align="left" style="font-family: 'Times New Roman'; font-size: 12px;">                      
                     <?php 
$sqld =" SELECT nombres.nombres, nombres.paterno, nombres.materno, nombres.titulo, cargo.cargo FROM nombres, usuarios, cargo  ";
$sqld.=" WHERE usuarios.idnombre=nombres.idnombre AND usuarios.idcargo=cargo.idcargo AND usuarios.idusuario='$row[3]' ";
$resultd = mysqli_query($link,$sqld);
$rowd = mysqli_fetch_array($resultd);
?>
<?php echo $rowd[3];?> <?php echo $rowd[0];?> <?php echo $rowd[1];?> <?php echo $rowd[2];?> </br> <?php echo $rowd[4];?>
                      
                      </td>
                    </tr>
                  </tbody>
                </table></td>
                <td width="77"><strong style="font-family: Arial; font-size: 10px;">INSTRUCCIÓN:</strong></td>
                <td width="43"><table width="41" border="1" cellspacing="0">
                  <tbody>
                    <tr>
                      <td align="center" style="font-family: 'Times New Roman'; font-size: 12px;"><?php echo $row[8];?></td>
                    </tr>
                  </tbody>
                </table></td>
              </tr>
              <tr>
                <td style="font-family: Arial; font-size: 10px;"><strong>COMENTARIOS:</strong></td>
                <td colspan="3" align="left" style="font-family: 'Times New Roman'; font-size: 12px;"><?php echo $row[5]?></td>
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
                          <td width="246" align="center" style="font-family: 'Times New Roman'; font-size: 10px;">  
                            
                            <p>&nbsp;</p>
                            
                            <p>&nbsp;</p>
                              <?php 
$sqlor =" SELECT nombres.nombres, nombres.paterno, nombres.materno, nombres.titulo, cargo.cargo  ";
$sqlor.=" FROM nombres, usuarios, cargo WHERE usuarios.idnombre=nombres.idnombre AND ";
$sqlor.=" usuarios.idcargo=cargo.idcargo AND usuarios.idusuario='$row[2]' ";
$resultor = mysqli_query($link,$sqlor);
$rowor = mysqli_fetch_array($resultor);
?>
<?php echo $rowor[3];?> <?php echo $rowor[0];?> <?php echo $rowor[1];?> <?php echo $rowor[2];?> </br> <?php echo $rowor[4];?>
                                                            
                              </td>
                          </tr>
                        </tbody>
                      </table></td>
                      <td><table width="180" border="1" cellspacing="0">
                        <tbody>
                          <tr>
                            <td><p>&nbsp;</p>
                              <p>&nbsp;</p></td>
                          </tr>
                        </tbody>
                      </table></td>
                      <td><table width="90" border="1" cellspacing="0">
                        <tbody>
                          <tr>
                          <?php
$fecha_d     = explode('-',$row[6]);
$fecha_deriv = $fecha_d[2].'-'.$fecha_d[1].'-'.$fecha_d[0];
?>
                            <td align="center" style="font-family: 'Times New Roman'; font-size: 12px;"><?php echo $fecha_d[2];?></td>
                            <td align="center" style="font-family: 'Times New Roman'; font-size: 12px;"><?php echo $fecha_d[1];?></td>
                            <td align="center" style="font-family: 'Times New Roman'; font-size: 12px;"><?php echo $fecha_d[0];?></td>
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
    <td colspan="3"><?php
   }
  while ($row = mysqli_fetch_array($result));
} else {
}
?></td>
  </tr>
  <tr>
    <td colspan="3" style="font-size: 12px"><?php 
    if ($row1[12] == '3') {
      echo "COMENTARIO DE CONCLUSIÓN: </br>".$row1[10];
    } else {    
    }
    ?></td>
  </tr>
  <tr>
    <td colspan="3" style="font-size: 12px"><?php 
    if ($row1[12] == '4') {
      echo "COMENTARIO DE CONCLUSIÓN: </br> ".$row1[10]."</br></br>";
      echo "ESPECIFICACIÓN DE ARCHIVO: </br>".$row1[11];
    } else {    
    }
    ?></td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
</table>
<p>&nbsp; </p>
</body>

</html>