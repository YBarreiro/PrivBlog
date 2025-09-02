<?php if ($perfil=="usuario"){
	require 'vista/header.php';
} 
elseif($perfil=="administrador"){
	require 'vista/header-admin.view.php';

	}

?>
<div class="content">

<div class="container"> 

<div class="row">
	<div class="col guia"><nav aria-label="breadcrumb">
  <ol  class="breadcrumb my-4">
    <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i> PrivBlog</a></li>
    <li class="breadcrumb-item active" aria-current="page">Perfil</li>
  </ol>
</nav></div>


</div>


	<h3 class="my-4">Datos personales</h3>

	<p><strong>Nombre: </strong><?php echo $_SESSION['nombre']; ?></p>

	<p><strong>Fecha de registro: </strong><?php echo Tool::convertirFecha($fecha[0]); ?></p>

	<p class=""><strong>Email: </strong><?php echo $email[0];?></p>


	<div class="mt-5"><button class="btn btn-outline-warning"><a  style="color:black" href="cambiar-email.php">Cambiar email</a></button>
	<button class="btn btn-outline-warning ml-2"><a style="color:black" href="cambiar-pass.php">Cambiar contraseña</a></button>
	<button class="btn btn-outline-warning ml-2"><a style="color:black" href="eliminar-persona.php" id="eliminar_usuario">Eliminar cuenta</a></button>
	</div>
	
	</div>
</div>



<?php require ('footer.php');?>




    
    



 
	
