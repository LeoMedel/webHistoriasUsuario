
<?php

	if ($_SESSION['tipo_sesion'] >=2) {
		echo $loginControl->redireccionarUsuarioControlador($_SESSION['tipo_sesion']);
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
			<article class="tileNew">
	            <div class="tile-iconNew full-reset"><i class="zmdi zmdi-account"></i></div>
	            <div class="tile-nameNew all-tittles">ADMINISTRADORES</div>
	            <div class="tile-numNew full-reset"><?php echo $conteoAdmin->rowCount(); ?></div>
	        </article>
    	</a>

    	<a href="<?php echo SERVERURL; ?>docentelist/">
			<article class="tileNew">
	            <div class="tile-iconNew full-reset"><i class="zmdi zmdi-account"></i></div>
	            <div class="tile-nameNew all-tittles">DOCENTES</div>
	            <div class="tile-numNew full-reset"><?php echo $conteoDocente->rowCount(); ?></div>
	        </article>
    	</a>

    	<a href="<?php echo SERVERURL; ?>estudiantelist/">
			<article class="tileNew">
	            <div class="tile-iconNew full-reset"><i class="zmdi zmdi-account"></i></div>
	            <div class="tile-nameNew all-tittles">ESTUDIANTES</div>
	            <div class="tile-numNew full-reset"><p><?php echo $conteoEstudiante->rowCount(); ?></p></div>
	        </article>
    	</a>

	</div>

</div>
    

