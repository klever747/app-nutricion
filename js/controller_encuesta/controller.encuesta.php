<?php 
include  "../../controllers/curl.controller.php";
session_start();
if(!empty($_POST)){

	//metodo para registrar el diagnostico del paciente
		if($_POST['action'] == 'registroEncuesta'){

			if(!empty($_SESSION['user']->id_user)){
				if(!empty($_POST["peso_paciente"]) && !empty($_POST["talla_paciente"]) && !empty($_POST["pliegue_bicipital"]) && !empty($_POST["pliegue_tricipital"]) && !empty($_POST["pliegue_subescapular"]) && !empty($_POST["pliegue_suprailiaco"]) && !empty($_POST["pliegue_supraespinal"]) && !empty($_POST["pliegue_abdominal"]) && !empty($_POST["pliegue_muslo"]) && !empty($_POST["pliegue_pantorrilla"]) && !empty($_POST["circ_cintura"]) && !empty($_POST["circ_cadera"]) && !empty($_POST["circ_brazo_relajado"]) && !empty($_POST["circ_brazo_contraido"]) && !empty($_POST["bicondilio_femur"]) && !empty($_POST["biepicondileo_humero"])){


						//datos de la encuesta ABCD
					$id_paciente = $_POST["id_paciente"];
					$estado_encuesta = $_POST["estado_encuesta"];
					$peso_paciente = $_POST["peso_paciente"];
					$talla_paciente = $_POST["talla_paciente"];
					$pliegue_bicipital = $_POST["pliegue_bicipital"];
					$pliegue_tricipital = $_POST["pliegue_tricipital"];
					$pliegue_subescapular = $_POST["pliegue_subescapular"];
					$pliegue_suprailiaco = $_POST["pliegue_suprailiaco"];
					$pliegue_supraespinal = $_POST["pliegue_supraespinal"];
					$pliegue_abdominal = $_POST["pliegue_abdominal"];
					$pliegue_muslo =$_POST["pliegue_muslo"];
					$pliegue_pantorrilla = $_POST["pliegue_pantorrilla"];	
					$circ_cintura =$_POST["circ_cintura"];
					$circ_cadera = $_POST["circ_cadera"];
					$circ_pantorrilla = $_POST["circ_pantorrilla"];
					$circ_brazo_relajado = $_POST["circ_brazo_relajado"];
					$circ_brazo_contraido = $_POST["circ_brazo_contraido"];
					$bicondilio_femur =$_POST["bicondilio_femur"];
					$biepicondileo_humero = $_POST["biepicondileo_humero"];
					//datos quimicos
					$acido_urico =$_POST["acido_urico"];
					$bilirubina_directa = $_POST["bilirubina_directa"];
					$colesterol_total =$_POST["colesterol_total"]; 
					$colesterol_hdl =$_POST["colesterol_hdl"];
					$colesterol_ldl = $_POST["colesterol_ldl"];
					$trigliceridos = $_POST["trigliceridos"];
					$glucosa_ayunas = $_POST["glucosa_ayunas"];
					$glucosa_postprandial = $_POST["glucosa_postprandial"]; 
					$creatinina = $_POST["creatinina"];
					$tgo_paciente = $_POST["tgo_paciente"];
					$tgp_paciente = $_POST["tgp_paciente"];
					$eritocitos = $_POST["eritocitos"];
					$conteo_plaquetario = $_POST["conteo_plaquetario"];
					$hemoglobina = $_POST["hemoglobina"];
					$hematocritos = $_POST["hematocritos"];
					$leucocitos = $_POST["leucocitos"];
					$linfocitos = $_POST["linfocitos"];
					$netrofilos_segmentados = $_POST["netrofilos_segmentados"]; 
					$neutrofilos_no_segmentados = $_POST["neutrofilos_no_segmentados"];
					$eosinofilosgm = $_POST["eosinofilosgm"];
					$basofilos = $_POST["basofilos"];
					$monocitos = $_POST["monocitos"];
					$descripcion_paciente =$_POST["descripcion_paciente"];
					$descripcion_dietetica_paciente = $_POST["descripcion_dietetica_paciente"];
					$token = $_SESSION["user"]->token;

					$estado = "";
					if ($estado_encuesta == 1) {
						$estado = "atendido";
					}else if($estado_encuesta == 2){
						$estado = "no_atendido";
					}
				//conexion con la API para registrar el diagnostico

					$url = CurlController::api()."ingresar_encuesta?token=".$token."&procedure=true&tabla_estado=users&select=*";
					$method = "POST";
					$fields = array(
 					"id_pacient" => $id_paciente,
 					"estado_encuesta" => $estado,
 					"peso_paciente" => $peso_paciente,
 					"talla_paciente" => $talla_paciente,
 					"pliegue_bicipital" => $pliegue_bicipital,
 					"pliegue_tricipital" => $pliegue_tricipital,
 					"pliegue_subescapular" => $pliegue_subescapular,
 					"pliegue_suprailiaco" => $pliegue_suprailiaco,
 					"pliegue_supraespinal" =>$pliegue_supraespinal,
 					"pliegue_abdominal" => $pliegue_abdominal,
 					"pliegue_muslo" => $pliegue_muslo,
 					"pliegue_pantorrilla" => $pliegue_pantorrilla,
 					"circ_cintura" => $circ_cintura,
 					"circ_cadera" => $circ_cadera,
 					"circ_pantorrilla" => $circ_pantorrilla,
 					"circ_brazo_relajado" => $circ_brazo_relajado,
 					"circ_brazo_contraido" => $circ_brazo_contraido,
 					"biepicondileo_femur" => $bicondilio_femur,
 					"biepicondileo_humero" => $biepicondileo_humero,
 					"acido_urico" => $acido_urico,
 					"bilirubina_directa" => $bilirubina_directa,
 					"colesterol_total" => $colesterol_total,
 					"colesterol_hdl" => $colesterol_hdl,
 					"colesterol_ldl" => $colesterol_ldl,
 					"trigliceridos" => $trigliceridos,
 					"glucosa_ayunas" => $glucosa_ayunas,
 					"glucosa_postprandial" => $glucosa_postprandial,
 					"creatinina" => $creatinina,
 					"tgo_paciente" => $tgo_paciente,
 					"tgp_paciente" => $tgp_paciente,
 					"eritocitos" => $eritocitos,
 					"conteo_plaquetario" => $conteo_plaquetario,
 					"hemoglobina" => $hemoglobina,
 					"hematocritos" => $hematocritos,
 					"leucocitos" => $leucocitos,
 					"linfocitos" => $linfocitos,
 					"netrofilos_segmentados" => $netrofilos_segmentados,
 					"neutrofilos_no_segmentados" => $neutrofilos_no_segmentados,
 					"eosinofilosgm" => $eosinofilosgm,
 					"basofilos" => $basofilos,
 					"monocitos" => $monocitos,
 					"descripcion_paciente" => $descripcion_paciente,
 					"descripcion_dietetica_paciente" => $descripcion_dietetica_paciente
 					);
 					
					$header = array();
					$encuesta = CurlController::request($url, $method, $fields, $header)->results;

					echo $encuesta;
				}else{
					echo 'campos_vacios';
				}
				
				
			}else{
				echo 'no_hay_id_nutricionista';
			}
		}

	//metodo para traer los datos de la encuesta de antropometria
		if($_POST['action'] == 'infoAntropometria'){

			if(!empty($_SESSION['user']->id_user) && !empty($_POST['encuestaId'])){

				$id_encuesta = $_POST['encuestaId'];
				

				

				$url = CurlController::api()."relations?rel=encuesta_abcd,paciente,nutricionista,users,antropometrico_paciente&type=encuesta_abcd,paciente,nutricionista,user,antropometrico_paciente&orderBy=nutricionista.id_user&orderMode=DESC&linkTo=id_encuesta&equalTo=".$id_encuesta."&tabla_estado=users&select=display_name,encuesta_abcd.id_paciente,encuesta_abcd.id_encuesta,estado_encuesta,peso_paciente,talla_paciente,pliegue_bicipital,pliegue_tricipital,pliegue_subescapular,pliegue_suprailiaco,pliegue_supraespinal,pliegue_abdominal,pliegue_muslo,pliegue_pantorrilla,circ_cintura,circ_cadera,circ_pantorrilla,circ_brazo_relajado,circ_brazo_contraido,biepicondileo_femur,biepicondileo_humero";
				

				$method = "GET";
				$fields = array();
				$header = array();
				$paciente = CurlController::request($url, $method, $fields, $header)->results[0];

				
				
				echo json_encode($paciente, JSON_UNESCAPED_UNICODE);
			}else{
				echo "No_user_and_id_encuesta";
				return;
			}
		}
	//metodo para traer los datos de la encuesta de Bioquimica
		if($_POST['action'] == 'infoBioquimico'){

			if(!empty($_SESSION['user']->id_user) && !empty($_POST['idEncuestaBio'])){

				$id_encuestaBio = $_POST['idEncuestaBio'];
				

				

				$url = CurlController::api()."relations?rel=encuesta_abcd,paciente,nutricionista,users,bioquimico_paciente&type=encuesta_abcd,paciente,nutricionista,user,bioquimico_paciente&orderBy=nutricionista.id_user&orderMode=DESC&linkTo=id_encuesta&equalTo=".$id_encuestaBio."&tabla_estado=users&select=encuesta_abcd.id_paciente,encuesta_abcd.id_encuesta,display_name,acido_urico,bilirubina_directa,colesterol_total,colesterol_hdl,colesterol_ldl,trigliceridos,glucosa_ayunas,glucosa_postprandial,creatinina,tgo_paciente,tgp_paciente,eritocitos,conteo_plaquetario,hemoglobina,hematocritos,leucocitos,linfocitos,netrofilos_segmentados,eosinofilosgm,basofilos,monocitos,neutrofilos_no_segmentados";
				

				$method = "GET";
				$fields = array();
				$header = array();
				$paciente = CurlController::request($url, $method, $fields, $header)->results[0];

				
				
				echo json_encode($paciente, JSON_UNESCAPED_UNICODE);
			}else{
				echo "No_user_and_id_encuesta";
				return;
			}
		}
	//metodo para traer los datos de la encuesta de Clinico
		if($_POST['action'] == 'infoClinico'){

			if(!empty($_SESSION['user']->id_user) && !empty($_POST['idEncuestaCli'])){

				$id_encuestaCli = $_POST['idEncuestaCli'];	

				$url = CurlController::api()."relations?rel=encuesta_abcd,paciente,nutricionista,users,clinico_paciente&type=encuesta_abcd,paciente,nutricionista,user,clinico_paciente&orderBy=nutricionista.id_user&orderMode=DESC&linkTo=id_encuesta&equalTo=".$id_encuestaCli."&tabla_estado=users&select=encuesta_abcd.id_encuesta,display_name,descripcion_paciente";
				

				$method = "GET";
				$fields = array();
				$header = array();
				$paciente = CurlController::request($url, $method, $fields, $header)->results[0];

				
				
				echo json_encode($paciente, JSON_UNESCAPED_UNICODE);
			}else{
				echo "No_user_and_id_encuesta";
				return;
			}
		}
	//metodo para traer los datos de la encuesta Dietetica
		if($_POST['action'] == 'infoDietetico'){

			if(!empty($_SESSION['user']->id_user) && !empty($_POST['idEncuestaDiet'])){

				$id_encuestaDiet = $_POST['idEncuestaDiet'];	

				$url = CurlController::api()."relations?rel=encuesta_abcd,paciente,nutricionista,users,dietetico_paciente&type=encuesta_abcd,paciente,nutricionista,user,dietetico_paciente&orderBy=nutricionista.id_user&orderMode=DESC&linkTo=id_encuesta&equalTo=".$id_encuestaDiet."&tabla_estado=users&select=encuesta_abcd.id_encuesta,display_name,descripcion_dietetica_paciente";
				

				$method = "GET";
				$fields = array();
				$header = array();
				$paciente = CurlController::request($url, $method, $fields, $header)->results[0];

				
				
				echo json_encode($paciente, JSON_UNESCAPED_UNICODE);
			}else{
				echo "No_user_and_id_encuesta";
				return;
			}
		}
	//metodo para actualizar los datos antropometricos
		if($_POST['action'] == 'actualizarAntropometrico'){
			if(!empty($_SESSION['user']->id_user) && !empty($_POST['id_encuesta'])){

				 
				 $id_paciente = $_POST['id_paciente'];
				 $id_encuesta = $_POST['id_encuesta']; 
				 
				 $peso_paciente = $_POST['peso_paciente'];
				 $talla_paciente = $_POST['talla_paciente'];
				 $pliegue_bicipital = $_POST['pliegue_bicipital']; 
				 $pliegue_tricipital = $_POST['pliegue_tricipital']; 
				 $pliegue_subescapular = $_POST['pliegue_subescapular'];
				 $pliegue_suprailiaco = $_POST['pliegue_suprailiaco']; 
				 $pliegue_supraespinal = $_POST['pliegue_supraespinal']; 
				 $pliegue_abdominal = $_POST['pliegue_abdominal']; 
				 $pliegue_muslo = $_POST['pliegue_muslo'];
				 $pliegue_pantorrilla = $_POST['pliegue_pantorrilla']; 
				 $circ_cintura = $_POST['circ_cintura']; 
				 $circ_cadera = $_POST['circ_cadera'];
				 $circ_pantorrilla = $_POST['circ_pantorrilla'];
				 $circ_brazo_relajado = $_POST['circ_brazo_relajado']; 
				 $circ_brazo_contraido = $_POST['circ_brazo_contraido']; 
				 $bicondilio_femur = $_POST['bicondilio_femur']; 
				 $biepicondileo_humero = $_POST['biepicondileo_humero'];

				 $token = $_SESSION["user"]->token;
				$url = CurlController::api()."updateAntropometrico?token=".$token."&procedure=true&tabla_estado=users&select=*";
				

				$method = "POST";
				$fields = array(
					
 					"id_paciente" => $id_paciente,
 					"id_encuesta" => $id_encuesta,
 					"peso_paciente_" => $peso_paciente,
 					"talla_paciente" => $talla_paciente ,
 					"pliegue_bicipital" =>$pliegue_bicipital ,
 					"pliegue_tricipital" =>$pliegue_tricipital ,
 					"pliegue_subescapular" =>$pliegue_subescapular ,
 					"pliegue_suprailiaco" =>$pliegue_suprailiaco ,
 					"pliegue_supraespinal" =>$pliegue_supraespinal,
 					"pliegue_abdominal" =>$pliegue_abdominal ,
 					"pliegue_muslo" => $pliegue_muslo,
 					"pliegue_pantorrilla" => $pliegue_pantorrilla,
 					"circ_cintura" => $circ_cintura ,
 					"circ_cadera" => $circ_cadera,
 					"circ_pantorrilla" => $circ_pantorrilla,
 					"circ_brazo_relajado" => $circ_brazo_relajado, 
 					"circ_brazo_contraido" => $circ_brazo_contraido, 
 					"biepicondileo_femur" => $bicondilio_femur,
 					"biepicondileo_humero" => $biepicondileo_humero 
 					
 				);
				$header = array();
				$respAntro = CurlController::request($url, $method, $fields, $header)->results;

				print_r($respAntro);
				return;
			}else{
				echo "No_user_and_id_encuesta";
				return;
			}
		}
	//metodo para actualizar los datos Bioquimicos
		if($_POST['action'] == 'actualizarBioquimico'){
			if(!empty($_SESSION['user']->id_user) && !empty($_POST['id_encuesta'])){

				 
				 $id_paciente = $_POST['id_paciente'];
				 $id_encuesta = $_POST['id_encuesta']; 
				 
				$acido_urico =$_POST["acido_urico"];
				$bilirubina_directa = $_POST["bilirubina_directa"];
				$colesterol_total =$_POST["colesterol_total"]; 
				$colesterol_hdl =$_POST["colesterol_hdl"];
				$colesterol_ldl = $_POST["colesterol_ldl"];
				$trigliceridos = $_POST["trigliceridos"];
				$glucosa_ayunas = $_POST["glucosa_ayunas"];
				$glucosa_postprandial = $_POST["glucosa_postprandial"]; 
				$creatinina = $_POST["creatinina"];
				$tgo_paciente = $_POST["tgo_paciente"];
				$tgp_paciente = $_POST["tgp_paciente"];
				$eritocitos = $_POST["eritocitos"];
				$conteo_plaquetario = $_POST["conteo_plaquetario"];
				$hemoglobina = $_POST["hemoglobina"];
				$hematocritos = $_POST["hematocritos"];
				$leucocitos = $_POST["leucocitos"];
				$linfocitos = $_POST["linfocitos"];
				$netrofilos_segmentados = $_POST["netrofilos_segmentados"]; 
				$neutrofilos_no_segmentados = $_POST["neutrofilos_no_segmentados"];
				$eosinofilosgm = $_POST["eosinofilosgm"];
				$basofilos = $_POST["basofilos"];
				$monocitos = $_POST["monocitos"];

				 $token = $_SESSION["user"]->token;
				$url = CurlController::api()."bioquimico_paciente?id=".$id_encuesta."&nameId=id_encuesta&token=".$token."&tabla_estado=bioquimico_paciente&select=*";	
				$method = "PUT";
				$fields = "acido_urico=".$acido_urico."&bilirubina_directa=".$bilirubina_directa."&colesterol_total=".$colesterol_total."&colesterol_hdl=".$colesterol_hdl."&colesterol_ldl=".$colesterol_ldl."&trigliceridos=".$trigliceridos."&glucosa_ayunas=".$glucosa_ayunas."&glucosa_postprandial=".$glucosa_postprandial."&creatinina=".$tgo_paciente."&tgp_paciente=".$tgp_paciente."&eritocitos=".$eritocitos."&conteo_plaquetario=".$conteo_plaquetario."&hemoglobina=".$hemoglobina."&hematocritos=".$hematocritos."&leucocitos=".$leucocitos."&linfocitos=".$linfocitos."&netrofilos_segmentados=".$netrofilos_segmentados."&neutrofilos_no_segmentados=".$neutrofilos_no_segmentados."&eosinofilosgm=".$eosinofilosgm."&basofilos=".$basofilos."&monocitos=".$monocitos;
				$header = array();
				$paciente = CurlController::request($url, $method, $fields, $header)->results;

				
				
				//echo json_encode($paciente, JSON_UNESCAPED_UNICODE);
				print_r($paciente);
				exit;
			}else{
				echo "No_user_and_id_encuesta";
				return;
			}
		}
	//metodo para actualizar los datos Clinicos 
		if($_POST['action'] == 'actualizarClinico'){
			if(!empty($_SESSION['user']->id_user) && !empty($_POST['id_encuesta'])){

				 $id_encuesta = $_POST['id_encuesta']; 
				 
				 $descripcion_paciente = $_POST['descripcion_paciente'];

				 $token = $_SESSION["user"]->token;
				$url = CurlController::api()."clinico_paciente?id=".$id_encuesta."&nameId=id_encuesta&token=".$token."&tabla_estado=clinico_paciente&select=*";	
				$method = "PUT";
				$fields = "descripcion_paciente=".$descripcion_paciente;

				$header = array();
				$paciente = CurlController::request($url, $method, $fields, $header)->results;

				
				
				//echo json_encode($paciente, JSON_UNESCAPED_UNICODE);
				print_r($paciente);
				exit;
			}else{
				echo "No_user_and_id_encuesta";
				return;
			}
		}
	//metodo para actualizar los datos Dieteticos 
		if($_POST['action'] == 'actualizarDietetico'){
			if(!empty($_SESSION['user']->id_user) && !empty($_POST['id_encuesta'])){

				 $id_encuesta = $_POST['id_encuesta']; 
				 
				 $descripcion_paciente = $_POST['descripcion_dietetico'];

				 $token = $_SESSION["user"]->token;
				$url = CurlController::api()."dietetico_paciente?id=".$id_encuesta."&nameId=id_encuesta&token=".$token."&tabla_estado=dietetico_paciente&select=*";	
				$method = "PUT";
				$fields = "descripcion_dietetica_paciente=".$descripcion_paciente;
				$header = array();
				$paciente = CurlController::request($url, $method, $fields, $header)->results;

				
				
				//echo json_encode($paciente, JSON_UNESCAPED_UNICODE);
				print_r($paciente);
				exit;
			}else{
				echo "No_user_and_id_encuesta";
				return;
			}
		}
}else{
	echo "No_data";
	return;
}

 ?>