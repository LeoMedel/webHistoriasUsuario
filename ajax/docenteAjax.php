<?php
	
	$peticionAjax = true;

	require_once "../core/configGeneral.php";

	if (isset($_POST['dni-reg']) || isset($_POST['codigo-del']) || isset($_POST['cuenta-up']) )
	{
		
		require_once "../controladores/docenteControlador.php";
		$insDocente = new docenteControlador();

		//Agregar
		if (isset($_POST['dni-reg']) && isset($_POST['nombre-reg']) && isset($_POST['apellido-reg']) && isset($_POST['usuario-reg']))
		{
			echo $insDocente->agregarDocenteControlador();
		}

		//Eliminar
		if (isset($_POST['codigo-del']) ) 
		{
			echo $insDocente->eliminarDocenteControlador();
		}

		if (isset($_POST['cuenta-up']) && isset($_POST['dni-up']) ) 
		{
			echo $insDocente->actualizarDocenteControlador();
		}

	} 
	else
	{
		session_start(['name' => 'SLM']);
		session_destroy();
		echo '<script> window.location.href="'.SERVERURL.'login/"  </script>';
	}
	

