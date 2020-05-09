<?php
	
	if($peticionAjax)
	{
		require_once "../core/modeloPrincipal.php";
	}
	else
	{
		require_once "./core/modeloPrincipal.php";
	}


	class salonModelo extends modeloPrincipal
	{
		protected function agregarSalonModelo($datos)
		{
			try
			{
				$pdo = modeloPrincipal::conectarBD();
				

				$sql = "INSERT INTO salon(salon) VALUES(?)";


				$pdo->prepare($sql)->execute([
					$datos['Salon']
				]);
				

				return true;

			} catch (Exception $e) 
			{
				return false;
			}
		}

		protected function actualizarSalonModelo($datos)
		{
			$actualizar = modeloPrincipal::conectarBD()->prepare("UPDATE salon SET Salon=:Salon WHERE id_salon=:IdSalon");
			
			$actualizar->bindParam("Salon", $datos['Salon']);
			$actualizar->bindParam("IdSalon", $datos['IdSalon']);

			$actualizar->execute();
			return $actualizar;
		}

		protected function mostrarInfoSalonModelo($codigo)
		{

			$salon = modeloPrincipal::conectarBD()->prepare("SELECT * FROM salon WHERE id_salon=:Codigo");
			$salon->bindParam("Codigo", $codigo);
			$salon->execute();
			return $salon;
		}


		protected function eliminarSalonModelo($id)
		{
			$eliminar = modeloPrincipal::conectarBD()->prepare("DELETE FROM salon WHERE id_salon=:IdSalon");

			$eliminar->bindParam("IdSalon", $id);

			$eliminar->execute();

			return $eliminar;
		}


	}