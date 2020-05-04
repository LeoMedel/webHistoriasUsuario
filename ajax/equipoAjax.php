<?php
	
	$peticionAjax = true;

	require_once "../core/configGeneral.php";

	if (isset($_POST['tituloEq-reg']) || isset($_POST['idEquipo-up']) || isset($_POST['idEquipo-del']) || isset($_POST['equipo-asig']) || isset($_POST['idEquipoEs-del']) )
	{
		
		require_once "../controladores/equipoControlador.php";
		$insEquipo = new equipoControlador();

		//Agregar
		if (isset($_POST['tituloEq-reg']) /*&& isset($_POST['inicio-reg'])*/ )
		{
			echo $insEquipo->agregarEquipoControlador();
		}

		//Actualizar
		if (isset($_POST['idEquipo-up']) /*&& isset($_POST['inicio-reg'])*/ )
		{
			echo $insEquipo->actualizarEquipoControlador();
		}

		//Eliminar
		if (isset($_POST['idEquipo-del']) ) 
		{
			echo $insEquipo->eliminarEquipoControlador();
		}

		//Agregar Estudiante al Equipo
		if (isset($_POST['equipo-asig']) )
		{
			echo $insEquipo->asignarEquipoEstudianteControlador();
		}

		//Eliminar Estudiante del Equipo
		if (isset($_POST['idEquipoEs-del']) )
		{
			echo $insEquipo->eliminarEquipoEstudianteControlador();
		}
		
	} 
	else
	{
		session_start(['name' => 'SLM']);
		session_destroy();
		echo '<script> window.location.href="'.SERVERURL.'login/"  </script>';
	}
	

