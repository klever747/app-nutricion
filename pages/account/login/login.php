      <!-- Notie Alert -->
<link rel="stylesheet" href="https://unpkg.com/notie@4.3.1/dist/notie.min.css">
<script src="https://unpkg.com/notie@4.3.1/dist/notie.min.js"></script>
   <!-- Sweet Alert -->
    <!-- https://sweetalert2.github.io/ -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="../../../js/head.js"></script>
<script src="../../../js/main.js"></script>
 
<section id="account">

    <?php 
        /*=============================================
            Validar veracidad del Email
        =============================================*/
         $routesArray = explode("/", $_SERVER['REQUEST_URI']);

         if (!empty(array_filter($routesArray)[2])) {

              $urlParams = explode("/",array_filter($routesArray)[2]);
              
         }
         
        if(isset($urlParams[0])){

            $verificar = base64_decode($urlParams[0]); 
            /*=============================================
                Validamos que el usuario exista
            =============================================*/
            $url = CurlController::api()."users?linkTo=email_user&equalTo=".$verificar."&tabla_estado=users&select=id_user";
            $method = "GET";
            $fields = array();
            $header = array();

            $item = CurlController::request($url, $method, $fields, $header);
            
            if(!empty($item)){
                if ($item->status == 200) {
                    /*=============================================
                       Actualizar el campo de verificar
                    =============================================*/

                    $url = CurlController::api()."users?id=".$item->results[0]->id_user."&nameId=id_user&token=no&except=verificar_user&tabla_estado=users&select=*";

                    $method = "PUT";
                    $fields = "verificar_user=1";
                    $header = array();

                    $verificar_user = CurlController::request($url, $method, $fields, $header);

                    if($verificar_user->status == 200){
                        echo '<div class = "alert alert-success">Tu cuenta ha sido verificada satisfactoriamente</div>';
                    }
                }
                
            }else{
                echo '<div class = "alert alert-danger">Fallo la verificacion, Email no existe</div>';
            }
        }

     ?>


<form class="needs-validation"  method="POST"  novalidate>

        <div class="modal-dialog modal-lg">
        <div class="modal-body">
            <div class="row">
                <h4>Login</h4>
                <input type="hidden" value="<?php echo CurlController::api(); ?>" id ="urlAPI">
                                                                 
                    <div class="form-group">
                         <br>
                                 
                         <label for="">Email</label>
                         <input type="email" 
                         class="form-control" 
                         id="txtemail" 
                         placeholder="Ingrese el email"
                         name="loginEmail" 
                         onchange="validateJS(event,'email')"><br>
                         <label for="" id="emailOK" style="color: red;"></label>
                         <input type="text" id="validaremail" hidden><br>
                                     
                    </div>
                                 
                    <div class="form-group">
                         <label for="">Contrase&ntilde;a</label>
                         <input type="password" 
                         class="form-control" 
                         id="txtcontrasena" 
                         
                         name="loginPass" 
                         laceholder="Ingrese la contraseña" 
                         pattern="[#\\=\\$\\;\\*\\_\\?\\¿\\!\\¡\\:\\.\\,\\0-9a-zA-Z]{1,}"
                         required><br>
                         <label for="" id="passwordOk" style="color: red;"></label>
                         <input type="text" id="validarPassw" hidden><br>
                         <a href="#reset_password" data-toggle="modal"   >Forgot?</a>  

                                      
                    </div>
                    <div class="form-group">
                        <div class="ps-checkbox">
                            <input class="form-control" type="checkbox" id="remember-me" name="remember-me" onchange="remember(event)">
                            <label for="remember-me">Recordar</label> 
                        </div>
                        
                    </div>

                          
                          <?php 
                              $login = new UsersController();
                              $login->login();
                           ?>
                    <div class="form-group submit">
                         <button type="submit" class="ps-btn ps-btn--fullwidth"><i class="fa fa-save"> Ingresar</i></button>
                              
                    </div>

                    <p>Connect with:</p>

                            <ul class="ps-list--social">

                                <li>
                                    <a class="facebook" href="<?php echo $path ?>account&facebook">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                </li>
                                <li>
                                    <a class="google" href="<?php echo $path ?>account&google">
                                        <i class="fab fa-google"></i>
                                    </a>
                                </li>

                            </ul>

                </div>
            </div>
    
        </div>
</form>
    
</section>

 
<!-- The Modal -->
<div class="modal" id="reset_password">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Cambiar Contraseña</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form  method="POST" class="ps-form--account ps-tab-root needs-validation" novalidate>
            <div class="form-group">
                     <br>
                                 
                    <label for="">Email</label>
                    <input type="email" 
                    class="form-control" 
                    placeholder="Ingrese el email"
                    name="resetPassword" 
                    onchange="validateJS(event,'email')"><br>
                    <label for="" id="emailOK" style="color: red;"></label>
                    <input type="text" id="validaremail" hidden><br>
                                     
            </div>
            <?php 

                $reset = new UsersController();
                $reset->resetPassword();
             ?>
            <div class="form-group submtit">
                
                <button type="submit" class="ps-btn ps-btn--fullwidth">Submit</button>
            </div>
        </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
