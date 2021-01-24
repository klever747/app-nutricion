<?php 

include  "../../controllers/curl.controller.php";
include "../../controllers/template.controller.php";
session_start();

if(!empty($_POST)){
	
	/*=============================================
	Metodo para registrar un paciente
	=============================================*/
	if($_POST['action'] =='registroPaciente'){
		
		if(!empty($_SESSION['user']->id_user)){

			//extraer datos del paciente
			if(!empty($_POST['cedula']) && !empty($_POST['nombres']) && !empty($_POST['apellidos']) && !empty($_POST['movil']) && !empty($_POST['direccion']) && !empty($_POST['sexo']) && !empty($_POST['edad']) && !empty($_POST['email']) && !empty($_POST['usuario']) && !empty($_POST['password']) ){
				
				//Extraer el id del nutricionista
				$url = CurlController::api()."nutricionista?linkTo=id_user&equalTo=".$_SESSION["user"]->id_user."&tabla_estado=nutricionista&select=id_nutricionista";
				$method = "GET";
				$fields = array();
				$header = array();
				$pacientes = CurlController::request($url, $method, $fields, $header)->results;
				

				$id_nutricionista = $pacientes[0]->id_nutricionista;
				$cedula = $_POST['cedula'];
				$nombre = $_POST['nombres'];
				$apellido = $_POST['apellidos'];
				$email = $_POST['email'];
				$usuario = $_POST['usuario'];
				$genero = $_POST['sexo'];
				$password = $_POST['password'];
				$ciudad = $_POST['ciudad'];
				$telefono = $_POST['movil'];
				$direccion = $_POST['direccion'];
				$profesion = $_POST['profesion'];
				$edad = $_POST['edad'];
				
				//crear variables del dsplay name y user
				$display_name = TemplateController::capitalize(strtolower($nombre))." ".TemplateController::capitalize(strtolower($apellido));
				$nombre_user = strtolower(explode("@", $email)[0]);

				$url = CurlController::api()."users?register_paciente=true";
				$method = "POST";
				$fields = array(
 					
 					"nombre_user" => $nombre,
 					"edad_user" => $edad,
 					"ci_user" => $cedula,
 					"nombre_usuario" => $nombre,
 					"apellido_user" => $apellido,
 					"image_user" => "nutricionista.jpg",	
 					"ciudad_user" => $ciudad,
 					"telefono_user" => $telefono,
 					"direccion_user" => $direccion,
 					"password_user" => $password,
 					"id_rol" => 2 ,
 					"id_genero" => $genero,
 					"email_user" => $email,
 					"id_nutricionista" => $id_nutricionista ,
 					"method_user" => "direct",	
 					"verificar_user" => 1,
 					"display_name" => $display_name,
 					"date_create_user" => date("Y-m-d"),
 					
 					
 				);
				$header = array(
 					"Content-Type"=> "application/x-www-form-urlencoded"
 				);

 				$register = CurlController::request($url, $method, $fields, $header);
 				echo $register->results;
 				return;
 				
			}else{
				echo 'error_campos_vacios';
			}

		}else{
			echo 'error_id';
		}
	}
	
		/*=============================================	
		Metodo para  Traer los datos del paciente a actualizar
		=============================================*/
	if($_POST['action'] =='infoPaciente'){

			if(!empty($_POST['pacienteId'])){

				$id_paciente = $_POST['pacienteId'];
				

				

			$url = CurlController::api()."relations?rel=users,genero&type=users,genero&linkTo=id_user&equalTo=".$id_paciente."&orderBy=id_user&orderMode=DESC&tabla_estado=users&select=*";
			

			$method = "GET";
			$fields = array();
			$header = array();
			$paciente = CurlController::request($url, $method, $fields, $header)->results[0];

				
				
				echo json_encode($paciente, JSON_UNESCAPED_UNICODE);
				
				
				
			}else{
				echo 'error no id';
				exit;
			}	
			
	}
	/*=============================================
		Metodo para actualizar los datos del paciente
	=============================================*/

	if($_POST['action'] == 'actualizarPaciente'){
		
		if(!empty($_POST['idP']) && !empty($_POST['nombres']) && !empty($_POST['apellidos']) && !empty($_POST['edad'])){
				
				$idP = $_POST['idP'];
				$cedula = $_POST['cedula'];
				$nombres = $_POST['nombres'];
				$apellidos = $_POST['apellidos'];
				$movil = $_POST['movil'];
				$direccion = $_POST['direccion'];
				$edad = $_POST['edad'];
				$genero = $_POST['sexo'];			
				$ciudad = $_POST['ciudad'];
				$token = $_SESSION['user']->token;


				$url = CurlController::api()."users?id=".$idP."&nameId=id_user&token=".$token."&tabla_estado=users&select=*";	
				$method = "PUT";
				$fields = "nombre_usuario=".$nombres."&apellido_user=".$apellidos."&telefono_user=".$movil."&direccion_user=".$direccion."&id_genero=".$genero."&ciudad_user=".$ciudad."&edad_user=".$edad;
				$header = array();
				$paciente = CurlController::request($url, $method, $fields, $header)->results;

				
				
				//echo json_encode($paciente, JSON_UNESCAPED_UNICODE);
				print_r($paciente);
				exit;
				
				
			}else{
				echo 'error no id';
				exit;
			}
			
	}
	/*=============================================
		Metodo para eliminar un paciente
	=============================================*/

	if($_POST['action'] == 'eliminarPaciente'){
		
		if(!empty($_POST['idPaciente'])){

				$idP = $_POST['idPaciente'];
				$token = $_SESSION['user']->token;
				
				$url = CurlController::api()."users?id=".$idP."&nameId=id_user&token=".$token."&tabla_estado=users&select=*";	
				$method = "PUT";
				$fields = "estado=0";
				$header = array();
				$paciente = CurlController::request($url, $method, $fields, $header)->results;

				
				
				//echo json_encode($paciente, JSON_UNESCAPED_UNICODE);
				print_r($paciente);
				exit;
				
				
			}else{
				echo 'error no id';
				exit;
			}	
	}
	
}


 ?>