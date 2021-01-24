
<form autocomplete="false" onsubmit="return false">
    <div class="modal fade" id="modals_editar_encuesta" role="dialog">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
                <div class="modal-header" style="text-align: center;">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title"><b>MODIFICAR DATOS ANTROPOMETRICOS</b></h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        
                           <input type="hidden" name="idPaciente" id="idPaciente" value="">
                           <input type="hidden" name="idEncuesta" id="idEncuesta" value="">
                            <div class="col-lg-6" style="width:100%;">
                                <label for="">Nombre Paciente</label>
                                <input type="text" class="form-control" id="txtnombres_paciente" placeholder="Nombre_paciente" maxlength="50" onkeypress="return soloLetras(event)" disabled ><br>

                            </div>
                            <div class="col-lg-12">
                                <label for="">Estado del paciente</label>
                                         <select class="js-example-basic-multiple" name="state" id="opcion_estado_edit" style="width:100%;">
                                         
                                        <option value="1">Atendido</option>
                                        <option value="2">No atendido</option>        
                                          
                                        </select><br><br>
                            </div>

                                <div  class="col-lg-12"style="text-align: center">
                                         <b>DATOS DE ANTROPROMETICOS</b><br><br>
                                </div>
                                <div class="col-lg-12">
                                    <div class="col-lg-4">
                                        <label for="">Peso Paciente(Kg)</label>
                                        <input type="text" class="form-control" id="txt_peso_edit" onkeypress="return soloNumeros(event)" placeholder="Ingrese el pliegue tricipital"
                                        oninput="parametros(this,'peso');"><br>
                                     </div>
                                      <div class="col-lg-4">
                                        <label for="">Talla Paciente(cm)</label>
                                        <input type="text" class="form-control" id="txt_talla_edit" onkeypress="return soloNumeros(event)" placeholder="Ingrese la talla del paciente"
                                        oninput="parametros(this, 'talla');"><br>
                                     </div>
                                     <div class="col-lg-4">
                                        <label for="">Pliegue Bicipital(mm)</label>
                                        <input type="text" class="form-control" id="txtbicipital_edit" onkeypress="return soloNumeros(event)" placeholder="Ingrese el pliegue bicipital"
                                        oninput="parametros(this, 'pliegues');"><br>
                                     </div>
                                     <div class="col-lg-4">
                                        <label for="">Pliegue Tricipital(mm)</label>
                                        <input type="text" class="form-control" id="txttricipital_edit" onkeypress="return soloNumeros(event)" placeholder="Ingrese el pliegue tricipital"
                                        oninput="parametros(this, 'pliegues');"><br>
                                     </div>
                                     
                                     <div class="col-lg-4">
                                        <label for="">Pliegue Subescapular(mm)</label>
                                        <input type="text" class="form-control" id="txtsubescapular_edit" onkeypress="return soloNumeros(event)" placeholder="Ingrese el pliegue subescapular "
                                        oninput="parametros(this, 'pliegues');"><br>
                                     </div>
                                </div>
                                <div class="col-lg-12">
                                     <div class="col-lg-4">
                                        <label for="">Pliegue Suprailíaco(mm)</label>
                                        <input type="text" class="form-control" id="txt_suprailiaco_edit" onkeypress="return soloNumeros(event)" placeholder="Ingrese el pliegue suprailiaco"oninput="parametros(this, 'pliegues');"><br>
                                     </div>
                                     <div class="col-lg-4">
                                        <label for="">Pliegue supraespinal(mm)</label>
                                        <input type="text" class="form-control" id="txt_supraespinal_edit" onkeypress="return soloNumeros(event)" placeholder="Ingrese la cresta iliaca"
                                        oninput="parametros(this, 'pliegues');"><br>
                                     </div>
                                     <div class="col-lg-4">
                                        <label for="">Pliegue Abdominal</label>
                                        <input type="text" class="form-control" id="txt_abdominal_edit" onkeypress="return soloNumeros(event)" placeholder="Ingrese el pliegue abdominal"
                                        oninput="parametros(this, 'pliegues');"><br>
                                     </div>
                                     


                                </div>
                                 <div class="col-lg-12">
                                     <div class="col-lg-4">
                                        <label for="">Pliegue del muslo(mm)</label>
                                        <input type="text" class="form-control" id="txtmuslo_edit" onkeypress="return soloNumeros(event)" placeholder="Ingrese el pliegue del muslo "
                                        oninput="parametros(this, 'pliegues');"><br>
                                     </div>
                                     <div class="col-lg-4">
                                        <label for="">Pliegue de la pantorrilla(mm)</label>
                                        <input type="text" class="form-control" id="txtpantorrilla_edit" onkeypress="return soloNumeros(event)" placeholder="Ingrese el pliegue de la pantorrilla"
                                        oninput="parametros(this, 'pliegues');"><br>
                                     </div>
                                     <div class="col-lg-4">
                                        <label for="">Circunferencia de Cintura(cm)</label>
                                        <input type="text" class="form-control" id="txt_circ_cintura_edit" onkeypress="return soloNumeros(event)" placeholder="Ingrese la circunferencia de Cintura "
                                        oninput="parametros(this, 'circunferencia');"><br>
                                     </div>


                                </div>
                                  <div class="col-lg-12">
                                    <div class="col-lg-4">
                                        <label for="">Circunferencia de la Cadera(cm)</label>
                                        <input type="text" class="form-control" id="txt_cadera_edit" onkeypress="return soloNumeros(event)" placeholder="Ingrese la circunferencia de cadera"
                                        oninput="parametros(this, 'circunferencia');"><br>
                                     </div>
                                     <div class="col-lg-4">
                                        <label for="">Circunferencia de Pantorrilla(cm)</label>
                                        <input type="text" class="form-control" id="txt_pantorrilla_edit" onkeypress="return soloNumeros(event)" placeholder="Ingrese la circunferencia de pantorrilla"
                                        oninput="parametros(this, 'circunferencia');"><br>
                                     </div>
                                     
                                     <div class="col-lg-4">
                                        <label for="">Circunferencia de brazo relajado(cm)</label>
                                        <input type="text" class="form-control" id="txt_brazo_relajado_edit" onkeypress="return soloNumeros(event)" placeholder="Circunferencia de brazo relajado"
                                        oninput="parametros(this, 'circunferencia');"><br>
                                     </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="col-lg-4">
                                        <label for="">Circunferencia del brazo contraído(cm)</label>
                                        <input type="text" class="form-control" id="txtbrazo_contraido_edit" onkeypress="return soloNumeros(event)" placeholder="Ingrese la circunferencia del brazo contraido"
                                        oninput="parametros(this, 'circunferencia');"><br>
                                     </div>
                                     <div class="col-lg-4">
                                        <label for="">Biepicondileo Femur(cm)</label>
                                        <input type="text" class="form-control" id="txt_femur_edit" onkeypress="return soloNumeros(event)" placeholder="Ingrese el biepicondileo del Femur"
                                        oninput="parametros(this, 'biepicondileo');"><br>
                                     </div>
                                     
                                     <div class="col-lg-4">
                                        <label for="">Biepicondileo Humero(cm)</label>
                                        <input type="text" class="form-control" id="txt_humero_edit" onkeypress="return soloNumeros(event)" placeholder="Ingrese biepicondileo Humero "
                                        oninput="parametros(this, 'biepicondileo');"><br>
                                     </div>
                                </div>
                                

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="actualizar_antro()"><i class="fa fa-save"> Guardar</i></button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"> Cancelar</i></button>
                </div>
          </div>
        </div>
    </div>
</form>