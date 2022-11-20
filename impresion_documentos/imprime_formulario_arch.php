<?php include("../cabf.php");?>
<?php include("../inc.config.php");?>
<?php
date_default_timezone_set('America/La_Paz');
$fecha_ram		 = date("Ymd");
$fecha 				 = date("Y-m-d");
$gestion       = date("Y");

$idusuario_ss = $_SESSION['idusuario_ss'];
$idnombre_ss  = $_SESSION['idnombre_ss'];
$perfil_ss    = $_SESSION['perfil_ss'];
$idarea_ss    = $_SESSION['idarea_ss'];

$idform_archivo = $_GET['idform_archivo'];
$idusuario_arch = $_GET['idusuario_arch'];

$codigo_form    = $_GET['codigo_form'];

$idempresa_form   = $_GET['idempresa_form'];
$subfondo         = "SCEP";

$sqle =" SELECT idempresa, razon_social, sigla FROM empresa WHERE idempresa='$idempresa_form'";
$resulte = mysqli_query($link,$sqle);
$rowe = mysqli_fetch_array($resulte);
?>
            <?php   
            $sql4 = " SELECT nombres.nombres, nombres.paterno, nombres.materno, cargo.cargo ";
            $sql4.= " FROM usuarios, nombres, cargo WHERE usuarios.idnombre=nombres.idnombre ";
            $sql4.= " AND usuarios.idcargo=cargo.idcargo ";
            $sql4.= " AND usuarios.idusuario='$idusuario_arch' ";
            $result4 = mysqli_query($link,$sql4);
            $row4 = mysqli_fetch_array($result4);
            ?>  
            </td>
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
    font-family: "Times New Roman";
    font-size: 18px;
    font-style: normal;
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
<table width="1075" border="0">
  <tbody>
    <tr>
      <td width="295"><span style="text-align: left"><img src="../cge_logo.jpg" width="294" height="67"></span></td>
      <td width="489">&nbsp;</td>
      <td width="290">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3"><p style="text-align: center; font-size: 18px;"><strong>FORMULARIO  INVENTARIO DE DOCUMENTOS </strong></p></td>
    </tr>
    <tr>
      <td colspan="3"><p style="text-align: center; font-size: 18px;"><strong><?php echo $codigo_form;?></strong></p></td>
    </tr>
	      <tr>
      <td colspan="3">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3"><table width="1200" border="0" cellspacing="0">
        <tbody>
          <tr>
            <td width="286" style="font-size: 12px"><strong>FONDO DOCUMENTAL:</strong></td>
            <td width="471" style="font-size: 12px">CONTRALORIA GENERAL DEL ESTADO</td>
            <td width="254" style="font-size: 12px">N° DE TRANSFERENCIA:</td>
            <td width="161" style="font-size: 12px">&nbsp;</td>
          </tr>
          <tr>
            <td style="font-size: 12px"><strong>UNIDAD ORGANIZACIONAL:</strong></td>
            <td style="font-size: 12px">SUBCONTRALORIA DE EMPRESAS PUBLICAS</td>
            <td style="font-size: 12px">FECHA DE TRANSFERENCIA:</td>
            <td style="font-size: 12px">&nbsp;</td>
          </tr>
          <tr>
            <td style="font-size: 12px"><strong>SIGLA DE LA UNIDAD: </strong></td>
            <td colspan="3" style="font-size: 12px">SCEP</td>
            </tr>
          <tr>
            
            <td style="font-size: 12px"><strong>DIRECCIÓN:</strong></td>
            <td colspan="2" style="font-size: 12px">C/COLON ESQ/ INDABURO S/N</td>
            </tr>
          <tr>
            <td style="font-size: 12px"><strong>TELÉFONO:</strong></td>
            <td style="font-size: 12px">21700144</td>
            <td style="font-size: 12px">INTERNO:</td>
            <td style="font-size: 12px">&nbsp;</td>
          </tr>
          <tr>
            <td style="font-size: 12px"><strong>RESPONSABLE DE TRANSFERENCIA :</strong></td>
            <td colspan="3" style="font-size: 12px"><?php echo $row4[0];?> <?php echo $row4[1];?> <?php echo $row4[2];?> - <?php echo $row4[3];?></td>
            </tr>
          <tr>
            <td style="font-size: 12px"><strong>CORREO INSTITUCIONAL:</strong></td>
            <td colspan="3" style="font-size: 12px">&nbsp;</td>
            </tr>
        </tbody>
      </table></td>
    </tr>
    <tr>
      <td colspan="3">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3"><table width="1052" border="1" cellspacing="0">
        <tbody>
          <tr>
            <td width="41" bgcolor="#C3E7DD" style="font-size: 10px; text-align: center;"><strong>Nº DE ORDEN</strong></td>
			  <td width="55" bgcolor="#C3E7DD" style="font-size: 10px; text-align: center;"><strong>SUBFONDO</br>/SECCION</strong></td>
            <td width="72" bgcolor="#C3E7DD" style="font-size: 10px; text-align: center;"><strong>SERIE DOCUMENTAL</strong></td>
            <td width="67" bgcolor="#C3E7DD" style="font-size: 10px; text-align: center;"><strong>CODIGO DEL DOCUMENTO</strong></td>
            <td width="118" bgcolor="#C3E7DD" style="font-size: 10px; text-align: center;"><strong>ENTIDAD</strong></td>
		<td width="92" bgcolor="#C3E7DD" style="font-size: 10px; text-align: center;"><strong>CONTENIDO </br>O NOMBRE DEL </br>DOCUMENTO</strong></td>
            <td width="53" bgcolor="#C3E7DD" style="font-size: 10px; text-align: center;"><strong>DPTO.</strong></td>
            <td width="50" bgcolor="#C3E7DD" style="font-size: 10px; text-align: center;"><strong>Nº DE CAJA</strong></td>
            <td width="17" bgcolor="#C3E7DD" style="font-size: 12px; text-align: center;"><strong>D</strong></td>
            <td width="17" bgcolor="#C3E7DD" style="font-size: 12px; text-align: center;"><strong>M</strong></td>
            <td width="17" bgcolor="#C3E7DD" style="font-size: 12px; text-align: center;"><strong>A</strong></td>
            <td width="17" bgcolor="#C3E7DD" style="font-size: 12px; text-align: center;"><strong>D</strong></td>
            <td width="17" bgcolor="#C3E7DD" style="font-size: 12px; text-align: center;"><strong>M</strong></td>
            <td width="17" bgcolor="#C3E7DD" style="font-size: 12px; text-align: center;"><strong>A</strong></td>
            <td width="31" bgcolor="#C3E7DD" style="font-size: 10px; text-align: center;"><strong>Nº TOMO</strong></td>
            <td width="31" bgcolor="#C3E7DD" style="font-size: 10px; text-align: center;"><strong>FOJAS</strong></td>
            <td width="51" bgcolor="#C3E7DD" style="font-size: 10px; text-align: center;"><strong>CUBIERTA</strong></td>
            <td width="53" bgcolor="#C3E7DD" style="font-size: 10px; text-align: center;"><strong>CANTIDAD</strong></td>
            <td width="70" bgcolor="#C3E7DD" style="font-size: 10px; text-align: center;"><strong>DESCRIPCION</strong></td>
            <td width="101" bgcolor="#C3E7DD" style="font-size: 10px; text-align: center;"><strong>OBSERVACIONES</strong></td>
          </tr>

          <?php
