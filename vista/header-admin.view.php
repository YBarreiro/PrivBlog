<!DOCTYPE html> 
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<title>PrivBlog</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<script src="https://kit.fontawesome.com/79ab6478f3.js" crossorigin="anonymous"></script>
</head>
<body>
<header>
	<!-- A grey horizontal navbar that becomes vertical on small screens -->
<nav class="navbar navbar-expand-sm bg-light d-flex justify-content-between">
	<!-- Brand/logo -->
  <a class="navbar-brand" href="index.php"><h5>PrivBlog<i class="ml-2 fas fa-unlock-alt fa-sm"></i></h5></a>

   <?php if (isset($_SESSION['nombre'])): ?> 
    	

  <!-- Links -->
  <ul class="navbar-nav">
    
    
      
      <!-- Dropdown -->
    <li class="nav-item dropdown ">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        <?php echo $_SESSION['nombre']; ?>
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="perfil.php">Perfil</a>
        <a class="dropdown-item" href="cerrar-sesion.php">Cerrar sesión</a>
      </div>
    </li>

    <li class="nav-item ml-5">
      <a class="nav-link" href="registro-admin.php">Registrar nuevo administrador</a>
    </li>
</ul>
  <?php endif ?>
  


</nav>
</header>








