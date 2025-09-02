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
    <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i> PrivBlog</a></li>
    <li class="breadcrumb-item"><a href="perfil.php">Perfil</a></li>
    <li class="breadcrumb-item active" aria-current="page">Cambiar contraseña</li>
  </ol>
</nav></div>

</div>

<div class="row">
  <div class="col">
<h4>Cambiar contraseña</h4>
</div>
</div>


<div class="row justify-content-center">
    <div class="col-3">
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"> 

<div class="form-group">
<label for="pass">Introduce tu nueva contraseña</label> 
<input class="form-control" type="password" name="pass" id="pass">
<small class="form-text text-muted">
            La contraseña debe contener entre 5 y 10 caracteres y estar compuesto de letras y/o números.
          </small>
<div class="invalid-feedback" id="error_pass_vacio">Por favor, introduce una contraseña.</div>
<div class="invalid-feedback" id="error_pass">Por favor, introduce una contraseña válida.</div>
<?php if(isset($errores_pass)) echo $errores_pass; ?>
</div>

<div class="form-group">
<label for="pass2">Repite tu nueva contraseña</label> 
<input class="form-control" type="password" name="pass2" id="pass2">
<div class="invalid-feedback" id="error_pass2_vacio">Por favor, introduce de nuevo la contraseña.</div>
<div class="invalid-feedback" id="error_pass_igual">Las contraseñas no coinciden. Por favor, inténtalo de nuevo.</div>
<?php if(isset($errores_pass2)) echo $errores_pass2;?>
</div>

<div class="form-group">
<label for="pass_conectado">Introduce tu contraseña actual</label> 
<input class="form-control" type="password" name="pass_correcto" id="pass_conectado">
<div class="invalid-feedback" id="error_pass_conectado">Por favor, introduce tu contraseña.</div>
<?php if(isset($errores_pass_correcto)) echo $errores_pass_correcto; ?>
</div>

<input class="btn btn-info mb-2" type="submit" name="cambiar_pass" id="cambiar_pass" value="Guardar nueva contraseña">



<?php  if(isset($exito)): ?>
	
<div class="alert alert-info alert-dismissible">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <?php echo $exito; ?>
</div>

<?php endif; ?>

</form>

</div>
</div>
</div>





<?php require 'footer.php'; ?>