$contador=1;
$sql =" SELECT item_archivo.iditem_archivo, item_archivo.idform_archivo, item_archivo.idempresa, serie_documental.serie_documental, item_archivo.codigo ";
$sql.=" , departamento.departamento, caja.caja, item_archivo.fecha_despacho, item_archivo.fecha_hr, tomo.tomo, item_archivo.contenido, ";
$sql.=" item_archivo.no_fojas, cubierta.cubierta, item_archivo.cantidad, item_archivo.descripcion, observ_archivo.observ_archivo, item_archivo.idusuario_arch, item_archivo.idcorres ";
$sql.=" FROM item_archivo, serie_documental, cubierta, departamento, caja, tomo, observ_archivo WHERE item_archivo.idserie_documental=serie_documental.idserie_documental ";
$sql.=" AND item_archivo.idcubierta=cubierta.idcubierta AND item_archivo.idcaja=caja.idcaja AND item_archivo.idtomo=tomo.idtomo AND item_archivo.idobserv_archivo=observ_archivo.idobserv_archivo ";
$sql.=" AND item_archivo.iddepartamento=departamento.iddepartamento AND item_archivo.idform_archivo='$idform_archivo' ";
$result = mysqli_query($link,$sql);
if ($row = mysqli_fetch_array($result)){
mysqli_field_seek($result,0);
while ($field = mysqli_fetch_field($result)){
} do {
?>  
          <tr>
            <td style="font-size: 10px; text-align: center;"><?php echo $contador;?></td>
            <td style="font-size: 10px; text-align: center;"><?php echo $subfondo;?></td>
            <td style="font-size: 10px; text-align: center;"><?php echo $row[3];?></td>
            <td style="font-size: 10px; text-align: center;"><?php echo $row[4];?></td>
            <td style="font-size: 10px; text-align: center;"><?php echo $rowe[2];?></td>
            <td style="font-size: 10px"><?php echo $row[10];?></td>
            <td style="font-size: 10px; text-align: center;"><?php echo $row[5];?></td>
            <td style="font-size: 10px; text-align: center;"><?php echo $row[6];?></td>
            <td style="font-size: 10px"><?php 
            $fecha_elab1 = explode('-',$row[7]);
            $f_desp    = $fecha_elab1[2].'/'.$fecha_elab1[1].'/'.$fecha_elab1[0];
            echo $fecha_elab1[2]; ?></td>
            <td style="font-size: 10px"><?php echo $fecha_elab1[1];?></td>
            <td style="font-size: 10px"><?php echo $fecha_elab1[0];?></td>
            <td style="font-size: 10px"><?php 
            $fecha_elab2 = explode('-',$row[8]);
            $f_hr    = $fecha_elab2[2].'/'.$fecha_elab2[1].'/'.$fecha_elab2[0];
            echo $fecha_elab2[2];?></td>
            <td style="font-size: 10px"><?php echo $fecha_elab2[1];?></td>
            <td style="font-size: 10px"><?php echo $fecha_elab2[0];?></td>
            <td style="text-align: center; font-size: 10px;"><?php echo $row[9];?></td>
            <td style="text-align: center; font-size: 10px;"><?php echo $row[11];?></td>
            <td style="text-align: center; font-size: 10px;"><?php echo $row[12];?></td>
            <td style="text-align: center; font-size: 10px;"><?php echo $row[13];?></td>
            <td style="text-align: left; font-size: 10px;"><?php echo $row[14];?></td>
            <td style="font-size: 10px; text-align: center;"><?php echo $row[15];?></td>
          </tr>

          <?php 
        $contador=$contador+1;  
        }
        while ($row = mysqli_fetch_array($result));
        
      } else {
      }
        ?>

        </tbody>
      </table></td>
    </tr>
  </tbody>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>

</html>