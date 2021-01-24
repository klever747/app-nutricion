
<script src="../js/usuario.js?rev=<?php echo time(); ?>" type="text/javascript"></script>
<div class="col-md-12">
    <div class="box box-primary box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">BIENVENIDOS AL CONTENIDO DEL USAURIO</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
            </div>
            <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <!-- Listar Usuario-->
        <div class="box-body">
            <div class="form-group">
                <div class="col-lg-10">
                    <div class="input-group">
                        <input type="text" class="global_filter form-control" id="global_filter" placeholder="Ingresar dato a buscar">
                        <span class="input-group-addon"><i class="fa fa-search"></i></span>
                    </div>

                </div>
                <div class="col-lg-2">
                    <button class="btn btn-primary" style="width: 100%" onclick="AbrirModalsRegistro()"><i class="fa fa-user-plus" ></i> Nuevo Registro</button><br><br>
                </div>
            </div>
            <table id="tabla_usuario" class="display responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Usuario</th>
                        <th>Email</th>
                        <th>Rol</th>
                        <th>Sexo</th>
                        <th>Estado</th>
                        <th>Acci&oacute;n</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
</div>

<!-- Modal -->
<form autocomplete="false" onsubmit="return false">
    <div class="modal fade" id="modals_registro" role="dialog">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">REGISTRAR USUARIO</h4>
            </div>
            <div class="modal-body">
                     <div class="col-lg-12">
                        <label for="">Usuario</label>
                        <input type="text" class="form-control" id="txtusu" placeholder="Ingrese el usuario"><br>

                    </div>
                     <div class="col-lg-12">

                        <label for="">Correo</label>
                        <input type="text" class="form-control" id="txtemail" placeholder="Ingrese el email">
                        <label for="" id="emailOK" style="color: red;"></label>
                        <input type="text" id="validaremail" hidden><br>
                      </div>

                     <div class="col-lg-12">
                        <label for="">Escriba la Contrase&ntilde;a</label>
                        <input type="password" class="form-control" id="txtcon" placeholder="Ingrese la contraseña"><br>

                    </div>

                    <div class="col-lg-12">
                        <label for="">Repita la Contrase&ntilde;a</label>
                        <input type="password" class="form-control" id="txtcon1" placeholder="Repita la contraseña"><br>

                    </div>
                    <div class="col-lg-12">
                        <label for="">Sexo</label>
                        <select class="js-example-basic-multiple" name="state" id="opcion_sexo" style="width:100%;">
                            <option value="M">MASCULINO</option>
                            <option value="F">FEMENINO</option>
                            <option></option>
                        </select><br><br>
                    </div>
                    <div class="col-lg-12">
                        <label for="">Rol</label>
                        <select class="js-example-basic-multiple" name="state" id="opcion_rol" style="width:100%;">
                        </select><br><br>
                    </div>



            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="Registrar_Usuarios()"><i class="fa fa-check-square-o"> Registrar</i></button>
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"> Cancelar</i></button>
            </div>
          </div>
        </div>
      </div>
</form>
<form autocomplete="false" onsubmit="return false">
    <div class="modal fade" id="modals_editar_usuario" role="dialog">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title"><br>EDITAR DATOS DEL USUARIO<br></h4>
            </div>
            <div class="modal-body">
                     <div class="col-lg-12">
                         <input type="text" id="txtidusuario" hidden>
                        <label for="">Usuario</label>
                        <input type="text" class="form-control" id="txtusu_editar" placeholder="Ingrese el usuario" disabled><br>

                    </div>
                     <div class="col-lg-12">

                        <label for="">Correo</label>
                        <input type="text" class="form-control" id="txtemail_editar" placeholder="Ingrese el email">
                        <label for="" id="emailOK_editar" style="color: red;"></label>
                        <input type="text" id="validaremail_editar" hidden ><br>
                      </div>
                    <div class="col-lg-12">
                        <label for="">Sexo</label>
                        <select class="js-example-basic-multiple" name="state" id="opcion_sexo_editar" style="width:100%;">
                            <option value="M">MASCULINO</option>
                            <option value="F">FEMENINO</option>
                            <option></option>
                        </select><br><br>
                    </div>
                    <div class="col-lg-12">
                        <label for="">Rol</label>
                        <select class="js-example-basic-multiple" name="state" id="opcion_rol_editar" style="width:100%;">
                        </select><br>
                    </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="Modificar_Usuarios()"><i class="fa fa-check-square-o">Editar Usuario</i></button>
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"> Cancelar</i></button>
            </div>
          </div>
        </div>
      </div>
</form>

<script>
    $(document).ready(function () {
        listar_usuario()
         $('.js-example-basic-multiple').select2();
        Listar_combo_rol();
        $("#modals_registro").on('shown.bs.modal',function(){
            $('#txtusu').focus();
        })
    });
//Validad Email
document.getElementById('txtemail').addEventListener('input', function() {
    campo = event.target;
    emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
    if(emailRegex.test(campo.value)){
        $(this).css("border","");
        $("#emailOK").html("");
        $("#validaremail").val("Correcto");
    }else{
        $(this).css("border","1px solid red");
        $("#emailOK").html("Email Incorrecto");
        $("#validaremail").val("Incorrecto");
    }
});
//Validad Email para editar
document.getElementById('txtemail_editar').addEventListener('input', function() {
    campo = event.target;
     emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
     if(emailRegex.test(campo.value)){
        $(this).css("border","");
        $("#emailOK_editar").html("");
        $("#validaremail_editar").val("Correcto");
    }else{
        $(this).css("border","1px solid red");
        $("#emailOK_editar").html("Email Incorrecto");
        $("#validaremail_editar").val("Incorrecto");
    }
});

$('.box').boxWidget({
    animationSpeed:500,
    collapseTrigger:'[data-widget="collapse"]',
    removeTrigger:'[data-widget="remove"]',
    collapseIcon: 'fa-minus',
    expandIcon:'fa-plus',
    removeIcon:'fa-times'
}
        )
</script>

