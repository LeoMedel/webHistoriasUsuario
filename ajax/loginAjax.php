<?php
	
	$peticionAjax = true;

	require_once "../core/configGeneral.php";

	if (isset($_GET['Token']) ) {

		require_once "../controladores/loginControlador.php";

		$logout = new loginControlador();

		echo $logout->cerrarSesionControlador();
	} 
	else
	{
		session_start(['name' => 'SLM']);
		session_destroy();
		echo '<script> window.location.href="'.SERVERURL.'login/"  </script>';
	}
	

