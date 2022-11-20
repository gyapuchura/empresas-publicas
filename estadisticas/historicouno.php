<?php include("../cabf.php");?>
<?php include("../inc.config.php");?>
<?php
date_default_timezone_set('America/La_Paz');
$fecha_ram = date("Ymd");
$fecha 		 = date("Y-m-d");

$idcorres = $_GET['idcorres'];

$sql3 = "SELECT corres.fecha_corres, corres.referencia, estado.estado, corres.codigo FROM corres, estado ";
$sql3.= " WHERE corres.idestado=estado.idestado AND corres.idcorres='$idcorres' ";
$result3 = mysqli_query($link,$sql3);
$row3 = mysqli_fetch_array($result3);

$fecha_corres = $row3[0];
$referencia = $row3[1];
$estado = $row3[2];
$codigo = $row3[3];

?>
<!DOCTYPE HTML>
<html>
	<head>

		<meta charset="utf-8">
		<title>HISTOGRAMA SGBS</title>

		<script type="text/javascript" src="jquery.min.js"></script>
		<script type="text/javascript">
$(function () {

    $('#container').highcharts({

        chart: {
            type: 'columnrange',
            inverted: true
        },

        title: {
            text: 'HISTORIAL DEL TRAMITE Nro. <?php echo $codigo;?> '
        },

        subtitle: {
            text: 'SISTEMA DE HOJA DE RUTA CGE'
        },

        xAxis: {
            categories: [


<?php

$numero = 0;

$sql = " SELECT idderiva_corres, idcorres, idusuarioo, idusuariod, fecha_deriva, comentario ";
$sql.= " FROM deriva_corres WHERE derivada='SI' AND recibida='SI' AND idcorres='$idcorres' ORDER BY idderiva_corres ";
$result = mysqli_query($link,$sql);

$total = mysqli_num_rows($result);

 if ($row = mysqli_fetch_array($result)){

mysqli_field_seek($result,0);
while ($field = mysqli_fetch_field($result)){
} do {
	?>
	 <?php
$idusuarioo = $row[2];
$idusuariod = $row[3];

$sql1 = " SELECT nombres.nombres, nombres.paterno, nombres.materno, cargo.cargo ";
$sql1.= "  FROM usuarios, nombres, cargo WHERE usuarios.idnombre=nombres.idnombre ";
$sql1.= " AND usuarios.idcargo=cargo.idcargo ";
$sql1.= " AND usuarios.idusuario='$idusuarioo' ";

$result1 = mysqli_query($link,$sql1);
$row1 = mysqli_fetch_array($result1);


$sql2 = " SELECT nombres.nombres, nombres.paterno, nombres.materno, cargo.cargo ";
$sql2.= " FROM usuarios, nombres, cargo WHERE usuarios.idnombre=nombres.idnombre ";
$sql2.= " AND usuarios.idcargo=cargo.idcargo ";
$sql2.= " AND usuarios.idusuario='$idusuariod' ";

$result2 = mysqli_query($link,$sql2);
$row2 = mysqli_fetch_array($result2);

$fecha_derivacion = $row[4];

?>
             ' <?php echo $row1[0]; ?>
              <?php echo $row1[1]; ?>
              <?php echo $row1[2]; ?> <?php echo '<br />'; ?>
              <?php echo $row1[3]; ?>'




                           <?php
$numero++;

if ($numero == $total) {

echo ",";

}
else {
echo ",";

}


} while ($row = mysqli_fetch_array($result));


} else {


echo "";
/*
Si no se encontraron resultados

fecha.corres,detalle.corres,nombreunidad.unidad,nombredireccion.direccion,monto.corres,evento.corres,cite.corres,preventivo.corres,nombre.profesionales,observaciones.corres ";
$sql .=" where citedgaa = '$cite' AND idunidad.corres=idunidad.unidad AND iddireccion.corres=ididreccion.direccion AND idprofesional.corres=idprofesional.profesionales";
se muestra el siguiente mensaje
*/
}
?>


<?php

$numero = 0;

$sql = " SELECT idderiva_corres, idcorres, idusuarioo, idusuariod, fecha_deriva, comentario ";
$sql.= " FROM deriva_corres WHERE derivada='NO' AND recibida='SI' AND idcorres='$idcorres' ORDER BY idderiva_corres ";
$result = mysqli_query($link,$sql);

$total = mysqli_num_rows($result);

 if ($row = mysqli_fetch_array($result)){

mysqli_field_seek($result,0);
while ($field = mysqli_fetch_field($result)){
} do {
  
	?>
	 <?php
$idusuarioo = $row[2];
$idusuariod = $row[3];

$sql1 = " SELECT nombres.nombres, nombres.paterno, nombres.materno, cargo.cargo ";
$sql1.= "  FROM usuarios, nombres, cargo WHERE usuarios.idnombre=nombres.idnombre ";
$sql1.= " AND usuarios.idcargo=cargo.idcargo ";
$sql1.= " AND usuarios.idusuario='$idusuarioo' ";

$result1 = mysqli_query($link,$sql1);
$row1 = mysqli_fetch_array($result1);


$sql2 = " SELECT nombres.nombres, nombres.paterno, nombres.materno, cargo.cargo ";
$sql2.= "  FROM usuarios, nombres, cargo WHERE usuarios.idnombre=nombres.idnombre ";
$sql2.= " AND usuarios.idcargo=cargo.idcargo ";
$sql2.= " AND usuarios.idusuario='$idusuariod' ";

$result2 = mysqli_query($link,$sql2);
$row2 = mysqli_fetch_array($result2);

$fecha_derivacion = $row[4];

?>
             ' <?php echo $row1[0]; ?>
              <?php echo $row1[1]; ?>
              <?php echo $row1[2]; ?> <?php echo '<br />'; ?>
              <?php echo $row1[3]; ?>'




                           <?php
$numero++;

if ($numero == $total) {

echo ",";

}
else {
echo "";

}


} while ($row = mysqli_fetch_array($result));


} else {


echo "";
/*
Si no se encontraron resultados

fecha.corres,detalle.corres,nombreunidad.unidad,nombredireccion.direccion,monto.corres,evento.corres,cite.corres,preventivo.corres,nombre.profesionales,observaciones.corres ";
$sql .=" where citedgaa = '$cite' AND idunidad.corres=idunidad.unidad AND iddireccion.corres=ididreccion.direccion AND idprofesional.corres=idprofesional.profesionales";
se muestra el siguiente mensaje
*/
}
?>



<?php

$numero = 0;

$sql = " SELECT idderiva_corres, idcorres, idusuarioo, idusuariod, fecha_deriva, comentario ";
$sql.= " FROM deriva_corres WHERE derivada='SI' AND recibida='NO' AND idcorres='$idcorres' ORDER BY idderiva_corres ";
$result = mysqli_query($link,$sql);

$total = mysqli_num_rows($result);

 if ($row = mysqli_fetch_array($result)){

mysqli_field_seek($result,0);
while ($field = mysqli_fetch_field($result)){
} do {
	?>
	 <?php
$idusuarioo = $row[2];
$idusuariod = $row[3];

$sql1 = " SELECT nombres.nombres, nombres.paterno, nombres.materno, cargo.cargo ";
$sql1.= "  FROM usuarios, nombres, cargo WHERE usuarios.idnombre=nombres.idnombre ";
$sql1.= " AND usuarios.idcargo=cargo.idcargo ";
$sql1.= " AND usuarios.idusuario='$idusuarioo' ";

$result1 = mysqli_query($link,$sql1);
$row1 = mysqli_fetch_array($result1);


$sql2 = " SELECT nombres.nombres, nombres.paterno, nombres.materno, cargo.cargo ";
$sql2.= "  FROM usuarios, nombres, cargo WHERE usuarios.idnombre=nombres.idnombre ";
$sql2.= " AND usuarios.idcargo=cargo.idcargo ";
$sql2.= " AND usuarios.idusuario='$idusuariod' ";

$result2 = mysqli_query($link,$sql2);
$row2 = mysqli_fetch_array($result2);

$fecha_derivacion = $row[4];

?>
             ' <?php echo $row1[0]; ?>
              <?php echo $row1[1]; ?>
              <?php echo $row1[2]; ?> <?php echo '<br />'; ?>
              <?php echo $row1[3]; ?>'



                           <?php
$numero++;

if ($numero == $total) {

echo ",";

}
else {
echo ",";

}


} while ($row = mysqli_fetch_array($result));


} else {


echo "";
/*
Si no se encontraron resultados

fecha.corres,detalle.corres,nombreunidad.unidad,nombredireccion.direccion,monto.corres,evento.corres,cite.corres,preventivo.corres,nombre.profesionales,observaciones.corres ";
$sql .=" where citedgaa = '$cite' AND idunidad.corres=idunidad.unidad AND iddireccion.corres=ididreccion.direccion AND idprofesional.corres=idprofesional.profesionales";
se muestra el siguiente mensaje
*/
}
?>




<?php

$numero = 0;

$sql = " SELECT idderiva_corres, idcorres, idusuarioo, idusuariod, fecha_deriva, comentario ";
$sql.= " FROM deriva_corres WHERE derivada='SI' AND recibida='NO' AND idcorres='$idcorres' ORDER BY idderiva_corres ";
$result = mysqli_query($link,$sql);

$total = mysqli_num_rows($result);

 if ($row = mysqli_fetch_array($result)){

mysqli_field_seek($result,0);
while ($field = mysqli_fetch_field($result)){
} do {
	?>
	 <?php
$idusuarioo = $row[2];
$idusuariod = $row[3];

$sql1 = " SELECT nombres.nombres, nombres.paterno, nombres.materno, cargo.cargo ";
$sql1.= "  FROM usuarios, nombres, cargo WHERE usuarios.idnombre=nombres.idnombre ";
$sql1.= " AND usuarios.idcargo=cargo.idcargo ";
$sql1.= " AND usuarios.idusuario='$idusuarioo' ";

$result1 = mysqli_query($link,$sql1);
$row1 = mysqli_fetch_array($result1);


$sql2 = " SELECT nombres.nombres, nombres.paterno, nombres.materno, cargo.cargo ";
$sql2.= "  FROM usuarios, nombres, cargo WHERE usuarios.idnombre=nombres.idnombre ";
$sql2.= " AND usuarios.idcargo=cargo.idcargo ";
$sql2.= " AND usuarios.idusuario='$idusuariod' ";

$result2 = mysqli_query($link,$sql2);
$row2 = mysqli_fetch_array($result2);

$fecha_derivacion = $row[4];

?>
             ' <?php echo $row2[0]; ?>
              <?php echo $row2[1]; ?>
              <?php echo $row2[2]; ?> <?php echo '<br />'; ?>
              <?php echo $row2[3]; ?>'




                           <?php
$numero++;

if ($numero == $total) {

echo "";

}
else {
echo ",";

}


} while ($row = mysqli_fetch_array($result));


} else {


echo "";
/*
Si no se encontraron resultados

fecha.corres,detalle.corres,nombreunidad.unidad,nombredireccion.direccion,monto.corres,evento.corres,cite.corres,preventivo.corres,nombre.profesionales,observaciones.corres ";
$sql .=" where citedgaa = '$cite' AND idunidad.corres=idunidad.unidad AND iddireccion.corres=ididreccion.direccion AND idprofesional.corres=idprofesional.profesionales";
se muestra el siguiente mensaje
*/
}
?>



<?php

$numero = 0;

$sql = " SELECT idderiva_corres, idcorres, idusuarioo, idusuariod, fecha_deriva, comentario ";
$sql.= " FROM deriva_corres WHERE derivada='NO' AND recibida='SI' AND idcorres='$idcorres' ORDER BY idderiva_corres ";
$result = mysqli_query($link,$sql);

$total = mysqli_num_rows($result);

 if ($row = mysqli_fetch_array($result)){

mysqli_field_seek($result,0);
while ($field = mysqli_fetch_field($result)){
} do {
	?>
	 <?php
$idusuarioo = $row[2];
$idusuariod = $row[3];

$sql1 = " SELECT nombres.nombres, nombres.paterno, nombres.materno, cargo.cargo ";
$sql1.= "  FROM usuarios, nombres, cargo WHERE usuarios.idnombre=nombres.idnombre ";
$sql1.= " AND usuarios.idcargo=cargo.idcargo ";
$sql1.= " AND usuarios.idusuario='$idusuarioo' ";

$result1 = mysqli_query($link,$sql1);
$row1 = mysqli_fetch_array($result1);


$sql2 = " SELECT nombres.nombres, nombres.paterno, nombres.materno, cargo.cargo ";
$sql2.= "  FROM usuarios, nombres, cargo WHERE usuarios.idnombre=nombres.idnombre ";
$sql2.= " AND usuarios.idcargo=cargo.idcargo ";
$sql2.= " AND usuarios.idusuario='$idusuariod' ";

$result2 = mysqli_query($link,$sql2);
$row2 = mysqli_fetch_array($result2);

$fecha_derivacion = $row[4];

?>
             ' <?php echo $row2[0]; ?>
              <?php echo $row2[1]; ?>
              <?php echo $row2[2]; ?> <?php echo '<br />'; ?>
              <?php echo $row2[3]; ?>'




                           <?php
$numero++;

if ($numero == $total) {

echo "";

}
else {
echo ",";

}


} while ($row = mysqli_fetch_array($result));


} else {


echo "";
/*
Si no se encontraron resultados

fecha.corres,detalle.corres,nombreunidad.unidad,nombredireccion.direccion,monto.corres,evento.corres,cite.corres,preventivo.corres,nombre.profesionales,observaciones.corres ";
$sql .=" where citedgaa = '$cite' AND idunidad.corres=idunidad.unidad AND iddireccion.corres=ididreccion.direccion AND idprofesional.corres=idprofesional.profesionales";
se muestra el siguiente mensaje
*/
}
?>



            ]
        },

        yAxis: {
            title: {
                text: 'dias calendario (dias)'
            }
        },

        tooltip: {
            valueSuffix: ' '
        },

        plotOptions: {
            columnrange: {
                dataLabels: {
                    enabled: true,
                    formatter: function () {

                    }
                }
            }
        },

        legend: {
            enabled: false
        },

        series: [{
            name: 'dias calendario',
            data: [


               <?php

$numero = 0;

$fecha_trans = $fecha_corres;


$sql = " SELECT idderiva_corres, idcorres, idusuarioo, idusuariod, fecha_deriva, comentario, derivada, recibida ";
$sql.= " FROM deriva_corres WHERE derivada='SI' AND recibida='SI' AND idcorres='$idcorres' ORDER BY idderiva_corres ";
$result = mysqli_query($link,$sql);

$total = mysqli_num_rows($result);

 if ($row = mysqli_fetch_array($result)){

mysqli_field_seek($result,0);
while ($field = mysqli_fetch_field($result)){
} do {
	?>

	<?php


$sql7 = "SELECT DATEDIFF(  '$fecha_trans', '$fecha_corres' )";
$result7 = mysqli_query($link,$sql7);
$dia_trans= mysqli_fetch_array($result7);



$sql9 = "SELECT DATEDIFF( '$row[4]','$fecha_corres' )";
$result9 = mysqli_query($link,$sql9);
$dia2= mysqli_fetch_array($result9);


?>

             [<?php echo $dia_trans[0]; ?>,<?php echo $dia2[0]; ?>]


                           <?php
$fecha_trans = $row[4];

$numero++;

if ($numero == $total) {

echo ",";


}
else {



echo ",";

}


} while ($row = mysqli_fetch_array($result));


} else {


echo ",";
/*
Si no se encontraron resultados

fecha.corres,detalle.corres,nombreunidad.unidad,nombredireccion.direccion,monto.corres,evento.corres,cite.corres,preventivo.corres,nombre.profesionales,observaciones.corres ";
$sql .=" where citedgaa = '$cite' AND idunidad.corres=idunidad.unidad AND iddireccion.corres=ididreccion.direccion AND idprofesional.corres=idprofesional.profesionales";
se muestra el siguiente mensaje
*/
}
?>

     <?php

$numero = 0;



$sql = " SELECT idderiva_corres, idcorres, idusuarioo, idusuariod, fecha_deriva, comentario, derivada, recibida ";
$sql.= " FROM deriva_corres WHERE derivada='NO' AND recibida='SI' AND idcorres='$idcorres' ORDER BY idderiva_corres ";
$result = mysqli_query($link,$sql);

$total = mysqli_num_rows($result);

 if ($row = mysqli_fetch_array($result)){

mysqli_field_seek($result,0);
while ($field = mysqli_fetch_field($result)){
} do {
	?>

	<?php


$sql7 = "SELECT DATEDIFF(  '$fecha_trans', '$fecha_corres' )";
$result7 = mysqli_query($link,$sql7);
$dia_trans= mysqli_fetch_array($result7);



$sql9 = "SELECT DATEDIFF( '$row[4]','$fecha_corres' )";
$result9 = mysqli_query($link,$sql9);
$dia2= mysqli_fetch_array($result9);


?>

             [<?php echo $dia_trans[0]; ?>,<?php echo $dia2[0]; ?>]


                           <?php
$fecha_trans = $row[4];

$numero++;

if ($numero == $total) {

echo ",";


}
else {



echo "";

}


} while ($row = mysqli_fetch_array($result));


} else {


echo "";
/*
Si no se encontraron resultados

fecha.corres,detalle.corres,nombreunidad.unidad,nombredireccion.direccion,monto.corres,evento.corres,cite.corres,preventivo.corres,nombre.profesionales,observaciones.corres ";
$sql .=" where citedgaa = '$cite' AND idunidad.corres=idunidad.unidad AND iddireccion.corres=ididreccion.direccion AND idprofesional.corres=idprofesional.profesionales";
se muestra el siguiente mensaje
*/
}
?>


     <?php

$numero = 0;


$sql = " SELECT idderiva_corres, idcorres, idusuarioo, idusuariod, fecha_deriva, comentario, derivada, recibida ";
$sql.= " FROM deriva_corres WHERE derivada='SI' AND recibida='NO' AND idcorres='$idcorres' ORDER BY idderiva_corres ";
$result = mysqli_query($link,$sql);

$total = mysqli_num_rows($result);

 if ($row = mysqli_fetch_array($result)){

mysqli_field_seek($result,0);
while ($field = mysqli_fetch_field($result)){
} do {
	?>

	<?php

$sql7 = "SELECT DATEDIFF(  '$fecha_trans', '$fecha_corres' )";
$result7 = mysqli_query($link,$sql7);
$dia_trans= mysqli_fetch_array($result7);


$sql9 = "SELECT DATEDIFF( '$row[4]','$fecha_corres' )";
$result9 = mysqli_query($link,$sql9);
$dia2= mysqli_fetch_array($result9);


?>

             [<?php echo $dia_trans[0]; ?>,<?php echo $dia2[0]; ?>]


                           <?php
$fecha_trans = $row[4];

$numero++;

if ($numero == $total) {

echo ",";


}
else {



echo "";

}


} while ($row = mysqli_fetch_array($result));


} else {


echo "";
/*
Si no se encontraron resultados

fecha.corres,detalle.corres,nombreunidad.unidad,nombredireccion.direccion,monto.corres,evento.corres,cite.corres,preventivo.corres,nombre.profesionales,observaciones.corres ";
$sql .=" where citedgaa = '$cite' AND idunidad.corres=idunidad.unidad AND iddireccion.corres=ididreccion.direccion AND idprofesional.corres=idprofesional.profesionales";
se muestra el siguiente mensaje
*/
}
?>

     <?php

$numero = 0;



$sql = " SELECT idderiva_corres, idcorres, idusuarioo, idusuariod, fecha_deriva, comentario, derivada, recibida ";
$sql.= " FROM deriva_corres WHERE derivada='NO' AND recibida='SI' AND idcorres='$idcorres' ORDER BY idderiva_corres ";
$result = mysqli_query($link,$sql);

$total = mysqli_num_rows($result);

 if ($row = mysqli_fetch_array($result)){

mysqli_field_seek($result,0);
while ($field = mysqli_fetch_field($result)){
} do {
	?>

	<?php


$sql7 = "SELECT DATEDIFF(  '$row[4]', '$fecha_corres' )";
$result7 = mysqli_query($link,$sql7);
$dia_trans= mysqli_fetch_array($result7);



$sql9 = "SELECT DATEDIFF( '$fecha','$fecha_corres')";
$result9 = mysqli_query($link,$sql9);
$dia2= mysqli_fetch_array($result9);


?>

             [<?php echo $dia_trans[0]; ?>,<?php echo $dia2[0]; ?>]


                           <?php
$fecha_trans = $row[4];

$numero++;

if ($numero == $total) {

echo "";


}
else {



echo "";

}


} while ($row = mysqli_fetch_array($result));


} else {


echo "";
/*
Si no se encontraron resultados

fecha.corres,detalle.corres,nombreunidad.unidad,nombredireccion.direccion,monto.corres,evento.corres,cite.corres,preventivo.corres,nombre.profesionales,observaciones.corres ";
$sql .=" where citedgaa = '$cite' AND idunidad.corres=idunidad.unidad AND iddireccion.corres=ididreccion.direccion AND idprofesional.corres=idprofesional.profesionales";
se muestra el siguiente mensaje
*/
}
?>



<?php

$numero = 0;




$sql = " SELECT idderiva_corres, idcorres, idusuarioo, idusuariod, fecha_deriva, comentario, derivada, recibida ";
$sql.= " FROM deriva_corres WHERE derivada='SI' AND recibida='NO' AND idcorres='$idcorres' ORDER BY idderiva_corres ";
$result = mysqli_query($link,$sql);

$total = mysqli_num_rows($result);

 if ($row = mysqli_fetch_array($result)){

mysqli_field_seek($result,0);
while ($field = mysqli_fetch_field($result)){
} do {
	?>

	<?php


$sql7 = "SELECT DATEDIFF(  '$row[4]', '$fecha_corres' )";
$result7 = mysqli_query($link,$sql7);
$dia_trans= mysqli_fetch_array($result7);


$sql9 = "SELECT DATEDIFF( '$fecha','$fecha_corres' )";
$result9 = mysqli_query($link,$sql9);
$dia2= mysqli_fetch_array($result9);


?>

             [<?php echo $dia_trans[0]; ?>,<?php echo $dia2[0]; ?>]


                           <?php
$fecha_trans = $row[4];

$numero++;

if ($numero == $total) {

echo "";


}
else {



echo "";

}


} while ($row = mysqli_fetch_array($result));


} else {


echo "";
/*
Si no se encontraron resultados

fecha.corres,detalle.corres,nombreunidad.unidad,nombredireccion.direccion,monto.corres,evento.corres,cite.corres,preventivo.corres,nombre.profesionales,observaciones.corres ";
$sql .=" where citedgaa = '$cite' AND idunidad.corres=idunidad.unidad AND iddireccion.corres=ididreccion.direccion AND idprofesional.corres=idprofesional.profesionales";
se muestra el siguiente mensaje
*/
}
?>


            ]
        }]

    });

});
		</script>
	    <style type="text/css">
