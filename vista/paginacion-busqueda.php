<?php require('modelo/functions.php'); ?>


<ul class="pagination">  
	
						<?php if($num_entradas>2): ?>
						<?php if($pagina_actual>1): ?>
							<li class="page-item"><a class="page-link" href="?pagina=1&busqueda=<?php echo $terminos_busqueda; ?>">Primera</a></li>

							<li class="page-item"><a class="page-link" href="?pagina=<?php echo $pagina_actual-1; ?>&busqueda=<?php echo $terminos_busqueda; ?>"><?php echo $pagina_actual-1; ?></a></li>
							<?php endif; ?>

							<li class="page-item active"><a class="page-link" href="?pagina=<?php echo $pagina_actual; ?>&busqueda=<?php echo $terminos_busqueda; ?>"><?php echo $pagina_actual; ?></a></li>
							<?php if ($pagina_actual<=($total_paginas-1)): ?>
							<li class="page-item"><a class="page-link" href="?pagina=<?php echo $pagina_actual+1; ?>&busqueda=<?php echo $terminos_busqueda;?>"><?php echo $pagina_actual+1; ?></a></li>
						<?php endif; ?>
						
							<?php if ($pagina_actual!==$total_paginas): ?>
							<li class="page-item"><a class="page-link" href="?pagina=<?php echo $total_paginas; ?>&busqueda=<?php echo $terminos_busqueda;?>">Última</a></li>
							<?php endif; ?>


						</ul>
					<?php endif; ?>
						