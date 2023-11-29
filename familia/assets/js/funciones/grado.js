$(function(){

	// Lista de docente
	$.post( '../vista/funciones/grado.php' ).done( function(respuesta)
	{
		$( '#grado' ).html( respuesta );
	});
	
	
	// Lista de Ciudades
	$( '#grado' ).change( function()
	{
		var el_continente = $(this).val();

	});


	
	
	

})