<!--
.Estilo1 {
	font-family: Arial, Helvetica, sans-serif;
	font-weight: bold;
	color: #006699;
}
.Estilo2 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 14px;
	font-weight: bold;
}
.Estilo3 {font-family: Arial, Helvetica, sans-serif}
.Estilo4 {font-size: 12px}
.Estilo5 {color: #006699}
.Estilo6 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 14px;
	color: #003399;
	font-weight: bold;
}
.Estilo9 {font-family: Arial, Helvetica, sans-serif; font-size: 12px; font-weight: bold; color: #003399; }
.Estilo12 {font-family: Arial, Helvetica, sans-serif; font-size: 12px; font-weight: bold; color: #006699; }
.Estilo13 {color: #000000}
-->
        </style>
</head>
	<body>
<script src="../js/highcharts.js"></script>
<script src="../js/highcharts-more.js"></script>
<script src="../js/modules/exporting.js"></script>

<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>






 <br />
 <table width="500" border="0" align="center">
      <tr>
        <td colspan="2"><span class="Estilo2">REFERENCIA:</span></td>
      </tr>
      <tr>
        <td colspan="2"><div align="center" class="Estilo1"><?php echo $referencia;?></div></td>
      </tr>
      <tr>
        <td><div align="right"><span class="Estilo12"><span class="Estilo13">Fecha de la Hoja de Ruta</span>:</span></div></td>
        <td><span class="Estilo12">
        <?php 
      $fecha_elab1 = explode('-',$fecha_corres);
      $f_corres    = $fecha_elab1[2].'/'.$fecha_elab1[1].'/'.$fecha_elab1[0];
      echo $f_corres;
      ?> 
      </span></td>
      </tr>
      <tr>
        <td><div align="right"><span class="Estilo12"><span class="Estilo13">Estado del Tramite</span>:</span></div></td>
        <td><span class="Estilo12"><?php echo $estado;?></span></td>
      </tr>
      
      <tr>
        <td width="270"><div align="center" class="Estilo12"></div></td>
        <td width="220">&nbsp;</td>
      </tr>
    </table>



<?php

$sql = " SELECT idderiva_corres, idcorres, idusuarioo, idusuariod, fecha_deriva, comentario ";
$sql.= " FROM deriva_corres WHERE derivada='SI' AND recibida='SI' AND idcorres='$idcorres' ORDER BY idderiva_corres ";

$result = mysqli_query($link,$sql);

?>
<html>
<head>
  <title></title>
  <style type="text/css">
<!--
.Estilo71 {
	font-size: 18px;
	font-family: Arial, Helvetica, sans-serif;
	font-weight: bold;
}
.Estilo72 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 8px;
}
.Estilo79 {font-family: Arial, Helvetica, sans-serif; font-size: 11px; }
.Estilo83 {font-family: Arial, Helvetica, sans-serif; font-weight: bold; }
.Estilo84 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 14px;
}
.Estilo85 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 16px;
}
.Estilo91 {font-size: 9px}
.Estilo92 {font-family: Arial, Helvetica, sans-serif}
-->
  </style>
  <body>
