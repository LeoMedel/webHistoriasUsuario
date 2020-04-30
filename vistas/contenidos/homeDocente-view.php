
<?php
    if ($_SESSION['tipo_sesion'] != 2) {

        echo $loginControl->forzarCierreSesion();
        //echo $loginControl->redireccionarUsuarioControlador($_SESSION['tipo_sesion']);
    }
?>



<div class="container-fluid">
    <div class="page-header">
      <h1 class="text-titles">DOCENTE <small>Administración de los Proyectos</small></h1>
    </div>
</div>
<div class="full-box text-center" style="padding: 30px 10px;">
    

    <!--?php
        require "./controladores/administradorControlador.php";
        $administradorControl = new administradorControlador();

        $conteoAdmin = $administradorControl->mostrarInfoAdministradoresControlador("conteo", 0)
    ?-->




<div class="container-fluid">
	<div class="page-header">
	  <h1 class="text-titles">Opciones generales <small>Estudiantes, Proyectos y Equipos</small></h1>
	</div>
</div>
<div class="full-box text-center" style="padding: 30px 10px;">
	
	<a href="<?php echo SERVERURL; ?>proyectolist/">
		<article class="full-box tile">
			<div class="full-box tile-title text-center text-titles text-uppercase">
				PROYECTOS
			</div>
			<div class="full-box tile-icon text-center">
				<i class="zmdi zmdi-account"></i>
			</div>
			<div class="full-box tile-number text-titles">
				<p class="full-box"> X	 </p>
				<small>Registros</small>
			</div>
		</article>
	</a>

	<a href="<?php echo SERVERURL; ?>metodologialist/">
		<article class="full-box tile">
			<div class="full-box tile-title text-center text-titles text-uppercase">
				METODOLOGÍAS
			</div>
			<div class="full-box tile-icon text-center">
				<i class="zmdi zmdi-account"></i>
			</div>
			<div class="full-box tile-number text-titles">
				<p class="full-box"> X	 </p>
				<small>Registros</small>
			</div>
		</article>
	</a>

	<a href="<?php echo SERVERURL; ?>proyectoMetodologia/">
		<article class="full-box tile">
			<div class="full-box tile-title text-center text-titles text-uppercase">
				ASIGNACIONES
			</div>
			<div class="full-box tile-icon text-center">
				<i class="zmdi zmdi-account"></i>
			</div>
			<div class="full-box tile-number text-titles">
				<p class="full-box"></p>
				<small>Asignacion de la metodología empleada en el proyecto</small>
			</div>
		</article>
	</a>

	<a href="<?php echo SERVERURL; ?>equipolist/">
		<article class="full-box tile">
			<div class="full-box tile-title text-center text-titles text-uppercase">
				EQUIPOS
			</div>
			<div class="full-box tile-icon text-center">
				<i class="zmdi zmdi-account"></i>
			</div>
			<div class="full-box tile-number text-titles">
				<p class="full-box"> X </p>
				<small>Registros</small>
			</div>
		</article>
	</a>
</div>
