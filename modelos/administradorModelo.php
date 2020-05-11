<?php
	
	if($peticionAjax)
	{
		require_once "../core/modeloPrincipal.php";
	}
	else
	{
		require_once "./core/modeloPrincipal.php";
	}


	class administradorModelo extends modeloPrincipal
	{
		protected function agregarAdministradorModelo($datosAdm)
		{
			try
			{
				$pdo = modeloPrincipal::conectarBD();
				

				$sql = "INSERT INTO persona(PersonaDNI, PersonaNombre, PersonaApellido, PersonaTelefono, PersonaDireccion, CuentaCodigo, PersonaPrivilegio) VALUES(?, ?, ?, ?, ?, ?, ?)";


				$pdo->prepare($sql)->execute([
					$datosAdm['DNI'], 
					$datosAdm['Nombre'], 
					$datosAdm['Apellidos'], 
					$datosAdm['Telefono'], 
					$datosAdm['Direccion'], 
					$datosAdm['Codigo'],
					$datosAdm['Privilegio']
				]);
				

				return true;

			} catch (Exception $e) 
			{
				return false;
			}
		}

		protected function eliminarAdministradorModelo($codigo)
		{
			$eliminar = modeloPrincipal::conectarBD()->prepare("DELETE FROM persona WHERE CuentaCodigo=:Codigo");

			$eliminar->bindParam("Codigo", $codigo);

			$eliminar->execute();

			return $eliminar;

		}


		protected function mostrarInfoAdministradoresModelo($tipo, $codigo)
		{
			if($tipo=="unico"){
				$administradores = modeloPrincipal::conectarBD()->prepare("SELECT * FROM persona WHERE CuentaCodigo=:Codigo");
				$administradores->bindParam("Codigo", $codigo);
				//$administradores->bindParam("Tipo", $tipo);

			}
			elseif($tipo=="conteo")
			{
				$administradores = modeloPrincipal::conectarBD()->prepare("SELECT id FROM persona WHERE id!='1'");
			}
			
			$administradores->execute();
			return $administradores;
		}

		protected function mostrarInfoUsuariosModelo($usuario)
		{
			if ($usuario=="administrador")
			{
				$datos = modeloPrincipal::conectarBD()->prepare("SELECT id FROM persona WHERE id!='1' AND PersonaPrivilegio='Administrador'");
			}
			elseif ($usuario=="docente")
			{
				$datos = modeloPrincipal::conectarBD()->prepare("SELECT id FROM persona WHERE PersonaPrivilegio='Docente'");
			}
			else if($usuario=="estudiante")
			{
			 	$datos = modeloPrincipal::conectarBD()->prepare("SELECT id FROM persona WHERE PersonaPrivilegio='Estudiante'");
			}
			
			$datos->execute();
			return $datos;
		}

		protected function actualizarAdministradorModelo($datos)
		{
			$actualizar = modeloPrincipal::conectarBD()->prepare("UPDATE persona SET PersonaDNI=:DNI, PersonaNombre=:Nombre, PersonaApellido=:Apellido, PersonaTelefono=:Telefono, PersonaDireccion=:Direccion, PersonaPrivilegio=:Privilegio, Salon=:Salon WHERE CuentaCodigo=:Codigo");
			
			$actualizar->bindParam("DNI", $datos['DNI']);
			$actualizar->bindParam("Nombre", $datos['Nombre']);
			$actualizar->bindParam("Apellido", $datos['Apellido']);
			$actualizar->bindParam("Telefono", $datos['Telefono']);
			$actualizar->bindParam("Direccion", $datos['Direccion']);
			$actualizar->bindParam("Privilegio", $datos['Privilegio']);
			$actualizar->bindParam("Salon", $datos['Salon']);
			$actualizar->bindParam("Codigo", $datos['Codigo']);

			$actualizar->execute();
			return $actualizar;
		}

	}