<table width="892" border="0" align="center">

  <tr>
    <td width="685">

      <table width="876" border="1" bordercolor="#0066CC" bgcolor="#FFFFFF">
        <tr>
          <td width="60"><div align="center" class="Estilo5 Estilo4 Estilo3 Estilo91"><strong><span class="Estilo92">N&ordm; Deriv. </span></strong></div></td>
          <td width="165"><div align="center" class="Estilo5 Estilo4 Estilo3 Estilo91"><strong><span class="Estilo92">Comentario</span></strong></div></td>
          <td width="166"><div align="center" class="Estilo5 Estilo4 Estilo3 Estilo91"><strong><span class="Estilo92">Remitemte</span></strong></div></td>
          <td width="157"><div align="center" class="Estilo5 Estilo4 Estilo3 Estilo91"><strong><span class="Estilo92">Destinatario</span></strong></div></td>
          <td width="109"><div align="center" class="Estilo5 Estilo4 Estilo3 Estilo91"><strong><span class="Estilo92">Fecha Derivacion </span></strong></div></td>
        </tr>


<?php


if ($row = mysqli_fetch_array($result)){

mysqli_field_seek($result,0);
while ($field = mysqli_fetch_field($result)){
} do {

?>

     

        <?php
$idusuarioo = $row[2];
$idusuariod = $row[3];

$sql1 = " SELECT nombres.nombres, nombres.paterno, nombres.materno, cargo.cargo ";
$sql1.= "  FROM usuarios, nombres, cargo WHERE usuarios.idnombre=nombres.idnombre ";
$sql1.= " AND usuarios.idcargo=cargo.idcargo ";
$sql1.= " AND usuarios.idusuario='$idusuarioo' ";

$result1 = mysqli_query($link,$sql1);
$row1 = mysqli_fetch_array($result1);

$sql2 = " SELECT nombres.nombres, nombres.paterno, nombres.materno, cargo.cargo ";
$sql2.= "  FROM usuarios, nombres, cargo WHERE usuarios.idnombre=nombres.idnombre ";
$sql2.= " AND usuarios.idcargo=cargo.idcargo ";
$sql2.= " AND usuarios.idusuario='$idusuariod' ";

$result2 = mysqli_query($link,$sql2);
$row2 = mysqli_fetch_array($result2);



?>   <tr>
          <td><div align="center" class="Estilo91 Estilo3 Estilo4"><span class="Estilo92"><?php echo $row[0]; ?></span></div></td>
          <td><span class="Estilo91 Estilo3 Estilo4"><?php echo $row[5]; ?></span></td>
          <td><div align="center" class="Estilo91 Estilo3 Estilo4"><span class="Estilo92">
              <?php echo $row1[0]; ?>
              <?php echo $row1[1]; ?>
              <?php echo $row1[2]; ?><br />
              <?php echo $row1[3]; ?></span></div></td>
          <td><div align="center" class="Estilo91 Estilo3 Estilo4"><span class="Estilo92">
              <?php echo $row2[0]; ?>
              <?php echo $row2[1]; ?>
              <?php echo $row2[2]; ?><br />
              <?php echo $row2[3]; ?></span></div></td>
          <td><div align="center" class="Estilo91 Estilo3 Estilo4"><span class="Estilo92"><?php echo $row[4]; ?></span></div></td>

        </tr>

          <?php } while ($row = mysqli_fetch_array($result));



} else {
/*
Si no se encontraron resultados

fecha.corres,detalle.corres,nombreunidad.unidad,nombredireccion.direccion,monto.corres,evento.corres,cite.corres,preventivo.corres,nombre.profesionales,observaciones.corres ";
$sql .=" where citedgaa = '$cite' AND idunidad.corres=idunidad.unidad AND iddireccion.corres=ididreccion.direccion AND idprofesional.corres=idprofesional.profesionales";
se muestra el siguiente mensaje
*/

}
?>
      </table>

                 <p align="center" class="Estilo6">ULTIMA DERIVACION</p>

                 <?php

