<?php
	if($peticionAjax)
	{
		require_once "../modelos/docenteModelo.php";
	}
	else
	{
		require_once "./modelos/docenteModelo.php";
	}

	/**
	 * 
	 */
	class docenteControlador extends docenteModelo
	{
		/*Controlador para Agregar CUENTA DE DOCENTE*/
		public function agregarDocenteControlador()
		{
			//Administrador
			$dni = modeloPrincipal::limpiarCadena($_POST['dni-reg']);
			$nombre = modeloPrincipal::limpiarCadena($_POST['nombre-reg']);
			$apellido = modeloPrincipal::limpiarCadena($_POST['apellido-reg']);
			$telefono = modeloPrincipal::limpiarCadena($_POST['telefono-reg']);
			$direccion = modeloPrincipal::limpiarCadena($_POST['direccion-reg']);
			$privilegio = "Docente";

			//Cuenta
			$usuario = modeloPrincipal::limpiarCadena($_POST['usuario-reg']);
			$password1 = modeloPrincipal::limpiarCadena($_POST['password1-reg']);
			$password2 = modeloPrincipal::limpiarCadena($_POST['password2-reg']);
			$email = modeloPrincipal::limpiarCadena($_POST['email-reg']);
			$genero = modeloPrincipal::limpiarCadena($_POST['optionsGenero']);

			$rol = 2;


			if ($genero == "Masculino") 
			{
				$foto = "docenteHombre.png";
			} 
			else 
			{
				$foto = "docenteMujer.png";
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
									
									$datosDocente = [
										"DNI" => $dni,
										"Nombre" => $nombre,
										"Apellidos" => $apellido,
										"Telefono" => $telefono,
										"Direccion" => $direccion,
										"Codigo" => $codigo,
										"Privilegio" => $privilegio
									];

									$docenteAgregado = docenteModelo::agregarDocenteModelo($datosDocente);

									if ($docenteAgregado)
									{
										$alerta = [
											"Alerta" => "limpiar",
											"Titulo" => "Éxito",
											"Texto" => "Docente registrado con éxito",
											"Tipo" => "success"
										];
									} 
									else
									{
										modeloPrincipal::eliminarCuenta($codigo);

										$alerta = [
											"Alerta" => "simple",
											"Titulo" => "Error",
											"Texto" => "El DOCENTE NO pudo ser registrado. Verifique nuevamente",
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
		public function paginarDocentesControlador($pagina, $noRegistros, $privilegio, $codigo, $busqueda)
		{
			$pagina = modeloPrincipal::limpiarCadena($pagina);
			$noRegistros = modeloPrincipal::limpiarCadena($noRegistros);
			//$privilegio = modeloPrincipal::limpiarCadena($privilegio);
			$codigo = modeloPrincipal::limpiarCadena($codigo);
			$busqueda = modeloPrincipal::limpiarCadena($busqueda);

			$tabla = "";

			$pagina = (isset($pagina) && $pagina>0) ? (int)$pagina : 1 ;
			$inicio = ($pagina>0) ? (($pagina*$noRegistros)-$noRegistros) : 0;

			if (isset($busqueda) && $busqueda != "" ) {
				$consulta = "SELECT SQL_CALC_FOUND_ROWS * FROM persona WHERE PersonaPrivilegio = 'Docente' AND ((CuentaCodigo!='$codigo') AND (PersonaNombre LIKE '%$busqueda%' OR PersonaApellido LIKE '%$busqueda%' OR PersonaDNI LIKE '%$busqueda%')) ORDER BY PersonaNombre ASC LIMIT $inicio, $noRegistros";

				$paginaURL = "docentesearch";

			} else {
				$consulta = "SELECT SQL_CALC_FOUND_ROWS * FROM persona p JOIN salon s ON p.Salon=s.id_salon WHERE p.PersonaPrivilegio='Docente' AND p.CuentaCodigo!='$codigo' ORDER BY p.PersonaNombre ASC LIMIT $inicio, $noRegistros";
				
				$paginaURL = "docentelist";
			}
			

			$conexion = modeloPrincipal::conectarBD();

			$datos = $conexion->query($consulta);

			$datos = $datos->fetchAll();

			$total = $conexion->query("SELECT FOUND_ROWS()");
			$total = (int) $total->fetchColumn();

			$noPaginas = ceil($total/$noRegistros);

			$tabla .= '<div class="table-responsive">
								<table class="table table-hover text-center">
									<thead>
										<tr>
											<th class="text-center">#</th>
											<th class="text-center">SALON</th>
											<th class="text-center">IDENTIFICACION</th>
											<th class="text-center">NOMBRE(S)</th>
											<th class="text-center">APELLIDOS</th>
											<th class="text-center">TELÉFONO</th>
											<th class="text-center">SALON DE CLASE</th>
											<th class="text-center">CUENTA</th>
											<th class="text-center">DATOS DEL DOCENTE</th>
											<th class="text-center">ELIMINAR</th>';
			//}
			


			$tabla .= '			</tr>
									</thead>
									<tbody>';

			if ($total >=1 && $pagina<=$noPaginas)
			{
				$contador = $inicio+1;

				foreach ($datos as $docente)
				{
					$tabla .= '<tr>
										<td><p>'.$contador.'</p></td>';
										if ($docente['Salon'] == "Sin salon") {
											$tabla .= '<td><p><b>'.$docente['Salon'].'</b></p></td>';
										} else {
											$tabla .= '<td><p>'.$docente['Salon'].'</p></td>';
										}
										
					$tabla.=			'<td><p>'.$docente['PersonaDNI'].'</td>
										<td><p>'.$docente['PersonaNombre'].'</p></td>
										<td><p>'.$docente['PersonaApellido'].'</p></td>
										<td><p>'.$docente['PersonaTelefono'].'</p></td>';
					//if ($privilegio <=2) {

						$tabla .= '		<td>
											<a href="'.SERVERURL.'asignarSalon/'.modeloPrincipal::encriptar($docente['CuentaCodigo']).'/Docente/" class="btn btn-warning btn-raised btn-sm">
												<i class="zmdi zmdi-account-box"></i>
											</a>
										</td>';

						
						
						$tabla .= '<td>
											<a href="'.SERVERURL.'myaccount/docente/'.modeloPrincipal::encriptar($docente['CuentaCodigo']).'/" class="btn btn-success btn-raised btn-sm">
												<i class="zmdi zmdi-file"></i>
											</a>
										</td>
										<td>
											<a href="'.SERVERURL.'mydata/docente/'.modeloPrincipal::encriptar($docente['CuentaCodigo']).'/" class="btn btn-success btn-raised btn-sm">
												<i class="zmdi zmdi-account-box"></i>
											</a>
										</td>		
						';

					//}

					//if($privilegio == 1){

						$tabla .= '<td>
											<form action="'.SERVERURL.'ajax/docenteAjax.php" method="POST" class="FormularioAjax" data-form="delete" enctype="multipart/forma-data" autocomplete="off">

												<input type="hidden" name="codigo-del" value="'.modeloPrincipal::encriptar($docente['CuentaCodigo']).'">

												<button type="submit" class="btn btn-danger btn-raised btn-sm">
													<i class="zmdi zmdi-delete"></i>
												</button>
												<div class="RespuestaAjax"></div>

											</form>
										</td>
						';
					//}
										
					$tabla .= '</tr>';

								$contador++;
				}
			}
			else
			{
				if ($total>=1) {
					$tabla .= '<tr>
									<td colspan="8">

										<a href="'.SERVERURL.$paginaURL.'/" class="btn btn-success btn-raised">
											<i class="zmdi zmdi-refresh zmdi-hc-spin"></i> Recargar tabla de los administradores
										</a>

									</td>
								</tr>';
				} else {
					$tabla .= '<tr>
									<td colspan="8">No hay registros en el Sistema</td>
								</tr>';
				}
				
				
			}
			


			$tabla .='			</tbody>
								</table>
							</div>
						';

			if ($total >=1 && $pagina <=$noPaginas) {
				$tabla .= '
							<nav class="text-center">
								<ul class="pager">
							';

				if ($pagina==1 ) {
					$tabla .= '

									<li class="disabled"><a><i class="zmdi zmdi-long-arrow-left"></i></a></li>

							';
				} else {
					$tabla .= '

									<li><a href="'.SERVERURL.$paginaURL.'/'.($pagina-1).'/"><i class="zmdi zmdi-long-arrow-left"></i></a></li>

							';
				}




				for($i=1; $i<=$noPaginas; $i++)
				{
					if ($pagina==$i) {
						
						$tabla .= '

									<li class="active"><a href="'.SERVERURL.$paginaURL.'/'.$i.'/">'.$i.'</a></li>

							';
					} else {
						$tabla .= '

									<li><a href="'.SERVERURL.$paginaURL.'/'.$i.'/">'.$i.'</a></li>

							';
					}
					
				}






				if ($pagina==$noPaginas) {
					$tabla .= '

									<li class="disabled"><a><i class="zmdi zmdi-long-arrow-right"></i></a></li>

							';
				} else {
					$tabla .= '

									<li><a href="'.SERVERURL.$paginaURL.'/'.($pagina+1).'/"><i class="zmdi zmdi-long-arrow-right"></i></a></li>

							';
				}
				


				$tabla .= '
								</ul>
							</nav>
							';
			} else {
				# code...
			}
			



			return $tabla;


		}
		/*FIN del paginador de ADMINISTRADORES*/


		/*Eliminar ADMINISTRADORES*/
		public function eliminarDocenteControlador()
		{
			$codigo = modeloPrincipal::desencriptar($_POST['codigo-del']);

			$codigo = modeloPrincipal::limpiarCadena($codigo);

			//Verificar que no hay informacion relacionada con la Cuenta del docente
			$consultarCuentaEquipo = modeloPrincipal::ejecutarConsultaSimpleSQL("SELECT * FROM cuenta_equipo WHERE cuentaCreador = '$codigo'");
			$consultarEquipo = modeloPrincipal::ejecutarConsultaSimpleSQL("SELECT * FROM equipo WHERE cuentaCreador = '$codigo'");
			$consultarAsignaciones = modeloPrincipal::ejecutarConsultaSimpleSQL("SELECT * FROM asignacion WHERE cuentaCreador = '$codigo'");
			$consultarProyectos = modeloPrincipal::ejecutarConsultaSimpleSQL("SELECT * FROM proyecto WHERE cuentaCreador = '$codigo'");
			$consultarProyectosMetodo = modeloPrincipal::ejecutarConsultaSimpleSQL("SELECT * FROM proyecto_metodologia WHERE cuentaCreador = '$codigo'");
			$consultarMetodologia = modeloPrincipal::ejecutarConsultaSimpleSQL("SELECT * FROM metodologia WHERE cuentaCreador = '$codigo'");

			if ($consultarCuentaEquipo->rowCount() > 0 || $consultarEquipo->rowCount() > 0 || $consultarAsignaciones->rowCount() > 0 || $consultarProyectos->rowCount() > 0 || $consultarProyectosMetodo->rowCount() > 0 || $consultarMetodologia->rowCount() > 0 ) {
				$alerta = [
					"Alerta" => "simple",
					"Titulo" => "Informacion relacionada con el Docente",
					"Texto" => "No se elimino la Cuenta del Docente. Se debe eliminar toda la informacion relacionada a esta cuenta",
					"Tipo" => "error"
				];
				return modeloPrincipal::mostrarAlerta($alerta);
				exit();
			}

			$consultaDoc = modeloPrincipal::ejecutarConsultaSimpleSQL("SELECT id FROM persona WHERE CuentaCodigo='$codigo'");

				$datosDoc = $consultaDoc->fetch();

				if ($datosDoc['id']!=1) {
					$eliminarDoc = docenteModelo::eliminarDocenteModelo($codigo);

					modeloPrincipal::eliminarBitacora($codigo);

					if ($eliminarDoc->rowCount()>=1)
					{
						$eliminarUsuario = modeloPrincipal::eliminarCuenta($codigo);

						if ($eliminarUsuario->rowCount()==1) {
							$alerta = [
								"Alerta" => "recargar",
								"Titulo" => "Éxito",
								"Texto" => "El Docente fue eliminado correctamente del sistema",
								"Tipo" => "success"
							];
						} else {
							$alerta = [
								"Alerta" => "simple",
								"Titulo" => "Error",
								"Texto" => "No se elimino la Cuenta del Docente. Intentelo mas tarde",
								"Tipo" => "error"
							];
						}
						
					}
					else
					{
						$alerta = [
							"Alerta" => "simple",
							"Titulo" => "Error",
							"Texto" => "No se elimino el Docente. Intentelo mas tarde",
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

			return administradorModelo::mostrarInfoAdministradoresModelo($tipo, $codigo);
		}


		public function actualizarAdministradorControlador()
		{
			$cuenta = modeloPrincipal::desencriptar($_POST['cuenta-up']);

			$dni = modeloPrincipal::limpiarCadena($_POST['dni-up']);
			$nombre = modeloPrincipal::limpiarCadena($_POST['nombre-up']);
			$apellido = modeloPrincipal::limpiarCadena($_POST['apellido-up']);
			$telefono = modeloPrincipal::limpiarCadena($_POST['telefono-up']);
			$direccion = modeloPrincipal::limpiarCadena($_POST['direccion-up']);

			$consulta = modeloPrincipal::ejecutarConsultaSimpleSQL("SELECT * FROM admin WHERE CuentaCodigo='$cuenta'");

			$datosAdmin= $consulta->fetch();

			if ($dni!=$datosAdmin['AdminDNI'])
			{
				$consulta1 = modeloPrincipal::ejecutarConsultaSimpleSQL("SELECT AdminDNI FROM admin WHERE AdminDNI='$dni'");
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
				"Codigo" => $cuenta
			];


			if (administradorModelo::actualizarAdministradorModelo($datosAdministrador)) {

				//session_start(['name' => 'SBP']);
				//$_SESSION['nombre_sesion'] = $nombre;
				//$_SESSION['apellido_sesion'] = $apellido;

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