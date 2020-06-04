<?php
	
	if($peticionAjax)
	{
		require_once "../core/modeloPrincipal.php";
	}
	else
	{
		require_once "./core/modeloPrincipal.php";
	}


	class recursoModelo extends modeloPrincipal
	{
		protected function agregarRecursoModelo($datos)
		{
			try
			{
				$pdo = modeloPrincipal::conectarBD();
				

				$sql = "INSERT INTO tipo_recurso(descripcion_recurso, id_equipo, created, modified) VALUES(?, ?, now(), now() )";

				$pdo->prepare($sql)->execute([
					$datos['Recurso'],
					$datos['Equipo']
				]);
				

				return true;

			} catch (Exception $e) 
			{
				print_r("ERROR: ". $e);
				return false;
			}
		}

		protected function mostrarInfoRecursoModelo($codigo)
		{

			$recurso = modeloPrincipal::conectarBD()->prepare("SELECT * FROM tipo_recurso WHERE id_tipo_recurso=:Codigo");
			$recurso->bindParam("Codigo", $codigo);
			$recurso->execute();
			return $recurso;
		}


		protected function actualizarRecursoModelo($datos)
		{
			$actualizar = modeloPrincipal::conectarBD()->prepare("UPDATE tipo_recurso SET descripcion_recurso=:Recurso, modified=now() WHERE id_tipo_recurso=:IdRecurso");
			
			$actualizar->bindParam("Recurso", $datos['Recurso']);
			$actualizar->bindParam("IdRecurso", $datos['IdRecurso']);

			$actualizar->execute();
			return $actualizar;
		}

		protected function eliminarRecursoModelo($id)
		{
			$eliminar = modeloPrincipal::conectarBD()->prepare("DELETE FROM tipo_recurso WHERE id_tipo_recurso=:IdRecurso");

			$eliminar->bindParam("IdRecurso", $id);

			$eliminar->execute();

			return $eliminar;

		}


	}