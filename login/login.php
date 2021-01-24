<?php 

require_once "../controllers/template.controller.php";
require_once "../controllers/curl.controller.php";
require_once "../controllers/users.controller.php";
 ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Login </title>
        
        <meta charset="UTF-8">
        
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--===============================================================================================-->
        <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="css/util.css">
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <!--===============================================================================================-->
    </head>
    <body>
        
            <div class="limiter">
                <div class="container-login100" style="background-image: url('images/images.jpg');">
                    <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">

                        <form class="needs-validation"  method="POST"  novalidate>
                            <span class="login100-form-title p-b-49">
                                INICIAR SESIÓN
                            </span>

                            <div class="wrap-input100 validate-input m-b-23">
                                <span class="label-input100">Usuario</span>
                                <input class="input100" 
                                type="email" 
                                
                                pattern = "/^[^0-9][.a-zA-Z0-9_]+([.][.a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/"
                                placeholder="Escriba el Email" 
                                id="log_email"
                                onchange="validateJS(event,'email')"
                                name="loginEmail">                           
                                <span class="focus-input100" data-symbol="&#xf206;"></span>
                                <label for="" id="emailOK" style="color: red;"></label>
                                <input type="text" id="validaremail" hidden><br>
                            </div>

                            <div class="wrap-input100 validate-input">
                                <span class="label-input100">Contrase&ntilde;a</span>
                                <input class="input100" 
                                type="password" 
                                name="loginPass" 
                                placeholder="Escriba la contrase&ntilde;a" id="txtcon">
                                <span class="focus-input100" data-symbol="&#xf190;"></span>
                            </div>

                            <div class="text-right p-t-8 p-b-31">
                                <a href="#" onclick="AbrirModalRestablecer()">
                                    Olvidastes la contrase&ntilde;a
                                </a>
                            </div>
                            <?php 
                                $login = new UsersController();
                                $login->login();

                             ?>
                            <div class="form-group submit">
                                
                                <button type = "submit"class="btn btn-primary">
                                        Entrar
                                    </button>
                                
                            </div><br>


                            <div class="flex-c-m">
                                <a href="#" class="login100-social-item bg1">
                                    <i class="fa fa-facebook"></i>
                                </a>

                                <a href="#" class="login100-social-item bg2">
                                    <i class="fa fa-twitter"></i>
                                </a>

                                <a href="#" class="login100-social-item bg3">
                                    <i class="fa fa-google"></i>
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        

    <div id="dropDownSelect1"></div>
        <div class="modal fade" id="modals_restablecer_contra" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header" style="text-align: left;">
                          <h4 class="modal-title"><b>Restablecer Contrase&ntilde;a</b></h4>
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                             <div class="col-lg-12">
                                     <input type="text" id="txtidusuario" hidden>
                                     <label for=""><b>Ingrese el email registrado en el usuario para enviarle su contraseña restablecida</b></label>
                                    <input type="text" class="form-control" id="txtemail" placeholder="Ingrese su email" ><br>

                             </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" onclick="Restablecer_contra()"><i class="fa fa-check-square-o">Enviar</i></button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"> Cancelar</i></button>
                    </div>
                 </div>
            </div>
          </div>



        <script src="vendor/sweetalert2/sweetalert2.js"></script>

        <script src="js/validaciones.js"></script>

        <!--===============================================================================================-->
        <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
        <!--===============================================================================================-->
        <script src="vendor/animsition/js/animsition.min.js"></script>
        <!--===============================================================================================-->
        <script src="vendor/bootstrap/js/popper.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
        <!--===============================================================================================-->
        <script src="vendor/select2/select2.min.js"></script>
        <!--===============================================================================================-->
        <script src="vendor/daterangepicker/moment.min.js"></script>
        <script src="vendor/daterangepicker/daterangepicker.js"></script>
        <!--===============================================================================================-->
        <script src="vendor/countdowntime/countdowntime.js"></script>
        <!--===============================================================================================-->
        <script src="js/main.js"></script>
        <script src="../js/usuario.js"></script>


    </body>
   
</html>
