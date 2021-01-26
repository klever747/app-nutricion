<?php 

$routesArray = explode("/", $_SERVER['REQUEST_URI']);
	
	if(!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])){
		
	     if (!empty(array_filter($routesArray)[2])) {

	     	  $urlGet = explode("?", array_filter($routesArray)[2]);
	          $urlParams2 = explode("&",$urlGet[0]);
	          
	     }
    }else{
    	

    	if (!empty(array_filter($routesArray)[1])) {

	       	$urlGet = explode("?", array_filter($routesArray)[1]);
	         $urlParams2 = explode("&",$urlGet[0]);
	          
	    }
    }
   

 ?>
 
<div class="ps-breadcrumb">

    <div class="container">

        <ul class="breadcrumb">

            <li><a href="/">Home</a></li>

            <li>My Account</li>

        </ul>          
          
    </div>

</div>
<?php 
	

	if($routesArray[1] == "nutricion"){

		if(!empty($urlParams2[1])){
			
			if($urlParams2[0] == "account" && $urlParams2[1]== "facebook"){

				$url = $path."account&facebook";

				$response = UsersController::socialConnect($url);

			}
		}else if($urlParams2[0] == "account"){

			include "enrrollment/enrrollment.php";

		}else if($urlParams2[0] == "login"){
					include "login/".$urlParams2[0].".php";
		}
	}else{
		

		if(!empty($urlParams2[0]) && !empty($urlParams2[1])){

			if($urlParams2[0] == "account" && $urlParams2[1]== "facebook" ||  $urlParams2[0] == "account" && $urlParams2[1]== "google"){
			
				$url = $path."account&".$urlParams2[1];

				$response = UsersController::socialConnect($url,$urlParams2[1]);

			}else if($urlParams2[0] == "account" && $urlParams2[1]== "sistema"){

				echo '<script>
						window.location = "'.$path.'pages/sistema/sistema.php";
				</script>';
				
			}else if($urlParams2[0] == "account" && $urlParams2[1]== "logout"){
				
				include $urlParams2[1]."/".$urlParams2[1].".php";

			}
		}else if(!empty($urlParams2[0])){
			if($urlParams2[0] == "account"){

				include "enrrollment/enrrollment.php";

			}else if($urlParams2[0] == "login"){

				include "login/".$urlParams2[0].".php";
			}

			
		}else{
			include "enrrollment/enrrollment.php";
		}
	}
	
	
 ?>