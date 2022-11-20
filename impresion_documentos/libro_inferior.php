<?php include("../cabf.php");?>
<?php include("../inc.config.php");?>
<?php
date_default_timezone_set('America/La_Paz');
$fecha_ram	= date("Ymd");
$fecha 	    = date("Y-m-d");

$gestion  = date("Y");

$idcorres = $_GET['idcorres'];
$origen   = $_GET['origen'];
?>

<?php
    $sql_h =" SELECT corres.idcorres, corres.gestion, corres.correlativo, corres.idusuario, corres.referencia, corres.procedencia, ";
    $sql_h.=" corres.no_control, corres.fecha_corres, corres.anexo, corres.idestado, corres.codigo, corres.origen, tipo_hojaruta.tipo_hojaruta ";
    $sql_h.=" , corres.arch, corres.anillado, corres.legajo, corres.ejemplar, corres.engrapado, corres.cd ";
    $sql_h.=" FROM corres, tipo_hojaruta WHERE corres.idtipo_hojaruta=tipo_hojaruta.idtipo_hojaruta AND corres.gestion='$gestion' AND corres.origen='$origen' AND corres.idcorres='$idcorres' ";    
    $result_h = mysqli_query($link,$sql_h);
        if ($row_h = mysqli_fetch_array($result_h)){
        mysqli_field_seek($result_h,0);
        while ($field_h = mysqli_fetch_field($result_h)){
        } do {
    ?>
<p><img src="../img/works/fondo_hoja_ruta.jpg" width="840" height="880" alt=""/></p>
<table width="850" border="1" align="center" cellspacing="0">
  <tbody>
    <tr>
      <td width="225"><p>&nbsp;</p>
        <table width="139" border="1" align="center" cellspacing="0">
        <tbody>
          <tr>
            <td align="center"><h2><?php echo $row_h[2];?></h2></td>
          </tr>
        </tbody>
      </table>
        <p style="text-align: center">ANEXOS</p>
        <table width="138" border="1" align="center" cellspacing="0">
          <tbody>
            <tr>
            <td width="95">Fojas.:</td>
              <td width="33"><?php echo $row_h[8];?></td>
            </tr>
            <tr>
              <td width="95">Arch.:</td>
              <td width="33"><?php echo $row_h[13];?></td>
            </tr>
            <tr>
              <td>Anillado:</td>
              <td><?php echo $row_h[14];?></td>
            </tr>
            <tr>
              <td>Legajo:</td>
              <td><?php echo $row_h[15];?></td>
            </tr>
            <tr>
              <td>Ejemplar:</td>
              <td><?php echo $row_h[16];?></td>
            </tr>
            <tr>
              <td>Engrapado</td>
              <td><?php echo $row_h[17];?></td>
            </tr>
            <tr>
              <td>CD:</td>
              <td><?php echo $row_h[18];?></td>
            </tr>
          </tbody>
        </table>
        <p style="text-align: center"><h3 style="text-align: center">HR: <?php echo $row_h[6];?></h3></p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p></td>
      <td width="206" valign="top"><p>De: <?php echo $row_h[5];?></p>
      <p>Ref.: <?php echo $row_h[4];?></p></td>
      <td width="204" valign="top"><p>Fecha: 
      <?php 
      $fecha_elab1 = explode('-',$row_h[7]);
      $f_corres    = $fecha_elab1[2].'/'.$fecha_elab1[1].'/'.$fecha_elab1[0];
      echo $f_corres;
      ?>  
      </p>
      <p>Para: Dr. Wilmer Vargas</p></td>
      <td width="197"><p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p></td>
    </tr>
  </tbody>
</table>
<?php 
}
  while ($row_h = mysqli_fetch_array($result_h));
} else {
}
?>
<p>&nbsp; </p>
