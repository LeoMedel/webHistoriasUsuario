<?php
	
	$peticionAjax = true;

	require_once "../core/configGeneral.php";

	
	if (isset($_POST['historiaUsuario-reg']) || isset($_POST['idActividad_consultar']) /*|| isset($_POST['idRecurso-del'])*/ )
	{
		
		require_once "../controladores/historiaUsuarioControlador.php";
		$insHistoriaUsuario = new historiaUsuarioControlador();

		//Agregar
		if (isset($_POST['historiaUsuario-reg']) & isset($_POST['recurso-reg']) )
		{
			echo $insHistoriaUsuario->agregarHistoriaUsuarioControlador();
		}
		
		//Actualizar
		if (isset($_POST['idRecurso-up']) )
		{
			echo $insHistoriaUsuario->actualizarRecursoControlador();
		}

		
		//Eliminar
		if (isset($_POST['idRecurso-del']) )
		{
			echo $insHistoriaUsuario->eliminarRecursoControlador();
		}

		//Eliminar
		if (isset($_POST['idActividad_consultar']) )
		{
			echo $insHistoriaUsuario->mostrarHistoriaUsuarioControlador();
		}

	} 
	else
	{
		session_start(['name' => 'SLM']);
		session_destroy();
		echo '<script> window.location.href="'.SERVERURL.'login/"  </script>';
	}
	

