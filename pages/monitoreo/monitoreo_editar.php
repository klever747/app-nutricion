<div class="modal fade" id="modals_editar_monitoreo" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="text-align: center;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><b>EDITAR MONITOREO DEL PACIENTE</b></h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <input type='hidden' id = "idMonitoreo" name='idP' value="">
                        <div class="col-lg-12">
                            <input type="text" id="diagnostico_id" hidden>
                            <label for="">Paciente</label>
                             <input class="form-control" disabled id="opcion_paciente_monitoreo_editar"><br><br>
                        </div>
                      <div class="col-lg-12">
                            <label for="">Diagnostico</label>
                            <textarea name = "content1" id="txtdescripcion_diagnostico_editar" class="form-control" rows="8"></textarea><br>
                       </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="editarMonitoreo()"><i class="fa fa-save"> Guardar</i></button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"> Cancelar</i></button>
                </div>
            </div>
        </div>
    </div>
</div>