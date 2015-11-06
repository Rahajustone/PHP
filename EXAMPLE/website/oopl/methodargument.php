#!/usr/bin/php
<?php 
		 
	class Car {
		public $color;
	}	 
	class Garage {
		public function paint(Car $car,$color){
			$car->color=$color;

		}
	}
	$car1 = new Car;
	$garage = new Garage;
	$car1->color = "blue";
	echo $car1->color;
	echo "\n";

	$garage-> paint( $car1, "green");
	echo $car1->color; // Displays “green”
	echo "\n";

	$cat = 'tom';
	$garage = new Garage;
	$garage-> paint( $cat, 'red' );

?>