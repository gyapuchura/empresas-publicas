<?php include("../inc.config.php");?>
<?php

date_default_timezone_set('America?La_Paz');
$fecha_ram			= date("Ymd");
$fecha 					= date("Y-m-d");

$idformulario_cd   =  $_GET['idformulario_cd'];

$gestion       = date("Y");

$sql1 ="SELECT idformulario_cd, iddeclaracion_cd, idempresa, correlativo, codigo, cuce, codigo_int ";
$sql1.=", objeto_cd, importe, proveedor, plazo, reglamento_especifico, idusuario, fecha_form, gestion ";
$sql1.=" FROM formulario_cd WHERE idformulario_cd='$idformulario_cd'";
$result1 = mysqli_query($link,$sql1);
$row1 = mysqli_fetch_array($result1);

$sql_e =" SELECT idempresa, razon_social, sigla, cod_presup FROM empresa WHERE idempresa='$row1[2]'";
$result_e = mysqli_query($link,$sql_e);
$row_e = mysqli_fetch_array($result_e);
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>FORMULARIO F-3008</title>
<style>
		/* cuando vayamos a imprimir ... */
		@media print{
			/* indicamos el salto de pagina */
			.saltoDePagina{
				display:block;
				page-break-before:always;
			}
		}
	</style>

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

  </style>
</head>

<body>


<table width="688" border="0" align="center" cellspacing="0">
  <tr>
    <td width="309"><p align="center"><img src="cge_logo.jpg" width="294" height="67"></p>    </td>
    <td width="272"><div align="center"><span class="Estilo1">&nbsp;</span></div></td>
    <td width="101" align="center"><p style="font-size: 12px; font-family: 'Times New Roman';">&nbsp;</p>
      <table width="88" border="1" cellspacing="0">
        <tbody>
          <tr>
            <td width="83" align="center" style="font-size: 12px; font-family: 'Times New Roman';"><strong>SCEP-F-3008</strong></td>
          </tr>
        </tbody>
      </table>
    <p style="font-size: 9px; font-family: 'Times New Roman';">Cód. de la Norma</p></td>
  </tr>
  <tr>
      <td colspan="3" align="center" valign="middle" style="text-align: center; font-family: 'Times New Roman'; font-style: normal; font-weight: normal; font-size: 14px;">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" align="center"><table width="470" border="0" cellspacing="0">
      <tbody>
        <tr>
          <td width="478" align="center"><p>FORMULARIO DE LA DECLARACIÓN JURADA SOBRE INFORMACIÓN DEL PROCESO DE CONTRATACIÓN DIRECTA EN EMPRESAS PÚBLICAS DEL NIVEL CENTRAL DEL ESTADO<strong> </br> </br> N° <?php echo $row1[4];?></strong></p></td>
        </tr>
      </tbody>
    </table></td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3"><strong style="font-size: 12px">I. DATOS BÁSICOS DE LA CONTRATACIÓN DIRECTA</strong></td>
  </tr>
  <tr>
    <td colspan="3"><table width="698" border="1" cellspacing="0">
      <tbody>
        <tr>
          <td width="256" style="text-align: right; font-size: 12px;"><p><strong>Denominación de la Empresa Pública:</strong></p></td>
          <td width="432" style="font-size: 12px"><?php echo $row_e[1];?></td>
          </tr>
        <tr>
          <td style="text-align: right; font-size: 12px;"><p><strong>Código institucional:</strong></p></td>
          <td style="font-size: 12px"><?php echo $row_e[3];?></td>
        </tr>
        <tr>
			<td style="text-align: right; font-size: 12px;"><p><strong>C.U.C.E. :</br> (Para contrataciones menores a Bs. 20.000)</strong></p></td>
          <td style="font-size: 12px"><?php echo $row1[5];?></td>
        </tr>
        <tr>
          <td style="text-align: right; font-size: 12px;"><p><strong>Código interno:</strong></p></td>
          <td style="font-size: 12px"><?php echo $row1[6];?></td>
        </tr>
        <tr>
          <td style="text-align: right; font-size: 12px;"><p><strong>Objeto de Contratación:</strong></p></td>
          <td style="font-size: 12px"><?php echo $row1[7];?></td>
        </tr>
        <tr>
          <td style="text-align: right; font-size: 12px;"><p><strong>Importe Total Contratado:</strong></p></td>
          <td style="font-size: 12px"><?php echo $row1[8];?> Bs. 
          
          <?php $cantidad = $row1[8];
