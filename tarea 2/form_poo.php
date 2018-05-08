<?php 
	class Form{
		public $datos = array('name' => '',
							  'email' => '',
							  'website' => '',      // arreglo que guarda los atributos del registro
							  'comment' => '',
							  'gender' => '', );

		public $error = array('name' => '',
							  'email' => '',
							  'website' => '',      //arreglo que guarda los mensajes de error para cada registro
							  'comment' => '',
							  'gender' => '', );

		public function nuevoRegistro(){
			$this->atributo('name');
			$this->atributo('email');
			$this->atributo('website');         //en esta funcion se agregan los atributos con el nombre para el post
			$this->atributo('comment');
			$this->atributo('gender');
		}

		public function atributo($atr){
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				if (!empty($_POST[$atr])) {
			        $this->datos[$atr] = $this->test_input($_POST[$atr]);

			        switch ($atr) {
			        	case 'name':
			        		if (!preg_match("/^[a-zA-Z ]*$/",$this->datos[$atr]))$this->error[$atr] = "Only letters and white space allowed";
			        		break;
			        	case 'email':
			        		if (!filter_var($this->datos[$atr], FILTER_VALIDATE_EMAIL))$this->error[$atr] = "Invalid email format";
			        		break;
			        	case 'website':
			        		if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$this->datos[$atr]))$this->error[$atr] = "Invalid URL";
			        		break;
			        }
			    }
			    else{
			    	if($atr == 'name' || $atr == 'email' || $atr == 'gender'){
			    		$this->error[$atr] = $atr.' is required';
			    	}
			    }

			}
		}
		public function test_input($data) {
		    $data = trim($data);
		    $data = stripslashes($data);
		    $data = htmlspecialchars($data);
		    return $data;
		}

	}
?>