$(function(){

	// Lista de docente
	$.post( '../vista/funciones/alumno.php' ).done( function(respuesta)
	{
		$( '#alumno' ).html( respuesta );
	});
	
	
	// Lista de Ciudades
	$( '#alumno' ).change( function()
	{
		var el_continente = $(this).val();

	});


	
	
	

})
