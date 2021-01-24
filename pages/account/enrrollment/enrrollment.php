     <?php 
    /*=============================================
        Metodo para extraer el Genero del paciente
    =============================================*/
    $url = CurlController::api()."genero?tabla_estado&select=*";
    $method = "GET";
    $fields = array();
    $header = array();

    $genero = CurlController::request($url, $method, $fields, $header)->results;
    
?>

<section id="account">

    
    <form class="needs-validation"  method="POST"  novalidate>

        <div class="modal-dialog modal-lg">
        <div class="modal-body">
            <div class="row">

                <input type="hidden" value="<?php echo CurlController::api(); ?>" id ="urlAPI">
                     <div class="form-group">
                        <label for="">Cedula</label>
                        <input type="text"
                         class="form-control"
                         id="txtcedula" 
                         placeholder="Ingrese la cedula" 
                         maxlength="11" 
                         onkeypress="return validateNumber(event)" 
                         onchange="validarCI(event)"
                         
                         name="regCedula" required>
                        <label for="" id="cedulaOK" style="color: red;"></label>
                        <input type="text" id="validarcedula" hidden><br>
                    </div>
                    <div class="form-group">
                         <label for="">Nombres</label>
                         <input type="text" 
                         class="form-control" 
                         id="txtnombres" 
                         placeholder="Ingrese los nombres" 
                         maxlength="50" 
                         onchange="validateJS(event,'text')" 
                         name="regNombre" 
                         required><br>
                         <label for="" id="text_ok" style="color: red;"></label>
                         <input type="text" id="validartexto" hidden><br>
                    </div>
                    <div class="form-group">
                         <label for="">Apellidos</label>
                         <input type="text" 
                         class="form-control" id="txtapellidop" placeholder="Ingrese el apellido paterno" 
                         maxlength="50" 
                         onchange="validateJS(event,'text')"
                         name="regApellido" 
                         required ><br>
                         <label for="" id="text_ok" style="color: red;"></label>
                         <input type="text" id="validartexto" hidden><br>
                                     
                    </div>
                            
                                  
                    <div class="form-group">
                         <label for="">Género</label>
                         <select class="js-example-basic-multiple" name="regGenero" id="opcion_sexo" style="width:100%;">
                         <?php foreach($genero as $key => $value):?> 
                             <option value="<?php echo $value->id_genero; ?>"><?php echo $value->genero; ?></option>
                                    
                         <?php endforeach ?> 
                         </select><br>
                    </div>

                    <div class="form-group">
                         <br>
                                 
                         <label for="">Email</label>
                         <input type="email" 
                         class="form-control" 
                         id="txtemail" 
                         placeholder="Ingrese el email"
                         name="regEmail" 
                         onchange="validarEmail(event)"><br>
                         <label for="" id="emailOK" style="color: red;"></label>
                         <input type="text" id="validaremail" hidden><br>
                                     
                    </div>
                                 
                    <div class="form-group">
                         <label for="">Contrase&ntilde;a</label>
                         <input type="password" 
                         class="form-control" 
                         id="txtcontrasena" 
                         onchange="validateJS(event,'password')"
                         name="regPassword" 
                         laceholder="Ingrese la contraseña" 
                         pattern="[#\\=\\$\\;\\*\\_\\?\\¿\\!\\¡\\:\\.\\,\\0-9a-zA-Z]{1,}"
                         required><br>
                         <label for="" id="passwordOk" style="color: red;"></label>
                         <input type="text" id="validarPassw" hidden><br>
                                        
                    </div>

                          
                          <?php 
                              $register = new UsersController();
                              $register->register();
                           ?>
                    <div class="form-group submit">
                         <button type="submit" class="btn btn-primary guardar"><i class="fa fa-save"> Registrar</i></button>
                              
                    </div>
                    <div class="ps-form__footer">

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
    
        </div>
    </form>
    </div>

</section>


     
