$(function(){

	// Lista de docente
	$.post( '../vista/funciones/edito.php' ).done( function(respuesta)
	{
		$( '#edito' ).html( respuesta );
	});
	
	
	// Lista de Ciudades
	$( '#edito' ).change( function()
	{
		var el_continente = $(this).val();

	});


	
	
	

})