$sql3 = " SELECT idderiva_corres, idcorres, idusuarioo, idusuariod, fecha_deriva, comentario, derivada, recibida";
$sql3.= " FROM deriva_corres WHERE derivada='SI' AND recibida='NO' AND idcorres='$idcorres'";

$result3 = mysqli_query($link,$sql3);

if ($row3 = mysqli_fetch_array($result3)){

mysqli_field_seek($result3,0);
while ($field3 = mysqli_fetch_field($result3)){
} do {

?>

  <table width="882" border="1" align="center" bordercolor="#006699">
        <tr>
          <td width="58" ><div align="center" class="Estilo9"><span class="Estilo79">N&ordm; Deriv.</span></div></td>
          <td width="163" ><div align="center" class="Estilo9"><span class="Estilo79">Remitemte</span></div></td>
          <td width="160" ><div align="center" class="Estilo9"><span class="Estilo79">Destinatario</span></div></td>
          <td width="104" ><div align="center" class="Estilo9"><span class="Estilo79">Fecha Derivacion </span></div></td>
          <td width="174" ><div align="center" class="Estilo9"><span class="Estilo79">Comentario</span></div></td>
          <td width="173" ><div align="center" class="Estilo12"><span class="Estilo79">Derivada</span></div></td>
          <td width="173" ><div align="center" class="Estilo12"><span class="Estilo79">Recibida</span></div></td>
        </tr>



     
 <?php
$origen = $row3[2];
$destino = $row3[3];


$sql4 = " SELECT nombres.nombres, nombres.paterno, nombres.materno, cargo.cargo ";
$sql4.= "  FROM usuarios, nombres, cargo WHERE usuarios.idnombre=nombres.idnombre ";
$sql4.= " AND usuarios.idcargo=cargo.idcargo ";
$sql4.= " AND usuarios.idusuario='$origen' ";

$result4 = mysqli_query($link,$sql4);
$row4 = mysqli_fetch_array($result4);


$sql5 = " SELECT nombres.nombres, nombres.paterno, nombres.materno, cargo.cargo ";
$sql5.= "  FROM usuarios, nombres, cargo WHERE usuarios.idnombre=nombres.idnombre ";
$sql5.= " AND usuarios.idcargo=cargo.idcargo ";
$sql5.= " AND usuarios.idusuario='$destino' ";

$result5 = mysqli_query($link,$sql5);
$row5 = mysqli_fetch_array($result5);

?>
   <tr>

         <td><div align="center" class="Estilo91 Estilo3 Estilo4"><span class="Estilo92"><?php echo $row3[0]; ?></span></div></td>

         <td><div align="center" class="Estilo91 Estilo3 Estilo4"><span class="Estilo92">
              <?php echo $row4[0]; ?>
              <?php echo $row4[1]; ?>
              <?php echo $row4[2]; ?><br />
              <?php echo $row4[3]; ?>
            
                </span></div></td>
         <td><div align="center" class="Estilo91 Estilo3 Estilo4"><span class="Estilo92">
              <?php echo $row5[0]; ?>
              <?php echo $row5[1]; ?>
              <?php echo $row5[2]; ?><br />
              <?php echo $row5[3]; ?>
          </td>
        <td><div align="center" class="Estilo91 Estilo3 Estilo4"><span class="Estilo92"><?php echo $row3[4]; ?></span></div></td>
        <td><div align="center" class="Estilo91 Estilo3 Estilo4"><span class="Estilo92"><?php echo $row3[5]; ?></span></div></td>
        <td><div align="center" class="Estilo91 Estilo3 Estilo4"><span class="Estilo92"><?php echo $row3[6]; ?></span></div></td>
        <td><div align="center" class="Estilo91 Estilo3 Estilo4"><span class="Estilo92"><?php echo $row3[7]; ?></span></div></td>

        </tr>
       

<?php } while ($row3 = mysqli_fetch_array($result3));



} else {
/*
Si no se encontraron resultados

fecha.corres,detalle.corres,nombreunidad.unidad,nombredireccion.direccion,monto.corres,evento.corres,cite.corres,preventivo.corres,nombre.profesionales,observaciones.corres ";
$sql .=" where citedgaa = '$cite' AND idunidad.corres=idunidad.unidad AND iddireccion.corres=ididreccion.direccion AND idprofesional.corres=idprofesional.profesionales";
se muestra el siguiente mensaje
*/

}
?>
      </table>


         <?php

