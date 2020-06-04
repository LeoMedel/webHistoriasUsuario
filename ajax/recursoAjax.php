<?php
	
	$peticionAjax = true;

	require_once "../core/configGeneral.php";

	
	if (isset($_POST['recurso-reg']) || isset($_POST['idRecurso-up']) || isset($_POST['idRecurso-del']) )
	{
		
		require_once "../controladores/recursoControlador.php";
		$insRecurso = new recursoControlador();

		//Agregar
		if (isset($_POST['recurso-reg']) )
		{
			echo $insRecurso->agregarRecursoControlador();
		}
		
		//Actualizar
		if (isset($_POST['idRecurso-up']) )
		{
			echo $insRecurso->actualizarRecursoControlador();
		}

		
		//Eliminar
		if (isset($_POST['idRecurso-del']) )
		{
			echo $insRecurso->eliminarRecursoControlador();
		}

	} 
	else
	{
		session_start(['name' => 'SLM']);
		session_destroy();
		echo '<script> window.location.href="'.SERVERURL.'login/"  </script>';
	}
	

