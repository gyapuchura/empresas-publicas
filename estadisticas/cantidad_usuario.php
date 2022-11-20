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
		<title>CANTIDAD POR USUARIO</title>

		<script type="text/javascript" src="jquery.min.js"></script>
		<style type="text/css">
${demo.css}
		</style>
		<script type="text/javascript">
$(function () {
    $('#container').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'CANTIDAD Y ESTADO DE HOJAS DE RUTA POR USUARIO'
        },
        subtitle: {
            text: 'Fuente: Sistema Hojas de Ruta'
        },
        xAxis: {
            categories: [

                <?php 
$numero = 0;
$sql = " SELECT idusuario, usuario FROM usuarios WHERE condicion='ACTIVO' AND idarea='12' ORDER BY idusuario";
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
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Cantidad de Hojas de Ruta'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f} Hojas de Ruta</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [


            <?php 
$numero2 = 0;
$sql2 = " SELECT idestado, estado FROM estado WHERE tipo_estado='PRIMARIO' ORDER BY idestado ";
$result2 = mysqli_query($link,$sql2);
$total2 = mysqli_num_rows($result2);
 if ($row2 = mysqli_fetch_array($result2)){
mysqli_field_seek($result2,0);
while ($field2 = mysqli_fetch_field($result2)){
} do {
	?>

{ name: '<?php  echo $row2[1]; ?>',

    data: [
<?php 
$numero3 = 0;
$sql3 = " SELECT idusuario, usuario FROM usuarios WHERE condicion='ACTIVO' AND idarea='12' ORDER BY idusuario";
$result3 = mysqli_query($link,$sql3);
$total3 = mysqli_num_rows($result3);
 if ($row3 = mysqli_fetch_array($result3)){
mysqli_field_seek($result3,0);
while ($field3 = mysqli_fetch_field($result3)){
} do {
	?>

<?php
$sql_a =" SELECT COUNT(corres.idcorres) FROM corres, deriva_corres WHERE corres.idcorres=deriva_corres.idcorres AND deriva_corres.idusuariod='$row3[0]' AND corres.idestado='$row2[0]'";
$result_a = mysqli_query($link,$sql_a);
$row_a = mysqli_fetch_array($result_a);
?>
<?php echo $row_a[0]; ?>
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
/*
Si no se encontraron resultados
*/
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

<div id="container" style="min-width: 410px; height: 400px; margin: 0 auto"></div>
<p>&nbsp;</p>
<table width="806" border="1" align="center" cellspacing="0">
  <tbody>
    <tr>
      <td width="58" bgcolor="#C3EDD7" style="font-family: Arial; font-size: 12px; color: #205332;"><strong>ESTADO </strong></td>
      <td width="732" bgcolor="#C3EDD7" style="font-family: Arial; font-size: 12px; color: #284A1F; text-align: center;"><strong>USUARIOS DE SISTEMA</strong></td>
    </tr>
    <?php 

$sql4 = " SELECT idestado, estado FROM estado WHERE tipo_estado='PRIMARIO' ORDER BY idestado ";
$result4 = mysqli_query($link,$sql4);
$total4 = mysqli_num_rows($result4);
 if ($row4 = mysqli_fetch_array($result4)){
mysqli_field_seek($result4,0);
while ($field4 = mysqli_fetch_field($result4)){
} do {
	?>
    <tr>
      <td bgcolor="#E5F3EC" style="font-family: Arial; font-size: 12px;"><strong>
      <?php  echo $row4[1]; ?>
      <span style="color: #ABEDBF"></span>      <span style="color: #CEE9D7"></span></strong></td>
      <td>
      
      <table width="736" border="0">
        <tbody>
          <tr>
          <?php 
$numero5 = 0;
$sql5 = " SELECT idusuario, usuario FROM usuarios WHERE condicion='ACTIVO' AND idarea='12' ORDER BY idusuario";
$result5 = mysqli_query($link,$sql5);
$total5 = mysqli_num_rows($result5);
 if ($row5 = mysqli_fetch_array($result5)){
mysqli_field_seek($result5,0);
while ($field5 = mysqli_fetch_field($result5)){
} do {
	?>
            <td width="726">
              
              <span style="font-family: Arial; font-size: 12px;"><?php
$sql_s =" SELECT COUNT(corres.idcorres) FROM corres, deriva_corres WHERE corres.idcorres=deriva_corres.idcorres AND deriva_corres.idusuariod='$row5[0]' AND corres.idestado='$row4[0]'";
$result_s = mysqli_query($link,$sql_s);
$row_s = mysqli_fetch_array($result_s);
?>
<?php echo $row5[1];?> 
				<?php echo ":";?> 


<a href="detalle_individual_estado.php?idusuario_rep=<?php echo $row5[0];?>&idestado=<?php echo $row4[0];?>" target="_blank" class="Estilo12" onClick="window.open(this.href, this.target, 'width=800,height=850,scrollbars=YES,top=50,left=200'); return false;"><?php echo $row_s[0];?></a>  
 

</span></td>

            <?php 
} while ($row5 = mysqli_fetch_array($result5));
} else {
/*
Si no se encontraron resultados
*/
}
?>
          </tr>
        </tbody>
      </table>
    

    
    </td>
    </tr>
    <?php 

} while ($row4 = mysqli_fetch_array($result4));
} else {
echo "";
/*
Si no se encontraron resultados
*/
}
?>
  </tbody>
</table>
	</body>
</html>