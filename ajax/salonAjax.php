<?php
	
	$peticionAjax = true;

	require_once "../core/configGeneral.php";

	if (isset($_POST['salon-reg'] ) || isset($_POST['idSalon-del'] ) || isset($_POST['idSalon-up'] ) )
	{
		
		require_once "../controladores/salonControlador.php";
		$insSalon = new salonControlador();

		//Agregar
		if (isset($_POST['salon-reg']))
		{
			echo $insSalon->agregarSalonControlador();
		}

		//Eliminar
		if (isset($_POST['idSalon-del']))
		{
			echo $insSalon->eliminarSalonControlador();
		}

		//Eliminar
		if (isset($_POST['idSalon-up']))
		{
			echo $insSalon->actualizarSalonControlador();
		}

	} 
	else
	{
		session_start(['name' => 'SLM']);
		session_destroy();
		echo '<script> window.location.href="'.SERVERURL.'registro/"  </script>';
	}
	

