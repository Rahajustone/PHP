<html>
<head></head>
<body>
	<h1>A simple car simulator php</h1>
	<?php
		class Car {
			public $color;
			public $manufactor;
			public $model;
			public $_speed;
			public function hiz(){
				if($this->_speed>=100)
					return false;
				$this->_speed+=10;
				return true;

			}
			public function brake() {
			if ( $this-> _speed < = 0 ) return false;
				$this-> _speed -= 10;
			return true;
			}
			public function getSpeed() {
			return $this-> _speed;
		}
	}
		
	$myCar = new Car();
	$myCar->color = "red";
	$myCar->manufacturer = "Volkswagen";
	$myCar->model = "Beetle";
	echo " <p> I am driving a" .$myCar->color , $myCar->manufacturer ,$myCar->model} "</p> ";
	echo " < p > Stepping on the gas... < br / > ";
	while ( $myCar->accelerate() ) {
	echo "Current speed: " . $myCar->getSpeed() . " mph < br / > ";
		}

		echo " < /p > < p > Top speed! Slowing down... < br / > ";
	while ( $myCar->brake() ) {
	echo "Current speed: " . $myCar->getSpeed() . " mph < br / > ";
	}
	echo " </p> <p> Stopped! </p> ";


	?>

</body>
</html>