<?php
	
	if($peticionAjax)
	{
		require_once "../core/modeloPrincipal.php";
	}
	else
	{
		require_once "./core/modeloPrincipal.php";
	}


	class registroModelo extends modeloPrincipal
	{
		protected function registrarUsuarioModelo($datosReg)
		{
			try
			{
				$pdo = modeloPrincipal::conectarBD();
				

				$sql = "INSERT INTO persona(PersonaDNI, PersonaNombre, PersonaApellido, PersonaTelefono, PersonaDireccion, CuentaCodigo, PersonaPrivilegio, Salon) VALUES(?, ?, ?, ?, ?, ?, ?, 'Sin salon')";


				$pdo->prepare($sql)->execute([
					$datosReg['DNI'], 
					$datosReg['Nombre'], 
					$datosReg['Apellidos'], 
					$datosReg['Telefono'], 
					$datosReg['Direccion'], 
					$datosReg['Codigo'],
					$datosReg['Privilegio']
				]);
				

				return true;

			} catch (Exception $e) 
			{
				return false;
			}
		}


	}