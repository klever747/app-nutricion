<div class="modal fade" id="modals_eliminar_paciente" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="text-align: center;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><b>ELIMINAR PACIENTE</b></h4>
            </div>
             <div class="modal-body">
                <div class="row">
                    <input type='hidden' id = "idPaciente" name='idP' value="">
                        <div class="col-lg-12">
                            <label for="">Cedula</label>
                            <input type="text" class="form-control" id="txtcedula_eliminar" placeholder="Ingresar Cedula" maxlength="11" onkeypress="return soloNumeros(event)" onchange="validar()" disabled>
                            <label for="" id="cedulaOK" style="color: red;"></label>
                            <input type="text"  hidden><br>
                        </div>
                        <div class="col-lg-6">
                            <label for="">Nombres</label>
                            <input type="text" class="form-control" id="txtnombres_eliminar" placeholder="Ingrese los nombres" maxlength="50" onkeypress="return soloLetras(event)" disabled><br>

                        </div>
                        <div class="col-lg-6">
                            <label for="">Apellidos</label>
                            <input type="text" class="form-control" id="txtapellidop_eliminar" placeholder="Ingrese el apellido paterno" maxlength="50" onkeypress="return soloLetras(event)" disabled ><br>

                        </div>
                        <div class="col-lg-6">
                            <label for="">Móvil</label>
                            <input type="text" class="form-control" id="txtmovil_eliminar" placeholder="Ingrese su movil" maxlength="10" onkeypress="return soloNumeros(event)" disabled><br>

                        </div>
                        <div class="col-lg-6">
                            <label for="">Dirección</label>
                            <input type="text" class="form-control" id="txtdireccion_eliminar" placeholder="Ingrese el apellido materno" maxlength="50" onkeypress="return soloLetras(event)" disabled><br>
                        </div>

                      <div class="col-lg-6">
                        <label for="">Genero</label>
                        <input type="text" class="form-control" id="generoEliminar" placeholder="Genero"  disabled><br>  
                       
                     </div>
                        <div class="col-lg-6">
                            <label for="">Edad</label>
                            <input type="text" class="form-control" id="txtedadEliminar" placeholder="Ingrese su edad" maxlength="10" onkeypress="return soloNumeros(event)" disabled ><br>
                        </div>

                        <div class="col-lg-6">
                            <label for="">Ciudad</label>
                            <input type="text" class="form-control" id="ciudad_eliminar" placeholder="Ingrese su ciudad Actual" onkeypress="return soloLetras(event)" disabled><br>
                        </div>

                        <div class="col-lg-6">
                                <label for="">Email</label>
                                <input type="text" class="form-control" id="txtemail_eliminar" placeholder="Ingrese el email" disabled><br>
                                 <label for="" id="emailOK" style="color: red;"></label>
                                 <input type="text"  hidden><br>
                        </div>
                        <div class="col-lg-6">
                                <label for="">Usuario</label>
                                <input type="text" class="form-control" id="txtusuario_eliminar" placeholder="Ingrese el usuario" disabled><br>
                        </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary"  onclick="eliminarPaciente()"><i class="fa fa-save"> Eliminar</i></button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"> Cancelar</i></button>
                </div>

            </div>
        </div>
    </div>
</div>