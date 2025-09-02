<?php require 'header.php'; ?>

<div class="content">
<div class="container"> 

	
<div class="row">
		<div class=" col guia">
			<nav aria-label="breadcrumb">
  <ol  class="breadcrumb my-4">
    <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i> PrivBlog</a></li>
    <li class="breadcrumb-item active" aria-current="page">Entrada</li>
  </ol>
  </div>
		 
		<div class="col-4 my-4">
			<a href="nuevo.php" class="btn btn-info" role="button">Nueva entrada</i></a>
		</div>


	</div>

		<div class="row justify-content-center">
			<div class="col-8">

			<article class="mt-5 mb-4 ">
					<h4 class="my-4"><a><?php echo $entrada['titulo'];?></a></h4>
					<p class=""><?php echo Tool::convertirFecha($entrada['fecha']); ?></p>
					<!-- Si hay imagen en la entrada, la mostramos-->
					<?php if (!empty($entrada['imagen'])): ?> 
						<div class="row">
							<div class="col mt-3">
								<img class="img-fluid img-thumbnail" src="fotos/<?php echo $entrada['imagen']; ?>">
							</div>
						</div>
					<?php endif; ?>
					<section class="my-5 text-justify"><?php echo nl2br($entrada['texto']); ?></section>

					<div class="mt-3">


						<?php $ids_categorias=Asoc_Categoria_Entrada::getIdsCategorias($_GET['id']);

						foreach ($ids_categorias as $id_categoria):

 		 $nombre=Asoc_Categoria_Entrada::getNombreCategoria($id_categoria[0]); ?>

<a href="resultados-categoria.php?id=<?php echo $id_categoria[0];?>"> 

<span class="badge badge-secondary"><?php echo $nombre[0]; ?></span></a> 

 	<?php endforeach; ?></div>

					
			</article>




 	
 			





<div class="d-flex"><a href="editar-entrada.php?id=<?php echo $_GET['id']; ?>">Editar entrada</a>
	<a class="ml-3" href="borrar-entrada.php?id=<?php echo $_GET['id']; ?>">Borrar</a>
</div>
	

</div>
</div>
</div>
</nav>
</div>
</div>
</div>
</div>




<?php require 'footer.php'; ?>