echo isset($cantidad) ? numtoletras($cantidad) : ''; ?>

            <?php 

//------    CONVERTIR NUMEROS A LETRAS         ---------------
//------    M�xima cifra soportada: 18 d�gitos con 2 decimales
//------    999,999,999,999,999,999.99
// NOVECIENTOS NOVENTA Y NUEVE MIL NOVECIENTOS NOVENTA Y NUEVE BILLONES
// NOVECIENTOS NOVENTA Y NUEVE MIL NOVECIENTOS NOVENTA Y NUEVE MILLONES
// NOVECIENTOS NOVENTA Y NUEVE MIL NOVECIENTOS NOVENTA Y NUEVE  99/100
//------    Creada por:                        ---------------
//------             ULTIMINIO RAMOS GAL�N     ---------------
//------            uramos@gmail.com           ---------------
//------    10 de junio de 2009. M�xico, D.F.  ---------------
//------    PHP Version 4.3.1 o mayores (aunque podr�a funcionar en versiones anteriores, tendr�as que probar)
function numtoletras($xcifra)
{
    $xarray = array(0 => "Cero",
        1 => "UN", "DOS", "TRES", "CUATRO", "CINCO", "SEIS", "SIETE", "OCHO", "NUEVE",
        "DIEZ", "ONCE", "DOCE", "TRECE", "CATORCE", "QUINCE", "DIECISEIS", "DIECISIETE", "DIECIOCHO", "DIECINUEVE",
        "VEINTI", 30 => "TREINTA", 40 => "CUARENTA", 50 => "CINCUENTA", 60 => "SESENTA", 70 => "SETENTA", 80 => "OCHENTA", 90 => "NOVENTA",
        100 => "CIENTO", 200 => "DOSCIENTOS", 300 => "TRESCIENTOS", 400 => "CUATROCIENTOS", 500 => "QUINIENTOS", 600 => "SEISCIENTOS", 700 => "SETECIENTOS", 800 => "OCHOCIENTOS", 900 => "NOVECIENTOS"
    );
//
    $xcifra = trim($xcifra);
    $xlength = strlen($xcifra);
    $xpos_punto = strpos($xcifra, ".");
    $xaux_int = $xcifra;
    $xdecimales = "00";
    if (!($xpos_punto === false)) {
        if ($xpos_punto == 0) {
            $xcifra = "0" . $xcifra;
            $xpos_punto = strpos($xcifra, ".");
        }
        $xaux_int = substr($xcifra, 0, $xpos_punto); // obtengo el entero de la cifra a covertir
        $xdecimales = substr($xcifra . "00", $xpos_punto + 1, 2); // obtengo los valores decimales
    }

    $XAUX = str_pad($xaux_int, 18, " ", STR_PAD_LEFT); // ajusto la longitud de la cifra, para que sea divisible por centenas de miles (grupos de 6)
    $xcadena = "";
    for ($xz = 0; $xz < 3; $xz++) {
        $xaux = substr($XAUX, $xz * 6, 6);
        $xi = 0;
        $xlimite = 6; // inicializo el contador de centenas xi y establezco el l�mite a 6 d�gitos en la parte entera
        $xexit = true; // bandera para controlar el ciclo del While
        while ($xexit) {
            if ($xi == $xlimite) { // si ya lleg� al l�mite m�ximo de enteros
                break; // termina el ciclo
            }

            $x3digitos = ($xlimite - $xi) * -1; // comienzo con los tres primeros digitos de la cifra, comenzando por la izquierda
            $xaux = substr($xaux, $x3digitos, abs($x3digitos)); // obtengo la centena (los tres d�gitos)
            for ($xy = 1; $xy < 4; $xy++) { // ciclo para revisar centenas, decenas y unidades, en ese orden
                switch ($xy) {
                    case 1: // checa las centenas
                        if (substr($xaux, 0, 3) < 100) { // si el grupo de tres d�gitos es menor a una centena ( < 99) no hace nada y pasa a revisar las decenas

                        } else {
                            $key = (int) substr($xaux, 0, 3);
                            if (TRUE === array_key_exists($key, $xarray)){  // busco si la centena es n�mero redondo (100, 200, 300, 400, etc..)
                                $xseek = $xarray[$key];
                                $xsub = subfijo($xaux); // devuelve el subfijo correspondiente (Mill�n, Millones, Mil o nada)
                                if (substr($xaux, 0, 3) == 100)
                                    $xcadena = " " . $xcadena . " CIEN " . $xsub;
                                else
                                    $xcadena = " " . $xcadena . " " . $xseek . " " . $xsub;
                                $xy = 3; // la centena fue redonda, entonces termino el ciclo del for y ya no reviso decenas ni unidades
                            }
                            else { // entra aqu� si la centena no fue numero redondo (101, 253, 120, 980, etc.)
                                $key = (int) substr($xaux, 0, 1) * 100;
                                $xseek = $xarray[$key]; // toma el primer caracter de la centena y lo multiplica por cien y lo busca en el arreglo (para que busque 100,200,300, etc)
                                $xcadena = " " . $xcadena . " " . $xseek;
                            } // ENDIF ($xseek)
                        } // ENDIF (substr($xaux, 0, 3) < 100)
                        break;
                    case 2: // checa las decenas (con la misma l�gica que las centenas)
                        if (substr($xaux, 1, 2) < 10) {

                        } else {
                            $key = (int) substr($xaux, 1, 2);
                            if (TRUE === array_key_exists($key, $xarray)) {
                                $xseek = $xarray[$key];
                                $xsub = subfijo($xaux);
                                if (substr($xaux, 1, 2) == 20)
                                    $xcadena = " " . $xcadena . " VEINTE " . $xsub;
                                else
                                    $xcadena = " " . $xcadena . " " . $xseek . " " . $xsub;
                                $xy = 3;
                            }
                            else {
                                $key = (int) substr($xaux, 1, 1) * 10;
                                $xseek = $xarray[$key];
                                if (20 == substr($xaux, 1, 1) * 10)
                                    $xcadena = " " . $xcadena . " " . $xseek;
                                else
                                    $xcadena = " " . $xcadena . " " . $xseek . " Y ";
                            } // ENDIF ($xseek)
                        } // ENDIF (substr($xaux, 1, 2) < 10)
                        break;
                    case 3: // checa las unidades
                        if (substr($xaux, 2, 1) < 1) { // si la unidad es cero, ya no hace nada

                        } else {
                            $key = (int) substr($xaux, 2, 1);
                            $xseek = $xarray[$key]; // obtengo directamente el valor de la unidad (del uno al nueve)
                            $xsub = subfijo($xaux);
                            $xcadena = " " . $xcadena . " " . $xseek . " " . $xsub;
                        } // ENDIF (substr($xaux, 2, 1) < 1)
                        break;
                } // END SWITCH
            } // END FOR
            $xi = $xi + 3;
        } // ENDDO

        if (substr(trim($xcadena), -5, 5) == "ILLON") // si la cadena obtenida termina en MILLON o BILLON, entonces le agrega al final la conjuncion DE
            $xcadena.= " DE";

        if (substr(trim($xcadena), -7, 7) == "ILLONES") // si la cadena obtenida en MILLONES o BILLONES, entoncea le agrega al final la conjuncion DE
            $xcadena.= " DE";

        // ----------- esta l�nea la puedes cambiar de acuerdo a tus necesidades o a tu pa�s -------
        if (trim($xaux) != "") {
            switch ($xz) {
                case 0:
                    if (trim(substr($XAUX, $xz * 6, 6)) == "1")
                        $xcadena.= "UN BILLON ";
                    else
                        $xcadena.= " BILLONES ";
                    break;
                case 1:
                    if (trim(substr($XAUX, $xz * 6, 6)) == "1")
                        $xcadena.= "UN MILLON ";
                    else
                        $xcadena.= " MILLONES ";
                    break;
                case 2:
                    if ($xcifra < 1) {
                        $xcadena = "CERO $xdecimales/100 BOLIVIANOS";
                    }
                    if ($xcifra >= 1 && $xcifra < 2) {
                        $xcadena = "UN  $xdecimales/100 BOLIVIANOS ";
                    }
                    if ($xcifra >= 2) {
                        $xcadena.= " $xdecimales/100 BOLIVIANOS "; //
                    }
                    break;
            } // endswitch ($xz)
        } // ENDIF (trim($xaux) != "")
        // ------------------      en este caso, para M�xico se usa esta leyenda     ----------------
        $xcadena = str_replace("VEINTI ", "VEINTI", $xcadena); // quito el espacio para el VEINTI, para que quede: VEINTICUATRO, VEINTIUN, VEINTIDOS, etc
        $xcadena = str_replace("  ", " ", $xcadena); // quito espacios dobles
        $xcadena = str_replace("UN UN", "UN", $xcadena); // quito la duplicidad
        $xcadena = str_replace("  ", " ", $xcadena); // quito espacios dobles
        $xcadena = str_replace("BILLON DE MILLONES", "BILLON DE", $xcadena); // corrigo la leyenda
        $xcadena = str_replace("BILLONES DE MILLONES", "BILLONES DE", $xcadena); // corrigo la leyenda
        $xcadena = str_replace("DE UN", "UN", $xcadena); // corrigo la leyenda
    } // ENDFOR ($xz)
    return trim($xcadena);
}

