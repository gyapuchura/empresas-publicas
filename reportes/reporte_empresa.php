<?php include("../inc.config.php");?>
<?php

$gestion       =  date("Y");

$idempresa = $_POST['empresa'];

$sqlh =" SELECT idempresa, razon_social, sigla FROM empresa ";
$sqlh.="  WHERE  idempresa='$idempresa' ";
$resulth = mysqli_query($link,$sqlh);
$rowh = mysqli_fetch_array($resulth);
?>

<link href="../css/style.css" rel="stylesheet" />
<link rel="stylesheet" href="../css/dataTables.bootstrap.min.css">

<div class="box-area">
   <div class="row">    
        <div class="col-lg-2">
            <h4 class="text-primary">EMPRESA:</h4>
        </div>
        <div class="col-lg-10">
            <h4 class="text muted"><?php echo $rowh[1]; ?></h4>
        </div>
    </div>

    <div class="row">    
    <div class="col-lg-6">
    <table class="table table-striped table-bordered table-hover">
    <thead>
	    <tr>
	      <th>ESTADO HOJA DE RUTA</th>
	      <th>CANTIDAD</th>
        </tr>
	</thead>
    <tbody>
    <?php
$sql_p =" SELECT COUNT(idcorres) FROM corres WHERE idempresa='$idempresa' AND idestado='1'";
$result_p = mysqli_query($link,$sql_p);
$row_p = mysqli_fetch_array($result_p);
?> 
	    <tr>
	      <td>&nbsp;REGISTRADAS SIN ASIGNAR:</td>
	      <td>&nbsp;<?php echo $row_p[0]; ?></td>
        </tr>
        <?php
$sql_p =" SELECT COUNT(idcorres) FROM corres WHERE idempresa='$idempresa' AND idestado='2'";
$result_p = mysqli_query($link,$sql_p);
$row_p = mysqli_fetch_array($result_p);
?> 
	    <tr>
	      <td>&nbsp;EN PROCESO</td>
	      <td>&nbsp;<?php echo $row_p[0]; ?></td>
        </tr>
	    <tr>
	      <td>&nbsp;CONCLUIDAS</td>
        <?php
$sql_c =" SELECT COUNT(idcorres) FROM corres WHERE idempresa='$idempresa' AND idestado='3'";
$result_c = mysqli_query($link,$sql_c);
$row_c = mysqli_fetch_array($result_c);
?> 
	      <td>&nbsp;<?php echo $row_c[0]; ?></td>
        </tr>
        <?php
$sql_a =" SELECT COUNT(idcorres) FROM corres WHERE idempresa='$idempresa' AND idestado='4'";
$result_a = mysqli_query($link,$sql_a);
$row_a = mysqli_fetch_array($result_a);
?>   
	    <tr>
	      <td>&nbsp;ARCHIVADAS</td>
	      <td>&nbsp;<?php echo $row_a[0]; ?></td>
        </tr>
        <?php
$sql_t =" SELECT COUNT(idcorres) FROM corres WHERE idempresa='$idempresa' ";
$result_t = mysqli_query($link,$sql_t);
$row_t = mysqli_fetch_array($result_t);
?>  
        <tr>
	      <td>&nbsp;TOTAL</td>
	      <td>&nbsp;<?php echo $row_t[0]; ?></td>
        </tr>
      </tbody>
    </table>
 </div>
 <form name="INDIV" action="reporte_empresa_excel.php" method="post">
<input type="hidden" name="idempresa" value="<?php echo $idempresa;?>">
 <div class="col-lg-3"><h3><button type="submit" class="btn btn-primary">REPORTE EN EXCEL</button></h3></div>

 <div class="col-lg-3">
  
 <a href="detalle_empresa.php?idempresa=<?php echo $idempresa;?>" target="_blank" class="Estilo12" onClick="window.open(this.href, this.target, 'width=800,height=850,scrollbars=YES,top=50,left=200'); return false;">IMPRIMIR DETALLE EMPRESA</a>  
      
</div>
</form>
</div>
</div>

</div>
<!-- desde aqui es la tabla dinamica de busqueda ---->
<div class="row">
<div class="col-md-12"><h4>Detalle: <?php echo $rowh[1]; ?></h4></div>
</div>

<div class="table-responsive">
<table id="example2" class="table table-striped table-bordered table-hover" cellspacing="1" width="100%">
            <thead>
        <tr>
        <th>N°</th>
        <th>CODIGO</th>
        <th>N° CONTROL</th>
        <th>REFERENCIA</th>
        <th>TIPO DE HOJA DE RUTA</th>
        <th>FECHA DE LA HOJA DE RUTA</th>
        <th>ULTIMA DERIVACIÓN</th>
        <th>INSTRUCCIÓN (ÚLTIMA)</th>
        <th>ESTADO HOJA DE RUTA</th>		
        <th>PARA IMPRIMIR</th>
        </tr>
            </thead>
            <tbody>

            <?php
