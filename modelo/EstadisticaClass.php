<?php class Estadistica{

private $usuario; 
	private $pass;
	private $perfil="administrador";

	private $numeroHombres;




public function numeroUsuarios(){


	$statement=Tool::conectarBase()->query("SELECT COUNT(nombre) FROM persona WHERE perfil='usuario'");
	return $statement->fetch();
	//echo "dsjfho";

}

public function numeroHombres(){


	$statement=Tool::conectarBase()->query("SELECT COUNT(nombre) FROM persona WHERE perfil='usuario' AND sexo='hombre'");
	return $statement->fetch();

}

public function numeroMujeres(){
	$statement=Tool::conectarBase()->query("SELECT COUNT(nombre) FROM persona WHERE perfil='usuario' AND sexo='mujer'");
	return $statement->fetch();	
}

public function numeroTramoEdad1(){

	$statement=Tool::conectarBase()->query("SELECT COUNT(nombre) FROM persona WHERE TIMESTAMPDIFF(YEAR,fecha_nacimiento,CURDATE())<18 AND perfil='usuario';");
	return $statement->fetch();

}

public function numeroTramoEdad2(){
	$statement=Tool::conectarBase()->query("SELECT COUNT(nombre) FROM persona WHERE TIMESTAMPDIFF(YEAR,fecha_nacimiento,CURDATE())>=18 AND TIMESTAMPDIFF(YEAR,fecha_nacimiento,CURDATE())<30 AND perfil='usuario';");
	return $statement->fetch();	
}

public function numeroTramoEdad3(){

	$statement=Tool::conectarBase()->query("SELECT COUNT(nombre) FROM persona WHERE TIMESTAMPDIFF(YEAR,fecha_nacimiento,CURDATE())>=30 AND TIMESTAMPDIFF(YEAR,fecha_nacimiento,CURDATE())<50 AND perfil='usuario';");
	return $statement->fetch();
	
}

public function numeroTramoEdad4(){


	$statement=Tool::conectarBase()->query("SELECT COUNT(nombre) FROM persona WHERE TIMESTAMPDIFF(YEAR,fecha_nacimiento,CURDATE())>=50 AND TIMESTAMPDIFF(YEAR,fecha_nacimiento,CURDATE())<120 AND perfil='usuario';");
	return $statement->fetch();
}


public function calcularPorcentaje($num, $numTotal){
	return ($num*100)/$numTotal;
}





public function setPerfil(){




	$statement=Tool::conectarBase()->prepare("SELECT perfil FROM persona WHERE nombre=:nombre AND pass=:pass");
	$statement->execute(array(':nombre'=>$this->usuario, ':pass'=>$this->pass));
	$resultados=$statement->fetch(PDO::FETCH_ASSOC);

	print_r($resultados);

	if (!empty($resultados)){

		if($resultados['perfil']=='usuario'){

		echo "sjfñojd";
	}else if ($resultados['perfil']=='administrador'){
		echo "adminidfmñstrador";

		header('Location:administracion.php');
	}

	}else{

		echo "error";
	}



}

public function set_usuario($usuario){

	$this->usuario=$usuario;
}

public function set_pass($pass){
	$this->pass=$pass;
}

	
} ?>