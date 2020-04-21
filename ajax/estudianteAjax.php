<?php
	
	$peticionAjax = true;

	require_once "../core/configGeneral.php";

	if (isset($_POST['dni-reg']) || isset($_POST['codigo-del']) || isset($_POST['cuenta-up']) )
	{
		
		require_once "../controladores/estudianteControlador.php";
		$insEstudiante = new estudianteControlador();

		//Agregar
		if (isset($_POST['dni-reg']) && isset($_POST['nombre-reg']) && isset($_POST['apellido-reg']) && isset($_POST['usuario-reg']))
		{
			echo $insEstudiante->agregarEstudianteControlador();
		}

		//Eliminar
		if (isset($_POST['codigo-del']) ) 
		{
			echo $insEstudiante->eliminarEstudianteControlador();
		}

		if (isset($_POST['cuenta-up']) && isset($_POST['dni-up']) ) 
		{
			echo $insEstudiante->actualizarEstudianteControlador();
		}

	} 
	else
	{
		session_start(['name' => 'SLM']);
		session_destroy();
		echo '<script> window.location.href="'.SERVERURL.'login/"  </script>';
	}
	

