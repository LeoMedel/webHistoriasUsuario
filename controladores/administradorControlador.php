<?php
	if($peticionAjax)
	{
		require_once "../modelos/administradorModelo.php";
	}
	else
	{
		require_once "./modelos/administradorModelo.php";
	}

	/**
	 * 
	 */
	class administradorControlador extends administradorModelo
	{
		/*Controlador para Agregar CUENTA DE ADMINISTRADOR*/
		public function agregarAdministradorControlador()
		{
			//Administrador
			$dni = modeloPrincipal::limpiarCadena($_POST['dni-reg']);
			$nombre = modeloPrincipal::limpiarCadena($_POST['nombre-reg']);
			$apellido = modeloPrincipal::limpiarCadena($_POST['apellido-reg']);
			$telefono = modeloPrincipal::limpiarCadena($_POST['telefono-reg']);
			$direccion = modeloPrincipal::limpiarCadena($_POST['direccion-reg']);
			$privilegio = "Administrador";

			//Cuenta
			$usuario = modeloPrincipal::limpiarCadena($_POST['usuario-reg']);
			$password1 = modeloPrincipal::limpiarCadena($_POST['password1-reg']);
			$password2 = modeloPrincipal::limpiarCadena($_POST['password2-reg']);
			$email = modeloPrincipal::limpiarCadena($_POST['email-reg']);
			$genero = modeloPrincipal::limpiarCadena($_POST['optionsGenero']);

			//$privilegio = modeloPrincipal::desencriptar($_POST['optionsPrivilegio']);
			$rol = 1;//modeloPrincipal::limpiarCadena($privilegio);


			if ($genero == "Masculino") 
			{
				$foto = "adminHombre.png";
			} 
			else 
			{
				$foto = "adminMujer.png";
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
									
									$datosAdministrador = [
										"DNI" => $dni,
										"Nombre" => $nombre,
										"Apellidos" => $apellido,
										"Telefono" => $telefono,
										"Direccion" => $direccion,
										"Codigo" => $codigo,
										"Privilegio" => $privilegio
									];

									$administradorAgregado = administradorModelo::agregarAdministradorModelo($datosAdministrador);

									if ($administradorAgregado)
									{
										$alerta = [
											"Alerta" => "limpiar",
											"Titulo" => "Éxito",
											"Texto" => "El administrador registrado con éxito",
											"Tipo" => "success"
										];
									} 
									else
									{
										modeloPrincipal::eliminarCuenta($codigo);

										$alerta = [
											"Alerta" => "simple",
											"Titulo" => "Error",
											"Texto" => "El ADMINISTRADOR NO pudo ser registrado. Verifique nuevamente",
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
		/*Fin de Agregar CUENTA DE ADMINISTRADOR*/

		/*Controlador para paginar los ADMINISTRADORES*/
		public function paginarAdministradoresControlador($pagina, $noRegistros, $privilegio, $codigo, $busqueda)
		{
			$pagina = modeloPrincipal::limpiarCadena($pagina);
			$noRegistros = modeloPrincipal::limpiarCadena($noRegistros);
			//$privilegio = modeloPrincipal::limpiarCadena($privilegio);
			$codigo = modeloPrincipal::limpiarCadena($codigo);
			$busqueda = modeloPrincipal::limpiarCadena($busqueda);

			$tablaAdmin = "";

			$pagina = (isset($pagina) && $pagina>0) ? (int)$pagina : 1 ;
			$inicio = ($pagina>0) ? (($pagina*$noRegistros)-$noRegistros) : 0;

			if (isset($busqueda) && $busqueda != "" ) {
				$consulta = "SELECT SQL_CALC_FOUND_ROWS * FROM persona WHERE PersonaPrivilegio = 'Administrador' AND ((CuentaCodigo!='$codigo' AND id!='2') AND (PersonaNombre LIKE '%$busqueda%' OR PersonaApellido LIKE '%$busqueda%' OR PersonaDNI LIKE '%$busqueda%')) ORDER BY PersonaNombre ASC LIMIT $inicio, $noRegistros";

				$paginaURL = "adminsearch";

			} else {
				$consulta = "SELECT SQL_CALC_FOUND_ROWS * FROM persona WHERE PersonaPrivilegio='Administrador' AND CuentaCodigo!='$codigo' AND id!='1' ORDER BY PersonaNombre ASC LIMIT $inicio, $noRegistros";
				
				$paginaURL = "adminlist";
			}
			

			$conexion = modeloPrincipal::conectarBD();

			$datos = $conexion->query($consulta);

			$datos = $datos->fetchAll();

			$total = $conexion->query("SELECT FOUND_ROWS()");
			$total = (int) $total->fetchColumn();

			$noPaginas = ceil($total/$noRegistros);

			$tablaAdmin .= '<div class="table-responsive">
								<table class="table table-hover text-center">
									<thead>
										<tr>
											<th class="text-center">#</th>
											<th class="text-center">DNI</th>
											<th class="text-center">NOMBRE(S)</th>
											<th class="text-center">APELLIDOS</th>
											<th class="text-center">TELÉFONO</th>';
			//if ($privilegio <=2) {
				
				$tablaAdmin .= '			<th class="text-center">CUENTA</th>
											<th class="text-center">DATOS PERSONALES</th>
				';

			//}

			//if($privilegio == 1)
			//{
				$tablaAdmin .= '			<th class="text-center">ELIMINAR</th>
				';
			//}
			


			$tablaAdmin .= '			</tr>
									</thead>
									<tbody>';

			if ($total >=1 && $pagina<=$noPaginas)
			{
				$contador = $inicio+1;

				foreach ($datos as $administrador)
				{
					$tablaAdmin .= '<tr>
										<td><p>'.$contador.'</p></td>
										<td><p>'.$administrador['PersonaDNI'].'</td>
										<td><p>'.$administrador['PersonaNombre'].'</p></td>
										<td><p>'.$administrador['PersonaApellido'].'</p></td>
										<td><p>'.$administrador['PersonaTelefono'].'</p></td>';
					//if ($privilegio <=2) {
						
						$tablaAdmin .= '<td>
											<a href="'.SERVERURL.'myaccount/admin/'.modeloPrincipal::encriptar($administrador['CuentaCodigo']).'/" class="btn btn-success btn-raised btn-sm">
												<i class="zmdi zmdi-file"></i>
											</a>
										</td>
										<td>
											<a href="'.SERVERURL.'mydata/admin/'.modeloPrincipal::encriptar($administrador['CuentaCodigo']).'/" class="btn btn-success btn-raised btn-sm">
												<i class="zmdi zmdi-account-box"></i>
											</a>
										</td>		
						';

					//}

					//if($privilegio == 1){

						$tablaAdmin .= '<td>
											<form action="'.SERVERURL.'ajax/administradorAjax.php" method="POST" class="FormularioAjax" data-form="delete" enctype="multipart/forma-data" autocomplete="off">

												<input type="hidden" name="codigo-del" value="'.modeloPrincipal::encriptar($administrador['CuentaCodigo']).'">

												<button type="submit" class="btn btn-danger btn-raised btn-sm">
													<i class="zmdi zmdi-delete"></i>
												</button>
												<div class="RespuestaAjax"></div>

											</form>
										</td>
						';
					//}
										
					$tablaAdmin .= '</tr>';

								$contador++;
				}
			}
			else
			{
				if ($total>=1) {
					$tablaAdmin .= '<tr>
									<td colspan="8">

										<a href="'.SERVERURL.$paginaURL.'/" class="btn btn-success btn-raised">
											<i class="zmdi zmdi-refresh zmdi-hc-spin"></i> Recargar tabla de los administradores
										</a>

									</td>
								</tr>';
				} else {
					$tablaAdmin .= '<tr>
									<td colspan="8">No hay registros en el Sistema</td>
								</tr>';
				}
				
				
			}
			


			$tablaAdmin .='			</tbody>
								</table>
							</div>
						';

			if ($total >=1 && $pagina <=$noPaginas) {
				$tablaAdmin .= '
							<nav class="text-center">
								<ul class="pager">
							';

				if ($pagina==1 ) {
					$tablaAdmin .= '

									<li class="disabled"><a><i class="zmdi zmdi-long-arrow-left"></i></a></li>

							';
				} else {
					$tablaAdmin .= '

									<li><a href="'.SERVERURL.$paginaURL.'/'.($pagina-1).'/"><i class="zmdi zmdi-long-arrow-left"></i></a></li>

							';
				}




				for($i=1; $i<=$noPaginas; $i++)
				{
					if ($pagina==$i) {
						
						$tablaAdmin .= '

									<li class="active"><a href="'.SERVERURL.$paginaURL.'/'.$i.'/">'.$i.'</a></li>

							';
					} else {
						$tablaAdmin .= '

									<li><a href="'.SERVERURL.$paginaURL.'/'.$i.'/">'.$i.'</a></li>

							';
					}
					
				}






				if ($pagina==$noPaginas) {
					$tablaAdmin .= '

									<li class="disabled"><a><i class="zmdi zmdi-long-arrow-right"></i></a></li>

							';
				} else {
					$tablaAdmin .= '

									<li><a href="'.SERVERURL.$paginaURL.'/'.($pagina+1).'/"><i class="zmdi zmdi-long-arrow-right"></i></a></li>

							';
				}
				


				$tablaAdmin .= '
								</ul>
							</nav>
							';
			} else {
				# code...
			}
			



			return $tablaAdmin;


		}
		/*FIN del paginador de ADMINISTRADORES*/


		/*Eliminar ADMINISTRADORES*/
		public function eliminarAdministradorControlador()
		{
			$codigo = modeloPrincipal::desencriptar($_POST['codigo-del']);
			//$adminPrivilegio = modeloPrincipal::desencriptar($_POST['privilegio-admin']);

			$codigo = modeloPrincipal::limpiarCadena($codigo);
			//$adminPrivilegio = modeloPrincipal::limpiarCadena($adminPrivilegio);


			$consultaAdmin = modeloPrincipal::ejecutarConsultaSimpleSQL("SELECT id FROM persona WHERE CuentaCodigo='$codigo'");

				$datosAdmin = $consultaAdmin->fetch();

				if ($datosAdmin['id']!=1) {
					
					$eliminarAdmin = administradorModelo::eliminarAdministradorModelo($codigo);

					modeloPrincipal::eliminarBitacora($codigo);

					if ($eliminarAdmin->rowCount()>=1)
					{
						$eliminarUsuario = modeloPrincipal::eliminarCuenta($codigo);

						if ($eliminarUsuario->rowCount()==1) {
							$alerta = [
								"Alerta" => "recargar",
								"Titulo" => "Éxito",
								"Texto" => "El administrador fue eliminado correctamente del sistema",
								"Tipo" => "success"
							];
						} else {
							$alerta = [
								"Alerta" => "simple",
								"Titulo" => "Error",
								"Texto" => "No se elimino la Cuenta del Administrador. Intentelo mas tarde",
								"Tipo" => "error"
							];
						}
						
					}
					else
					{
						$alerta = [
							"Alerta" => "simple",
							"Titulo" => "Error",
							"Texto" => "No se elimino el Administrador. Intentelo mas tarde",
							"Tipo" => "error"
						];
					}
					


				} else {
					$alerta = [
						"Alerta" => "simple",
						"Titulo" => "Error",
						"Texto" => "No se puede eliminar el SUPER Administrador",
						"Tipo" => "error"
					];
				}


			return modeloPrincipal::mostrarAlerta($alerta);
			

		}



		public function mostrarInfoAdministradoresControlador($tipo, $codigo)
		{
			$codigo = modeloPrincipal::desencriptar($codigo);
			$tipo = modeloPrincipal::limpiarCadena($tipo);
			//$usuario = modeloPrincipal::limpiarCadena($usuario);

			return administradorModelo::mostrarInfoAdministradoresModelo($tipo, $codigo);
		}

		public function mostrarInfoUsuariosControlador($usuario)
		{
			$usuario = modeloPrincipal::limpiarCadena($usuario);

			return administradorModelo::mostrarInfoUsuariosModelo($usuario);
		}


		public function actualizarAdministradorControlador()
		{
			$cuenta = modeloPrincipal::desencriptar($_POST['cuenta-up']);
			$tipo = modeloPrincipal::desencriptar($_POST['TipoCuenta-up']);
			if ($tipo=="admin")
			{
				$tipo = "Administrador";
			}
			elseif ($tipo=="docente")
			{
				$tipo = "Docente";
			}

			$dni = modeloPrincipal::limpiarCadena($_POST['dni-up']);
			$nombre = modeloPrincipal::limpiarCadena($_POST['nombre-up']);
			$apellido = modeloPrincipal::limpiarCadena($_POST['apellido-up']);
			$telefono = modeloPrincipal::limpiarCadena($_POST['telefono-up']);
			$direccion = modeloPrincipal::limpiarCadena($_POST['direccion-up']);

			$consulta = modeloPrincipal::ejecutarConsultaSimpleSQL("SELECT * FROM persona WHERE CuentaCodigo='$cuenta'");

			$datosAdmin= $consulta->fetch();

			if ($dni != $datosAdmin['PersonaDNI'])
			{
				$consulta1 = modeloPrincipal::ejecutarConsultaSimpleSQL("SELECT PersonaDNI FROM persona WHERE PersonaDNI='$dni'");
				if ($consulta1->rowCount()>=1) {
					$alerta = [
						"Alerta" => "simple",
						"Titulo" => "Error",
						"Texto" => "El DNI ya esta registrado, verifique nuevamente",
						"Tipo" => "error"
					];

					return modeloPrincipal::mostrarAlerta($alerta);
					exit();

				}
				
			}

			$datosAdministrador = [
				"DNI" => $dni,
				"Nombre" => $nombre,
				"Apellido" => $apellido,
				"Telefono" => $telefono,
				"Direccion" => $direccion,
				"Privilegio" => $tipo,
				"Codigo" => $cuenta
			];


			if (administradorModelo::actualizarAdministradorModelo($datosAdministrador)) {

				$alerta = [
						"Alerta" => "recargar",
						"Titulo" => "Éxito",
						"Texto" => "Los datos han sido actualizados.",
						"Tipo" => "success"
					];
			}
			else
			{
				$alerta = [
						"Alerta" => "simple",
						"Titulo" => "Error",
						"Texto" => "Los datos NO pudieron ser actualizados. Intentelo nuevamente",
						"Tipo" => "error"
					];
			}
			
			return modeloPrincipal::mostrarAlerta($alerta);
			

		}

	}