
<!-- Modal para editar al paciente -->
 <div class="modal fade" id="modals_editar_paciente" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="text-align: center;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><b>EDITAR DATOS DEL PACIENTE</b></h4>
            </div>
             <div class="modal-body">
                <div class="row">
                    <form method="POST" action="#" enctype="multipart/form-data" onsubmit="return false">
                       
                        <input type='hidden' id = "idP" name='idP' value="">
                       
                        <div class="col-lg-12">
                            <label for="">Cedula</label>
                            <input type="text" class="form-control" id="txtcedula_editar" placeholder="Ingresar Cedula" maxlength="11" onkeypress="return soloNumeros(event)" onchange="validar()" disabled>
                            <label for="" id="cedulaOK" style="color: red;"></label>
                            <input type="text" id="validarcedulaeditar" hidden><br>
                        </div>
                        <div class="col-lg-6">
                            <label for="">Nombres</label>
                            <input type="text" class="form-control" id="txtnombres_editar" placeholder="Ingrese los nombres" maxlength="50" onkeypress="return soloLetras(event)"><br>

                        </div>
                        <div class="col-lg-6">
                            <label for="">Apellidos</label>
                            <input type="text" class="form-control" id="txtapellidop_editar" placeholder="Ingrese el apellido paterno" maxlength="50" onkeypress="return soloLetras(event)" ><br>

                        </div>
                        <div class="col-lg-6">
                            <label for="">Móvil</label>
                            <input type="text" class="form-control" id="txtmovil_editar" placeholder="Ingrese su movil" maxlength="10" onkeypress="return soloNumeros(event)" ><br>

                        </div>
                        <div class="col-lg-6">
                            <label for="">Dirección</label>
                            <input type="text" class="form-control" id="txtdireccion_editar" placeholder="Ingrese el apellido materno" maxlength="50" onkeypress="return soloLetras(event)" ><br>
                        </div>

                        
                      <div class="col-lg-6">
                        
                        <label for="">Genero</label>
                        <select class="js-example-basic-multiple genero_pac notItemOne" name="state" style="   width:100%;" id="opcion_sexo_editar">

                        </select><br>

                        </div>
                        <div class="col-lg-6">
                            <label for="">Edad</label>
                            <input type="text" class="form-control" id="txtedadEditar" placeholder="Ingrese su edad" maxlength="10" onkeypress="return soloNumeros(event)" 
                            oninput="parametros(this, 'edad');"><br>
                        </div>

                        <div class="col-lg-6">
                            <label for="">Ciudad</label>
                            <input type="text" class="form-control" id="ciudad_editar" placeholder="Ingrese su ciudad Actual" onkeypress="return soloLetras(event)" ><br>
                        </div>
                        
                        <div class="col-lg-6">
                                <label for="">Usuario</label>
                                <input type="text" class="form-control" id="txtusuario_editar" placeholder="Ingrese el usuario" disabled><br>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary"  onclick="editarPaciente()"><i class="fa fa-save"> Guardar</i></button>
                    <button type="button" 
                    class="btn btn-danger"
                    onclick="cerrar_modal()"><i class="fa fa-times" > Cancelar</i></button>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
