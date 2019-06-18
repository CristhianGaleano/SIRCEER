<?php $numero_paginas = numero_paginas($config_global['result_por_pagina'],$name_bd,$cn) ?>
<?php $file = $_SERVER['PHP_SELF']; ?>
<?php $file  =  explode('/', $file);

echo "$numero_paginas -";
$num_show_pages = 3;
$intervalo = (!isset($_GET['intervalo'] ) || empty($_GET['intervalo'])) ? 1 : $_GET['intervalo'];


$intervalos = ($numero_paginas>3) ? (int) ($numero_paginas/3) : 1 ;
echo "$intervalos";
$select = "";

switch ($file['4']) {

	case 'buscar-estudiantes.php':
		$select = 'select=e';
		break;

	case 'buscar-institucion.php':
		$select = 'select=i';
		break;

	case 'buscar-programa.php':
		$select = 'select=p';
		break;

	case 'buscar-universidad.php':
		$select = 'select=u';
		break;

	case 'buscar-alianza.php':
		$select = 'select=a';
		break;

	case 'buscar-sede.php':
		$select = 'select=s';
		break;

	case 'facturas-estudiantes.php':
		$select = 'select=e';
		break;
	
	default:
		
		break;
}

?>
<section class="paginacion">

	<ul>
		<li><a href="<?php echo $file['4'] ?>?<?php echo $select ?>&p=<?php echo $pagina - 1?>">&larr;</a></li>
		<?php if ($pagina == 1): ?>
			<li class="disabled">&laquo;</li>
		<?php else: ?>
			<li><a href="<?php echo $file['4'] ?>?<?php echo $select ?>&p=<?php echo $pagina - 1?>">&laquo;</a></li>
		<?php endif ?>

	
		<?php #for ($in=$intervalo; $in<=1 ; $in++) { ?>
			<?php for ($i=$intervalo*3-3+1; $i<=$intervalo*3; $i++) { ?>
		<?php if ($pagina == $i): ?>
			<li class="active"><a href="<?php echo $file['4'] ?>?<?php echo $select ?>&p=<?php echo $i ?>"><?php echo $i ?></a></li>
		<?php else: ?>
			<li><a href="<?php echo $file['4'] ?>?<?php echo $select ?>&p=<?php echo $i ?>"><?php echo $i ?></a>
		<?php endif ?>
		<?php } ?>
			<?php #} ?>

		<!--
<?php for ($i=1; $i <=$num_show_pages ; $i++) { ?>
		<?php if ($pagina == $i): ?>
			<li class="active"><a href="<?php echo $file['4'] ?>?<?php echo $select ?>&p=<?php echo $i ?>"><?php echo $i ?></a></li>
		<?php else: ?>
			<li><a href="<?php echo $file['4'] ?>?<?php echo $select ?>&p=<?php echo $i ?>"><?php echo $i ?></a>
		<?php endif ?>
		<?php } ?>
		-->



<?php if ($pagina >= $numero_paginas): ?>
	<li class="disabled">&raquo;</a></li>
	<?php else: ?>
	<li><a href="<?php echo $file['4'] ?>?<?php echo $select ?>&p=<?php echo $pagina + 1 ?>">&raquo;</a></li>	
<?php endif ?>
		</a></li>

<?php if ($pagina >= $numero_paginas): ?>
	<li class="disabled"><a>&rarr;</a></li>		
	<?php else: ?>
		<li><a href="<?php echo $file['4'] ?>?<?php echo $select ?>&intervalo=<?php echo $intervalo + 1 ?>">&rarr;</a></li>
<?php endif ?>
	</a></li>
	</ul>
</section>