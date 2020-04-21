<div class="full-box registro-container cover">
	<form action="" method="POST" autocomplete="off" class="registroForm">
		<!--p class="text-center text-muted"><i class="zmdi zmdi-desktop-windows"></i></p-->


<?php

	//INICIAR SESION
	require_once "./core/modeloPrincipal.php";

	$principal = new modeloPrincipal();

	
	//$datosRol = $principal->conectarBD()->ejecutarConsultaSimpleSQL("SELECT * FROM rol");

	//$roles = $datosRol->fetch();


?>
		<h2 class="text-center">REGISTRO</h2>
			<fieldset>
		    		<div class="container-fluid">
		    			<div class="row">
		    				
		    				<div class="col-xs-12 col-sm-6">
						    	<div class="form-group label-floating">
								  	<label class="control-label">Nombres *</label>
								  	<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="nombre-reg" required="" maxlength="30">
								</div>
		    				</div>
		    				<div class="col-xs-12 col-sm-6">
								<div class="form-group label-floating">
								  	<label class="control-label">Apellidos *</label>
								  	<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="apellido-reg" required="" maxlength="30">
								</div>
		    				</div>
		    				<div class="col-xs-12 col-sm-6">
								<div class="form-group label-floating">
								  	<label class="control-label">Numero de telefono</label>
								  	<input pattern="[0-9+]{1,15}" class="form-control" type="text" name="telefono-reg" maxlength="15">
								</div>
		    				</div>
		    				<div class="col-xs-12 col-sm-6">
						    	<div class="form-group label-floating">
								  	<label class="control-label">DNI/CEDULA *</label>
								  	<input pattern="[0-9-]{1,30}" class="form-control" type="text" name="dni-reg" required="" maxlength="30">
								</div>
		    				</div>

		    				<div class="col-xs-12">
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
		    		<div class="container-fluid">
		    			<div class="row">
		    				<div class="col-xs-12">
					    		<div class="form-group label-floating">
								  	<label class="control-label">Nombre de usuario *</label>
								  	<input pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ]{1,15}" class="form-control" type="text" name="usuario-reg" required="" maxlength="15">
								</div>
		    				</div>
		    				<div class="col-xs-12 col-sm-6">
								<div class="form-group label-floating">
								  	<label class="control-label">Contraseña *</label>
								  	<input class="form-control" type="password" name="password1-reg" required="" maxlength="70">
								</div>
		    				</div>
		    				<div class="col-xs-12 col-sm-6">
								<div class="form-group label-floating">
								  	<label class="control-label">Repita la contraseña *</label>
								  	<input class="form-control" type="password" name="password2-reg" required="" maxlength="70">
								</div>
		    				</div>
		    				<div class="col-xs-12">
								<div class="form-group label-floating">
								  	<label class="control-label">E-mail</label>
								  	<input class="form-control" type="email" name="email-reg" maxlength="50">
								</div>
		    				</div>
		    				<div class="col-xs-12 col-sm-6">
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
		    				<div class="col-xs-12 col-sm-6">
								<div class="form-group">
									<label class="control-label">Funcion:</label>
									<select id="" class="form-control form-control-sm">
										<option>Seleccionar rol</option>
										<option>Docente</option>
										<option>Estudiante</option>
									</select>
								</div>
		    				</div>
		    			</div>
		    		</div>
		    	</fieldset>
		    	<br>
			    <p class="text-center" style="margin-top: 20px;">
			    	<button type="submit" class="btn btn-info btn-block btn-lg"><i class="zmdi zmdi-floppy"></i> REGISTRARME </button>
			    </p>
			    <div class="RespuestaAjax"></div>
	</form>
</div>



<!--?php

	//INICIAR SESION
	if (isset($_POST['usuario']) && isset($_POST['clave'])) {
		require_once "./controladores/loginControlador.php";

		$login = new loginControlador();

		echo $login->iniciarSesionControlador();
	} 

?-->