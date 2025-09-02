<?php require 'vista/header.php'; ?>
<div class="content">
<div class="container">

	<div class="guia"><nav aria-label="breadcrumb">
  <ol  class="breadcrumb my-4" style="border-top-color: black">
    <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i> PrivBlog</a></li>
    <li class="breadcrumb-item active" aria-current="page">Registro</a></li>
  </ol>
</nav></div>
	<main class="row mt-5 justify-content-center">
		<div class="col-4">
			<?php if(isset($usuario_creado)): ?>
				<div class="mt-2 alert alert-info alert-dismissible d-flex align-items-center">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  ¡El usuario ha sido creado con éxito!
  <a class="d-flex justify-content-center" href="index.php">Iniciar sesión</a>

</div>
<?php endif; ?>


			<h4 class="mb-5">Regístrate</h4>
			<!--Formulario de registro-->
			<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" id="form_registro" name="form_registro">
				<div class="form-group">
					<label for="nombre" class="mb-1"><b>Nombre</b></label>
					<input type="text" class="form-control" id="nombre" name="nombre" >
					<small id="passwordHelpBlock" class="form-text text-muted">
						El nombre de usuario debe contener entre 3 y 10 caracteres y estar compuesto de letras y/o números.
					</small>
					<!--Muestra los avisos de la validación hecha en el cliente-->
					<div class="invalid-feedback" id="error_nombre_vacio">Por favor, introduce un nombre</div>
					<div class="invalid-feedback" id="error_nombre">Por favor, introduce un nombre válido.</div>
					<!--Muestra los avisos de la validación hecha en el servidor NO FUNCIONA BOOTSTRAP-->
					<div class="validacion small"><?php 
					if (isset($error_nombre)) {
						echo $error_nombre;
					} ?></div>
				</div>
				<div class="form-group">
					<label for="email">Email</label>
					<input type="text" class="form-control" id="email" name="email" >
					<!--Muestra los avisos de la validación hecha en el cliente-->
					<div class="invalid-feedback" id="error_email_vacio">Por favor, introduce una dirección de email.</div>
					<div class="invalid-feedback" id="error_email">Por favor, introduce una dirección de email válida.</div>
					<!--Muestra los avisos de la validación hecha en el servidor-->
					<div class="validacion small"><?php 
					if (isset($error_email)) {
						echo $error_email;
					} ?></div>
				</div>
				<div class="form-group">
					<label for="pass">Contraseña:</label>
					<input type="password" class="form-control" id="pass" name="pass" >
					<small class="form-text text-muted">
						La contraseña debe contener entre 3 y 10 caracteres y estar compuesto de letras y/o números.
					</small>
					<!--Muestra los avisos de la validación hecha en el cliente-->
					<div class="invalid-feedback" id="error_pass_vacio">Por favor, introduce una contraseña.</div>
					<div class="invalid-feedback" id="error_pass">Por favor, introduce una contraseña válida.</div>
					<!--Muestra los avisos de la validación hecha en el servidor-->
					<div class="validacion small"><?php 
					if (isset($error_pass)) {
						echo $error_pass;
					} ?></div>
				</div>
				<div class="form-group">
					<label for="">Repite la contraseña:</label>
					<input type="password" class="form-control" id="pass2" name="pass2" >
				<!--Muestra los avisos de la validación hecha en el cliente-->
				<div class="invalid-feedback" id="error_pass2_vacio">Por favor, introduce de nuevo la contraseña.</div>
				<div class="invalid-feedback" id="error_pass_igual">Las contraseñas no son iguales. Por favor, inténtalo de nuevo.</div>
				<!--Muestra los avisos de la validación hecha en el servidor-->
				<div class="validacion small"><div><?php 
					if (isset($error_pass2)) {
						echo $error_pass2;
					} ?></div></div>
				<div class="form-group">
					<label id="controles" for="fecha">Fecha de nacimiento:</label>
					<input type="date" class="form-control" name="fecha" id="fecha_nac" >
				<!--Muestra los avisos de la validación hecha en el cliente-->
				<div class="invalid-feedback" id="error_fecha_nac">Por favor, introduce tu fecha de nacimiento.</div>
				<!--Muestra los avisos de la validación hecha en el servidor-->
				<div><div class="validacion small"><?php 
					if (isset($error_fecha)) {
						echo $error_fecha;
					} ?></div></div>
				</div>
