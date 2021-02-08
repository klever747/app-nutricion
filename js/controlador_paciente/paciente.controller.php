<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require_once "../../extensiones/vendor/autoload.php";
class PacienteController{

	static public function enviarEmail($name, $subject, $email, $message, $url){
		date_default_timezone_set("America/Guayaquil");
		
		$mail = new PHPMailer();

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
}