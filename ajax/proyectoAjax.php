<?php
	
	$peticionAjax = true;

	require_once "../core/configGeneral.php";

	if (isset($_POST['titulo-reg']) || isset($_POST['idProyecto-up']) || isset($_POST['idProyecto-del']) )
	{
		
		require_once "../controladores/proyectoControlador.php";
		$insProyecto = new proyectoControlador();

		//Agregar
		if (isset($_POST['titulo-reg']) /*&& isset($_POST['inicio-reg'])*/ )
		{
			echo $insProyecto->agregarProyectoControlador();
		}

		//Actualizar
		if (isset($_POST['idProyecto-up']) /*&& isset($_POST['inicio-reg'])*/ )
		{
			echo $insProyecto->actualizarProyectoControlador();
		}


		//Eliminar
		if (isset($_POST['idProyecto-del']) ) 
		{
			echo $insProyecto->eliminarProyectoControlador();
		}

	} 
	else
	{
		session_start(['name' => 'SLM']);
		session_destroy();
		echo '<script> window.location.href="'.SERVERURL.'login/"  </script>';
	}
	

