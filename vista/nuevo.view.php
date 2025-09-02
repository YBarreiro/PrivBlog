<?php require 'vista/header.php'; ?>
<div class="content">
<div class="container">  

	<div class="row">
		<div class=" col guia">
			<nav aria-label="breadcrumb">
  <ol  class="breadcrumb my-4">
    <li class="breadcrumb-item"><a href="index.php"style="color:#17a2b8"><i class="fas fa-home"></i> PrivBlog</a></li>
    <li class="breadcrumb-item active" style="color:#17a2b8" aria-current="page">Nueva entrada</li>
  </ol>
</nav>
</div>
</div>

	<div class="row justify-content-center">
		<div class="col-7">

			<h3 class="mt-2 mb-4">Nueva entrada </h3>
			<form action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" method="POST"  name="nuevo" id="nuevo">


				<div class="form-group">
					<label for="titulo">Título</label>
					<input class="form-control" type="text" id="titulo" name="titulo" value="<?php if (isset($titulo)) echo $titulo; ?>" maxlength="500">
				</div>
				<div class="form-group">
					<label for="texto">Texto</label>
					<textarea class="form-control" id="texto" name="texto" placeholder="" style="min-height: 150px" ><?php if (isset($texto)) echo $texto; ?></textarea>
				</div>

				
				<div id="" class=" form-group">
					<label for="categorias">Categorías </label><br>
					<div class="row">
					<div class="col">
					
					<select class="form-select" multiple="multiple"  size="3" id="seccion" name="categorias[]" maxlength="200" style="min-width: 300px">

						<?php foreach($categorias_usuario as $categoria_usuario): ?>
							<option value="<?php echo $categoria_usuario[0]; ?>"><?php echo $categoria_usuario[0]; ?></option>
						<?php endforeach; ?>

					</select>
</div>
<div class="col">

	<?php  if(isset($nueva_categoria)): ?> 
	
<div class="mt-2 alert alert-info alert-dismissible">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  ¡La categoría ha sido creada!
</div>
	<?php endif; ?>
 
	<input class="form-control mb-2" type="text" id="categoria" name="nueva_categoria" placeholder="¡Añade nuevas categorías a tu lista!" aria-describedby="passwordHelpBlock">

	
				
				<input  class="btn btn-outline-info" type="submit"  id="enviar" name="crear_categoria" value="Añadir categoría">

				<?php if(isset($errores_categoria)): ?> 
					<div class="validacion small"><?php echo $errores_categoria; ?></div>
				<?php endif; ?>

				<div class="error_categoria_nueva_vacia validacion small" id="error_categoria_nueva_vacia">La categoría no puede estar vacía.</div>
			<div class="error_categoria_nueva_repetida validacion small" id="error_categoria_nueva_repetida">La categoría ya existe.</div>

</div>
</div>
</div>

					
				<div class="form-group">
					<label for="foto">Imagen</label><br>
					<input class="form-control-file" type="file" id="foto" name="imagen"><br>

				<?php 
				if(isset($error_peso)){
					echo $error_peso;
				}
				if(isset($error_no_imagen)){
					echo $error_no_imagen; 
				} ?>

				<input type="hidden" name="file_upload">
					<div class="validacion small"><?php if(isset($errores_imagen)) echo $errores_imagen; ?></div>
					
				</div>

				<input class="btn btn-info" type="submit" name="crear_entrada" value="Publicar post">
		


			
				

			</form>
			<!--validadion cliente-->
			

		

			

			<!--validación servidor-->
			<div><?php if(isset ($error_categoria)) echo $error_categoria; ?></div>
			
			<div><?php if(isset( $error_categoria_vacia)) echo $error_categoria_vacia; ?></div>
		</div>
	</div>
</div>
</div>

</div>

<?php require('footer.php'); ?>