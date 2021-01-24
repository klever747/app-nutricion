<form autocomplete="false" onsubmit="return false">
    <div class="modal fade" id="modals_editar_bioquimico" role="dialog">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
                <div class="modal-header" style="text-align: center;">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title"><b>MODIFICAR ENCUESTA ABC</b></h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" name="idPacienteBio" id="idPacienteBio" value="">
                        <input type="hidden" name="idEncuestaBio" id="idEncuestaBio" value="">
                            <div class="col-lg-6" style="width:100%;">
                                <label for="">Nombre Paciente</label>
                                <input type="text" class="form-control" id="txtnombres_paciente_Bio" placeholder="Nombre_paciente" maxlength="50" onkeypress="return soloLetras(event)" disabled ><br>

                            </div>

            
                            <div  class="col-lg-12"style="text-align: center">
                                         <b>DATOS DE LABORATORIO</b><br><br>
                            </div>
                            <div class="col-lg-12">
                                 <div class="col-lg-4">
                                    <label for="">Ácido urico</label>
                                    <input type="text" class="form-control" id="txtacidourico_edit" onkeypress="return soloNumeros(event)" placeholder="Ingrese el ácido úrico"
                                    oninput="parametros(this, 'bioquimicos');"><br>
                                 </div>
                                 <div class="col-lg-4">
                                    <label for="">Bilirubina Directa</label>
                                    <input type="text" class="form-control" id="txtbilirubina_directa_edit" onkeypress="return soloNumeros(event)" placeholder="Ingrese la bilirubina directa"
                                    oninput="parametros(this, 'bioquimicos');"><br>
                                 </div>
                                 <div class="col-lg-4">
                                    <label for="">Colestoral Total</label>
                                    <input type="text" class="form-control" id="txtcolesterol_total_edit" onkeypress="return soloNumeros(event)" placeholder="Ingrese el colesterol total "
                                    oninput="parametros(this, 'bioquimicos');"><br>
                                 </div>
                            </div>
                            <div class="col-lg-12">
                                 <div class="col-lg-4">
                                    <label for="">Colesterol hdl</label>
                                    <input type="text" class="form-control" id="txt_colesterolhdl_edit" onkeypress="return soloNumeros(event)" placeholder="Ingrese el colestoral hdl"
                                    oninput="parametros(this, 'bioquimicos');"><br>
                                 </div>
                                 <div class="col-lg-4">
                                    <label for="">Colesterol ldl</label>
                                    <input type="text" class="form-control" id="txt_colesterol_ldl_edit" onkeypress="return soloNumeros(event)" placeholder="Ingrese el colesterol ldl"
                                    oninput="parametros(this, 'bioquimicos');"><br>
                                 </div>
                                 <div class="col-lg-4">
                                    <label for="">Trigliceridos</label>
                                    <input type="text" class="form-control" id="txt_trogliceridos_edit" onkeypress="return soloNumeros(event)" placeholder="Ingrese el triglicerido"
                                    oninput="parametros(this, 'bioquimicos');"><br>
                                 </div>

                            </div>
                            <div class="col-lg-12">

                                 <div class="col-lg-4">
                                    <label for="">Glucosa ayunas</label>
                                    <input type="text" class="form-control" id="txtglucosa_ayunas_edit" onkeypress="return soloNumeros(event)" placeholder="Ingrese la glucosa ayunas"
                                    oninput="parametros(this, 'bioquimicos');"><br>
                                 </div>
                                 <div class="col-lg-4">
                                    <label for="">Glucosa postprandial</label>
                                    <input type="text" class="form-control" id="txtglucosa_post_edit" onkeypress="return soloNumeros(event)" placeholder="Ingrese el colesterol postprandial "
                                    oninput="parametros(this, 'bioquimicos');"><br>
                                 </div>
                                 <div class="col-lg-4">
                                    <label for="">Creatinina</label>
                                    <input type="text" class="form-control" id="txt_creatinina_edit" onkeypress="return soloNumeros(event)" placeholder="Ingrese la creatinina"
                                    oninput="parametros(this, 'bioquimicos');"><br>
                                 </div>

                            </div>
                             <div class="col-lg-12">
                                 <div class="col-lg-4">
                                    <label for="">tgo paciente</label>
                                    <input type="text" class="form-control" id="txttgo_edit" onkeypress="return soloNumeros(event)" placeholder="Ingrese el tgo paciente"
                                    oninput="parametros(this, 'bioquimicos');"><br>
                                 </div>
                                 <div class="col-lg-4">
                                    <label for="">tgp paciente</label>
                                    <input type="text" class="form-control" id="txttgp_edit" onkeypress="return soloNumeros(event)" placeholder="Ingrese el tgp paciente "
                                    oninput="parametros(this, 'bioquimicos');"><br>
                                 </div>
                                 <div class="col-lg-4">
                                    <label for="">Eritocitos</label>
                                    <input type="text" class="form-control" id="txteritocitos_edit" onkeypress="return soloNumeros(event)" placeholder="Ingrese la cantidad de eritocitos"
                                    oninput="parametros(this, 'bioquimicos');"><br>
                                 </div>

                            </div>
                             <div class="col-lg-12">

                                 <div class="col-lg-4">
                                    <label for="">Conteo Plaquetario</label>
                                    <input type="text" class="form-control" id="txtconteo_plaquetario_edit" onkeypress="return soloNumeros(event)" placeholder="Ingrese el conteo plaquetario"
                                    oninput="parametros(this, 'bioquimicos');"><br>
                                 </div>
                                 <div class="col-lg-4">
                                    <label for="">Hemoglobina</label>
                                    <input type="text" class="form-control" id="txthemoglobina_edit" onkeypress="return soloNumeros(event)" placeholder="Ingrese la hemoglobina "
                                    oninput="parametros(this, 'bioquimicos');"><br>
                                 </div>
                                 <div class="col-lg-4">
                                    <label for="">Hematocritos</label>
                                    <input type="text" class="form-control" id="txthematocritos_edit" onkeypress="return soloNumeros(event)" placeholder="Ingrese la cantidad de hematocitos"
                                    oninput="parametros(this, 'bioquimicos');"><br>
                                 </div>

                            </div>
                             <div class="col-lg-12">
                                <div class="col-lg-4">
                                    <label for="">Leucositos</label>
                                    <input type="text" class="form-control" id="txtleucositos_edit" onkeypress="return soloNumeros(event)" placeholder="Ingrese los leucositos"
                                    oninput="parametros(this, 'bioquimicos');"><br>
                                 </div>
                                 <div class="col-lg-4">
                                    <label for="">linfocitos</label>
                                    <input type="text" class="form-control" id="txtlinfocitos_edit" onkeypress="return soloNumeros(event)" placeholder="Ingrese los linfocitos"
                                    oninput="parametros(this, 'bioquimicos');"><br>
                                 </div>
                                 <div class="col-lg-4">
                                    <label for="">Neutrofilos Segmentados</label>
                                    <input type="text" class="form-control" id="txtneutrofilos_seg_edit" onkeypress="return soloNumeros(event)" placeholder="Ingrese los neutrofilos segmentados"
                                    oninput="parametros(this, 'bioquimicos');"><br>
                                 </div>

                            </div>
                            <div class="col-lg-12">
                                 <div class="col-lg-3">
                                    <label for="">Neutrofilos No Segmentados</label>
                                    <input type="text" class="form-control" id="txtneutrofilos_noseg_edit" onkeypress="return soloNumeros(event)" placeholder="Ingrese los neutrofilos no segmentados"
                                    oninput="parametros(this, 'bioquimicos');"><br>
                                 </div>

                                 <div class="col-lg-3">
                                    <label for="">Eosinofilosgm</label>
                                    <input type="text" class="form-control" id="txteosinofilos_edit" onkeypress="return soloNumeros(event)" placeholder="Ingrese los eosinofilos"
                                    oninput="parametros(this, 'bioquimicos');"><br>
                                 </div>
                                 <div class="col-lg-3">
                                    <label for="">Basofilos</label>
                                    <input type="text" class="form-control" id="txtBasofilos_edit" onkeypress="return soloNumeros(event)" placeholder="Ingrese los basofilos"
                                    oninput="parametros(this, 'bioquimicos');"><br>
                                 </div>
                                  <div class="col-lg-3">
                                    <label for="">Monocitos</label>
                                    <input type="text" class="form-control" id="txtmonocitos_edit" onkeypress="return soloNumeros(event)" placeholder="Ingrese los monocitos"
                                    oninput="parametros(this, 'bioquimicos');"><br>
                                 </div>
                            </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="actualizar_bioquimico()"><i class="fa fa-save"> Guardar</i></button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"> Cancelar</i></button>
                </div>
          </div>
        </div>
    </div>
</form>