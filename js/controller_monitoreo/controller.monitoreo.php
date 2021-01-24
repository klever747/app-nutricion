<?php 
include  "../../controllers/curl.controller.php";
session_start();

if (!empty($_POST)) {

	//metodo para registrar el monitoreo del paciente
		if($_POST['action'] == 'registroMonitoreo'){

			if(!empty($_SESSION['user']->id_user) && !empty($_POST['descripcion'])){

				//datos del monitoreo
				$idPaciente = $_POST['id_paciente'];
				$descripcion = $_POST['descripcion'];
				$token = $_SESSION['user']->token;
				//conexion con la API para registrar el diagnostico
				$url = CurlController::api()."monitoreo?token=".$token."&select=*&tabla_estado=users";
				$method = "POST";
				$fields = "descripcion_monitoreo=".$descripcion."&id_paciente=".$idPaciente;
				$header = array();
				$diagnostico = CurlController::request($url, $method, $fields, $header)->results;
				
				echo $diagnostico;
				
			}else{
				echo 'no_hay_id_nutricionista';
			}


		//metodo para traer los datos del diagnostico a editar
		}else if($_POST['action'] == 'infoPaciente'){

			
			if(!empty($_POST['monitoreoId'])){
				
				$monitoreoId = $_POST['monitoreoId'];
				$token = $_SESSION['user']->token;

				$url = CurlController::api()."relations?rel=monitoreo,paciente,nutricionista,users&type=monitoreo,paciente,nutricionista,users&linkTo=id_monitoreo&equalTo=".$monitoreoId."&orderBy=paciente.id_paciente&orderMode=DESC&tabla_estado=nutricionista&select=id_monitoreo,display_name,descripcion_monitoreo";
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
		}else if($_POST['action'] == 'actualizarMonitoreo'){

			if(!empty($_SESSION['user']->id_user) && !empty($_POST['id_monitoreo'])){

				 $id_monitoreo = $_POST['id_monitoreo']; 
				 
				 $descripcion_monitoreo = $_POST['descripcion_monitoreo'];

				 $token = $_SESSION["user"]->token;
				$url = CurlController::api()."monitoreo?id=".$id_monitoreo."&nameId=id_monitoreo&token=".$token."&tabla_estado=monitoreo&select=*";	
				$method = "PUT";
				$fields = "descripcion_monitoreo=".$descripcion_monitoreo;

				$header = array();
				$monitoreo = CurlController::request($url, $method, $fields, $header)->results;
				
				//echo json_encode($paciente, JSON_UNESCAPED_UNICODE);
				print_r($monitoreo);
				exit;
			}else{
				echo "No_user_and_id_monitoreo";
				return;
			}
		}
}else{
	echo 'no_hay_datos';
}

 ?>