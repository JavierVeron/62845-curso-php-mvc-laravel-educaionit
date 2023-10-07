<?php

interface vehiculo{
	function getNombre();
	//function getMarca();
}

class Avion implements vehiculo
{
	public function getNombre(){
		return 'Soy un avion';
	}

	/* public function getMarca(){
		return 'Marca: AirJet';
	} */
}

class Automovil implements vehiculo
{
	public function getNombre(){
		return 'Soy un automovil';
	}

	public function getMarca(){
		return 'Marca: Audi';
	}
}

class VehiculoFactory
{
    public static function create($tipodevehiculo)
    {
		switch($tipodevehiculo){
			case "automovil":
			return new Automovil();break;
			case "avion": 
			return new Avion();break;
		}
    }
}

$auto = VehiculoFactory::create("automovil");
$avion = VehiculoFactory::create("avion");

echo $auto->getNombre() ."<br>";
echo $auto->getMarca();
echo '<br>';
echo $avion->getNombre();
