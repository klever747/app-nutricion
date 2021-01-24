<?php 

//metodo para extraer datos de los pacientes

$url = CurlController::api()."relations?rel=nutricionista,paciente,users&type=nutricionista,paciente,user&linkTo=id_user&equalTo=".$_SESSION["user"]->id_user."&orderBy=id_paciente&orderMode=DESC&tabla_estado=users&select=id_paciente,display_name";
$method = "GET";
$fields = array();
$header = array();

$pacientesList = CurlController::request($url, $method, $fields, $header)->results;

 ?>

<form autocomplete="false" onsubmit="return false">
    <div class="modal fade" id="modals_registrar_encuesta" role="dialog">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
                <div class="modal-header" style="text-align: center;">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title"><b>REGISTRAR ENCUESTA ABCD</b></h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        
                            <div class="col-lg-12">
                                        <label for="">Paciente</label>
                                         <select class="js-example-basic-multiple" name="state" id="opcion_paciente_encuesta" style="width:100%;">
                                            <?php 
                              
                                          foreach($pacientesList as $key => $value):?> 
                                              <option value="<?php echo $value->id_paciente; ?>"><?php echo $value->display_name; ?></option>
                                                  
                                          <?php endforeach ?>  
                                        </select><br><br>
                                        
                            </div>
                            <div class="col-lg-12">
                                <label for="">Estado del paciente</label>
                                         <select class="js-example-basic-multiple" name="state" id="opcion_estado" style="width:100%;">
                                         
                                        <option value="1">Atendido</option>
                                        <option value="2">No atendido</option>        
                                          
                                        </select><br><br>
                            </div>

                                <div  class="col-lg-12"style="text-align: center">
                                         <b>DATOS ANTROPROMETICOS</b><br><br>
                                </div>
                                <div class="col-lg-12">
                                    <div class="col-lg-4">
                                        <label for="">Peso Paciente (Kg)</label>
                                        <input type="text"  class="form-control" id="txt_peso" onkeypress="return soloNumeros(event)" 
                                        placeholder="Ingrese el peso del paciente"
                                        oninput="parametros(this,'peso');">
                                        
                                     </div>
                                     
                                      <div class="col-lg-4">
                                        <label for="">Talla Paciente(cm)</label>
                                        <input type="text" class="form-control" id="txt_talla" onkeypress="return soloNumeros(event)" 
                                        placeholder="Ingrese el pliegue tricipital"
                                        oninput="parametros(this, 'talla');"><br>
                                     </div>
                                     <div class="col-lg-4">
                                        <label for="">Pliegue Bicipital(mm)</label>
                                        <input type="text" class="form-control" id="txtbicipital" onkeypress="return soloNumeros(event)" placeholder="Ingrese el pliegue bicipital"
                                        oninput="parametros(this, 'pliegues');"><br>
                                     </div>
                                     <div class="col-lg-4">
                                        <label for="">Pliegue Tricipital(mm)</label>
                                        <input type="text" class="form-control" id="txttricipital" onkeypress="return soloNumeros(event)" placeholder="Ingrese el pliegue tricipital"
                                        oninput="parametros(this,'pliegues');"><br>
                                     </div>
                                     
                                     <div class="col-lg-4">
                                        <label for="">Pliegue Subescapular(mm)</label>
                                        <input type="text" class="form-control" id="txtsubescapular" onkeypress="return soloNumeros(event)" placeholder="Ingrese el pliegue subescapular "
                                        oninput="parametros(this,'pliegues');"><br>
                                     </div>
                                </div>
                                <div class="col-lg-12">
                                     <div class="col-lg-4">
                                        <label for="">Pliegue Suprailíaco(mm)</label>
                                        <input type="text" class="form-control" id="txt_suprailiaco" onkeypress="return soloNumeros(event)" placeholder="Ingrese el pliegue suprailiaco"
                                        oninput="parametros(this,'pliegues');"><br>
                                     </div>
                                     <div class="col-lg-4">
                                        <label for="">Pliegue supraespinal(mm)</label>
                                        <input type="text" class="form-control" id="txt_supraespinal" onkeypress="return soloNumeros(event)" placeholder="Ingrese la cresta iliaca"
                                        oninput="parametros(this, 'pliegues');"><br>
                                     </div>
                                     <div class="col-lg-4">
                                        <label for="">Pliegue Abdominal(mm)</label>
                                        <input type="text" class="form-control" id="txt_abdominal" onkeypress="return soloNumeros(event)" placeholder="Ingrese el pliegue abdominal"
                                        oninput="parametros(this, 'pliegues');"><br>
                                     </div>
                                     


                                </div>
                                 <div class="col-lg-12">
                                     <div class="col-lg-4">
                                        <label for="">Pliegue del muslo(mm)</label>
                                        <input type="text" class="form-control" id="txtmuslo" onkeypress="return soloNumeros(event)" placeholder="Ingrese el pliegue del muslo "
                                        oninput="parametros(this, 'pliegues');"><br>
                                     </div>
                                     <div class="col-lg-4">
                                        <label for="">Pliegue de la pantorrilla(mm)</label>
                                        <input type="text" class="form-control" id="txtpantorrilla" onkeypress="return soloNumeros(event)" placeholder="Ingrese el pliegue de la pantorrilla"
                                        oninput="parametros(this, 'pliegues');"><br>
                                     </div>
                                     <div class="col-lg-4">
                                        <label for="">Circunferencia de Cintura(cm)</label>
                                        <input type="text" class="form-control" id="txt_circ_cintura" onkeypress="return soloNumeros(event)" placeholder="Ingrese la circunferencia de Cintura "
                                        oninput="parametros(this, 'circunferencia');"><br>
                                     </div>


                                </div>
                                  <div class="col-lg-12">
                                    <div class="col-lg-4">
                                        <label for="">Circunferencia de la Cadera(cm)</label>
                                        <input type="text" class="form-control" id="txt_cadera" onkeypress="return soloNumeros(event)" placeholder="Ingrese la circunferencia de cadera"
                                        oninput="parametros(this, 'circunferencia');"><br>
                                     </div>
                                     <div class="col-lg-4">
                                        <label for="">Circunferencia de Pantorrilla(cm)</label>
                                        <input type="text" class="form-control" id="txt_pantorrilla" onkeypress="return soloNumeros(event)" placeholder="Ingrese la circunferencia de pantorrilla"
                                        oninput="parametros(this, 'circunferencia')";><br>
                                     </div>
                                     
                                     <div class="col-lg-4">
                                        <label for="">Circunferencia de brazo relajado(cm)</label>
                                        <input type="text" class="form-control" id="txt_brazo_relajado" onkeypress="return soloNumeros(event)" placeholder="Circunferencia de brazo relajado"
                                        oninput="parametros(this, 'circunferencia');"><br>
                                     </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="col-lg-4">
                                        <label for="">Circunferencia del brazo contraído(cm)</label>
                                        <input type="text" class="form-control" id="txtbrazo_contraido" onkeypress="return soloNumeros(event)" placeholder="Ingrese la circunferencia del brazo contraido"
                                        oninput="parametros(this, 'circunferencia');"><br>
                                     </div>
                                     <div class="col-lg-4">
                                        <label for="">Biepicondileo Femur(cm)</label>
                                        <input type="text" class="form-control" id="txt_femur" onkeypress="return soloNumeros(event)" placeholder="Ingrese el biepicondileo del Femur"
                                        oninput="parametros(this, 'biepicondileo');"><br>
                                     </div>
                                     
                                     <div class="col-lg-4">
                                        <label for="">Biepicondileo Humero(cm)</label>
                                        <input type="text" class="form-control" id="txt_humero" onkeypress="return soloNumeros(event)" placeholder="Ingrese biepicondileo Humero "
                                        oninput="parametros(this, 'biepicondileo');"><br>
                                     </div>
                                </div>
                                
                            <div  class="col-lg-12"style="text-align: center">
                                         <b>DATOS DE LABORATORIO</b><br><br>
                            </div>
                            <div class="col-lg-12">
                                 <div class="col-lg-4">
                                    <label for="">Ácido urico(mg/dl)</label>
                                    <input type="text" class="form-control" id="txtacidourico" onkeypress="return soloNumeros(event)" placeholder="Ingrese el ácido úrico"
                                    oninput="parametros(this, 'bioquimicos');"><br>
                                 </div>
                                 <div class="col-lg-4">
                                    <label for="">Bilirubina Directa(mg/dl)</label>
                                    <input type="text" class="form-control" id="txtbilirubina_directa" onkeypress="return soloNumeros(event)" placeholder="Ingrese la bilirubina directa"
                                    oninput="parametros(this, 'bioquimicos')";><br>
                                 </div>
                                 <div class="col-lg-4">
                                    <label for="">Colestoral Total(mg/dl)</label>
                                    <input type="text" class="form-control" id="txtcolesterol_total" onkeypress="return soloNumeros(event)" placeholder="Ingrese el colesterol total "
                                    oninput="parametros(this, 'bioquimicos');"><br>
                                 </div>
                            </div>
                            <div class="col-lg-12">
                                 <div class="col-lg-4">
                                    <label for="">Colesterol hdl(mg/dl)</label>
                                    <input type="text" class="form-control" id="txt_colesterolhdl" onkeypress="return soloNumeros(event)" placeholder="Ingrese el colestoral hdl"
                                    oninput="parametros(this, 'bioquimicos');"><br>
                                 </div>
                                 <div class="col-lg-4">
                                    <label for="">Colesterol ldl(mg/dl)</label>
                                    <input type="text" class="form-control" id="txt_colesterol_ldl" onkeypress="return soloNumeros(event)" placeholder="Ingrese el colesterol ldl"
                                    oninput="parametros(this, 'bioquimicos');"><br>
                                 </div>
                                 <div class="col-lg-4">
                                    <label for="">Trigliceridos(mg/dl)</label>
                                    <input type="text" class="form-control" id="txt_trogliceridos" onkeypress="return soloNumeros(event)" placeholder="Ingrese el triglicerido"
                                    oninput="parametros(this, 'bioquimicos');"><br>
                                 </div>

                            </div>
                            <div class="col-lg-12">

                                 <div class="col-lg-4">
                                    <label for="">Glucosa ayunas(mg/dl)</label>
                                    <input type="text" class="form-control" id="txtglucosa_ayunas" onkeypress="return soloNumeros(event)" placeholder="Ingrese la glucosa ayunas"
                                    oninput="parametros(this, 'bioquimicos');"><br>
                                 </div>
                                 <div class="col-lg-4">
                                    <label for="">Glucosa postprandial(mg/dl)</label>
                                    <input type="text" class="form-control" id="txtglucosa_post" onkeypress="return soloNumeros(event)" placeholder="Ingrese el colesterol postprandial "
                                    oninput="parametros(this, 'bioquimicos');"><br>
                                 </div>
                                 <div class="col-lg-4">
                                    <label for="">Creatinina(ml/min)</label>
                                    <input type="text" class="form-control" id="txt_creatinina" onkeypress="return soloNumeros(event)" placeholder="Ingrese la creatinina"
                                    oninput="parametros(this, 'bioquimicos');"><br>
                                 </div>

                            </div>
                             <div class="col-lg-12">
                                 <div class="col-lg-4">
                                    <label for="">tgo paciente(unidades/litro)</label>
                                    <input type="text" class="form-control" id="txttgo" onkeypress="return soloNumeros(event)" placeholder="Ingrese el tgo paciente"
                                    oninput="parametros(this, 'bioquimicos');"><br>
                                 </div>
                                 <div class="col-lg-4">
                                    <label for="">tgp paciente(unidades/litro)</label>
                                    <input type="text" class="form-control" id="txttgp" onkeypress="return soloNumeros(event)" placeholder="Ingrese el tgp paciente "
                                    oninput="parametros(this, 'bioquimicos');"><br>
                                 </div>
                                 <div class="col-lg-4">
                                    <label for="">Eritocitos</label>
                                    <input type="text" class="form-control" id="txteritocitos" onkeypress="return soloNumeros(event)" placeholder="Ingrese la cantidad de eritocitos"
                                    oninput="parametros(this, 'bioquimicos');"><br>
                                 </div>

                            </div>
                             <div class="col-lg-12">

                                 <div class="col-lg-4">
                                    <label for="">Conteo Plaquetario(mg/dl)</label>
                                    <input type="text" class="form-control" id="txtconteo_plaquetario" onkeypress="return soloNumeros(event)" placeholder="Ingrese el conteo plaquetario"
                                    oninput="parametros(this, 'bioquimicos');"><br>
                                 </div>
                                 <div class="col-lg-4">
                                    <label for="">Hemoglobina(mg/dl)</label>
                                    <input type="text" class="form-control" id="txthemoglobina" onkeypress="return soloNumeros(event)" placeholder="Ingrese la hemoglobina "
                                    oninput="parametros(this, 'bioquimicos');"><br>
                                 </div>
                                 <div class="col-lg-4">
                                    <label for="">Hematocritos(mg/dl)</label>
                                    <input type="text" class="form-control" id="txthematocritos" onkeypress="return soloNumeros(event)" placeholder="Ingrese la cantidad de hematocitos"
                                    oninput="parametros(this, 'bioquimicos');"><br>
                                 </div>

                            </div>
                             <div class="col-lg-12">
                                <div class="col-lg-4">
                                    <label for="">Leucositos(mg/dl)</label>
                                    <input type="text" class="form-control" id="txtleucositos" onkeypress="return soloNumeros(event)" placeholder="Ingrese los leucositos"
                                    oninput="parametros(this, 'bioquimicos');"><br>
                                 </div>
                                 <div class="col-lg-4">
                                    <label for="">linfocitos(mg/dl)</label>
                                    <input type="text" class="form-control" id="txtlinfocitos" onkeypress="return soloNumeros(event)" placeholder="Ingrese los linfocitos"
                                    oninput="parametros(this, 'bioquimicos');"><br>
                                 </div>
                                 <div class="col-lg-4">
                                    <label for="">Neutrofilos Segmentados (N/S por mm³)</label>
                                    <input type="text" class="form-control" id="txtneutrofilos_seg" onkeypress="return soloNumeros(event)" placeholder="Ingrese los neutrofilos segmentados"
                                    oninput="parametros(this, 'bioquimicos');"><br>
                                 </div>

                            </div>
                            <div class="col-lg-12">
                                 <div class="col-lg-3">
                                    <label for="">Neutrofilos No Segmentados (N/S por mm³)</label>
                                    <input type="text" class="form-control" id="txtneutrofilos_noseg" onkeypress="return soloNumeros(event)" placeholder="Ingrese los neutrofilos no segmentados"
                                    oninput="parametros(this, 'bioquimicos');"><br>
                                 </div>

                                 <div class="col-lg-3">
                                    <label for="">Eosinofilosgm(células/mcL)</label>
                                    <input type="text" class="form-control" id="txteosinofilos" onkeypress="return soloNumeros(event)" placeholder="Ingrese los eosinofilos"
                                    oninput="parametros(this, 'bioquimicos');"><br>
                                 </div>
                                 <div class="col-lg-3">
                                    <label for="">Basofilos(células/mcL)</label>
                                    <input type="text" class="form-control" id="txtBasofilos" onkeypress="return soloNumeros(event)" placeholder="Ingrese los basofilos"
                                    oninput="parametros(this, 'bioquimicos');"><br>
                                 </div>
                                  <div class="col-lg-3">
                                    <label for="">Monocitos(células/mcL)</label>
                                    <input type="text" class="form-control" id="txtmonocitos" onkeypress="return soloNumeros(event)" placeholder="Ingrese los monocitos"
                                    oninput="parametros(this, 'bioquimicos');"><br>
                                 </div>
                            </div>
                                
                                 <div  class="col-lg-12"style="text-align: center">
                                             <b>DATOS CLINICOS </b><br><br>
                                </div>
                                <div class="col-lg-12">
                                    <label for="">Descripci&oacute;n</label>
                                    <textarea name="clinico" id="txtdescripcion_clinicos" class="form-control" rows="8"></textarea><br>

                                </div>
                                 <div  class="col-lg-12"style="text-align: center">
                                             <b>DATOS DIETÉTICOS </b><br><br>
                                </div>
                                <div class="col-lg-12">
                                    <label for="">Descripci&oacute;n</label>
                                    <textarea name="dietetico" id="txtdescripcion_dietetico" class="form-control" rows="8"></textarea><br>

                                </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="Registrar_encuesta()"><i class="fa fa-save"> Guardar</i></button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"> Cancelar</i></button>
                </div>
          </div>
        </div>
    </div>
</form>