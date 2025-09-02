
<?php 
require 'vista/header.php';
 ?>	<div class="content">
	<div class="container">  


<div class="row justify-content-center mt-3" ><div class="col-4 "><blockquote class="blockquote mb-5">
    <small><i>En mi opinión escribir es un acto secreto, tan secreto como soñar.</i></small>
    <footer class="blockquote-footer">Stephen King</footer>
  </blockquote></div> </div> 
  

		<main class="row justify-content-center mt-n3" >
			
			<div class="col-4" >
				

				<h1 class=""style="text-align: center">PrivBlog</h1><h3 style="text-align: center"><i class="fas fa-unlock-alt"></i></h3>
			

			<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
				<div class="form-group">
					<!--<label for="nombre_usuario">Usuario</label>-->

						<input type="text" class="form-control" name="nombre" placeholder="Introduce tu usuario">
						<div class="validacion small"><?php if (isset($error_usuario_vacio)) {
							echo $error_usuario_vacio;
						} ?></div>
				</div>
		<div class="form-group">
			<!--<label for="pass">Contraseña</label>-->
			<input type="password" class="form-control" id="pass" name="pass" placeholder="Introduce tu contraseña">
			<div class="validacion small"><?php if (isset($error_pass_vacio)) {
				echo $error_pass_vacio; 
			}?></div>
		</div>

		<div class="validacion small"><?php if (isset($error_login)) {
			echo $error_login;
		} ?></div>

		
		<div style="text-align: center">
		<input type="submit" class="btn btn-info" name="enviar_login" value="Iniciar sesión" ></div>
	</form>

	
	
<div style="text-align: center">
	<p class="mt-3 colorinfo">¿Aún no tienes una cuenta?</p>
	<a class="btn btn-info" href="registro.php">Regístrate</a></div>



			
				
		</main>


		


	</div>
	</div>

	<?php require 'footer.php'; ?>

