<?php	
	class Fibonacci{

		public $long, $arreglo;

		public function Fibonacci($numeros){
			$this->long = count($numeros);
			$this->arreglo = $numeros;
		}

		public function original(){
			echo 'original: ';

			for($i = 0; $i < $this->long; $i++){
				echo $this->arreglo[$i].', ';
			}
		}
		public function serie(){
			echo '<br><br>Serie Fibonacci: ';
			for($i = 2; $i < $this->long; $i++){
				$this->arreglo[$i] = $this->arreglo[$i-2] + $this->arreglo[$i-1];
			}
			for($i = 0; $i < $this->long; $i++){
				echo $this->arreglo[$i].', ';
			}
		}
	}

	$num = array(1,3,2,5,6,4,3,4,5,1,5,2,1,2,3,4,1,2,7,8,6,4,6,7,8);

	$nuevo = new Fibonacci($num);
	$nuevo->original();
	$nuevo->serie();
?>