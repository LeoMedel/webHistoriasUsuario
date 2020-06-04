<?php
	if($peticionAjax)
	{
		require_once "../modelos/recursoModelo.php";
	}
	else
	{
		require_once "./modelos/recursoModelo.php";
	}

	/**
	 * 
	 */
	class recursoControlador extends recursoModelo
	{

		/*Controlador para Agregar FASE*/
		public function agregarRecursoControlador()
		{
			//Recurso
			$recurso = modeloPrincipal::limpiarCadena($_POST['recurso-reg']);
			$equipo = modeloPrincipal::desencriptar($_POST['CodigoEquipo-reg']);
			
			
			$datosRecurso = [
				"Recurso" => $recurso,
				"Equipo" => $equipo
			];

			$recursoAgregado = recursoModelo::agregarRecursoModelo($datosRecurso);

			if($recursoAgregado)
			{
				$alerta = [
					"Alerta" => "limpiar",
					"Titulo" => "Éxito",
					"Texto" => "El recurso fue agregado correctamente",
					"Tipo" => "success"
				];	
			} 
			else
			{
				$alerta = [
					"Alerta" => "simple",
					"Titulo" => "Error",
					"Texto" => "El recurso NO fue agregado. Verifique nuevamente",
					"Tipo" => "error"
				];
			}
					
						
			return modeloPrincipal::mostrarAlerta($alerta);
		}
		/*Fin de Agregar FASE*/


		/*Inicio de Actualizar FASE*/
		public function actualizarRecursoControlador()
		{
			//Fase
			$idRecurso = modeloPrincipal::desencriptar($_POST['idRecurso-up']);
			$recurso = modeloPrincipal::limpiarCadena($_POST['recurso-up']);


			$datosRecurso = [
					"IdRecurso" => $idRecurso,
					"Recurso" => $recurso,
				];

				$recursoActualizado = recursoModelo::actualizarRecursoModelo($datosRecurso);

				if($recursoActualizado)
				{
					$alerta = [
						"Alerta" => "recargar",
						"Titulo" => "Éxito",
						"Texto" => "El recurso fue actualizado correctamente",
						"Tipo" => "success"
					];	
				} 
				else
				{
					$alerta = [
						"Alerta" => "simple",
						"Titulo" => "Error",
						"Texto" => "El recurso NO fue actualizado",
						"Tipo" => "error"
					];
				}
						
			return modeloPrincipal::mostrarAlerta($alerta);

		}
		/*Fin de Actualizar FASE*/


		/*Eliminar ADMINISTRADORES*/
		public function eliminarRecursoControlador()
		{
			$idRecurso = modeloPrincipal::desencriptar($_POST['idRecurso-del']);

			$eliminarRecurso = recursoModelo::eliminarRecursoModelo($idRecurso);

				if ($eliminarRecurso->rowCount()==1)
				{
					$alerta = [
						"Alerta" => "recargar",
						"Titulo" => "Éxito",
						"Texto" => "El recurso fue eliminado correctamente del sistema",
						"Tipo" => "success"
					];
				} else {
					$alerta = [
						"Alerta" => "simple",
						"Titulo" => "Error",
						"Texto" => "No se elimino el recurso. Intentelo mas tarde",
						"Tipo" => "error"
					];
				}
			

			return modeloPrincipal::mostrarAlerta($alerta);
			

		}
		/*FIN de Eliminar FASE*/

		/*Controlador para mostrar la informacion FASE*/
		public function mostrarInfoRecursoControlador($codigo)
		{
			$codigo = modeloPrincipal::desencriptar($codigo);

			return recursoModelo::mostrarInfoRecursoModelo($codigo);
		}
		/*FIN Controlador para mostrar la informacion FASE*/

		public function cargarRecursosControlador($idEquipo)
		{
			$recursos = modeloPrincipal::ejecutarConsultaSimpleSQL("SELECT * FROM tipo_recurso WHERE id_equipo=$idEquipo");

			return $recursos;

		}

		
		/*Controlador para paginar FASES*/
		public function paginarRecursosControlador($pagina, $noRegistros, $codigoEquipo, $busqueda)
		{
			$pagina = modeloPrincipal::limpiarCadena($pagina);
			$noRegistros = modeloPrincipal::limpiarCadena($noRegistros);
			$equipo = modeloPrincipal::limpiarCadena($codigoEquipo);
			$busqueda = modeloPrincipal::limpiarCadena($busqueda);

			$tabla = "";

			$pagina = (isset($pagina) && $pagina>0) ? (int)$pagina : 1 ;
			$inicio = ($pagina>0) ? (($pagina*$noRegistros)-$noRegistros) : 0;
			
			$consulta = "SELECT SQL_CALC_FOUND_ROWS * FROM tipo_recurso tr WHERE tr.id_equipo= $equipo ORDER BY tr.descripcion_recurso ASC LIMIT $inicio, $noRegistros";
			$paginaURL = "recursoslist";

			

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
											<th class="text-center">TIPO DE RECURSO</th>
											<th class="text-center">ACTUALIZAR</th>
											<th class="text-center">ELIMINAR</th>
										</tr>
									</thead>
									<tbody>';

			if ($total >=1 && $pagina<=$noPaginas)
			{
				$contador = $inicio+1;

				foreach ($datos as $recurso)
				{
					$tabla .= '		<tr>
										<td><p>'.$contador.'</p></td>
										<td><p>'.$recurso['descripcion_recurso'].'</td>';
						
						$tabla .= '		<td>
											<a href="'.SERVERURL.'recursoActualizar/'.modeloPrincipal::encriptar($recurso['id_tipo_recurso']).'/" class="btn btn-success btn-raised btn-sm">
												<i class="zmdi zmdi-file"></i>
											</a>
										</td>	
						';
						$tabla .= '		<td>
											<form action="'.SERVERURL.'ajax/recursoAjax.php" method="POST" class="FormularioAjax" data-form="delete" enctype="multipart/forma-data" autocomplete="off">

												<input type="hidden" name="idRecurso-del" value="'.modeloPrincipal::encriptar($recurso['id_tipo_recurso']).'">

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
											<i class="zmdi zmdi-refresh zmdi-hc-spin"></i> Recargar tabla de Recursos
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