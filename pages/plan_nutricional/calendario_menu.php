<?php 
include  "../../controllers/curl.controller.php";
include  "../../controllers/template.controller.php";
session_start();


//metodo para extraer datos de los pacientes



$url = CurlController::api()."relations?rel=nutricionista,paciente,users&type=nutricionista,paciente,user&linkTo=id_user&equalTo=".$_SESSION["user"]->id_user."&orderBy=id_paciente&orderMode=DESC&tabla_estado=users&select=*";
$method = "GET";
$fields = array();
$header = array();

$pacientesMenu = CurlController::request($url, $method, $fields, $header)->results;
?>

<head>
	
	
	
	<script src="../../resources/js/moment.min.js"></script>

	<link rel="stylesheet" type="text/css" href="../../resources/css/fullcalendar.min.css">
	<script src="../../resources/js/fullcalendar.min.js"></script>
	<script src="../../resources/js/es.js"></script>
	

	<link href="../../pages/style/style69.css" rel="stylesheet" type="text/css">
	<script src="../js/menucomida.js?rev=<?php echo time(); ?>" type="text/javascript"></script>
	<script type="text/javascript" src="../../js/controlador_paciente/registro_paciente.js"></script>
	<script type="text/javascript" src="../../js/controller_menu_comida/menu_comida.js"></script>
    <script type="text/javascript" src="../../js/controller_plan_nutricional/plan_nutricional.js"></script>
	
    <script type="text/javascript" src="../../js/menucomida.js"></script>
    <script type="text/javascript" src="../../js/restricciones.js"></script>
</head>
	


<body>
<div class="col-md-12">
    <div class="box box-primary box-solid">
        <div class="box-header with-border">
        	<input type="hidden" name="id_paciente" id="id_paciente_cal" value="">
            <h3 class="box-title"><b>CALENDARIO DEL PACIENTE </b></h3>

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
                
                
               <div class="col-7">
               	<div id="calendario">
               	 
               	</div>
                <div class="col"></div>
               </div> 
            </div>
            
        </div>
        <!-- /.box-body -->
    </div>
</div>

