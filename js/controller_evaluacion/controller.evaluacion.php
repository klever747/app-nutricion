<?php 
include  "../../controllers/curl.controller.php";
session_start();

if(!empty($_POST)){

	//metodo para traer los datos para el evento de menu
	if($_POST['action'] =='infoBicipital'){
			

			$id = $_POST['paciente'];
			$fechainicio = $_POST['fechainicio'];
            $fechafin = $_POST['fechafin'];
				
			
			
			$url = CurlController::api()."relations?rel=somatotipo,antropometrico_paciente,encuesta_abcd&type=somatotipo,antropometrico_paciente,encuesta_abcd&orderBy=antropometrico_paciente.date_create&orderMode=ASC&linkTo=id_paciente&equalTo=".$id."&tabla_estado=encuesta_abcd&select=*&fecha_ini=".$fechainicio."&fecha_fin=".$fechafin;		
			$method = "GET";
			$fields = array();
			$header = array();
			$datos = CurlController::request($url, $method, $fields, $header)->results;
			
			echo json_encode($datos, JSON_UNESCAPED_UNICODE);
			//print_r($datos);
			return;
		
	}

	//metodo para traer los datos del plan nutricional
	if($_POST['action'] == 'info_bioquimico'){
			$id = $_POST['paciente'];
			$fechainicio = $_POST['fechainicio'];
            $fechafin = $_POST['fechafin'];
			$url = CurlController::api()."relations?rel=bioquimico_paciente,encuesta_abcd&type=bioquimico_paciente,encuesta_abcd&orderBy=bioquimico_paciente.date_create&orderMode=ASC&linkTo=id_paciente&equalTo=".$id."&tabla_estado=encuesta_abcd&select=*&fecha_ini=".$fechainicio."&fecha_fin=".$fechafin;	
				
			$method = "GET";
			$fields = array();
			$header = array();
			$datos = CurlController::request($url, $method, $fields, $header)->results;
			
			echo json_encode($datos, JSON_UNESCAPED_UNICODE);
			
	}

	//metodo para traer datos del evento
	if($_POST['action'] == 'info_evento'){
		$id = $_POST['id_paciente'];
		$url = CurlController::api()."relations?rel=eventos_menu_comida,menu_comida,nutri_paciente_menu,paciente,nutricionista&type=eventos_menu_comida,menu_comida,nutri_paciente_menu,paciente,nutricionista&linkTo=id_paciente&equalTo=".$id."&orderBy=nombre_paciente&orderMode=DESC&tabla_estado=paciente,nutricionista,menu_comida&select=title,color,text_color,start,end";	
				
			$method = "GET";
			$fields = array();
			$header = array();
			$datos = CurlController::request($url, $method, $fields, $header)->results;
			
			echo json_encode($datos);
	}

	/*=============================================
	Metodo para  Traer los datos del paciente para registrar un menu nutricional
	=============================================*/
	if($_POST['action'] =='infoPaciente'){

			if(!empty($_POST['pacienteId'])){

				$id_paciente = $_POST['pacienteId'];
				

				

			$url = CurlController::api()."relations?rel=users,nutricionista,paciente&type=user,nutricionista,paciente&linkTo=id_paciente&equalTo=".$id_paciente."&orderBy=id_paciente&orderMode=DESC&tabla_estado=nutricionista&select=display_name,id_paciente,paciente.id_nutricionista";
			

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
}else{
 	echo 'valores_vacios';
}
?>