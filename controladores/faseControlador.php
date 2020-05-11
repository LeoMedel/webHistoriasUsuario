<?php
	if($peticionAjax)
	{
		require_once "../modelos/faseModelo.php";
	}
	else
	{
		require_once "./modelos/faseModelo.php";
	}

	/**
	 * 
	 */
	class faseControlador extends faseModelo
	{

		/*Controlador para Agregar FASE*/
		public function agregarfaseControlador()
		{
			//Fase
			$titulo = modeloPrincipal::limpiarCadena($_POST['tituloFase-reg']);
			$descripcion = modeloPrincipal::limpiarCadena($_POST['descripcionFase-reg']);
			$objetivo = modeloPrincipal::limpiarCadena($_POST['objetivoFase-reg']);
			$inicio = $_POST['inicioFase-reg'];
			$fin = $_POST['finFase-reg'];
			$proyecto = modeloPrincipal::desencriptar($_POST['CodigoProyecto-reg']);


			$fechaInicio=date_create($inicio);
			$fechaFin=date_create($fin);
			$inicio = date_format($fechaInicio,"Y/m/d");
			$fin = date_format($fechaFin,"Y/m/d");
			
			
			$consultaTitulo = modeloPrincipal::ejecutarConsultaSimpleSQL("SELECT fase FROM fases WHERE fase='$titulo'");

			
			if ($consultaTitulo->rowCount()>=1) {
				$alerta = [
					"Alerta" => "simple",
					"Titulo" => "Error",
					"Texto" => "El TITULO de la fase ya esta registrado en el sistema. Verifique nuevamente",
					"Tipo" => "error"
				];
			}
			else
			{

					if( ($inicio > $fin) || ($inicio == $fin) )
					{
						$alerta = [
							"Alerta" => "simple",
							"Titulo" => "Error",
							"Texto" => "Las fechas NO son validas. Verifique nuevamente",
							"Tipo" => "error"
						];	
					} 
					else
					{

						$datosFase = [
							"Fase" => $titulo,
							"Descripcion" => $descripcion,
							"Objetivo" => $objetivo,
							"Inicio" => $inicio,
							"Fin" => $fin,
							"Proyecto" => $proyecto
						];

						$faseAgregada = faseModelo::agregarFaseModelo($datosFase);

						if($faseAgregada)
						{
							$alerta = [
								"Alerta" => "limpiar",
								"Titulo" => "Éxito",
								"Texto" => "La fase fue agregada correctamente",
								"Tipo" => "success"
							];	
						} 
						else
						{
							$alerta = [
								"Alerta" => "simple",
								"Titulo" => "Error",
								"Texto" => "La fase NO fue agregada",
								"Tipo" => "error"
							];
						}

					}

					
					
			}


						
			return modeloPrincipal::mostrarAlerta($alerta);
		}
		/*Fin de Agregar FASE*/


		/*Inicio de Actualizar FASE*/
		public function actualizarFaseControlador()
		{
			//Fase
			$idFase = modeloPrincipal::desencriptar($_POST['idFase-up']);
			$proyecto = modeloPrincipal::desencriptar($_POST['CodigoProyecto-up']);

			$titulo = modeloPrincipal::limpiarCadena($_POST['tituloFase-up']);
			$descripcion = modeloPrincipal::limpiarCadena($_POST['descripcionFase-up']);
			$objetivo = modeloPrincipal::limpiarCadena($_POST['objetivoFase-up']);
			$inicio = $_POST['inicioFase-up'];
			$fin = $_POST['finFase-up'];
			


			$fechaInicio=date_create($inicio);
			$fechaFin=date_create($fin);
			$inicio = date_format($fechaInicio,"Y/m/d");
			$fin = date_format($fechaFin,"Y/m/d");

			$consultaTitulo = modeloPrincipal::ejecutarConsultaSimpleSQL("SELECT fase FROM fases WHERE fase='$titulo' AND id_fase!='$idFase'");

			
			if ($consultaTitulo->rowCount()>=1) {
				$alerta = [
					"Alerta" => "simple",
					"Titulo" => "Error",
					"Texto" => "El TITULO de la fase ya esta registrado en el sistema. Verifique nuevamente",
					"Tipo" => "error"
				];
				
				return modeloPrincipal::mostrarAlerta($alerta);
				exit();
			}
			else
			{

					if( ($inicio > $fin) || ($inicio == $fin) )
					{
						$alerta = [
							"Alerta" => "simple",
							"Titulo" => "Error",
							"Texto" => "Las fechas NO son validas. Verifique nuevamente",
							"Tipo" => "error"
						];	
						
						return modeloPrincipal::mostrarAlerta($alerta);
						exit();
					} 
					else
					{

						$datosFase = [
							"IdFase" => $idFase,
							"Fase" => $titulo,
							"Descripcion" => $descripcion,
							"Objetivo" => $objetivo,
							"Inicio" => $inicio,
							"Fin" => $fin,
							"Proyecto" => $proyecto
						];

						$faseActualizada = faseModelo::actualizarFaseModelo($datosFase);

						if($faseActualizada)
						{
							$alerta = [
								"Alerta" => "recargar",
								"Titulo" => "Éxito",
								"Texto" => "La fase fue actualizada correctamente",
								"Tipo" => "success"
							];	
						} 
						else
						{
							$alerta = [
								"Alerta" => "simple",
								"Titulo" => "Error",
								"Texto" => "La fase NO fue actualizada",
								"Tipo" => "error"
							];
						}

					}
					
			}
						
			return modeloPrincipal::mostrarAlerta($alerta);

		}
		/*Fin de Actualizar FASE*/


		/*Eliminar ADMINISTRADORES*/
		public function eliminarFaseControlador()
		{
			$idFase = modeloPrincipal::desencriptar($_POST['idFase-del']);

			$eliminarFase = faseModelo::eliminarFaseModelo($idFase);

				if ($eliminarFase->rowCount()==1)
				{
					$alerta = [
						"Alerta" => "recargar",
						"Titulo" => "Éxito",
						"Texto" => "La fase fue eliminada correctamente del sistema",
						"Tipo" => "success"
					];
				} else {
					$alerta = [
						"Alerta" => "simple",
						"Titulo" => "Error",
						"Texto" => "No se elimino la fase. Intentelo mas tarde",
						"Tipo" => "error"
					];
				}
			

			return modeloPrincipal::mostrarAlerta($alerta);
			

		}
		/*FIN de Eliminar FASE*/

		/*Controlador para mostrar la informacion FASE*/
		public function mostrarInfoFaseControlador($codigo)
		{
			$codigo = modeloPrincipal::desencriptar($codigo);

			return faseModelo::mostrarInfoFaseModelo($codigo);
		}
		/*FIN Controlador para mostrar la informacion FASE*/

		public function buscarDatosdeAccesoFasesControlador($idPro)
		{
			$idMetodologia = modeloPrincipal::ejecutarConsultaSimpleSQL("SELECT id_metodologia FROM proyecto_metodologia WHERE id_proyecto='$idPro'");
			//$id = $idMetodologia->fetch();
			//$idMetodologia = $id['id_metodologia'];
			return $idMetodologia;
		}
		
		/*Controlador para paginar FASES*/
		public function paginarFasesControlador($pagina, $noRegistros, $codigoProyecto, $busqueda)
		{
			$pagina = modeloPrincipal::limpiarCadena($pagina);
			$noRegistros = modeloPrincipal::limpiarCadena($noRegistros);
			$codigoProyecto = (int) modeloPrincipal::limpiarCadena($codigoProyecto);
			$busqueda = modeloPrincipal::limpiarCadena($busqueda);

			$tabla = "";

			$pagina = (isset($pagina) && $pagina>0) ? (int)$pagina : 1 ;
			$inicio = ($pagina>0) ? (($pagina*$noRegistros)-$noRegistros) : 0;

			$idMetodologia = modeloPrincipal::ejecutarConsultaSimpleSQL("SELECT * FROM proyecto_metodologia WHERE id_proyecto='$codigoProyecto'");
			$id = $idMetodologia->fetch();
			$idMetodologia = $id['id_metodologia'];
			
			$consulta = "SELECT SQL_CALC_FOUND_ROWS * FROM fases WHERE id_metodologia='$idMetodologia' ORDER BY fase ASC LIMIT $inicio, $noRegistros";
			$paginaURL = "faselist";

			

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
											<th class="text-center">FASE</th>
											<th class="text-center">DESCRIPCION</th>
											<th class="text-center">FECHA DE INICIO</th>
											<th class="text-center">FECHA FIN</th>
											<th class="text-center">OBJETIVO</th>
											<th class="text-center">ID METODOLOGIA</th>
											<th class="text-center">ID ESTADO</th>
											<th class="text-center">ACTUALIZAR</th>
											<th class="text-center">ELIMINAR</th>
										</tr>
									</thead>
									<tbody>';

			if ($total >=1 && $pagina<=$noPaginas)
			{
				$contador = $inicio+1;

				foreach ($datos as $fase)
				{
					$tabla .= '		<tr>
										<td><p>'.$contador.'</p></td>
										<td><p>'.$fase['fase'].'</td>
										<td><p>'.$fase['descripcion'].'</p></td>
										<td><p>'.$fase['fecha_inicio'].'</p></td>
										<td><p>'.$fase['fecha_fin'].'</p></td>
										<td><p>'.$fase['objetivo'].'</p></td>
										<td><p>'.$fase['id_metodologia'].'</p></td>
										<td><p>'.$fase['id_estado'].'</p></td>';
						
						$tabla .= '		<!--td>
											<a href="'.SERVERURL.'proyectoInfo/'.modeloPrincipal::encriptar($fase['id_fase']).'/" class="btn btn-info btn-raised btn-sm">
												<i class="zmdi zmdi-file"></i>
											</a>
										</td-->
										<td>
											<a href="'.SERVERURL.'faseActualizar/'.modeloPrincipal::encriptar($fase['id_fase']).'/" class="btn btn-success btn-raised btn-sm">
												<i class="zmdi zmdi-file"></i>
											</a>
										</td>	
						';
						$tabla .= '		<td>
											<form action="'.SERVERURL.'ajax/faseAjax.php" method="POST" class="FormularioAjax" data-form="delete" enctype="multipart/forma-data" autocomplete="off">

												<input type="hidden" name="idFase-del" value="'.modeloPrincipal::encriptar($fase['id_fase']).'">

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
											<i class="zmdi zmdi-refresh zmdi-hc-spin"></i> Recargar tabla de Fases
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