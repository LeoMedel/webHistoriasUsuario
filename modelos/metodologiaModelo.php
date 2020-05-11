<?php
	
	if($peticionAjax)
	{
		require_once "../core/modeloPrincipal.php";
	}
	else
	{
		require_once "./core/modeloPrincipal.php";
	}


	class metodologiaModelo extends modeloPrincipal
	{
		protected function agregarMetodologiaModelo($datosMetodologia)
		{
			try
			{
				$pdo = modeloPrincipal::conectarBD();
				

				$sql = "INSERT INTO metodologia(metodologia, descripcion, cuentaCreador, created, modified) VALUES(?, ?, ?, now(), now() )";


				$pdo->prepare($sql)->execute([
					$datosMetodologia['Metodologia'], 
					$datosMetodologia['Descripcion'],
					$datosMetodologia['Creador']
				]);
				

				return true;

			} catch (Exception $e) 
			{
				return false;
			}
		}

		protected function mostrarInfoMetodologiaModelo($id)
		{

			$metodologia = modeloPrincipal::conectarBD()->prepare("SELECT * FROM metodologia WHERE id_metodologia=:Id");
			$metodologia->bindParam("Id", $id);
			$metodologia->execute();
			return $metodologia;
		}

		protected function cargarMetodologiasModelo($cuenta)
		{

			$metodologia = modeloPrincipal::conectarBD()->prepare("SELECT * FROM metodologia WHERE cuentaCreador='$cuenta'");
			$metodologia->execute();
			return $metodologia;
		}


		protected function actualizarMetodologiaModelo($datos)
		{
			$actualizar = modeloPrincipal::conectarBD()->prepare("UPDATE metodologia SET metodologia=:Titulo, descripcion=:Descripcion, modified=now() WHERE id_metodologia=:IdMetodologia");
			
			$actualizar->bindParam("Titulo", $datos['Metodologia']);
			$actualizar->bindParam("Descripcion", $datos['Descripcion']);
			$actualizar->bindParam("IdMetodologia", $datos['IdMetodologia']);

			//print_r($datos['Metodologia']." ". $datos['Descripcion']. " ".$datos['IdMetodologia']);

			$actualizar->execute();
			return $actualizar;
		}

		protected function eliminarMetodologiaModelo($id)
		{
			$eliminar = modeloPrincipal::conectarBD()->prepare("DELETE FROM metodologia WHERE id_metodologia=:IdMetodologia");

			$eliminar->bindParam("IdMetodologia", $id);

			$eliminar->execute();

			return $eliminar;

		}

		protected function eliminarMetodologiaFuentesModelo($id)
		{
			$noFuentes = modeloPrincipal::ejecutarConsultaSimpleSQL("SELECT * FROM fuente WHERE id_metodologia=$id");

			if ($noFuentes->rowCount() == 0) {
				return true;
			} else {
				$eliminar = modeloPrincipal::conectarBD()->prepare("DELETE FROM fuente WHERE id_metodologia=:IdMetodologia");

				$eliminar->bindParam("IdMetodologia", $id);

				$eliminar->execute();

				return true;
			}
			

			

		}

	}