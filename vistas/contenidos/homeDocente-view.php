
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
	
	<article class="full-box tile">
		<div class="full-box tile-title text-center text-titles text-uppercase">
			ESTUDIANTES
		</div>
		<div class="full-box tile-icon text-center">
			<i class="zmdi zmdi-male-female"></i>
		</div>
		<div class="full-box tile-number text-titles">
			<p class="full-box"> X </p>
			<small>Registros</small>
		</div>
	</article>
	<article class="full-box tile">
		<div class="full-box tile-title text-center text-titles text-uppercase">
			PROYECTOS
		</div>
		<div class="full-box tile-icon text-center">
			<i class="zmdi zmdi-assignment"></i>
		</div>
		<div class="full-box tile-number text-titles">
			<p class="full-box"> X </p>
			<small>Registros</small>
		</div>
	</article>
	<article class="full-box tile">
		<div class="full-box tile-title text-center text-titles text-uppercase">
			EQUIPOS
		</div>
		<div class="full-box tile-icon text-center">
			<i class="zmdi zmdi-globe"></i>
		</div>
		<div class="full-box tile-number text-titles">
			<p class="full-box"> X </p>
			<small>Registros</small>
		</div>
	</article>
</div>
