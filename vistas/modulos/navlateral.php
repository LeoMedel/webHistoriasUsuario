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
				<figcaption class="text-center text-titles"><h4><?php echo $_SESSION['nombre_sesion']; ?> <?php echo $_SESSION['apellido_sesion']; ?> (<?php echo $_SESSION['usuario_sesion']; ?>)</h4></figcaption>
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
					<i class="zmdi zmdi-account-add zmdi-hc-fw"></i> Usuarios <i class="zmdi zmdi-caret-down pull-right"></i>
				</a>
				<ul class="list-unstyled full-box">
					<li>
						<a href="<?php echo SERVERURL; ?>adminlist/"><i class="zmdi zmdi-account zmdi-hc-fw"></i> Administradores</a>
					</li>
					<li>
						<a href="<?php echo SERVERURL; ?>docentelist/"><i class="zmdi zmdi-male-female zmdi-hc-fw"></i> Docentes</a>
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
				<a href="<?php echo SERVERURL; ?>homeDocente/">
					<i class="zmdi zmdi-home zmdi-hc-fw"></i> METODOLOGIAS
				</a>
			</li>
			<li>
				<a href="#!" class="btn-sideBar-SubMenu">
					<i class="zmdi zmdi-account-add zmdi-hc-fw"></i> PROYECTOS <i class="zmdi zmdi-caret-down pull-right"></i>
				</a>
				<ul class="list-unstyled full-box">
					<li>
						<a href="<?php echo SERVERURL; ?>admin/"><i class="zmdi zmdi-account zmdi-hc-fw"></i> Proyectos</a>
					</li>

		<?php }elseif($_SESSION['tipo_sesion']==3) { ?>

			<li>
				<a href="<?php echo SERVERURL; ?>homeEstudiante/">
					<i class="zmdi zmdi-home zmdi-hc-fw"></i> INICIO
				</a>
			</li>
			<li>
				<a href="#!" class="btn-sideBar-SubMenu">
					<i class="zmdi zmdi-account-add zmdi-hc-fw"></i> AVANCES <i class="zmdi zmdi-caret-down pull-right"></i>
				</a>
				<ul class="list-unstyled full-box">
					<li>
						<a href="<?php echo SERVERURL; ?>admin/"><i class="zmdi zmdi-account zmdi-hc-fw"></i> Fases</a>
					</li>
					<li>
						<a href="<?php echo SERVERURL; ?>client/"><i class="zmdi zmdi-male-female zmdi-hc-fw">Reportes</i></a>
					</li>
		<?php } ?>
				</ul>
			</li>
		</ul>


	</div>
</section>