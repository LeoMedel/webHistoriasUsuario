<?php
	
	if($peticionAjax)
	{
		require_once "../core/modeloPrincipal.php";
	}
	else
	{
		require_once "./core/modeloPrincipal.php";
	}


	class actividadModelo extends modeloPrincipal
	{
		protected function agregarActividadModelo($datos)
		{
			try
			{
				$pdo = modeloPrincipal::conectarBD();
				

				$sql = "INSERT INTO actividades(actividad, id_modulo, id_equipo, created, modified) VALUES(?, ?, ?, now(), now() )";

				$pdo->prepare($sql)->execute([
					$datos['Actividad'], 
					$datos['Modulo'],
					$datos['Equipo']
				]);
				

				return true;

			} catch (Exception $e) 
			{
				print_r("ERROR: ". $e);
				return false;
			}
		}

		protected function mostrarInfoActividadModelo($codigo)
		{

			$actividad = modeloPrincipal::conectarBD()->prepare("SELECT * FROM actividades WHERE id_actividad=:Codigo");
			$actividad->bindParam("Codigo", $codigo);
			$actividad->execute();
			return $actividad;
		}


		protected function actualizarActividadModelo($datos)
		{
			$actualizar = modeloPrincipal::conectarBD()->prepare("UPDATE actividades SET actividad=:Titulo, id_modulo=:Modulo, modified=now() WHERE id_actividad=:IdActividad");
			
			$actualizar->bindParam("Titulo", $datos['Actividad']);
			$actualizar->bindParam("Modulo", $datos['Modulo']);
			$actualizar->bindParam("IdActividad", $datos['IdActividad']);

			$actualizar->execute();
			return $actualizar;
		}

		protected function eliminarActividadModelo($id)
		{
			$eliminar = modeloPrincipal::conectarBD()->prepare("DELETE FROM actividades WHERE id_actividad=:IdActividad");

			$eliminar->bindParam("IdActividad", $id);

			$eliminar->execute();

			return $eliminar;

		}


	}