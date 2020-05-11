<?php
	
	if($peticionAjax)
	{
		require_once "../modelos/loginModelo.php";
	}
	else
	{
		require_once "./modelos/loginModelo.php";
	}

	/**
	 * 
	 */
	class loginControlador extends loginModelo
	{
		public function iniciarSesionControlador()
		{
			$usuario = modeloPrincipal::limpiarCadena($_POST['usuario']);
			$clave = modeloPrincipal::limpiarCadena($_POST['clave']);

			$clave = modeloPrincipal::encriptar($clave);

			$datosLogin = [
				"Usuario" => $usuario,
				"Clave" => $clave
			];

			$datosCuenta = loginModelo::iniciarSesionModelo($datosLogin);

			if ($datosCuenta->rowCount()==1) {
				
				$registro = $datosCuenta->fetch();

				$fechaActual = date("Y-m-d");
				$yearActual = date("Y");
				$horaActual = date("h:i:s a");

				$consulta1 = modeloPrincipal::ejecutarConsultaSimpleSQL("SELECT id FROM bitacora");

				$numero = ($consulta1->rowCount())+1;

				$codigoBitacora = modeloPrincipal::generarCodigo("CB", 5, $numero);

				if ($registro['CuentaRol'] ==1)
				{
					$rol = "Administrador";

				}
				elseif ($registro['CuentaRol'] ==2)
				{
					$rol = "Docente";
				}
				elseif ($registro['CuentaRol'] ==3)
				{
					$rol = "Estudiante";
				}
				

				$datosBitacora = [
					"Codigo" => $codigoBitacora,
					"Fecha" => $fechaActual,
					"HoraInicio" => $horaActual,
					"HoraFinal" => "Sin registro",
					"Tipo" => $rol,
					"Year" => $yearActual,
					"Cuenta" => $registro['CuentaCodigo']
				];

				$bitacoraInsertada = modeloPrincipal::guardarBitacora($datosBitacora);

				if($bitacoraInsertada)
				{
					$consultaSim = modeloPrincipal::ejecutarConsultaSimpleSQL("SELECT * FROM persona WHERE CuentaCodigo='".$registro['CuentaCodigo']."'");

					if($consultaSim->rowCount()==1)
					{

						session_start(['name' => 'SLM']);

						$userDatos = $consultaSim->fetch();

						$_SESSION['nombre_sesion'] = $userDatos['PersonaNombre'];
						$_SESSION['apellido_sesion'] = $userDatos['PersonaApellido'];
						$_SESSION['salon_sesion'] = $userDatos['Salon'];

						
						$_SESSION['usuario_sesion'] = $registro['CuentaUsuario'];
						$_SESSION['tipo_sesion'] = $registro['CuentaRol'];
						$_SESSION['foto_sesion'] = $registro['CuentaFoto'];
						$_SESSION['token_sesion'] = md5(uniqid(mt_rand(), true));
						$_SESSION['codigo_cuenta_sesion'] = $registro['CuentaCodigo'];
						$_SESSION['codigo_bitacora_sesion'] = $codigoBitacora;


						if ($registro['CuentaRol'] == 1)
						{
							$url = SERVERURL."home/";
						} 
						elseif ($registro['CuentaRol'] == 2)
						{
							$url = SERVERURL."homeDocente/";
						}
						elseif ($registro['CuentaRol'] == 3) {
							$consultaEquipo = modeloPrincipal::ejecutarConsultaSimpleSQL("SELECT id_equipo FROM cuenta_equipo WHERE CuentaCodigo='".$_SESSION['codigo_cuenta_sesion']."'");
							if($consultaEquipo->rowCount()>0)
							{
								$equipo = $consultaEquipo->fetch();
								$_SESSION['codigo_equipo_sesion'] = $equipo['id_equipo'];

								$consultaProyecto = modeloPrincipal::ejecutarConsultaSimpleSQL("SELECT id_proyecto FROM asignacion WHERE id_equipo='".$_SESSION['codigo_equipo_sesion']."'");

								if($consultaProyecto->rowCount()==1)
								{
									$proyecto = $consultaProyecto->fetch();
									$_SESSION['codigo_proyecto_sesion'] = $proyecto['id_proyecto'];
									
								}
								else
								{
									$_SESSION['codigo_proyecto_sesion'] = 0;
								}
								
							}
							else
							{
								$_SESSION['codigo_equipo_sesion'] = 0;
								$_SESSION['codigo_proyecto_sesion'] = 0;
							}
							
							$url = SERVERURL."homeEstudiante/";
						}
						
						return $urlLocation = '<script>window.location="'.$url.'"</script>';
					}
					else
					{
						$alerta = [
							"Alerta" => "simple",
							"Titulo" => "Error",
							"Texto" => "El sistema NO pudo iniciar sesion por problemas tecnicos. Intentelo nuevamente.",
							"Tipo" => "error"
						];
					}					

				}
				else
				{
					$alerta = [
						"Alerta" => "simple",
						"Titulo" => "Error",
						"Texto" => "El sistema NO pudo iniciar sesion por problemas tecnicos. Intentelo nuevamente.",
						"Tipo" => "error"
					];
				}
			}
			else
			{
				$alerta = [
					"Alerta" => "simple",
					"Titulo" => "Error",
					"Texto" => "Usuario o Contraseña incorrecta. La cuenta puede estar desactivada",
					"Tipo" => "error"
				];

				return modeloPrincipal::mostrarAlerta($alerta);
			}
		}

		public function cerrarSesionControlador()
		{
			session_start(['name' => 'SLM']);

			$token = modeloPrincipal::desencriptar($_GET['Token']);

			$hora = date("h:i:s a");

			$datosLogin = [
				"Usuario" => $_SESSION['usuario_sesion'],
				"TokenSesion" => $_SESSION['token_sesion'],
				"TokenPagina" => $token,
				"Codigo" => $_SESSION['codigo_bitacora_sesion'],
				"Hora" => $hora

			];

			return loginModelo::cerrarSesionModelo($datosLogin);

		}

		public function forzarCierreSesion()
		{
			//session_start(['name' => 'SBP']);
			session_unset();
			session_destroy();
			//$redirect = '<script> window.location.href="'.SERVERURL.'login/"  </script>';
			
			//return $redirect;
			return header("Location: ".SERVERURL."login/");
		}


		public function redireccionarUsuarioControlador($tipo)
		{
			if($tipo== 1)
			{
				$redirect = '<script> window.location.href="'.SERVERURL.'home/"  </script>';
			}
			else if($tipo== 2)
			{
				$redirect = '<script> window.location.href="'.SERVERURL.'homeDocente/"  </script>';
			}
			else if($tipo== 3)
			{
				$redirect = '<script> window.location.href="'.SERVERURL.'homeEstudiante/"  </script>';
			}
			else
			{
				$redirect = '<script> window.location.href="'.SERVERURL.'registro/"  </script>';
			}

			return $redirect;

		}

	}