
<?php
	if ($_SESSION['tipo_sesion'] >=2) {
		echo $loginControl->redireccionarUsuarioControlador($_SESSION['tipo_sesion']);
	}
?>

<div class="container-fluid">
	<div class="page-header">
	  <h1 class="text-titles"><i class="zmdi zmdi-account zmdi-hc-fw"></i> Usuarios <small>ESTUDIANTES</small></h1>
	</div>
	<p class="lead">Agregar un nuevo ESTUDIANTE al Sistema</p>
</div>

<div class="container-fluid">
	<ul class="breadcrumb breadcrumb-tabs">
		<li>
	  		<a href="<?php echo SERVERURL; ?>estudiantelist/" class="btn btn-success">
	  			<i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE ESTUDIANTES
	  		</a>
	  	</li>
	  	<li>
	  		<a href="<?php echo SERVERURL; ?>estudiante/" class="btn btn-info">
	  			<i class="zmdi zmdi-plus"></i> &nbsp; NUEVO ESTUIANTE
	  		</a>
	  	</li>
	  	<!--li>
	  		<a href="<?php echo SERVERURL; ?>docentesearch/" class="btn btn-primary">
	  			<i class="zmdi zmdi-search"></i> &nbsp; BUSCAR DOCENTE
	  		</a>
	  	</li-->
	</ul>
</div>

<!-- Panel nuevo administrador -->
<div class="container-fluid">
	<div class="panel panel-info">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="zmdi zmdi-plus"></i> &nbsp; NUEVO ESTUDIANTE</h3>
		</div>
		<div class="panel-body">
			<form action="<?php echo SERVERURL; ?>ajax/estudianteAjax.php" method="POST" data-form="save" class="FormularioAjax" autocomplete="off" enctype="multipart/form-data">
		    	<fieldset>
		    		<legend><i class="zmdi zmdi-account-box"></i> &nbsp; Información personal del estudiante</legend>
		    		<div class="container-fluid">
		    			<div class="row">
		    				<div class="col-xs-12">
		    					<p>DNI / CEDULA: </p>
						    	<div class="form-group label-floating">
								  	<label class="control-label">DNI/CEDULA *</label>
								  	<input pattern="[0-9-]{1,30}" class="form-control" type="text" name="dni-reg" required="" maxlength="30">
								</div>
		    				</div>
		    				<div class="col-xs-12 col-sm-6">
		    					<p>NOMBRE(S): </p>
						    	<div class="form-group label-floating">
								  	<label class="control-label">Nombres *</label>
								  	<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="nombre-reg" required="" maxlength="30">
								</div>
		    				</div>
		    				<div class="col-xs-12 col-sm-6">
		    					<p>APELLIDOS: </p>
								<div class="form-group label-floating">
								  	<label class="control-label">Apellidos *</label>
								  	<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="apellido-reg" required="" maxlength="30">
								</div>
		    				</div>
		    				<div class="col-xs-12 col-sm-6">
		    					<p>TELEFONO: </p>
								<div class="form-group label-floating">
								  	<label class="control-label">Numero de telefono</label>
								  	<input pattern="[0-9+]{1,15}" class="form-control" type="text" name="telefono-reg" maxlength="15">
								</div>
		    				</div>
		    				<div class="col-xs-12">
		    					<p>DIRECCION: </p>
								<div class="form-group label-floating">
								  	<label class="control-label">Calle, Carrera, numero, Ciudad, Pais</label>
								  	<textarea name="direccion-reg" class="form-control" rows="2" maxlength="100"></textarea>
								</div>
		    				</div>
		    			</div>
		    		</div>
		    	</fieldset>
		    	<br>
		    	<fieldset>
		    		<legend><i class="zmdi zmdi-key"></i> &nbsp; Datos de la cuenta del estudiante</legend>
		    		<div class="container-fluid">
		    			<div class="row">
		    				<div class="col-xs-12">
		    					<p>USUARIO: </p>
					    		<div class="form-group label-floating">
								  	<label class="control-label">Nombre de usuario *</label>
								  	<input pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ]{1,15}" class="form-control" type="text" name="usuario-reg" required="" maxlength="15">
								</div>
		    				</div>
		    				<div class="col-xs-12 col-sm-6">
		    					<p>CONTRASEÑA: </p>
								<div class="form-group label-floating">
								  	<label class="control-label">Contraseña *</label>
								  	<input class="form-control" type="password" name="password1-reg" required="" maxlength="70">
								</div>
		    				</div>
		    				<div class="col-xs-12 col-sm-6">
		    					<p>REPETIR CONTRASEÑA: </p>
								<div class="form-group label-floating">
								  	<label class="control-label">Repita la contraseña *</label>
								  	<input class="form-control" type="password" name="password2-reg" required="" maxlength="70">
								</div>
		    				</div>
		    				<div class="col-xs-12 col-sm-6">
		    					<p>CORREO ELECTRONICO: </p>
								<div class="form-group label-floating">
								  	<label class="control-label">E-mail</label>
								  	<input class="form-control" type="email" name="email-reg" maxlength="50">
								</div>
		    				</div>
		    				<div class="col-xs-12">
								<div class="form-group">
									<label class="control-label">Genero</label>
									<div class="radio radio-primary">
										<label>
											<input type="radio" name="optionsGenero" id="optionsRadios1" value="Masculino" checked="">
											<i class="zmdi zmdi-male-alt"></i> &nbsp; HOMBRE
										</label>
									</div>
									<div class="radio radio-primary">
										<label>
											<input type="radio" name="optionsGenero" id="optionsRadios2" value="Femenino">
											<i class="zmdi zmdi-female"></i> &nbsp; MUJER
										</label>
									</div>
								</div>
		    				</div>
		    			</div>
		    		</div>
		    	</fieldset>
		    	<br>
			    <p class="text-center" style="margin-top: 20px;">
			    	<button type="submit" class="btn btn-success btn-raised btn-lg"><i class="zmdi zmdi-floppy"></i> Guardar</button>
			    </p>
			    <div class="RespuestaAjax"></div>
		    </form>
		</div>
	</div>
</div>