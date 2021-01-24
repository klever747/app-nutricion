<form autocomplete="false" onsubmit="return false">
    <div class="modal fade" id="modals_editar_encuesta_dietetico" role="dialog">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
                <div class="modal-header" style="text-align: center;">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title"><b>MODIFICAR ENCUESTA ABC</b></h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" name="idEncuestaDie" id="idEncuestaDie" value="">
                            <div class="col-lg-6" style="width:100%;">
                                <label for="">Nombre Paciente</label>
                                <input type="text" class="form-control" id="txtnombres_paciente_die" placeholder="Nombre_paciente" maxlength="50" onkeypress="return soloLetras(event)" disabled ><br>

                            </div>
                                 <div  class="col-lg-12"style="text-align: center">
                                             <b>DATOS DIATÉTICOS </b><br><br>
                                </div>
                                <div class="col-lg-12">
                                            <label for="">Descripci&oacute;n</label>
                                            <textarea name="dieteticoEdit" id="txtdescripcion_dietetico_edit" class="form-control" rows="8"></textarea><br>

                                </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="editar_dietetico()"><i class="fa fa-save"> Guardar</i></button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"> Cancelar</i></button>
                </div>
          </div>
        </div>
    </div>
</form>