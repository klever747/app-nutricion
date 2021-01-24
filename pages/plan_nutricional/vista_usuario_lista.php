<?php 
include  "../../controllers/curl.controller.php";
session_start();


//metodo para extraer datos de los pacientes

$url = CurlController::api()."relations?rel=nutricionista,paciente,users&type=nutricionista,paciente,user&linkTo=id_user&equalTo=".$_SESSION["user"]->id_user."&orderBy=id_paciente&orderMode=DESC&tabla_estado=users&select=*";
$method = "GET";
$fields = array();
$header = array();

$pacientes = CurlController::request($url, $method, $fields, $header)->results;
//metodo para extraer el id de un paciente 
$url = CurlController::api()."paciente?linkTo=id_user&equalTo=".$_SESSION["user"]->id_user."&tabla_estado=users&select=id_paciente";
$method = "GET";
$fields = array();
$header = array();

$paciente = CurlController::request($url, $method, $fields, $header)->results;

 ?>
<script src="../js/paciente.js?rev=<?php echo time(); ?>" type="text/javascript"></script>
<script type="text/javascript" src="../../js/controller_plan_nutricional/plan_nutricional.js"></script>
<script type="text/javascript" src="../../js/controller_menu_comida/menu_comida.js"></script>
<script type="text/javascript" src="../../js/controlador_paciente/registro_paciente.js"></script>
<link href="../../pages/style/style69.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">

<?php if ($_SESSION["user"]->id_rol == 1): ?>
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
                

                
            </div>
            <table id="dataTableD">
                
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
                <tbody>
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
                                
                                <button class="btn_modificar calendario_menuId" idPacienteC = "<?php echo($value->id_paciente);?>" onclick="cargar_contenido('contenido_principal','plan_nutricional/calendario_menu.php')"  style ="width: 100%;" ><i class="fa fa-plus"></i>Agregar Plan</button>                                                                  
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

<!-- Modal para mostrar el calendario del menu de comida del paciente -->
<?php else: ?>  
     <button class="btn_modificar calendario_menuId" idPacienteC = "<?php echo($paciente[0]->id_paciente);?>" onclick="cargar_contenido('contenido_principal','plan_nutricional/calendario_menu.php')"  style ="width: 100%;" ><i class="fa fa-plus"></i>Cargar Plan Nutricional</button>    
<?php endif ?>
<script>
    $(document).ready( function () {
        $('#dataTableD').DataTable({
            language: {
                search: "Buscar:",
                "sProcessing":       "Procesando..",
                "sLengthMenu":       "Mostrar_MENU_registro",
                "sZeroRecords":       "No se encuentran Resultados",
                "sEmptyTable":       "Ning&oacute;n dato disponible en esta tabla",
                    "sInfo":          "Registros del ( _START_ al _END_ ) total de _TOTAL_ registros",
                    "sInfoEmpty":     "Registros del (0 al 0) total de 0 registros",
                    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                    "sInfoPostFix":    "",
                    "sSearch":        "Buscar",
                    "sUrl":           "",
                    "sInfoThousands": ",",
                    "sLoadingRecords": "<b>No se encontraron Datos</b>",
                    "oPaginate":{
                        "sFirst":   "Primero",
                        "sLast":    "Último",
                        "sNext":    "Siguiente",
                        "sPrevious": "Anterior"
                    },
                    "oAria":{
                        "sSortAscending": ": Activar para ordenar la columna de order ascendente",
                        "sSortDescending": ": Activar para ordenar la columna de order descendente"
                    }
            }
        });
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

