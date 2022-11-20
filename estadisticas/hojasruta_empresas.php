<?php  include("../cabf.php");?>
<?php  include("../inc.config.php");?>
<?php 
date_default_timezone_set('America/La_Paz');
$fecha_ram				= date("Ymd");
$fecha 					= date("Y-m-d");
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Hojas de Ruta por Empresa</title>

		<script type="text/javascript" src="jquery.min.js"></script>
		<style type="text/css">
${demo.css}
		</style>
		<script type="text/javascript">
$(function () {
    $('#container').highcharts({
        chart: {
            type: 'bar'
        },
        title: {
            text: 'Hojas de Ruta por Empresa y Estado'
        },
        subtitle: {
            text: 'Fuente: Sistema de Hojas de Ruta SCEP'
        },
        xAxis: {
            categories: [
                <?php 
$numero = 0;
$sql = " SELECT corres.idempresa, empresa.sigla FROM corres, empresa WHERE corres.idempresa=empresa.idempresa AND empresa.vigente='VIGENTE' GROUP BY corres.idempresa ORDER BY empresa.sigla";
$result = mysqli_query($link,$sql);
$total = mysqli_num_rows($result);
 if ($row = mysqli_fetch_array($result)){
mysqli_field_seek($result,0);
while ($field = mysqli_fetch_field($result)){
} do {
	?>
 '<?php  echo $row[1]; ?>'

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
*/
}
?>
            ],
            title: {
                text: null
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: ' (Hojas de Ruta)',
                align: 'high'
            },
            labels: {
                overflow: 'justify'
            }
        },
        tooltip: {
            valueSuffix: ' Hojas de Ruta'
        },
        plotOptions: {
            bar: {
                dataLabels: {
                    enabled: true
                }
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'top',
            x: -40,
            y: 100,
            floating: true,
            borderWidth: 1,
            backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
            shadow: true
        },
        credits: {
            enabled: false
        },
        series: [

            <?php 
$numero2 = 0;
$sql2 = " SELECT idestado, estado FROM estado WHERE tipo_estado='PRIMARIO' ORDER BY idestado";
$result2 = mysqli_query($link,$sql2);
$total2 = mysqli_num_rows($result2);
 if ($row2 = mysqli_fetch_array($result2)){
mysqli_field_seek($result2,0);
while ($field2 = mysqli_fetch_field($result2)){
} do {
	?>
 {
            name: '<?php  echo $row2[1]; ?>',
            data: [
                
                <?php 
$numero3 = 0;
$sql3 = " SELECT corres.idempresa, empresa.sigla FROM corres, empresa WHERE corres.idempresa=empresa.idempresa AND empresa.vigente='VIGENTE' GROUP BY corres.idempresa ORDER BY empresa.sigla";
$result3 = mysqli_query($link,$sql3);
$total3 = mysqli_num_rows($result3);
 if ($row3 = mysqli_fetch_array($result3)){
mysqli_field_seek($result3,0);
while ($field3 = mysqli_fetch_field($result3)){
} do {
    $sql4 = " SELECT idcorres, referencia FROM corres WHERE idempresa='$row3[0]' AND idestado='$row2[0]' ";
    $result4 = mysqli_query($link,$sql4);
    $row4 = mysqli_num_rows($result4); 
	?>
 <?php  echo $row4; ?>
<?php 
$numero3++;
if ($numero3 == $total3) {
echo "";
}
else {
echo ",";
}
} while ($row3 = mysqli_fetch_array($result3));
} else {
echo "";

}
?>
        ]
        }
<?php 
$numero2++;
if ($numero2 == $total2) {
echo "";
}
else {
echo ",";
}
} while ($row2 = mysqli_fetch_array($result2));
} else {
echo "";
/*
Si no se encontraron resultados
*/
}
?>
    
    ]
    });
});
		</script>
	</head>
	<body>
<script src="../js/highcharts.js"></script>
<script src="../js/modules/exporting.js"></script>
<div id="container" style="min-width: 310px; max-width: 850px; height: 1600px; margin: 0 auto"></div>
<p><!--- iteracion de empresas (begin)---->
    <!--- iteracion de empresas eje x (begin) ---->
</p>
<table width="688" border="1" align="center" cellspacing="0">
  <tbody>
    <tr>
      <td bgcolor="#BFD7E2" style="font-family: Arial; font-size: 12px; color: #111864;">N°</td>
      <td bgcolor="#BFD7E2" style="font-family: Arial; font-size: 12px; color: #111864;">SIGLA EMPRESA</td>
      <td bgcolor="#BFD7E2" style="font-family: Arial; font-size: 12px; color: #111864;">RAZON SOCIAL</td>
      <td bgcolor="#BFD7E2" style="font-family: Arial; font-size: 12px; color: #111864; text-align: center;">EN-PROCESO</td>
      <td bgcolor="#BFD7E2" style="font-family: Arial; font-size: 12px; color: #111864; text-align: center;">CONCLUIDAS</td>
      <td bgcolor="#BFD7E2" style="font-family: Arial; font-size: 12px; color: #111864; text-align: center;">ARCHIVADAS</td>
    </tr>
    <?php 
$numero = 0;
$sql = " SELECT corres.idempresa, empresa.sigla, empresa.razon_social FROM corres, empresa WHERE corres.idempresa=empresa.idempresa AND empresa.vigente='VIGENTE' GROUP BY corres.idempresa ORDER BY empresa.sigla";
$result = mysqli_query($link,$sql);
$total = mysqli_num_rows($result);
 if ($row = mysqli_fetch_array($result)){
mysqli_field_seek($result,0);
while ($field = mysqli_fetch_field($result)){
} do {
  ?>
    <tr>
      <td style="font-family: Arial; font-size: 12px;"><?php echo $numero+1;?></td>
      <td style="font-family: Arial; font-size: 12px;"><?php echo $row[1];?></td>
      <td style="font-family: Arial; font-size: 12px;"><?php echo $row[2];?></td>
      <td style="font-family: Arial; font-size: 12px; text-align: center;"><?php 
$sql_p = " SELECT idcorres, referencia FROM corres WHERE idestado='2' AND idempresa='$row[0]'";
$result_p = mysqli_query($link,$sql_p);
$en_proceso = mysqli_num_rows($result_p);
?>

<a href="detalle_empresa_estado.php?idempresa=<?php echo $row[0];?>&idestado=2" target="_blank" class="Estilo12" onClick="window.open(this.href, this.target, 'width=800,height=850,scrollbars=YES,top=50,left=200'); return false;"><?php echo $en_proceso;?></a> 

</td>
      <td style="font-family: Arial; font-size: 12px; text-align: center;"><?php 
$sql_c = " SELECT idcorres, referencia FROM corres WHERE idestado='3' AND idempresa='$row[0]'";
$result_c = mysqli_query($link,$sql_c);
$concluidas = mysqli_num_rows($result_c);
?>

<a href="detalle_empresa_estado.php?idempresa=<?php echo $row[0];?>&idestado=3" target="_blank" class="Estilo12" onClick="window.open(this.href, this.target, 'width=800,height=850,scrollbars=YES,top=50,left=200'); return false;"><?php echo $concluidas;?></a> 

</td>
      <td style="font-family: Arial; font-size: 12px; text-align: center;"><?php 
$sql_a = " SELECT idcorres, referencia FROM corres WHERE idestado='4' AND idempresa='$row[0]'";
$result_a = mysqli_query($link,$sql_a);
$archivadas = mysqli_num_rows($result_a);
?>

<a href="detalle_empresa_estado.php?idempresa=<?php echo $row[0];?>&idestado=4" target="_blank" class="Estilo12" onClick="window.open(this.href, this.target, 'width=800,height=850,scrollbars=YES,top=50,left=200'); return false;"><?php echo $archivadas;?></a> 

</td>
    </tr>
    <?php 
$numero++;
if ($numero == $total) {
echo "";
}
else {

}
} while ($row = mysqli_fetch_array($result));
} else {
echo "";
/*
Si no se encontraron resultados
*/
}
?>
  </tbody>
</table>
<p>&nbsp;</p>
</body>
</html>
