<form autocomplete="false" onsubmit="return false">
    <div class="modal fade" id="modals_editar_menu" role="dialog">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
                <div class="modal-header" style="text-align: center;">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title"><b>MODIFICAR MENU</b></h4>
                </div>
                <div class="modal-body">
                    <div class="row">

                        <input type='hidden' id='foto_actual' name='foto_actual' value="">
                        <input type='hidden' id='foto_remove' name='foto_remove' value="">
                        <input type='hidden' id='id_menu' name='id_menu' value="">
                        
                            <div class="col-lg-12">
                                 <div class="col-lg-12">
                                    <label for="">Nombre Menú</label>
                                    <input type="text" class="form-control" id="txtnombre_menu_editar" onkeypress="return soloLetras(event)" placeholder="Ingrese el nombre del menú"><br>

                                 </div>
                                  <div class="col-lg-12">
                                    <label for="">Nombre de Preparación</label>
                                    <input type="text" class="form-control" id="txtnombre_preparacion_editar" onkeypress="return soloLetras(event)" placeholder="Ingrese el nombre de la preparacion"><br>

                            </div>

                            <div class="col-lg-6">
                                    

                                    <select class="js-example-basic-multiple" name="state" id="opcion_menu_editar" style="width:100%;">
                                        <?php echo $option; ?>
                                        <?php foreach($menu as $key => $value):?> 
                                            $option;
                                            <option  value="<?php echo $value->id_tipo_menu; ?>"><?php echo $value->nombre_tipo_menu; ?></option>
                                            
                                        <?php endforeach ?>        
                                    </select><br>
                            </div>
                                 <div class="col-lg-6">
                                    <label for="">Calorias Totales</label>
                                    <input type="text" class="form-control" id="txtcalorias_editar" onkeypress="return soloNumeros(event)" placeholder="Ingrese las calorías totales"
                                    oninput="parametros(this, 'grasas');"><br>
                                 </div>
                            </div>
                            <div class="col-lg-12">
                                 <div class="col-lg-6">
                                    <label for="">Carbohidrato Total</label>
                                    <input type="text" class="form-control" id="txtcarbohidrato_editar" onkeypress="return soloNumeros(event)" placeholder="Ingrese los carbohidratos totales"
                                    oninput="parametros(this, 'grasas');"><br>
                                </div>

                                <div class="col-lg-6">
                                    <label for="">Grasa Total</label>
                                    <input type="text" class="form-control" id="txtgrasa_editar" onkeypress="return soloNumeros(event)" placeholder="Ingrese la grasa total"
                                    oninput="parametros(this, 'grasas');"><br>
                                </div>
                                <div class="col-lg-6">
                                    <label for="">Proteína Total</label>
                                    <input type="text" class="form-control" id="txtproteina_editar" onkeypress="return soloNumeros(event)" placeholder="Ingrese la proteína total"
                                    oninput="parametros(this, 'grasas');"><br>
                                </div>
                                <div class=" col-lg-6 fotoEdit">
                            
                                    <label for="fotoEdit">Imagen</label>
                                    <div class="prevPhotoEdit">
                                        <span class="delPhotoEdit notBlockEdit">X</span>
                                        <label for="fotoEdit"></label>
                                    </div>
                                    <div class="upimgEdit">
                                        <input type="file" name="fotoEdit" id="fotoEdit" ><br>
                                    </div>
                                    <div id="form_alertEdit"></div>
                            
                                 </div>

                            </div>
                            <div class="col-lg-12">
                                <label for="">Descripcion</label>
                                <textarea name="descrip" id="txtdescripcioneditar" class="form-control" rows="8"></textarea><br>
                            </div>
                            <div class="col-lg-12">
                                <label for="">Preparación</label>
                                <textarea name="prepara" id="txtdescripcion_preparacion_editar" class="form-control" rows="8"></textarea><br>
                            </div>
                            <div class="col-lg-12">
                                <label for="">Ingredientes</label>
                                <textarea name="ingredi" id="txtdescripcion_ingredientes_editar" class="form-control" rows="8"></textarea><br>
                            </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="editar_menu()"><i class="fa fa-save"> Guardar</i></button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"> Cancelar</i></button>
                </div>
          </div>
        </div>
    </div>
</form>