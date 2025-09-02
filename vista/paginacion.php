<?php require('modelo/functions.php'); ?>


<ul class="pagination">  

						<?php $paginacion=new Paginacion(2); 

						$num_entradas=$paginacion->getNumeroTotalEntradas();
						
	
						if($num_entradas>1): ?>
						<?php if($pagina_actual>1): ?>
							<li class="page-item"><a class="page-link" href="?pagina=1; ?>">Primera</a></li>

							<li class="page-item"><a class="page-link" href="?pagina=<?php echo $pagina_actual-1; ?>"><?php echo $pagina_actual-1; ?></a></li>
							<?php endif; ?>
							<li class="page-item active"><a class="page-link" href="?pagina=<?php echo $pagina_actual; ?>"><?php echo $pagina_actual; ?></a></li>
							<?php if ($pagina_actual<=($total_paginas-1)): ?>
							<li class="page-item"><a class="page-link" href="?pagina=<?php echo $pagina_actual+1; ?>"><?php echo $pagina_actual+1; ?></a></li>
						<?php endif; ?>
							<?php if ($pagina_actual!==$total_paginas): ?>
							<li class="page-item"><a class="page-link" href="?pagina=<?php echo $total_paginas; ?>">Última</a></li>
							<?php endif; ?>


						</ul>
						<?php endif; ?>