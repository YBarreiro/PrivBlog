<?php require('vista/header.php') ;?>

<div class="content">
<div class="container">

<div class="row">
<div class=" col guia"><nav aria-label="breadcrumb">
  <ol  class="breadcrumb my-4">
    <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i> PrivBlog</a></li>
    <li class="breadcrumb-item"><a href="archivo-categorias.php">Categorías</a></li>
    <li class="breadcrumb-item active" aria-current="page">Resultados de categorías</li>
  </ol>
</nav></div>
 
<div class="col-4 my-4">
			<a href="nuevo.php" class="btn btn-info" role="button">Nueva entrada</i></a>
		</div>

</div>
	<div class="row"> 
		<div class="col mt-4">
			<h4>Entradas de: "<?php foreach($nombres_categoria as $nombre_categoria) echo $nombre_categoria[0];?>"</h4> 


</div>
</div>

<div class="row justify-content-end">

	
		<div class="col-4">
				

				<form  class="form-inline" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
			<input type="hidden" name="id" value="<?php echo $id_categoria; ?>">
			<input class="form-control" type="text" name="nueva_categoria" placeholder="Escribe nuevo nombre:" style="max-width: 200px">
		

		<button class="btn btn-outline-info btn-sm ml-1" type="submit" name="renombrar" value="Renombrar">Renombrar</button>

		<?php if(isset($error_categoria_vacia)):?>
			<div class="validacion small"><?php echo $error_categoria_vacia;  ?></div>
		<?php endif; ?>

		<?php if(isset($error_categoria)):?>
			<div class="validacion small"><?php echo $error_categoria;  ?></div>
		<?php endif; ?>

		
	</form>

		</div>

		<div class="col-2">

	
<button type="submit" class="btn btn-outline-info btn-sm mt-1"><a href="borrar-categoria.php?id=<?php echo $_GET['id'];?>">Borrar categoría</a></button>
</div>

<div class="col-2">

<button type="submit" class="btn btn-outline-info btn-sm mt-1"><a href="borrar-entradas-categoria.php?id=<?php echo $_GET['id'];?>">Borrar entradas</a></button>
<small class="form-text text-muted ml-n3"><i>Borra las entradas que tengan la categoría sin borrar esta.</i></small>
</div> 
</div>


	
</div>
</div>







		</div>

	</form>

		

	<div class="row justify-content-center">
		<div class="col-8">



			<?php foreach ($ids_entradas_categoria as $id_entrada_categoria): ?>

				<?php $entrada=Entrada::getEntrada($id_entrada_categoria[0]); ?>

				<article class="my-5">
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

					<p><?php echo substr($entrada['texto'], 0, 150); ?>...</p>





					 <?php $ids_categorias=Asoc_Categoria_Entrada::getIdsCategorias($entrada['id']); ?>
					<?php foreach ($ids_categorias as $id_categoria): ?>
					<?php $nombre_categoria=Asoc_Categoria_Entrada::getNombreCategoria($id_categoria[0]); ?>
					<a href="resultados-categoria.php?id=<?php echo $id_categoria[0];?>"><span class="badge badge-secondary"><?php echo $nombre_categoria[0]; ?></span></a>
						
								
<?php endforeach; ?><br>

<div class="mt-4" ><a href="single.php?id=<?php echo $entrada['id'];?>">Seguir leyendo</a></div>				

 	

 	<?php endforeach; ?>

				</article>




			</div>

		</div>

	</div>
	


	<?php require 'vista/footer.php'; ?>