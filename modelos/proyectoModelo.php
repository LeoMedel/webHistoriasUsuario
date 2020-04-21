<?php
	
	if($peticionAjax)
	{
		require_once "../core/modeloPrincipal.php";
	}
	else
	{
		require_once "./core/modeloPrincipal.php";
	}


	class proyectoModelo extends modeloPrincipal
	{
		protected function agregarProyectoModelo($datosPro)
		{
			try
			{
				$pdo = modeloPrincipal::conectarBD();
				

				$sql = "INSERT INTO proyecto(titulo, inicio, fin, cuentaCreador) VALUES(?, ?, ?, ?)";


				$pdo->prepare($sql)->execute([
					$datosPro['Titulo'], 
					$datosPro['Inicio'], 
					$datosPro['Fin'],
					$datosPro['Cuenta']
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
			$actualizar = modeloPrincipal::conectarBD()->prepare("UPDATE proyecto SET titulo=:Titulo, inicio=:Inicio, fin=:Fin WHERE id=:IdProyecto");
			
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