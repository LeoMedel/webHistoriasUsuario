
<?php
	if ($_SESSION['tipo_sesion'] != 2) {
		echo $loginControl->redireccionarUsuarioControlador($_SESSION['tipo_sesion']);
	}
?>

<div class="container-fluid">
	<div class="page-header">
	  <h1 class="text-titles"><i class="zmdi zmdi-account-circle zmdi-hc-fw"></i> DATOS DE LA METODOLOGÍA</small></h1>
	</div>
	<p class="lead">Actualizar datos de la metodología</p>
</div>

<!-- Panel mis datos -->
<div class="container-fluid">
<?php
	
	$datos = explode("/", $_GET['views']);



	//USUARIO
	if ($datos[1]!="")
	{
		
		if ($_SESSION['tipo_sesion'] >=3 || $_SESSION['tipo_sesion'] <=1)
		{
	        echo $loginControl->forzarCierreSesion();
	    }

	    require_once "./controladores/metodologiaControlador.php";
	    $controlMetodologia = new metodologiaControlador();

	    $infoMetodologia = $controlMetodologia->mostrarInfoMetodologiaControlador($datos[1]);

	    if ($infoMetodologia->rowCount()==1)
	    {

	    	$datosMet = $infoMetodologia->fetch();


?>			
			<div class="panel panel-success">
					<div class="panel-heading">
						<h3 class="panel-title"><i class="zmdi zmdi-refresh"></i> &nbsp; METODOLOGIA</h3>
					</div>
					<div class="panel-body">
						<form action="<?php echo SERVERURL; ?>ajax/metodologiaAjax.php" method="POST" data-form="update" class="FormularioAjax" autocomplete="off" enctype="multipart/form-data">
							<input type="hidden" name="idMetodologia-up" value="<?php echo $datos[1]; ?>">
					    	<fieldset>
					    		<legend><i class="zmdi zmdi-account-box"></i> &nbsp; Información de la metodología</legend>
					    		<div class="container-fluid">
					    			<div class="row">
					    				
					    				<div class="col-xs-12">
					    					<p>NOMBRE DE LA METODOLOGIA: </p>
									    	<div class="form-group label-floating">
											  	<label class="control-label">Titulo general del proyecto *</label>
											  	<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="metodologia-up" required="" value="<?php echo $datosMet['metodologia']; ?>" maxlength="20">
											</div>
					    				</div>
					    				<div class="col-xs-12">
											<div class="form-group label-floating">
											  	<label class="control-label">Información de la metodología</label>
											  	<textarea name="descripcion-up" class="form-control" rows="2" maxlength="100" ><?php echo $datosMet['descripcion']; ?></textarea>
											</div>
					    				</div>
					    			</div>
					    		</div>
					    	</fieldset>
					    	<br>
						    <p class="text-center" style="margin-top: 20px;">
						    	<button type="submit" class="btn btn-success btn-raised btn-lg"><i class="zmdi zmdi-refresh"></i> Actualizar</button>
						    </p>
						    <div class="RespuestaAjax"></div>
					    </form>
					</div>
			</div>
<?php
	    }
	    else
	    {
?>
			<i class="zmdi zmdi-alert-triangle zmdi-hc-5x"></i>
			<h2>Lo sentimos...</h2>
			<p>No podemos mostrar la información solicitada</p>
<?php
	    }
	    


	}
	//ERROR	
	else{
?>		
		<i class="zmdi zmdi-alert-triangle zmdi-hc-5x"></i>
		<h2>Lo sentimos...</h2>
		<p>No podemos mostrar la información que solicita. problemas tecnicos</p>

<?php
	}
?>

<!-- Panel mis datos -->
</div>
