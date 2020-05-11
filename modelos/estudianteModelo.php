<?php
	
	if($peticionAjax)
	{
		require_once "../core/modeloPrincipal.php";
	}
	else
	{
		require_once "./core/modeloPrincipal.php";
	}


	class estudianteModelo extends modeloPrincipal
	{
		protected function agregarEstudianteModelo($datosEs)
		{
			try
			{
				$pdo = modeloPrincipal::conectarBD();
				

				$sql = "INSERT INTO persona(PersonaDNI, PersonaNombre, PersonaApellido, PersonaTelefono, PersonaDireccion, CuentaCodigo, PersonaPrivilegio, Salon) VALUES(?, ?, ?, ?, ?, ?, ?, 'Sin salon')";


				$pdo->prepare($sql)->execute([
					$datosEs['DNI'], 
					$datosEs['Nombre'], 
					$datosEs['Apellidos'], 
					$datosEs['Telefono'], 
					$datosEs['Direccion'], 
					$datosEs['Codigo'],
					$datosEs['Privilegio']
				]);
				

				return true;

			} catch (Exception $e) 
			{
				return false;
			}
		}

		protected function eliminarEstudianteModelo($codigo)
		{
			$eliminar = modeloPrincipal::conectarBD()->prepare("DELETE FROM persona WHERE CuentaCodigo=:Codigo");

			$eliminar->bindParam("Codigo", $codigo);

			$eliminar->execute();

			return $eliminar;

		}


		protected function mostrarInfoEstudiantesModelo($tipo, $codigo)
		{
			if($tipo=="unico"){
				$administradores = modeloPrincipal::conectarBD()->prepare("SELECT * FROM persona as p INNER JOIN cuenta as c ON p.CodigoCuenta=c.CodigoCeunta  WHERE CuentaCodigo=:Codigo");
				$administradores->bindParam("Codigo", $codigo);

			}
			elseif($tipo=="conteo")
			{
				$administradores = modeloPrincipal::conectarBD()->prepare("SELECT id FROM persona WHERE id!='1'");
			}
			
			$administradores->execute();
			return $administradores;
		}

		protected function actualizarEstudianteModelo($datos)
		{
			$actualizar = modeloPrincipal::conectarBD()->prepare("UPDATE admin SET AdminDNI=:DNI, AdminNombre=:Nombre, AdminApellido=:Apellido, AdminTelefono=:Telefono, AdminDireccion=:Direccion WHERE CuentaCodigo=:Codigo");
			
			$actualizar->bindParam("DNI", $datos['DNI']);
			$actualizar->bindParam("Nombre", $datos['Nombre']);
			$actualizar->bindParam("Apellido", $datos['Apellido']);
			$actualizar->bindParam("Telefono", $datos['Telefono']);
			$actualizar->bindParam("Direccion", $datos['Direccion']);
			$actualizar->bindParam("Codigo", $datos['Codigo']);

			$actualizar->execute();
			return $actualizar;
		}

		protected function cargarTodoMiProyectoModelo($idPro)
		{

			$proyecto = modeloPrincipal::conectarBD()->prepare("SELECT * FROM proyecto WHERE id_proyecto=:IdPro");
			$proyecto->bindParam("IdPro", $idPro);
			$proyecto->execute();
			$datosPro = $proyecto->fetch();

			$datosProyecto = [
				"titulo" => $datosPro['titulo'],
				"fecha_inicio" => $datosPro['fecha_inicio'],
				"fecha_fin" => $datosPro['fecha_fin'],
				"metodologia" => "Sin metodologia",//$datosMet['metodologia'],
				"objetivoMet" => "Objetivo NO definido",//$datos['objetivo'],
				"descripcionMet" => "Sin descripcion"//$datosMet['descripcion'],

			];

			$infoProyecto = modeloPrincipal::conectarBD()->prepare("SELECT * FROM proyecto_metodologia  WHERE id_proyecto=:Id");
			$infoProyecto->bindParam("Id", $idPro);
			$infoProyecto->execute();
			$datos = $infoProyecto->fetch();

			if ($infoProyecto->rowCount()>0) {
				$datosProyecto['objetivoMet'] = $datos['objetivo'];

				$metodologia = modeloPrincipal::conectarBD()->prepare("SELECT * FROM metodologia WHERE id_metodologia=:IdMet");
				$metodologia->bindParam("IdMet", $datos['id_metodologia']);
				$metodologia->execute();
				$datosMet = $metodologia->fetch();

				$datosProyecto['metodologia'] = $datosMet['metodologia'];
				$datosProyecto['descripcionMet'] = $datosMet['descripcion'];

			}
			


			return $datosProyecto;

		}

		protected function cargarTodoMiEquipoModelo($idEquipo)
		{
			$infoEquipo = modeloPrincipal::conectarBD()->prepare("SELECT * FROM equipo WHERE id_equipo=:Id");
			$infoEquipo->bindParam("Id", $idEquipo);
			$infoEquipo->execute();
			$datos = $infoEquipo->fetch();

			$equipo = modeloPrincipal::conectarBD()->prepare("SELECT p.PersonaNombre, p.PersonaApellido, p.PersonaTelefono, c.CuentaEmail FROM cuenta_equipo as ce INNER JOIN cuenta as c ON ce.CuentaCodigo = c.CuentaCodigo INNER JOIN persona p ON p.CuentaCodigo = ce.CuentaCodigo WHERE ce.id_equipo =:Id");
			$equipo->bindParam("Id", $idEquipo);
			$equipo->execute();


			$datosEquipo = [
				"equipo" => $datos['equipo'],
				"integrantes" => $equipo

			];

			return $datosEquipo;
		}

	}