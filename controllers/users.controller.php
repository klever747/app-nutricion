<?php 
	
 class UsersController{

 	/*=============================================
 	 Registro de usuarios 
 	=============================================*/
 	public function register(){

 		if(isset($_POST["regEmail"])){
 			
 			/*=============================================
 				validar la sintaxis de los campos
 			=============================================*/
 			
 			if (preg_match('/^[A-Za-zñÑáéíóúÁÉÍÓÚ ]{1,}$/', $_POST['regNombre']) &&
 				preg_match('/^[A-Za-zñÑáéíóúÁÉÍÓÚ ]{1,}$/', $_POST['regApellido']) &&
 				
 				preg_match('/^[^0-9][.a-zA-Z0-9_]+([.][.a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST['regEmail']) &&
 				preg_match('/^[#\\=\\$\\;\\*\\_\\?\\¿\\!\\¡\\:\\.\\,\\0-9azA-Z]{1,}$/', $_POST['regPassword'])){
 				$display_name = TemplateController::capitalize(strtolower($_POST['regNombre']))." ".TemplateController::capitalize(strtolower($_POST['regApellido']));

 				$nombre_user = strtolower(explode("@", $_POST['regEmail'])[0]);
 				$email = strtolower( $_POST['regEmail']);
 				$url = CurlController::api()."users?register=true";
 				$method = "POST";
 				$fields = array(
 					"ci_user" => $_POST['regCedula'],
 					"nombre_user" => $nombre_user,
 					"display_name" => $display_name,
 					"nombre_usuario" => $_POST['regNombre'],
 					"apellido_user" => $_POST['regApellido'],
 					"id_genero" => $_POST['regGenero'],
 					"email_user" => $email,
 					"method_user" => "direct",
 					"password_user" =>$_POST['regPassword'],
 					"date_create_user" => date("Y-m-d"),
 					"id_rol" => 1 
 					
 				);

 				
 				$header = array(
 					"Content-Type"=> "application/x-www-form-urlencoded"
 				);

 				$register = CurlController::request($url, $method, $fields, $header);
 				
 				if($register->status == 200){

 					$name = $display_name;
 					$subject = "Verificar cuenta";
 					$email = $email;
 					$message = "Nosotros necesitamos que verifiques tu cuenta para Quipanutri";
 					$url = TemplateController::path()."login/".base64_encode($email);

 					$sendEmail = TemplateController::sendEmail($name,$subject, $email, $message, $url);

 					if($sendEmail == "Ok"){
 						echo '<div class = "alert alert-success">Registro satisfactorio, confirme su cuenta en tu email(check spam)</div>

 							<script>
 								fncFormatInputs()
 							</script>
 						';
 					}else{
 						echo '<div class = "alert alert-danger">'.$sendEmail.'</div>

 							<script>
 								fncFormatInputs()
 							</script>
 						';
 					}
 				}
 			}else{

 				echo '<div class = "alert alert-danger">Error en la sintaxis de los campos</div>

 					<script>
 						fncFormatInputs()
 					</script>
 				';
 				
 			}
 				
 		}
 		
 	}
 	/*=============================================
 	 Login de usuarios 
 	=============================================*/
 	public function login(){
 		

 		if(isset($_POST["loginEmail"])){
 				
 			/*=============================================
 				validar la sintaxis de los campos
 			=============================================*/
 			
 			if (preg_match('/^[^0-9][.a-zA-Z0-9_]+([.][.a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST['loginEmail'])){

 				echo '<script>
 					fncSweetAlert("loading","","");
 				</script>';
 				
 				$url = CurlController::api()."users?login=true&tabla_estado=users&select=*";
 				$method = "POST";
 				$fields = array(
 					
 					"email_user" => $_POST['loginEmail'],
 					"password_user" =>$_POST['loginPass']
 					
 					
 				);

 				
 				$header = array(
 					"Content-Type"=> "application/x-www-form-urlencoded"
 				);

 				$login = CurlController::request($url, $method, $fields, $header);
 				if($login->status == 200){
 					if($login->results[0]->verificar_user == 1){

 						$_SESSION["user"] = $login->results[0];
 						echo '
 							<script>
 								fncFormatInputs();
 								window.location = "'.TemplateController::path().'pages/sistema/sistema.php";
 							</script>
 						';

 						
 					}else{
 						echo '<div class = "alert alert-danger">Este usuario aun no ha sido verificado, por favor verifica tu Email</div>

 							<script>
 								fncSweetAlert("close","","");
 								fncFormatInputs();

 							</script>
 						';
 					}
 				}else{

 					echo '<div class = "alert alert-danger">'.$login->results.'</div>

 							<script>
 								fncSweetAlert("close","","");
 								fncFormatInputs();

 							</script>
 						';
 				}
 				
 			}else{
 				echo '<div class = "alert alert-danger">Error en la sintaxis de los campos</div>

 					<script>
 						fncSweetAlert("close","","");
 						fncFormatInputs();
 					</script>
 				';
 			}
 		}
 		
 	}

 	/*=============================================
 	 Conexion con redes sociales 
 	=============================================*/
 	static public function socialConnect($url, $type){
 		/*=============================================
 	 	Conexion con - FACEBOOK
 		=============================================*/
 		if($type == "facebook"){
	 		$fb = new \Facebook\Facebook([
	 			'app_id' => '397254851687715',
	 			'app_secret' => 'f46ac498373387009e6d6e37f3839773',
	 			'default_graph_version' => 'v2.10',
	 		]); 

 		
	 		/*=============================================
			 	 Creamos la redireccion con la API de FB
			=============================================*/
			$handler = $fb->getRedirectLoginHelper();
			

			/*=============================================
			 	Soilicitar datos relacionados al Email
			=============================================*/
			$data = ["email"];

			/*============================================
				Activamos la URL de FB con los parametros 
				URL de regreso y los datos que solicitamos
			===============================================*/
			$fullUrl = $handler->getLoginUrl($url,$data);
				//echo '<pre>'; print_r($fullUrl); echo '</pre>';
				
			
			if(!isset($_GET["code"])){ 

					echo '<script>

						window.location = "'.$fullUrl.'";

					</script>';

			}
			/*=============================================
				Recibimos la respuesta de Facebook
				=============================================*/	

			if(isset($_GET["code"])){

					/*=============================================
					Solicitamos el access Token de Facebook
					=============================================*/	

				try {

					$accessToken = $handler->getAccessToken();
					 
				}catch(\Facebook\Exceptions\FacebookResponseException $e){

					echo "Response Exception: ". $e->getMessage();
					exit();

				}catch(\Facebook\Exceptions\FacebookSDKException $e){

					echo "SDK Exception: ". $e->getMessage();
					exit();

				}


				/*=============================================
				Solicitamos la data completa del usuario con el access Token y la guardamos en una variable de Sesión
				=============================================*/	

				$oAuth2Client = $fb->getOAuth2Client();

				if(!$accessToken->isLongLived())
						$accessToken = $oAuth2Client->getLongLivedAccesToken($accessToken);
						$response = $fb->get("/me?fields=id, first_name, last_name, email, picture.type(large)", $accessToken);
						$userData = $response->getGraphNode()->asArray();

					
					if(!isset($userData["email"])){

						echo '<div class = "container-fluid" style = "background:#f1f1f1">
								<div class = "container alert alert-danger mb-0">

									Error : El usuario se esta registrando sin correo 
								</div>';
						return;
					}
					$display_name = $userData['first_name']." ".$userData['last_name'];
					$user_name = explode("@", $userData["email"])[0];
					$email = $userData["email"];

					/*=============================================
					Preguntamos primero si el ususario ya esta registrado
					=============================================*/
					$url = CurlController::api()."users?linkTo=email_user&equalTo=".$email."&tabla_estado=users&select=*";
					$method = "GET";
					$fields = array();
					$header = array();

					$user = CurlController::request($url, $method, $fields, $header);

					if($user->status == 200){
						
						if($user->results[0]->id_rol == 1 && $user->results[0]->method_user == "facebook"){
							$_SESSION["user"] = $user->results[0];
							echo '
									<script>
											
	 										window.location = "'.TemplateController::path().'pages/sistema/sistema.php";
									</script>
		 						';
	 					}
					}else{

						$url = CurlController::api()."users?register=true";
		 				$method = "POST";
		 				$fields = array(
		 					
		 					"nombre_user" => $user_name,
		 					"display_name" => $display_name,
		 					"nombre_usuario" => $userData['first_name'],
		 					"apellido_user" => $userData['last_name'],
		 					"image_user" => $userData['picture']['url'],
		 					"email_user" => $email,
		 					"id_genero" =>"3",
		 					"method_user" => "facebook",
		 					"date_create_user" => date("Y-m-d"),
		 					"id_rol" => 1 
		 					
		 				);

		 				
		 				$header = array(
		 					"Content-Type"=> "application/x-www-form-urlencoded"
		 				);

		 				$register = CurlController::request($url, $method, $fields, $header);

		 				if($register->status == 200){


		 					$url = CurlController::api()."users?linkTo=email_user&equalTo=".$email."&tabla_estado=users&select=*";
							$method = "GET";
							$fields = array();
							$header = array();

							$user = CurlController::request($url, $method, $fields, $header);

							if($user->status == 200){

								if($user->results[0]->id_rol == 1){
									$_SESSION["user"] = $user->results[0];
				 					echo '
				 							<script>
				 								
		 										window.location = "'.TemplateController::path().'pages/sistema/sistema.php";
				 							</script>
				 						';
				 				}
			 				}

		 				}

	 				}

				}
			

		}
		/*=============================================
 	 	Conexion con - Google
 		=============================================*/
		if($type == "google"){

			$client = new Google\Client();
			$client->setAuthConfig('controllers/client_secret.json');
			$client->setScopes(['profile','email']);
			$redirect_uri = $url;
			$client->setRedirectUri($redirect_uri);
			$fullUrl = $client->createAuthUrl();
				
			/*=============================================
			Redireccionamos nuestro sitio hacia Google
			=============================================*/	

			if(!isset($_GET["code"])){ 

				echo '<script>

					window.location = "'.$fullUrl.'";

				</script>';

			}


			/*=============================================
			Recibimos la respuesta de Google
			=============================================*/	

			if(isset($_GET['code'])){

				$token = $client->authenticate($_GET["code"]);

				$_SESSION['id_token_google'] = $token;

				$client->setAccessToken($token);

				/*=============================================
				RECIBIMOS LOS DATOS CIFRADOS DE GOOGLE EN UN ARRAY
				=============================================*/
				
				if($client->getAccessToken()){


					$userData = $client->verifyIdToken();
					
					$display_name = $userData['name'];
					$user_name = explode("@", $userData["email"])[0];
					$email = $userData["email"];

					/*=============================================
					Preguntamos primero si el ususario ya esta registrado
					=============================================*/
					$url = CurlController::api()."users?linkTo=email_user&equalTo=".$email."&tabla_estado=users&select=*";
					$method = "GET";
					$fields = array();
					$header = array();

					$user = CurlController::request($url, $method, $fields, $header);

					if($user->status == 200){
						if($user->results[0]->id_rol == 1 && $user->results[0]->method_user == "google"){
						$_SESSION["user"] = $user->results[0];
							echo '
									<script>

	 										window.location = "'.TemplateController::path().'pages/sistema/sistema.php";
									</script>
		 						';
		 				}
					}else{
						/*=============================================
						Registramos el usuario con los datos de facebook
						=============================================*/
						$url = CurlController::api()."users?register=true";
		 				$method = "POST";
		 				$fields = array(
		 					
		 					"nombre_user" => $user_name,
		 					"display_name" => $display_name,
		 					"nombre_usuario" => $userData['given_name'],
		 					"apellido_user" => $userData['family_name'],
		 					"image_user" => $userData['picture'],
		 					"email_user" => $email,
		 					"id_genero" =>"3",
		 					"method_user" => "google",
		 					"date_create_user" => date("Y-m-d"),
		 					"id_rol" => 1 
		 					
		 				);

		 				
		 				$header = array(
		 					"Content-Type"=> "application/x-www-form-urlencoded"
		 				);

		 				$register = CurlController::request($url, $method, $fields, $header);

		 				if($register->status == 200){

		 					$url = CurlController::api()."users?linkTo=email_user&equalTo=".$email."&tabla_estado=users&select=*";
							$method = "GET";
							$fields = array();
							$header = array();

							$user = CurlController::request($url, $method, $fields, $header);

							if($user->status == 200){

								if($user->results[0]->id_rol == 1){
									$_SESSION["user"] = $user->results[0];
				 					echo '

				 						<script>
				 								
		 										window.location = "'.TemplateController::path().'pages/sistema/sistema.php";
				 						</script>
				 					';
				 				}
				 			}

		 				}

	 				}
					
					
				}

			}

		}
	 	
 	}

 	/*=============================================
 	 Recuperar contraseña
 	=============================================*/
 	public function resetPassword(){

 		if(isset($_POST["resetPassword"])){

 			if(preg_match('/^[^0-9][.a-zA-Z0-9_]+([.][.a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST['resetPassword'])){


 				$url = CurlController::api()."users?linkTo=email_user&equalTo=".$_POST["resetPassword"]."&tabla_estado=users&select=*";
					$method = "GET";
					$fields = array();
					$header = array();

					$user = CurlController::request($url, $method, $fields, $header);

					if($user->status == 200){
						if($user->results[0]->method_user == "direct"){
							function genPassword($length){
								$password = "";
								$chain = "123456789abcdefghijklmnopqrstuvwxyz";

								$max = strlen($chain)-1;

								for ($i=0; $i < $length; $i++) { 
									
									$password .=$chain{mt_rand(0,$max)};
								}
								return $password;
							}


							$newPassword = genPassword(11);

							$crypt = crypt($newPassword, '$2a$07$azbxcags23425sdg23sdfhsd$');
							
							/*=============================================
	 	 						Actualizar contraseña en base de datos
	 						=============================================*/

	 						$url = CurlController::api()."users?id=".$user->results[0]->id_user."&nameId=id_user&token=no&except=password_user&tabla_estado=users&select=*";
	 						$method = "PUT";
							$fields = "password_user=".$crypt;
							$header = array();

							$updatePassword = CurlController::request($url, $method, $fields, $header);

							if($updatePassword->status == 200){

								/*=============================================
	 	 						Enviamos el Email para restablecer contraseña
	 							=============================================*/
								$name = $user->results[0]->display_name;
			 					$subject = "Requerimiento de nueva contraseña";
			 					$email = $user->results[0]->email_user;
			 					$message = "Tu nueva contraseña es: ".$newPassword;
			 					$url = TemplateController::path()."login";

			 					$sendEmail = TemplateController::sendEmail($name,$subject, $email, $message, $url);

			 					if($sendEmail == "Ok"){

			 					 	echo '
										 <script>
										 								
								 			fncFormatInputs();
								 			fncSweetAlert("success","Contraseña actualizada, Revice su correo", "");
										 </script>
									';
			 					}else{

			 						echo '

									 <script>
									 								
							 			fncFormatInputs();
							 			fncSweetAlert("error","Error al actualizar", "");
									 </script>
									';
			 					}
							}
						}else{

							echo '<script>

									fncFormatInputs();

									fncSweetAlert("error", "It is not allowed to recover password because you registered with '.$user->results[0]->method_user.'", "")

								</script>
							';

						}
					}else{

						echo '

						 <script>
						 								
				 			fncFormatInputs();
				 			fncSweetAlert("error","El Email no existe en la Base de Datos","");
						 </script>
						';
					}
 			}else{

 				echo '

					 <script>
					 								
			 			fncFormatInputs();
			 			fncSweetAlert("error","Error en la sintaxis", "");
					 </script>
					';
 			}

 		}
 	}

 	/*=============================================
 	 Cambiar contraseña
 	=============================================*/

 	public function changePassword(){
 		if (isset($_POST['changePassword'])) {

 			if(preg_match('/^[#\\=\\$\\;\\*\\_\\?\\¿\\!\\¡\\:\\.\\,\\0-9azA-Z]{1,}$/', $_POST['changePassword'])){
 				/*=============================================
			 	 encriptamos la contraseña
			 	=============================================*/
 				$crypt = crypt($_POST['changePassword'], '$2a$07$azbxcags23425sdg23sdfhsd$');

 				/*=============================================
			 	 Actualizamos la contraseña en la base de datos
			 	=============================================*/
			 	$url = CurlController::api()."users?id=".$_SESSION['user']->id_user."&nameId=id_user&token=".$_SESSION['user']->token."&tabla_estado=users&select=*";
			 	$method = "PUT";
			 	$fields = "password_user=".$crypt;
			 	$header = array();
			 	$updatePassword = CurlController::request($url, $method, $fields, $header);

			 	if($updatePassword->status == 200){
			 		echo '
							 <script>
										 								
					 			fncFormatInputs();
					 			fncSweetAlert("success","Contraseña actualizada, Revisa tu correo", "");
							 </script>
						';
					/*=============================================
	 	 			Enviamos el Email para restablecer contraseña
	 				=============================================*/
	 				/*
					$name = $_SESSION['user']->display_name;

			 		$subject = "Cambio de Contraseña";
			 		$email = $_SESSION['user']->email_user;

			 		$message = "Tu has cambiado de contraseña";
			 		$url = TemplateController::path()."login/";

			 	$sendEmail = TemplateController::sendEmail($name, $subject, $email, $message, $url);
			 	
			 		if($sendEmail == "Ok"){

			 		 	echo '
							 <script>
										 								
					 			fncFormatInputs();
					 			fncSweetAlert("success","Contraseña actualizada, Revisa tu correo", "");
							 </script>
						';
			 		}else{

			 			echo '

						 <script>
									 								
								fncFormatInputs();
								fncSweetAlert("error","Error al actualizar", "");
						 </script>
						';
			 		}
			 		*/
				}else{
					if($updatePassword->status == 303){
			 			echo '

						<script>
											 								
								fncFormatInputs();
								fncSweetAlert("error","'.$updatePicture->results.'", "'.TemplateController::path().'account&logout");
						 </script>
						';	

			 		}else{
						echo '

						 <script>
								fncSweetAlert("error","Error al actualizar Intente de nuevo", "");
						 </script>
						';	
					}	
				}


 			}else{
				echo '

				<script>
									 								
						fncFormatInputs();
						fncSweetAlert("error","Error en los campos", "");
				 </script>
				';		
			}
 		}
 	}
 	//funcion para cambiar la foto de perfil
 	public function changePicture(){
 		/*=============================================
			Validamos la sintaxis de los campos
		=============================================*/
		if (isset($_FILES['changeFoto']['tmp_name']) && !empty($_FILES['changeFoto']["tmp_name"])) {
			
			$image = $_FILES['changeFoto'];
			$folder = "img";
			$path = $_SESSION['user']->id_user;
			$width = 200;
			$heigth = 200;
			$name = $_SESSION["user"]->nombre_user;

			$saveImage = TemplateController::saveImage($image, $folder, $path, $width, $heigth, $name);
			
			if($saveImage != "error"){

				/*=============================================
			 	 Actualizamos la foto en la base de datos
			 	=============================================*/
			 	$url = CurlController::api()."users?id=".$_SESSION['user']->id_user."&nameId=id_user&token=".$_SESSION['user']->token."&tabla_estado=users&select=*";
			 	$method = "PUT";
			 	$fields = "image_user=".$saveImage;
			 	$header = array();
			 	$updatePicture = CurlController::request($url, $method, $fields, $header);
			 	
			 	if($updatePicture->status == 200){

			 		$_SESSION["user"]->image_user = $saveImage;

			 		echo '

					<script>
										 								
							fncFormatInputs();
							fncSweetAlert("success","Imagen Actualizada", "'.$_SERVER["REQUEST_URI"].'");
					 </script>
					';	
			 	}else{

			 		if($updatePicture->status == 303){
			 			echo '

						<script>
											 								
								fncFormatInputs();
								fncSweetAlert("error","'.$updatePicture->results.'", "'.TemplateController::path().'account/login");
						 </script>
						';	

			 		}else{
				 		echo '

						<script>
											 								
								fncFormatInputs();
								fncSweetAlert("error","Error imagen no actualizada", "");
						 </script>
						';	
					}
			 	}
			}
		}
 	}
 }