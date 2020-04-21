<?php 
	class vistasModelo{
		protected function obtener_vistas_modelo($vistas){
			$listaBlanca=[
				"adminlist",
				"adminsearch",
				"admin",
				"catalog",
				"client",
				"clientlist",
				"clientsearch",
				"docentes",
				"docentelist",
				"docentesearch",
				"home",
				"homeDocente",
				"homeEstudiante",
				"estudiantelist",
				"estudiante",
				"myaccount",
				"mydata",
				"proyectolist",
				"proyecto",
				"proyectoInfo",
				"proyectoActualizar",
				"metodologialist",
				"metodologia"
			];
			if(in_array($vistas, $listaBlanca))
			{
				if(is_file("./vistas/contenidos/".$vistas."-view.php"))
				{
					$contenido="./vistas/contenidos/".$vistas."-view.php";
				}
				else
				{
					$contenido="login";
				}
			}
			elseif($vistas=="login")
			{
				$contenido="login";
			}
			elseif($vistas=="index")
			{
				$contenido="login";
			}
			elseif($vistas=="registro")
			{
				$contenido="registro";
			}
			else
			{
				$contenido="404";
			}
			return $contenido;
		}
	}