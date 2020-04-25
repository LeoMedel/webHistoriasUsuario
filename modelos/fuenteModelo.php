<?php
	
	if($peticionAjax)
	{
		require_once "../core/modeloPrincipal.php";
	}
	else
	{
		require_once "./core/modeloPrincipal.php";
	}


	class fuenteModelo extends modeloPrincipal
	{
		protected function agregarFuenteModelo($datosFuente)
		{
			try
			{
				$pdo = modeloPrincipal::conectarBD();
				

				$sql = "INSERT INTO fuente(url, descripcion, id_metodologia, created, modified) VALUES(?, ?, ?, now(), now() )";

				print_r($sql);

				$pdo->prepare($sql)->execute([
					$datosFuente['Url'], 
					$datosFuente['Descripcion'], 
					$datosFuente['IdMetodologia']
				]);
				

				

				return true;

			} catch (Exception $e) 
			{
				return false;
			}
		}

		protected function mostrarInfoProyectoModelo($codigo)
		{

			$proyecto = modeloPrincipal::conectarBD()->prepare("SELECT * FROM proyecto WHERE id=:Codigo");
			$proyecto->bindParam("Codigo", $codigo);
			$proyecto->execute();
			return $proyecto;
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

		protected function eliminarFuenteModelo($id)
		{
			$eliminar = modeloPrincipal::conectarBD()->prepare("DELETE FROM fuente WHERE id_fuente=:IdFuente");

			$eliminar->bindParam("IdFuente", $id);

			$eliminar->execute();

			return $eliminar;

		}

	}