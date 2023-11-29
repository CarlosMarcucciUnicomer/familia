$(function(){

	// Lista de docente
	$.post( '../vista/funciones/docente.php' ).done( function(respuesta)
	{
		$( '#docente' ).html( respuesta );
	});
	
	
	// Lista de Ciudades
	$( '#docente' ).change( function()
	{
		var el_continente = $(this).val();

	});


	
	
	

})
