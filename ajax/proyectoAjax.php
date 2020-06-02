<?php
	
	$peticionAjax = true;

	require_once "../core/configGeneral.php";

	
	if (isset($_POST['titulo-reg']) || isset($_POST['idProyecto-up']) || isset($_POST['idProyecto-del']) || isset($_POST['proyecto-asig']) || isset($_POST['idProyectoMet-del']) || isset($_POST['proyectoEq-asig']) || isset($_POST['idProyectoEq-del']) || isset($_POST['idProyecto_consultar']) )
	{
		
		require_once "../controladores/proyectoControlador.php";
		$insProyecto = new proyectoControlador();

		//Agregar
		if (isset($_POST['titulo-reg']) /*&& isset($_POST['inicio-reg'])*/ )
		{
			echo $insProyecto->agregarProyectoControlador();
		}

		//Actualizar
		if (isset($_POST['idProyecto-up']) /*&& isset($_POST['inicio-reg'])*/ )
		{
			echo $insProyecto->actualizarProyectoControlador();
		}

		//Eliminar
		if (isset($_POST['idProyecto-del']) ) 
		{
			echo $insProyecto->eliminarProyectoControlador();
		}

		//Asignar metodologia
		if (isset($_POST['proyecto-asig']) )
		{
			echo $insProyecto->asignarMetodologiaProyectoControlador();
		}

		//Asignar equipo
		if (isset($_POST['proyectoEq-asig']) )
		{
			echo $insProyecto->asignarProyectoEquipoControlador();
		}

		//Eliminar metodologia
		if (isset($_POST['idProyectoMet-del']) )
		{
			echo $insProyecto->eliminarMetodologiaProyectoControlador();
		}

		//Eliminar equipo
		if (isset($_POST['idProyectoEq-del']) )
		{
			echo $insProyecto->eliminarProyectoEquipoControlador();
		}

		//mostrar equipo
		if (isset($_POST['idProyecto_consultar']) )
		{
			echo $insProyecto->mostrarProyectoEquipoControlador();
		}

	} 
	else
	{
		session_start(['name' => 'SLM']);
		session_destroy();
		echo '<script> window.location.href="'.SERVERURL.'login/"  </script>';
	}
	

