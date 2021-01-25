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
<script src="../../js/controller_evaluacion/evaluacion.js?rev=<?php echo time(); ?>" type="text/javascript"></script>
<script type="text/javascript" src="../../js/controller_evaluacion/evaluacion.js"></script>

<form autocomplete="false" onsubmit="return false">
    <div class="col-md-12">
        <div class="box box-primary box-solid">
            <div class="box-header with-border">
                <h3 class="box-title"><b>EVALUACIÓN DE LOS PACIENTES</b></h3>

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
                        <div class="col-lg-4">
                            <label for="">Fecha Inicio</label>
                            <input type="date" name="" id="txtfecha_inicio" class="form-control"><br><br>

                        </div>
                        <div class="col-lg-4">
                            <label for="">Fecha Fin</label>
                            <input type="date" name="" id="txtfecha_fin" class="form-control"><br><br>

                        </div>
                        <div class="col-lg-2">
                             <?php if($pacientes != 'Not Found' ){ ?>
                                <?php if ($_SESSION["user"]->id_rol == 1){?>
                                    <label for="">Paciente</label>
                                    <select class="js-example-basic-multiple" name="state" id="opcion_paciente_diagnostico" style="width:100%;">
                                        
                                    <?php foreach($pacientes as $key => $value):?> 
                                        
                                        <option value="<?php echo $value->id_paciente; ?>"><?php echo $value->display_name; ?></option>
                                    <?php endforeach ?>
                                    </select><br><br>
  
                                <?php } ?>
                                
                            <?php }else if ($_SESSION["user"]->id_rol == 2){?>
                                <label for="">Paciente</label>
                                    <select class="js-example-basic-multiple" name="state" id="opcion_paciente_diagnostico" style="width:100%;">
                                        
                                    <?php foreach($paciente as $key => $value):?> 
                                        
                                        <option value="<?php echo $value->id_paciente; ?>"><?php echo $_SESSION["user"]->display_name; ?></option>
                                    <?php endforeach ?>
                                    </select><br><br>
                            <?php } ?>
                            
                        </div>

                        <div class="col-lg-2">
                            <label for="">&nbsp;</label>
                            <button class="btn btn-primary" style="width: 100%" onclick="cargar_graficos()"><i class="glyphicon glyphicon-search" ></i>Buscar</button><br><br>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-lg-12" style="text-align: center; ">
                             <label for=""><b>DATOS ANTROPOMETRICOS</b></label>
                        </div>
                        <div class="col-lg-12" style="text-align: center; ">
                             <label for=""><b>SOMATOCARTA</b></label>
                        </div>
                        <div class="col-lg-4" id="som" >
                            <canvas height="400"  id="somatocarta" width="400"></canvas>
                        </div>
                        <div class="col-lg-4" id="can">
                            <img src="../../pages/resources/img/somatocarta.png"style="width: 100%" alt="somatocarta">
                            
                        </div>

                        <div class="col-lg-4">
                            <table border="2"  style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th>
                                           Datos Somatotipo 
                                        </th>
                                        <th>
                                            Valor
                                        </th>
                                    </tr>
                                    
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Endomorfia</td>
                                        <td id="endomorfia"></td>
                                    </tr>
                                    <tr>
                                        <td>Mesomorfia</td>
                                        <td id="mesomorfia"></td>
                                    </tr>
                                    <tr>
                                        <td>Ectomorfia</td>
                                        <td id="ectomorfia"></td>
                                    </tr> 
                                   
                                </tbody>
                            </table>
                            <br>
                            <br>
                            <table border="2" style="width: 100%">
                                <thead>
                                    <th> Variable</th>
                                    <th> Valor</th>
                                </thead>
                                <tbody>
                                     <tr>
                                        <td>Valor en X</td>
                                        <td id="x"></td>
                                    </tr>
                                    <tr>
                                        <td>Valor en Y</td>
                                        <td id="y"></td>
                                    </tr>
                                </tbody>
                                
                            </table>
                            <br>
                            <br>
                            <br>
                        </div>
                        <div class="col-lg-4">
                            <canvas height="400" id="sn" width="400"></canvas>
                        </div>
                        <div class="col-lg-4">
                            <canvas height="400" id="imc_grafico" width="400"></canvas>
                        </div>
                        <div class="col-lg-4">
                            <canvas height="400" id="bicipital_grafico" width="400"></canvas>
                        </div>
                        <div class="col-lg-4">
                                <canvas height="400" id="tricipital_grafico" width="400"></canvas>
                        </div>
                        <div class="col-lg-4">
                            <canvas height="400" id="subescapular_grafico" width="400"></canvas>
                        </div>
                        <div class="col-lg-4">
                            <canvas height="400" id="peso_graso" width="400"></canvas>
                        </div>
                        <div class="col-lg-4">
                            <canvas height="400" id="peso_magro" width="400"></canvas>
                        </div>
                        <div class="col-lg-4">
                            <canvas height="400" id="porcentaje_masa_grasa" width="400"></canvas>
                        </div>
                        <div class="col-lg-4">
                            <canvas height="400" id="indice_masa_grasa" width="400"></canvas>
                        </div>
                        <div class="col-lg-4">
                            <canvas height="400" id="peso_paciente" width="400"></canvas>
                        </div>
                        <div class="col-lg-12" style="text-align: center;">
                             <label for=""><b>DATOS QUIMICOS</b></label>
                        </div>

                        <div class="col-lg-4">
                            <canvas height="400" id="acido_urico_paciente" width="400"></canvas>
                        </div>
                        <div class="col-lg-4">
                            <canvas height="400" id="bilirubina_paciente" width="400"></canvas>
                        </div>
                        <div class="col-lg-4">
                            <canvas height="400" id="colesterol_paciente" width="400"></canvas>
                        </div>
                        <div class="col-lg-4">
                            <canvas height="400" id="hdl_paciente" width="400"></canvas>
                        </div>
                        <div class="col-lg-4">
                            <canvas height="400" id="ldl_paciente" width="400"></canvas>
                        </div>
                        <div class="col-lg-4">
                            <canvas height="400" id="glucosaAyunas_paciente" width="400"></canvas>
                        </div>
                        <div class="col-lg-4">
                            <canvas height="400" id="glucosaPost_paciente" width="400"></canvas>
                        </div>

                    </div>

                </div>

            </div>
            <!-- /.box-body -->
        </div>
    </div>
</form>

<script>
    $(document).ready(function () {
        //Listar_combo_pacientes();
    $('.js-example-basic-multiple').select2();
        var n = new Date();
        var y= n.getFullYear();
        var m=n.getMonth()+1;
        var d=n.getDate();
        if(d<10)
        {
            d='0'+d;
        }
        if(m<10)
        {
            m='0'+m;
        }
        document.getElementById('txtfecha_inicio').value=y+"-"+m+"-"+d;
        document.getElementById('txtfecha_fin').value=y+"-"+m+"-"+d;

        $("#modals_registrar_consulta").on('shown.bs.modal', function () {
            $('#txtconsulta').focus();
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

