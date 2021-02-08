<?php 
include  "../../controllers/curl.controller.php";
session_start();


//metodo para extraer datos de los pacientes

$url = CurlController::api()."relations?rel=nutricionista,paciente,users&type=nutricionista,paciente,user&linkTo=id_user&equalTo=".$_SESSION["user"]->id_user."&orderBy=id_paciente&orderMode=DESC&tabla_estado=users&select=*";
$method = "GET";
$fields = array();
$header = array();

$pacientesMenu = CurlController::request($url, $method, $fields, $header)->results;


//metodo para extraer datos de los pacientes con su respectivo menu alimenticio

$url = CurlController::api()."relations?rel=menu_comida,nutri_paciente_menu,nutricionista,paciente&type=menu_comida,nutri_paciente_menu,nutricionista,paciente&linkTo=id_user&orderBy=id_paciente&orderMode=DESC&tabla_estado=menu_comida&select=*&equalTo=".$_SESSION["user"]->id_user;
$method = "GET";
$fields = array();
$header = array();

$menuPaciente = CurlController::request($url, $method, $fields, $header)->results;
if($menuPaciente != 'Not Found'){
    if($menuPaciente[0]->id_tipo_menu == 1){
            $option = '<option value="'.$menuPaciente[0]->id_tipo_menu .'" select>Desayuno</option>';
        }else if($menuPaciente[0]->id_tipo_menu == 2){
            $option = '<option value="'.$menuPaciente[0]->id_tipo_menu .'"select>Almuerzo</option>';
        }else if($menuPaciente[0]->id_tipo_menu == 3){
            $option = '<option value="'.$menuPaciente[0]->id_tipo_menu .'"select>Cena</option>';
        }
}
    


?>

<link href="../../pages/style/style69.css" rel="stylesheet" type="text/css">
<script src="../js/menucomida.js?rev=<?php echo time(); ?>" type="text/javascript"></script>
<script type="text/javascript" src="../../js/controlador_paciente/registro_paciente.js"></script>
<script type="text/javascript" src="../../js/controller_menu_comida/menu_comida.js"></script>
<div class="col-md-12">
    <div class="box box-primary box-solid">
        <div class="box-header with-border">
            <h3 class="box-title"><b>MANTENIMIENTO MENU DE PACIENTES</b></h3>

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
                    <button class="btn btn-primary" style="width: 100%" onclick="AbrirModalsRegistro()"><i class="fa  fa-plus-square-o" ></i> Nuevo Menú</button><br><br>
                </div>
                
            </div>
            <table id="dataTableD" class="display responsive nowrap" style="width:100%">
                <thead>
                    
                    <tr>
                        <th>ID Menu</th>
                        <th>Nombre menu</th>
                        <th>nombre prepación</th>                      
                        <th>Imagen</th>
                        
                        <th>Opción</th>
                    </tr>
                </thead>

                <tbody id="datMenu">
                <?php if($menuPaciente != 'Not Found'){ ?>
                    <?php foreach($menuPaciente as $key => $value):?>  

                        <tr>
                            <td><?php echo($value->id_menu_comida);?></td>
                            <td><?php echo($value->nombre_menu); ?></td>
                            <td><?php echo($value->nombre_preparacion); ?></td>
                            <td>

                                 
                                <div class=" col-lg-6 foto">
                                    
                                    <div class="prevPhoto">
                                        
                                        <img  src = "../../resources/img/<?PHP echo $value->imagen_menu?>" alt = "menu">
                                    </div>

                                </div>
                            </td> 
                            
                            <td>
                                
                                <div>
                                    <div>
                                    <button class="btn_modificar actualizar_menu" id_menu = "<?php echo ($value->id_menu_comida); ?>" ><i class="fa fa-edit"></i></button>                              
                                    
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

<!-- Modal para registrar un menu-->

<?php include "menu_registro.php" ?>

<!-- Modal para editar un menu de comida-->
<?php include "menu_edit.php" ?>

<!-- Modal para eliminar el menu de comida -->
<?php include "menu_delete.php" ?>

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
<script src="../../js/restricciones.js"></script>
<!--Script para mostrar el ckeditor-->
<script src="../../resources/ckeditor/ckeditor.js"></script>
<script type="text/javascript">
    
    var descripcion = CKEDITOR.replace('descrip');
    var preparacion = CKEDITOR.replace('prepara');
    var ingredientes = CKEDITOR.replace('ingredi');

    var descrip = CKEDITOR.replace('descripcionIn');
    var prepara = CKEDITOR.replace('preparacionIn');
    var ingred = CKEDITOR.replace('ingredientesIn');
</script>

<script>

    $(document).ready(function () {
        
         $('.js-example-basic-multiple').select2();
        
        $("#modals_registro_menu").on('shown.bs.modal',function(){
            $('#txtnombre_menu').focus();
        })
    });
$('.box').boxWidget({
    animationSpeed:500,
    collapseTrigger:'[data-widget="collapse"]',
    removeTrigger:'[data-widget="remove"]',
    collapseIcon: 'fa-minus',
    expandIcon:'fa-plus',
    removeIcon:'fa-times'
})
</script>

