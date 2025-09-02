<?php require 'vista/header.php'; ?>
<div class="content">
<div class="container"> 
 
<div class="row">
	<div class="col guia"><nav aria-label="breadcrumb">
  <ol  class="breadcrumb my-4">
    <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i> PrivBlog</a></li>
    <li class="breadcrumb-item"><a href="archivo-entradas.php">Archivo</a></li>
    <li class="breadcrumb-item active" aria-current="page">Resultados de archivo</li>
  </ol>
</nav></div>
<div class="col-4 my-4">
			<a href="nuevo.php" class="btn btn-info" role="button">Nueva entrada</i></a>
		</div>
</div> 

	<div class="row"> 
		<div class="col">
			<h3 class="mt-4 mb-5"><?php echo $resultados ?></h3>

		</div>
	</div>

	<div class="row justify-content-center">
		<div class="col-8">


			<?php foreach ($entradas as $entrada): ?>
					
					<article class="my-4">
					<h4 class="my-4"><a href="single.php?id=<?php echo $entrada['id'];?>"><?php echo $entrada['titulo'];?></a></h4>
					<p class=""><?php echo Tool::convertirFecha($entrada['fecha']); ?></p>
					<!-- Si hay imagen en la entrada, la mostramos-->
					<?php if (!empty($entrada['imagen'])): ?>  
						<div class="row">
							<div class="col">
								<img class="img-fluid img-thumbnail" src="fotos/<?php echo $entrada['imagen']; ?>">
							</div>
						</div>

					<?php endif; ?>

					<p><?php echo substr($entrada['texto'], 0, 200); ?>...</p>





					 <div class="mb-2"><?php $ids_categorias=Asoc_Categoria_Entrada::getIdsCategorias($entrada['id']); ?>
					<?php foreach ($ids_categorias as $id_categoria): ?>
					<?php $nombre_categoria=Asoc_Categoria_Entrada::getNombreCategoria($id_categoria[0]); ?>
					<a href="resultados-categoria.php?id=<?php echo $id_categoria[0];?>"><span class="badge badge-secondary"><?php echo $nombre_categoria[0]; ?></span></a>
								
<?php endforeach; ?></div><br>

<a class="mt-3"href="single.php?id=<?php echo $entrada['id'];?>">Seguir leyendo</a>				

 	

 	<?php endforeach; ?>

				</article>

<div class="d-flex justify-content-center">
<?php require 'paginacion-archivo.view.php'; ?>
</div>

			</div>



		</div>

	</div>
</div>













	




<?php require 'footer.php'; ?>