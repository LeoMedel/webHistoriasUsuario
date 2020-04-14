
<?php
    if ($_SESSION['tipo_sesion'] >= 2) {

        echo $loginControl->forzarCierreSesion();
        //echo $loginControl->redireccionarUsuarioControlador($_SESSION['tipo_sesion']);
    }
?>

<div class="container-fluid">
    <div class="page-header">
      <h1 class="text-titles">REGISTROS <small>Administrador, Docentes y Estudiantes</small></h1>
    </div>
</div>
<div class="full-box text-center" style="padding: 30px 10px;">
    

    <?php
        require "./controladores/administradorControlador.php";
        $administradorControl = new administradorControlador();

        $conteoAdmin = $administradorControl->mostrarInfoAdministradoresControlador("conteo", 0)
    ?>




<div class="container-fluid">
	<div class="page-header">
	  <h1 class="text-titles">Usuarios registrados <small>Historias de usuarios</small></h1>
	</div>
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

	<article class="full-box tile">
		<div class="full-box tile-title text-center text-titles text-uppercase">
			DOCENTES
		</div>
		<div class="full-box tile-icon text-center">
			<i class="zmdi zmdi-male-alt"></i>
		</div>
		<div class="full-box tile-number text-titles">
			<p class="full-box"> X </p>
			<small>Registros</small>
		</div>
	</article>
	<article class="full-box tile">
		<div class="full-box tile-title text-center text-titles text-uppercase">
			ESTUDIANTES
		</div>
		<div class="full-box tile-icon text-center">
			<i class="zmdi zmdi-face"></i>
		</div>
		<div class="full-box tile-number text-titles">
			<p class="full-box"> X </p>
			<small>Registros</small>
		</div>
	</article>
</div>
