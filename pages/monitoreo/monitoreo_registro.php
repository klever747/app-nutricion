<?php 


//metodo para extraer datos de los pacientes

$url = CurlController::api()."relations?rel=nutricionista,paciente,users&type=nutricionista,paciente,user&linkTo=id_user&equalTo=".$_SESSION["user"]->id_user."&orderBy=id_paciente&orderMode=DESC&tabla_estado=users&select=*";
$method = "GET";
$fields = array();
$header = array();

$pacientes_monitoreo = CurlController::request($url, $method, $fields, $header)->results;


 ?>
<div class="modal fade" id="modals_registro_monitoreo" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="text-align: center;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><b>REGISTRO DEL MONITOREO<b></h4>
            </div>
            <div class="modal-body">
                <div class="row">

                        <div class="col-lg-12">
                            <label for="">Nombre del Paciente</label>

                             <select class="js-example-basic-multiple" name="state" id="opcion_paciente_monioreo" style="width:100%;">
                                <?php 
                              
                              foreach($pacientes_monitoreo as $key => $value):?> 
                                  <option value="<?php echo $value->id_paciente; ?>"><?php echo $value->display_name; ?></option>
                                      
                              <?php endforeach ?>  
                            </select><br><br>

                        </div>
                        <div class="col-lg-12">
                                <label for="">Diagnostico</label>
                                <textarea  name="content" id="descripcion_monitoreo" class="form-control" rows="8"></textarea><br>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="registrarMonitoreo()"><i class="fa fa-save"> Guardar</i></button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"> Cancelar</i></button>
                </div>
            </div>
        </div>
    </div>
</div>