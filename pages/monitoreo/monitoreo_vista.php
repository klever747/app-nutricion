<?php 
include  "../../controllers/curl.controller.php";
session_start();
?>
<link href="../../pages/style/style69.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="../../js/controller_monitoreo/monitoreo.js"></script>
<?php if ($_SESSION["user"]->id_rol == 1): ?>
<form autocomplete="false" onsubmit="return false">
    <div class="col-md-12">
        <div class="box box-primary box-solid">
            <div class="box-header with-border">
                <h3 class="box-title"><b>MANTENIMIENTO MONITOREO DE PACIENTES</b></h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                </div>
                <!-- /.box-tools -->
                
            </div>
            <div class="box-body">
                <div class="form-group">
                    <div class="col-lg-10">
                        
                    </div>
                    
                    <div class="col-lg-2">
                        <label for="">&nbsp</label>
                        <button class="btn btn-primary" style="width: 100%" onclick="AbrirModalsRegistroMonitoreo()"><i class="fa  fa-plus-square-o" ></i> Agregar Monitoreo </button><br><br>
                    </div>
                    

                </div>
                <?php 

                    //traer los datos para listar todas los diagnosticos de un nutricionsita 
                    
                    $url = CurlController::api()."relations?rel=users,nutricionista,paciente,monitoreo&type=user,nutricionista,paciente,monitoreo&linkTo=id_user&equalTo=".$_SESSION["user"]->id_user."&orderBy=paciente.id_paciente&orderMode=DESC&tabla_estado=nutricionista.estado=1%20and%20users&select=id_monitoreo,ci_user,nombre_user,apellido_user,monitoreo.date_create";
                    

                    $method = "GET";
                    $fields = array();
                    $header = array();

                    $pacientes = CurlController::request($url, $method, $fields, $header)->results;

 
                 ?>
                
                <table id="dataTableD" class="display responsive nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID Monitoreo</th>
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
                            <td><?php echo($value->id_monitoreo); ?></td>
                            <td><?php echo($value->ci_user); ?></td>
                            <td><?php echo($value->nombre_user); ?></td>
                            <td><?php echo($value->apellido_user); ?></td>
                            <td><?php echo($value->date_create); ?></td>
                            <td>
                                <button class="btn_modificar actualizar_monitoreo" id_monitoreo = "<?php echo ($value->id_monitoreo); ?>" ><i class="fa fa-edit"></i></button>    
                            </td>
                        </tr>
                    <?php   endforeach  ?>
                <?php }else{ ?>
                    <tr></tr>
                <?php } ?>
                    </tbody>
                </table>
            </div>

        </div>
      </div>
</form>
<?php else: ?>
    <form autocomplete="false" onsubmit="return false">
    <div class="col-md-12">
        <div class="box box-primary box-solid">
            <div class="box-header with-border">
                <h3 class="box-title"><b>REGISTRO DE MONITOREO DEL PACIENTE</b></h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                </div>
                <!-- /.box-tools -->
                
            </div>
            <div class="box-body">
                <div class="form-group">
                    <div class="col-lg-10">
                        
                    </div>
                    
                   
                    

                </div>
                <?php 

                    //traer los datos para listar todas los diagnosticos de un nutricionsita 
                    
                    $url = CurlController::api()."relations?rel=monitoreo,paciente&type=monitoreo,paciente&linkTo=id_user&equalTo=".$_SESSION["user"]->id_user."&orderBy=paciente.id_paciente&orderMode=DESC&tabla_estado=paciente&select=*";
                    

                    $method = "GET";
                    $fields = array();
                    $header = array();

                    $pacientes = CurlController::request($url, $method, $fields, $header)->results;

 
                 ?>
                
                <table id="dataTableD" class="display responsive nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID Monitoreo</th>
                            <th>Nombre Paciente</th>
                            <th>Fecha</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php if($pacientes != 'Not Found'){ ?>
                         <?php foreach($pacientes as $key => $value):?> 
                        <tr>
                            <td><?php echo($value->id_monitoreo); ?></td>
                            <td><?php echo($_SESSION["user"]->display_name); ?></td>

                            <td><?php echo($value->date_create); ?></td>
                            <td>
                                <button class="btn_modificar mostrar_monitoreo" id_monitoreo = "<?php echo ($value->id_monitoreo); ?>" ><i class="fa fa-eye"></i></button>    
                            </td>
                        </tr>
                    <?php   endforeach  ?>
                <?php }else{ ?>
                    <tr></tr>
                <?php } ?>
                    </tbody>
                </table>
            </div>

        </div>
      </div>
</form>
<?php endif ?>

<?php include "monitoreo_registro.php" ?>
<?php include "monitoreo_editar.php" ?>
<?php include "monitoreo_vista_paciente.php" ?>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
<script src="../../js/restricciones.js"></script>
<script src="../../resources/ckeditor/ckeditor.js"></script>
<script type="text/javascript">
    var editor = CKEDITOR.replace('content');
</script>
<script type="text/javascript">
    var monitoreoEdit = CKEDITOR.replace('content1');
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