<script>

	$(document).ready(function() {
       //listar los elementos del menu
        $('.js-example-basic-multiple').select2();
        //definir la variable id para ir a tomar los menus del paciente 
        var id= $('#id_paciente_cal').val();
            
        
        
		$('#calendario').fullCalendar({

			header:{
			    left: 'today, prev, next',
				center: 'title',
				right: 'month,basicWeek, basicDay, agendaWeek, agendaDay',
			},
			dayClick:function(date,jsEvent,view){
				/*
				traer_paciente();
                $('#id_fecha').val(date.format());
    			$("#modals_registro_menu").modal('show');
                */
              <?php if ($_SESSION["user"]->id_rol == 1): ?>  
                traer_paciente();
                $("#modals_opcion_menu").modal('show');
            <?php endif ?>
			},
			
			events: {
                
                url: '/pages/plan_nutricional/eventos.php?id='+id,
                dataType:'json',
                type:"GET" 

            },
            <?php if ($_SESSION["user"]->id_rol == 1): ?>
                editable:true,
            <?php endif ?>
            
            eventLimit:true,
            selectable: true,
            selectHelper:true     
            ,

			
			eventClick: function(calEvent,jsEvent,view){
               <?php if($_SESSION["user"]->id_rol == 1): ?>
				$('#titulo_evento').html(calEvent.title);
                $('#idEvent').val(calEvent.id_evento); 
                descripM.setData(calEvent.descripcion);
                $('#id_title_event').val(calEvent.title); 
                $('#ingredientes').html(calEvent.ingredientes); 
                $('#preparacion').html(calEvent.preparacion);
                $('#horaEventFinEdit').val(calEvent.hora_fin); 
                $('#id_fecha_event').val(moment(calEvent.start).format('YYYY-MM-DD')); 
                $('#id_fecha_fin_event').val(moment(calEvent.end).format('YYYY-MM-DD')); 
                $('#horaEventEdit').val(calEvent.hora_ini); 
                $('#id_color_event').val(calEvent.color); 
                
                 //cargar los datos de la foto del menu alimenticio
                  var foto = '';
                  var classRemove = 'notBlockEdit';
                  var url = '../../resources/img/';
                  if(calEvent.imagen_menu != 'img_paciente.png'){
                    classRemove = '';
                    url = "../../resources/img/"+calEvent.imagen_menu;
            
                        $("#imgEdit").remove();
                        $(".delPhotoEdit").removeClass('notBlockEdit');
                        

                        $(".prevPhotoEdit").append("<img id='imgEdit' src=" + url + ">");
                        $(".upimgEdit labelEdit").remove();
                    
                  }
				$("#menu_paciente_nutricionista").modal('show');
                <?php else: ?>
                    $('#titulo_evento').html(calEvent.title);
                    $('#idEvent').val(calEvent.id_evento);
                    //$('#id_descripcion_event_').val(calEvent.descripcion); 
                    $('#id_title_event').html(calEvent.title); 
                    $('#horaEventFinEdit').html(calEvent.hora_fin);
                    $('#ingredientesP').html(calEvent.ingredientes); 
                    $('#preparacionP').html(calEvent.preparacion);
                    $('#DescP').html(calEvent.descripcion); 
                    $('#id_fecha_event').html(moment(calEvent.start).format('YYYY-MM-DD')); 
                    $('#id_fecha_fin_event ').html(moment(calEvent.end).format('YYYY-MM-DD')); 
                    $('#horaEventEdit').html(calEvent.hora_ini); 
                    $('#id_color_event').val(calEvent.color); 
                    
                     //cargar los datos de la foto del menu alimenticio
                      var foto = '';
                      var classRemove = 'notBlockEdit';
                      var url = '../../resources/img/';
                      if(calEvent.imagen_menu != 'img_paciente.png'){
                        classRemove = '';
                        url = "../../resources/img/"+calEvent.imagen_menu;
                
                            $("#imgEdit").remove();
                            $(".delPhotoEdit").removeClass('notBlockEdit');
                            

                            $(".prevPhotoEdit").append("<img id='imgEdit' src=" + url + ">");
                            $(".upimgEdit labelEdit").remove();
                        
                      }
                    $("#menu_paciente").modal('show');
                <?php endif ?>

			},
            eventDrop:function(calEvent){
                $('#titulo_evento').html(calEvent.title);
                $('#idEvent').val(calEvent.id_evento);
                $('#id_descripcion_event_').val(calEvent.descripcion); 
                $('#id_title_event').val(calEvent.title); 
                $('#horaEventFinEdit').val(calEvent.hora_fin); 
                $('#id_fecha_event').val(moment(calEvent.start).format('YYYY-MM-DD')); 
                $('#id_fecha_fin_event ').val(moment(calEvent.end).format('YYYY-MM-DD')); 
                $('#horaEventEdit').val(calEvent.hora_ini); 
                $('#id_color_event').val(calEvent.color); 

                 recolectar_datos(); 
               
                enviarInformacion('modificar',nuevo_evento,true);
            }
			
		});   
function traer_paciente(){

            var action = 'infoPaciente';
            var pacienteId = $('#id_paciente_cal').val();
        $.ajax({
            url: '../../js/controller_plan_nutricional/controller.plan_nutricional.php',
            type: 'POST',
            async: true,
            data: {action: action, pacienteId:pacienteId},

        success: function(response){   
             
           var info = JSON.parse(response); 
          $('#nombre_paciente').val(info.display_name);
          $('#id_paciente').val(info.id_paciente); 
          $('#idNutricionista').val(info.id_nutricionista); 
        },
        error:function(error) {
            console.log(error);
        }

        });
}
            
        
	});

