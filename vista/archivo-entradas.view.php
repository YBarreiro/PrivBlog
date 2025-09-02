<?php require('vista/header.php'); ?> 

<div class="content">
<div class="container">  

<div class="row">
	<div class="col guia"><nav aria-label="breadcrumb">
  <ol  class="breadcrumb my-4">
    <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i> PrivBlog</a></li>
    <li class="breadcrumb-item active" aria-current="page">Archivo de entradas</li>
  </ol>
</nav></div>

<div class="col-4 my-4">
			<a href="nuevo.php" class="btn btn-info" role="button">Nueva entrada</i></a>
		</div>

</div>
	<h3 class="my-4">Archivo</h3>
<?php foreach ($anyos as $anyo): ?>
	<ul>
	<a href="resultados-archivo-entradas.php?ano=<?php echo $anyo[0]; ?>"><h4 class="anyos_archivo"><?php echo $anyo[0]; ?> (<?php 
		$entradas_anyo=$archivo->getEntradasAnyos($anyo[0]);
		echo $entradas_anyo;
	 ?>)</h4></a>
	<?php $meses=$archivo->getMesesAnyo($anyo[0]); ?>
	<?php foreach ($meses as $mes): ?>
		<ul>
		<li><a href="resultados-archivo-entradas.php?ano=<?php echo $anyo[0];?>&mes=<?php echo $mes[0]; ?>">
		<?php echo $archivo->textoMeses($mes[0]);
			$numeroEntradasMes=$archivo->getNumeroEntradasMes($anyo[0], $mes[0]);
				echo " (".$numeroEntradasMes.")";
		?>
		</a>
	</li>
	</ul>
	
	<?php endforeach ?>
	</ul>
<?php endforeach ?>

</div>
</div>

<?php require 'footer.php'; ?>

