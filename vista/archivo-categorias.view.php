<?php require 'vista/header.php'; ?>

<div class="content">
<div class="container">   

<div class="row">
	<div class="col guia"><nav aria-label="breadcrumb">
  <ol  class="breadcrumb my-4">
    <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i> PrivBlog</a></li>
    <li class="breadcrumb-item active" aria-current="page">Categorías</li>
  </ol>
</nav></div>

<div class="col-4 my-4">
			<a href="nuevo.php" class="btn btn-info" role="button">Nueva entrada</i></a>
		</div>

</div>

<div class="row">
	<div class="col-6"> 

	<h3 class="my-3">Categorias</h3> 
	<p class="">Para ver, renombrar o borrar una categoría o las entradas que la tengan haz click en ella.</p>
	</div>
<div class="col-3 mt-5 ml-4">  

	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST"
		>
		<div class="form-group">
			
		<input class="form-control my-2" type="text" name="nueva_categoria" placeholder="¡Añade nuevas categorías!">
		<input class="btn btn-outline-info" type="submit" name="anadir_categoria" value="Añadir categoría" >
		</div>
		<?php if(!empty($errores_categoria)):?>
			<div class="validacion small"><?php echo $errores_categoria;  ?></div>
		<?php endif; ?>

		
		<?php  if(isset($exito)): ?> 
	
<div class="mt-2 alert alert-info alert-dismissible">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  ¡La categoría ha sido añadida!
</div>
	<?php endif; ?>
	</form>
	</div>

	

	</div>

<div class="row">
	<div class="col mt-3">
		

		

<ul>
					<?php foreach ($ids_categorias as $id_categoria): ?>

					<?php $nombres_categorias=Categoria::getNombresCategorias($id_categoria[0]); ?>

					

					<?php foreach ($nombres_categorias as $nombre_categoria): ?>
					

						
					<li><a href="resultados-categoria.php?id=<?php echo $id_categoria[0]; ?>"><?php echo $nombre_categoria[0]; ?> (<?php 
					 $num_entradas_categoria=Asoc_Categoria_Entrada::getNumeroEntradasCategorias($id_categoria[0]); 
					 echo $num_entradas_categoria[0];
					 ?>)</a></li>

				<?php endforeach; ?>


			<?php endforeach; ?>

</ul>
			</div>

			</div>
		
	</div>
</div>
	
<?php require 'footer.php'; ?>