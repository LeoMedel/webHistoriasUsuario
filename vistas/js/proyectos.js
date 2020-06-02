$( document ).ready(function() {
    console.log( "Javascript cargado!" );

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



});