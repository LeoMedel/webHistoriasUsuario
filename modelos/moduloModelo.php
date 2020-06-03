<?php
	
	if($peticionAjax)
	{
		require_once "../core/modeloPrincipal.php";
	}
	else
	{
		require_once "./core/modeloPrincipal.php";
	}


	class moduloModelo extends modeloPrincipal
	{
		protected function agregarModuloModelo($datos)
		{
			try
			{
				$pdo = modeloPrincipal::conectarBD();
				

				$sql = "INSERT INTO modulo(titulo, descripcion, observacion, id_fase, id_equipo, created, modified) VALUES(?, ?, ?, ?, ?, now(), now() )";


				$pdo->prepare($sql)->execute([
					$datos['Modulo'], 
					$datos['Descripcion'],
					$datos['Observacion'], 
					$datos['Fase'],
					$datos['Equipo']

				]);
				

				return true;

			} catch (Exception $e) 
			{
				print_r("ERROR: ". $e);
				return false;
			}
		}

		protected function mostrarInfoModuloModelo($codigo)
		{

			$modulo = modeloPrincipal::conectarBD()->prepare("SELECT * FROM modulo WHERE id_modulo=:Codigo");
			$modulo->bindParam("Codigo", $codigo);
			$modulo->execute();
			return $modulo;
		}


		protected function actualizarModuloModelo($datos)
		{
			$actualizar = modeloPrincipal::conectarBD()->prepare("UPDATE modulo SET titulo=:Titulo, descripcion=:Descripcion, observacion=:Observacion, modified=now() WHERE id_modulo=:IdModulo");
			
			$actualizar->bindParam("Titulo", $datos['Modulo']);
			$actualizar->bindParam("Descripcion", $datos['Descripcion']);
			$actualizar->bindParam("Observacion", $datos['Observacion']);
			$actualizar->bindParam("IdModulo", $datos['idModulo']);

			$actualizar->execute();
			return $actualizar;
		}

		protected function eliminarModuloModelo($id)
		{
			$eliminar = modeloPrincipal::conectarBD()->prepare("DELETE FROM modulo WHERE id_modulo=:IdModulo");

			$eliminar->bindParam("IdModulo", $id);

			$eliminar->execute();

			return $eliminar;

		}

		protected function cargarProyectosModelo($id)
		{

			$metodologia = modeloPrincipal::conectarBD()->prepare("SELECT * FROM proyecto WHERE cuentaCreador ='$id'");
			$metodologia->execute();
			return $metodologia;
		}

		protected function asignarMetodologiaProyectoModelo($datos)
		{
			try
			{
				$pdo = modeloPrincipal::conectarBD();
				

				$sql = "INSERT INTO proyecto_metodologia(id_proyecto, id_metodologia, objetivo, created, modified) VALUES(?, ?, ?, now(), now() )";

				print_r("Consulta ".$sql);

				$pdo->prepare($sql)->execute([
					$datos['idProyecto'], 
					$datos['idMetodologia'], 
					$datos['Objetivo']
				]);
				

				return true;

			} catch (Exception $e) 
			{
				return false;
			}
		}

		protected function asignarProyectoEquipoModelo($datos)
		{
			try
			{
				$pdo = modeloPrincipal::conectarBD();
				

				$sql = "INSERT INTO asignacion(id_proyecto, id_equipo, id_estado, created, modified) VALUES(?, ?, ?, now(), now() )";

				//print_r("Consulta ".$sql);

				$pdo->prepare($sql)->execute([
					$datos['idProyecto'], 
					$datos['idEquipo'], 
					$datos['Estado']
				]);
				

				return true;

			} catch (Exception $e) 
			{
				print_r("ERROR: ". $e);
				return false;
			}

		}

		protected function eliminarMetodologiaProyectoModelo($idProyecto)
		{
			$eliminar = modeloPrincipal::conectarBD()->prepare("DELETE FROM proyecto_metodologia WHERE id_proyecto_metodologia=:IdProyecto");

			$eliminar->bindParam("IdProyecto", $idProyecto);

			$eliminar->execute();

			return $eliminar;

		}

		protected function eliminarProyectoEquipoModelo($idProyecto)
		{
			$eliminar = modeloPrincipal::conectarBD()->prepare("DELETE FROM asignacion WHERE id_asignacion=:IdProyecto");

			$eliminar->bindParam("IdProyecto", $idProyecto);

			$eliminar->execute();

			return $eliminar;

		}

	}