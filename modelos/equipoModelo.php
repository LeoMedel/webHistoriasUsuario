<?php
	
	if($peticionAjax)
	{
		require_once "../core/modeloPrincipal.php";
	}
	else
	{
		require_once "./core/modeloPrincipal.php";
	}


	class equipoModelo extends modeloPrincipal
	{
		protected function agregarEquipoModelo($datosEq)
		{
			try
			{
				$pdo = modeloPrincipal::conectarBD();
				

				$sql = "INSERT INTO equipo(equipo, cuentaCreador, created, modified) VALUES(?, ?, now(), now() )";

				//print_r("Consulta ".$sql);

				$pdo->prepare($sql)->execute([
					$datosEq['Titulo'],
					$datosEq['Creador']

				]);
				

				return true;

			} catch (Exception $e) 
			{
				return false;
			}
		}

		protected function mostrarInfoEquipoModelo($codigo)
		{

			$equipo = modeloPrincipal::conectarBD()->prepare("SELECT * FROM equipo WHERE id_equipo=:Codigo");
			$equipo->bindParam("Codigo", $codigo);
			$equipo->execute();
			return $equipo;
		}


		protected function actualizarEquipoModelo($datos)
		{
			$actualizar = modeloPrincipal::conectarBD()->prepare("UPDATE equipo SET equipo=:Titulo, modified=now() WHERE id_equipo=:IdEquipo");
			
			$actualizar->bindParam("Titulo", $datos['Titulo']);
			$actualizar->bindParam("IdEquipo", $datos['IdEquipo']);

			$actualizar->execute();
			return $actualizar;
		}

		protected function eliminarEquipoModelo($id)
		{
			$eliminar = modeloPrincipal::conectarBD()->prepare("DELETE FROM equipo WHERE id_equipo=:IdEquipo");

			$eliminar->bindParam("IdEquipo", $id);

			$eliminar->execute();

			return $eliminar;

		}

		protected function cargarEquipoIntegrantesModelo($idEquipo)
		{
			try
			{
				//$pdo = modeloPrincipal::conectarBD();
				
				$integrantes = modeloPrincipal::EjecutarConsultaSimpleSQL("SELECT * FROM cuenta_equipo ce JOIN cuenta c ON ce.CuentaCodigo = c.CuentaCodigo JOIN persona p ON c.CuentaCodigo=p.CuentaCodigo  WHERE id_equipo = $idEquipo");

				/*$sql = "SELECT * FROM cuenta_equipo ce JOIN cuenta c ON ce.CuentaCodigo = c.CuentaCodigo JOIN persona p ON c.CuentaCodigo=p.CuentaCodigo  WHERE id_equipo = ? ";

				//print_r("Consulta ".$sql. " ".$datos['idEquipo']. " ". $datos['cuentaEstudiante']);

				$pdo->prepare($sql)->execute([
					$idEquipo
				]);
				*/
				

				return $integrantes;

			} catch (Exception $e) 
			{
				print_r("ERROR ". $e);
				//return $pdo;
			}
		}

		protected function eliminarTodosEstudiantesEquipoModelo()
		{
			$eliminar = modeloPrincipal::conectarBD()->prepare("DELETE FROM cuenta_equipo WHERE id_equipo=:IdEquipo");

			$eliminar->bindParam("IdEquipo", $idEquipo);

			$eliminar->execute();

			return $eliminar;
		}

		protected function eliminarEquipoEstudianteModelo($idEquipo)
		{
			$eliminar = modeloPrincipal::conectarBD()->prepare("DELETE FROM cuenta_equipo WHERE id_equipo_usuario=:IdEquipo");

			$eliminar->bindParam("IdEquipo", $idEquipo);

			$eliminar->execute();

			return $eliminar;
		}

		protected function cargarProyectosModelo($id)
		{

			$metodologia = modeloPrincipal::conectarBD()->prepare("SELECT * FROM proyecto WHERE cuentaCreador ='$id'");
			$metodologia->execute();
			return $metodologia;
		}

		protected function asignarEquipoEstudianteModelo($datos)
		{
			try
			{
				$pdo = modeloPrincipal::conectarBD();
				

				$sql = "INSERT INTO cuenta_equipo(CuentaCodigo, id_equipo, cuentaCreador, created, modified) VALUES(?, ?, ?, now(), now() )";

				//print_r("Consulta ".$sql. " ".$datos['idEquipo']. " ". $datos['cuentaEstudiante']);

				$pdo->prepare($sql)->execute([
					$datos['cuentaEstudiante'], 
					$datos['idEquipo'],
					$datos['Creador']
				]);
				

				return true;

			} catch (Exception $e) 
			{
				//print_r("ERROR ". $e);
				return false;
			}
		}

	}