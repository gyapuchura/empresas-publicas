<?php include("../inc.config.php");?>
<?php

$gestion       =  date("Y");

$idusuario_rep = $_POST["usuario_rep"];

$sqlh =" SELECT nombres.nombres, nombres.paterno, nombres.materno FROM nombres, usuarios ";
$sqlh.="  WHERE nombres.idnombre=usuarios.idnombre AND usuarios.idusuario='$idusuario_rep' ";
$resulth = mysqli_query($link,$sqlh);
$rowh = mysqli_fetch_array($resulth);
?>


<link href="../css/style.css" rel="stylesheet" />
<link rel="stylesheet" href="../css/dataTables.bootstrap.min.css">

<div class="box-area">
   <div class="row">    
        <div class="col-lg-2">
            <h4 class="text-primary">USUARIO:</h4>
        </div>
        <div class="col-lg-10">
            <h4 class="text muted"><?php echo $rowh[0]; ?> <?php echo $rowh[1]; ?> <?php echo $rowh[2]; ?></h4>
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
$sql_p =" SELECT COUNT(corres.idcorres) FROM corres, deriva_corres WHERE corres.idcorres=deriva_corres.idcorres AND deriva_corres.idusuariod='$idusuario_rep' AND corres.idestado='2'";
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
$sql_c =" SELECT COUNT(corres.idcorres) FROM corres, deriva_corres WHERE corres.idcorres=deriva_corres.idcorres AND deriva_corres.idusuariod='$idusuario_rep' AND corres.idestado='3'";
$result_c = mysqli_query($link,$sql_c);
$row_c = mysqli_fetch_array($result_c);
?> 
	      <td>&nbsp;<?php echo $row_c[0]; ?></td>
        </tr>
        <?php
$sql_a =" SELECT COUNT(corres.idcorres) FROM corres, deriva_corres WHERE corres.idcorres=deriva_corres.idcorres AND deriva_corres.idusuariod='$idusuario_rep' AND corres.idestado='4'";
$result_a = mysqli_query($link,$sql_a);
$row_a = mysqli_fetch_array($result_a);
?>   
	    <tr>
	      <td>&nbsp;ARCHIVADAS</td>
	      <td>&nbsp;<?php echo $row_a[0]; ?></td>
        </tr>
        <?php
$sql_t =" SELECT COUNT(corres.idcorres) FROM corres, deriva_corres WHERE corres.idcorres=deriva_corres.idcorres AND deriva_corres.idusuariod='$idusuario_rep' ";
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
 <form name="INDIV" action="reporte_individual.php" method="post">
<input type="hidden" name="idusuario_rep" value="<?php echo $idusuario_rep;?>">
 <div class="col-lg-3"><h3><button type="submit" class="btn btn-primary">REPORTE EN EXCEL</button></h3></div>

 <div class="col-lg-3">
  
 <a href="detalle_individual.php?idusuario_rep=<?php echo $idusuario_rep;?>" target="_blank" class="Estilo12" onClick="window.open(this.href, this.target, 'width=900,height=850,scrollbars=YES,top=50,left=200'); return false;">IMPRIMIR DETALLE INDIVIDUAL</a>  
      
</div>
</form>
</div>
</div>

</div>
<!-- desde aqui es la tabla dinamica de busqueda ---->
<div class="row">
<div class="col-md-12"><h4>DETALLE INDIVIDUAL:  <?php echo $rowh[0]; ?> <?php echo $rowh[1]; ?> <?php echo $rowh[2]; ?></h4></div>
</div>

<div class="table-responsive">
<table id="example1" class="table table-striped table-bordered table-hover" cellspacing="1" width="100%">
            <thead>
        <tr>
        <th>N°</th>
        <th>CODIGO</th>
        <th>N° CONTROL</th>
        <th>REFERENCIA</th>
        <th>PROCEDENCIA</th>
        <th>TIPO DE HOJA DE RUTA</th>
        <th>FECHA DE LA HOJA DE RUTA</th>	
        <th>INSTRUCCIÓN (ÚLTIMA)</th>
        <th>ESTADO HOJA DE RUTA</th>		
        <th>PARA IMPRIMIR</th>
        </tr>
            </thead>
            <tbody>

            <?php
$numero=1;
$sql =" SELECT idcorres FROM deriva_corres WHERE idusuariod='$idusuario_rep' GROUP BY idcorres ";
$result = mysqli_query($link,$sql);
if ($row = mysqli_fetch_array($result)){
mysqli_field_seek($result,0);
while ($field = mysqli_fetch_field($result)){
} do {

$sql2 =" SELECT corres.idcorres, corres.origen, corres.referencia, corres.procedencia, corres.fecha_corres, corres.codigo, corres.idestado, corres.correlativo  ";
$sql2.=" ,tipo_hojaruta.tipo_hojaruta, estado.estado, corres.no_control FROM corres, tipo_hojaruta, estado WHERE corres.idtipo_hojaruta=tipo_hojaruta.idtipo_hojaruta AND corres.idestado=estado.idestado AND corres.idcorres ='$row[0]' ";
$result2 = mysqli_query($link,$sql2);
$row2 = mysqli_fetch_array($result2);

$sql4 =" SELECT deriva_corres.idderiva_corres, instruccion.instruccion FROM deriva_corres, instruccion WHERE deriva_corres.idinstruccion=instruccion.idinstruccion ";
$sql4.=" AND deriva_corres.idcorres='$row[0]' ORDER by deriva_corres.idderiva_corres DESC LIMIT 1 ";
$result4 = mysqli_query($link,$sql4);
$row4 = mysqli_fetch_array($result4);
    ?>
	    <tr>
        <td><?php echo $numero;?> </td>
        <td><?php echo $row2[5];?></td>
        <td><?php echo $row2[10];?></td>
        <td><?php echo $row2[2];?></td>
        <td><?php echo $row2[3];?></td>
        <td><?php echo $row2[8];?></td>
	      <td><?php  
        $fecha_elab1 = explode('-',$row2[4]);
        $f_corres    = $fecha_elab1[2].'/'.$fecha_elab1[1].'/'.$fecha_elab1[0];
        echo $f_corres;
        ?></td>
        <td><?php echo $row4[1];?></td>
        <td><?php echo $row2[9];?></td>	
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
$('#example1').DataTable( {
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