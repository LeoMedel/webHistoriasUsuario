<section class="full-box cover dashboard-sideBar">
	<div class="full-box dashboard-sideBar-bg btn-menu-dashboard"></div>
	<div class="full-box dashboard-sideBar-ct">
		<!--SideBar Title -->
		<div class="full-box text-uppercase text-center text-titles dashboard-sideBar-title">
			<?php echo COMPANY; ?> <i class="zmdi zmdi-close btn-menu-dashboard visible-xs"></i>
		</div>
		<!-- SideBar User info -->
		<div class="full-box dashboard-sideBar-UserInfo">
			<figure class="full-box">
				<img src="<?php echo SERVERURL; ?>vistas/assets/avatars/<?php echo $_SESSION['foto_sesion'];?>" alt="UserIcon">
				<figcaption class="text-center text-titles"><h4><?php echo $_SESSION['nombre_sesion']; ?> <?php echo $_SESSION['apellido_sesion']; ?> <!--?php echo $_SESSION['codigo_equipo_sesion'];?--></h4></figcaption>
				<figcaption class="text-center text-titles"><p style="font-size:130%; font: oblique bold 120% cursive;"><?php echo $_SESSION['usuario_sesion']; ?></p></figcaption>
			</figure>

			<?php

				if ($_SESSION['tipo_sesion']==1)
				{
					$tipo = "admin";
				}
				elseif($_SESSION['tipo_sesion']==2)
				{
					$tipo = "docente";
				}
				elseif($_SESSION['tipo_sesion']==3)
				{
					$tipo = "estudiante";
				}
				else
				{
					$tipo="user";
				}
				

			?>

			<ul class="full-box list-unstyled text-center">
				<?php	if ($_SESSION['tipo_sesion']==1) { ?>

					<li>
						<a href="<?php echo SERVERURL; ?>mydata/<?php echo $tipo."/".$loginControl->encriptar($_SESSION['codigo_cuenta_sesion']);?>/" title="Mis datos">
							<i class="zmdi zmdi-account-circle"></i>
						</a>
					</li>
					<li>
						<a href="<?php echo SERVERURL; ?>myaccount/<?php echo $tipo."/".$loginControl->encriptar($_SESSION['codigo_cuenta_sesion']);?>/" title="Mi cuenta">
							<i class="zmdi zmdi-settings"></i>
						</a>
					</li>
				<?php }  ?>
				
				<li>
					<a href="<?php echo $loginControl->encriptar($_SESSION['token_sesion']);?>" title="Salir del sistema" class="btn-exit-system">
						<i class="zmdi zmdi-power"></i>
					</a>
				</li>
			</ul>
			
		</div>
		
		
			
		


		<!-- SideBar Menu -->
		<ul class="list-unstyled full-box dashboard-sideBar-Menu">

		<?php	if ($_SESSION['tipo_sesion']==1) { ?>

			<li>
				<a href="<?php echo SERVERURL; ?>home/">
					<i class="zmdi zmdi-home zmdi-hc-fw"></i> INICIO
				</a>
			</li>
			<li>
				<a href="#!" class="btn-sideBar-SubMenu">
					<i class="zmdi zmdi-account-add zmdi-hc-fw"></i> Salones <i class="zmdi zmdi-caret-down pull-right"></i>
				</a>
				<ul class="list-unstyled full-box">
					<li>
						<a href="<?php echo SERVERURL; ?>salonlist/"><i class="zmdi zmdi-account zmdi-hc-fw"></i> Todos los salones</a>
					</li>
				</ul>
			</li>
			<li>
				<a href="#!" class="btn-sideBar-SubMenu">
					<i class="zmdi zmdi-account-add zmdi-hc-fw"></i> Usuarios <i class="zmdi zmdi-caret-down pull-right"></i>
				</a>
				<ul class="list-unstyled full-box">
					<li>
						<a href="<?php echo SERVERURL; ?>adminlist/"><i class="zmdi zmdi-account zmdi-hc-fw"></i> Administradores</a>
					</li>
					<li>
						<a href="<?php echo SERVERURL; ?>docentelist/"><i class="zmdi zmdi-male-female zmdi-hc-fw"></i> Docentes</a>
					</li>
					<li>
						<a href="<?php echo SERVERURL; ?>estudiantelist/"><i class="zmdi zmdi-male-female zmdi-hc-fw"></i> Estudiantes</a>
					</li>
				</ul>
			</li>

		<?php }elseif($_SESSION['tipo_sesion']==2) { ?>

			<li>
				<a href="<?php echo SERVERURL; ?>homeDocente/">
					<i class="zmdi zmdi-home zmdi-hc-fw"></i> INICIO
				</a>
			</li>
			<li>
				<a href="#!" class="btn-sideBar-SubMenu">
					<i class="zmdi zmdi-account-add zmdi-hc-fw"></i> EQUIPOS <i class="zmdi zmdi-caret-down pull-right"></i>
				</a>
				<ul class="list-unstyled full-box">
					<li>
						<a href="<?php echo SERVERURL; ?>equipolist/"><i class="zmdi zmdi-account zmdi-hc-fw"></i> Equipos</a>
					</li>
					<li>
						<a href="<?php echo SERVERURL; ?>equipoEstudiantes/"><i class="zmdi zmdi-account zmdi-hc-fw"></i> Agregar estudiante al equipo</a>
					</li>
					
				</ul>
			</li>
			<li>
				<a href="<?php echo SERVERURL; ?>metodologialist/">
					<i class="zmdi zmdi-home zmdi-hc-fw"></i> METODOLOGIAS
				</a>
			</li>
			<li>
				<a href="#!" class="btn-sideBar-SubMenu">
					<i class="zmdi zmdi-account-add zmdi-hc-fw"></i> PROYECTOS <i class="zmdi zmdi-caret-down pull-right"></i>
				</a>
				<ul class="list-unstyled full-box">
					<li>
						<a href="<?php echo SERVERURL; ?>proyectolist/"><i class="zmdi zmdi-account zmdi-hc-fw"></i> Proyectos</a>
					</li>
					<li>
						<a href="<?php echo SERVERURL; ?>proyectoMetodologialist/"><i class="zmdi zmdi-account zmdi-hc-fw"></i> Asignacion de la metodología</a>
					</li>
					<li>
						<a href="<?php echo SERVERURL; ?>proyectoEquipolist/"><i class="zmdi zmdi-account zmdi-hc-fw"></i> Asignacion del Equipo</a>
					</li>

		<?php }elseif($_SESSION['tipo_sesion']==3) { ?>

			<li>
				<a href="<?php echo SERVERURL; ?>homeEstudiante/">
					<i class="zmdi zmdi-home zmdi-hc-fw"></i> INICIO
				</a>
			</li>
			<?php if($_SESSION['codigo_proyecto_sesion'] > 0) { ?>
			<li>
				<!--a href="<?php echo SERVERURL; ?>equipolist/">
					<i class="zmdi zmdi-male-female zmdi-hc-fw"></i> EQUIPOS
				</a-->
				<a href="#!" class="btn-sideBar-SubMenu">
					<i class="zmdi zmdi-account-add zmdi-hc-fw"></i> PROYECTO <i class="zmdi zmdi-caret-down pull-right"></i>
				</a>
				<ul class="list-unstyled full-box">
					<li>
						<a href="<?php echo SERVERURL; ?>miProyecto/"><i class="zmdi zmdi-account zmdi-hc-fw"></i> Mi Proyecto</a>
					</li>
					<li>
						<a href="<?php echo SERVERURL; ?>faselist/">
							<i class="zmdi zmdi-male-female zmdi-hc-fw"></i> FASES
						</a>
					</li>
					<li>
						<a href="<?php echo SERVERURL; ?>actividadeslist/">
							<i class="zmdi zmdi-male-female zmdi-hc-fw"></i> ACTIVIDADES
						</a>
					</li>
					<li>
						<a href="<?php echo SERVERURL; ?>historiasUsuario/">
							<i class="zmdi zmdi-male-female zmdi-hc-fw"></i> HISTORIAS DE USUARIO
						</a>
					</li>
					
					<!--li>
						<a href="<?php echo SERVERURL; ?>faselist/">
							<i class="zmdi zmdi-male-female zmdi-hc-fw"></i> HISTORIAS
						</a>
					</li-->
				</ul>
			</li>
			<?php } ?>

			<?php if($_SESSION['codigo_equipo_sesion']>0) { ?>
				
				<li>
					<a href="<?php echo SERVERURL; ?>miEquipo/">
						<i class="zmdi zmdi-male-female zmdi-hc-fw"></i> MI EQUIPO
					</a>
				</li>

				<li>
					<a href="<?php echo SERVERURL; ?>recursoslist/">
						<i class="zmdi zmdi-format-list-numbered zmdi-hc-fw"></i> TODOS LOS RECURSOS
					</a>
				</li>
			<!--/li-->
			<?php } ?>

			
				
		<?php } ?>
				</ul>
			</li>
		</ul>


	</div>
</section>