<!--<?php if (isset($_POST['sexo']) && $_POST['sexo'] == 'hombre') echo ' checked="checked"'; ?>
<?php if (isset($_POST['sexo']) && $_POST['sexo'] == 'mujer') echo ' checked="checked"'; ?>
<?php if (isset($_POST['terminos']) && $_POST['terminos'] == 'terminos') echo ' checked="checked"'; ?>-->

				<div class="form-check-inline">
					<label class="form-check-label">
						<input type="radio" class="form-check-input" value="hombre"  name="sexo" >Hombre
					</label>
				</div>
				<div class="form-check-inline">
					<label class="form-check-label">
						<input type="radio" class="form-check-input" value="mujer"  id="sexo" name="sexo" >Mujer 
					</label>
				</div>
				<!--Muestra los avisos de la validación hecha en el cliente-->
				<div class="invalid-feedback" id="vacio_sexo">Por favor, marca tu sexo.</div>
				<!--Muestra los avisos de la validación hecha en el servidor-->
				<div><div class="validacion small"><?php 
					if (isset($error_sexo)) {
						echo $error_sexo;
					} ?></div></div>
				<div class="form-check">
					<label class="form-check-label"><br><br>
						<input type="checkbox" class="form-check-input" value="terminos" id="terminos" name="terminos"name="terminos" id="terminos">Acepto términos y condiciones.
					</label>
					<!--Muestra los avisos de la validación hecha en el cliente-->
					<div class="invalid-feedback" id="error_terminos_vacio">Por favor, acepta los términos y condiciones.</div>
					<!--Muestra los avisos de la validación hecha en el servidor-->
					
				</div>
				<div><div class="validacion small"><?php 
					if (isset($error_terminos)) {
						echo $error_terminos;
					} ?></div></div>


				<!-- Button to Open the Modal -->

				<a data-toggle="modal" href="#terminos">Leer términos y condiciones</a>


				<!-- The Modal -->
				<div class="modal" id="terminos">
					<div class="modal-dialog">
						<div class="modal-content">

							<!-- Modal Header -->
							<div class="modal-header">
								<h4 class="modal-title">Términos y condiciones</h4>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>

							<!-- Modal body -->
							<div class="modal-body">

								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus accumsan augue eu sem vulputate venenatis. Maecenas iaculis mi leo, sed aliquam urna lobortis ac. Quisque vehicula ligula id scelerisque laoreet. Suspendisse nec urna ut tellus tincidunt mollis. Sed vel turpis quis libero dignissim cursus at sit amet enim. Pellentesque fringilla leo nec magna pellentesque, in rutrum magna aliquam. Sed condimentum interdum sapien, non tincidunt arcu sodales id. Vestibulum aliquet consequat lectus tincidunt eleifend. Sed faucibus, ex et pulvinar ornare, elit orci vestibulum velit, non eleifend purus risus rhoncus felis. Praesent eget leo ex. Integer feugiat dui vel risus viverra, eu consequat nibh ullamcorper. Sed mattis justo magna, eget vehicula nisl maximus eget. In hac habitasse platea dictumst. In eu varius neque. In hac habitasse platea dictumst. Donec et bibendum nulla, in ornare lectus.</p>

								<p>Donec interdum porta tellus, sit amet porta sem dapibus non. Morbi blandit, diam a tincidunt luctus, ante leo egestas tortor, quis pulvinar urna lectus a eros. Aliquam posuere purus non lorem facilisis ultricies. Sed tincidunt nibh eget urna auctor, eu aliquet sapien posuere. Mauris nec ullamcorper dolor. Donec varius vitae risus consectetur commodo. Vivamus venenatis ultrices fermentum. Nullam hendrerit consequat accumsan. Proin accumsan commodo odio, sed gravida erat iaculis nec. Nam in posuere urna. Pellentesque et dapibus est. Integer pharetra elementum sem. Donec sit amet pulvinar tellus. Integer ac neque erat. Nulla lectus nunc, fringilla iaculis hendrerit ut, ornare vel augue.</p>



							</div>

							<!-- Modal footer -->
							<div class="modal-footer">
								<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
							</div>

						</div>
					</div>
				</div><br><br>
				<div class="d-flex justify-content-center"><input type="submit" class="btn btn-info " id="enviar_registro" name="enviar_registro" value="Regístrate"></div>


			</form><br><br>

			



		</div>
	</main>



</form>
</div>
</div>
</main>
</div>
</div>


<?php require('footer.php'); ?>
