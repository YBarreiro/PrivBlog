<?php require 'vista/header-admin.view.php'; ?>

<div class="content">
<div class="container">

	<h3 class="my-4">Datos personales</h3> 

	<p><strong>Nombre: </strong><?php echo $_SESSION['nombre']; ?></p>

	<p><strong>Fecha de registro: </strong><?php echo Tool::convertirFecha($fecha[0]); ?></p>

	<p class=""><strong>Email: </strong><?php echo $email[0];?></p>
	
	


	<button class="btn"><a href="cambiar-email.php">Cambiar email</a></button>
	<button><a href="cambiar-pass.php">Cambiar contraseña</a></button><br>
	<a href="eliminar-persona.php" id="eliminar_usuario">Eliminar cuenta administrador</a>

</div>
</div>

<?php require 'footer.php'; ?>








