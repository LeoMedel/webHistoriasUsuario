<?php
	
	$peticionAjax = true;

	require_once "../core/configGeneral.php";

	
	if (isset($_POST['tituloModulo-reg']) || isset($_POST['CodigoModulo-up']) || isset($_POST['idModulo-del']) )
	{
		
		require_once "../controladores/moduloControlador.php";
		$insModulo = new moduloControlador();

		//Agregar
		if (isset($_POST['tituloModulo-reg']) & isset($_POST['CodigoFase-reg'])  )
		{
			echo $insModulo->agregarModuloControlador();
		}

		//Actualizar
		if (isset($_POST['CodigoModulo-up']) )
		{
			echo $insModulo->actualizarModuloControlador();
		}

		//Eliminar
		if (isset($_POST['idModulo-del']) )
		{
			echo $insModulo->eliminarModuloControlador();
		}

	} 
	else
	{
		session_start(['name' => 'SLM']);
		session_destroy();
		echo '<script> window.location.href="'.SERVERURL.'login/"  </script>';
	}
	

