<?php 
include  "../../controllers/curl.controller.php";
include "../../controllers/template.controller.php";
session_start();

	if(!empty($_POST)){

		if($_POST['action'] == 'actualizarNutricionista'){
			
			if(empty($_POST['nombres']) || empty($_POST['apellidos']) || empty($_POST['movil']) || empty($_POST['direccion']) || empty($_POST['sexo'])){

				echo 'error_campos_vacios';

			}else{
				

				$nombres = TemplateController::capitalize(strtolower($_POST['nombres']));
				$apellidos = TemplateController::capitalize(strtolower($_POST['apellidos']));
				$movil = $_POST['movil'];
				$direccion = $_POST['direccion'];
				$sexo = $_POST['sexo'];
				$token = $_SESSION['user']->token;
				//datos para actualizar la foto
				$idN = $_POST['idN'];
				

					//conexion con la API para actualizar al nutricionista 
					$url = CurlController::api()."users?id=".$idN."&nameId=id_user&token=".$token."&tabla_estado=users&select=*";
					$method = "PUT";
					$fields = "nombre_usuario=".$nombres."&apellido_user=".$apellidos."&telefono_user=".$movil."&direccion_user=".$direccion."&id_genero=".$sexo;
					$header = array();
					$paciente = CurlController::request($url, $method, $fields, $header)->results;

				
				echo $paciente;
				return;
				
			}
		}
	}
 ?>