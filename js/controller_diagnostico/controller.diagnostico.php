<?php 
include  "../../controllers/curl.controller.php";
session_start();


	if(!empty($_POST)){
		//metodo para registrar el diagnostico del paciente
		if($_POST['action'] == 'registroDiagnostico'){

			if(!empty($_SESSION['user']->id_user)){
				if (!empty($_POST['descripcion'])) {
					//datos del diagnostico
					$idPaciente = $_POST['id_paciente'];
					$descripcion = $_POST['descripcion'];
					$token = $_SESSION['user']->token;
					//conexion con la API para registrar el diagnostico
					$url = CurlController::api()."diagnostico?token=".$token."&select=*&tabla_estado=users";
						$method = "POST";
						$fields = array(
							"id_paciente" => $idPaciente,
							"descripcion_diagnostico" => $descripcion
						);
						$header = array();
						$diagnostico = CurlController::request($url, $method, $fields, $header)->results;

					echo $diagnostico;	
				}else{
					echo 'no_hay_datos';
				}
				
				
			}else{
				echo 'no_hay_id_nutricionista';
			}


		//metodo para traer los datos del diagnostico a editar
		}else if($_POST['action'] == 'infoPaciente'){

			
			if(!empty($_POST['diagnosticoId'])){
				
				$diagnosticoId = $_POST['diagnosticoId'];
				$token = $_SESSION['user']->token;

				$url = CurlController::api()."relations?rel=diagnostico,paciente,nutricionista,users&type=diagnostico,paciente,nutricionista,user&linkTo=id_diagnostico&equalTo=".$diagnosticoId."&orderBy=paciente.id_paciente&orderMode=DESC&tabla_estado=nutricionista&select=id_diagnostico,display_name,descripcion_diagnostico";
				$method = "GET";
				$fields = array();
				$header = array();
				$paciente = CurlController::request($url, $method, $fields, $header)->results[0];

				echo json_encode($paciente, JSON_UNESCAPED_UNICODE);
				//print_r($paciente);
				return;
			}else{

				echo 'no_hay_id_paciente';
			}
		//metodo para actualizar un diagnostico
		}else if(!empty($_POST['action'] == 'editarDiagnostico')){
			if(!empty($_POST['diagnosticoEdit'])){
				$diagnostico = $_POST['diagnosticoEdit'];
				$idDiagnostico = $_POST['idDiagnostico'];
				$token = $_SESSION['user']->token;

				$url = CurlController::api()."diagnostico?id=".$idDiagnostico."&nameId=id_diagnostico&token=".$token."&tabla_estado=diagnostico&select=*";	
				$method = "PUT";
				$fields ="descripcion_diagnostico=".$diagnostico;
				$header = array(
	 					"Content-Type"=> "application/x-www-form-urlencoded"
	 				);
				$diagnostico = CurlController::request($url, $method, $fields, $header)->results;

				
				
				//echo json_encode($paciente, JSON_UNESCAPED_UNICODE);
				print_r($diagnostico);
				exit;
			}else{
				echo 'campos_vacios';
			}
			
		}else{
			echo 'no_hay_accion';

		}

		

			
		
	}else{
		echo 'no_hay_datos';
	}
	
 ?>