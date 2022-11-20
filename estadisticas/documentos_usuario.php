<?php include("../cabf.php");?>
<?php include("../inc.config.php");?>
<?php

date_default_timezone_set('America/La_Paz');
$fecha_ram   = date("Ymd");
$fecha 	     = date("Y-m-d");
$gestion     = date("Y");

?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>DOCUMENTOS POR USUARIO</title>

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
            text: 'DOCUMENTOS PRODUCIDOS POR USUARIO'
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
$sql0 = " SELECT idadjunto_hr, idcorres, idusuario, idtipo_documento FROM adjunto_hr ";
$result0 = mysqli_query($link,$sql0);
$total = mysqli_num_rows($result0);

$numero = 0;
$sql = " SELECT idusuario FROM adjunto_hr  GROUP BY idusuario ORDER BY idusuario ";
$result = mysqli_query($link,$sql);
$conteo_tipo = mysqli_num_rows($result);

 if ($row = mysqli_fetch_array($result)){
mysqli_field_seek($result,0);
while ($field = mysqli_fetch_field($result)){
} do {

$sql_t = " SELECT nombres.titulo, nombres.nombres, nombres.paterno, nombres.materno, cargo.cargo ";
$sql_t.= " FROM nombres, usuarios, cargo WHERE usuarios.idnombre=nombres.idnombre AND "; 
$sql_t.= " usuarios.idcargo=cargo.idcargo AND usuarios.idusuario='$row[0]' ";
$result_t = mysqli_query($link,$sql_t);
$row_t = mysqli_fetch_array($result_t);

$sql_c= " SELECT idadjunto_hr, idcorres, idusuario, idtipo_documento FROM adjunto_hr WHERE idusuario='$row[0]'";
$result_c = mysqli_query($link,$sql_c);
$conteo = mysqli_num_rows($result_c);

$p_conteo   = ($conteo*100)/$total;
$porcentaje    = number_format($p_conteo, 2, '.', '');

?>

['<?php echo $row_t[1];?> <?php echo $row_t[2];?> <?php echo $row_t[3];?>', <?php echo $porcentaje;?>]

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
          <td width="10" bgcolor="#FFFFFF"><span class="Estilo8 Estilo1 Estilo2"> N° </span></td>
          <td width="434" bgcolor="#FFFFFF"><span class="Estilo8 Estilo1 Estilo2">NOMBRE DE USUARIO</span></td>
          <td bgcolor="#FFFFFF" align="center"><span class="Estilo7">CANTIDAD</span></td>
          <td bgcolor="#FFFFFF" align="center"><span class="Estilo7">DETALLE</span></td>
          <td colspan="2" bgcolor="#FFFFFF" align="center"><span class="Estilo7">  %
          </span></td>
        </tr>

<?php

$numeroa = 1;
$sqla = " SELECT idusuario FROM adjunto_hr  GROUP BY idusuario ORDER BY idusuario ";
$resulta = mysqli_query($link,$sqla);
$conteo_tipoa = mysqli_num_rows($resulta);

 if ($rowa = mysqli_fetch_array($resulta)){
mysqli_field_seek($resulta,0);
while ($fielda = mysqli_fetch_field($resulta)){
} do {

$sql_ta = " SELECT nombres.titulo, nombres.nombres, nombres.paterno, nombres.materno, cargo.cargo ";
$sql_ta.= " FROM nombres, usuarios, cargo WHERE usuarios.idnombre=nombres.idnombre AND "; 
$sql_ta.= " usuarios.idcargo=cargo.idcargo AND usuarios.idusuario='$rowa[0]' ";
$result_ta = mysqli_query($link,$sql_ta);
$row_ta = mysqli_fetch_array($result_ta);

$sql_ca = " SELECT idadjunto_hr, idcorres, idusuario, idtipo_documento FROM adjunto_hr WHERE idusuario='$rowa[0]' ";
$result_ca = mysqli_query($link,$sql_ca);
$conteoa = mysqli_num_rows($result_ca);

$p_conteoa   = ($conteoa*100)/$total;

$porcentajea    = number_format($p_conteoa, 2, '.', '');

	?>

        <tr>
          <td width="10" bgcolor="#FFFFFF"><span class="Estilo8 Estilo1 Estilo2"> <?php echo $numeroa;?> </span></td>
          <td width="434" bgcolor="#FFFFFF"><span class="Estilo8 Estilo1 Estilo2"> <?php echo $row_ta[0];?> <?php echo $row_ta[1];?> <?php echo $row_ta[2];?></span></td>
          <td bgcolor="#FFFFFF" align="center"><span class="Estilo7"> <?php echo $conteoa;?> </span></td>
          <td bgcolor="#FFFFFF" align="center"><span class="Estilo7"> 
          <a href="detalle_individual_documentos.php?idusuario_rep=<?php echo $rowa[0];?>" target="_blank" class="Estilo12" onClick="window.open(this.href, this.target, 'width=800,height=850,scrollbars=YES,top=50,left=200'); return false;">IMPRIMIR</a>      
        </span></td>
          <td colspan="2" bgcolor="#FFFFFF" align="center"><span class="Estilo7"> <?php echo $porcentajea;?> %
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
