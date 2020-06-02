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
				

				$sql = "INSERT INTO proyecto(titulo, fecha_inicio, fecha_fin, cuentaCreador, created, modified) VALUES(?, ?, ?, ?, now(), now() )";

				//print_r("Consulta ".$sql);

				$pdo->prepare($sql)->execute([
					$datosPro['Titulo'], 
					$datosPro['Inicio'], 
					$datosPro['Fin'],
					$datosPro['Cuenta']
				]);
				

				return true;

			} catch (Exception $e) 
			{
				print_r("ERROR: ". $e);
				return false;
			}
		}

		protected function mostrarInfoProyectoModelo($codigo)
		{

			$proyecto = modeloPrincipal::conectarBD()->prepare("SELECT * FROM proyecto WHERE id_proyecto=:Codigo");
			$proyecto->bindParam("Codigo", $codigo);
			$proyecto->execute();
			return $proyecto;
		}

		protected function mostrarProyectoEquipoModelo($codigo)
		{
			try {

				$proyecto = modeloPrincipal::conectarBD()->prepare("SELECT equipo FROM asignacion a JOIN equipo e ON a.id_equipo=e.id_equipo WHERE id_proyecto=:Codigo");
				$proyecto->bindParam("Codigo", $codigo);
				$proyecto->execute();

				if ($proyecto->rowCount() > 0) {

					$equipo = $proyecto->fetch();
					$info = "<h1>\"".$equipo['equipo']."\"</h1>";

					$proyecto = modeloPrincipal::conectarBD()->prepare("SELECT metodologia FROM proyecto_metodologia pm JOIN metodologia m ON pm.id_metodologia=m.id_metodologia WHERE pm.id_proyecto=:Codigo");
					$proyecto->bindParam("Codigo", $codigo);
					$proyecto->execute();

					if ($proyecto->rowCount() > 0) {
						$metodologia = $proyecto->fetch();
						$info .= "<br> <h1> Metodología:  \"".$metodologia['metodologia']."\"</h1>";
						
					} else {
						$info .= "<p> Sin informacion de la metodologia </p>";	
					}
					


					$info .= "";

				} else {
					$info = "<p> Sin informacion del proyecto:  ".$codigo." </p>";
				}
				

			} catch (Exception $e) {
				$info = "Error:  ". $e;
			}
			

			return $info;
		}


		protected function actualizarProyectoModelo($datos)
		{
			$actualizar = modeloPrincipal::conectarBD()->prepare("UPDATE proyecto SET titulo=:Titulo, fecha_inicio=:Inicio, fecha_fin=:Fin, modified=now() WHERE id_proyecto=:IdProyecto");
			
			$actualizar->bindParam("Titulo", $datos['Titulo']);
			$actualizar->bindParam("Inicio", $datos['Inicio']);
			$actualizar->bindParam("Fin", $datos['Fin']);
			$actualizar->bindParam("IdProyecto", $datos['IdProyecto']);

			$actualizar->execute();
			return $actualizar;
		}

		protected function eliminarProyectoModelo($id)
		{
			$eliminar = modeloPrincipal::conectarBD()->prepare("DELETE FROM proyecto WHERE id_proyecto=:IdProyecto");

			$eliminar->bindParam("IdProyecto", $id);

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
				

				$sql = "INSERT INTO proyecto_metodologia(id_proyecto, id_metodologia, objetivo, cuentaCreador, created, modified) VALUES(?, ?, ?, ?, now(), now() )";

				//print_r("Consulta ".$sql);

				$pdo->prepare($sql)->execute([
					$datos['idProyecto'], 
					$datos['idMetodologia'], 
					$datos['Objetivo'],
					$datos['Creador']
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
				

				$sql = "INSERT INTO asignacion(id_proyecto, id_equipo, id_estado, cuentaCreador, created, modified) VALUES(?, ?, ?, ?, now(), now() )";

				//print_r("Consulta ".$sql);

				$pdo->prepare($sql)->execute([
					$datos['idProyecto'], 
					$datos['idEquipo'], 
					$datos['Estado'],
					$datos['Creador']
				]);
				

				return true;

			} catch (Exception $e) 
			{
				//print_r("ERROR: ". $e);
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