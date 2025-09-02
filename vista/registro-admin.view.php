<?php require 'vista/header-admin.view.php'; ?>

<div class="content"> 
<div class="container">

<div class="row">
<div class="col"><nav aria-label="breadcrumb">
  <ol  class="breadcrumb my-4">
    <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i> PrivBlog</a></li>
    <li class="breadcrumb-item active" aria-current="page">Registro administrador</li>
  </ol>
</nav></div>
</div>

	<div class="row justify-content-center">
		<div class="col-6">

			<?php if (isset($admin_creado)): ?>
				<div class="mt-2 alert alert-info alert-dismissible d-flex align-items-center">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  ¡El nuevo administrador ha sido creado con éxito!

</div>
<?php endif; ?>

	<h4 class="my-3" style="text-align: center">Registro Administrador</h4> 


	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
		<div class="form-group">
			<label for="nombre">Nombre:</label>
		<input type="text" class="form-control" name="nombre" id="nombre">
		<!--Muestra los avisos de la validación hecha en el cliente-->
					<div class="invalid-feedback" id="error_nombre_vacio">Por favor, introduce un nombre</div>
					<div class="invalid-feedback" id="error_nombre">Por favor, introduce un nombre válido.</div>
		<!--Muestra los avisos de la validación hecha en el servidor NO FUNCIONA CON BOOTSTRAP-->
					<div class=""><?php 
					if (isset($errores_nombre)) {
						echo $errores_nombre;
					} ?></div>
		</div>
		<div class="form-group">
			<label for="email">Email:</label>
			<input type="email" class="form-control" name="email" id="email">
			<!--Muestra los avisos de la validación hecha en el servidor-->
					<div><?php 
					if (isset($errores_email)) {
						echo $errores_email;
					} ?></div>
					<!--Muestra los avisos de la validación hecha en el cliente-->
					<div class="invalid-feedback" id="error_email_vacio">Por favor, introduce una dirección de email.</div>
					<div class="invalid-feedback" id="error_email">Por favor, introduce una dirección de email válida.</div>
		</div>
		<div class="form-group">
			<label for="pass">Contraseña: </label>
	 <input type="password" class="form-control" name="pass" id="pass">
	 <!--Muestra los avisos de la validación hecha en el servidor-->
					<div><?php 
					if (isset($errores_pass)) {
						echo $errores_pass;
					} ?></div>
					<!--Muestra los avisos de la validación hecha en el cliente-->
					<div class="invalid-feedback" id="error_pass_vacio">Por favor, introduce una contraseña.</div>
					<div class="invalid-feedback" id="error_pass">Por favor, introduce una contraseña válida.</div>
		</div>
		<div class="form-group">
			<label for="pass2">Repite la contraseña: </label>
	 <input type="password"class=" form-control" name="pass2" id="pass2">
	 <!--Muestra los avisos de la validación hecha en el servidor-->
				<div><?php 
					if (isset($errores_pass2)) {
						echo $errores_pass2;
					} ?></div>
					<!--Muestra los avisos de la validación hecha en el cliente-->
				<div class="invalid-feedback" id="error_pass2_vacio">Por favor, introduce de nuevo la contraseña.</div>
				<div class="invalid-feedback" id="error_pass_igual">Las contraseñas no son iguales. Por favor, inténtalo de nuevo.</div>
		</div>

		<div class="d-flex justify-content-center"><input type="submit" class="btn btn-info" name="enviar_registro" id="enviar_registro_admin" value="Registrar nuevo administrador"></div>
		

	</form>

	</div>
	</div>
	</div>
</div>
	

<?php require ('footer.php'); ?>


