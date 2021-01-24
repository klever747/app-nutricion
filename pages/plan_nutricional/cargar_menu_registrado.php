
<script type="text/javascript" src="../../js/controller_menu_comida/menu_comida.js"></script>
<?php if ($_SESSION["user"]->id_rol == 1): ?>      
    <div class="modal fade" id="modal_cargar_menu" role="dialog">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
                <div class="modal-header" style="text-align: center;">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title"><b>REGISTRAR MENU</b></h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <input type='hidden' id = "idNutricionista3" name='idNutricionista' value="">
                        <input type='hidden' id = "id_paciente3" name='id_paciente' value="">
                            <div class="col-lg-12">
                                <label for="">Nombre del Paciente</label>
                                <input type="text" class="form-control" id="nombre_paciente3" onkeypress="return soloLetras(event)" placeholder="Ingrese el nombre del paciente" disabled><br>

                            </div>
                            
                             <div class="col-lg-12">
                                <label for="">Seleccione el menú de comida a cargar </label>
                                 <select class="js-example-basic-multiple" name="state" id="menu_cargar" style="width:100%;">

       
                                </select><br>
                             </div>
                            

                        <h4 class="modal-title" style="text-align: center;"><b>REGISTRAR EVENTO</b></h4>
                    
                    <div>
                        <div class="col-lg-4">
                            <label for="">Fecha Inicio</label>
                            <input type="date" name="" id="fecha_inicio_carg" class="form-control"><br><br>

                        </div>
                        <div class="col-lg-4">
                            <label for="">Fecha Fin</label>
                            <input type="date" name="" id="fecha_fin_carg" class="form-control"><br><br>

                        </div>
                        <div class="col-lg-12">
                            <label for="">Hora del Evento : </label>
                            <input type="time" id="hora_ini_carg" name="hora" min="18:00" max="21:00" step="3600" /><br>
                        </div>
                        <div class="col-lg-12">
                            <label for="">Hora Fin delEvento : </label>
                            <input type="time" id="hora_fin_carg" name="hora" min="18:00" max="21:00" step="3600" /><br>
                        </div>
                    <div class="modal-header" style="text-align: center;">
                        <div class="col-lg-12">
                            <label for="">Titulo del Evento</label>
                            <input type="text"  id="tittle_carg" class="form-control" rows="8"></input ><br>
                        </div>
                        
                        <div class="col-lg-12">
                            <label for="">Descripcion del Evento</label>
                            <textarea   id="descrip_carg" class="form-control" rows="8"></textarea><br>
                        </div>
                        <div class="col-lg-4">
                            <label for="">Color del Evento</label>
                            <input type="color"  id="color_carg" class="form-control" value="#FA2BFC" rows="8"></input ><br>
                        </div>
                    </div>
                </div>
                </div>
                <div class="modal-footer">
                    <button type="button"  class="btn btn-primary" onclick="registrar_menu_cargado()"><i class="fa fa-save"> Guardar</i></button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"> Cancelar</i></button>
                </div>
          </div>
        </div>

    </div>
<?php endif ?>