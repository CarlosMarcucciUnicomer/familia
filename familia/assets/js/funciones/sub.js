$(function(){

	// Lista de docente
	$.post( '../vista/funciones/sub.php' ).done( function(respuesta)
	{
		$( '#sub' ).html( respuesta );
	});
	
	
	// Lista de Ciudades
	$( '#sub' ).change( function()
	{
		var el_continente = $(this).val();

	});


	
	
	

})
