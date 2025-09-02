<?php  

class Busqueda extends Paginacion{   

private $busqueda;
private $cabecera_busqueda;
private $resultados;
private $pagina_actual;

private $inicio;
private $num_total_entradas;
private $num_paginas;





public function getBusqueda($busqueda, $inicio, $entradas_por_pagina){ 
	if(isset($busqueda)){
		$this->busqueda=$busqueda;
		$statement=Tool::conectarBase()->prepare("(SELECT * FROM entrada WHERE titulo LIKE :busqueda or texto LIKE :busqueda) 
			UNION 
			(SELECT * FROM entrada WHERE id IN 
			(SELECT id_entrada FROM asoc_categoria_entrada WHERE id_categoria IN 
			(SELECT id FROM categoria WHERE nombre IN 
			(SELECT nombre FROM categoria WHERE nombre LIKE :busqueda))))
			ORDER BY fecha DESC LIMIT {$inicio}, {$entradas_por_pagina}");
		$statement->execute(array(':busqueda'=>"%$this->busqueda%"));
		return $this->resultados=$statement->fetchAll();
	}
}



public function getNumeroTotalEntradas(){ 



		$this->busqueda=$_GET['busqueda'];

		$statement=Tool::conectarBase()->prepare("(SELECT * FROM entrada WHERE titulo LIKE :busqueda or texto LIKE :busqueda) 
			UNION 
			(SELECT * FROM entrada WHERE id IN 
			(SELECT id_entrada FROM asoc_categoria_entrada WHERE id_categoria IN 
			(SELECT id FROM categoria WHERE nombre IN 
			(SELECT nombre FROM categoria WHERE nombre LIKE :busqueda))))
			");
		$statement->execute(array(':busqueda'=>"%$this->busqueda%"));
		 $this->resultados=$statement->fetchAll();

	

	

	$contador=0;
	foreach($this->resultados as $resultado){
		$contador++;
	}

return  $contador;
		


}

public function getNumeroPaginas(){

		$this->getNumeroTotalEntradas();
		 $this->getNumEntradasPagina();

		return $this->numero_paginas=ceil($this->getNumeroTotalEntradas() / $this->getNumEntradasPagina());
	}


		
	public function setCabeceraBusqueda(){

				if(empty($this->resultados)){

			 $this->cabecera_busqueda='No hay resultados de: "'.$this->busqueda.'"';
		}else{

		  $this->cabecera_busqueda='Resultados de: "'. $this->busqueda.'"';

}


	}	





public function getCabeceraBusqueda(){

return $this->cabecera_busqueda;

}








}





 ?>