<?php 
include  "../../controllers/curl.controller.php";
session_start();

//metodo para extraer datos de los pacientes

$url = CurlController::api()."relations?rel=nutricionista,paciente,users&type=nutricionista,paciente,user&linkTo=id_user&equalTo=".$_SESSION["user"]->id_user."&orderBy=id_paciente&orderMode=DESC&tabla_estado=users&select=*";
$method = "GET";
$fields = array();
$header = array();

$pacientesList = CurlController::request($url, $method, $fields, $header)->results;


 ?>
 <script type="text/javascript" src="../../js/controller_diagnostico/diagnostico.js"></script>
<script src="../js/diagnostico.js?rev=<?php echo time(); ?>" type="text/javascript"></script>
<link href="../../pages/style/style69.css" rel="stylesheet" type="text/css">
<form autocomplete="false" onsubmit="return false">
    <div class="col-md-12">
        <div class="box box-primary box-solid">
            <div class="box-header with-border">
                <h3 class="box-title"><b>MANTENIMIENTO DIAGNOSTICOS<b></h3>

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
                        
                    </div>
                    
                    <div class="col-lg-2">
                        <label for="">&nbsp</label>
                        <button class="btn btn-primary" style="width: 100%" onclick="AbrirModalsRegistroDiagnostico()"><i class="fa  fa-plus-square-o" ></i> Agregar Diagnostico </button><br><br>
                    </div>
                    

                    </div>
                </div>
                <?php 

                    //traer los datos para listar todas los diagnosticos de un nutricionsita 
                    
                    $url = CurlController::api()."relations?rel=users,nutricionista,paciente,diagnostico&type=user,nutricionista,paciente,diagnostico&linkTo=id_user&equalTo=".$_SESSION["user"]->id_user."&orderBy=paciente.id_paciente&orderMode=DESC&tabla_estado=nutricionista.estado=1%20and%20users&select=id_diagnostico,ci_user,nombre_user,apellido_user,diagnostico.date_create";
                    

                    $method = "GET";
                    $fields = array();
                    $header = array();

                    $pacientes = CurlController::request($url, $method, $fields, $header)->results;

 
                 ?>
                
                <table id="dataTableD" class="display responsive nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID Diagnóstico</th>
                            <th>Numero cedula</th>
                            <th>Nombre Paciente</th>
                            <th>Apellido Paciente</th>
                            <th>Fecha</th>
                            
                            <th>Acci&oacute;n</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php if($pacientes != 'Not Found'){ ?>
                         <?php foreach($pacientes as $key => $value):?> 
                        <tr>
                            <td><?php echo($value->id_diagnostico); ?></td>
                            <td><?php echo($value->ci_user); ?></td>
                            <td><?php echo($value->nombre_user); ?></td>
                            <td><?php echo($value->apellido_user); ?></td>
                            <td><?php echo($value->date_create); ?></td>
                            <td>
                                <button class="btn_modificar actualizarDiagnostico" idDiagnostico = "<?php echo ($value->id_diagnostico); ?>" ><i class="fa fa-edit"></i></button>    
                            </td>
                        </tr>
                    <?php   endforeach  ?>
                <?php }else{ ?>
                    <tr></tr>
                <?php } ?>
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
    </div>
</form>

<!-- Modal Registrar Diagnostico del paciente -->
<?php include "diagnostico_registro.php" ?>
<!-- Modal -->
<!-- Modal Editar diagnostico-->
<?php include "diagnostico_editar.php" ?>
<!-- Modal -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
<script src="../../js/restricciones.js"></script>
<script src="../../resources/ckeditor/ckeditor.js"></script>
<script type="text/javascript">
    var editor = CKEDITOR.replace('content');
</script>
<script type="text/javascript">
    var editor1 = CKEDITOR.replace('content1');
</script>
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

