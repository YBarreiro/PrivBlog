<?php  

class ArchivoEntradas extends Paginacion{ 


//Obtiene anyos en los que hay entradas

	public function getAnyos(){ 

		$statement=Tool::conectarBase()->query("SELECT DISTINCT YEAR(fecha) FROM entrada WHERE autor='". $_SESSION['nombre']."' ORDER BY YEAR(fecha) DESC");
		return $statement->fetchAll();
	}

	//Obtiene número de entradas de cada anyo

	public function getEntradasAnyos($agno){
		$statement=Tool::conectarBase()->query("SELECT COUNT(titulo) AS numero FROM entrada WHERE autor='". $_SESSION['nombre']."' AND YEAR(fecha)=".$agno."");
		 return $statement->fetch(PDO::FETCH_OBJ)->numero; 
	}


	//Obtiene meses en los que hay entradas de cada anyo

	public function getMesesAnyo($agno){
		 $statement=Tool::conectarBase()->query("SELECT DISTINCT MONTH(fecha) FROM entrada WHERE autor='".$_SESSION['nombre']."' AND YEAR(fecha)='".$agno."' ORDER BY MONTH(fecha)");
		 return $statement->fetchAll();
	}


	//Cambia formato numérico del mes a formato texto

	public function textoMeses($mes){
		$mes_texto=['enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre'];

		$mes= $mes -1;

		$mes_texto=$mes_texto[$mes];

		return $mes_texto;
	}


	public function getNumeroEntradasMes($agno, $mes){
		$statement=Tool::conectarBase()->query("SELECT COUNT(titulo) AS numero FROM entrada WHERE autor='". $_SESSION['nombre']."' AND YEAR(fecha)='".$agno."' AND MONTH(fecha)='".$mes."'");
		 return $statement->fetch(PDO::FETCH_OBJ)->numero; 
	}

	public function getNumeroPaginas(){

		if(isset($_GET['mes'])){
			$this->num_total_entradas=$this->getNumeroEntradasMes($_GET['ano'], $_GET['mes']);
		}else{
			$this->num_total_entradas=$this->getEntradasAnyos($_GET['ano']);
		}

		return $this->numero_paginas=ceil($this->num_total_entradas / $this->entradas_por_pagina);

		//echo $this->num_total_entradas;
		
	}


public function getEntradasFecha($inicio, $entradas_por_pagina){
	if (isset($_GET['ano'])&& (!isset($_GET['mes']))) {
	return $entradas=$this->getentradasanyo($_GET['ano'], $inicio, $entradas_por_pagina);
	}
	elseif (isset($_GET['ano'])&& (isset($_GET['mes']))) {
	return $entradas=$this->getEntradasMes($_GET['ano'], $_GET['mes'], $inicio, $entradas_por_pagina);
	}	
}


//Obtiene las entradas de cada anyo

	public function getEntradasAnyo($agno, $inicio, $entradas_por_pagina){
		$statement=Tool::conectarBase()->query("SELECT * FROM entrada WHERE autor='".$_SESSION['nombre']."' AND YEAR(fecha)='".$agno."' ORDER BY fecha DESC LIMIT {$inicio}, {$entradas_por_pagina}");
		return $statement->fetchAll();  

	}

	
//Obtiene las entradas de cada mes 

	public function getEntradasMes($agno, $mes, $inicio, $entradas_por_pagina){

		$statement=Tool::conectarBase()->query("SELECT * FROM entrada WHERE autor='".$_SESSION['nombre']. "' AND YEAR(fecha)='".$agno."' AND MONTH(fecha)='".$mes."' ORDER BY fecha DESC LIMIT {$inicio}, {$entradas_por_pagina}");
		return $statement->fetchAll();
	}


//Texto de resultados GETTERS

	public function getTextoResultados(){
		if (isset($_GET['ano'])&&!isset($_GET['mes'])) {
			return $resultados= 'Entradas de: '.$_GET['ano'];
		}
		if(isset ($_GET['ano'])&&isset($_GET['mes'])){
			return $resultados= 'Entradas de: '.$this->textoMeses($_GET['mes']).' del '.$_GET['ano'];
		}
	}
}

