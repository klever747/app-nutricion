<?php 
include  "../../controllers/curl.controller.php";

session_start();


	
	if(!empty($_POST)){
		if(!empty($_POST['usuario']) || !empty($_POST['password'])){

			
			$user = $_POST['usuario'];
			$password = $_POST['password'];
			//$pacientes = array();
			$url = CurlController::api()."nutricionista?login=true&tabla_estado=nutricionista&select=*";
			$method = "POST";
			$fields = "email=".$user."&password=".$password;
			$header = array();
			$response = CurlController::request($url, $method, $fields, $header)->results;
			

			if($response != 'Wrong password' && $response != 'Wrong email'){

				$_SESSION['active'] = true;
	            $_SESSION['id_nutricionista'] = $response[0]->id_nutricionista;
	            $_SESSION['ci'] = $response[0]->ci;
	            $_SESSION['nombre_nutricionista'] = $response[0]->nombre_nutricionista;
	            $_SESSION['apellido_nutricionista'] = $response[0]->apellido_nutricionista;
	            $_SESSION['email'] = $response[0]->email;
	            $_SESSION['user_nutricionista'] = $response[0]->user_nutricionista;
	            $_SESSION['genero_nutricionista'] = $response[0]->genero_nutricionista;
	            
	            $_SESSION['image_nutricionista'] = $response[0]->image_nutricionista;
	            $_SESSION['token'] = $response[0]->token;
	            $_SESSION['token_exp'] = $response[0]->token_exp;
	            $_SESSION['telefono'] = $response[0]->telefono;
	            $_SESSION['direccion'] = $response[0]->direccion;

				echo json_encode($response, JSON_UNESCAPED_UNICODE);
				
			}else{
				/*
				echo $response;
				session_destroy();
				exit;
				*/
				$url = CurlController::api()."paciente?login=true&tabla_estado=nutricionista&select=*";
				$method = "POST";
				$fields = "email=".$user."&password=".$password;
				$header = array();
				$response = CurlController::request($url, $method, $fields, $header)->results;

				if($response != 'Wrong password' && $response != 'Wrong email'){

					$_SESSION['active'] = true;
		            $_SESSION['id_paciente'] = $response[0]->id_paciente;
		            $_SESSION['ci'] = $response[0]->ci;
		            $_SESSION['nombre_paciente'] = $response[0]->nombre_paciente;
		            $_SESSION['apellido_paciente'] = $response[0]->apellido_paciente;
		            $_SESSION['email'] = $response[0]->email;
		            $_SESSION['user_paciente'] = $response[0]->user_paciente;
		            $_SESSION['id_genero'] = $response[0]->id_genero;
		            
		            $_SESSION['image_paciente'] = $response[0]->image_paciente;
		            $_SESSION['token'] = $response[0]->token;
		            $_SESSION['token_exp'] = $response[0]->token_exp;
		            $_SESSION['ciudad_paciente'] = $response[0]->ciudad_paciente;
		            $_SESSION['telefono_paciente'] = $response[0]->telefono_paciente;
		            $_SESSION['direccion_paciente'] = $response[0]->direccion_paciente;

					$response = 'Paciente accedio';
					print_r($response);
					exit;
					//echo json_encode($response, JSON_UNESCAPED_UNICODE);

				}else{
					echo $response;
					session_destroy();
					exit;
				}

			}
	           
		}else{
			echo "error_fields_empty";
			
		}
		
	}else{
		echo "error campos vacios";
	}

 ?>