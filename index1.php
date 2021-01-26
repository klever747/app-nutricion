
<?php 
session_start(); 
/*=============================================
     Traer el dominio principal
=============================================*/
$path = TemplateController::path();

//consultar la URL de la pagina principal
     $routesArray = explode("/", $_SERVER['REQUEST_URI']);

    
    if(!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])){
         if (!empty(array_filter($routesArray)[2])) {
          $urlParams = explode("/",array_filter($routesArray)[2]);

     }
    }else{

      if (!empty(array_filter($routesArray)[1])) {
          $urlParams = explode("/",array_filter($routesArray)[1]);

     
      }
    }
     
    
    
    
      if(!empty($urlParams[0])){
          if($urlParams[0] == "account"){
              include "pages/".$urlParams[0]."/".$urlParams[0].".php";

          }else if($urlParams[0] == "login"){
              
             include "./pages/account/".$urlParams[0]."/".$urlParams[0].".php";
          }
          
      }
    
 ?>
<!DOCTYPE html>
<html lang="en">
<head>

     <title>Nutrition</title>

     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=Edge">
     <meta name="description" content="">
     <meta name="keywords" content="">
     <meta name="author" content="">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
     <?php
     /*
      Activar para que funciones Facebook y cargue el HTML
     if($routesArray[1] == "nutricion" && $routesArray[2] == ""){
      ?>
     <base href="./">
      <?php }else if($routesArray[2] == "login" && $routesArray[2] == "login"){ ?>
        <base href="../">
      <?php }else{ ?>
        <base href="../">
      <?php } */?>
      <base href="/">
    
     <link rel="stylesheet" href="css/bootstrap.min.css"> 
     <!-- Bootstrap 4 -->
    
     <link rel="stylesheet" href="css/font-awesome.min.css">
     <link rel="stylesheet" href="css/owl.carousel.css">
     <link rel="stylesheet" href="css/owl.theme.default.min.css">

     <!-- google font -->
  <link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,600,700&display=swap" rel="stylesheet">
  <!-- font awesome -->
  <link rel="stylesheet" href="css/plugins/fontawesome.min.css">

  <!-- linear icons -->
  <link rel="stylesheet" href="css/plugins/linearIcons.css">
   
  <!-- MAIN CSS -->
  <link rel="stylesheet" href="css/templatemo-style.css">


  <!-- estilo principal -->
  <link rel="stylesheet" href="css/style.css">

  <!-- Market Place 4 -->
  <link rel="stylesheet" href="css/market-place-4.css">

</head>
<body id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">

     <!-- PRE LOADER -->
     <!--
     <section class="preloader">
          <div class="spinner">

               <span class="spinner-rotate"></span>

          </div>

     </section>

-->
     <!-- MENU -->
     <section class="navbar custom-navbar navbar-fixed-top" role="navigation">

            
          <div class="container">
                <div class="navbar-header">
                    <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                    </button>

                    <!-- lOGO TEXT HERE -->
                    <a href="#" class="navbar-brand">QUIPANUTRI</a>
               </div>

               <!-- MENU LINKS -->
               <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-nav-first">
                         <li><a href="#home" class="smoothScroll">Bienvenidos</a></li>
                         <li><a href="#feature" class="smoothScroll">Funcionalidades</a></li>
                         <li><a href="#team" class="smoothScroll">Quienes somos</a></li>
                         <li><a href="#courses" class="smoothScroll">Beneficios</a></li>
                         <li><a href="account" class="smoothScroll">Registro</a></li>
                         <li><a href="login" class="smoothScroll">Login</a></li>

                    </ul>

                    

               </div>

          </div>

     </section>
    


      <!-- HOME -->

     <?php   include 'pages/home/home.php'   ?>

     

     <!-- FEATURE -->
     <?php     include 'pages/home/feature.php' ?>


     <!-- ABOUT -->

     <!-- TEAM -->
    <?php      include 'pages/home/about.php' ?>

                  
    <?php include 'pages/account/account.php' ?>   



     <!-- FOOTER -->
     <?php   include 'pages/home/footer.php' ?>

    


     

     <!-- SCRIPTS -->
     
     <script src="resources/plugins/sweetAlert2/sweetalert2.all.min.js"></script>
     <script src="resources/popper/popper.min.js"></script>
     
     <script src="js/jquery.js"></script>
     <script src="js/bootstrap.min.js"></script>
     <script src="js/owl.carousel.min.js"></script>
     <script src="js/smoothscroll.js"></script>
     <script src="js/custom.js"></script>
     <script src="login/js/validaciones.js"></script>
     <script src="js/restricciones.js"></script>
     <script  src = "https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js" > </script> 
    

 
<script >

function AbrirModalsRegistroPaciente(){
    $('#nutricionista').modal({backdrop:'static',keyboard:false});
    $('#nutricionista').modal('show');

}
/*
document.getElementById('txtemail').addEventListener('input', function() {
         campo = event.target;
         emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
         if(emailRegex.test(campo.value)){
             $(this).css("border","");
             $("#emailOK").html("");
             $("#validaremail").val("Correcto");
         }else{
             $(this).css("border","1px solid red");
             $("#emailOK").html("Email Incorrecto");
             $("#validaremail").val("Incorrecto");
         }
});
 */    

</script>

</body>
</html>
