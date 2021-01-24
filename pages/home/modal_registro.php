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

<!--Modal para el registro de pacientes-->
<link rel="stylesheet"  href="../../resources/plugins/sweetAlert2/sweetalert2.min.css">
<form method="POST"  novalidate>
     <div class="modal fade" id="nutricionista" role="dialog">
              <div class="modal-dialog modal-lg">
                  <div class="modal-content needs-validation"  novalidate>
                  
                      <div class="modal-header " style="text-align: center;">
                          <button type="button " class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title"><b>REGISTRO DE NUTRICIONISTA</b></h4>
                      </div>
                    
                      <div class="modal-body">
                          <div class="row">

                              <input type="hidden" value="<?php echo CurlController::api(); ?>" id ="urlAPI">
                                  <div class="col-lg-12">
                                      <label for="">Cedula</label>
                                      <input type="text"
                                       class="form-control"
                                       id="txtcedula" 
                                       placeholder="Ingrese la cedula" 
                                       maxlength="11" 
                                       onkeypress="return validateNumber(event)" 
                                       onchange="validar()"
                                       name="regCedula" required>
                                      <label for="" id="cedulaOK" style="color: red;"></label>
                                      <input type="text" id="validarcedula" hidden><br>
                                  </div>
                                  <div class="col-lg-6">
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
                                  <div class="col-lg-6">
                                      <label for="">Apellidos</label>
                                      <input type="text" class="form-control" id="txtapellidop" placeholder="Ingrese el apellido paterno" maxlength="50" onchange="validateJS(event,'text')"
                                      name="regApellido" 
                                      required ><br>
                                      <label for="" id="text_ok" style="color: red;"></label>
                                      <input type="text" id="validartexto" hidden><br>
                                     
                                  </div>
                                  <!--
                                  <div class="col-lg-6">
                                      <label for="">Móvil</label>
                                      <input type="text" class="form-control" 
                                      id="txtmovil" placeholder="Ingrese su movil"
                                      maxlength="10" 
                                      onkeypress="return validateNumber(event)"
                                      name="regMovil" 
                                      required ><br>
                                     
                                  </div>
                                  <div class="col-lg-6">
                                      <label for="">Dirección</label>
                                      <input type="text" 
                                      class="form-control" 
                                      id="direccion" 
                                      placeholder="Ingrese la direccion"
                                      onchange="validateJS(event,'text')"
                                      name="regDireccion" 
                                      required ><br>
                                      <label for="" id="text_ok" style="color: red;"></label>
                                      <input type="text" id="validartexto" hidden><br>
                                  </div>
                                  -->
                                  
                                <div class="col-lg-6">
                                  <label for="">Género</label>
                                  <select class="js-example-basic-multiple" name="regGenero" id="opcion_sexo" style="width:100%;">
                                    <?php foreach($genero as $key => $value):?> 
                                      <option value="<?php echo $value->id_genero; ?>"><?php echo $value->genero; ?></option>
                                    
                                   <?php endforeach ?> 
                                  </select><br>
                                  </div>
                                  <!--
                                  <div class="col-lg-6">
                                      <label for="">Ingrese su edad</label>
                                      <input type="text" 
                                      class="form-control" 
                                      id="txt_edad" 
                                      placeholder="Ingrese su edad"
                                      name="regEdad" 
                                      onkeypress="return validateNumber(event)"
                                      required ><br>
                                      
                                  </div>
                                  
                                  <div class="col-lg-6">
                                      <label for="">Ciudad</label>
                                      <input type="text" 
                                      class="form-control" 
                                      id="ciudad" 
                                      placeholder="Ingrese su ciudad Actual" 
                                      onchange="validateJS(event,'text')"
                                      name="regCiudad"  ><br>
                                      <label for="" id="text_ok" style="color: red;"></label>
                                      <input type="text" id="validartexto" hidden><br>
                                     
                                  </div>
                                -->
                                  <div class="col-lg-6">
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
                                  <!--
                                  <div class="col-lg-6">
                                          <label for="">Usuario</label>
                                          <input type="text" 
                                          class="form-control" 
                                          id="txtusuario" 
                                          placeholder="Ingrese el usuario" maxlength="50"
                                          name="regUser" 
                                          required><br>
                                     
                                  </div>
                                -->
                                  <div class="col-lg-6">
                                          <label for="">Contrase&ntilde;a</label>
                                          <input type="password" 
                                          class="form-control" 
                                          id="txtcontrasena" 
                                          onchange="validateJS(event,'password')"
                                          name="regPassword" 
                                          laceholder="Ingrese la contraseña" 
                                          required><br>
                                        
                                  </div>

                          </div>
                          <?php 
                              $register = new UsersController();
                              $register->register();
                           ?>
                          <div class="modal-footer">
                              <button type="submit" class="btn btn-primary guardar"><i class="fa fa-save"> Guardar</i></button>
                              <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"> Cancelar</i></button>
                          </div>
                      </div>
                  </form>
                  </div>
              </div>
     </div>
     <script src="../../resources/plugins/sweetAlert2/sweetalert2.all.min.js"></script>
     <script src="../../resources/popper/popper.min.js"></script>
     <script src="../../login/js/validaciones.js"></script>