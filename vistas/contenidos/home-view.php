
<?php
    if ($_SESSION['tipo_sesion'] >= 2) {

        echo $loginControl->forzarCierreSesion();
        //echo $loginControl->redireccionarUsuarioControlador($_SESSION['tipo_sesion']);
    }

    require "./controladores/administradorControlador.php";
        $administradorControl = new administradorControlador();

        $conteoAdmin = $administradorControl->mostrarInfoUsuariosControlador("administrador");
        $conteoDocente = $administradorControl->mostrarInfoUsuariosControlador("docente");
        $conteoEstudiante = $administradorControl->mostrarInfoUsuariosControlador("estudiante");
?>

<div class="container-fluid">
    <div class="page-header">
      <h1 class="text-titles">REGISTROS <small>Administrador, Docentes y Estudiantes</small></h1>
    </div>

    <div class="full-box text-center" style="padding: 30px 10px;">

		<a href="<?php echo SERVERURL; ?>adminlist/">
			<article class="full-box tile">
				<div class="full-box tile-title text-center text-titles text-uppercase">
					ADMINISTRADORES
				</div>
				<div class="full-box tile-icon text-center">
					<i class="zmdi zmdi-account"></i>
				</div>
				<div class="full-box tile-number text-titles">
					<p class="full-box"> <?php echo $conteoAdmin->rowCount(); ?> </p>
					<small>Resgistros</small>
				</div>
			</article>
		</a>

		<a href="<?php echo SERVERURL; ?>docentelist/">
			<article class="full-box tile">
				<div class="full-box tile-title text-center text-titles text-uppercase">
					DOCENTES
				</div>
				<div class="full-box tile-icon text-center">
					<i class="zmdi zmdi-account"></i>
				</div>
				<div class="full-box tile-number text-titles">
					<p class="full-box"> <?php echo $conteoDocente->rowCount(); ?> </p>
					<small>Resgistros</small>
				</div>
			</article>
		</a>

		<a href="<?php echo SERVERURL; ?>estudiantelist/">
			<article class="full-box tile">
				<div class="full-box tile-title text-center text-titles text-uppercase">
					ESTUDIANTES
				</div>
				<div class="full-box tile-icon text-center">
					<i class="zmdi zmdi-account"></i>
				</div>
				<div class="full-box tile-number text-titles">
					<p class="full-box"> <?php echo $conteoEstudiante->rowCount(); ?> </p>
					<small>Resgistros</small>
				</div>
			</article>
		</a>
	</div>

</div>
    

