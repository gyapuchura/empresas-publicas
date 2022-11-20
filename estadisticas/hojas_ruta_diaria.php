<?php include("../cabf.php");?>
<?php include("../inc.config.php");?>
<?php
date_default_timezone_set('America/La_Paz');
$fecha_ram	= date("Ymd");
$fecha 		= date("Y-m-d");

$gestion = date("Y");

?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>HOJAS DE RUTA POR DIA</title>

		<script type="text/javascript" src="jquery.min.js"></script>
		<style type="text/css">
${demo.css}
		</style>
		<script type="text/javascript">
$(function () {
    $('#container').highcharts({
        chart: {
            type: 'areaspline'
        },
        title: {
            text: 'CANTIDAD DE HOJAS DE RUTA GENERADAS POR CADA DIA GESTION 2022'
        },
        legend: {
            layout: 'vertical',
            align: 'left',
            verticalAlign: 'top',
            x: 150,
            y: 100,
            floating: true,
            borderWidth: 1,
            backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
        },
        xAxis: {
            categories: [
 <?php
$numero = 0;
$sql = " SELECT fecha_corres FROM corres WHERE gestion='$gestion' GROUP BY fecha_corres ORDER BY fecha_corres ";
$result = mysqli_query($link,$sql);
$total = mysqli_num_rows($result);
 if ($row = mysqli_fetch_array($result)){
mysqli_field_seek($result,0);
while ($field = mysqli_fetch_field($result)){
} do {
	?>
             '<?php echo $row[0]; ?>'

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


echo ",";
/*
Si no se encontraron resultados

fecha.procesos,detalle.procesos,nombreunidad.unidad,nombredireccion.direccion,monto.procesos,evento.procesos,cite.procesos,preventivo.procesos,nombre.profesionales,observaciones.procesos ";
$sql .=" where citedgaa = '$cite' AND idunidad.procesos=idunidad.unidad AND iddireccion.procesos=ididreccion.direccion AND idprofesional.procesos=idprofesional.profesionales";
se muestra el siguiente mensaje
*/
}
?>

            ],
            plotBands: [{ // visualize the weekend
                from: 4.5,
                to: 6.5,
                color: 'rgba(68, 170, 213, .2)'
            }]
        },
        yAxis: {
            title: {
                text: 'Cantidad de Hojas de Ruta'
            }
        },
        tooltip: {
            shared: true,
            valueSuffix: ' HOJAS DE RUTA'
        },
        credits: {
            enabled: false
        },
        plotOptions: {
            areaspline: {
                fillOpacity: 0.5
            }
        },
        series: [{
            name: 'Hojas de Ruta.',
            data: [

             <?php

$numero = 0;
$sql = " SELECT fecha_corres FROM corres WHERE gestion='$gestion' GROUP BY fecha_corres ORDER BY fecha_corres ";
$result = mysqli_query($link,$sql);

$total = mysqli_num_rows($result);

 if ($row = mysqli_fetch_array($result)){

mysqli_field_seek($result,0);
while ($field = mysqli_fetch_field($result)){
} do {
	?>

	<?php

$sql7 = " SELECT idcorres FROM corres WHERE gestion='$gestion' AND fecha_corres='$row[0]'";
$result7 = mysqli_query($link,$sql7);

$hojasruta_dia = mysqli_num_rows($result7);

?>
             <?php echo $hojasruta_dia; ?>

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


echo ",";
/*
Si no se encontraron resultados

fecha.procesos,detalle.procesos,nombreunidad.unidad,nombredireccion.direccion,monto.procesos,evento.procesos,cite.procesos,preventivo.procesos,nombre.profesionales,observaciones.procesos ";
$sql .=" where citedgaa = '$cite' AND idunidad.procesos=idunidad.unidad AND iddireccion.procesos=ididreccion.direccion AND idprofesional.procesos=idprofesional.profesionales";
se muestra el siguiente mensaje
*/
}
?>


            ]
        }]
    });
});
		</script>
	</head>
	<body>
<script src="../js/highcharts.js"></script>
<script src="../js/modules/exporting.js"></script>

<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>



   <?php
$numero = 1;
$sql = " SELECT fecha_corres FROM corres WHERE gestion='$gestion' GROUP BY fecha_corres ORDER BY fecha_corres ";
$result = mysqli_query($link,$sql);

$total = mysqli_num_rows($result);

 if ($row = mysqli_fetch_array($result)){

mysqli_field_seek($result,0);
while ($field = mysqli_fetch_field($result)){
} do {
	?>
	<?php
$sql7 = " SELECT idcorres FROM corres WHERE gestion='$gestion' AND fecha_corres='$row[0]'";
$result7 = mysqli_query($link,$sql7);

$hojasruta_dia = mysqli_num_rows($result7);
?>
                           <?php

$numero++;

if ($numero == $total) {

echo "";


}
else {


echo "";

}


} while ($row = mysqli_fetch_array($result));


} else {


echo ",";
/*
Si no se encontraron resultados

fecha.procesos,detalle.procesos,nombreunidad.unidad,nombredireccion.direccion,monto.procesos,evento.procesos,cite.procesos,preventivo.procesos,nombre.profesionales,observaciones.procesos ";
$sql .=" where citedgaa = '$cite' AND idunidad.procesos=idunidad.unidad AND iddireccion.procesos=ididreccion.direccion AND idprofesional.procesos=idprofesional.profesionales";
se muestra el siguiente mensaje
*/
}
?>

<h4 style="text-align: center; font-family: Arial; font-style: normal; color: #002D5B;" align+"center">ULTIMAS HOJAS DE RUTA AGREGADAS</h4>
<table width="807" border="1" align="center">
  <tbody>
    <tr>
      <td width="59" style="font-family: Arial; font-weight: normal; color: #002D5B; font-size: 12px; text-align: center;">CODIGO</td>
      <td width="91" style="color: #002D5B; font-family: Arial; font-size: 12px; text-align: center;">HOJA DE RUTA</td>
      <td width="89" style="color: #002D5B; font-family: Arial; font-size: 12px; text-align: center;">N° CONTROL</td>
      <td width="120" style="color: #002D5B; font-family: Arial; font-size: 12px; text-align: center;">PROCEDENCIA</td>
      <td width="181" style="color: #002D5B; font-family: Arial; font-size: 12px; text-align: center;">REFERENCIA</td>
      <td width="70" style="color: #002D5B; font-family: Arial; font-size: 12px; text-align: center;">FECHA (HR)</td>
      <td width="151" style="color: #002D5B; font-family: Arial; font-size: 12px; text-align: center;">TIPO DE HOJA DE RUTA</td>
    </tr>
    <?php
    $sql_h =" SELECT corres.idcorres, corres.gestion, corres.correlativo, corres.idusuario, corres.referencia, corres.procedencia, ";
    $sql_h.=" corres.no_control, corres.fecha_corres, corres.anexo, corres.idestado, corres.codigo, corres.origen, tipo_hojaruta.tipo_hojaruta ";
    $sql_h.=" FROM corres, tipo_hojaruta WHERE corres.idtipo_hojaruta=tipo_hojaruta.idtipo_hojaruta AND corres.gestion='$gestion'  ORDER BY corres.idcorres DESC LIMIT 20 ";    
    $result_h = mysqli_query($link,$sql_h);
        if ($row_h = mysqli_fetch_array($result_h)){
        mysqli_field_seek($result_h,0);
        while ($field_h = mysqli_fetch_field($result_h)){
        } do {
    ?>
    <tr>
      <td style="color: #002D5B; font-family: Arial; font-style: normal; font-size: 12px; text-align: center;"><?php echo $row_h[10]?></td>
      <td style="color: #002D5B; font-size: 12px; font-family: Arial; text-align: center;"><?php echo $row_h[11]?></td>
      <td style="color: #002D5B; font-family: Arial; font-size: 12px; text-align: center;"><?php echo $row_h[6]?></td>
      <td style="color: #002D5B; font-family: Arial; font-size: 12px;"><?php echo $row_h[5]?></td>
      <td style="color: #002D5B; font-family: Arial; font-size: 12px;"><?php echo $row_h[4]?></td>
      <td style="color: #002D5B; font-family: Arial; font-size: 12px; text-align: center;"><?php 
      $fecha_hr = explode('-',$row_h[7]);
      $f_corres    = $fecha_hr[2].'/'.$fecha_hr[1].'/'.$fecha_hr[0];
      echo $f_corres;
      ?></td>
      <td style="color: #002D5B; font-family: Arial; font-size: 12px;"><?php echo $row_h[12]?></td>
    </tr>
    <?php }
  while ($row_h = mysqli_fetch_array($result_h));
} else {
}
?>
  </tbody>
</table>
<p style="text-align: center; font-family: Arial; font-style: normal; color: #002D5B;" align+"center">&nbsp;</p>

	</body>
</html>
