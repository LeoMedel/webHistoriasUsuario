<?php
    
	if ($_SESSION['tipo_sesion'] != 3) {
		echo $loginControl->redireccionarUsuarioControlador($_SESSION['tipo_sesion']);
	}

	require "./controladores/estudianteControlador.php";
	$estudianteControl = new estudianteControlador();

	$equipo = $estudianteControl->mostrarMiEquipoControlador($_SESSION['codigo_equipo_sesion']);
	if($equipo->rowCount() > 0) {
		$datosEquipo = $equipo->fetch();
		$titulo = $datosEquipo['equipo'];
	} else {
		$titulo = "No hay equipo";
	}

	$proyecto = $estudianteControl->mostrarMiProyectoControlador($_SESSION['codigo_proyecto_sesion']);
	if($proyecto->rowCount() > 0) {
		$datosProyecto = $proyecto->fetch();
		$nombreEquipo = $datosProyecto['titulo'];
	} else {
		$nombreEquipo = "Sin proyecto";
	}
	

?>

<div class="container-fluid">
    <div class="page-header">
      <h1 class="text-titles">ESTUDIANTE <small>Mi Historia de usuario</small></h1>
    </div>
</div>
    

<div class="full-box text-center" style="padding: 30px 10px;">

	<a href="<?php echo SERVERURL; ?>miEquipo/">
		<article class="tileNew">
            <div class="tile-iconNew full-reset"><i class="zmdi zmdi-male-female"></i></div>
            <div class="tile-nameNew all-tittles">MI EQUIPO</div>
            <div class="tile-numNew full-reset"><p style="font-size:40%;">"<?php echo $titulo; ?>"</p></div>
        </article>
	</a>

	<a href="<?php echo SERVERURL; ?>miProyecto/">
		<article class="tileNew">
            <div class="tile-iconNew full-reset"><i class="zmdi zmdi-folder-star"></i></div>
            <div class="tile-nameNew all-tittles">MI PROYECTO</div>
            <div class="tile-numNew full-reset"><p style="font-size:40%;">"<?php echo $nombreEquipo; ?>"</p></div>
        </article>
	</a>

	<!--article class="full-box tile">
		<div class="full-box tile-title text-center text-titles text-uppercase" style="background-color: #23A846">
			MY PROYECTO
		</div>
		<div class="full-box tile-icon text-center">
			<i class="zmdi zmdi-globe"></i>
		</div>
		<div class="full-box tile-number text-titles">
			<p class="full-box"> </p>
			<br>
			<br>
			<small>"<?php echo $nombreEquipo; ?>"</small>
		</div>
	</article-->
	
</div>
