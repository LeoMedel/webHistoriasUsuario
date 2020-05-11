<?php
	if($peticionAjax)
	{
		require_once "../modelos/salonModelo.php";
	}
	else
	{
		require_once "./modelos/salonModelo.php";
	}

	/**
	 * 
	 */
	class salonControlador extends salonModelo
	{
		public function agregarSalonControlador()
		{
			$salon = modeloPrincipal::limpiarCadena($_POST['salon-reg']);

			$consultaSalon = modeloPrincipal::ejecutarConsultaSimpleSQL("SELECT Salon FROM salon WHERE Salon='$salon'");

			if($consultaSalon->rowCount() > 0)
			{
				$alerta = [
					"Alerta" => "simple",
					"Titulo" => "Error",
					"Texto" => "El SALON ya esta registrado en el sistema. Verifique nuevamente",
					"Tipo" => "error"
				];
			}
			else
			{
				$datosSalon = [
					"Salon" => $salon
				];

				$salonAgregado = salonModelo::agregarSalonModelo($datosSalon);

				if($salonAgregado)
				{
					$alerta = [
						"Alerta" => "limpiar",
						"Titulo" => "Éxito",
						"Texto" => "El salón fue agregado correctamente",
						"Tipo" => "success"
					];	
				} 
				else
				{
					$alerta = [
						"Alerta" => "simple",
						"Titulo" => "Error",
						"Texto" => "El salón NO fue agregado",
						"Tipo" => "error"
					];
				}
			}
			return modeloPrincipal::mostrarAlerta($alerta);
		}

		public function actualizarSalonControlador()
		{
			$idSalon = modeloPrincipal::desencriptar($_POST['idSalon-up']);
			$salon = modeloPrincipal::limpiarCadena($_POST['salon-up']);

			$consultaSalon = modeloPrincipal::ejecutarConsultaSimpleSQL("SELECT Salon FROM salon WHERE Salon='$salon' AND id_salon != $idSalon ");

			if($consultaSalon->rowCount() > 0)
			{
				$alerta = [
					"Alerta" => "simple",
					"Titulo" => "Error",
					"Texto" => "El SALON ya esta registrado en el sistema. Verifique nuevamente",
					"Tipo" => "error"
				];
			}
			else
			{
				$datosSalon = [
					"IdSalon" => $idSalon,
					"Salon" => $salon
				];

				$salonActualizado = salonModelo::actualizarSalonModelo($datosSalon);

				if($salonActualizado)
				{
					$alerta = [
						"Alerta" => "redireccionar",
						"Titulo" => "Éxito",
						"Texto" => "El salón fue actualizado correctamente",
						"Tipo" => "success",
						"Pagina" => "salonlist/"
					];	

					return modeloPrincipal::mostrarAlertaRedireccion($alerta);
				} 
				else
				{
					$alerta = [
						"Alerta" => "simple",
						"Titulo" => "Error",
						"Texto" => "El salón NO fue actualzado",
						"Tipo" => "error"
					];
				}
			}
			return modeloPrincipal::mostrarAlerta($alerta);
		}

		public function eliminarSalonControlador()
		{
			$idSalon = modeloPrincipal::desencriptar($_POST['idSalon-del']);

			$eliminarSalon = salonModelo::eliminarSalonModelo($idSalon);

				if ($eliminarSalon->rowCount()> 0)
				{
					$alerta = [
						"Alerta" => "recargar",
						"Titulo" => "Éxito",
						"Texto" => "El Salon fue eliminado correctamente del sistema",
						"Tipo" => "success"
					];
				} else {
					$alerta = [
						"Alerta" => "simple",
						"Titulo" => "Error",
						"Texto" => "No se elimino el salon. Intentelo mas tarde",
						"Tipo" => "error"
					];
				}
			

			return modeloPrincipal::mostrarAlerta($alerta);
		}

		public function mostrarInfoSalonControlador($codigo)
		{
			$codigo = modeloPrincipal::desencriptar($codigo);

			return salonModelo::mostrarInfoSalonModelo($codigo);
		}

		public function cargarSalonesControlador()
		{
			return modeloPrincipal::ejecutarConsultaSimpleSQL("SELECT * FROM salon");
		}

		/*Controlador para paginar los SALONES*/
		public function paginarSalonesControlador($pagina, $noRegistros, $codigo, $busqueda)
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
				$consulta = "SELECT SQL_CALC_FOUND_ROWS * FROM salon ORDER BY Salon ASC LIMIT $inicio, $noRegistros";
				$paginaURL = "salonlist";
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
											<th class="text-center">SALON</th>
											<th class="text-center">ACTUALIZAR</th>
											<th class="text-center">ELIMINAR</th>
										</tr>
									</thead>
									<tbody>';

			if ($total >=1 && $pagina<=$noPaginas)
			{
				$contador = $inicio+1;

				foreach ($datos as $salon)
				{
					$tabla .= '		<tr>
										<td><p>'.$contador.'</p></td>
										<td><p>'.$salon['Salon'].'</td>';
						
						$tabla .= '		<td>
											<a href="'.SERVERURL.'salonActualizar/'.modeloPrincipal::encriptar($salon['id_salon']).'/" class="btn btn-success btn-raised btn-sm">
												<i class="zmdi zmdi-file"></i>
											</a>
										</td>	
						';
						$tabla .= '		<td>
											<form action="'.SERVERURL.'ajax/salonAjax.php" method="POST" class="FormularioAjax" data-form="delete" enctype="multipart/forma-data" autocomplete="off">

												<input type="hidden" name="idSalon-del" value="'.modeloPrincipal::encriptar($salon['id_salon']).'">

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
											<i class="zmdi zmdi-refresh zmdi-hc-spin"></i> Recargar tabla de Salones
										</a>

									</td>
								</tr>';
				} else {
					$tabla .= '<tr>
									<td colspan="6">No hay registros en el Sistema</td>
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

	}