<?php 
include  "../../controllers/curl.controller.php";
session_start();

	if(!empty($_POST)){

		if($_POST['action'] == 'registrarMenu'){

			if(empty($_POST['idPaciente']) || empty($_POST['nombreMenu']) || empty($_POST['nombrePreparacion']) || empty($_POST['opMenu']) || empty($_POST['calorias']) || empty($_POST['carbohidratos']) || empty($_POST['grasaTotal']) || empty($_POST['proteina']) || empty($_POST['preparacion']) || empty($_POST['descripcion']) || empty($_POST['ingredientes']) || empty($_POST['idNutricionista'])){

				echo 'error_campos_vacios';
			}else{

				$id_tipo_menu = $_POST['opMenu'];
				$nombre_menu = $_POST['nombreMenu'];
				$nombre_preparacion = $_POST['nombrePreparacion'];
				$calorias_total = $_POST['calorias'];
				$carbohidratos_total = $_POST['carbohidratos'];
				$grasa_total = $_POST['grasaTotal'];
				$proteina_total = $_POST['proteina'];
				$descripcion = $_POST['descripcion'];
				
				$preparacion = $_POST['preparacion'];
				$ingredientes = $_POST['ingredientes'];
				$id_nutricionista = $_POST['idNutricionista'];
				$id_paciente = $_POST['idPaciente'];

				$fechaInicio = $_POST['fechaInicio']." ".$horaIni = $_POST['hora'];
				
				$fechaFin = $_POST['fechaFin']." ".$horaFin = $_POST['horaFin'];
				$horaIni = $_POST['hora'];
				$horaFin = $_POST['horaFin'];
				$tittle = $_POST['tittle'];
				$descripcion_event = $_POST['descripcion_event'];
				$color = $_POST['color'];
				$token = $_SESSION["user"]->token;


				//obtencion del archivo file de la foto
				$foto='' ;
				$nombre_foto = '';
				$type = '';
				$url_temp = '' ;
				
				if(!empty($_FILES)){
					$foto = $_FILES['files'];
					$nombre_foto = $foto['name'];
					$type = $foto['type'];
					$url_temp = $foto['tmp_name'];

				}else{
					$imgPaciente = 'img_menu.jpg';
				}

				// comprobar que venga un archivo foto 
				if($nombre_foto != ''){
					$destino = '../../resources/img/';
					$img_nombre = 'img_'.md5(date('d-m-Y H:m:s'));
					$imgPaciente = $img_nombre.'.jpg';
					$src = $destino.$imgPaciente;
				}
				
				if($_POST['tittle'] == "undefined" && $_POST['descripcion_event'] == "undefined"){

					$url = CurlController::api()."insertar_menu_comida?token=".$token."&procedure=true&tabla_estado=nutricionista&select=*";
					$method = "POST";
					$fields = array(
						"id_tipo_menu" => $id_tipo_menu,
						"nombre_menu" => $nombre_menu,
						"nombre_preparacion" => $nombre_preparacion,
						"calorias_total" => $calorias_total,
						"carbohidratos_total" => $carbohidratos_total,
						"grasa_total" => $grasa_total,
						"proteina_total" => $proteina_total,
						"descripcion" => $descripcion,
						"imagen_menu" => $imgPaciente,
						"preparacion" => $preparacion,
						"ingredientes" => $ingredientes,
						"id_nutricionista" => $id_nutricionista,
						"id_paciente" => $id_paciente
					);
					
					$header = array();
					$pacientes = CurlController::request($url, $method, $fields, $header)->results;

				}else{
					
					//Conexion a la API 
					$url = CurlController::api()."insertar_menu_evento?token=".$token."&procedure=true&tabla_estado=nutricionista&select=*";

					$method = "POST";
					$fields = "id_tipo_menu=".$id_tipo_menu."&nombre_menu=".$nombre_menu."&nombre_preparacion=".$nombre_preparacion."&calorias_total=".$calorias_total."&carbohidratos_total=".$carbohidratos_total."&grasa_total=".$grasa_total."&proteina_total=".$proteina_total."&descripcion=".$descripcion."&imagen_menu=".$imgPaciente."&preparacion=".$preparacion."&ingredientes=".$ingredientes."&id_nutricionista=".$id_nutricionista."&id_paciente=".$id_paciente."&tittle=".$tittle."&descripcion_=".$descripcion_event."&color=".$color."&text_color=#0C0E00&start_=".$fechaInicio."&end_=".$fechaFin."&hora_ini=".$horaIni."&hora_fin=".$horaFin;
					$header = array();
					$pacientes = CurlController::request($url, $method, $fields, $header)->results;	
				}
				

				
					if($nombre_foto != ''){
						move_uploaded_file($url_temp, $src);
					}
					print_r($pacientes);
					exit;
			}
		}else if($_POST['action'] == 'registrarMenu_evento'){
			
			if(empty($_POST['idPaciente']) || empty($_POST['opcionMenu']) || empty($_POST['fechaInicio']) || empty($_POST['fechaFin']) || empty($_POST['hora']) || empty($_POST['horaFin'])){

				echo 'error_campos_vacios';
			}else{
				
			//datos del evento
				$id_paciente = $_POST['idPaciente'];
				$id_menu_comida = $_POST['opcionMenu'];
				$horaFin = $_POST['horaFin'];
				$fechaInicio = $_POST['fechaInicio']." ".$horaIni = $_POST['hora'];
				$fechaFin = $_POST['fechaFin']." ".$horaFin = $_POST['horaFin'];
				$horaIni = $_POST['hora'];
				$tittle = $_POST['tittle'];
				$descripcion_event = $_POST['descripcion_event'];
				$color = $_POST['color'];

				$token = $_SESSION["user"]->token;

				//conexion con la API para registrar el diagnostico
				$url = CurlController::api()."eventos_menu_comida?token=".$token."&select=*&tabla_estado=eventos_menu_comida";
					$method = "POST";
					$fields = "id_menu_comida=".$id_menu_comida."&title=".$tittle."&descripcion=".$descripcion_event."&color=".$color."&text_color=#0C0E00&start=".$fechaInicio."&end=".$fechaFin."&hora_ini=".$horaIni."&hora_fin=".$horaFin;
					$header = array();
					$response = CurlController::request($url, $method, $fields, $header)->results;

				print_r($response);
			}
		}else if($_POST['action'] == 'infoMenu'){

		//metodo para traer los datos del menu de comida
			if(!empty($_POST['id_menu'])){

				$id_menu= $_POST['id_menu'];
				$url = CurlController::api()."relations?rel=menu_comida,tipo_menu&type=menu_comida,tipo_menu&linkTo=id_menu_comida&equalTo=".$id_menu."&orderBy=nombre_menu&orderMode=DESC&tabla_estado=menu_comida&select=*";
				$method = "GET";
				$fields = array();
				$header = array();
				$menu_comida = CurlController::request($url, $method, $fields, $header)->results[0];

				
				
				echo json_encode($menu_comida, JSON_UNESCAPED_UNICODE);

			}else{
				echo 'no_hay_id_menu';
			}
		}else if($_POST['action'] == 'actualizar_menu'){

			
			if(empty($_POST['id_menu']) || empty($_POST['nombre_menu']) || empty($_POST['calorias']) || empty($_POST['carbohidratos']) || empty($_POST['grasa']) || empty($_POST['proteina']) || empty($_POST['preparacion1']) || empty($_POST['ingredientes1']) || empty($_POST['nombre_preparacion']) || empty($_POST['tipo_menu'])){

				echo 'error_campos_vacios';
			}else{

				$id_menu = $_POST['id_menu'];
				$nombre_menu = $_POST['nombre_menu'];
				$calorias = $_POST['calorias'];
				$carbohidratos = $_POST['carbohidratos'];
				$grasa = $_POST['grasa'];
				$proteina = $_POST['proteina'];
				$preparacion = $_POST['preparacion1'];
				$ingredientes = $_POST['ingredientes1'];
				$img_menu_comida = $_POST['fotoActual'];
				$foto_remove = $_POST['fotoRemove'];
				$descripcion = $_POST['descripcion1'];
				$nombre_preparacion = $_POST['nombre_preparacion'];
				$tipo_menu = $_POST['tipo_menu'];
				$token = $_SESSION["user"]->token;

					$foto = $_FILES['file'];
								
					$nombre_foto = $foto['name'];
					$type = $foto['type'];
					$url_temp = $foto['tmp_name'];

					$upd = '';

				

					if($nombre_foto != ''){

						$destino = '../../resources/img/';
						$img_nombre = 'img_'.md5(date('d-m-Y H:m:s'));
						$img_menu_comida = $img_nombre.'.jpg';
						$src = $destino.$img_menu_comida;
					}else{

						if($_POST['fotoActual'] != $_POST['fotoRemove']){

							$img_menu_comida = 'img_menu.jpg';
						}
					}

					
					//conexion con la API para actualizar el menu alimento 
					$url = CurlController::api()."menu_comida?id=".$id_menu."&nameId=id_menu_comida&token=".$token."&tabla_estado=menu_comida&select=*";
					$method = "PUT";
					$fields = "id_tipo_menu=".$tipo_menu."&nombre_menu=".$nombre_menu."&nombre_preparacion=".$nombre_preparacion."&calorias_total=".$calorias."&carbohidratos_total=".$carbohidratos."&grasa_total=".$grasa."&proteina_total=".$proteina ."&descripcion=".$descripcion."&imagen_menu=".$img_menu_comida."&preparacion=".$preparacion."&ingredientes=".$ingredientes;
					$header = array();
					$menu = CurlController::request($url, $method, $fields, $header)->results;

					if($nombre_foto != '' && ($_POST['fotoActual'] != 'img_menu.jpg') || ($_POST['fotoActual'] != $_POST['fotoRemove'])){
						unlink('../../resources/img/'.$_POST['fotoActual']);
					}

					if($nombre_foto != ''){

						move_uploaded_file($url_temp, $src);
					}
				
				
				//echo json_encode($paciente, JSON_UNESCAPED_UNICODE);
				print_r($menu);
				exit;
			}

		}else if($_POST['action'] == 'eliminar_menu'){
			
			if (!empty($_POST['id_menu'])) {
				
				$id_menu = $_POST['id_menu'];
				$token = $_SESSION['token'];
				
				$url = CurlController::api()."menu_comida?id=".$id_menu."&nameId=id_menu_comida&token=".$token."&tabla_estado=menu_comida&select=*";
				$method = "PUT";
				$fields = "estado=0";
				$header = array();
				$paciente = CurlController::request($url, $method, $fields, $header)->results;

				
				
				//echo json_encode($paciente, JSON_UNESCAPED_UNICODE);
				print_r($paciente);
				exit;
			}else{
				echo 'erro_no_id';
			}
		}else{
			echo 'error_no_accion';
		}
	}else{
		echo 'error_campos_vacios';
	}


 ?>