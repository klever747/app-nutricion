
    <div class="modal fade" id="modals_registro_menu" role="dialog">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
                <div class="modal-header" style="text-align: center;">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title"><b>REGISTRAR MENU</b></h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <input type='hidden' id = "idNutricionista" name='idNutricionista' value="<?PHP echo $pacientesMenu[0]->id_nutricionista; ?>">
                        <input type="hidden" name="" id="solomenu" value="soloMenu">
         
                            <div class="col-lg-12">
                                <label for="">Nombre del Paciente</label>
                                <select class="js-example-basic-multiple" name="state" id="id_paciente" style="width:100%;">

                                <?php foreach($pacientesMenu as $key => $value):?> 
                                    <option value="<?php echo $value->id_paciente; ?>"><?php echo $value->display_name; ?></option>
                                    
                                <?php endforeach ?>
                                </select><br><br>

                            </div>

                        
                            <div class="col-lg-12">
                                    <label for="">Nombre Menú</label>
                                    <input type="text" class="form-control" id="nombre_menu" onkeypress="return soloLetras(event)" placeholder="Ingrese el nombre del menú"><br>

                            </div>
                            <div class="col-lg-12">
                                    <label for="">Nombre de Preparación</label>
                                    <input type="text" class="form-control" id="nombre_preparacion" onkeypress="return soloLetras(event)" placeholder="Ingrese el nombre de la preparacion"><br>

                            </div>
                            <div class="col-lg-6">
                                    <label for="">Tipo de Menú</label>
                                        <?php 
                                        /*=============================================
                                            Metodo para extraer el Genero del paciente
                                        =============================================*/
                                        $url = CurlController::api()."tipo_menu?tabla_estado=tipo_menu&select=*";
                                        $method = "GET";
                                        $fields = array();
                                        $header = array();

                                        $menu = CurlController::request($url, $method, $fields, $header)->results;
                                        
                                         ?>

                                    <select class="js-example-basic-multiple" name="state" id="opcionMenu" style="width:100%;">
                                        <?php foreach($menu as $key => $value):?> 

                                            <option value="<?php echo $value->id_tipo_menu; ?>"><?php echo $value->nombre_tipo_menu; ?></option>
                                            
                                        <?php endforeach ?>        
                                    </select><br>
                            </div>
                            <div class="col-lg-6">
                                    <label for="">Calorias Totales</label>
                                    <input type="text" class="form-control" id="calorias_menu" onkeypress="return soloNumeros(event)" placeholder="Ingrese las calorías totales"
                                    oninput="parametros(this, 'grasas');"><br>
                            </div>
                            
                            <div class="col-lg-12">
                                 <div class="col-lg-6">
                                    <label for="">Carbohidrato Total</label>
                                    <input type="text" class="form-control" id="carbohidrato_menu" onkeypress="return soloNumeros(event)" placeholder="Ingrese los carbohidratos totales"
                                    oninput="parametros(this, 'grasas');"><br>
                                </div>

                                <div class="col-lg-6">
                                    <label for="">Grasa Total</label>
                                    <input type="text" class="form-control" id="grasa_menu" onkeypress="return soloNumeros(event)" placeholder="Ingrese la grasa total"
                                    oninput="parametros(this, 'grasas');"><br>
                                </div>
                                <div class="col-lg-6">
                                    <label for="">Proteína Total</label>
                                    <input type="text" class="form-control" id="proteina_menu" onkeypress="return soloNumeros(event)" placeholder="Ingrese la proteína total"
                                    oninput="parametros(this, 'grasas');"><br>
                                </div>
                                <div class=" col-lg-6 foto">
                            
                                    <label for="foto">Imagen</label>
                                    <div class="prevPhoto">
                                        <span class="delPhoto notBlock">X</span>
                                        <label for="foto"></label>

                                    </div>
                                    <div class="upimg">
                                        <input type="file" name="foto" id="foto" ><br>
                                    </div>
                                    <div id="form_alert"></div>
                            
                                </div>

                            </div>
                            <div class="col-lg-12">
                                <label for="">Descripcion del Menú</label>
                                <textarea name="descripcionIn" id="descripcion_menu" class="form-control" rows="8"></textarea ><br>
                            </div>
                            <div class="col-lg-12">
                                <label for="">Preparación</label>
                                <textarea name="preparacionIn" id="preparacion_menu" class="form-control" rows="8"></textarea ><br>
                            </div>
                            <div class="col-lg-12">
                                <label for="">Ingredientes</label>
                                <textarea name="ingredientesIn" id="ingredientes_menu" class="form-control" rows="8"></textarea><br>
                            </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="registrar_menu()"><i class="fa fa-save"> Guardar</i></button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"> Cancelar</i></button>
                </div>
          </div>
        </div>
    </div>