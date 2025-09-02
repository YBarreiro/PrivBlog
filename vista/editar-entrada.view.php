<?php require 'vista/header.php'; ?>
<div class="content">
<div class="container">

<div class="row">
	<div class=" col guia "><nav aria-label="breadcrumb">
		<ol  class="breadcrumb my-4">
			<li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i> PrivBlog</a></li>
			<li class="breadcrumb-item active" aria-current="page">Editar entrada</li>
		</ol>
	</nav></div>

	<div class="col-4 my-4">
			<a href="nuevo.php" class="btn btn-info" role="button">Nueva entrada</i></a>
		</div>
</div>


	<div class="row justify-content-center">
		<div class="col-7">


			<h3 class="mt-2 mb-4">Editar entrada </h3>
			<form action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" method="POST" name="editar" id="editar">



				<!-- Nos sirve para saber cuál es el id de la entrada. Así lo pasas por post cuando envíes el formulario-->
				<div><input type="hidden" name="id" id="id" value="<?php if(isset ($id)){
					echo $id;
					}elseif(isset($entrada_vieja['id'])){
						echo $entrada_vieja['id']; 
						}
						?>"></div>
				<div class="form-group">
					<label for="titulo">Título</label>
					<input class="form-control" type="text" id="titulo" name="titulo" value="<?php if(isset($titulo)){
					echo $titulo;
					}elseif(isset($entrada_vieja['titulo'])){
						echo $entrada_vieja['titulo']; 
						}
						?>"">
				</div>

				<div class="form-group">
					<label for="texto">Texto</label>
					<textarea class="form-control" id="texto" name="texto" style="min-height: 150px"><?php if(isset ($texto)){
					echo $texto;
					}elseif(isset($entrada_vieja['texto'])){
						echo $entrada_vieja['texto']; 
						}
						?></textarea>
				</div>

				<div class=" form-group mt-3">

<?php if($ids_categorias_viejas):?>
<?php foreach($ids_categorias_viejas as $id_categoria_vieja): 
		$nombres_categorias=Categoria::getNombresCategoriasViejas($id_categoria_vieja[0]);
		foreach($nombres_categorias as $nombre_categoria): ?>

			<a href="borrar-asoc-categoria.php?id=<?php echo $id_categoria_vieja[0]; ?>&entrada=<?php echo $_GET['id']; ?>">
<span class="badge badge-secondary"><?php echo $nombre_categoria[0]; ?> <i class="fas fa-times fa-sm"></i></span></a>

<?php endforeach; ?>
<?php endforeach; ?>

<?php endif; ?>

</div>
<input type="hidden" name="categorias_viejas" value="<?php if(isset($entrada_vieja['categorias'])) echo $entrada_vieja['categorias']; ?>">
<div class="form-group">
	<div class="row">
		<div class="col">

					
					
						<label for="seccion">Seleccionar categorías </label>
						<select class="form-select" multiple="multiple"  size="3" id="seccion" name="categorias[]" maxlength="200" style="min-width: 300px">

					
							<?php foreach($categorias_no_usadas as $categoria_no_usada): ?>
								<option value="<?php echo $categoria_no_usada[0]; ?>"><?php echo $categoria_no_usada[0]; ?></option>
							<?php endforeach; ?>
						</select>
			</div>

			<div class="col">

				<!--<input type="hidden" name="id" id="id" value="<?php if(isset ($id)){
					echo $id;
					}elseif(isset($entrada_vieja['id'])){
						echo $entrada_vieja['id']; 
						}
						?>">--->

						<?php  if(isset($nueva_categoria)): ?> 
	
<div class="mt-2 alert alert-info alert-dismissible">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  ¡La categoría ha sido creada!
</div>
	<?php endif; ?>
					<input class="form-control mt-4" type="text" id="categoria" name="nueva_categoria" placeholder="¡Añade nuevas categorías a tu lista! ">
					<small class="form-text text-muted">Tras añadirlas podrás seleccionarlas en tu entrada.</small>
    
				

				<input type="submit" class="btn btn-outline-info mt-2" id="enviar" name="crear_categoria" value="Añadir categoría">

				<div class="error_categoria_nueva_vacia" id="error_categoria_nueva_vacia">La categoría no puede estar vacía.</div>
			<div class="error_categoria_nueva_repetida" id="error_categoria_nueva_repetida">La categoría ya existe.</div>

			<?php if(!empty($errores_categoria)){
				echo $errores_categoria;
			} ?>

			</div>

			</div>

	</div>

					<input type="hidden" name="imagen_guardada" value="<?php if(isset($entrada_vieja['imagen'])) echo $entrada_vieja['imagen']; ?>">

					<div class="form-group">
						<label for="foto">Imagen</label><br>
						<input class="form-control-file" type="file" id="foto" name="imagen">
						<div><?php if(isset($error_imagen_extension)) echo $error_imagen_extension; ?></div>
						<div><?php if(isset($error_imagen_peso)) echo $error_imagen_peso; ?></div>

					</div>
					


					
				<button class="btn btn-info" type="submit" name="editar_entrada" value="Editar post">Editar entrada</button>

			</form>

	

	</form>








		</div>

	</form>


</div>
</div>
</div>

</div>

<?php require('footer.php'); ?>