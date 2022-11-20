<div class="navbar-collapse collapse ">
    <ul class="nav navbar-nav">

	<?php
////////	/****** EVALUACION DE CONTRATACIONES PARA EL SUPERVISOR SCEP ******/		
$sql = "SELECT perfil  from usuarios  where idusuario = '$idusuario_ss' and perfil = '$perfil_ss' ";
$result = mysqli_query($link,$sql);
$row = mysqli_fetch_array($result);

if ($row[0] == 'ADMINISTRADOR' || $row[0] =='GERENTE' || $row[0] =='USUARIO' ){

mysqli_field_seek($result,0);
while ($field = mysqli_fetch_field($result)){
} do {	?> 

	<li class="dropdown">
	<a href="#" data-toggle="dropdown" class="dropdown-toggle">CONTRATACIONES SCEP<b class="caret"></b></a>
		<ul class="dropdown-menu">
		<li><a href="../contrataciones/declaraciones_juradas_scep.php">DECLARACIONES EMPRESAS</a></li>
		<li><a href="../contrataciones/formularios_asignados.php">FORMULARIOS ASIGNADOS</a></li>
		<li><a href="../contrataciones/formularios_para_asignar.php">ASIGNACIÓN DE FORMULARIOS</a></li>
		<li><a href="../contrataciones/seguimiento_form_cd.php">SEGUIMIENTO DE F-3009</a></li>
		<li><a href="../contrataciones/informes_cd_ev.php">INFORMES DE EVALUACIÓN</a></li>
		<li><a href="../contrataciones/habilitacion_formulario_cd.php">HABILITACIÓN DE F-3009</a></li>
		</ul>
	</li>
<?php
} while ($row = mysqli_fetch_array($result));
} else {
}
?>

<?php
////////	/****** EVALUACIÓN DE CONTRATACIONES PARA EL DAF DE LA EMPRESA PUBLICA ******/	

$sql = "SELECT perfil  from usuarios  where idusuario = '$idusuario_ss' and perfil = '$perfil_ss' ";
$result = mysqli_query($link,$sql);
$row = mysqli_fetch_array($result);

if ($row[0] == 'DAF-EMPRESA' ){

mysqli_field_seek($result,0);
while ($field = mysqli_fetch_field($result)){
} do {	
	?> 
	<li class="dropdown">
	<a href="#" data-toggle="dropdown" class="dropdown-toggle">CONTRATACIONES DAF<b class="caret"></b></a>
		<ul class="dropdown-menu">
		<li><a href="../contrataciones/declaraciones_juradas_ep.php">DECLARACIONES REALIZADAS</a></li>
	<!--	<li><a href="#">SEGUIMIENTO DE F-3009</a></li>  -->
		</ul>
	</li>
<?php
} while ($row = mysqli_fetch_array($result));
} else {
}
?>


<?php
////////	/****** CONTROL EXTERNO PARA EL SUPERVISOR DE LA SCEP ******/	

$sql = "SELECT perfil  from usuarios  where idusuario = '$idusuario_ss' and perfil = '$perfil_ss' ";
$result = mysqli_query($link,$sql);
$row = mysqli_fetch_array($result);

if ($row[0] == 'ADMINISTRADOR' || $row[0] =='GERENTE' || $row[0] =='USUARIO'){

mysqli_field_seek($result,0);
while ($field = mysqli_fetch_field($result)){
} do {	
	?>
<!--	<li class="dropdown">
	<a href="#" data-toggle="dropdown" class="dropdown-toggle">SUPERVISIONES<b class="caret"></b></a>
		<ul class="dropdown-menu">
			<li><a href="#">SUPERVISIONES</a></li>
			<li><a href="#">REPORTES</a></li>
		</ul>
	</li> -->
<?php
} while ($row = mysqli_fetch_array($result));
} else {
}
?>

<?php
////////	/****** CONTROL EXTERNO PARA EL SUPERVISOR DE LA SCEP ******/		
$sql = "SELECT perfil  from usuarios  where idusuario = '$idusuario_ss' and perfil = '$perfil_ss' ";
$result = mysqli_query($link,$sql);
$row = mysqli_fetch_array($result);

if ($row[0] == 'ADMINISTRADOR' || $row[0] =='GERENTE' || $row[0] =='USUARIO'){

mysqli_field_seek($result,0);
while ($field = mysqli_fetch_field($result)){
} do {	
	?>
<!--	
	<li class="dropdown">
	<a href="#" data-toggle="dropdown" class="dropdown-toggle">EVALUACIOES SCEP<b class="caret"></b></a>
		<ul class="dropdown-menu">
			<li><a href="../evaluaciones_scep/consistencia_scep.php">EVALUACIÓN DE CONSISTENCIA</a></li>
			<li><a href="#">FIRMAS DE AUDITORIA</a></li>
			<li><a href="#">REPORTES</a></li>
		</ul>
	</li>
-->
	<?php
} while ($row = mysqli_fetch_array($result));
} else {
}
?>
	<li class="active"><a href="../intranet.php">INICIO</a></li>
	</ul>
</div>