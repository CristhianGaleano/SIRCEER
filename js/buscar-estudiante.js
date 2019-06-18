$(obtener_registros());

function obtener_registros(estudiantes)
{
	$.ajax({
		url : '../php/buscar-estudiante.php',
		type : 'POST',
		dataType : 'html',
		data : { estudiantes: estudiantes },
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
