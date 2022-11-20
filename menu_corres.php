<div class="navbar-collapse collapse ">
     <ul class="nav navbar-nav">

<!-- Desarrollado por Ing. Luis Gonzalo Yapuchura -->

    <?php 		/************************* MENU DE OIPCIONES PARA EL MODULO DE HOJAS DE RUTA SCEP *********/
		////////

		$idusuario_ss = $_SESSION['idusuario_ss'];
		$perfil_ss    = $_SESSION['perfil_ss'];
	    ?>
	<li class="dropdown">
		<a href="#" data-toggle="dropdown" class="dropdown-toggle">BANDEJA ENTRADA<b class="caret"></b></a>
		<ul class="dropdown-menu">

 	<?php
		////////	/****** BANDEJAS DE ENTRADA ******/			    
		$sql = "SELECT perfil  from usuarios  where idusuario = '$idusuario_ss' and perfil = '$perfil_ss' ";
		$result = mysqli_query($link,$sql);
		$row = mysqli_fetch_array($result);

		if ($row[0] == 'ADMINISTRADOR' || $row[0] =='USUARIO'){

		mysqli_field_seek($result,0);
		while ($field = mysqli_fetch_field($result)){
		} do {
	 ?>
	 <li><a href="../bandejas_entrada/nuevas_hojas_ruta.php">NUEVAS HOJAS DE RUTA</a></li>
	 <li><a href="../bandejas_entrada/hojas_ruta_recibidas.php">HOJAS DE RUTA RECIBIDAS</a></li>
	 <li><a href="../bandejas_entrada/hojas_ruta_usuario.php">REGISTRO INDIVIDUAL</a></li>

	<?php
		} while ($row = mysqli_fetch_array($result));
		} else {

		}
	?>
			</ul>
			</li>

	<?php		////////	/****** CORRESPONDENCIA ******/
			    
		$sql = "SELECT perfil  from usuarios  where idusuario = '$idusuario_ss' and perfil = '$perfil_ss' ";
		$result = mysqli_query($link,$sql);
		$row = mysqli_fetch_array($result);

		if ($row[0] == 'ADMINISTRADOR' || $row[0] =='USUARIO'){

		mysqli_field_seek($result,0);
		while ($field = mysqli_fetch_field($result)){
		} do {
	 ?>
		<li class="dropdown">
			<a href="#" data-toggle="dropdown" class="dropdown-toggle">CORRESPONDENCIA<b class="caret"></b></a>
			<ul class="dropdown-menu">
				<li><a href="../correspondencia/para_iniciar.php">INICIAR HOJAS DE RUTA</a></li>
				<li><a href="../correspondencia/nueva_hoja_ruta.php">NUEVA HOJA DE RUTA</a></li>
				<li><a href="../correspondencia/ver_todo.php">IMPRIMIR INICIO</a></li>
							
		<?php
		////////	/****** GESTIONAR USUARIOS ******/			    
		$sql = "SELECT perfil  from usuarios  where idusuario = '$idusuario_ss' and perfil = '$perfil_ss' ";
		$result = mysqli_query($link,$sql);
		$row = mysqli_fetch_array($result);

		if ($row[0] == 'ADMINISTRADOR'){

		mysqli_field_seek($result,0);
		while ($field = mysqli_fetch_field($result)){
		} do {
	 ?>
				<li><a href="../correspondencia/documentos_emitidos.php">REGISTRO DOCUMENTOS </a></li>
				<li><a href="../correspondencia/para_modificar_hr.php">MODIFICAR HOJA DE RUTA</a></li>

    <!--   <li><a href="modificar_comunicacion.php">MODIFICAR COMUNICACCION</a></li> --> 
    <?php
		} while ($row = mysqli_fetch_array($result));
		} else {

		}
	?>
			</ul>
			</li>
				<?php
		} while ($row = mysqli_fetch_array($result));
		} else {

		}
	?>


	<?php		////////	/****** GESTION DE ARCHIVO DOCUMENTAL ******/
			    
		$sql = "SELECT perfil  from usuarios  where idusuario = '$idusuario_ss' and perfil = '$perfil_ss' ";
		$result = mysqli_query($link,$sql);
		$row = mysqli_fetch_array($result);

		if ($row[0] == 'ADMINISTRADOR'){

		mysqli_field_seek($result,0);
		while ($field = mysqli_fetch_field($result)){
		} do {
	 ?>
		<li class="dropdown">
			<a href="#" data-toggle="dropdown" class="dropdown-toggle">ARCHIVO DOCUMENTAL<b class="caret"></b></a>
			<ul class="dropdown-menu">
			<li><a href="../archivo_documental/concluidas.php">HOJAS DE RUTA CONCLUIDAS</a></li>
			<li><a href="../archivo_documental/archivadas_hr.php">HOJAS DE RUTA ARCHIVADAS</a></li>
			<li><a href="../archivo_documental/formularios_archivo.php">GESTIÓN DE ARCHIVO</a></li>
			</ul>
			</li>
	<?php
		} while ($row = mysqli_fetch_array($result));
		} else {

		}
	?>

<?php		////////	/****** GESTION DE USUARIOS Y UNIDADES ORGANIZACIONALES ******/
			    
		$sql = "SELECT perfil  from usuarios  where idusuario = '$idusuario_ss' and perfil = '$perfil_ss' ";
		$result = mysqli_query($link,$sql);
		$row = mysqli_fetch_array($result);

		if ($row[0] == 'ADMINISTRADOR'){

		mysqli_field_seek($result,0);
		while ($field = mysqli_fetch_field($result)){
		} do {
	 ?>
		<li class="dropdown">
			<a href="#" data-toggle="dropdown" class="dropdown-toggle">SISTEMA<b class="caret"></b></a>
			<ul class="dropdown-menu">
				<li><a href="../administrar_sistema/usuarios.php">USUARIOS</a></li>
				<li><a href="../administrar_sistema/unidades_areas.php">UNIDADES-AREAS-CARGOS</a></li>
				<li><a href="../administrar_sistema/empresas.php">EMPRESAS</a></li>
			</ul>
			</li>
<?php
		} while ($row = mysqli_fetch_array($result));
		} else {

		}
	?>



<?php		////////	/****** BUSQUEDAS Y REPORTES ******/
			    
		$sql = "SELECT perfil  from usuarios  where idusuario = '$idusuario_ss' and perfil = '$perfil_ss' ";
		$result = mysqli_query($link,$sql);
		$row = mysqli_fetch_array($result);

		if ($row[0] == 'ADMINISTRADOR' || $row[0] == 'USUARIO'){

		mysqli_field_seek($result,0);
		while ($field = mysqli_fetch_field($result)){
		} do {
	 ?>
      				<li class="dropdown">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle">BÚSQUEDAS<b class="caret"></b></a>
                        <ul class="dropdown-menu">
						    <li><a href="../busquedas/busquedas.php">BUSCAR HOJA DE RUTA</a></li>
							<li><a href="../busquedas/documentos_emitidos_superv.php">DOCUMENTOS EMITIDOS</a></li>
							<li><a href="../busquedas/seguimiento.php">SEGUIMIENTO GENERAL</a></li>
							<li><a href="../estadisticas/estadisticas_hr.php">ESTADISTICAS</a></li>
							<li><a href="../reportes/reportes.php">REPORTES</a></li>
							
                        </ul>
                    </li>
                       <?php
		} while ($row = mysqli_fetch_array($result));
		} else {
		}
	?>
                     <li class="active"><a href="../intranet.php">INICIO</a></li> 
                    </ul>
</div>
