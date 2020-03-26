<?php

class User {
	private $name;
	private $age;

	public function __construct($name, $age) {
		$this->name = $name;
		$this->age = $age;
	}

	public function getName(){
		return $this->name;
	}

	public function setName($name) {
		$this->name = $name;
	}
	//Jeigu turime daug parametru galime naudoti __get ir __det magic methodus
	// __get MAGIC METHOD

	public function __get($property) {
		if(property_exists($this, $property)) {
			return $this ->$property;
		}
	}

	// __set MAGIC METHOD
	public function __set($property, $value) {
		if(property_exists($this, $property)) {
			$this->$property =$value;
		}
	return $this;	
	}	
}

$user1 = new User('Andrius',35);//uzsetinam, jei nenaudojame metodo set klaseje

echo $user1->getName(); //gauname Andrius bei tik naudojame get ne metoda

echo '<br>';

$user2 = new User('Petras', 48);
echo $user2->setName('Dainius');
echo $user2->getname ();//gausime Dainiu nes uzsetinom

echo '<br>';

$user3 = new User('Rimas', 42);
echo $user3->__get('age'); //gausime gausime 42, nes kuriant objekta uzsetinom 42

echo '<br>';
$user4 = new User('Benas', 12);
$user4->__set('age', 59); //taip galime uzsetinti ir nename ir abu parametrus kartu
echo $user4->__get('age'); //gausime 59




