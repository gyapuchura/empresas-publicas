<?php include("../inc.config.php");?>
<?php

date_default_timezone_set('America/La_Paz');
$fecha_ram			= date("Ymd");
$fecha 					= date("Y-m-d");

$idcorres       = $_GET['idcorres'];

$gestion        = date("Y");

$sql1 = " SELECT corres.idcorres, corres.gestion, corres.correlativo, corres.idusuario, corres.referencia, corres.procedencia, corres.no_control, ";
$sql1.= " corres.fecha_corres, corres.anexo, corres.codigo, tipo_hojaruta.tipo_hojaruta FROM corres, tipo_hojaruta WHERE corres.idtipo_hojaruta=tipo_hojaruta.idtipo_hojaruta AND corres.idcorres='$idcorres' ";
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
    <td width="309"><p align="center"><img src="../cge_logo.jpg" width="294" height="67"></p>    </td>
    <td width="272"><div align="center"><span class="Estilo1">&nbsp;</span></div></td>
    <td width="101" align="center"><p style="font-size: 12px; font-family: 'Times New Roman';"><strong>F-001</strong></p>
      <table width="88" border="1" cellspacing="0">
        <tbody>
          <tr>
            <td width="83" align="center" style="font-size: 12px; font-family: 'Times New Roman';"><strong>RI/IC-0197</strong></td>
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
          <td width="343" align="center"><p><strong>FICHA DE CONTROL</strong></p>
            <p><strong>HOJA DE RUTA N° <?php echo $row1[9];?></strong></p></td>
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
    <td colspan="3"><strong>Tipo de Tramite: </strong><?php echo $row1[10];?></td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3"><strong>HISTORIAL DE ESTADOS</strong></td>
  </tr>
  <tr>
    <td colspan="3"><table width="696" border="1">
      <tbody>
        <tr>
          <td width="26" style="font-family: Arial; font-size: 12px; text-align: center;"><strong>N°</strong></td>
          <td width="84" style="font-family: Arial; font-size: 12px;"><strong>Fecha</strong></td>
          <td width="212" style="font-family: Arial; font-size: 12px;"><strong>Estado</strong></td>
          <td width="212" style="font-family: Arial; font-size: 12px;"><strong>Resumen</strong></td>
          <td width="128" style="font-family: Arial; font-size: 12px; text-align: center;"><strong>Documento Asociado</strong></td>
        </tr>
        <?php
$contador=1;
$sql_b =" SELECT bitacora_estado.idbitacora_estado, bitacora_estado.idcorres, bitacora_estado.correlativo, estado.estado, bitacora_estado.resumen, ";
$sql_b.=" bitacora_estado.codigo_doc, bitacora_estado.archivo_id, bitacora_estado.hash, bitacora_estado.fecha FROM bitacora_estado, estado WHERE idcorres='$idcorres' ";
$sql_b.=" AND bitacora_estado.idestado=estado.idestado ORDER BY bitacora_estado.idbitacora_estado ";
$result_b = mysqli_query($link,$sql_b);
if ($row_b = mysqli_fetch_array($result_b)){
mysqli_field_seek($result_b,0);
while ($field_b = mysqli_fetch_field($result_b)){
} do {
?>          
        <tr>
          <td style="text-align: center"><?php echo $contador;?></td>
          <td style="text-align: center; font-family: Arial; font-size: 12px;">
          <?php 
            $fecha_elab        = explode('-',$row_b[8]);
            $f_elaboracion     = $fecha_elab[2].'/'.$fecha_elab[1].'/'.$fecha_elab[0];
            echo $f_elaboracion;
            ?>
            </td>
          <td style="font-family: Arial; font-size: 12px;"><?php echo $row_b[3];?></td>
          <td style="font-family: Arial; font-size: 12px;"><?php echo $row_b[4];?></td>
          <td style="text-align: center"><a href="obtiene_archivo_cge.php?id_archivo=<?php echo $row_b[6];?>&hash=<?php echo $row_b[7];?>" target="_blank" class="btn-link" style="font-size: 12px; font-family: Arial;" onClick="window.open(this.href, this.target, 'width=800,height=1000,scrollbars=YES, left=300'); return false;"><?php  if ($row_b[6] != "") {
  echo "OBTENER DOCUMENTO";
} else {
  
}
?></a></td>
        </tr>
  <?php 
        $contador=$contador+1;  
        }
        while ($row_b = mysqli_fetch_array($result_b));
      } else {

      }
        ?>

      </tbody>
    </table></td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3"><strong>DERIVACIONES</strong></td>
  </tr>
  <tr>
    <td colspan="3"><table width="694" border="1">
      <tbody>
        <tr>
          <td width="20" style="font-family: Arial; font-size: 12px;"><strong>N°</strong></td>
          <td width="174" style="font-family: Arial; font-size: 12px; text-align: center;"><strong>Remitente</strong></td>
          <td width="163" style="font-size: 12px; font-family: Arial; text-align: center;"><strong>Destinatario</strong></td>
          <td width="90" style="font-family: Arial; font-size: 12px; text-align: center;"><strong>Fecha Derivacion</strong></td>
          <td width="73" style="font-family: Arial; font-size: 12px; text-align: center;"><strong>Fecha Recepcion</strong></td>
          <td width="73" style="font-family: Arial; font-size: 12px; text-align: center;"><strong>Instrucción</strong></td>
          <td width="134" style="font-size: 12px; font-family: Arial; text-align: center;"><strong>Comentario</strong></td>
        </tr>
        <?php
