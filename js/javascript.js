function cargar_snies(val){
	$("#c_snies").html("Esperando SNIES, un momento...");
	$.ajax({
		type: "POST",
		url: '../php/traer_snies_programa.php',
		data: 'id_programa='+val,
		success: function(res){
			$('.snies').html(res);
			$('#cargar_snies').html("");

		} 
	});
}

function sugerencias(str){
			var xmlhttp;
			if (str.length==0)
			{ 
				document.getElementById("miDiv").innerHTML="";
				return;
			}
			if (window.XMLHttpRequest)
			{
				xmlhttp=new XMLHttpRequest();
			}
			else
			{
				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange=function()
			{
				if (xmlhttp.readyState==4 && xmlhttp.status==200)
				{
					document.getElementById("miDiv").innerHTML=xmlhttp.responseText;
				}
			}
			xmlhttp.open("GET","../php/validarEstudiante.php?d="+str,true);
			xmlhttp.send();
		}


function sugerencias_programa(str){
			var xmlhttp;
			if (str.length==0)
			{ 
				document.getElementById("miDiv").innerHTML="";
				return;
			}
			if (window.XMLHttpRequest)
			{
				xmlhttp=new XMLHttpRequest();
			}
			else
			{
				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange=function()
			{
				if (xmlhttp.readyState==4 && xmlhttp.status==200)
				{
					document.getElementById("miDiv").innerHTML=xmlhttp.responseText;
				}
			}
			xmlhttp.open("GET","../php/validar_programa.php?d="+str,true);
			xmlhttp.send();
		}




function calcular_edad(){

		var fecha_actual = new Date();
		var anio_actual = fecha_actual.getFullYear();
		var fecha_antes = document.getElementById('fecha_naci').value;
		console.log(anio_actual);
		console.log(fecha_antes);
		
		var anio_antes = fecha_antes.substr(0,4);
		console.log(anio_antes);
		var anios = anio_actual-anio_antes;
		console.log(anios);
		document.formulario_new_estu.edad.value=anios;
}

	