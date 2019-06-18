$(obtener_registros());

function obtener_registros(universidades)
{
	$.ajax({
		url : '../php/buscar-universidad.php',
		type : 'POST',
		dataType : 'html',
		data : { universidades: universidades },
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
