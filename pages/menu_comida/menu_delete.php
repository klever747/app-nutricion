<form autocomplete="false" onsubmit="return false">
    <div class="modal fade" id="modals_eliminar_menu" role="dialog">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
                <div class="modal-header" style="text-align: center;">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title"><b>ELIMINAR MENU</b></h4>
                </div>
                <div class="modal-body">
                    <div class="row">

                        <input type='hidden' id='foto_actualD' name='foto_actualD' value="">
                        <input type='hidden' id='foto_removeD' name='foto_removeD' value="">
                        <input type='hidden' id='id_menu_eliminar' name='id_menu_eliminar' value="">
                        
                            <div class="col-lg-12">
                                 <div class="col-lg-8">
                                    <label for="">Nombre Menú</label>
                                    <input type="text" class="form-control" id="nombre_menu_eliminar" onkeypress="return soloLetras(event)" placeholder="Ingrese el nombre del menú" disabled><br>

                                 </div>
                                  <div class="col-lg-8">
                                    <label for="">Nombre de Preparación</label>
                                    <input type="text" class="form-control" id="nombre_preparacion_eliminar" onkeypress="return soloLetras(event)" placeholder="Ingrese el nombre de la preparacion" disabled><br>

                            </div>

                            <div class="col-lg-6">
                                    

                                    <select class="js-example-basic-multiple" name="state" id="opcion_menu_eliminar" style="width:100%;"disabled>
                                        <?php echo $option; ?>
                                        <?php foreach($menu as $key => $value):?> 
                                            $option;
                                            <option  value="<?php echo $value->id_tipo_menu; ?>"><?php echo $value->nombre_tipo_menu; ?></option>
                                            
                                        <?php endforeach ?>        
                                    </select><br>
                            </div>
                                 <div class="col-lg-4">
                                    <label for="">Calorias Totales</label>
                                    <input type="text" class="form-control" id="calorias_eliminar" onkeypress="return soloNumeros(event)" placeholder="Ingrese las calorías totales"disabled><br>
                                 </div>
                            </div>
                            <div class="col-lg-12">
                                 <div class="col-lg-3">
                                    <label for="">Carbohidrato Total</label>
                                    <input type="text" class="form-control" id="carbohidrato_eliminar" onkeypress="return soloNumeros(event)" placeholder="Ingrese los carbohidratos totales"disabled><br>
                                </div>

                                <div class="col-lg-3">
                                    <label for="">Grasa Total</label>
                                    <input type="text" class="form-control" id="grasa_eliminar" onkeypress="return soloNumeros(event)" placeholder="Ingrese la grasa total"disabled><br>
                                </div>
                                <div class="col-lg-3">
                                    <label for="">Proteína Total</label>
                                    <input type="text" class="form-control" id="proteina_eliminar" onkeypress="return soloNumeros(event)" placeholder="Ingrese la proteína total"disabled><br>
                                </div>
                                <div class=" col-lg-6 fotoEdit">
                            
                                    <label for="fotoEdit">Imagen</label>
                                    <div class="prevPhotoEdit">
                                        <span class="delPhotoEdit notBlockEdit">X</span>
                                        <label for="fotoEdit"></label>
                                    </div>
                                    <div class="upimgEdit">
                                        <input type="file" name="fotoEdit" id="fotoEditD"  ><br>
                                    </div>
                                    <div id="form_alertEdit"></div>
                            
                                 </div>

                            </div>
                            <div class="col-lg-12">
                                            <label for="">Descripcion</label>
                                            <textarea id="descripcion_eliminar" class="form-control" rows="8"disabled></textarea><br>
                            </div>
                            <div class="col-lg-12">
                                            <label for="">Preparación</label>
                                            <textarea id="descripcion_preparacion_eliminar" class="form-control" rows="8"disabled></textarea><br>
                            </div>
                            <div class="col-lg-12">
                                            <label for="">Ingredientes</label>
                                            <textarea id="descripcion_ingredientes_eliminar" class="form-control" rows="8"disabled></textarea><br>
                            </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="eliminar_menu()"><i class="fa fa-trash"> Eliminar</i></button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"> Cancelar</i></button>
                </div>
          </div>
        </div>
    </div>
</form>