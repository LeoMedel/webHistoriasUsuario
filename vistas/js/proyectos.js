$( document ).ready(function() {
    console.log( "Javascript cargado!" );

    $( "#selectActividad" ).change(function() {

    	alert("Cargando Historia de Usuario");
		//Guardamos el id de la actividad seleccionada
		var actividad = $(this).val();
		
		
		//Limpiar los demas campos
		/*
		$( "#historiaUsuario" ).empty();
		$( "#nombreResponsable" ).empty();
		$( "#descripcionRecurso" ).empty();
		$( "#tipoRecurso" ).empty();
		$( "#cantidadRecurso" ).empty();
		$( "#precioRecurso" ).empty();
		*/
		
		//Enviamos la informacion con POST al archivo para cargar el siguiente SELECT
		$.post( "../ajax/historiaUsuarioAjax.php/", { idActividad_consultar: actividad })
			.done(function( data ) {
				//alert("Proyecto seleccionado:  " + proyecto);
				//alert(data);
			//Se carga la informacion de acuerdo a la seleccion
			$( "#historiaUsuario" ).html( data );
		});
	});

    /*_____________________________________ PRIMER SELECT DE PAISES_________________________________________________*/
    //Evento cuando cambia el valor del SELECT PAIS
	$( "#selectProyectos" ).change(function() {

		//Guardamos el id del pais seleccionado
		var proyecto = $(this).val();
		
		//Limpiar los demas campos
		$( "#selectEquipo" ).empty();

		//Enviamos la informacion con POST al archivo para cargar el siguiente SELECT
		$.post( "../ajax/proyectoAjax.php/", { idProyecto_consultar: proyecto })
			.done(function( data ) {
				//alert("Proyecto seleccionado:  " + proyecto);
				//alert(data);
			//Se carga la informacion de acuerdo a la seleccion
			$( "#selectEquipo" ).html( data );
		});
	});


	/*_____________________________________ PRIMER SELECT DE PAISES_________________________________________________*/
    //Evento cuando cambia el valor del SELECT PAIS




});