<?php require 'vista/header.php'; ?>   

<div class="guia"><nav aria-label="breadcrumb">
  <ol  class="breadcrumb my-4">
    <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i> PrivBlog</a></li>
    <li class="breadcrumb-item active" aria-current="page">Búsqueda</li>
  </ol>
</nav></div>
 <div class="content"> 
<div class="container"> 

	<div class="row">
		<div class="col">
			<h3 class="my-2"><?php echo $cabecera; ?></h3>
		</div>
	</div>

	

	
<div class="row justify-content-center">
	<div class="col-8">
		<?php foreach($resultados as $resultado): ?>

	<article class="my-5">
				<h4 class="my-4"><a href="single.php?id=<?php echo $resultado['id']; ?>"><?php echo $resultado['titulo'];?></a></h4>
				<p class=""><?php echo $resultado['fecha']; ?></p>
				<!-- Si hay imagen en la entrada, la mostramos-->
			<?php if (!empty($resultado['imagen'])): ?> 
					<div class="row">
				<div class="col">
					<img class="img-fluid img-thumbnail" src="fotos/<?php echo $resultado['imagen']; ?>">
				</div>
				</div>

			<?php endif; ?>

				<p><?php echo substr($resultado['texto'], 0, 150); ?>...</p>


				 <?php $ids_categorias=Asoc_Categoria_Entrada::getIdsCategorias($resultado['id']); ?>
					<?php foreach ($ids_categorias as $id_categoria): ?>
					<?php $nombre_categoria=Asoc_Categoria_Entrada::getNombreCategoria($id_categoria[0]); ?>
					<a href="resultados-categoria.php?id=<?php echo $id_categoria[0];?>"><span class="badge badge-secondary"><?php echo $nombre_categoria[0]; ?></span></a>


<?php endforeach; ?>
<div class="mt-4"><a href="single.php?id=<?php echo $resultado['id'];?>">Seguir leyendo</a></div>

	<?php endforeach; ?><br>


				


			</article>

			<?php //endforeach;?>
	</div>
</div>
<div class="d-flex justify-content-center">
<?php require('paginacion-busqueda.php'); ?>
</div>


</div>
			</div>

		



	


		

<?php require 'footer.php'; ?>
	


	