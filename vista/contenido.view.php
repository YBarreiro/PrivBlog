
<?php require 'header.php'; ?> 
<div class="content">
<div class="container">

	<div class="row">
    <div class=" col"> 
      <nav aria-label="breadcrumb">
  <ol  class="breadcrumb my-4">
    <li class="breadcrumb-item active" aria-current="page"><a href="index.php"><i class="fas fa-home"></i> PrivBlog</a></li>
  </ol>
</nav>
</div>
</div>

	<div class="row justify-content-end"> 
		<div class="col-4 mt-n5 mb-4">
			<a href="nuevo.php" class="btn btn-info" role="button">Nueva entrada</i></a>
		</div>
	</div>

	<div class="row justify-content-center">
		<div class="col-8">
			
			<?php 
			foreach ($entradas_usuario as $entrada):?> 

				<article class="my-3">
					<h4 class="my-4"><a href="single.php?id=<?php echo $entrada['id'];?>"><?php echo $entrada['titulo'];?></a></h4>
					<p class=""><?php echo Tool::convertirFecha($entrada['fecha']); ?></p>
					<!-- Si hay imagen en la entrada, la mostramos-->
					<?php if (!empty($entrada['imagen'])): ?> 
						<div class="row">
							<div class="col mt-3">
								<img class="img-fluid img-thumbnail" src="fotos/<?php echo $entrada['imagen']; ?>">
							</div>
						</div>

					<?php endif; ?>

					<p class="my-5 text-justify"><?php echo substr($entrada['texto'], 0, 200); ?>...</p>
					<?php $ids_categorias_entrada=Asoc_Categoria_Entrada::getIdsCategorias($entrada['id']);?>
					
					<?php foreach($ids_categorias_entrada as $id_categoria_entrada): ?>

						

						<?php $nombre_categoria=Asoc_Categoria_Entrada::getNombreCategoria($id_categoria_entrada['0']) ?>


						<a href="resultados-categoria.php?id=<?php echo $id_categoria_entrada[0];?>">

								<span class="badge badge-secondary"><?php echo $nombre_categoria[0]; ?></span></a>


						<?php endforeach; ?>

							<br>
							
							<div class="mt-2"><a href="single.php?id=<?php echo $entrada['id'];?>">Seguir leyendo</a></div>


						</article>

					<?php endforeach; ?>
					</div>
				</div>

				<div class="row justify-content-center">
					<div class="col-2">
					<?php require 'paginacion.php'; ?>

				</div>
			</div>

					
					


				

			</div>
			</div>

			<?php require 'footer.php'; ?>