</script>

    <?php include "seleccion_menu.php" ?>

    
    <!-- Modal para mostrar datos del menu al precionar el evento -->
    <?php if ($_SESSION["user"]->id_rol == 1): ?>
        <div class="modal fade" id="menu_paciente_nutricionista" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="titulo_evento" style="text-align: center;"></h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
         <div>
            <input type="hidden" name="idEvent" id="idEvent" value="">
                        <div class=" col-lg-6 fotoEdit" style="text-align: center;">
                            
                                    <label for="fotoEdit">Menu Alimenticio</label>
                                    <div class="prevPhotoEdit">
                                       
                                        <label for="fotoEdit"></label>
                                    </div>
                                    <div class="upimgEdit">
                                        
                                        <img src="" id="fotoEdit"  alt="">
                                    </div>
                                    <div id="form_alertEdit"></div>
                            
                        </div>

                        <div class="col-lg-4">
                            <label for="">Fecha Inicio</label>

                            <input type="date" name="" id="id_fecha_event" value = "" class="form-control" ><br><br>
                            <label for="">Fecha Fin</label>
                            <input type="date" name="" id="id_fecha_fin_event" value = "" class="form-control"><br><br>
                        </div>
                        <div class="col-lg-12">
                            <label for="">Titulo del Menu</label>
                            <input type="text"  id="id_title_event" class="form-control" rows="8"></input ><br>

                        </div>
                        <div class="col-lg-12">
                                <label for="">Tipo de Menú</label>
                                        

                                <select class="js-example-basic-multiple" name="state" id="opcionMenuAct" style="width:100%;">
                                    <?php foreach($menu as $key => $value):?> 

                                        <option value="<?php echo $value->id_tipo_menu; ?>"><?php echo $value->nombre_tipo_menu; ?></option>
                                            
                                    <?php endforeach ?>        
                                </select><br>
                        </div>
                        <br>
                        <br>
                        <div class="col-lg-12">
                            <label for="">Hora de inicio: </label>
                            <input type="time" id="horaEventEdit" value="" name="hora" min="18:00" max="21:00" step="3600"><br>
                        </div>
                        <br>
                        <br>
                        <div class="col-lg-12">
                            <label for="">Hora Fin: </label>
                            <input type="time" id="horaEventFinEdit" value="" name="hora" min="18:00" max="21:00" step="3600" /><br>
                        </div>
                        <br>
                        <br>
                        <div class="col-lg-12">
                            <label for="">Descripcion del Menú</label>
                            <textarea name="descripMe"  id="id_descripcion_event_" class="form-control" rows="8"></textarea><br>
                        </div>
                        <div class="col-lg-12">
                            <label for="">Ingredientes del Menú</label>
                            <div id="ingredientes" >
                                
                            </div>
                            
                        </div>
                        <div class="col-lg-12">
                            <label for="">Preparacion del Menú</label>
                            <div id="preparacion" >
                                
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <label for="">Color del Evento</label>
                            <select name="color" class="form-control" id="id_color_event">
                                <option value="">Seleccionar</option>
                                <option style="color: #0071c5;" value="#0071c5">&#9724; Desayuno</option>
                                <option style="color: #40E0D0;" value="#40E0D0">&#9724; Almuerzo</option>
                                <option style="color: #008000;" value="#008000">&#9724; Cena</option>
                            </select><br>
                        </div>

        </div>
          <div class="modal-footer">
             <?php if ($_SESSION["user"]->id_rol == 1): ?>
                <button type="button"  class="btn btn-primary" id="actualizarEvent" ><i class="fa fa-save"> Guardar</i></button>
                <button type="button" class="btn btn-danger" id="eliminarEvent"><i class="fa fa-trash"> Eliminar</i></button>
            <?php endif ?>
            
            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"> Cancelar</i></button>
          </div>
        </div>
      </div>
    </div>
    <?php else: ?>
        <div class="modal fade" id="menu_paciente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title" id="titulo_evento" style="text-align: center;"></h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
         <div>
            <input type="hidden" name="idEvent" id="idEvent" value="">
                        <div class=" col-lg-6 fotoEdit" style="text-align: center;">
                            
                                    <label for="fotoEdit">Menu Alimenticio</label>
                                    <div class="prevPhotoEdit">
                                       
                                        <label for="fotoEdit"></label>
                                    </div>
                                    <div class="upimgEdit">
                                        
                                        <img src="" id="fotoEdit"  alt="">
                                    </div>
                                    <div id="form_alertEdit"></div>
                            
                        </div>

                        <div class="col-lg-4">
                            <label for="">Fecha Inicio:  <label id="id_fecha_event"></label></label>  
                            <br> 
                            <label for="">Fecha Fin:  <label id="id_fecha_fin_event"></label></label>
                            
                            <br>
                            <label for="">Hora inicio:  <label  id="horaEventEdit"></label></label>
                            
                            <br>
                            <label for="">Hora Fin:  <label  id="horaEventFinEdit"></label></label>
                            <br>
                            <br>
                        </div>
                        <div class="col-lg-12" style="text-align: center;">
                            <br>
                            <label for="" >Menu de comida</label>
                            <h4  id="id_title_event"></h4>
                            <br>

                        </div>
                        <br>
                        <div class="col-lg-12">
                            <label for="">Descripcion del Menú</label>
                            <div id="DescP" >
                                
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <label for="">Ingredientes del Menú</label>
                            <div id="ingredientesP" >
                                
                            </div>
                            
                        </div>
                        <div class="col-lg-12">
                            <label for="">Preparacion del Menú</label>
                            <div id="preparacionP" >
                                
                            </div>
                        </div>
                    <?php if ($_SESSION["user"]->id_rol == 1): ?>
                        <div class="col-lg-4">
                            <label for="">Color del Evento</label>
                            <select name="color" class="form-control" id="id_color_event">
                                <option value="">Seleccionar</option>
                                <option style="color: #0071c5;" value="#0071c5">&#9724; Desayuno</option>
                                <option style="color: #40E0D0;" value="#40E0D0">&#9724; Almuerzo</option>
                                <option style="color: #008000;" value="#008000">&#9724; Cena</option>
                            </select><br>
                        </div>
                    <?php endif ?>

        </div>
          <div class="modal-footer">
             <?php if ($_SESSION["user"]->id_rol == 1): ?>
                <button type="button"  class="btn btn-primary" id="actualizarEvent" ><i class="fa fa-save"> Guardar</i></button>
                <button type="button" class="btn btn-danger" id="eliminarEvent"><i class="fa fa-trash"> Eliminar</i></button>
            <?php endif ?>
            
            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"> Cerrar</i></button>
          </div>
        </div>
      </div>
    </div>
    <?php endif ?>
	<div class="modal fade" id="menu_paciente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="titulo_evento"></h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	     <div>
            <input type="hidden" name="idEvent" id="idEvent" value="">
                        <div class=" col-lg-6 fotoEdit" style="text-align: center;">
                            
                                    <label for="fotoEdit">Menu Alimenticio</label>
                                    <div class="prevPhotoEdit">
                                       
                                        <label for="fotoEdit"></label>
                                    </div>
                                    <div class="upimgEdit">
                                        
                                        <img src="" id="fotoEdit"  alt="">
                                    </div>
                                    <div id="form_alertEdit"></div>
                            
                        </div>

                        <div class="col-lg-4">
                            <label for="">Fecha Inicio</label>
                            <input type="date" name="" id="id_fecha_event" value = "" class="form-control"><br><br>
                            <label for="">Fecha Fin</label>
                            <input type="date" name="" id="id_fecha_fin_event" value = "" class="form-control"><br><br>
                        </div>
                        <div class="col-lg-12">
                            <label for="">Titulo del Evento</label>
                            <input type="text"  id="id_title_event" class="form-control" rows="8"></input ><br>

                        </div>
                        <br>
                        <div class="col-lg-12">
                            <label for="">Hora del Evento : </label>
                            <input type="time" id="horaEventEdit" value="" name="hora" min="18:00" max="21:00" step="3600" /><br>
                        </div>
                        <div class="col-lg-12">
                            <label for="">Hora Fin delEvento : </label>
                            <input type="time" id="horaEventFinEdit" value="" name="hora" min="18:00" max="21:00" step="3600" /><br>
                        </div>
                        <div class="col-lg-12">
                            <label for="">Descripcion del Evento</label>
                            <textarea name="menuPaciente"  id="id_descripcion_event_" class="form-control" rows="8"></textarea><br>
                        </div>
                        <div class="col-lg-4">
                            <label for="">Color del Evento</label>
                            <select name="color" class="form-control" id="id_color_event">
                                <option value="">Seleccionar</option>
                                <option style="color: #0071c5;" value="#0071c5">&#9724; Desayuno</option>
                                <option style="color: #40E0D0;" value="#40E0D0">&#9724; Almuerzo</option>
                                <option style="color: #008000;" value="#008000">&#9724; Cena</option>
                            </select>
                            <br>
                        </div>

        </div>
	      <div class="modal-footer">
             <?php if ($_SESSION["user"]->id_rol == 1): ?>
                <button type="button"  class="btn btn-primary" id="actualizarEvent" ><i class="fa fa-save"> Guardar</i></button>
                <button type="button" class="btn btn-danger" id="eliminarEvent"><i class="fa fa-trash"> Eliminar</i></button>
            <?php endif ?>
            
            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"> Cancelar</i></button>
          </div>
	    </div>
	  </div>
	</div>
    <?php include "cargar_menu_registrado.php" ?>
    
