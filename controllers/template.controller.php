<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
class TemplateController{

	/*=============================================
		Traemos la vista principal de la plantilla
	=============================================*/

	public function index(){
		include "index1.php";
		
	}
	/*=============================================
		Ruta principal de la pagina
	=============================================*/
	public static function path(){
		
		if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
			return "https://localhost/nutricion/";
		}else{
			return "http://quipanutri.com/";
		}
		
		
	}
	/*=============================================
		funcion para mayuscula inicial
	=============================================*/
	static public function capitalize($value){
		$text = str_replace("_", " ", $value);
		return ucwords($text);
	}

	/*=============================================
		funcion para enviar correos electronicos
	=============================================*/

	static public function sendEmail($name, $subject, $email, $message, $url){
		date_default_timezone_set("America/Guayaquil");

		$mail = new PHPMailer;

		$mail->Charset = "UTF-8";

		$mail->isMail();

		$mail->setFrom("juniorkleverpardo@hotmail.com", "Quipanutri Support");

		$mail->subject = "Hola".$name." - ".$subject;

		$mail->addAddress($email);


		$mail->msgHTML('

			<div>
				Hola, '.$name.':
				<p>'.$message.'</p>
				<a href="'.$url.'">Click en este Link para mas información</a>

				Si no esperaba este mensaje, usted puede ignorar este Email.
				
				Gracias,

				El equipo de Quipanutri.
			</div>
		 ');

		$send = $mail->send();
		if(!$send){
			return $mail->ErrorInfo;
		}else{
			return 'Ok';
		}


	}
	/*=============================================
		funcion para guardar la foto
	=============================================*/
	static public function saveImage($image, $folder, $path, $width, $heigth, $name){
		if(isset($image["tmp_name"]) && !empty($image["tmp_name"])){

			/*=============================================
				Configuramos la ruta donde se guardara el archivo
			=============================================*/
			$directory = strtolower("../../resources/".$folder."/".$path); 
			/*=============================================
				preguntamos si el directorio existe y si no existe lo creamos
			=============================================*/
			
			if(!file_exists($directory)){
				mkdir($directory,0755);
			}
			
			/*=============================================
				Eliminar todos los archivos que existan en el directorio
			=============================================*/
			$files = glob($directory."/*");
			
			foreach ($files as $file) {
				unlink($file);
			}

			/*=============================================
				Capturar ancho y alto original de la imagen
			=============================================*/

			list($lastWidth, $lastHeigth) = getimagesize($image["tmp_name"]);
			
			/*=============================================
				De acuerdo al tipo de imagen aplicamos las funciones por defecto
			=============================================*/

			if($image["type"] == "image/jpeg"){

				//definimos el nombre del archivo
				$newName = $name.'.jpg';

				//definimos el destino par aguardar el archivo
				$folderPath = $directory."/".$newName;
				//creamos una copia de la imagen
				$start = imagecreatefromjpeg($image["tmp_name"]);
				//instrucciones para aplicar la imagen definitiva
				$end = imagecreatetruecolor($width, $heigth);

				imagecopyresized($end, $start, 0, 0, 0, 0, $width, $heigth, $lastWidth, $lastHeigth);
				imagejpeg($end, $folderPath);
			}

			if($image["type"] == "image/png"){
				//definimos el nombre del archivo
				$newName = $name.'.png';

				//definimos el destino par aguardar el archivo
				$folderPath = $directory."/".$newName;
				//creamos una copia de la imagen
				$start = imagecreatefrompng($image["tmp_name"]);
				//instrucciones para aplicar la imagen definitiva
				$end = imagecreatetruecolor($width, $heigth);

				imagealphablending($end, FALSE);

				imagesavealpha($end, TRUE);

				imagecopyresampled($end, $start, 0, 0, 0, 0, $width, $heigth, $lastWidth, $lastHeigth);
				imagepng($end, $folderPath);
			}
			return $newName;
		}else{
			return "error";
		}
	}
}