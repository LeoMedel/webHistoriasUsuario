<?php
	if($peticionAjax)
	{
		require_once "../modelos/equipoModelo.php";
	}
	else
	{
		require_once "./modelos/equipoModelo.php";
	}

	/**
	 * 
	 */
	class equipoControlador extends equipoModelo
	{

		/*Controlador para Agregar PROYECTOS*/
		public function agregarEquipoControlador()
		{
			//Equipo
			$titulo = modeloPrincipal::limpiarCadena($_POST['tituloEq-reg']);
			$creador = modeloPrincipal::desencriptar($_POST['CodigoCuenta-reg']);
			
			$consultaTitulo = modeloPrincipal::ejecutarConsultaSimpleSQL("SELECT equipo FROM equipo WHERE equipo='$titulo'");

			
			if ($consultaTitulo->rowCount()>=1) {
				$alerta = [
					"Alerta" => "simple",
					"Titulo" => "Error",
					"Texto" => "El nombre del EQUIPO ya esta registrado en el sistema. Verifique nuevamente",
					"Tipo" => "error"
				];
			}
			else
			{

				$datosEquipo = [
							"Titulo" => $titulo,
							"Creador" => $creador
						];

				$equipoAgregado = equipoModelo::agregarEquipoModelo($datosEquipo);

				if($equipoAgregado)
				{
					$alerta = [
						"Alerta" => "limpiar",
						"Titulo" => "Éxito",
						"Texto" => "El equipo fue agregado correctamente",
						"Tipo" => "success"
					];	
				} 
				else
				{
					$alerta = [
						"Alerta" => "simple",
						"Titulo" => "Error",
						"Texto" => "El equipo NO fue agregado",
						"Tipo" => "error"
					];
				}
					
			}	
			return modeloPrincipal::mostrarAlerta($alerta);
		}
		/*Fin de Agregar EQUIPO*/

		public function actualizarEquipoControlador()
		{
			//Proyecto
			$idEquipo = modeloPrincipal::desencriptar($_POST['idEquipo-up']);
			$titulo = modeloPrincipal::limpiarCadena($_POST['tituloEq-up']);
			

			$consultaTitulo = modeloPrincipal::ejecutarConsultaSimpleSQL("SELECT equipo FROM equipo WHERE equipo='$titulo' AND id_equipo != $idEquipo ");

			
			if ($consultaTitulo->rowCount()>=1) {
				$alerta = [
					"Alerta" => "simple",
					"Titulo" => "Error",
					"Texto" => "El NOMBRE del equipo ya esta registrado en el sistema. Verifique nuevamente",
					"Tipo" => "error"
				];
				
				return modeloPrincipal::mostrarAlerta($alerta);
				exit();
			}
			else
			{
				$datosEquipo = [
							"IdEquipo" => $idEquipo,
							"Titulo" => $titulo
						];

				$equipoActualizado = equipoModelo::actualizarEquipoModelo($datosEquipo);

				if($equipoActualizado)
				{
					$alerta = [
						"Alerta" => "recargar",
						"Titulo" => "Éxito",
						"Texto" => "El equipo fue actualizado correctamente",
						"Tipo" => "success"
					];	
				} 
				else
				{
					$alerta = [
						"Alerta" => "simple",
						"Titulo" => "Error",
						"Texto" => "El equipo NO fue actualizado",
						"Tipo" => "error"
					];
				}
					
			}
						
			return modeloPrincipal::mostrarAlerta($alerta);

		}


		/*Eliminar EQUIPO*/
		public function eliminarEquipoControlador()
		{
			$idEquipo = modeloPrincipal::desencriptar($_POST['idEquipo-del']);

			$consultaAsignacion = modeloPrincipal::ejecutarConsultaSimpleSQL("SELECT * FROM asignacion WHERE id_equipo=$idEquipo");
			
			if ($consultaAsignacion->rowCount()>0)
			{
				$alerta = [
					"Alerta" => "simple",
					"Titulo" => "Proyecto asignado al Equipo",
					"Texto" => "No se elimino el equipo. Tiene un proyecto asignado. Primero elimine la asignacion del proyecto",
					"Tipo" => "error"
				];

			}
			else
			{
				$consultaEstudiantes = modeloPrincipal::ejecutarConsultaSimpleSQL("SELECT * FROM cuenta_equipo WHERE id_equipo ='$idEquipo'");

				if ($consultaEstudiantes->rowCount()>0)
				{
					$alerta = [
							"Alerta" => "simple",
							"Titulo" => "Estudiantes en el Equipo",
							"Texto" => "No se elimino el equipo, tiene estudiantes asignados. Elimine a los estudiantes integrados en este equipo",
							"Tipo" => "error"
						];
					
				}
				else
				{
					$eliminarEquipo = equipoModelo::eliminarEquipoModelo($idEquipo);

					if ($eliminarEquipo->rowCount()==1)
					{

						$alerta = [
							"Alerta" => "recargar",
							"Titulo" => "Éxito",
							"Texto" => "El Equipo fue eliminado correctamente del sistema",
							"Tipo" => "success"
						];
					}
					else
					{
						$alerta = [
							"Alerta" => "simple",
							"Titulo" => "Error",
							"Texto" => "No se elimino el equipo. Intentelo mas tarde",
							"Tipo" => "error"
						];
					}
				}

				
			}


			return modeloPrincipal::mostrarAlerta($alerta);
			

		}
		/*FIN de Eliminar EQUIPO*/

		/*Controlador para mostrar la informacion de un PROYECTO*/
		public function mostrarInfoEquipoControlador($codigo)
		{
			$codigo = modeloPrincipal::desencriptar($codigo);

			return equipoModelo::mostrarInfoEquipoModelo($codigo);
		}
		/*FIN Controlador para mostrar la informacion de un PROYECTO*/

		/*Controlador para obtener todos los equipos*/
		public function cargarEquiposControlador($cuenta)
		{
			$equipos = modeloPrincipal::ejecutarConsultaSimpleSQL("SELECT * FROM equipo WHERE cuentaCreador='$cuenta' order by equipo DESC");

			return $equipos;
		}
		/*FIN de obtener Equipos*/

		public function cargarEquipoIntegrantesControlador($idEquipo)
		{
			$integrantes = modeloPrincipal::EjecutarConsultaSimpleSQL("SELECT * FROM cuenta_equipo ce JOIN cuenta c ON ce.CuentaCodigo = c.CuentaCodigo JOIN persona p ON c.CuentaCodigo=p.CuentaCodigo  WHERE id_equipo = $idEquipo");
			//$integrantes = equipoModelo::cargarEquipoIntegrantesModelo();

			return $integrantes;
		}


		public function asignarEquipoEstudianteControlador()
		{
			$idEquipo = modeloPrincipal::desencriptar($_POST['equipo-asig']);
			$cuentaEstudiante = modeloPrincipal::desencriptar($_POST['estudiante-asig']);
			$creador = modeloPrincipal::desencriptar($_POST['cuentaCreador-asig']);

			$consultaEstudiante = modeloPrincipal::ejecutarConsultaSimpleSQL("SELECT CuentaCodigo FROM cuenta_equipo WHERE CuentaCodigo='$cuentaEstudiante'");

			if ($consultaEstudiante->rowCount()>=1)
			{
				$alerta = [
					"Alerta" => "simple",
					"Titulo" => "Error",
					"Texto" => "El ESTUDIANTE ya tiene un equipo. Verifique nuevamente",
					"Tipo" => "error"
				];
			}
			else
			{
				$datosEquipoEstudiante = [
							"idEquipo" => $idEquipo,
							"cuentaEstudiante" => $cuentaEstudiante,
							"Creador" => $creador
						];

				$estudianteAsignado = equipoModelo::asignarEquipoEstudianteModelo($datosEquipoEstudiante);

				if($estudianteAsignado)
				{
					$alerta = [
						"Alerta" => "limpiar",
						"Titulo" => "Éxito",
						"Texto" => "El estudiante fue agregado al equipo correctamente",
						"Tipo" => "success"
					];	
				} 
				else
				{
					$alerta = [
						"Alerta" => "simple",
						"Titulo" => "Error",
						"Texto" => "El estudiante NO fue agregado",
						"Tipo" => "error"
					];
				}
			}
			return modeloPrincipal::mostrarAlerta($alerta);

		}

		public function eliminarEquipoEstudianteControlador()
		{
			$idEquipo = modeloPrincipal::desencriptar($_POST['idEquipoEs-del']);

			$eliminarEstudiante = equipoModelo::eliminarEquipoEstudianteModelo($idEquipo);

				if ($eliminarEstudiante->rowCount()==1)
				{
					$alerta = [
						"Alerta" => "recargar",
						"Titulo" => "Éxito",
						"Texto" => "El estudiante fue eliminado del equipo correctamente del sistema",
						"Tipo" => "success"
					];
				} else {
					$alerta = [
						"Alerta" => "simple",
						"Titulo" => "Error",
						"Texto" => "No se elimino al estudiante del equipo. Intentelo mas tarde",
						"Tipo" => "error"
					];
				}
			

			return modeloPrincipal::mostrarAlerta($alerta);
			
		}


		
		/*Controlador para paginar los PROYECTOS*/
		public function paginarEquiposControlador($pagina, $noRegistros, $codigo, $busqueda)
		{
			$pagina = modeloPrincipal::limpiarCadena($pagina);
			$noRegistros = modeloPrincipal::limpiarCadena($noRegistros);
			$codigo = modeloPrincipal::limpiarCadena($codigo);
			$busqueda = modeloPrincipal::limpiarCadena($busqueda);

			$tabla = "";

			$pagina = (isset($pagina) && $pagina>0) ? (int)$pagina : 1 ;
			$inicio = ($pagina>0) ? (($pagina*$noRegistros)-$noRegistros) : 0;

			/*if (isset($busqueda) && $busqueda != "" ) {
				$consulta = "SELECT SQL_CALC_FOUND_ROWS * FROM persona WHERE PersonaPrivilegio = 'Administrador' AND ((CuentaCodigo!='$codigo' AND id!='2') AND (PersonaNombre LIKE '%$busqueda%' OR PersonaApellido LIKE '%$busqueda%' OR PersonaDNI LIKE '%$busqueda%')) ORDER BY PersonaNombre ASC LIMIT $inicio, $noRegistros";

				$paginaURL = "adminsearch";

			} else {*/
				$consulta = "SELECT SQL_CALC_FOUND_ROWS * FROM equipo WHERE cuentaCreador = '$codigo' ORDER BY equipo ASC LIMIT $inicio, $noRegistros";
				$paginaURL = "equipolist";
			//}
			

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
											<th class="text-center">EQUIPO</th>
											<!--th class="text-center">CONSULTAR</th-->
											<th class="text-center">ACTUALIZAR</th>
											<th class="text-center">ELIMINAR</th>
										</tr>
									</thead>
									<tbody>';

			if ($total >=1 && $pagina<=$noPaginas)
			{
				$contador = $inicio+1;

				foreach ($datos as $equipo)
				{
					$tabla .= '		<tr>
										<td><p>'.$contador.'</p></td>
										<td><p>'.$equipo['equipo'].'</td>';
						
						$tabla .= '		<!--td>
											<a href="'.SERVERURL.'equipoInfo/'.modeloPrincipal::encriptar($equipo['id_equipo']).'/" class="btn btn-info btn-raised btn-sm">
												<i class="zmdi zmdi-file"></i>
											</a>
										</td-->
										<td>
											<a href="'.SERVERURL.'equipoActualizar/'.modeloPrincipal::encriptar($equipo['id_equipo']).'/" class="btn btn-success btn-raised btn-sm">
												<i class="zmdi zmdi-file"></i>
											</a>
										</td>	
						';
						$tabla .= '		<td>
											<form action="'.SERVERURL.'ajax/equipoAjax.php" method="POST" class="FormularioAjax" data-form="delete" enctype="multipart/forma-data" autocomplete="off">

												<input type="hidden" name="idEquipo-del" value="'.modeloPrincipal::encriptar($equipo['id_equipo']).'">

												<button type="submit" class="btn btn-danger btn-raised btn-sm">
													<i class="zmdi zmdi-delete"></i>
												</button>
												<div class="RespuestaAjax"></div>

											</form>
										</td>
									</tr>';

								$contador++;
				}
			}
			else
			{
				if ($total>=1) {
					$tabla .= '<tr>
									<td colspan="6">

										<a href="'.SERVERURL.$paginaURL.'/" class="btn btn-success btn-raised">
											<i class="zmdi zmdi-refresh zmdi-hc-spin"></i> Recargar tabla de Equipos
										</a>

									</td>
								</tr>';
				} else {
					$tabla .= '<tr>
									<td colspan="6">No hay equipos en el Sistema</td>
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
					
					$tabla .= '<li class="disabled"><a><i class="zmdi zmdi-long-arrow-right"></i></a></li>';

				} 
				else 
				{
					$tabla .= '<li><a href="'.SERVERURL.$paginaURL.'/'.($pagina+1).'/"><i class="zmdi zmdi-long-arrow-right"></i></a></li>';
				}
				


				$tabla .= '</ul>
							</nav>
							';
			} else {
				# code...
			}
			

			return $tabla;


		}
		/*FIN del paginador de ADMINISTRADORES*/

		/*Controlador para paginar las ASIGNACIONES*/
		public function paginarEquiposEstudiantesControlador($pagina, $noRegistros, $codigo, $busqueda)
		{
			$pagina = modeloPrincipal::limpiarCadena($pagina);
			$noRegistros = modeloPrincipal::limpiarCadena($noRegistros);
			$codigo = modeloPrincipal::limpiarCadena($codigo);
			$busqueda = modeloPrincipal::limpiarCadena($busqueda);

			$tabla = "";

			$pagina = (isset($pagina) && $pagina>0) ? (int)$pagina : 1 ;
			$inicio = ($pagina>0) ? (($pagina*$noRegistros)-$noRegistros) : 0;

			
			$consulta = "SELECT SQL_CALC_FOUND_ROWS ce.id_equipo_usuario, ce.id_equipo, p.PersonaNombre, p.PersonaApellido, e.equipo FROM cuenta_equipo ce INNER JOIN persona p ON ce.CuentaCodigo = p.CuentaCodigo
INNER JOIN equipo e ON e.id_equipo = ce.id_equipo WHERE ce.cuentaCreador ='$codigo' ORDER BY id_equipo ASC LIMIT $inicio, $noRegistros";
			$paginaURL = "equipoEstudianteslist";
			
			

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
											<th class="text-center">EQUIPO</th>
											<th class="text-center">NOMBRE DEL ESTUDIANTE</th>
											<!--th class="text-center">ACTUALIZAR</th-->
											<th class="text-center">ELIMINAR DEL EQUIPO</th>
										</tr>
									</thead>
									<tbody>';

			if ($total >=1 && $pagina<=$noPaginas)
			{
				$contador = $inicio+1;

				foreach ($datos as $equipoEs)
				{
					$tabla .= '		<tr>
										<td><p>'.$contador.'</p></td>
										<td><p>'.$equipoEs['equipo'].'</td>
										<td><p>'.$equipoEs['PersonaNombre'].' '.$equipoEs['PersonaApellido'].'</td>';
						
						$tabla .= '		<!--td>
											<a href="'.SERVERURL.'equipoInfo/'.modeloPrincipal::encriptar($equipoEs['id_equipo_usuario']).'/" class="btn btn-info btn-raised btn-sm">
												<i class="zmdi zmdi-file"></i>
											</a>
										</td-->
										<!--td>
											<a href="'.SERVERURL.'equipoEstudianteActualizar/'.modeloPrincipal::encriptar($equipoEs['id_equipo_usuario']).'/" class="btn btn-success btn-raised btn-sm">
												<i class="zmdi zmdi-file"></i>
											</a>
										</td-->	
						';
						$tabla .= '		<td>
											<form action="'.SERVERURL.'ajax/equipoAjax.php" method="POST" class="FormularioAjax" data-form="delete" enctype="multipart/forma-data" autocomplete="off">

												<input type="hidden" name="idEquipoEs-del" value="'.modeloPrincipal::encriptar($equipoEs['id_equipo_usuario']).'">

												<button type="submit" class="btn btn-danger btn-raised btn-sm">
													<i class="zmdi zmdi-delete"></i>
												</button>
												<div class="RespuestaAjax"></div>

											</form>
										</td>
									</tr>';

								$contador++;
				}
			}
			else
			{
				if ($total>=1) {
					$tabla .= '<tr>
									<td colspan="6">

										<a href="'.SERVERURL.$paginaURL.'/" class="btn btn-success btn-raised">
											<i class="zmdi zmdi-refresh zmdi-hc-spin"></i> Recargar tabla de Equipos
										</a>

									</td>
								</tr>';
				} else {
					$tabla .= '<tr>
									<td colspan="6">No hay estudiantes agregados en un equipo en el Sistema</td>
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
					
					$tabla .= '<li class="disabled"><a><i class="zmdi zmdi-long-arrow-right"></i></a></li>';

				} 
				else 
				{
					$tabla .= '<li><a href="'.SERVERURL.$paginaURL.'/'.($pagina+1).'/"><i class="zmdi zmdi-long-arrow-right"></i></a></li>';
				}
				


				$tabla .= '</ul>
							</nav>
							';
			} else {
				# code...
			}
			

			return $tabla;


		}
		/*FIN del paginador de ASIGNACION EQUIPO Y ESTUDIANTE*/

		


	}