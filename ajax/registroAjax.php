<?php
	
	$peticionAjax = true;

	require_once "../core/configGeneral.php";

	if (isset($_POST['nombre-regi'] ) || isset($_POST['email-regi']) )
	{
		
		require_once "../controladores/registroControlador.php";
		$insRegistro = new registroControlador();

		//Agregar
		if (isset($_POST['dni-regi']) && isset($_POST['nombre-regi']) && isset($_POST['apellido-regi']) && isset($_POST['usuario-regi']))
		{
			echo $insRegistro->registrarUsuarioControlador();
		}

	} 
	else
	{
		session_start(['name' => 'SLM']);
		session_destroy();
		echo '<script> window.location.href="'.SERVERURL.'registro/"  </script>';
	}
	

