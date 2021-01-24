<?php 
include  "../../controllers/curl.controller.php";
session_start();

//metodo para extraer datos de los pacientes

$url = CurlController::api()."relations?rel=encuesta_abcd,paciente,nutricionista,users&type=encuesta_abcd,paciente,nutricionista,user&linkTo=id_user&equalTo=".$_SESSION['user']->id_user."&orderBy=id_encuesta&orderMode=DESC&tabla_estado=users&select=id_encuesta,date_create,ci_user,display_name";
$method = "GET";
$fields = array();
$header = array();

$encuestas = CurlController::request($url, $method, $fields, $header)->results;

 ?>
 <link href="../../pages/style/style69.css" rel="stylesheet" type="text/css">
 <script src="../../js/controller_encuesta/encuesta.js"></script>
<script src="../js/encuestaabc.js?rev=<?php echo time(); ?>" type="text/javascript"></script>

<form autocomplete="false" onsubmit="return false">
    <div class="col-md-12">
        <div class="box box-primary box-solid">
            <div class="box-header with-border">
                <h3 class="box-title"><b>MANTENIMIENTO DE LA ENCUESTA ABCD</b></h3>

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
                    <div class="col-lg-12">
                        <div class="col-lg-10">

                        </div>
                        
                        <div class="col-lg-2">
                             <label for="">&nbsp;</label>
                            <button class="btn btn-primary" style="width: 100%" onclick="AbrirModalsRegistro()"><i class="fa  fa-plus-square-o" >Nueva Encuesta</i></button><br><br>
                        </div>
                    </div>

                </div>
                
                    <table id="dataTableD" class="display responsive nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th># Encuesta</th>
                                <th>Fecha</th>
                                <th>Cedula</th>
                                <th>Nombre Paciente</th>
                                <th>Antropometricos</th>
                                <th>Bioquimicos</th>
                                <th>Clínicos</th>
                                <th>Dietéticos</th>

                            </tr>
                        </thead>
                        <tbody>
                        <?php if($encuestas != 'Not Found'){ ?>
                         <?php foreach($encuestas as $key => $value):?> 
                            <tr>
                                <td><?php echo($value->id_encuesta); ?></td>
                                <td><?php echo($value->date_create); ?></td>
                                <td><?php echo($value->ci_user); ?></td>
                                <td><?php echo($value->display_name); ?></td>
                                <td>
                                   <button class="btn_modificar mostrarEncuestaAntro"
                                  idEncuestaAnt = "<?php echo ($value->id_encuesta); ?>"
                                  onclick="AbrirModalsEditar()" ><i class="fa fa-eye"></i></button>   
                                </td>
                                <td>
                                  <button class="btn_modificar mostrarEncuestaBio"
                                  idEncuestaBio = "<?php echo ($value->id_encuesta); ?>"
                                   ><i class="fa fa-eye"></i></button>   
                                </td>
                                 <td>
                                  <button class="btn_modificar mostrarEncuestaClinico"
                                  idEncuestaCli = "<?php echo ($value->id_encuesta); ?>"
                                   ><i class="fa fa-eye"></i></button>   
                                </td>
                                 <td>
                                  <button class="btn_modificar mostrarEncuestaDiet"
                                  idEncuestaDiet = "<?php echo ($value->id_encuesta); ?>"
                                   ><i class="fa fa-eye"></i></button>   
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
 <!-- Modal para registrar la encusta -->
<?php include "registrar_encuesta.php" ?>

<!-- Modal para editar la encuesta antropometrico -->
<?php include "editar_antropometrico.php" ?>

<!-- Modal para editar la encuesta bioqimico -->
<?php include "editar_bioquimico.php" ?>

<!-- Modal para editar la encuesta clinico -->
<?php include "editar_clinico.php" ?>

<!-- Modal para editar la encuesta dietetico -->
<?php include "editar_dietetico.php" ?>
<script src="../../js/restricciones.js"></script>
<script src="../../resources/ckeditor/ckeditor.js"></script>

<script type="text/javascript">
    var dietetico = CKEDITOR.replace('dietetico');
    var clinico = CKEDITOR.replace('clinico');
    var dieteticoEdit = CKEDITOR.replace('dieteticoEdit');
    var clinicoEdit = CKEDITOR.replace('clinicoEdit');
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

