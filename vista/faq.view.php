<div class="contenedor"><?php require 'vista/header.php'; ?>

	
<div class="content">

<div class="container ppal">

	<?php if (isset($_SESSION['nombre'])): ?>

<div class="row">
	<div class="col guia"><nav aria-label="breadcrumb">
  <ol  class="breadcrumb my-4">
    <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i> PrivBlog</a></li>
    <li class="breadcrumb-item active" aria-current="page">FAQ</li>
  </ol>
</nav></div>
<!--<div class="col-4 my-4">
			<a href="nuevo.php" class="btn btn-info" role="button">Nueva entrada</i></a>
		</div>-->

</div>

<?php endif; ?>




	<div class="row justify-content-center">
		<div class="col-10">
	<h3 class="my-5">FAQ</h3>

	<h5>¿Sed eget maximus?</h5>

	<p>Morbi ex velit, ultricies et porttitor vitae, efficitur id dolor. Integer vestibulum mi ut cursus facilisis. Mauris sagittis vehicula sem ac euismod. Sed vel justo risus. Suspendisse feugiat at ligula id commodo. </p>


	<h5>¿Nam lacinia quis ?</h5>

	<p>Duis lacinia lectus sed hendrerit congue. Sed consectetur ornare sapien, nec lacinia dui. Vestibulum at ullamcorper augue, a sodales tellus.</p>
	



	<h5>¿In malesuada pulvinar risus a?</h5>
	<p>Phasellus elit lacus, hendrerit nec placerat a, interdum vel felis. Nunc at nibh in neque ultricies ornare. Sed a metus et libero dignissim pretium vitae eu augue. Nulla id augue lobortis, ornare nunc vitae, efficitur massa. </p>
	

	<h5>¿Ut diam odio?</h5>
	<p>Phasellus elit lacus, hendrerit nec placerat a, interdum vel felis. Nunc at nibh in neque ultricies ornare. Sed a metus et libero dignissim pretium vitae eu augue. Nulla id augue lobortis, ornare nunc vitae, efficitur massa. </p>
	

	<h5>¿Nullam sagittis pulvinar ante, sed fermentum?</h5>
	<p>Morbi vulputate venenatis gravida. Nam condimentum, felis vel accumsan porttitor, mauris nibh aliquet leo, sit amet ornare ipsum tellus sit amet ex.</p>

	<h5>¿Praesent in?</h5>
	<p>Aenean ac libero mauris, </p>
	
	</div>
	</div>
</div>
</div>

<?php require 'footer.php'; ?>
</div>