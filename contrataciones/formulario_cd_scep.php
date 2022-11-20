<?php include("../cabf.php");?>
<?php include("../inc.config.php");?>
<?php

date_default_timezone_set('America/La_Paz');

$fecha_ram	= date("Ymd");
$fecha 		= date("Y-m-d");
$gestion    = date("Y");

$idusuario_ss  =  $_SESSION['idusuario_ss'];
$idnombre_ss   =  $_SESSION['idnombre_ss'];
$perfil_ss     =  $_SESSION['perfil_ss'];

$idempresa_ss        =  $_SESSION['idempresa_ss'];
$idformulario_cd_ss  =  $_SESSION['idformulario_cd_ss'];
$codigo_form_ss      =  $_SESSION['codigo_form_ss'];

$sql1 =" SELECT idformulario_cd, iddeclaracion_cd, idempresa, correlativo, codigo, cuce, codigo_int, ";
$sql1.=" objeto_cd, importe, proveedor, plazo, reglamento_especifico, idusuario, fecha_form, gestion, estado_eval ";
$sql1.=" FROM formulario_cd WHERE idformulario_cd='$idformulario_cd_ss' ";
$result1 = mysqli_query($link,$sql1);
$row1    = mysqli_fetch_array($result1);

if ($row1[15] == 'EN_EVALUACION') {
    header("Location:mostrar_eval_cd_previa.php");
} 

$sql_e  = " SELECT idempresa, razon_social, cod_presup, sigla FROM empresa WHERE idempresa='$idempresa_ss' ";
$result_e = mysqli_query($link,$sql_e);
$row_e    = mysqli_fetch_array($result_e);
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<title>SUBCONTRALORIA EMPRESAS PUBLICAS</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="" />
<meta name="author" content="http://webthemez.com" />
<!-- css -->
<link href="../css/bootstrap.min.css" rel="stylesheet" />
<link href="../css/fancybox/jquery.fancybox.css" rel="stylesheet">
<link href="../css/flexslider.css" rel="stylesheet" />
<link href="../css/style.css" rel="stylesheet" />
	<link rel="stylesheet" href="../css/dataTables.bootstrap.min.css">

</head>
<body>

<div id="wrapper">
<div class="topbar">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
         <p class="pull-left hidden-xs">CONTRALORIA GENERAL DEL ESTADO</p>
        <p class="pull-right"><i class="fa fa-user"></i>
<?php

$sqlus =" SELECT nombres, paterno, materno FROM nombres WHERE idnombre='$idnombre_ss'";
$resultus = mysqli_query($link,$sqlus);
$rowus = mysqli_fetch_array($resultus);
?>
        <?php echo $rowus[0];?> <?php echo $rowus[1];?> <?php echo $rowus[2];?></p>
      </div>
    </div>
  </div>
</div>

<!-- start header -->
	<header>
        <div class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                  <a class="navbar-brand" href="../intranet.php"><img src="../img/logo.png" alt="logo"/></a>
                </div>
                <?php include("../menu_ce.php");?>
            </div>
        </div>
	</header>
	<!-- end header -->

<section id="inner-headline">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h2 class="pageTitle">EVALUACIÓN <?php echo $codigo_form_ss;?></h2>
			</div>
		</div>
	</div>
</section>
<div class="container contenido">
</br>

<div class="row"> 
<div class="col-md-12"></div>
</div>

<div class="row"> 
<div class="col-md-12"><h3>I. DATOS BÁSICOS DE LA CONTRATACIÓN DIRECTA</h3></div>
</div>
<div class="box-area">
<div class="row">
  <div class="col-md-2"><h4>EMPRESA:</h4></div>
  <div class="col-md-3"><h4 class="text-muted"><?php echo $row_e[1];?></h4></div>  
  <div class="col-md-2"><h4>CÓDIGO INSTITUCIONAL:</h4></div>
  <div class="col-md-1"><h4 class="text-muted"><?php echo $row_e[2];?></h4></div>  
  <div class="col-md-1"><h4>CUCE:</h4></div>
  <div class="col-md-3"><h4 class="text-muted"><?php echo $row1[5];?></h4></div>  
</div>

