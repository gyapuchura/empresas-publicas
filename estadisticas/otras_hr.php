<?php include("../cabf.php");?>
<?php include("../inc.config.php");?>
<?php
date_default_timezone_set('UTC');
$fecha_ram				= date("Ymd");
$fecha 					= date("Y-m-d");
$gestion        = date("Y");
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>REPORTE_OTROS</title>

		<script type="text/javascript" src="jquery.min.js"></script>
		<style type="text/css">
${demo.css}
		</style>
		<script type="text/javascript">
$(function () {
    $('#container').highcharts({
        chart: {
            type: 'pie',
            options3d: {
                enabled: true,
                alpha: 45,
                beta: 0
            }
        },
        title: {
            text: 'OTROS TRAMITES ATENDIDOS POR LA SCEP'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                depth: 35,
                dataLabels: {
                    enabled: true,
                    format: '{point.name}'
                }
            }
        },
        series: [{
            type: 'pie',
            name: 'Porcentaje',
            data: [

<?php
$sql0 = " SELECT corres.idtipo_hojaruta FROM corres, tipo_hojaruta WHERE corres.idtipo_hojaruta=tipo_hojaruta.idtipo_hojaruta AND corres.gestion='$gestion' AND tipo_hojaruta.idcontrol='3'";
$result0 = mysqli_query($link,$sql0);
$total = mysqli_num_rows($result0);

$numero = 0;
$sql = " SELECT corres.idtipo_hojaruta FROM corres, tipo_hojaruta WHERE corres.idtipo_hojaruta=tipo_hojaruta.idtipo_hojaruta AND corres.gestion='$gestion' AND tipo_hojaruta.idcontrol='3' GROUP BY corres.idtipo_hojaruta ORDER BY corres.idtipo_hojaruta ";
$result = mysqli_query($link,$sql);
$conteo_tipo = mysqli_num_rows($result);

 if ($row = mysqli_fetch_array($result)){
mysqli_field_seek($result,0);
while ($field = mysqli_fetch_field($result)){
} do {

$sql_t = " SELECT idtipo_hojaruta, tipo_hojaruta FROM tipo_hojaruta WHERE  idtipo_hojaruta='$row[0]' AND idcontrol='3'";
$result_t = mysqli_query($link,$sql_t);
$row_t = mysqli_fetch_array($result_t);

$sql_c= " SELECT corres.idtipo_hojaruta FROM corres, tipo_hojaruta WHERE corres.idtipo_hojaruta=tipo_hojaruta.idtipo_hojaruta AND corres.idtipo_hojaruta='$row[0]' AND corres.gestion='$gestion' AND tipo_hojaruta.idcontrol='3'";
$result_c = mysqli_query($link,$sql_c);
$conteo = mysqli_num_rows($result_c);

$p_conteo   = ($conteo*100)/$total;
$porcentaje    = number_format($p_conteo, 2, '.', '');

?>

['<?php echo $row_t[1];?>', <?php echo $porcentaje;?>]

        <?php
        $numero++;
        if ($numero == $conteo_tipo) {
        echo "";
        }
        else {
        echo ",";
        }
        
} while ($row = mysqli_fetch_array($result));
} else {
/*
Si no se encontraron resultados
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
<script src="../js/highcharts-3d.js"></script>
<script src="../js/modules/exporting.js"></script>

<div id="container" style="height: 400px"></div>

<table width="646" border="1" align="center" bordercolor="#009999">

        <tr>
          <td width="39" bgcolor="#D0E8D7" style="font-family: Arial;"><span class="Estilo8 Estilo1 Estilo2" style="font-size: 14px; color: #124523;"> N° </span></td>
          <td width="301" bgcolor="#D0E8D7" style="font-family: Arial"><span class="Estilo8 Estilo1 Estilo2" style="font-size: 14px; color: #124523;"> <strong>TIPO DE HOJA DE RUTA</strong></span></td>
          <td width="101" align="center" bgcolor="#D0E8D7" style="font-family: Arial; font-size: 14px; color: #124523;"><span class="Estilo7"><strong>CANTIDAD</strong></span></td>
          <td colspan="2" align="center" bgcolor="#D0E8D7" style="font-family: Arial"><span class="Estilo7">  <strong>% </strong></span></td>
          <td width="98" colspan="2" align="center" bgcolor="#D0E8D7" style="font-family: Arial; color: #124523; font-size: 14px;"><span class="Estilo7"><strong>VER DETALLE
          </strong></span></td>
        </tr>

<?php

$numeroa = 1;
$sqla = " SELECT corres.idtipo_hojaruta FROM corres, tipo_hojaruta WHERE corres.idtipo_hojaruta=tipo_hojaruta.idtipo_hojaruta AND corres.gestion='$gestion' AND tipo_hojaruta.idcontrol='3' GROUP BY corres.idtipo_hojaruta ORDER BY corres.idtipo_hojaruta ";
$resulta = mysqli_query($link,$sqla);
$conteo_tipoa = mysqli_num_rows($resulta);

 if ($rowa = mysqli_fetch_array($resulta)){
mysqli_field_seek($resulta,0);
while ($fielda = mysqli_fetch_field($resulta)){
} do {

$sql_ta = " SELECT idtipo_hojaruta, tipo_hojaruta FROM tipo_hojaruta WHERE  idtipo_hojaruta='$rowa[0]' AND idcontrol='3' ";
$result_ta = mysqli_query($link,$sql_ta);
$row_ta = mysqli_fetch_array($result_ta);

$sql_ca = " SELECT corres.idtipo_hojaruta FROM corres, tipo_hojaruta WHERE corres.idtipo_hojaruta=tipo_hojaruta.idtipo_hojaruta AND corres.idtipo_hojaruta='$rowa[0]' AND corres.gestion='$gestion' AND tipo_hojaruta.idcontrol='3' ";
$result_ca = mysqli_query($link,$sql_ca);
$conteoa = mysqli_num_rows($result_ca);

$p_conteoa   = ($conteoa*100)/$total;

$porcentajea    = number_format($p_conteoa, 2, '.', '');

	?>

        <tr>
          <td width="39" bgcolor="#FFFFFF"><span class="Estilo8 Estilo1 Estilo2" style="font-family: Arial; font-size: 12px;"><?php echo $numeroa;?></span></td>
          <td width="301" bgcolor="#FFFFFF"><span class="Estilo8 Estilo1 Estilo2" style="font-family: Arial; font-size: 12px;"><?php echo $row_ta[1];?></span></td>
          <td bgcolor="#FFFFFF" align="center"><span class="Estilo7" style="font-family: Arial; font-size: 12px;"><?php echo $conteoa;?></span></td>
          <td colspan="2" bgcolor="#FFFFFF" align="center"><span class="Estilo7" style="font-family: Arial; font-size: 12px;"><?php echo $porcentajea;?> %
          </span></td>
          <td colspan="2" bgcolor="#FFFFFF" align="center"><span class="Estilo7"> 
          <a href="detalle_tipo_hr.php?idtipo_hojaruta=<?php echo $rowa[0];?>" target="_blank" class="Estilo12" style="font-size: 12px; font-family: Arial; color: #1D1DCC;" onClick="window.open(this.href, this.target, 'width=750,height=850,scrollbars=YES,top=50,left=200'); return false;">VER DETALLE</a> 
          </span></td>
        </tr>
   
        <?php
        $numeroa=$numeroa+1;
} while ($rowa = mysqli_fetch_array($resulta));
} else {
/*
Si no se encontraron resultados
*/
}
?>
     
    </table>
   
	</body>
</html>
