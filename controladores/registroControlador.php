<?php
	if($peticionAjax)
	{
		require_once "../modelos/registroModelo.php";
	}
	else
	{
		require_once "./modelos/registroModelo.php";
	}

	/**
	 * 
	 */
	class registroControlador extends registroModelo
	{
		/*Controlador para Agregar CUENTA*/
		public function registrarUsuarioControlador()
		{
			//Administrador
			$dni = modeloPrincipal::limpiarCadena($_POST['dni-regi']);
			$nombre = modeloPrincipal::limpiarCadena($_POST['nombre-regi']);
			$apellido = modeloPrincipal::limpiarCadena($_POST['apellido-regi']);
			$telefono = modeloPrincipal::limpiarCadena($_POST['telefono-regi']);
			$direccion = modeloPrincipal::limpiarCadena($_POST['direccion-regi']);
			

			//Cuenta
			$usuario = modeloPrincipal::limpiarCadena($_POST['usuario-regi']);
			$password1 = modeloPrincipal::limpiarCadena($_POST['password1-regi']);
			$password2 = modeloPrincipal::limpiarCadena($_POST['password2-regi']);
			$email = modeloPrincipal::limpiarCadena($_POST['email-regi']);
			$genero = modeloPrincipal::limpiarCadena($_POST['optionsGenero-regi']);

			$privilegio = modeloPrincipal::limpiarCadena($_POST['privilegio-regi']);

			//$privilegio = modeloPrincipal::desencriptar($_POST['optionsPrivilegio']);
			if ($privilegio == "Docente") 
			{
				$rol = 2;

				if ($genero == "Masculino") 
				{
					$foto = "docenteHombre.png";
				} 
				else 
				{
					$foto = "docenteMujer.png";
				}
			}
			else
			{
				$rol = 3;

				if ($genero == "Masculino") 
				{
					$foto = "estudianteHombre.png";
				} 
				else 
				{
					$foto = "estudianteMujer.png";
				}
			}
			

			if ($password1 != $password2)
			{
					$alerta = [
						"Alerta" => "simple",
						"Titulo" => "Error",
						"Texto" => "Contraseñas NO  coinciden, verifique nuevamente",
						"Tipo" => "error"
					];
				}
				else
				{
					$consultaDNI = modeloPrincipal::ejecutarConsultaSimpleSQL("SELECT PersonaDNI FROM persona WHERE PersonaDNI='$dni'");

					if ($consultaDNI->rowCount()>=1) {
						$alerta = [
							"Alerta" => "simple",
							"Titulo" => "Error",
							"Texto" => "El DNI ya esta registrado en el sistema. Verifique nuevamente",
							"Tipo" => "error"
						];
					}
					else
					{
						if($email != "")
						{
							$consultaEmail = modeloPrincipal::ejecutarConsultaSimpleSQL("SELECT CuentaEmail FROM cuenta WHERE CuentaEmail='$email'");
							$resultadoEmail = $consultaEmail->rowCount();
						}
						else
						{
							$resultadoEmail = 0;
						}

						if ($resultadoEmail >= 1) {
							$alerta = [
								"Alerta" => "simple",
								"Titulo" => "Error",
								"Texto" => "El EMAIL ya esta registrado en el sistema. Verifique nuevamente",
								"Tipo" => "error"
							];
						} 
						else
						{
							$consultaUsuario = modeloPrincipal::ejecutarConsultaSimpleSQL("SELECT CuentaUsuario FROM cuenta WHERE CuentaUsuario='$usuario'");
							if($consultaUsuario->rowCount() >= 1)
							{
								$alerta = [
									"Alerta" => "simple",
									"Titulo" => "Error",
									"Texto" => "El USUARIO ya esta registrado en el sistema. Verifique nuevamente",
									"Tipo" => "error"
								];	
							} 
							else
							{
								$consultaID = modeloPrincipal::ejecutarConsultaSimpleSQL("SELECT id FROM cuenta");

								$numero = ($consultaID->rowCount())+1;

								$codigo = modeloPrincipal::generarCodigo("LM", 5, $numero);

								$clave = modeloPrincipal::encriptar($password1);

								$datosCuenta = [
									"Codigo" => $codigo,
									"Usuario" => $usuario,
									"Clave" => $clave,
									"Email" => $email,
									"Estado" => "Activo",
									"Rol" => $rol,
									"Genero" => $genero,
									"Foto" => $foto
								];

								$cuentaAgregada = modeloPrincipal::agregarCuenta($datosCuenta);

								if ($cuentaAgregada)
								{
									
									$datosRegistro = [
										"DNI" => $dni,
										"Nombre" => $nombre,
										"Apellidos" => $apellido,
										"Telefono" => $telefono,
										"Direccion" => $direccion,
										"Codigo" => $codigo,
										"Privilegio" => $privilegio
									];

									$registroAgregado = registroModelo::registrarUsuarioModelo($datosRegistro);

									if ($registroAgregado)
									{
										$alerta = [
											"Alerta" => "redireccionar",
											"Titulo" => "Registro completo",
											"Texto" => "Usuario registrado en el sistema. Inicie sesion ahora.",
											"Tipo" => "success",
											"Pagina" => "login/"
										];

										return modeloPrincipal::mostrarAlertaRedireccion($alerta);
									} 
									else
									{
										modeloPrincipal::eliminarCuenta($codigo);

										$alerta = [
											"Alerta" => "simple",
											"Titulo" => "Error",
											"Texto" => "El USUARIO NO pudo ser registrado. Verifique nuevamente",
											"Tipo" => "error"
										];
									}
									

								}
								else
								{
									$alerta = [
										"Alerta" => "simple",
										"Titulo" => "Error",
										"Texto" => "La CUENTA NO pudo ser registrada. Verifique nuevamente",
										"Tipo" => "error"
									];
								}
								
							}
							
						}
						
					}
					
				}
			
			
			
			return modeloPrincipal::mostrarAlerta($alerta);
			
		}
		/*Fin de Agregar CUENTA*/



	}