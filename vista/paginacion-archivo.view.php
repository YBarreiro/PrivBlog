<?php require('modelo/functions.php'); ?>


<ul class="pagination">  

						<?php  if($num_entradas>2): ?>
						<?php if($pagina_actual>1): ?>
							<li class="page-item"><a class="page-link" href="?pagina=1&ano=<?php echo $ano; ?><?php if(isset($mes)): ?>&mes=<?php echo $mes; ?><?php endif; ?>">Primera</a></li>

							<li class="page-item"><a class="page-link" href="?pagina=<?php echo $pagina_actual-1; ?>&ano=<?php echo $ano; ?><?php if(isset($mes)): ?>&mes=<?php echo $mes; ?><?php endif; ?>"><?php echo $pagina_actual-1; ?></a></li>
							<?php endif; ?>
							
							<li class="page-item active"><a class="page-link" href="?pagina=<?php echo $pagina_actual; ?>&ano=<?php echo $ano; ?><?php if(isset($mes)): ?>&mes=<?php echo $mes; ?><?php endif; ?>"><?php echo $pagina_actual; ?></a></li>
						
							<?php if ($pagina_actual<=($total_paginas-1)): ?>
							<li class="page-item"><a class="page-link" href="?pagina=<?php echo $pagina_actual+1; ?>&ano=<?php echo $ano; ?><?php if(isset($mes)): ?>&mes=<?php echo $mes; ?><?php endif; ?>"><?php echo $pagina_actual+1; ?></a></li>
						<?php endif; ?>
							<?php if ($pagina_actual!==$total_paginas): ?>
							<li class="page-item"><a class="page-link" href="?pagina=<?php echo $total_paginas; ?>&ano=<?php echo $ano; ?><?php if(isset($mes)): ?>&mes=<?php echo $mes; ?><?php endif; ?>">Última</a></li>
							<?php endif; ?>
							<?php endif; ?>

						</ul>

					
						