$conter=1;
$sql =" SELECT deriva_corres.idderiva_corres, corres.correlativo, deriva_corres.idusuarioo, deriva_corres.idusuariod, corres.referencia,  ";
$sql.=" deriva_corres.comentario, deriva_corres.fecha_deriva, deriva_corres.fecha_recibe, deriva_corres.idinstruccion, instruccion.instruccion FROM deriva_corres, corres, instruccion ";
$sql.=" WHERE deriva_corres.idinstruccion=instruccion.idinstruccion AND corres.idcorres=deriva_corres.idcorres ";
$sql.=" AND deriva_corres.idcorres='$idcorres' ";
$sql.=" ORDER BY deriva_corres.idderiva_corres  ";
$result = mysqli_query($link,$sql);
if ($row = mysqli_fetch_array($result)){
mysqli_field_seek($result,0);
while ($field = mysqli_fetch_field($result)){
} do {
?>

        <tr>
          <td style="font-family: Arial; font-size: 12px; text-align: center;"><?php echo $conter;?></td>
          <td style="text-align: center; font-family: Arial; font-size: 12px;"><?php 
$sqlor =" SELECT nombres.nombres, nombres.paterno, nombres.materno, nombres.titulo, cargo.cargo  ";
$sqlor.=" FROM nombres, usuarios, cargo WHERE usuarios.idnombre=nombres.idnombre AND ";
$sqlor.=" usuarios.idcargo=cargo.idcargo AND usuarios.idusuario='$row[2]' ";
$resultor = mysqli_query($link,$sqlor);
$rowor = mysqli_fetch_array($resultor);
?>
            <span style="text-align: center"></span>
<?php echo $rowor[3];?> <?php echo $rowor[0];?> <?php echo $rowor[1];?> <?php echo $rowor[2];?> </br> <?php echo $rowor[4];?></td>
          <td style="text-align: center; font-family: Arial; font-size: 12px;">&nbsp;<?php 
$sqld =" SELECT nombres.nombres, nombres.paterno, nombres.materno, nombres.titulo, cargo.cargo FROM nombres, usuarios, cargo  ";
$sqld.=" WHERE usuarios.idnombre=nombres.idnombre AND usuarios.idcargo=cargo.idcargo AND usuarios.idusuario='$row[3]' ";
$resultd = mysqli_query($link,$sqld);
$rowd = mysqli_fetch_array($resultd);
?>
<?php echo $rowd[3];?> <?php echo $rowd[0];?> <?php echo $rowd[1];?> <?php echo $rowd[2];?> </br> <span style="text-align: center"></span><?php echo $rowd[4];?></td>
          <td style="font-family: Arial; font-size: 12px; text-align: center;">          
          <?php 
            $fecha_elab1        = explode('-',$row[6]);
            $f_deriva     = $fecha_elab1[2].'/'.$fecha_elab1[1].'/'.$fecha_elab1[0];
            echo $f_deriva;
          ?>
          </td>
          <td style="font-family: Arial; font-size: 12px; text-align: center;">
          <?php 
          if ($row[7]!="1111-11-11") {            
            $fecha_elab2        = explode('-',$row[7]);
            $f_recibe     = $fecha_elab2[2].'/'.$fecha_elab2[1].'/'.$fecha_elab2[0];
            echo $f_recibe;
          } else {
            echo "SIN RECIBIR";
          }
          ?>
          </td>
          <td style="font-family: Arial; font-size: 12px;"><?php echo $row[9];?></td>
          <td style="font-family: Arial; font-size: 12px;"><?php echo $row[5];?></td>
        </tr>
        <?php
	$conter=$conter+1;
   }
  while ($row = mysqli_fetch_array($result));
} else {
}
?>

      </tbody>
    </table></td>
  </tr>
  <tr>
    <td colspan="3">
    
    <table width="696" border="0">
        <tbody>
          <tr>
            <td width="224" style="text-align: center">&nbsp;</td>
            <td width="260" style="text-align: center">&nbsp;</td>
            <td width="190" style="text-align: center"><p>&nbsp;</p>
            <p style="font-family: Arial; font-size: 10px;">
              <?php
