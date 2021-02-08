<?php 
include  "../../controllers/curl.controller.php";
session_start();



//metodo para extraer datos de los pacientes

  $url = CurlController::api()."relations?rel=nutricionista,paciente,users&type=nutricionista,paciente,user&linkTo=id_user&equalTo=".$_SESSION["user"]->id_user."&orderBy=id_paciente&orderMode=DESC&tabla_estado=users&select=*";
    $method = "GET";
    $fields = array();
    $header = array();

    $pacientes = CurlController::request($url, $method, $fields, $header)->results;  

 ?>
<script src="../js/paciente.js?rev=<?php echo time(); ?>" type="text/javascript"></script>

<script type="text/javascript" src="../../js/controlador_paciente/registro_paciente.js"></script>
<script type="text/javascript" src="../../login/js/validaciones.js"></script>
<script type="text/javascript" src="../../js/head.js"></script>
<link href="../../pages/style/style69.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">

<div class="col-md-12">
    <div class="box box-primary box-solid">
        <div class="box-header with-border">
            <h3 class="box-title"><b>MANTENIMIENTO PACIENTES</b></h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
            </div>
            <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <!-- Listar Usuario-->
        <div class="box-body" >
            <div class="form-group">
                <div class="col-lg-10">
                    

                </div>
                <div class="col-lg-2">
                    <button class="btn btn-primary" style="width: 100%" onclick="AbrirModalsRegistroPaciente()"><i class="fa  fa-plus-square-o" ></i> Agregar Nuevo </button><br><br>
                </div>
                
            </div>
            <table id="dataTableD" class="display responsive nowrap" style="width:100%">
                
                <thead>
                    <tr>
                        
                        <th>Cedula</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Correo</th>
                        <th>Ciudad</th>
                        <th>Telefono</th>
                        <th>Acci&oacute;n</th>
                    </tr>
                </thead>
                <tbody id="datPaicente">
                
                <?php if($pacientes != 'Not Found'){ ?>
                    <?php foreach($pacientes as $key => $value):?>  
                    <tr>     
                                    
                        
                            <td><?php echo($value->ci_user); ?></td>
                            <td><?php echo($value->nombre_usuario); ?></td>
                            <td><?php echo($value->apellido_user); ?></td>
                            <td><?php echo($value->email_user); ?></td>
                            <td><?php echo($value->ciudad_user); ?></td>
                            <td><?php echo($value->telefono_user); ?></td>
                            <td>
                        <div>
                            <div>
                                <button class="btn_modificar actualizar" idPaciente = "<?php echo ($value->id_user); ?>" ><i class="fa fa-edit"></i></button>                           
                                 <button class="btn_cancel eliminar" idPacienteE = "<?php echo ($value->id_user); ?>"  ><i class="fa fa-trash"></i></button>
   
                            </div>
                        </div>                      
                            </td>
                        
                    </tr>
                    <?php endforeach ?>
                <?php }else{ ?>
                    <tr></tr>

                <?php } ?>
               
                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
</div>


<!-- Modal para registrar un paciente -->
<?php include "paciente_agregar.php" ?>

<!-- Modal para editar al paciente -->
<?php include "../paciente/paciente_editar.php"; ?>


<!-- Modal para eliminar al paciente -->
 <?php include "../paciente/paciente_eliminar.php" ?>

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
<script src="../../js/restricciones.js"></script>
<script>

    $(document).ready(function () {

        $('.js-example-basic-multiple').select2();
        $("#modals_registro_paciente").on('shown.bs.modal', function () {
            $('#txtpaciente').focus();
        })
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



