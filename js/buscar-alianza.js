$(obtener_registros());

function obtener_registros(alianzas)
{
	$.ajax({
		url : '../php/buscar-alianza.php',
		type : 'POST',
		dataType : 'html',
		data : { alianzas: alianzas },
		})

	.done(function(resultado){
		//A donde arroja el resultado
		$("#tabla_resultado").html(resultado);
	})
}


$(document).on('keyup', '#busqueda', function()
{
	var valorBusqueda=$(this).val();
	if (valorBusqueda!="")
	{
		obtener_registros(valorBusqueda);
	}
	else
		{
			obtener_registros();
		}
});
