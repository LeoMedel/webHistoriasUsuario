<?php
	
	if($peticionAjax)
	{
		require_once "../core/modeloPrincipal.php";
	}
	else
	{
		require_once "./core/modeloPrincipal.php";
	}


	class historiaUsuarioModelo extends modeloPrincipal
	{
		protected function agregarHistoriaUsuarioModelo($datos)
		{
			try
			{
				//HISTORIA DE USUARIO
				$pdo = modeloPrincipal::conectarBD();
				$sql = "INSERT INTO historia (documento, id_actividad, created, modified) VALUES(?, ?, now(), now() )";
				$pdo->prepare($sql)->execute([
					$datos['HistoriaUsuario'],
					$datos['Actividad']
				]);

				//RESPONSABLE DE LA HISTORIA
				$pdo = modeloPrincipal::conectarBD();
				$sql = "INSERT INTO responsable (CuentaCodigo, id_actividad, created, modified) VALUES(?, ?, now(), now() )";
				$pdo->prepare($sql)->execute([
					$datos['Responsable'],
					$datos['Actividad']
				]);

				//RECURSO DE LA HISTORIA
				$pdo = modeloPrincipal::conectarBD();
				$sql = "INSERT INTO recursos (recurso, cantidad, precio, id_actividad, id_tipo_recurso, created, modified) VALUES(?, ?, ?, ?, ?, now(), now() )";
				$pdo->prepare($sql)->execute([
					$datos['Recurso'],
					$datos['CantidadRecurso'],
					$datos['PrecioRecurso'],
					$datos['Actividad'],
					$datos['TipoRecurso'],
				]);
				

				return true;

			} catch (Exception $e) 
			{
				print_r("ERROR: ". $e);
				return false;
			}
		}

		protected function mostrarHistoriaUsuarioModelo($codigo)
		{
			$info = "";
			$historia = modeloPrincipal::conectarBD()->prepare("SELECT * FROM historia WHERE id_actividad=:Codigo");
			$historia->bindParam("Codigo", $codigo);
			$historia->execute();

			$responsable = modeloPrincipal::conectarBD()->prepare("SELECT * FROM responsable r JOIN persona p ON r.CuentaCodigo=p.CuentaCodigo WHERE id_actividad=:CodigoR");
			$responsable->bindParam("CodigoR", $codigo);
			$responsable->execute();

			$recurso = modeloPrincipal::conectarBD()->prepare("SELECT * FROM recursos r JOIN tipo_recurso tr ON r.id_tipo_recurso=tr.id_tipo_recurso WHERE id_actividad=:CodigoS");
			$recurso->bindParam("CodigoS", $codigo);
			$recurso->execute();

			if ($historia->rowCount() > 0) {

				$datosHis = $historia->fetch();

				$info .="
				<div class='container-fluid'>
					<div class='panel panel-success'>
						<div class='panel-heading'>
							<h3 class='panel-title'><i class='zmdi zmdi-format-list-bulleted'></i> &nbsp;HISTORIA DE USUARIO</h3>
						</div>
						
						<div class='panel-body'>
							<fieldset>
					    		<legend><i class='zmdi zmdi-account-box'></i> &nbsp; Documento de la historia de usuario</legend>
					    		<div class='container-fluid'>
					    			<p id='historiaUsuario'> ".$datosHis['documento']."  </p>
					    		</div>
					    	</fieldset>
						</div>
					</div>
				</div>";

			} else {
				$info .= "<p> NO hay historia de Usuario </p>";
			}

			if ($responsable->rowCount() > 0) {

				$datosRes = $responsable->fetch();

				$info .="
				<div class='container-fluid'>
					<div class='panel panel-info'>
						<div class='panel-heading'>
							<h3 class='panel-title'><i class='zmdi zmdi-format-list-bulleted'></i> &nbsp;RESPONSABLE</h3>
						</div>
						
						<div class='panel-body'>
							<fieldset>
					    		<legend><i class='zmdi zmdi-account-box'></i> &nbsp; Nombre del responsable</legend>
					    		<div class='container-fluid'>
					    			<p id='historiaUsuario'> ".$datosRes['PersonaNombre']." ".$datosRes['PersonaApellido']." </p>
					    		</div>
					    	</fieldset>
						</div>
					</div>
				</div>";
			} else {
				$info .= "<p> NO hay Responsable </p>";
			}

			if ($recurso->rowCount() > 0) {

				$datosRecurso = $recurso->fetch();

				$info .="
				<div class='container-fluid'>
					<div class='panel panel-danger'>
						<div class='panel-heading'>
							<h3 class='panel-title'><i class='zmdi zmdi-format-list-bulleted'></i> &nbsp;RECURSO</h3>
						</div>
						
						<div class='panel-body'>
							<fieldset>
					    		<legend><i class='zmdi zmdi-account-box'></i> &nbsp; Informacion del recurso </legend>
					    		<div class='container-fluid'>
					    			<p id='historiaUsuario'> <b>".$datosRecurso['recurso']."</b></p>
					    			<p id='historiaUsuario'> <b>Tipo de Recurso: </b>".$datosRecurso['descripcion_recurso']." </p>
					    			<p id='historiaUsuario'> <b>Cantidad: </b>".$datosRecurso['cantidad']." </p>
					    			<p id='historiaUsuario'> <b>Precio Total: $</b>".$datosRecurso['precio']." </p>
					    		</div>
					    	</fieldset>
						</div>
					</div>
				</div>";
			} else {
				$info .= "<p> NO hay Responsable </p>";
			}
			
			

			return $info;
		}


		protected function actualizarRecursoModelo($datos)
		{
			$actualizar = modeloPrincipal::conectarBD()->prepare("UPDATE tipo_recurso SET descripcion_recurso=:Recurso, modified=now() WHERE id_tipo_recurso=:IdRecurso");
			
			$actualizar->bindParam("Recurso", $datos['Recurso']);
			$actualizar->bindParam("IdRecurso", $datos['IdRecurso']);

			$actualizar->execute();
			return $actualizar;
		}

		protected function eliminarRecursoModelo($id)
		{
			$eliminar = modeloPrincipal::conectarBD()->prepare("DELETE FROM tipo_recurso WHERE id_tipo_recurso=:IdRecurso");

			$eliminar->bindParam("IdRecurso", $id);

			$eliminar->execute();

			return $eliminar;

		}


	}