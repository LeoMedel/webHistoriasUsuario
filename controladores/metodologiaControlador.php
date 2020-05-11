<?php
	if($peticionAjax)
	{
		require_once "../modelos/metodologiaModelo.php";
	}
	else
	{
		require_once "./modelos/metodologiaModelo.php";
	}

	/**
	 * 
	 */
	class metodologiaControlador extends metodologiaModelo
	{
		/*Controlador para Agregar PROYECTOS*/
		public function agregarMetodologiaControlador()
		{
			//Proyecto
			$metodologia = modeloPrincipal::limpiarCadena($_POST['metodologia-reg']);
			$descripcion = modeloPrincipal::limpiarCadena($_POST['descripcion-reg']);
			$creador = modeloPrincipal::desencriptar($_POST['CodigoCuenta-reg']);
			
			//$consultaMetodologia = modeloPrincipal::ejecutarConsultaSimpleSQL("SELECT metodologia FROM metodologia WHERE metodologia='$metodologia'");
			/*
			if ($consultaMetodologia->rowCount()>=1) {
				$alerta = [
					"Alerta" => "simple",
					"Titulo" => "Error",
					"Texto" => "La METODOLOGÍA ya esta registrada en el sistema. Verifique nuevamente",
					"Tipo" => "error"
				];
			}
			else
			{
				
		
			}
			*/

			$datosMetodologia = [
				"Metodologia" => $metodologia,
				"Descripcion" => $descripcion,
				"Creador" => $creador
			];

			$metodologiaAgregada = metodologiaModelo::agregarMetodologiaModelo($datosMetodologia);

			if($metodologiaAgregada)
			{
				$alerta = [
					"Alerta" => "limpiar",
					"Titulo" => "Éxito",
					"Texto" => "La Metodologia fue agregada correctamente",
					"Tipo" => "success"
				];	
			} 
			else
			{
				$alerta = [
					"Alerta" => "simple",
					"Titulo" => "Error",
					"Texto" => "La Metodologia NO fue agregada",
					"Tipo" => "error"
				];
			}
						
			return modeloPrincipal::mostrarAlerta($alerta);
		}
		/*Fin de Agregar PROYECTO*/

		public function actualizarMetodologiaControlador()
		{
			//metodologia id
			$metodologia = modeloPrincipal::limpiarCadena($_POST['metodologia-up']);
			$descripcion = modeloPrincipal::limpiarCadena($_POST['descripcion-up']);
			$idMetodologia = modeloPrincipal::desencriptar($_POST['idMetodologia-up']);
			
			//$consultaMetodologia = modeloPrincipal::ejecutarConsultaSimpleSQL("SELECT metodologia FROM metodologia WHERE metodologia='$metodologia' AND id_metodologia != $idMetodologia ");
			/*
			if ($consultaMetodologia->rowCount()>=1) {
				$alerta = [
					"Alerta" => "simple",
					"Titulo" => "Error",
					"Texto" => "La METODOLOGÍA ya esta registrada en el sistema. Verifique nuevamente",
					"Tipo" => "error"
				];
			}
			else
			{
			}
			*/
			$datosMetodologia = [
				"Metodologia" => $metodologia,
				"Descripcion" => $descripcion,
				"IdMetodologia" => $idMetodologia
			];

			$metodologiaActualizada = metodologiaModelo::actualizarMetodologiaModelo($datosMetodologia);

			if($metodologiaActualizada)
			{
				$alerta = [
					"Alerta" => "recargar",
					"Titulo" => "Éxito",
					"Texto" => "La Metodologia fue actualizada correctamente",
					"Tipo" => "success"
				];	
			} 
			else
			{
				$alerta = [
					"Alerta" => "simple",
					"Titulo" => "Error",
					"Texto" => "La Metodologia NO fue actualizada",
					"Tipo" => "error"
				];
			}
						
			return modeloPrincipal::mostrarAlerta($alerta);
		}

		/*Controlador para paginar los PROYECTOS*/
		public function paginarMetodologiasControlador($pagina, $noRegistros, $codigo, $busqueda)
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
				$consulta = "SELECT SQL_CALC_FOUND_ROWS * FROM metodologia WHERE cuentaCreador ='$codigo' ORDER BY metodologia ASC LIMIT $inicio, $noRegistros";
				$paginaURL = "metodologialist";
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
											<th class="text-center">METODOLOGIA</th>
											<th class="text-center">DESCRIPCION</th>
											<th class="text-center">CONSULTAR</th>
											<th class="text-center">ACTUALIZAR</th>
											<th class="text-center">ELIMINAR</th>
										</tr>
									</thead>
									<tbody>';

			if ($total >=1 && $pagina<=$noPaginas)
			{
				$contador = $inicio+1;

				foreach ($datos as $metodologia)
				{
					$tabla .= '		<tr>
										<td><p>'.$contador.'</p></td>
										<td><p>'.$metodologia['metodologia'].'</td>
										<td><p>'.$metodologia['descripcion'].'</p></td>';
						
						$tabla .= '		<td>
											<a href="'.SERVERURL.'metodologiaInfo/'.modeloPrincipal::encriptar($metodologia['id_metodologia']).'/" class="btn btn-info btn-raised btn-sm">
												<i class="zmdi zmdi-file"></i>
											</a>
										</td>
										<td>
											<a href="'.SERVERURL.'metodologiaActualizar/'.modeloPrincipal::encriptar($metodologia['id_metodologia']).'/" class="btn btn-success btn-raised btn-sm">
												<i class="zmdi zmdi-file"></i>
											</a>
										</td>	
						';
						$tabla .= '		<td>
											<form action="'.SERVERURL.'ajax/metodologiaAjax.php" method="POST" class="FormularioAjax" data-form="delete" enctype="multipart/forma-data" autocomplete="off">

												<input type="hidden" name="idMetodologia-del" value="'.modeloPrincipal::encriptar($metodologia['id_metodologia']).'">

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
											<i class="zmdi zmdi-refresh zmdi-hc-spin"></i> Recargar tabla de Metodologias
										</a>

									</td>
								</tr>';
				} else {
					$tabla .= '<tr>
									<td colspan="6">No hay Metodologias en el Sistema</td>
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


		/*Eliminar METODOLOGIA*/
		public function eliminarMetodologiaControlador()
		{
			$idMetodologia = modeloPrincipal::desencriptar($_POST['idMetodologia-del']);

			$consultaFases = modeloPrincipal::ejecutarConsultaSimpleSQL("SELECT * FROM fases WHERE id_metodologia=$idMetodologia");

			if ($consultaFases->rowCount()>0) {
				$alerta = [
						"Alerta" => "simple",
						"Titulo" => "Fases registradas en la metodologia",
						"Texto" => "No se puede eliminar la metodologia. La metodologia tiene fases registradas",
						"Tipo" => "error"
					];
			}
			else
			{
				$consultaEquipo = modeloPrincipal::ejecutarConsultaSimpleSQL("SELECT * FROM proyecto_metodologia WHERE id_metodologia=$idMetodologia");

				if ($consultaEquipo->rowCount()>0) {
					$alerta = [
							"Alerta" => "simple",
							"Titulo" => "Equipo asignado con metodologia",
							"Texto" => "No se puede eliminar la metodologia. La metodologia tiene un equipo asignado",
							"Tipo" => "error"
						];
				}
				else
				{
					$eliminarFuentes = metodologiaModelo::eliminarMetodologiaFuentesModelo($idMetodologia);

					if ($eliminarFuentes)
					{
						$eliminarMetodologia = metodologiaModelo::eliminarMetodologiaModelo($idMetodologia);

						if ($eliminarMetodologia->rowCount()==1)
						{
							$alerta = [
								"Alerta" => "recargar",
								"Titulo" => "Éxito",
								"Texto" => "La metodologia fue eliminada correctamente del sistema",
								"Tipo" => "success"
							];
						} else {
							$alerta = [
								"Alerta" => "simple",
								"Titulo" => "Error",
								"Texto" => "No se elimino la metodologia. Intentelo mas tarde",
								"Tipo" => "error"
							];
						}

					} else {
						$alerta = [
							"Alerta" => "simple",
							"Titulo" => "Error",
							"Texto" => "No se eliminaron las fuentes. Intentelo mas tarde",
							"Tipo" => "error"
						];
					}

					
				}
			}
			

			return modeloPrincipal::mostrarAlerta($alerta);
			

		}

		public function cargarMetodologiasControlador($cuenta)
		{
			return metodologiaModelo::cargarMetodologiasModelo($cuenta);
		}




	}