// END FUNCTION

function subfijo($xx)
{ // esta funci�n regresa un subfijo para la cifra
    $xx = trim($xx);
    $xstrlen = strlen($xx);
    if ($xstrlen == 1 || $xstrlen == 2 || $xstrlen == 3)
        $xsub = "";
    //
    if ($xstrlen == 4 || $xstrlen == 5 || $xstrlen == 6)
        $xsub = "MIL";
    //
    return $xsub;
}

// END FUNCTION
?>



          </td>
        </tr>
        <tr>
          <td style="text-align: right; font-size: 12px;"><p><strong>Proveedor:</strong></p></td>
          <td style="font-size: 12px"><?php echo $row1[9];?></td>
        </tr>
        <tr>
          <td style="text-align: right; font-size: 12px;"><p><strong>Plazo:</strong></p></td>
          <td style="font-size: 12px"><?php echo $row1[10];?></td>
        </tr>
        <tr>
          <td style="text-align: right; font-size: 12px;"><p><strong>Reglamento Específico utilizado y documento de aprobación:</strong></p></td>
          <td style="font-size: 12px"><?php echo $row1[11];?></td>
          </tr>
      </tbody>
    </table></td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3"><p><strong style="font-size: 12px">II. ACTIVIDADES PREVIAS </strong></p></td>
  </tr>
  <tr>
    <td colspan="3"><table width="701" border="1" cellspacing="0">
      <tbody>
        <tr>
          <td width="32" height="26" bgcolor="#D5D5D5" style="text-align: center; font-size: 12px;"><strong>Nro.</strong></td>
          <td width="294" bgcolor="#D5D5D5" style="text-align: center; font-size: 12px;"><p><strong>DESCRIPCIÓN</strong></p>            </td>
          <td width="30" bgcolor="#D5D5D5" style="text-align: center; font-size: 12px;"><strong>SI</strong></td>
          <td width="33" bgcolor="#D5D5D5" style="text-align: center; font-size: 12px;"><strong>NO</strong></td>
          <td width="63" bgcolor="#D5D5D5" style="text-align: center; font-size: 10px;">N° DOCUMENTO</td>
          <td width="63" bgcolor="#D5D5D5" style="text-align: center; font-size: 10px;">FECHA DOCUMENTO</td>
          <td width="75" bgcolor="#D5D5D5" style="text-align: center; font-size: 10px;">JUSTIFICACIÓN NORMATIVA</td>
          <td width="77" bgcolor="#D5D5D5" style="text-align: center; font-size: 10px;">ACLARACIONES</td>
        </tr>
