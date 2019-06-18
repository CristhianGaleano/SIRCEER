<?php require("cabecera-admin.php") ?>
<?php include_once 'template-parts/menu-ies.php' ?>			
<!--CONTENIDO-->
<script type="text/javascript">
	function validarCargue()
	{
		if (document.frm_archivo.myfile.value=="") 
		{
			alert("Debe cargar una hoja de calculo");
			document.frm_archivo.myfile.focus();
			return false;
		}

		document.frm_archivo.action = "../gestion/importar-universidades.php";
		document.submit();
	}
</script>
<!--Formulario-->
<form  action="<?php echo $_SERVER['PHP_SELF']; ?>"  name="frm_archivo" enctype="multipart/form-data" method="post" >
Fichero a recibir: <input type="file" name="myfile"/><br/>
<input type="submit" value="Enviar" name="Importar">
</form>
	




<!--END CONTENIDO-->
<?php require("footer-menu.view.php") ?>					
<?php require("piedepagina-admin.php") ?>

