<?php
	
	$peticionAjax = true;

	require_once "../core/configGeneral.php";

	if (isset($_POST['metodologia-reg']) || isset($_POST['idMetodologia-del']) || isset($_POST['idMetodologia-up']) )
	{
		
		require_once "../controladores/metodologiaControlador.php";
		$insMetodologia = new metodologiaControlador();

		//Agregar
		if (isset($_POST['metodologia-reg']) /*&& isset($_POST['inicio-reg'])*/ )
		{
			echo $insMetodologia->agregarMetodologiaControlador();
		}

		//Eliminar
		if (isset($_POST['idMetodologia-del']) /*&& isset($_POST['inicio-reg'])*/ )
		{
			echo $insMetodologia->eliminarMetodologiaControlador();
		}

		//Actualizar
		if (isset($_POST['idMetodologia-up']) /*&& isset($_POST['inicio-reg'])*/ )
		{
			echo $insMetodologia->actualizarMetodologiaControlador();
		}


	} 
	else
	{
		session_start(['name' => 'SLM']);
		session_destroy();
		echo '<script> window.location.href="'.SERVERURL.'registro/"  </script>';
	}
	

