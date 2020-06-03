<?php
	if($peticionAjax)
	{
		require_once "../modelos/actividadModelo.php";
	}
	else
	{
		require_once "./modelos/actividadModelo.php";
	}

	/**
	 * 
	 */
	class actividadControlador extends actividadModelo
	{

		/*Controlador para Agregar FASE*/
		public function agregarActividadControlador()
		{
			//Fase
			$actividad = modeloPrincipal::limpiarCadena($_POST['actividad-reg']);
			$modulo = modeloPrincipal::desencriptar($_POST['idModulo-reg']);
			$equipo = modeloPrincipal::desencriptar($_POST['CodigoEquipo-reg']);
			
			
			if ($modulo == 0)
			{
				$alerta = [
						"Alerta" => "simple",
						"Titulo" => "Error",
						"Texto" => "Seleccione un modulo. ". '\n\n'." NOTA: Para crear un MODULO primero debe crear FASES y dentro de esa fase podra crear un modulo",
						"Tipo" => "error"
					];
				return modeloPrincipal::mostrarAlerta($alerta);
				exit();

			} else {
				$datosActividad = [
					"Actividad" => $actividad,
					"Modulo" => $modulo,
					"Equipo" => $equipo
				];

				$actividadAgregada = actividadModelo::agregarActividadModelo($datosActividad);

				if($actividadAgregada)
				{
					$alerta = [
						"Alerta" => "limpiar",
						"Titulo" => "Éxito",
						"Texto" => "La actividad fue agregada correctamente",
						"Tipo" => "success"
					];	
				} 
				else
				{
					$alerta = [
						"Alerta" => "simple",
						"Titulo" => "Error",
						"Texto" => "La actividad NO fue agregada",
						"Tipo" => "error"
					];
				}
			}
					
						
			return modeloPrincipal::mostrarAlerta($alerta);
		}
		/*Fin de Agregar FASE*/


		/*Inicio de Actualizar FASE*/
		public function actualizarActividadControlador()
		{
			//Fase
			$idActividad = modeloPrincipal::desencriptar($_POST['idActividad-up']);
			$modulo = modeloPrincipal::desencriptar($_POST['idModulo-up']);

			$actividad = modeloPrincipal::limpiarCadena($_POST['actividad-up']);


			if ($modulo == 0) {
				$alerta = [
					"Alerta" => "simple",
					"Titulo" => "Error",
					"Texto" => "Seleccione el modulo. Verifique nuevamente",
					"Tipo" => "error"
				];
				
				return modeloPrincipal::mostrarAlerta($alerta);
				exit();
			}
			else
			{
				$datosActividad = [
					"IdActividad" => $idActividad,
					"Modulo" => $modulo,
					"Actividad" => $actividad,
				];

				$actividadActualizada = actividadModelo::actualizarActividadModelo($datosActividad);

				if($actividadActualizada)
				{
					$alerta = [
						"Alerta" => "recargar",
						"Titulo" => "Éxito",
						"Texto" => "La actividad fue actualizada correctamente",
						"Tipo" => "success"
					];	
				} 
				else
				{
					$alerta = [
						"Alerta" => "simple",
						"Titulo" => "Error",
						"Texto" => "La actividad NO fue actualizada",
						"Tipo" => "error"
					];
				}
					
			}
						
			return modeloPrincipal::mostrarAlerta($alerta);

		}
		/*Fin de Actualizar FASE*/


		/*Eliminar ADMINISTRADORES*/
		public function eliminarActividadControlador()
		{
			$idActividad = modeloPrincipal::desencriptar($_POST['idActividad-del']);

			$eliminarActividad = actividadModelo::eliminarActividadModelo($idActividad);

				if ($eliminarActividad->rowCount()==1)
				{
					$alerta = [
						"Alerta" => "recargar",
						"Titulo" => "Éxito",
						"Texto" => "La actividad fue eliminada correctamente del sistema",
						"Tipo" => "success"
					];
				} else {
					$alerta = [
						"Alerta" => "simple",
						"Titulo" => "Error",
						"Texto" => "No se elimino la actividad. Intentelo mas tarde",
						"Tipo" => "error"
					];
				}
			

			return modeloPrincipal::mostrarAlerta($alerta);
			

		}
		/*FIN de Eliminar FASE*/

		/*Controlador para mostrar la informacion FASE*/
		public function mostrarInfoActividadControlador($codigo)
		{
			$codigo = modeloPrincipal::desencriptar($codigo);

			return actividadModelo::mostrarInfoActividadModelo($codigo);
		}
		/*FIN Controlador para mostrar la informacion FASE*/

		
		/*Controlador para paginar FASES*/
		public function paginarActividadesControlador($pagina, $noRegistros, $codigoEquipo, $busqueda)
		{
			$pagina = modeloPrincipal::limpiarCadena($pagina);
			$noRegistros = modeloPrincipal::limpiarCadena($noRegistros);
			$equipo = modeloPrincipal::limpiarCadena($codigoEquipo);
			$busqueda = modeloPrincipal::limpiarCadena($busqueda);

			$tabla = "";

			$pagina = (isset($pagina) && $pagina>0) ? (int)$pagina : 1 ;
			$inicio = ($pagina>0) ? (($pagina*$noRegistros)-$noRegistros) : 0;
			
			$consulta = "SELECT SQL_CALC_FOUND_ROWS a.id_actividad, a.actividad, m.titulo, e.equipo FROM actividades a JOIN modulo m ON a.id_modulo=m.id_Modulo JOIN equipo e ON a.id_equipo=e.id_equipo WHERE a.id_equipo= $equipo ORDER BY a.actividad ASC LIMIT $inicio, $noRegistros";
			$paginaURL = "actividadeslist";

			

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
											<th class="text-center">ACTIVIDAD</th>
											<th class="text-center">MODULO</th>
											<th class="text-center">EQUIPO</th>
											<th class="text-center">ACTUALIZAR</th>
											<th class="text-center">ELIMINAR</th>
										</tr>
									</thead>
									<tbody>';

			if ($total >=1 && $pagina<=$noPaginas)
			{
				$contador = $inicio+1;

				foreach ($datos as $actividad)
				{
					$tabla .= '		<tr>
										<td><p>'.$contador.'</p></td>
										<td><p>'.$actividad['actividad'].'</td>
										<td><p>'.$actividad['titulo'].'</p></td>
										<td><p>'.$actividad['equipo'].'</p></td>';
						
						$tabla .= '		<td>
											<a href="'.SERVERURL.'actividadActualizar/'.modeloPrincipal::encriptar($actividad['id_actividad']).'/" class="btn btn-success btn-raised btn-sm">
												<i class="zmdi zmdi-file"></i>
											</a>
										</td>	
						';
						$tabla .= '		<td>
											<form action="'.SERVERURL.'ajax/actividadAjax.php" method="POST" class="FormularioAjax" data-form="delete" enctype="multipart/forma-data" autocomplete="off">

												<input type="hidden" name="idActividad-del" value="'.modeloPrincipal::encriptar($actividad['id_actividad']).'">

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
											<i class="zmdi zmdi-refresh zmdi-hc-spin"></i> Recargar tabla de Actividades
										</a>

									</td>
								</tr>';
				} else {
					$tabla .= '<tr>
									<td colspan="9">No hay registros en el Sistema</td>
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
		/*FIN del paginador FASES*/


	}