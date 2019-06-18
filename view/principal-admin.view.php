<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>SIRCEER | Administración</title>
	<link rel="icon" href="<?php echo URL; ?>imagenes/favicon.png">
	<link rel="stylesheet" href="<?php echo URL; ?>css/estilos-admin.css">
	<link rel="stylesheet" href="<?php echo URL; ?>libs/icomoon/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script type="text/javascript">


		$(function(){
			$(".boton-borrar").click(function(){
				var id = $(this).attr("id");
				var dataString = 'id=' + id;
				var parent = $(this).parent(".cuerpo");

				$.ajax({
					type: "POST",
					url: "../php/eliminarUser.php",
					data: dataString,
					cache: false,
					success: function()
					{
						if (id % 2) 
						{
							parent.fadeOut('slow',function(){this.remove();});
						}else
						{
							parent.slideUp('slow',function(){this.remove();});
						}
					}
				});
				return false;
			}); 
		} );


		function openVentana(){
			$(".ventana").slideDown("slow");
		}

		function cerrar(){
			$(".ventana").slideUp("fast");
		}

		function creaObjetoAjax () { //Mayoría de navegadores
     var obj;
     if (window.XMLHttpRequest) {
        obj=new XMLHttpRequest();
        }
     else { //para IE 5 y IE 6
        obj=new ActiveXObject(Microsoft.XMLHTTP);
        }
     return obj;
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
			xmlhttp.open("GET","<?php echo URL; ?>php/validarUsuario.php?u="+str,true);
			xmlhttp.send();
		}
		
	</script>
</head>
<body>
	<header>
		<div class="usuario_sesion">
			<span class="icon-user"></span>
		</div>
		<div class="cerrar-sesion">
			<a href="<?php echo URL; ?>php/cerrar-sesion.php">Salir</a>
		</div>
	</header>
	<section>

		<!--VENTANA MODAL-->
		<div class="ventana">
			<div class="formulario">
				<div class="cerrar">
					<a href="javascript:cerrar();">Cerrar</a>
				</div>
				<h3>Datos del nuevo usuario:</h3>
				<hr>
				<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
				<!-- <input type="text" name="nombre" placeholder="Nombre:" required="Campo requerido"><br> -->
					<div id="miDiv"></div>
					<input type="text" name="nombre" placeholder="Nombres:" required="" ><br>
					<input type="text" onkeyup="sugerencias(this.value)" name="codigo" placeholder="Codigo:" required="" ><br>
					<input type="password" name="password" placeholder="Contraseña:" required=""><br>
					<!-- <input type="email" name="email" placeholder="Email" required=""><br> -->
					<select name="perfil" id="perfil">
						<option value="1">Administrador</option>
						<option value="2">Usuario regular</option>
						<option value="3">Usuario externo</option>
					</select>
					<select name="estado" id="">
						<option value="1">Activo</option>
						<option value="2">Inactivo</option>
					</select>
					<input type="submit" name="enviar" value="Crear usuario">		
				</form>
				

			</div>
		</div>

		<div class="agregar">
			<a href="javascript:openVentana();"><span class="icon-plus"></span></a>
		</div>
		<div class="contenido">
			<table>
				<tr class="head">
					<th>#</th>
					<th>Nombres</th>
					<th>Codigo de usuario</th>
					<th>Contraseña</th>
					<th>Rol</th>
					<th>Estado</th>
				</tr>
				<?php 
				foreach ($statement as $valor) {
					?>
					<tr class="cuerpo">
						<td><?php echo $valor['id_usuarios']; ?></td>
						<td><?php echo $valor['nombre']; ?></td>
						<td><?php echo $valor['codigo']; ?></td>
						<td><?php echo $valor['clave']; ?></td>
						<td><?php echo $valor['rol']; ?></td>
						<td><?php echo $valor['estado']; ?></td>
						<!-- <td>
							<a href="editar-user.php?id=<?php echo urlencode($valor['id_usuarios']) ?>"><i class="fa fa-pencil-square fa-2x" aria-hidden="true"></i></a>
														
						</td> -->
						<td>
							<a href="../php/eliminarUser.php?id=<?php echo urlencode($valor['id_usuarios']) ?>" style="background-color: red; padding: 4px; border: 1px solid red; border-radius:3px; color: white;">Eliminar</a>
						</td>
					</tr>
					<?php } ?>
				</table>

<!--
				<article>
					<div class="descripcion">
						<ul>
							<li>
								<p><strong>Read:</strong> Los usuarios con este atributo podran solo realizar consultas</p>
							</li>
							<li>
								<p><strong>Write:</strong> Los usuarios con esta propiedad podran modificar datos</p>
							</li>
						</ul>
					</div>
				</article>-->
			</div>
		</section>
		<!--<footer>
			
		</footer>-->
	</body>
	</html>