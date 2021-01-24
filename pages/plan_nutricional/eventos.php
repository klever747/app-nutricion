<?php 
include  "../../controllers/curl.controller.php";
session_start();

//$accion = (isset($_GET['accion']) && isset($_GET['id']))?$_GET['accion']:'leer';
$accion=(isset($_GET['accion']))?$_GET['accion']:'leer';

switch ($accion) {
	case 'agregar':
		//instruccion para agregar un nuevo menu y registrar un evento
		echo "Instruccion agregar";
		break;
	
	case 'eliminar':
		//instruccion para eliminar un evento
		if ($_SESSION["user"]->id_rol == 1) {
			if (isset($_POST['id'])) {
					
				$idE = $_POST['id'];
				$token = $_SESSION['user']->token;
					
					$url = CurlController::api()."eventos_menu_comida?select=*&nameId=id_evento&token=".$token."&id=".$idE."&tabla_estado=eventos_menu_comida";
					$method = "PUT";
					$fields = "estado=0";
					$header = array();
					$paciente = CurlController::request($url, $method, $fields, $header)->results;

					
					
					//echo json_encode($paciente, JSON_UNESCAPED_UNICODE);
					print_r($paciente);
					return;
			}
				
			break;
		}
	case 'modificar':
		//instruccion para modificar un evento
	if ($_SESSION["user"]->id_rol == 1) {
		if (isset($_POST['id'])) {

			$idE = $_POST['id'];
			$title = $_POST['title'];
			$descripcion = $_POST['descripcion'];
			$color = $_POST['color'];
			$text_color = $_POST['text_color'];
			$start = $_POST['start']." ".$horaIni = $_POST['hora_ini'];
			$end = $_POST['end']." ".$hora_fin = $_POST['hora_fin'];
			$hora_ini = $_POST['hora_ini'];
			$hora_fin = $_POST['hora_fin'];
			$token = $_SESSION['user']->token;
				
				$url = CurlController::api()."eventos_menu_comida?select=*&nameId=id_evento&token=".$token."&id=".$idE."&tabla_estado=eventos_menu_comida";
				$method = "PUT";
				$fields = "title=".$title."&descripcion=".$descripcion."&color=".$color."&text_color=".$text_color."&start=".$start."&end=".$end."&hora_ini=".$hora_ini ."&hora_fin=".$hora_fin;
				$header = array();
				$paciente = CurlController::request($url, $method, $fields, $header)->results;

				
				
				//echo json_encode($paciente, JSON_UNESCAPED_UNICODE);
				print_r($paciente);
				return;
		}
		break;
	}
		
	default:

		 
		 	$id = $_GET['id'];
			$url = CurlController::api()."relations?rel=eventos_menu_comida,menu_comida,nutri_paciente_menu,paciente,nutricionista&type=eventos_menu_comida,menu_comida,nutri_paciente_menu,paciente,nutricionista&linkTo=id_paciente&equalTo=".$id."&orderBy=id_paciente&orderMode=DESC&tabla_estado=nutricionista,menu_comida,eventos_menu_comida&select=title,id_evento,eventos_menu_comida.descripcion,hora_fin,eventos_menu_comida.start,eventos_menu_comida.end,hora_ini,color,imagen_menu,eventos_menu_comida.descripcion,menu_comida.preparacion,menu_comida.ingredientes";	
			
			
			$method = "GET";
			$fields = array();
			$header = array();
			$datos = CurlController::request($url, $method, $fields, $header)->results;
			echo json_encode($datos);

	break;
}
		
 ?>