<!--Script para cargar el ckeditor-->
<script src="../../resources/ckeditor/ckeditor.js"></script>
<script type="text/javascript">
    var descrip = CKEDITOR.replace('descrip');
    var prepara = CKEDITOR.replace('prepara');
    var ingred = CKEDITOR.replace('ingredi');
</script>
<script type="text/javascript">   
    var descripM = CKEDITOR.replace('descripMe');

</script>

<!-- Script para  pintar los eventos dentro del calendario-->
<script>
    var nuevo_evento;

        $('#agregar').click(function() {
            recolectar_datos(); 
            $('#calendario').fullCalendar('renderEvent',nuevo_evento);
            //$("#modals_registro_menu").modal('toggle');
        });
        //eliminar un evento de la base de datos
        $('#eliminarEvent').click(function() {
            recolectar_datos(); 
            $('#calendario').fullCalendar('renderEvent',nuevo_evento);
            enviarInformacion('eliminar',nuevo_evento);
            //$("#modals_registro_menu").modal('toggle');
        });
        //actualizar un evento de la base de datos
        $('#actualizarEvent').click(function() {
            recolectar_datos();
            $('#calendario').fullCalendar('renderEvent',nuevo_evento);
            enviarInformacion('modificar',nuevo_evento);
            //$("#modals_registro_menu").modal('toggle');
        });
    //funcion para recolectar datos de los eventos
    function recolectar_datos(){
        var descripcion = descripM.getData();
        var contenido = descripcion.replace(/&nbsp;/gi, ' ');
        contenido = contenido.replace(/&ntilde;/gi, "ñ");
        nuevo_evento ={
                id:$('#idEvent').val(),
                title:$('#id_title_event').val(),
                descripcion:contenido,
                color:$('#id_color_event').val(),
                text_color:"#000000",
                hora_ini:$('#horaEventEdit').val(),
                hora_fin:$('#horaEventFinEdit').val(),
                start:$('#id_fecha_event').val(),
                end:$('#id_fecha_fin_event').val()
               
        };
    }
 
    //funcion para enviar informacion
    function enviarInformacion(accion,objEvento,modal){

        $.ajax({
            url: 'http://quipanutri.com/pages/plan_nutricional/eventos.php?accion='+accion,
            type: 'POST', 
            data: objEvento,

            success:function(response){
                console.log(response);
                if(response == "The process was successfull"){
                    $('#calendario').fullCalendar('refetchEvents');
                    if(!modal){
                        $("#menu_paciente_nutricionista").modal('toggle');
                    }
                      
                }else{
                    return Swal.fire("Mensaje de Advertencia", "Evento no eliminado", "warning");
                }
                
            },
            error:function() {
               alert("hay un error");
            }
        });
        
        
    }
</script>
</body>





 