$sql3 = " SELECT idderiva_corres, idcorres, idusuarioo, idusuariod, fecha_deriva, comentario, derivada, recibida";
$sql3.= " FROM deriva_corres WHERE derivada='NO' AND recibida='SI' AND idcorres='$idcorres'";

$result3 = mysqli_query($link,$sql3);

if ($row3 = mysqli_fetch_array($result3)){

mysqli_field_seek($result3,0);
while ($field3 = mysqli_fetch_field($result3)){
} do {

?>
         <table width="891" border="1" bordercolor="#006699">
        <tr>
          <td width="59" ><div align="center" class="Estilo12"><span class="Estilo79">N&ordm; Deriv.</span></div></td>
          <td width="162" ><div align="center" class="Estilo12"><span class="Estilo79">Remitemte</span></div></td>
          <td width="156" ><div align="center" class="Estilo12"><span class="Estilo79">Destinatario</span></div></td>
          <td width="110" ><div align="center" class="Estilo12"><span class="Estilo79">Fecha Derivacion </span></div></td>
          <td width="173" ><div align="center" class="Estilo12"><span class="Estilo79">Comentario</span></div></td>
          <td width="173" ><div align="center" class="Estilo12"><span class="Estilo79">Derivada</span></div></td>
          <td width="173" ><div align="center" class="Estilo12"><span class="Estilo79">Recibida</span></div></td>
        </tr>

       
 <?php
$origen = $row3[2];
$destino = $row3[3];


$sql4 = " SELECT nombres.nombres, nombres.paterno, nombres.materno, cargo.cargo ";
$sql4.= "  FROM usuarios, nombres, cargo WHERE usuarios.idnombre=nombres.idnombre ";
$sql4.= " AND usuarios.idcargo=cargo.idcargo ";
$sql4.= " AND usuarios.idusuario='$origen' ";

$result4 = mysqli_query($link,$sql4);
$row4 = mysqli_fetch_array($result4);


$sql5 = " SELECT nombres.nombres, nombres.paterno, nombres.materno, cargo.cargo ";
$sql5.= "  FROM usuarios, nombres, cargo WHERE usuarios.idnombre=nombres.idnombre ";
$sql5.= " AND usuarios.idcargo=cargo.idcargo ";
$sql5.= " AND usuarios.idusuario='$destino' ";

$result5 = mysqli_query($link,$sql5);
$row5 = mysqli_fetch_array($result5);

?>
<tr>

         <td><div align="center" class="Estilo91 Estilo3 Estilo4"><span class="Estilo92"><?php echo $row3[0]; ?></span></div></td>

         <td><div align="center" class="Estilo91 Estilo3 Estilo4"><span class="Estilo92">
              <?php echo $row4[0]; ?>
              <?php echo $row4[1]; ?>
              <?php echo $row4[2]; ?><br />
              <?php echo $row4[3]; ?>
        </span></div></td>
         <td><div align="center" class="Estilo91 Estilo3 Estilo4"><span class="Estilo92">
              <?php echo $row5[0]; ?>
              <?php echo $row5[1]; ?>
              <?php echo $row5[2]; ?><br />
              <?php echo $row5[3]; ?>
        </span></div></td>
        <td><div align="center" class="Estilo91 Estilo3 Estilo4"><span class="Estilo92"><?php echo $row3[4]; ?></span></div></td>
         <td><div align="center" class="Estilo91 Estilo3 Estilo4"><span class="Estilo92"><?php echo $row3[5]; ?></span></div></td>
         <td><div align="center" class="Estilo91 Estilo3 Estilo4"><span class="Estilo92"><?php echo $row3[6]; ?></span></div></td>
         <td><div align="center" class="Estilo91 Estilo3 Estilo4"><span class="Estilo92"><?php echo $row3[7]; ?></span></div></td>
        </tr>
        

<?php } while ($row3 = mysqli_fetch_array($result3));



} else {
/*
Si no se encontraron resultados

fecha.corres,detalle.corres,nombreunidad.unidad,nombredireccion.direccion,monto.corres,evento.corres,cite.corres,preventivo.corres,nombre.profesionales,observaciones.corres ";
$sql .=" where citedgaa = '$cite' AND idunidad.corres=idunidad.unidad AND iddireccion.corres=ididreccion.direccion AND idprofesional.corres=idprofesional.profesionales";
se muestra el siguiente mensaje
*/

}
?>
      </table>


                   </p>



    </div></td>
  </tr>
</table>


</body>

</html>




	</body>
</html>
