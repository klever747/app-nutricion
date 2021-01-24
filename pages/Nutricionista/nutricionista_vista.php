<?php 
include  "../../controllers/curl.controller.php";

session_start();
$option = '';
$url = CurlController::api()."relations?rel=users,genero&type=users,genero&linkTo=id_user&equalTo=".$_SESSION['user']->id_user."&tabla_estado=users&select=*";
$method = "GET";
$fields = array();
$header = array();


$nutricionista = CurlController::request($url, $method, $fields, $header)->results;

if(!empty($_SESSION["user"]->id_genero)){

    if($nutricionista[0]->id_genero == 1){
      $option = '<option value="'.$nutricionista[0]->id_genero .'"select>'.$nutricionista[0]->genero.'</option>';
    }else if($nutricionista[0]->id_genero == 2){
      $option = '<option value="'.$nutricionista[0]->id_genero .'"select>'.$nutricionista[0]->genero.'</option>';
    }else if($nutricionista[0]->id_genero == 3){
      $option = '<option value="'.$nutricionista[0]->id_genero .'"select>'.$nutricionista[0]->genero.'</option>';
    }
}else{
  $option = '<option value="3" select>Otro</option>';
}


 ?>
<link href="../../views/style/style69.css" rel="stylesheet" type="text/css">
<script src="../js/nutricionista.js?rev=<?php echo time(); ?>" type="text/javascript"></script>
<script type="text/javascript" src="../../js/controlador_paciente/registro_paciente.js"></script>
<script type="text/javascript" src="../../js/controller_nutricionista/nutricionista.js"></script>
<script src="../../js/restricciones.js"></script>
<div class="col-md-12">
    <div class="box box-primary box-solid">
        <div class="box-header with-border" style="text-align: center;">
            <h3 class="box-title"><b>MANTENIMIENTO DEL USUARIO</b></h3>
        </div>
        <!-- /.box-header -->
        <!-- Listar Usuario-->
        <div class="box-body">

                        <input type='hidden' id = "idN" name='idN' value="<?php echo $_SESSION['user']->id_user; ?>">
                        
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <label for="">Cedula </label>

                                <?php if (!empty($_SESSION["user"]->ci_user)): ?>
                                    <input 
                                    type="text" 
                                    class="form-control" 
                                    id="txtcedula" 
                                    placeholder="Ingrese la cedula" 
                                    maxlength="11" 
                                    onkeypress="return soloNumeros(event)" 
                                    onchange="validar()" 
                                    disabled  
                                    value="<?php  echo $nutricionista[0]->ci_user; ?>">
                                <?php else:?>
                                  <input 
                                    type="text" 
                                    class="form-control" 
                                    id="txtcedula" 
                                    placeholder="Ingrese la cedula" 
                                    maxlength="11" 
                                    onkeypress="return soloNumeros(event)" 
                                    onchange="validar()" 
                                     
                                    value="">
                                <?php endif ?>
                                

                                <label for="" id="cedulaOK" style="color: red;"></label>
                                <input type="text" id="validarcedula" hidden><br>
                            </div>
                            
                            <div class="col-lg-6">
                                <label for="">Nombres</label>
                                <input type="text" class="form-control" id="txtnombres_editar" placeholder="Ingrese los nombres" maxlength="50" onkeypress="return soloLetras(event)" value="<?php echo $nutricionista[0]->nombre_user; ?>"><br>

                            </div>
                            <div class="col-lg-6">
                                <label for="">Apellidos</label>
                                <input type="text" class="form-control" id="txtapellido_editar" placeholder="Ingrese el apellido paterno" maxlength="50" onkeypress="return soloLetras(event)" value="<?php echo $nutricionista[0]->apellido_user; ?>"><br>

                            </div>
                            <div class="col-lg-6">
                                <label for="">Móvil</label>
                                <input type="text" class="form-control" id="txtmovil_editar" placeholder="Ingrese su movil" maxlength="10" onkeypress="return soloNumeros(event)" value="<?php echo $nutricionista[0]->telefono_user; ?>" ><br>

                            </div>
                            <div class="col-lg-6">
                                <label for="">Direccion</label>
                                <input type="text" class="form-control" id="txtdireccion_editar" placeholder="Ingrese su dirección" maxlength="50" value="<?php  echo $nutricionista[0]->direccion_user;?>"  ><br>

                            </div>
                            <div class="col-lg-12">

                            </div>
                            <div class="col-lg-6">
                              <label for="">Sexo</label>
                              <?php 
                              /*=============================================
                                  Metodo para extraer el Genero del paciente
                              =============================================*/
                              $url = CurlController::api()."genero?tabla_estado&select=*";
                              $method = "GET";
                              $fields = array();
                              $header = array();

                                $genero = CurlController::request($url, $method, $fields, $header)->results;
                                
                               ?>

                              <select class="js-example-basic-multiple notItemOne" name="state" id="opcion_sexo" style="width:100%;">

                              <?php 
                              echo $option;
                              foreach($genero as $key => $value):?> 
                                  <option value="<?php echo $value->id_genero; ?>"><?php echo $value->genero; ?></option>
                                      
                              <?php endforeach ?>        
                              </select><br>
                            </div>
                           
                            <div class="col-lg-6">
                              <label for="">Usuario</label>
                              <input type="text" class="form-control" id="txtusuario_editar" placeholder="Ingrese el usuario" disabled value="<?php echo $nutricionista[0]->nombre_usuario; ?>"><br>
                            </div>
                             
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" onclick="editarNutricionista()"><i class="fa fa-save"> Guardar</i></button>
                    </div>

        </div>


    </div>
</div>
        <!-- /.box-body -->

<!-- Modal -->


<script>
  
    $(document).ready(function () {
        
        $('.js-example-basic-multiple').select2();
        
    });



    $('.box').boxWidget({
        animationSpeed: 500,
        collapseTrigger: '[data-widget="collapse"]',
        removeTrigger: '[data-widget="remove"]',
        collapseIcon: 'fa-minus',
        expandIcon: 'fa-plus',
        removeIcon: 'fa-times'
    })


</script>

