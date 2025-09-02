<?php  

class Paginacion{    

private $pagina_actual;
protected $entradas_por_pagina;
private $inicio;
private $num_total_entradas;
private $num_paginas;

public function __construct($entradas_pagina){
	$this->entradas_por_pagina=$entradas_pagina;
	$this->pagina_actual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
	$this->inicio = ($this->pagina_actual > 1) ? ($this->pagina_actual * $this->entradas_por_pagina - $this->entradas_por_pagina) : 0 ;
}

public function getPaginaActual(){
	return $this->pagina_actual;
}

public function getInicio(){ 
	return $this->inicio;
}

public function getNumEntradasPagina(){
	return $this->entradas_por_pagina;
}



public function getEntradas($inicio, $entradas_por_pagina){ 
		$statement = Tool::conectarBase()->prepare("SELECT * FROM entrada WHERE autor='".$_SESSION['nombre']."' ORDER BY fecha DESC LIMIT {$inicio}, {$entradas_por_pagina}");
		$statement->execute();
		return $statement->fetchAll();
	}

	


public function getNumeroTotalEntradas(){ 

	//echo "lgjñzldmzg´ñldf";

	$statement=Tool::conectarBase()->prepare("SELECT * FROM entrada WHERE autor='".$_SESSION['nombre']."'");
		$statement->execute(array());
		$resultado=$statement->fetchAll();
		if($resultado){
			$statement=Tool::conectarBase()->prepare("SELECT COUNT(*) AS total FROM entrada WHERE autor='".$_SESSION['nombre']."'");
		$statement->execute(array());
		return $this->num_total_entradas=$statement->fetch(PDO::FETCH_OBJ)->total;
		}	
}


	public function getNumeroPaginas(){

		$this->getNumeroTotalEntradas();
		$this->getNumEntradasPagina();

		return $this->numero_paginas=ceil($this->num_total_entradas / $this->entradas_por_pagina);
	}

}


 ?>