<?php   
    $sql4 =" SELECT registro_cd.idregistro_cd, punto_cd.indice, punto_cd.punto_cd, registro_cd.idcumplimiento FROM registro_cd, punto_cd ";
    $sql4.=" WHERE registro_cd.idpunto_cd=punto_cd.idpunto_cd AND registro_cd.idformulario_cd='$idformulario_cd' AND registro_cd.idetapa_cd='1' ";
    $result4 = mysqli_query($link,$sql4);
    if ($row4 = mysqli_fetch_array($result4)){
    mysqli_field_seek($result4,0);
    while ($field4 = mysqli_fetch_field($result4)){
    } do { 
?>
        <tr>     
          <td style="text-align: center; font-size: 12px;"><?php echo $row4[1];?></td>
          <td style="font-size: 12px"><?php echo $row4[2];?></td>
          <td style="font-size: 12px; text-align: center;"><?php 
          if ($row4[3] == '1') {
           echo "X";
          } else {            
          }         
          ?></td>
          <td>
            <span style="text-align: center; font-size: 12px;"><?php 
          if ($row4[3] == '2') {
           echo "X";
          } else {            
          }         
          ?></span></td>
          <td colspan="4">&nbsp;</td>
        </tr>

        <?php
 $numero=1;
        $sql5 =" SELECT subregistro_cd.idsubregistro_cd, subpunto_cd.subindice, subpunto_cd.subpunto_cd, subregistro_cd.documento_cd, subregistro_cd.fecha_doc_cd, subregistro_cd.justificacion, subregistro_cd.aclaracion ";
        $sql5.=" FROM subregistro_cd, subpunto_cd WHERE subregistro_cd.idsubpunto_cd=subpunto_cd.idsubpunto_cd AND subregistro_cd.idregistro_cd ='$row4[0]' "; 
        $result5 = mysqli_query($link,$sql5);
        if ($row5 = mysqli_fetch_array($result5)){
        mysqli_field_seek($result5,0);
        while ($field5 = mysqli_fetch_field($result5)){
        } do {          
?>
        <tr>
          <td style="font-size: 12px; text-align: center;"><?php echo $row5[1];?></td>
          <td colspan="3" style="font-size: 12px"><?php echo $row5[2];?></td>
          <td style="font-size: 10px"><?php echo $row5[3];?></td>
          <td style="font-size: 10px"><?php echo $row5[4];?></td>
          <td style="font-size: 10px"><?php echo $row5[5];?></td>
          <td style="font-size: 10px"><?php echo $row5[6];?></td>
        </tr>
<?php
 $numero=$numero+1;
        }
        while ($row5 = mysqli_fetch_array($result5));
      } else {
      }
?>

        <?php
        $numero=$numero+1;
    }
   while ($row4 = mysqli_fetch_array($result4));
 } else {
 }
