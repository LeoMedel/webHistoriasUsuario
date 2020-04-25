<?php
	if($peticionAjax)
	{
		require_once "../modelos/fuenteModelo.php";
	}
	else
	{
		require_once "./modelos/fuenteModelo.php";
	}

	/**
	 * 
	 */
	class fuenteControlador extends fuenteModelo
	{
		/*Controlador para Agregar PROYECTOS*/
		public function agregarFuenteControlador()
		{
			//Proyecto

			$metodologia = modeloPrincipal::desencriptar($_POST['idMetodologia-reg']);
			$descripcion = modeloPrincipal::limpiarCadena($_POST['descripcion-reg']);
			$url = modeloPrincipal::limpiarCadena($_POST['url-reg']);
			
			$consultaUrl = modeloPrincipal::ejecutarConsultaSimpleSQL("SELECT url FROM fuente WHERE url='$url' AND id_metodologia = '$metodologia'");

			
			if ($consultaUrl->rowCount()>=1) {
				$alerta = [
					"Alerta" => "simple",
					"Titulo" => "Error",
					"Texto" => "La URL de la fuente ya esta registrada en esta metodología. Verifique nuevamente",
					"Tipo" => "error"
				];
			}
			else
			{
				$datosFuente = [
					"IdMetodologia" => $metodologia,
					"Descripcion" => $descripcion,
					"Url" => $url
				];

				$fuenteAgregada = fuenteModelo::agregarFuenteModelo($datosFuente);

				if($fuenteAgregada)
				{
					$alerta = [
						"Pagina" => "metodologiaInfo/".modeloPrincipal::encriptar($metodologia),
						"Alerta" => "redireccionar",
						"Titulo" => "Éxito",
						"Texto" => "La Fuente fue agregada correctamente",
						"Tipo" => "success"
					];	

					return modeloPrincipal::mostrarAlertaRedireccion($alerta);
				} 
				else
				{
					$alerta = [
						"Alerta" => "simple",
						"Titulo" => "Error",
						"Texto" => "La Fuente NO fue agregada",
						"Tipo" => "error"
					];
				}
			}
						
			return modeloPrincipal::mostrarAlerta($alerta);
		}
		/*Fin de Agregar PROYECTO*/


		/*Controlador para paginar los PROYECTOS*/
		public function paginarFuentesControlador($pagina, $noRegistros, $id, $busqueda)
		{

			$pagina = modeloPrincipal::limpiarCadena($pagina);
			$noRegistros = modeloPrincipal::limpiarCadena($noRegistros);
			$idMetodologia = modeloPrincipal::desencriptar($id);
			$busqueda = modeloPrincipal::limpiarCadena($busqueda);


			$tabla = "";

			$pagina = (isset($pagina) && $pagina>0) ? (int)$pagina : 1 ;
			$inicio = ($pagina>0) ? (($pagina*$noRegistros)-$noRegistros) : 0;

			/*if (isset($busqueda) && $busqueda != "" ) {
				$consulta = "SELECT SQL_CALC_FOUND_ROWS * FROM persona WHERE PersonaPrivilegio = 'Administrador' AND ((CuentaCodigo!='$codigo' AND id!='2') AND (PersonaNombre LIKE '%$busqueda%' OR PersonaApellido LIKE '%$busqueda%' OR PersonaDNI LIKE '%$busqueda%')) ORDER BY PersonaNombre ASC LIMIT $inicio, $noRegistros";

				$paginaURL = "adminsearch";

			} else {*/
				$consulta = "SELECT SQL_CALC_FOUND_ROWS * FROM fuente WHERE id_metodologia='$idMetodologia' ORDER BY url ASC LIMIT $inicio, $noRegistros";
				$paginaURL = "metodologiaInfo/".$id;
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
											<th class="text-center">DESCRIPCION</th>
											<th class="text-center">FUENTE (URL)</th>
											<th class="text-center">ELIMINAR</th>
										</tr>
									</thead>
									<tbody>';

			if ($total >=1 && $pagina<=$noPaginas)
			{
				$contador = $inicio+1;

				foreach ($datos as $fuente)
				{
					$tabla .= '		<tr>
										<td><p>'.$contador.'</p></td>
										<td><p>'.$fuente['descripcion'].'</td>
										<td><p>'.$fuente['url'].'</p></td>';
						
						
						$tabla .= '		<td>
											<form action="'.SERVERURL.'ajax/fuenteAjax.php" method="POST" class="FormularioAjax" data-form="delete" enctype="multipart/forma-data" autocomplete="off">

												<input type="hidden" name="idFuente-del" value="'.modeloPrincipal::encriptar($fuente['id_fuente']).'">

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
											<i class="zmdi zmdi-refresh zmdi-hc-spin"></i> Recargar tabla de Fuentes
										</a>

									</td>
								</tr>';
				} else {
					$tabla .= '<tr>
									<td colspan="6">No hay Fuentes en el Sistema</td>
								</tr>';
				}
				
				
			}
			


			$tabla .='			</tbody>
								</table>
							</div>
						';

			/*if ($total >=1 && $pagina <=$noPaginas) {
				$tabla .= '
							<nav class="text-center">
								<ul class="pagination pagination-sm">
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
			*/



			return $tabla;


		}
		/*FIN del paginador de ADMINISTRADORES*/


		/*Controlador para mostrar la informacion de un PROYECTO*/
		public function mostrarInfoMetodologiaControlador($idMet)
		{
			$idMet = modeloPrincipal::desencriptar($idMet);

			return metodologiaModelo::mostrarInfoMetodologiaModelo($idMet);
		}
		/*FIN Controlador para mostrar la informacion de un PROYECTO*/

		public function actualizarProyectoControlador()
		{
			//Proyecto
			$idProyecto = modeloPrincipal::desencriptar($_POST['idProyecto-up']);
			$titulo = modeloPrincipal::limpiarCadena($_POST['titulo-up']);
			
			$inicio = $_POST['inicio-up'];
			$fin = $_POST['fin-up'];


			$fechaInicio=date_create($inicio);
			$fechaFin=date_create($fin);
			$inicio = date_format($fechaInicio,"Y/m/d");
			$fin = date_format($fechaFin,"Y/m/d");

			$consultaTitulo = modeloPrincipal::ejecutarConsultaSimpleSQL("SELECT titulo FROM proyecto WHERE titulo='$titulo'");

			
			if ($consultaTitulo->rowCount()>=1) {
				$alerta = [
					"Alerta" => "simple",
					"Titulo" => "Error",
					"Texto" => "El TITULO ya esta registrado en el sistema. Verifique nuevamente",
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

						$datosProyecto = [
							"IdProyecto" => $idProyecto,
							"Titulo" => $titulo,
							"Inicio" => $inicio,
							"Fin" => $fin
						];

						$proyectoActualizado = proyectoModelo::actualizarProyectoModelo($datosProyecto);

						if($proyectoActualizado)
						{
							$alerta = [
								"Alerta" => "recargar",
								"Titulo" => "Éxito",
								"Texto" => "El proyecto fue actualizado correctamente",
								"Tipo" => "success"
							];	
						} 
						else
						{
							$alerta = [
								"Alerta" => "simple",
								"Titulo" => "Error",
								"Texto" => "El proyecto NO fue actualizado",
								"Tipo" => "error"
							];
						}

					}
					
			}
						
			return modeloPrincipal::mostrarAlerta($alerta);

		}


		/*Eliminar ADMINISTRADORES*/
		public function eliminarFuenteControlador()
		{
			$idFuente = modeloPrincipal::desencriptar($_POST['idFuente-del']);

			$eliminarFuente = fuenteModelo::eliminarFuenteModelo($idFuente);

				if ($eliminarFuente->rowCount()==1)
				{
					$alerta = [
						"Alerta" => "recargar",
						"Titulo" => "Éxito",
						"Texto" => "La Fuente fue eliminada correctamente del sistema",
						"Tipo" => "success"
					];
				} else {
					$alerta = [
						"Alerta" => "simple",
						"Titulo" => "Error",
						"Texto" => "No se elimino la fuente. Intentelo mas tarde",
						"Tipo" => "error"
					];
				}
			

			return modeloPrincipal::mostrarAlerta($alerta);
			

		}




	}