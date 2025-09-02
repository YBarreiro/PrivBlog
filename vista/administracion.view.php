<?php require 'vista/header-admin.view.php'; ?>
<div class="content">
<div class="container">  

  <div class="row">
    <div class=" col">
      <nav aria-label="breadcrumb">
  <ol  class="breadcrumb my-4">
    <li class="breadcrumb-item active" aria-current="page"><a href="index.php"><i class="fas fa-home"></i> PrivBlog</a></li>
  </ol>
</nav>
</div>
</div>


	<div class="row">
		<div class="col">
			<h4 class="mt-5 mb-5" style="text-align: center">Datos y estadística</h4>
<table class="table table-striped">
    <thead>
      <tr>
      	
        <th>Nº total de usuarios</th>

      </tr>
    </thead>
    <tbody>
      <tr>
        <td><mark><?php echo $numero_usuarios[0]; ?></mark></td>
      </tr>
    </tbody>
  </table>   
  <table class="table table-striped">
    <thead>
      <tr>
        <th></th>
        <th>Número</th>
        <th>%</th>
      </tr>
    </thead>
    <tbody>
      <tr>
      	<td><strong>Varones</strong></td>
        <td><?php echo $numero_hombres[0]; ?></td>
        <td><?php echo $estadistica->calcularPorcentaje($numero_usuarios[0], $numero_hombres[0]); ?> %</td>
      </tr>
      <tr>
      	<td><strong>Mujeres</strong></td>
        <td><?php echo $numero_mujeres[0]; ?></td>
        <td><?php if($numero_mujeres[0]>0){
          echo $estadistica->calcularPorcentaje($numero_usuarios[0], $numero_mujeres[0]);  
        }else{
        echo "0";
      } ?> % </td>
      </tr>

    <tr>
      <td></td>
      <td><strong>Número</strong></td>
      <td><strong>%</strong></td>
    </tr>
    


      <tr>
      	<td><strong><18 años</strong></td>
        <td><?php echo $numero_tramo1[0]; ?></td>
        <td><?php if($numero_tramo1[0]>0){
          echo $estadistica->calcularPorcentaje($numero_usuarios[0], $numero_tramo1[0]);  
        }else{
        echo "0";
      } ?> % </td>
      </tr>
      <tr>
      	<td><strong>18-29 años</strong></td>
        <td><?php echo $numero_tramo2[0]; ?></td>
        <td><?php if($numero_tramo2[0]>0){
          echo $estadistica->calcularPorcentaje($numero_usuarios[0], $numero_tramo2[0]);  
        }else{
        echo "0";
      } ?>  %</td>
      </tr>
      <tr>
      	<td><strong>30-49 años</strong></td>
        <td><?php echo $numero_tramo3[0]; ?></td>
        <td><?php if($numero_tramo3[0]>0){
          echo $estadistica->calcularPorcentaje($numero_usuarios[0], $numero_tramo3[0]);  
        }else{
        echo "0";
      } ?> % </td>
      </tr>
      <tr>
      	<td><strong>>49 años</strong></td>
        <td><?php echo $numero_tramo4[0]; ?></td>
        <td><?php if($numero_tramo4[0]>0){
          echo $estadistica->calcularPorcentaje($numero_usuarios[0], $numero_tramo4[0]);  
        }else{
        echo "0";
      } ?> % </td>
      </tr>
    </tbody>
  </table>
  
  </div>
  </div>
</div>
</div>	





	
<?php require 'footer.php'; ?>