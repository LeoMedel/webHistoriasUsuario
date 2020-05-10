<?php
	
	if($peticionAjax)
	{
		require_once "../core/modeloPrincipal.php";
	}
	else
	{
		require_once "./core/modeloPrincipal.php";
	}


	/**
	 * 
	 */
	class cuentaControlador extends modeloPrincipal
	{
		
		public function mostrarCuentaControlador($codigo, $tipo)
		{
			$codigo = modeloPrincipal::desencriptar($codigo);
			
			$tipo = modeloPrincipal::limpiarCadena($tipo);

			if($tipo=="admin")
			{
				$tipo = "Administrador";
			}
			elseif($tipo=="user")
			{
				$tipo="Cliente";
			}
			elseif($tipo=="docente")
			{
				$tipo="Docente";
			}
			elseif($tipo=="estudiante")
			{
				$tipo="Estudiante";
			}



			return modeloPrincipal::mostrarCuenta($codigo, $tipo);
		}


		public function actualizarCuentaControlador()
		{
			$cuentaCodigo = modeloPrincipal::desencriptar($_POST['CodigoCuenta-up']);
			$cuentaTipo = modeloPrincipal::desencriptar($_POST['TipoCuenta-up']);


			$consulta = modeloPrincipal::ejecutarConsultaSimpleSQL("SELECT * FROM cuenta WHERE CuentaCodigo='$cuentaCodigo'");

			$datosCuenta = $consulta->fetch();


			$user = modeloPrincipal::limpiarCadena($_POST['userLog-up']);

			$password = modeloPrincipal::limpiarCadena($_POST['passwordLog-up']);
			$password = modeloPrincipal::encriptar($password);


			if ($user!="" && $password!="")
			{
				if (isset($_POST['privilegio-up']) )
				{
					$login = modeloPrincipal::ejecutarConsultaSimpleSQL("SELECT id FROM cuenta WHERE CuentaUsuario='$user' AND CuentaClave='$password'");
				}
				else
				{
					$login = modeloPrincipal::ejecutarConsultaSimpleSQL("SELECT id FROM cuenta WHERE CuentaUsuario='$user' AND CuentaClave='$password' AND CuentaCodigo='$cuentaCodigo'");
				}


				if ($login->rowCount() ==0) {
					$alerta = [
						"Alerta" => "simple",
						"Titulo" => "Error",
						"Texto" => "Su cuenta NO es correcta. Intentelo nuevamente.",
						"Tipo" => "error"
					];

					return modeloPrincipal::mostrarAlerta($alerta);
					exit();
				}
				
				
			}
			else
			{
				$alerta = [
						"Alerta" => "simple",
						"Titulo" => "Error",
						"Texto" => "Para actualizar es necesario el Usuario y su contraseña. Intentelo nuevamente.",
						"Tipo" => "error"
					];

				return modeloPrincipal::mostrarAlerta($alerta);
				exit();
			}


			//VERIFICAR NOMBRE DE USUARIO
			$cuentaUsuario = modeloPrincipal::limpiarCadena($_POST['usuario-up']);

			if ($cuentaUsuario != $datosCuenta['CuentaUsuario']) {
				$consultaSimple = modeloPrincipal::ejecutarConsultaSimpleSQL("SELECT CuentaUsuario FROM cuenta WHERE CuentaUsuario='$cuentaUsuario'");


				if($consultaSimple->rowCount()>=1)
				{
					$alerta = [
						"Alerta" => "simple",
						"Titulo" => "Error",
						"Texto" => "El nombre de Usuario ya esta registrado en el Sistema. Intente uno distinto.",
						"Tipo" => "error"
					];

					return modeloPrincipal::mostrarAlerta($alerta);
					exit();
				}
			}

			//VERIFICAR EMAIL
			$cuentaEmail = modeloPrincipal::limpiarCadena($_POST['email-up']);

			if ($cuentaEmail != $datosCuenta['CuentaEmail']) {
				$consultaSimpleEmail = modeloPrincipal::ejecutarConsultaSimpleSQL("SELECT CuentaEmail FROM cuenta WHERE CuentaEmail='$cuentaEmail'");

				if($consultaSimpleEmail->rowCount()>=1)
				{
					$alerta = [
						"Alerta" => "simple",
						"Titulo" => "Error",
						"Texto" => "El Email ya esta registrado en el Sistema. Intente uno distinto.",
						"Tipo" => "error"
					];

					return modeloPrincipal::mostrarAlerta($alerta);
					exit();
				}
			}

			
			//VERIFICAR GENERO
			$cuentaGenero = modeloPrincipal::limpiarCadena($_POST['optionsGenero-up']);

			//VERIFICAR ESTADO DE LA CUENTA
			if (isset($_POST['optionsEstado-up']) )
			{
				$cuentaEstado = modeloPrincipal::limpiarCadena($_POST['optionsEstado-up']);
			}
			else
			{
				$cuentaEstado = $datosCuenta['CuentaEstado'];
			}

			


			if($cuentaTipo == "admin")
			{
				
				if($cuentaGenero=="Masculino")
				{
					$cuentaFoto = "adminHombre.png";
				}
				else
				{
					$cuentaFoto = "adminMuer.png";
				}

				$cuentaTipo = 1;
			}
			if($cuentaTipo == "docente")
			{
				
				if($cuentaGenero=="Masculino")
				{
					$cuentaFoto = "docenteHombre.png";
				}
				else
				{
					$cuentaFoto = "docenteMujer.png";
				}

				$cuentaTipo = 2;
			}
			if($cuentaTipo == "estudiante")
			{
				
				if($cuentaGenero=="Masculino")
				{
					$cuentaFoto = "estudianteHombre.png";
				}
				else
				{
					$cuentaFoto = "estudianteMujer.png";
				}

				$cuentaTipo = 3;
			}


			//VERIFICAR CONTRASEÑA
			$newPassword1 = modeloPrincipal::limpiarCadena($_POST['newPassword1-up']);
			$newPassword2 = modeloPrincipal::limpiarCadena($_POST['newPassword2-up']);

			if ($newPassword1 !="" || $newPassword2!="")
			{
				if($newPassword1 == $newPassword2)
				{
					$cuentaClave = modeloPrincipal::encriptar($newPassword1);
				}
				else
				{
					$alerta = [
						"Alerta" => "simple",
						"Titulo" => "Error",
						"Texto" => "Las contraseñas NO coinciden. Intentelo nuevamente.",
						"Tipo" => "error"
					];

					return modeloPrincipal::mostrarAlerta($alerta);
					exit();
				}
				
			}
			else
			{
				$cuentaClave = $datosCuenta['CuentaClave'];
			}
			

			//ACTUALIZAR CUENTA EN EL MODELO
			$nuevosDatos = [

				"CuentaCodigo" => $cuentaCodigo,
				"CuentaUsuario" => $cuentaUsuario,
				"CuentaClave" => $cuentaClave,
				"CuentaEmail" => $cuentaEmail,
				"CuentaEstado" => $cuentaEstado,
				"CuentaRol" => $cuentaTipo,			
				"CuentaGenero" => $cuentaGenero,
				"CuentaFoto" => $cuentaFoto,
				
			];


			if (modeloPrincipal::actualizarCuenta($nuevosDatos))
			{

				$alerta = [
						"Alerta" => "recargar",
						"Titulo" => "Éxito",
						"Texto" => "La cuenta ha sido actualizada.",
						"Tipo" => "success"
					];
			}
			else
			{
				$alerta = [
						"Alerta" => "simple",
						"Titulo" => "Error",
						"Texto" => "No se ha podido actualizar la cuenta. Intentelo mas tarde.",
						"Tipo" => "error"
					];
			}

			return modeloPrincipal::mostrarAlerta($alerta);
		}

	}