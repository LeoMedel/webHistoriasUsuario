<?php
	
	$peticionAjax = true;

	require_once "../core/configGeneral.php";

	
	if (isset($_POST['tituloFase-reg']) || isset($_POST['idFase-up']) || isset($_POST['idFase-del']) )
	{
		
		require_once "../controladores/faseControlador.php";
		$insFase = new faseControlador();

		//Agregar
		if (isset($_POST['tituloFase-reg']) )
		{
			echo $insFase->agregarFaseControlador();
		}

		//Actualizar
		if (isset($_POST['idFase-up']) )
		{
			echo $insFase->actualizarFaseControlador();
		}

		//Eliminar
		if (isset($_POST['idFase-del']) )
		{
			echo $insFase->eliminarFaseControlador();
		}

	} 
	else
	{
		session_start(['name' => 'SLM']);
		session_destroy();
		echo '<script> window.location.href="'.SERVERURL.'login/"  </script>';
	}
	

