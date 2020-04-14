<!--?php
    if ($_SESSION['tipo_sesion'] != "Cliente") {
        echo $loginControl->forzarCierreSesion();
        //echo $loginControl->redireccionarUsuarioControlador($_SESSION['tipo_sesion']);
    }
?-->

<div class="container-fluid">
    <div class="page-header">
      <h1 class="text-titles">ESTUDIANTE <small>Mi Proyecto</small></h1>
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
	  <h1 class="text-titles">Opciones generales <small>Avances, Proyecto, Equipo</small></h1>
	</div>
</div>
<div class="full-box text-center" style="padding: 30px 10px;">
	
	<article class="full-box tile">
		<div class="full-box tile-title text-center text-titles text-uppercase">
			MIS AVANCES
		</div>
		<div class="full-box tile-icon text-center">
			<i class="zmdi zmdi-male-female"></i>
		</div>
		<div class="full-box tile-number text-titles">
			<p class="full-box"> X </p>
			<small>Información</small>
		</div>
	</article>
	<article class="full-box tile">
		<div class="full-box tile-title text-center text-titles text-uppercase">
			MI PROYECTO
		</div>
		<div class="full-box tile-icon text-center">
			<i class="zmdi zmdi-assignment"></i>
		</div>
		<div class="full-box tile-number text-titles">
			<p class="full-box"> X </p>
			<small>Información</small>
		</div>
	</article>
	<article class="full-box tile">
		<div class="full-box tile-title text-center text-titles text-uppercase">
			MI EQUIPO
		</div>
		<div class="full-box tile-icon text-center">
			<i class="zmdi zmdi-globe"></i>
		</div>
		<div class="full-box tile-number text-titles">
			<p class="full-box"> X </p>
			<small>Información</small>
		</div>
	</article>
</div>
