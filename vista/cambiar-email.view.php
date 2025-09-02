<?php if ($perfil=="usuario"){
  require 'vista/header.php';
} 
elseif($perfil=="administrador"){
  require 'vista/header-admin.view.php';

  }

?>

<div class="container">
<div class="row"> 

<div class="col guia"><nav aria-label="breadcrumb">
  <ol  class="breadcrumb my-4">
    <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i> Principal</a></li>
    <li class="breadcrumb-item"><a href="perfil.php">Perfil</a></li>
    <li class="breadcrumb-item active" aria-current="page">Cambiar email</li>
  </ol>
</nav></div>

</div>

<div class="row">
  <div class="col">
<h4 class="my-3">Cambiar email</h4> 
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

  </div>
  </div>


	<div class="row justify-content-center">
    <div class="col-6">

<div class="form-group">
  <label for="email">Introduce tu nuevo email</label>
<input class="form-control" type="text" name="email" id="email">
<div class="invalid-feedback" id="error_email_vacio">El email no puede estar vacío.</div>
<div class="invalid-feedback" id="error_email">Por favor, introduce un email válido.</div>
<div><?php  if (isset($errores_email)) echo $errores_email; ?></div>
</div>

<div class="form-group">
  <label for="pass">Introduce tu contraseña</label>
<input class="form-control" type="password" name="pass_correcto" id="pass">
<div class="invalid-feedback" id="error_pass_vacio">Por favor, introduce tu contraseña</div>

<div><?php if (isset($errores_pass)) echo $errores_pass; ?></div>


</div>



<input class="btn btn-info mb-2" type="submit" name="cambiar_email" id="cambiar_email" value="Guardar nuevo email">

<?php  if(isset($exito)): ?>
	
<div class="alert alert-info alert-dismissible">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
 <?php echo $exito; ?>
</div>

<?php endif; ?>

</form>

</div>

</div></div>





<?php require 'footer.php'; ?>