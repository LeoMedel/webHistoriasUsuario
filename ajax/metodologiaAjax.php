<?php
	
	$peticionAjax = true;

	require_once "../core/configGeneral.php";

	if (isset($_POST['metodologia-reg']) )
	{
		
		require_once "../controladores/metodologiaControlador.php";
		$insMetodologia = new metodologiaControlador();

		//Agregar
		if (isset($_POST['metodologia-reg']) /*&& isset($_POST['inicio-reg'])*/ )
		{
			echo $insMetodologia->agregarMetodologiaControlador();
		}

	} 
	else
	{
		session_start(['name' => 'SLM']);
		session_destroy();
		echo '<script> window.location.href="'.SERVERURL.'registro/"  </script>';
	}
	