?>
       
      </tbody>
    </table></td>
  </tr>
  <tr class="saltoDePagina" >
    <td colspan="3">&nbsp;</td>
  </tr>

  <tr>
    <td colspan="3"><p style="font-size: 12px"><strong>III. PROCESO DE CONTRATACIÓN</strong></p></td>
  </tr>
  <tr>
    <td colspan="3"><table width="701" border="1" cellspacing="0">
      <tbody>
        <tr>
          <td width="32" height="26" bgcolor="#D5D5D5" style="text-align: center; font-size: 12px;"><strong>Nro.</strong></td>
          <td width="294" bgcolor="#D5D5D5" style="text-align: center; font-size: 12px;"><p><strong>DESCRIPCIÓN</strong></p></td>
          <td width="30" bgcolor="#D5D5D5" style="text-align: center; font-size: 12px;"><strong>SI</strong></td>
          <td width="33" bgcolor="#D5D5D5" style="text-align: center; font-size: 12px;"><strong>NO</strong></td>
          <td width="63" bgcolor="#D5D5D5" style="text-align: center; font-size: 10px;">N° DOCUMENTO</td>
          <td width="63" bgcolor="#D5D5D5" style="text-align: center; font-size: 10px;">FECHA DOCUMENTO</td>
          <td width="75" bgcolor="#D5D5D5" style="text-align: center; font-size: 10px;">JUSTIFICACIÓN NORMATIVA</td>
          <td width="77" bgcolor="#D5D5D5" style="text-align: center; font-size: 10px;">ACLARACIONES</td>
        </tr>
        <?php   
    $sql4 =" SELECT registro_cd.idregistro_cd, punto_cd.indice, punto_cd.punto_cd, registro_cd.idcumplimiento FROM registro_cd, punto_cd ";
    $sql4.=" WHERE registro_cd.idpunto_cd=punto_cd.idpunto_cd AND registro_cd.idformulario_cd='$idformulario_cd' AND registro_cd.idetapa_cd='2' ";
    $result4 = mysqli_query($link,$sql4);
    if ($row4 = mysqli_fetch_array($result4)){
    mysqli_field_seek($result4,0);
    while ($field4 = mysqli_fetch_field($result4)){
    } do { 
?>
        <tr>
          <td style="text-align: center; font-size: 12px;"><?php echo $row4[1];?></td>
          <td style="font-size: 12px"><?php echo $row4[2];?></td>
          <td style="font-size: 12px; text-align: center;"><?php 
          if ($row4[3] == '1') {
           echo "X";
          } else {            
          }         
          ?></td>
          <td style="text-align: center"><?php 
          if ($row4[3] == '2') {
           echo "X";
          } else {            
          }         
          ?></td>
          <td colspan="4">&nbsp;</td>
        </tr>
        <?php
 $numero=1;
        $sql5 =" SELECT subregistro_cd.idsubregistro_cd, subpunto_cd.subindice, subpunto_cd.subpunto_cd, subregistro_cd.documento_cd, subregistro_cd.fecha_doc_cd, subregistro_cd.justificacion, subregistro_cd.aclaracion ";
        $sql5.=" FROM subregistro_cd, subpunto_cd WHERE subregistro_cd.idsubpunto_cd=subpunto_cd.idsubpunto_cd AND subregistro_cd.idregistro_cd ='$row4[0]' "; 
        $result5 = mysqli_query($link,$sql5);
        if ($row5 = mysqli_fetch_array($result5)){
        mysqli_field_seek($result5,0);
        while ($field5 = mysqli_fetch_field($result5)){
        } do {          
?>
        <tr>
          <td style="font-size: 12px; text-align: center;"><?php echo $row5[1];?></td>
          <td colspan="3" style="font-size: 12px"><?php echo $row5[2];?></td>
          <td style="font-size: 10px"><?php echo $row5[3];?></td>
          <td style="font-size: 10px"><?php echo $row5[4];?></td>
          <td style="font-size: 10px"><?php echo $row5[5];?></td>
          <td style="font-size: 10px"><?php echo $row5[6];?></td>
        </tr>
        <?php
 $numero=$numero+1;
        }
        while ($row5 = mysqli_fetch_array($result5));
      } else {
      }
?>
        <?php
        $numero=$numero+1;
    }
   while ($row4 = mysqli_fetch_array($result4));
 } else {

 }