/*
 * Algoritmo para codificacion QR
 *
 * SE emplea el include con el scripti phpqrcode.php
 *

 */
    //set it to writable location, a place for temp generated PNG files
    $PNG_TEMP_DIR = dirname(__FILE__).DIRECTORY_SEPARATOR.'temp'.DIRECTORY_SEPARATOR;
    //html PNG location prefix
    $PNG_WEB_DIR = 'temp/';

    include "phpqrcode.php";


    //capturamos el valor de "data"

    $separador='|';
    $tamano='M';

    $_REQUEST['data'] = 'https://'.$_SERVER['HTTP_HOST'].'/empresas-publicas/public_ficha_control.php?idcorres='.$row1[0];
    $_REQUEST['size'] = 2 ;
    $_REQUEST['level'] = $tamano ;

    //ofcourse we need rights to create temp dir
    if (!file_exists($PNG_TEMP_DIR))
        mkdir($PNG_TEMP_DIR);


    $filename = $PNG_TEMP_DIR.'test.png';

    //processing form input
    //remember to sanitize user input in real-life solution !!!
    $errorCorrectionLevel = 'L';
    if (isset($_REQUEST['level']) && in_array($_REQUEST['level'], array('L','M','Q','H')))
        $errorCorrectionLevel = $_REQUEST['level'];

    $matrixPointSize = 4;
    if (isset($_REQUEST['size']))
        $matrixPointSize = min(max((int)$_REQUEST['size'], 1), 10);


    if (isset($_REQUEST['data'])) {

        //it's very important!
        if (trim($_REQUEST['data']) == '')
            die('data cannot be empty! <a href="?">back</a>');

        // user data
        $filename = $PNG_TEMP_DIR.'test'.md5($_REQUEST['data'].'|'.$errorCorrectionLevel.'|'.$matrixPointSize).'.png';
        QRcode::png($_REQUEST['data'], $filename, $errorCorrectionLevel, $matrixPointSize, 2);

    } else {

        //default data
        echo 'You can provide data in GET parameter: <a href="?data=like_that">like that</a><hr/>
        <div align="right">';
        QRcode::png('PHP QR Code :)', $filename, $errorCorrectionLevel, $matrixPointSize, 2);

    }

    //display generated file


echo '<img src="'.$PNG_WEB_DIR.basename($filename).'" />';

?>
            </p>
            <p style="font-family: Arial; font-size: 10px;">Codigo de Seguimiento Digital </p></td>
          </tr>
        </tbody>
      </table>

    
    </td>
  </tr>
  <tr>
    <td colspan="3">
</td>
  </tr>
</table>
<p>&nbsp; </p>
</body>

</html>