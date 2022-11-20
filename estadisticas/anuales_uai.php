<?php  include("../cabf.php");?>
<?php  include("../inc.config.php");?>
<?php 
date_default_timezone_set('America/La_Paz');
$fecha_ram	= date("Ymd");
$fecha 	    = date("Y-m-d");

$idtipo_hojaruta = '7';

$sql7 = " SELECT idtipo_hojaruta, tipo_hojaruta FROM tipo_hojaruta WHERE idtipo_hojaruta='$idtipo_hojaruta' ";
$result7 = mysqli_query($link,$sql7);
$row7 = mysqli_num_rows($result7); 
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>INFORME ANUAL UAIS</title>

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
            text: 'INFORMES ANUALES - UAIs'
        },
        subtitle: {
            text: 'Fuente: Sistema SUBCEP'
        },
        xAxis: {
            categories: [
                <?php 
$numero = 0;
$sql = " SELECT uai_trabajo.idempresa, empresa.sigla FROM uai_trabajo, empresa WHERE uai_trabajo.idempresa=empresa.idempresa AND uai_trabajo.idtipo_hojaruta='$idtipo_hojaruta' GROUP BY uai_trabajo.idempresa ORDER BY empresa.sigla ";
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
                text: 'INFORMES ANUALES',
                align: 'high'
            },
            labels: {
                overflow: 'justify'
            }
        },
        tooltip: {
            valueSuffix: ' INFORMES DE EVALUACIÓN'
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
$sql2 = " SELECT gestion FROM uai_trabajo WHERE gestion!='' AND uai_trabajo.idtipo_hojaruta='$idtipo_hojaruta' GROUP BY gestion ";
$result2 = mysqli_query($link,$sql2);
$total2 = mysqli_num_rows($result2);
 if ($row2 = mysqli_fetch_array($result2)){
mysqli_field_seek($result2,0);
while ($field2 = mysqli_fetch_field($result2)){
} do {
	?>
 {
            name: '<?php  echo $row2[0]; ?>',
            data: [
                
                <?php 
$numero3 = 0;
$sql3 = " SELECT uai_trabajo.idempresa, empresa.sigla FROM uai_trabajo, empresa WHERE uai_trabajo.idempresa=empresa.idempresa AND uai_trabajo.idtipo_hojaruta='$idtipo_hojaruta' GROUP BY uai_trabajo.idempresa ORDER BY empresa.sigla";
$result3 = mysqli_query($link,$sql3);
$total3 = mysqli_num_rows($result3);
 if ($row3 = mysqli_fetch_array($result3)){
mysqli_field_seek($result3,0);
while ($field3 = mysqli_fetch_field($result3)){
} do {
    $sql4 = " SELECT iduai_trabajo, codigo FROM uai_trabajo WHERE uai_trabajo.idtipo_hojaruta='$idtipo_hojaruta' AND idempresa='$row3[0]' AND gestion='$row2[0]' ";
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
echo " ";

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
<div id="container" style="min-width: 310px; max-width: 850px; height: 4000px; margin: 0 auto"></div>
<p><!--- iteracion de empresas (begin)---->
    <!--- iteracion de empresas eje x (begin) ---->
</p>

<table width="688" border="1" align="center" cellspacing="0">
  <tbody>
    <tr>
      <td bgcolor="#BFD7E2" style="font-family: Arial; font-size: 12px; color: #111864;">N°</td>
      <td bgcolor="#BFD7E2" style="font-family: Arial; font-size: 12px; color: #111864;">SIGLA EMPRESA</td>
      <td bgcolor="#BFD7E2" style="font-family: Arial; font-size: 12px; color: #111864;">RAZON SOCIAL</td>
      <td bgcolor="#BFD7E2" style="font-family: Arial; font-size: 12px; color: #111864; text-align: center;">2017</td>
      <td bgcolor="#BFD7E2" style="font-family: Arial; font-size: 12px; color: #111864; text-align: center;">2018</td>
      <td bgcolor="#BFD7E2" style="font-family: Arial; font-size: 12px; color: #111864; text-align: center;">2019</td>
      <td bgcolor="#BFD7E2" style="font-family: Arial; font-size: 12px; color: #111864; text-align: center;">2020</td>
      <td bgcolor="#BFD7E2" style="font-family: Arial; font-size: 12px; color: #111864; text-align: center;">2021</td>
      <td bgcolor="#BFD7E2" style="font-family: Arial; font-size: 12px; color: #111864; text-align: center;">2022</td> 
    </tr>
    <?php 
$numero = 0;
$sql = " SELECT uai_trabajo.idempresa, empresa.sigla, empresa.razon_social FROM uai_trabajo, empresa WHERE uai_trabajo.idempresa=empresa.idempresa AND uai_trabajo.idtipo_hojaruta='$idtipo_hojaruta'  GROUP BY uai_trabajo.idempresa ORDER BY empresa.sigla ";
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
      <td style="font-family: Arial; font-size: 12px; text-align: center;">
      <?php 
$sql_p = " SELECT iduai_trabajo, codigo FROM uai_trabajo WHERE gestion='2017' AND uai_trabajo.idtipo_hojaruta='$idtipo_hojaruta' AND idempresa='$row[0]'";
$result_p = mysqli_query($link,$sql_p);
$primera = mysqli_num_rows($result_p);
?>

<a href="detalle_empresa_uai.php?idempresa=<?php echo $row[0];?>&gestion=2017&idtipo_hojaruta=<?php echo $idtipo_hojaruta;?>" target="_blank" class="Estilo12" onClick="window.open(this.href, this.target, 'width=800,height=400,scrollbars=YES,top=50,left=200'); return false;"><?php echo $primera;?></a> 

</td>
      <td style="font-family: Arial; font-size: 12px; text-align: center;"><?php 
$sql_c = " SELECT iduai_trabajo, codigo FROM uai_trabajo WHERE gestion='2018' AND uai_trabajo.idtipo_hojaruta='$idtipo_hojaruta' AND idempresa='$row[0]'";
$result_c = mysqli_query($link,$sql_c);
$segunda = mysqli_num_rows($result_c);
?>

<a href="detalle_empresa_uai.php?idempresa=<?php echo $row[0];?>&gestion=2018&idtipo_hojaruta=<?php echo $idtipo_hojaruta;?>" target="_blank" class="Estilo12" onClick="window.open(this.href, this.target, 'width=800,height=400,scrollbars=YES,top=50,left=200'); return false;"><?php echo $segunda;?></a> 

</td>
      <td style="font-family: Arial; font-size: 12px; text-align: center;"><?php 
$sql_a = " SELECT iduai_trabajo, codigo FROM uai_trabajo WHERE gestion='2019' AND uai_trabajo.idtipo_hojaruta='$idtipo_hojaruta' AND idempresa='$row[0]'";
$result_a = mysqli_query($link,$sql_a);
$tercera = mysqli_num_rows($result_a);
?>

<a href="detalle_empresa_uai.php?idempresa=<?php echo $row[0];?>&gestion=2019&idtipo_hojaruta=<?php echo $idtipo_hojaruta;?>" target="_blank" class="Estilo12" onClick="window.open(this.href, this.target, 'width=800,height=400,scrollbars=YES,top=50,left=200'); return false;"><?php echo $tercera;?></a> 

</td>
<td style="font-family: Arial; font-size: 12px; text-align: center;"><?php 
$sql_a = " SELECT iduai_trabajo, codigo FROM uai_trabajo WHERE gestion='2020' AND uai_trabajo.idtipo_hojaruta='$idtipo_hojaruta' AND idempresa='$row[0]'";
$result_a = mysqli_query($link,$sql_a);
$cuarta = mysqli_num_rows($result_a);
?>

<a href="detalle_empresa_uai.php?idempresa=<?php echo $row[0];?>&gestion=2020&idtipo_hojaruta=<?php echo $idtipo_hojaruta;?>" target="_blank" class="Estilo12" onClick="window.open(this.href, this.target, 'width=800,height=400,scrollbars=YES,top=50,left=200'); return false;"><?php echo $cuarta;?></a> 

</td>

<td style="font-family: Arial; font-size: 12px; text-align: center;"><?php 
$sql_a = " SELECT iduai_trabajo, codigo FROM uai_trabajo WHERE gestion='2021' AND uai_trabajo.idtipo_hojaruta='$idtipo_hojaruta' AND idempresa='$row[0]'";
$result_a = mysqli_query($link,$sql_a);
$quinta = mysqli_num_rows($result_a);
?>

<a href="detalle_empresa_uai.php?idempresa=<?php echo $row[0];?>&gestion=2021&idtipo_hojaruta=<?php echo $idtipo_hojaruta;?>" target="_blank" class="Estilo12" onClick="window.open(this.href, this.target, 'width=800,height=400,scrollbars=YES,top=50,left=200'); return false;"><?php echo $quinta;?></a> 

</td>
<td style="font-family: Arial; font-size: 12px; text-align: center;"><?php 
$sql_a = " SELECT iduai_trabajo, codigo FROM uai_trabajo WHERE gestion='2022' AND uai_trabajo.idtipo_hojaruta='$idtipo_hojaruta' AND idempresa='$row[0]'";
$result_a = mysqli_query($link,$sql_a);
$sexta = mysqli_num_rows($result_a);
?>

<a href="detalle_empresa_uai.php?idempresa=<?php echo $row[0];?>&gestion=2022&idtipo_hojaruta=<?php echo $idtipo_hojaruta;?>>" target="_blank" class="Estilo12" onClick="window.open(this.href, this.target, 'width=800,height=400,scrollbars=YES,top=50,left=200'); return false;"><?php echo $sexta;?></a> 

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
