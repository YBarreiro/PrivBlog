<?php require 'vista/header.php'; ?>

<div class="content">
<div class="container">   

	<div class="guia"><nav aria-label="breadcrumb">
  <ol  class="breadcrumb my-4">
    <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i> PrivBlog</a></li>
    <li class="breadcrumb-item active" aria-current="page">Categorías</li>
  </ol>
</nav></div>

	<h3 class="my-5">Editar categorías</h3>   

	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST"><input type="text" name="categoria">
		<input type="submit" name="anadir_categoria"></form>

		<?php if(isset($error_categoria_vacia)):?>
			<div class=""><?php echo $error_categoria_vacia;  ?></div>
		<?php endif; ?>

		<?php if(isset($error_categoria)):?>
			<div class=""><?php echo $error_categoria;  ?></div>
		<?php endif; ?>
		



					<?php foreach ($ids_categorias as $id_categoria): ?>

					<?php $nombres_categorias=$categorias->getNombresCategorias($id_categoria[0]); ?>

					<?php foreach ($nombres_categorias as $nombre_categoria): ?>
						
						<table class="table table-sm ml-5">
							<tr class="row">
					<td class="col-2"><a href="resultados-categoria.php?id=<?php echo $id_categoria[0]; ?>"><?php echo $nombre_categoria[0]; ?> (<?php 
					 $num_entradas_categoria=$asociacion->getNumeroEntradasCategorias($id_categoria[0]); 
					 echo $num_entradas_categoria[0];
					 ?>)</a></td>

					 <td class="col-3"><form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST"><input type="text" name="categoria" >
					 	<input type="hidden" name="id" value="<?php echo $id_categoria[0]; ?>">
		<input type="submit" name="renombrar_categoria" value="Cambiar nombre"></form>
			
			</td>


					 <td class="col-1"><a href="borrar-categoria.php?id=<?php echo $id_categoria[0];?>">Borrar</a></td>
					 <td class="col-1"><a href="borrar-entradas-categoria.php?id=<?php echo $id_categoria[0];?>">Borrar entradas</a><br></td>
					 </tr>
					 </table>

				<?php endforeach; ?>

			<?php endforeach; ?>
		
	</div>
	</div>
	
<?php require 'footer.php'; ?>