

<div class="full-box registro-container cover">
	<div class="registroForm">
		<form action="<?php echo SERVERURL; ?>ajax/registroAjax.php" method="POST" data-form="save" class="FormularioAjax" autocomplete="off" enctype="multipart/form-data">
		<!--p class="text-center text-muted"><i class="zmdi zmdi-desktop-windows"></i></p-->
			<h2 class="text-center">REGISTRO</h2>
			<fieldset>
		    		<div class="container-fluid">
		    			<div class="row">
		    				
		    				<div class="col-xs-12 col-sm-6">
						    	<div class="form-group label-floating">
								  	<label class="control-label">Nombres *</label>
								  	<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="nombre-regi" required="" maxlength="30">
								</div>
		    				</div>
		    				<div class="col-xs-12 col-sm-6">
								<div class="form-group label-floating">
								  	<label class="control-label">Apellidos *</label>
								  	<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="apellido-regi" required="" maxlength="30">
								</div>
		    				</div>
		    				<div class="col-xs-12 col-sm-6">
								<div class="form-group label-floating">
								  	<label class="control-label">Numero de telefono</label>
								  	<input pattern="[0-9+]{1,15}" class="form-control" type="text" name="telefono-regi" maxlength="15">
								</div>
		    				</div>
		    				<div class="col-xs-12 col-sm-6">
						    	<div class="form-group label-floating">
								  	<label class="control-label">DNI/CEDULA *</label>
								  	<input pattern="[0-9-]{1,30}" class="form-control" type="text" name="dni-regi" required="" maxlength="30">
								</div>
		    				</div>

		    				<div class="col-xs-12">
								<div class="form-group label-floating">
								  	<label class="control-label">Calle, Carrera, numero, Ciudad, Pais</label>
								  	<textarea name="direccion-regi" class="form-control" rows="2" maxlength="100"></textarea>
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
							  	<input pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ]{1,15}" class="form-control" type="text" name="usuario-regi" required="" maxlength="15">
							</div>
	    				</div>
	    				<div class="col-xs-12 col-sm-6">
							<div class="form-group label-floating">
							  	<label class="control-label">Contraseña *</label>
							  	<input class="form-control" type="password" name="password1-regi" required="" maxlength="70">
							</div>
	    				</div>
	    				<div class="col-xs-12 col-sm-6">
							<div class="form-group label-floating">
							  	<label class="control-label">Repita la contraseña *</label>
							  	<input class="form-control" type="password" name="password2-regi" required="" maxlength="70">
							</div>
	    				</div>
	    				<div class="col-xs-12">
							<div class="form-group label-floating">
							  	<label class="control-label">E-mail</label>
							  	<input class="form-control" type="email" name="email-regi" maxlength="50">
							</div>
	    				</div>
	    				<div class="col-xs-12 col-sm-6">
							<div class="form-group">
								<label class="control-label">Genero</label>
								<div class="radio radio-primary">
									<label>
										<input type="radio" name="optionsGenero-regi" id="optionsRadios1" value="Masculino" checked="">
										<i class="zmdi zmdi-male-alt"></i> &nbsp; HOMBRE
									</label>
								</div>
								<div class="radio radio-primary">
									<label>
										<input type="radio" name="optionsGenero-regi" id="optionsRadios2" value="Femenino">
										<i class="zmdi zmdi-female"></i> &nbsp; MUJER
									</label>
								</div>
							</div>
	    				</div>
	    				<div class="col-xs-12 col-sm-6">
							<div class="form-group">
								<label class="control-label">Funcion:</label>
								<select id="" class="form-control form-control-sm" name="privilegio-regi">
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
		    <p class="text-center" style="margin-top: 5px;">
		    	<button type="submit" class="btn btn-lg" style="color: white;"><i class="zmdi zmdi-floppy"></i> REGISTRARME </button>
		    </p>
		    <div class="RespuestaAjax"></div>
		</form>
	</div>
</div>