?>

      </tbody>
    </table>
  
    </td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3"><table width="701" border="0">
      <tbody>
        <tr>
          <td width="36" valign="top"><strong style="font-size: 12px; text-align: right;">Nota:</strong></td>
          <td width="649"><p><strong><span style="font-size: 12px">El contenido de la Información a registrar en el presente formulario debe considerar la secuencia y cronología de las actividades realizadas.<br>
            El formulario debe adjuntar los sustentos respectivos en medio digital (magnético) bajo formato .Pdf</span></strong>.</p></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><em style="font-size: 12px">Declaramos que la información registrada en el presente documento constituye Declaración Jurada y fue determinada en cuanto a la normativa aplicable para la contratación, siendo la misma fidedigna y que la documentación descrita se encuentra en archivos de la Empresa Pública, encontrándose a disposición para fines de control externo posterior. </em></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>

          <?php
          $fecha_i = explode('-',$row1[13]);
          $fecha_form = $fecha_i[2].'-'.$fecha_i[1].'-'.$fecha_i[0];
          ?>
          <td><p style="font-size: 12px; text-align: center;">La Paz <?php echo $fecha_i[2];?> de <?php echo $fecha_i[1];?> de <?php echo $fecha_i[0];?></p></td>
        </tr>
      </tbody>
    </table></td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3"><table width="697" border="0">
      <tbody>
        <tr>
          <td><p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><p style="font-size: 12px; text-align: center;"><em><strong>Responsable del Proceso de Contratación<br>
            EMPRESA PÚBLICA</strong></em></p></td>
          <td><p style="text-align: center; font-size: 12px;"><em><strong>Titular del Área Administrativa Financiera<br>
            EMPRESA PÚBLICA</strong></em></p></td>
        </tr>
      </tbody>
    </table></td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
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

    $_REQUEST['data'] = 'http://direccionweb/imprime_formulario_cd.php?idcorres='.$row1[0];
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