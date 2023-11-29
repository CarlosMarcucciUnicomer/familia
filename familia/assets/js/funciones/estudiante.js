$(function(){

	// Lista de docente
	$.post( '../../vista/funciones/estudiante.php' ).done( function(respuesta)
	{
		$( '#estu' ).html( respuesta );
	});
	
	
	// Lista de Ciudades
	$( '#estu' ).change( function()
	{
		var el_continente = $(this).val();
		$.post( '../../vista/funciones/estudiante_direcc.php', { continente: el_continente} ).done( function( respuesta )
		{
			$( '#direcc' ).html( respuesta );
		});

	});


	$( '#estu' ).change( function()
	{
		var el_continente = $(this).val();
		$.post( '../../vista/funciones/estudiante_correo.php', { continente: el_continente} ).done( function( respuesta )
		{
			$( '#correo' ).html( respuesta );
		});

	});

	

	$( '#estu' ).change( function()
	{
		var el_continente = $(this).val();
		$.post( '../../vista/funciones/estudiante_id.php', { continente: el_continente} ).done( function( respuesta )
		{
			$( '#idalum' ).html( respuesta );
		});

	});

	
})
