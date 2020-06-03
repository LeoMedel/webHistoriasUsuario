<?php
	
	$peticionAjax = true;

	require_once "../core/configGeneral.php";

	
	if (isset($_POST['actividad-reg']) || isset($_POST['idActividad-up']) || isset($_POST['idActividad-del']) )
	{
		
		require_once "../controladores/actividadControlador.php";
		$insActividad = new actividadControlador();

		//Agregar
		if (isset($_POST['actividad-reg']) )
		{
			echo $insActividad->agregarActividadControlador();
		}
		
		//Actualizar
		if (isset($_POST['idActividad-up']) )
		{
			echo $insActividad->actualizarActividadControlador();
		}

		
		//Eliminar
		if (isset($_POST['idActividad-del']) )
		{
			echo $insActividad->eliminarActividadControlador();
		}

	} 
	else
	{
		session_start(['name' => 'SLM']);
		session_destroy();
		echo '<script> window.location.href="'.SERVERURL.'login/"  </script>';
	}
	

