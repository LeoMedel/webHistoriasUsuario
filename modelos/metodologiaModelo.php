<?php
	
	if($peticionAjax)
	{
		require_once "../core/modeloPrincipal.php";
	}
	else
	{
		require_once "./core/modeloPrincipal.php";
	}


	class metodologiaModelo extends modeloPrincipal
	{
		protected function agregarMetodologiaModelo($datosMetodologia)
		{
			try
			{
				$pdo = modeloPrincipal::conectarBD();
				

				$sql = "INSERT INTO metodologia(metodologia, descripcion, created, modified) VALUES(?, ?, now(), now() )";


				$pdo->prepare($sql)->execute([
					$datosMetodologia['Metodologia'], 
					$datosMetodologia['Descripcion']
				]);
				

				return true;

			} catch (Exception $e) 
			{
				return false;
			}
		}

		protected function mostrarInfoMetodologiaModelo($id)
		{

			$metodologia = modeloPrincipal::conectarBD()->prepare("SELECT * FROM metodologia WHERE id_metodologia=:Id");
			$metodologia->bindParam("Id", $id);
			$metodologia->execute();
			return $metodologia;
		}


		protected function actualizarProyectoModelo($datos)
		{
			$actualizar = modeloPrincipal::conectarBD()->prepare("UPDATE proyecto SET titulo=:Titulo, inicio=:Inicio, fin=:Fin, modified=now() WHERE id=:IdProyecto");
			
			$actualizar->bindParam("Titulo", $datos['Titulo']);
			$actualizar->bindParam("Inicio", $datos['Inicio']);
			$actualizar->bindParam("Fin", $datos['Fin']);
			$actualizar->bindParam("IdProyecto", $datos['IdProyecto']);

			$actualizar->execute();
			return $actualizar;
		}

		protected function eliminarProyectoModelo($id)
		{
			$eliminar = modeloPrincipal::conectarBD()->prepare("DELETE FROM proyecto WHERE id=:IdProyecto");

			$eliminar->bindParam("IdProyecto", $id);

			$eliminar->execute();

			return $eliminar;

		}

	}