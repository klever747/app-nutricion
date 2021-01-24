<div class="modal fade" id="modals_registro_diagnostico" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="text-align: center;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><b>REGISTRO DE DIAGNOSTICO<b></h4>
            </div>
            <div class="modal-body">
                <div class="row">

                        <div class="col-lg-12">
                            <label for="">Nombre del Paciente</label>

                             <select class="js-example-basic-multiple" name="state" id="opcion_paciente_consulta" style="width:100%;">
                                <?php 
                              
                              foreach($pacientesList as $key => $value):?> 
                                  <option value="<?php echo $value->id_paciente; ?>"><?php echo $value->display_name; ?></option>
                                      
                              <?php endforeach ?>  
                            </select><br><br>

                        </div>
                        <div class="col-lg-12">
                                <label for="">Diagnostico</label>
                                <textarea  name="content" id="txtdescripcion_diagnostico" class="form-control" rows="8"></textarea><br>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="registrarDiagnostico()"><i class="fa fa-save"> Guardar</i></button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"> Cancelar</i></button>
                </div>
            </div>
        </div>
    </div>
</div>
