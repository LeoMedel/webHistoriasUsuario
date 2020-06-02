
<?php
	if ($_SESSION['tipo_sesion'] != 2) {
		echo $loginControl->redireccionarUsuarioControlador($_SESSION['tipo_sesion']);
	}
?>



<div class="container-fluid">
    <div class="page-header">
      <h1 class="text-titles">DOCENTE <small>Administración de los Proyectos, Metodologías y Equipos</small></h1>
    </div>
</div>

<div class="full-box text-center" style="padding: 30px 10px;">
	
	<a href="<?php echo SERVERURL; ?>proyectolist/">
		<article class="tileNew">
            <div class="tile-iconNew full-reset"><i class="zmdi zmdi-laptop-chromebook"></i></div>
            <div class="tile-nameNew all-tittles">PROYECTOS</div>
            <div class="tile-numNew full-reset"><p style="font-size:40%;">Información de los proyectos</p></div>
        </article>
	</a>

	<a href="<?php echo SERVERURL; ?>metodologialist/">
		<article class="tileNew">
            <div class="tile-iconNew full-reset"><i class="zmdi zmdi-star"></i></div>
            <div class="tile-nameNew all-tittles">METODOLOGIAS</div>
            <div class="tile-numNew full-reset"><p style="font-size:40%;">Información de las metodologias</p></div>
        </article>
	</a>

	<a href="<?php echo SERVERURL; ?>proyectoMetodologia/">
		<article class="tileNew">
            <div class="tile-iconNew full-reset"><i class="zmdi zmdi-file-plus"></i></div>
            <div class="tile-nameNew all-tittles">ASIGNACIONES</div>
            <div class="tile-numNew full-reset"><p style="font-size:40%;">Metodología y proyecto</p></div>
        </article>
	</a>

	<a href="<?php echo SERVERURL; ?>equipolist/">
		<article class="tileNew">
            <div class="tile-iconNew full-reset"><i class="zmdi zmdi-male-female"></i></div>
            <div class="tile-nameNew all-tittles">EQUIPOS</div>
            <div class="tile-numNew full-reset"><p style="font-size:40%;">Información de Equipos</p></div>
        </article>
	</a>

    <a href="<?php echo SERVERURL; ?>proyectoConsultar/">
        <article class="tileNew">
            <div class="tile-iconNew full-reset"><i class="zmdi zmdi-search"></i></div>
            <div class="tile-nameNew all-tittles">CONSULTAR</div>
            <div class="tile-numNew full-reset"><p style="font-size:40%;">Consultar un Proyecto</p></div>
        </article>
    </a>


</div>
