<?php
    //	if ($_SESSION['tipo_sesion'] != "Cliente") {
        //echo $loginControl->forzarCierreSesion();
        //echo $loginControl->redireccionarUsuarioControlador($_SESSION['tipo_sesion']);
    //}

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
      <h1 class="text-titles">ESTUDIANTE <small>Mi Hisotria de usuario</small></h1>
    </div>
</div>
<div class="full-box text-center" style="padding: 30px 10px;">
    



<div class="container-fluid">
	<div class="page-header">
	  <h1 class="text-titles">Opciones generales <small>Avances, Proyecto, Equipo</small></h1>
	</div>
</div>
<div class="full-box text-center" style="padding: 30px 10px;">
	
	<article class="full-box tile">
		<div class="full-box tile-title text-center text-titles text-uppercase" style="background-color: #23A846">
			"<?php echo $titulo; ?>"
		</div>
		<div class="full-box tile-icon text-center">
			<i class="zmdi zmdi-globe"></i>
		</div>
		<div class="full-box tile-number text-titles">
			<p class="full-box"> </p>
			<br>
			<br>
			<small>MI EQUIPO</small>
		</div>
	</article>

	<article class="full-box tile">
		<div class="full-box tile-title text-center text-titles text-uppercase" style="background-color: #23A846">
			"<?php echo $nombreEquipo; ?>"
		</div>
		<div class="full-box tile-icon text-center">
			<i class="zmdi zmdi-globe"></i>
		</div>
		<div class="full-box tile-number text-titles">
			<p class="full-box"> </p>
			<br>
			<br>
			<small>MI PROYECTO</small>
		</div>
	</article>
	
</div>
