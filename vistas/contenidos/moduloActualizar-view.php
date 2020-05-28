
<?php
if ($_SESSION['tipo_sesion'] != 3) {
	echo $loginControl->redireccionarUsuarioControlador($_SESSION['tipo_sesion']);
}

$datos = explode("/", $_GET['views']);

if ($datos[1] != "")
{
	require_once "./controladores/moduloControlador.php";

	$claseModulo = new moduloControlador();

	$infoModulo = $claseModulo->mostrarInfoModuloControlador($datos[1]);

	$datosModulo = $infoModulo->fetch();
	
?>
<div class="container-fluid">
	<div class="page-header">
	  <h1 class="text-titles"><i class="zmdi zmdi-account zmdi-hc-fw"></i> MODULO <small>Actualizar modulo</small></h1>
	</div>
	<p class="lead">Actualizar un MODULO</p>
</div>

<!--div class="container-fluid">
	<ul class="breadcrumb breadcrumb-tabs">
		<li>
	  		<a href="<?php echo SERVERURL; ?>moduloFase/<?php echo $datos[1]?>" class="btn btn-success">
	  			<i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; REGRESAR
	  		</a>
	  	</li>
	  	
	</ul>
</div-->

<!-- Panel nuevo administrador -->
<div class="container-fluid">
	<div class="panel panel-success">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="zmdi zmdi-plus"></i> &nbsp; ACTUALIZAR MODULO</h3>
		</div>
		<div class="panel-body">
			<form action="<?php echo SERVERURL; ?>ajax/moduloAjax.php" method="POST" data-form="update" class="FormularioAjax" autocomplete="off" enctype="multipart/form-data">
				<input type="hidden" name="CodigoModulo-up" value="<?php echo $datos[1]; ?>">
		    	<fieldset>
		    		<legend><i class="zmdi zmdi-account-box"></i> &nbsp; Información del modulo</legend>
		    		<div class="container-fluid">
		    			<div class="row">
		    				
		    				<div class="col-xs-12">
		    					<p>TITULO: </p>
						    	<div class="form-group label-floating">
								  	<label class="control-label">Nombre del modulo *</label>
								  	<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="tituloModulo-up" value="<?php echo $datosModulo['titulo'];?>" required="" maxlength="20">
								</div>
		    				</div>

		    				<div class="col-xs-12">
								<div class="form-group label-floating">
								  	<label class="control-label">Descripcion del modulo</label>
								  	<textarea name="descripcionModulo-up" class="form-control" rows="2" maxlength="100" ><?php echo $datosModulo['descripcion'] ?></textarea>
								</div>
		    				</div>
		    				
		    			</div>
		    		</div>
		    	</fieldset>
		    	<br>
		    	<br>
		    	<fieldset>
		    		<legend><i class="zmdi zmdi-account-box"></i> &nbsp; Observaciones del modulo</legend>
		    		<div class="container-fluid">
		    			<div class="row">
		    				<div class="col-xs-12">
								<div class="form-group label-floating">
								  	<label class="control-label">Observaciones</label>
								  	<textarea name="observacionModulo-up" class="form-control" rows="2" maxlength="100" ><?php echo $datosModulo['observacion'] ?></textarea>
								</div>
		    				</div>
		    				
		    			</div>
		    		</div>
		    	</fieldset>
			    <p class="text-center" style="margin-top: 20px;">
			    	<button type="submit" class="btn btn-success btn-raised btn-lg"><i class="zmdi zmdi-floppy"></i> Actualizar modulo </button>
			    </p>
			    <div class="RespuestaAjax"></div>
		    </form>
		</div>
	</div>
</div>
<?php

} 
else 
{
?>
<div class="container-fluid">
	<div class="page-header">
	  <h1 class="text-titles"><i class="zmdi zmdi-account zmdi-hc-fw"></i> MODULO <small>Nuevo Modulo</small></h1>
	</div>
	<p class="lead">Agregar un nuevo modulo</p>
</div>

<!-- Panel nuevo administrador -->
<div class="container-fluid">
	<div class="panel panel-info">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="zmdi zmdi-plus"></i> &nbsp; SIN INFORMACION</h3>
		</div>
		<div class="panel-body">
			<p>No se puede mostrar la información solicitada.</p>
		</div>
	</div>
</div>
<?php
}


?>