<?php
	
	if($peticionAjax)
	{
		require_once "../core/modeloPrincipal.php";
	}
	else
	{
		require_once "./core/modeloPrincipal.php";
	}


	class faseModelo extends modeloPrincipal
	{
		protected function agregarFaseModelo($datos)
		{
			try
			{
				$pdo = modeloPrincipal::conectarBD();
				

				$sql = "INSERT INTO fases(fase, descripcion, fecha_inicio, fecha_fin, objetivo, id_metodologia, id_estado, created, modified) VALUES(?, ?, ?, ?, ?, ?, ?, now(), now() )";

				$idPro = $datos['Proyecto'];
				$idMetodologia = modeloPrincipal::ejecutarConsultaSimpleSQL("SELECT id_metodologia FROM proyecto_metodologia WHERE id_proyecto='$idPro'");
				$id = $idMetodologia->fetch();
				$idMetodologia = $id['id_metodologia'];

				$idEstado = 1;

				$pdo->prepare($sql)->execute([
					$datos['Fase'], 
					$datos['Descripcion'],
					$datos['Inicio'], 
					$datos['Fin'],
					$datos['Objetivo'],
					$idMetodologia,
					$idEstado
				]);
				

				return true;

			} catch (Exception $e) 
			{
				print_r("ERROR: ". $e);
				return false;
			}
		}

		protected function mostrarInfoFaseModelo($codigo)
		{

			$fase = modeloPrincipal::conectarBD()->prepare("SELECT * FROM fases WHERE id_fase=:Codigo");
			$fase->bindParam("Codigo", $codigo);
			$fase->execute();
			return $fase;
		}


		protected function actualizarFaseModelo($datos)
		{
			$actualizar = modeloPrincipal::conectarBD()->prepare("UPDATE fases SET fase=:Titulo, descripcion=:Descripcion, fecha_inicio=:Inicio, fecha_fin=:Fin, objetivo=:Objetivo, modified=now() WHERE id_fase=:IdFase");
			
			$actualizar->bindParam("Titulo", $datos['Fase']);
			$actualizar->bindParam("Descripcion", $datos['Descripcion']);
			$actualizar->bindParam("Inicio", $datos['Inicio']);
			$actualizar->bindParam("Fin", $datos['Fin']);
			$actualizar->bindParam("Objetivo", $datos['Objetivo']);
			$actualizar->bindParam("IdFase", $datos['IdFase']);

			$actualizar->execute();
			return $actualizar;
		}

		protected function eliminarFaseModelo($id)
		{
			$eliminar = modeloPrincipal::conectarBD()->prepare("DELETE FROM fases WHERE id_fase=:IdFase");

			$eliminar->bindParam("IdFase", $id);

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