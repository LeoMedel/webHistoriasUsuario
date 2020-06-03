<?php
	if($peticionAjax)
	{
		require_once "../modelos/moduloModelo.php";
	}
	else
	{
		require_once "./modelos/moduloModelo.php";
	}

	/**
	 * 
	 */
	class moduloControlador extends moduloModelo
	{

		/*Controlador para Agregar FASE*/
		public function agregarModuloControlador()
		{
			//Fase
			$titulo = modeloPrincipal::limpiarCadena($_POST['tituloModulo-reg']);
			$descripcion = modeloPrincipal::limpiarCadena($_POST['descripcionModulo-reg']);
			$observacion = modeloPrincipal::limpiarCadena($_POST['observacionModulo-reg']);
			$idFase = modeloPrincipal::desencriptar($_POST['CodigoFase-reg']);
			$idEquipo = modeloPrincipal::desencriptar($_POST['CodigoEquipo-reg']);


			$datosModulo = [
				"Modulo" => $titulo,
				"Descripcion" => $descripcion,
				"Observacion" => $observacion,
				"Fase" => $idFase,
				"Equipo" => $idEquipo
			];

			$moduloAgregado = moduloModelo::agregarModuloModelo($datosModulo);

			if($moduloAgregado)
			{
				$alerta = [
					"Alerta" => "limpiar",
					"Titulo" => "Éxito",
					"Texto" => "El modulo fue agregado correctamente",
					"Tipo" => "success"
				];	
			} 
			else
			{
				$alerta = [
					"Alerta" => "simple",
					"Titulo" => "Error",
					"Texto" => "El modulo NO fue agregado",
					"Tipo" => "error"
				];
			}

						
			return modeloPrincipal::mostrarAlerta($alerta);
		}
		/*Fin de Agregar FASE*/


		/*Inicio de Actualizar FASE*/
		public function actualizarModuloControlador()
		{
			//Fase
			$titulo = modeloPrincipal::limpiarCadena($_POST['tituloModulo-up']);
			$descripcion = modeloPrincipal::limpiarCadena($_POST['descripcionModulo-up']);
			$observacion = modeloPrincipal::limpiarCadena($_POST['observacionModulo-up']);
			$idModulo = modeloPrincipal::desencriptar($_POST['CodigoModulo-up']);

			$datosModulo = [
				"Modulo" => $titulo,
				"Descripcion" => $descripcion,
				"Observacion" => $observacion,
				"idModulo" => $idModulo
			];

			$moduloActualizado = moduloModelo::actualizarModuloModelo($datosModulo);

			if($moduloActualizado)
			{
				$alerta = [
					"Alerta" => "recargar",
					"Titulo" => "Éxito",
					"Texto" => "El modulo fue actualizado correctamente",
					"Tipo" => "success"
				];	
			} 
			else
			{
				$alerta = [
					"Alerta" => "simple",
					"Titulo" => "Error",
					"Texto" => "El modulo NO fue actualizado",
					"Tipo" => "error"
				];
			}		
			return modeloPrincipal::mostrarAlerta($alerta);

		}
		/*Fin de Actualizar FASE*/


		/*Eliminar ADMINISTRADORES*/
		public function eliminarModuloControlador()
		{
			$idModulo = modeloPrincipal::desencriptar($_POST['idModulo-del']);

			$eliminarModulo = moduloModelo::eliminarModuloModelo($idModulo);

				if ($eliminarModulo->rowCount()==1)
				{
					$alerta = [
						"Alerta" => "recargar",
						"Titulo" => "Éxito",
						"Texto" => "El modulo fue eliminado correctamente del sistema",
						"Tipo" => "success"
					];
				} else {
					$alerta = [
						"Alerta" => "simple",
						"Titulo" => "Error",
						"Texto" => "No se elimino el modulo. Intentelo mas tarde",
						"Tipo" => "error"
					];
				}
			

			return modeloPrincipal::mostrarAlerta($alerta);
			

		}
		/*FIN de Eliminar FASE*/

		/*Controlador para mostrar la informacion FASE*/
		public function mostrarInfoModuloControlador($codigo)
		{
			$codigo = modeloPrincipal::desencriptar($codigo);

			return moduloModelo::mostrarInfoModuloModelo($codigo);
		}
		/*FIN Controlador para mostrar la informacion FASE*/

		public function buscarDatosdeAccesoFasesControlador($idPro)
		{
			$idMetodologia = modeloPrincipal::ejecutarConsultaSimpleSQL("SELECT id_metodologia FROM proyecto_metodologia WHERE id_proyecto='$idPro'");
			//$id = $idMetodologia->fetch();
			//$idMetodologia = $id['id_metodologia'];
			return $idMetodologia;
		}
		

		public function cargarModulosControlador($idEquipo)
		{
			$codigo = modeloPrincipal::limpiarCadena($idEquipo);

			$modulos = modeloPrincipal::ejecutarConsultaSimpleSQL("SELECT * FROM modulo WHERE id_equipo=$codigo");

			return $modulos;
		}


		/*Controlador para paginar FASES*/
		public function paginarModulosControlador($pagina, $noRegistros, $codigoFase, $busqueda)
		{
			$pagina = modeloPrincipal::limpiarCadena($pagina);
			$noRegistros = modeloPrincipal::limpiarCadena($noRegistros);
			//$codigoProyecto = (int) modeloPrincipal::limpiarCadena($codigoProyecto);
			$busqueda = modeloPrincipal::limpiarCadena($busqueda);
			$fase = modeloPrincipal::desencriptar($codigoFase);

			$tabla = "";

			$pagina = (isset($pagina) && $pagina>0) ? (int)$pagina : 1 ;
			$inicio = ($pagina>0) ? (($pagina*$noRegistros)-$noRegistros) : 0;

			
			$consulta = "SELECT SQL_CALC_FOUND_ROWS m.id_modulo, m.titulo, m.descripcion, m.observacion, f.fase FROM modulo m JOIN fases f ON m.id_fase=f.id_fase WHERE m.id_fase='$fase' ORDER BY m.titulo ASC LIMIT $inicio, $noRegistros";
			$paginaURL = "faseModulo/".$codigoFase;

			

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
											<th class="text-center">MODULO</th>
											<th class="text-center">DESCRIPCION</th>
											<th class="text-center">OBSERVACION</th>
											<th class="text-center">FASE</th>
											<th class="text-center">ACTIVIDADES</th>
											<th class="text-center">ACTUALIZAR</th>
											<th class="text-center">ELIMINAR</th>
										</tr>
									</thead>
									<tbody>';

			if ($total >=1 && $pagina<=$noPaginas)
			{
				$contador = $inicio+1;

				foreach ($datos as $modulo)
				{
					$tabla .= '		<tr>
										<td><p>'.$contador.'</p></td>
										<td><p>'.$modulo['titulo'].'</td>
										<td><p>'.$modulo['descripcion'].'</p></td>
										<td><p>'.$modulo['observacion'].'</p></td>
										<td><p>'.$modulo['fase'].'</p></td>';
						
						$tabla .= '		<td>
											<a href="'.SERVERURL.'moduloActividades/'.modeloPrincipal::encriptar($modulo['id_modulo']).'/" class="btn btn-info btn-raised btn-sm">
												<i class="zmdi zmdi-file"></i>
											</a>
										</td>
										<td>
											<a href="'.SERVERURL.'moduloActualizar/'.modeloPrincipal::encriptar($modulo['id_modulo']).'/" class="btn btn-success btn-raised btn-sm">
												<i class="zmdi zmdi-file"></i>
											</a>
										</td>	
						';
						$tabla .= '		<td>
											<form action="'.SERVERURL.'ajax/moduloAjax.php" method="POST" class="FormularioAjax" data-form="delete" enctype="multipart/forma-data" autocomplete="off">

												<input type="hidden" name="idModulo-del" value="'.modeloPrincipal::encriptar($modulo['id_modulo']).'">

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
											<i class="zmdi zmdi-refresh zmdi-hc-spin"></i> Recargar tabla de Modulos
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