$numero=1;
$sql =" SELECT corres.idcorres, corres.codigo, corres.no_control, corres.referencia, corres.procedencia, tipo_hojaruta.tipo_hojaruta, corres.fecha_corres, estado.estado FROM corres, tipo_hojaruta, estado ";
$sql.=" WHERE corres.idtipo_hojaruta=tipo_hojaruta.idtipo_hojaruta AND corres.idestado=estado.idestado AND corres.gestion='$gestion' AND corres.idempresa='$idempresa'";
$result = mysqli_query($link,$sql);
if ($row = mysqli_fetch_array($result)){
mysqli_field_seek($result,0);
while ($field = mysqli_fetch_field($result)){
} do {

    ?>
	    <tr>
        <td><?php echo $numero;?> </td>
        <td><?php echo $row[1];?></td>
        <td><?php echo $row[2];?></td>
        <td><?php echo $row[3];?></td>
        <td><?php echo $row[5];?></td>
	    <td>
        <?php  
        $fecha_elab1 = explode('-',$row[6]);
        $f_corres    = $fecha_elab1[2].'/'.$fecha_elab1[1].'/'.$fecha_elab1[0];
        echo $f_corres;
        ?>
        </td>
        <td>
        <?php 

        $sql4 =" SELECT deriva_corres.idderiva_corres, instruccion.instruccion, deriva_corres.idusuariod FROM deriva_corres, instruccion WHERE deriva_corres.idinstruccion=instruccion.idinstruccion ";
        $sql4.=" AND deriva_corres.idcorres='$row[0]' ORDER by deriva_corres.idderiva_corres DESC LIMIT 1 ";
        $result4 = mysqli_query($link,$sql4);

        if($row4 = mysqli_fetch_array($result4))
        {
        $sql5 = " SELECT usuarios.idusuario, nombres.nombres, nombres.paterno, nombres.materno, nombres.titulo ,cargo.cargo FROM usuarios, nombres, cargo WHERE usuarios.idnombre=nombres.idnombre";
        $sql5.= " AND usuarios.idcargo=cargo.idcargo AND usuarios.idusuario='$row4[2]'";
        $result5 = mysqli_query($link,$sql5);        
        if($row5 = mysqli_fetch_array($result5))
        {
            echo $row5[4]." ".$row5[1]." ".$row5[2]." ".$row5[3];
        }}
        
        ?>
        </td>
        <td>
            <?php 
                $sql6 =" SELECT deriva_corres.idderiva_corres, instruccion.instruccion, deriva_corres.idusuariod FROM deriva_corres, instruccion WHERE deriva_corres.idinstruccion=instruccion.idinstruccion ";
                $sql6.=" AND deriva_corres.idcorres='$row[0]' ORDER by deriva_corres.idderiva_corres DESC LIMIT 1 ";
                $result6 = mysqli_query($link,$sql6);        
                if($row6 = mysqli_fetch_array($result6))
                {  echo $row6[1]; } ?>
        </td>
        <td><?php echo $row[7];?></td>	
        <td>          
	<a href="../impresion_documentos/imprime_ficha_control.php?idcorres=<?php echo $row[0]?>" target="_blank" class="Estilo12" onClick="window.open(this.href, this.target, 'width=750,height=850,scrollbars=YES,top=50,left=200'); return false;"><h5 class="text-warning">FICHA DE CONTROL</h5></a>    
    <a href="../impresion_documentos/imprime_hoja_ruta_ver.php?idcorres=<?php echo $row[0]?>" target="_blank" class="Estilo12" onClick="window.open(this.href, this.target, 'width=750,height=850,scrollbars=YES,top=50,left=200'); return false;">HOJA RUTA COMPLETA</a>   
    </td>
        </tr>

<?php
$numero=$numero+1;

}
  while ($row = mysqli_fetch_array($result));
} else {
}
?>
        </tbody>
    </table>
</div>
<div class="row">    
    <div class="col-lg-12"></div>
</div>
<script src="../js/jquery.dataTables.min.js"></script>
<script src="../js/dataTables.bootstrap.min.js"></script>
<script src="../js/script.js"></script>
<script>
$(document).ready(function() {
$('#example2').DataTable( {
    "lengthMenu": [[ 3, 5, 10, 25, 50, -1], [ 3, 5, 10, 25, 50, "All"]] ,
    "language": {
        "lengthMenu": "Mostrar _MENU_ registros por pagina",
        "zeroRecords": "No se encontraron resultados en su busqueda",
        "searchPlaceholder": "Buscar registros",
        "info": "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
        "infoEmpty": "No existen registros",
        "infoFiltered": "(filtrado de un total de _MAX_ registros)",
        "search": "Buscar:",
        "paginate": {
            "first":    "Primero",
            "last":    "Último",
            "next":    "Siguiente",
            "previous": "Anterior"
        },
    }
} );
} );
</script>  