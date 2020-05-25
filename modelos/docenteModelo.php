<?php
	
	if($peticionAjax)
	{
		require_once "../core/modeloPrincipal.php";
	}
	else
	{
		require_once "./core/modeloPrincipal.php";
	}


	class docenteModelo extends modeloPrincipal
	{
		protected function agregarDocenteModelo($datosDoc)
		{
			try
			{
				$pdo = modeloPrincipal::conectarBD();
				

				$sql = "INSERT INTO persona(PersonaDNI, PersonaNombre, PersonaApellido, PersonaTelefono, PersonaDireccion, CuentaCodigo, PersonaPrivilegio, Salon) VALUES(?, ?, ?, ?, ?, ?, ?, '4')";


				$pdo->prepare($sql)->execute([
					$datosDoc['DNI'], 
					$datosDoc['Nombre'], 
					$datosDoc['Apellidos'], 
					$datosDoc['Telefono'], 
					$datosDoc['Direccion'], 
					$datosDoc['Codigo'],
					$datosDoc['Privilegio']
				]);
				

				return true;

			} catch (Exception $e) 
			{
				return false;
			}
		}

		protected function eliminarDocenteModelo($codigo)
		{
			$eliminar = modeloPrincipal::conectarBD()->prepare("DELETE FROM persona WHERE CuentaCodigo=:Codigo");

			$eliminar->bindParam("Codigo", $codigo);

			$eliminar->execute();

			return $eliminar;

		}


		protected function mostrarInfoDocentesModelo($tipo, $codigo)
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

		protected function actualizarAdministradorModelo($datos)
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

	}