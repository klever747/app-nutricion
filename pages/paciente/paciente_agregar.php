
<script type="text/javascript" src="../"></script>
<div class="modal fade" id="modals_registro_paciente" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="text-align: center;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><b>REGISTRO DE PACIENTES</b></h4>

            </div>
            <div class="modal-body">
                <form method="POST" action="#" enctype="multipart/form-data" onsubmit="return false">
                    <div class="row">
                        <input type="hidden" value="<?php echo CurlController::api(); ?>" id ="urlAPI">
                            <div class="col-lg-12">
                                <label for="">Cedula</label>
                                <input type="text" class="form-control" id="txtcedula" placeholder="Ingrese la cedula" maxlength="11" onkeypress="return soloNumeros(event)" onchange="validarCI(event)">
                                <label for="" id="cedulaOK" style="color: red;"></label>
                                <input type="text" id="validarcedula" hidden><br>
                            </div>
                            <div class="col-lg-6">
                                <label for="">Nombres</label>
                                <input type="text" class="form-control" id="txtnombres" placeholder="Ingrese los nombres" maxlength="50" onkeypress="return soloLetras(event)"><br>

                            </div>
                            <div class="col-lg-6">
                                <label for="">Apellidos</label>
                                <input type="text" class="form-control" id="txtapellidop" placeholder="Ingrese el apellido paterno" maxlength="50" onkeypress="return soloLetras(event)" ><br>

                            </div>
                            <div class="col-lg-6">
                                <label for="">Móvil</label>
                                <input type="text" class="form-control" id="txtmovil" placeholder="Ingrese su movil" maxlength="10" onkeypress="return soloNumeros(event)" ><br>

                            </div>
                            <div class="col-lg-6">
                                <label for="">Dirección</label>
                                <input type="text" class="form-control" id="txtdireccion" placeholder="Ingrese el apellido materno" maxlength="50" onkeypress="return soloLetras(event)" ><br>
                            </div>

                            <div class="col-lg-12">

                            </div>
                          <div class="col-lg-6">
                            <label for="">Sexo</label>
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

                            <select class="js-example-basic-multiple" name="state" id="opcion_sexo" style="width:100%;">
                            <?php foreach($genero as $key => $value):?> 
                                <option value="<?php echo $value->id_genero; ?>"><?php echo $value->genero; ?></option>
                                    
                            <?php endforeach ?>        
                                </select><br>
                            </div>
                            <div class="col-lg-6">
                                <label for="">Edad</label>
                                <input type="text" class="form-control" id="txtedad" placeholder="Ingrese su edad" maxlength="10" onkeypress="return soloNumeros(event)" 
                                oninput="parametros(this, 'edad');"><br>
                            </div>
                             <div class="col-lg-6">
                                <label for="">Profesión</label>
                                <input type="text" class="form-control" id="Profesion" placeholder="Ingrese la profesion" maxlength="50" onkeypress="return soloLetras(event)" ><br>
                            </div>
                            <div class="col-lg-6">
                                <label for="">Ciudad</label>
                                <input type="text" class="form-control" id="ciudad" placeholder="Ingrese su ciudad Actual" onkeypress="return soloLetras(event)" ><br>
                            </div>

                            
                            <div class="col-lg-6">
                                    <label for="">Usuario</label>
                                    <input type="text" class="form-control" id="txtusuario" placeholder="Ingrese el usuario" maxlength="50"><br>
                            </div>

                            <div class="col-lg-6">
                                    <label for="">Contrase&ntilde;a</label>
                                    <input type="password" class="form-control"  id="txtPass" name = "foto" placeholder="Ingrese la contraseña" ><br>
                            </div>
                            <div class="col-lg-12">
                                    <label for="">Email</label>
                                    <input type="text" 
                                    class="form-control" 
                                    id="txtemail" 
                                    placeholder="Ingrese el email"
                                    onchange="validarEmail(event)"><br>
                                     <label for="" id="emailOK" style="color: red;"></label>
                                     <input type="text" id="validaremail" hidden><br>
                            </div>

                    </div>

                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary"  onclick="registrarPaciente()"><i class="fa fa-save"> Guardar</i></button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"> Cancelar</i></button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>