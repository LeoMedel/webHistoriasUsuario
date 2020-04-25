<?php
	
	$peticionAjax = true;

	require_once "../core/configGeneral.php";

	if (isset($_POST['url-reg']) || isset($_POST['idFuente-del']) )
	{
		
		require_once "../controladores/fuenteControlador.php";
		$insFuente = new fuenteControlador();

		//Agregar
		if (isset($_POST['url-reg']) /*&& isset($_POST['inicio-reg'])*/ )
		{
			echo $insFuente->agregarFuenteControlador();
		}

		//Eliminar
		if (isset($_POST['idFuente-del']) ) 
		{
			echo $insFuente->eliminarFuenteControlador();
		}

	} 
	else
	{
		session_start(['name' => 'SLM']);
		session_destroy();
		echo '<script> window.location.href="'.SERVERURL.'registro/"  </script>';
	}
	