<div class="row">
  <div class="col-md-2"><h4>CÓDIGO INTERNO:</h4></div>
  <div class="col-md-3"><h4 class="text-muted"><?php echo $row1[6];?></h4></div>  
  <div class="col-md-2"><h4>OBJETO DE CONTRATACIÓN:</h4></div>
  <div class="col-md-5"><h4 class="text-muted"><?php echo $row1[7];?></h4></div>  
</div>

<div class="row">
  <div class="col-md-2"><h4>IMPORTE TOTAL CONTRATADO EN Bs.:</h4></div>
  <div class="col-md-3"><h4 class="text-muted">
  <?php 
  $importe_num = number_format($row1[8], 2, '.', '.');
  echo $importe_num." Bs.";
  ?>
</br>
</br>
" <?php $cantidad = $row1[8];
    echo isset($cantidad) ? numtoletras($cantidad) : ''; ?> "
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



</h4></div>  
  <div class="col-md-3"><h4>PROVEEDOR CONTRATADO:</h4></div>
  <div class="col-md-4"><h4 class="text-muted"><?php echo $row1[9];?></h4></div>   
</div>

<div class="row">
<div class="col-md-1"><h4>PLAZO:</h4></div>
  <div class="col-md-4"><h4 class="text-muted"><?php echo $row1[10];?></h4></div>  
  <div class="col-md-3"><h4>REGLAMENTO ESPECÍFICO UTILIZADO Y DOCUMENTO DE APROBACIÓN:</h4></div>
  <div class="col-md-4"><h4 class="text-muted"><?php echo $row1[11];?></h4></div>  
</div>
</div>

<div class="row"> 
<div class="col-md-3"></div> 
<div class="col-md-6"><h2 align="center">EVALUACIÓN</h2></div>
<div class="col-md-3"></div> 
</div>

<div class="row"> 
<div class="col-md-3"></div> 
<div class="col-md-6"><h3 align="center">ANÁLISIS</h></div>
<div class="col-md-3"></div> 
</div>

<div class="box-area">
<div class="row">
<div class="col-md-12"><h3>1.- EL OBJETO CONTRATADO ESTA DENTRO DE LAS ATRIBUCIONES DE LA EMPRESA PÚBLICA:</h3></div>
</div>

<div class="row">
<div class="col-md-12">

<select name="idatribucion_cd"  id="idatribucion_cd" class="form-control">
<option value="">ELEGIR</option>
 <?php
/*
Realizamos una consulta ala tabla autor
para mostrar los datos en un combo
*/
$sql1 = " SELECT idatribucion_cd, atribucion_cd FROM atribucion_cd ";
$result1 = mysqli_query($link,$sql1);
if ($row1 = mysqli_fetch_array($result1)){
mysqli_field_seek($result1,0);
while ($field1 = mysqli_fetch_field($result1)){
} do {
echo "<option value=". $row1[0]. ">". $row1[1]. "</option>";
} while ($row1 = mysqli_fetch_array($result1));
} else {
echo "No se encontraron resultados!";
}
?>
</select>

</div>
</div>
</div>

<div class="box-area" id="evaluacion_cd"></div>
<div class="row">
<div class="col-md-4"></div>
<div class="col-md-4"></div>
</div>

<div class="row">
<div class="col-md-4">
<a href="formularios_asignados.php"><h4 class="text-primary">VOLVER A FORMULARIOS ASIGNADOS</h4></a>
</div>
<div class="col-md-4"></div>
<div class="col-md-4">
</div>
</div>

 </div>
 </div>
	<footer>
	<?php include("../footer.php");?>
	</footer>
</div>
<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>
	<script src="../js/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/jquery.dataTables.min.js"></script>
	<script src="../js/script.js"></script>
	<script src="../js/dataTables.bootstrap.min.js"></script>
    <script language="javascript" src="../js/jquery-3.1.1.min.js"></script>

  <script language="javascript">
  $(document).ready(function(){
    $("#idatribucion_cd").change(function () {
        $("#idatribucion_cd option:selected").each(function () {
          atribucion_cd=$(this).val();
          $.post("intro_evaluacion_cd.php", {atribucion_cd:atribucion_cd}, function(data){
          $("#evaluacion_cd").html(data);
          });
      });
    })
  });
  </script>
  
</body>
</html>