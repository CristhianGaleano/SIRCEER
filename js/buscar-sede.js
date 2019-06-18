$(obtener_registros());

function obtener_registros(sedes)
{
	$.ajax({
		url : '../php/buscar-sede.php',
		type : 'POST',
		dataType : 'html',
		data : { sedes: sedes },
		})

	.done(function(resultado){
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
