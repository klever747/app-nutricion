//funcion para traer la imagen
//metodo para dibujar en el modal
var nuevo_evento;
$(document).ready(function() {

 //--------------------- SELECCIONAR FOTO PACIENTE ---------------------
    $("#fotoEdit").on("change", function () {
        var uploadFoto = document.getElementById("fotoEdit").value;
        var foto = document.getElementById("fotoEdit").files;
        var nav = window.URL || window.webkitURL;
        var contactAlert = document.getElementById('form_alertEdit');
        console.log(uploadFoto);
        console.log(foto);
        console.log(nav);
        if (uploadFoto !== '')
        {
            var type = foto[0].type;
            var name = foto[0].name;
            if (type !== 'image/jpeg' && type !== 'image/jpg' && type !== 'image/png')
            {
                contactAlert.innerHTML = '<p class="errorArchivo">El archivo no es válido.</p>';
                $("#imgEdit").remove();
                $(".delPhotoEdit").addClass('notBlockEdit');
                $('#fotoEdit').val('');
                return false;
            } else {
                contactAlert.innerHTML = '';
                $("#imgEdit").remove();
                $(".delPhotoEdit").removeClass('notBlockEdit');
                var objeto_url = nav.createObjectURL(this.files[0]);

                $(".prevPhotoEdit").append("<img id='imgEdit' src=" + objeto_url + ">");
                $(".upimgEdit labelEdit").remove();

            }
        } else {
            alert("No selecciono foto");
            $("#imgEdit").remove();
        }
    });

   $('.delPhotoEdit').click(function () {
        $('#fotoEdit').val('');
        $(".delPhotoEdit").addClass('notBlockEdit');
        $("#imgEdit").remove();

        if ($("#foto_actual") && $("#foto_remove")) {
            $("#foto_remove").val('img_paciente.png');
          // $(".fotoDatos").append("<input type='hidden' name='foto_removeE' value='img_paciente.png'>");
        }

    });

//funcion para traer los datos del menu a actualizar
$('.actualizar_menu')	.click(function(e) {
		e.preventDefault();
		var id_menu= $(this).attr('id_menu');
		var action = 'infoMenu';

		$.ajax({
			url: '../../js/controller_menu_comida/controller.menuComida.php',
			type: 'POST',
			async: true,
			data: {action: action, id_menu:id_menu},

		success: function(response){
			
		  var info = JSON.parse(response);
		  var foto = '';
		  $('#id_menu').val(info.id_menu_comida);
          $('#txtnombre_menu_editar').val(info.nombre_menu);
          $('#txtcalorias_editar').val(info.calorias_total);
          $('#txtcarbohidrato_editar').val(info.carbohidratos_total);
          $('#txtgrasa_editar').val(info.grasa_total);
          $('#txtproteina_editar').val(info.proteina_total);
          //$('#opcion_sexo_editar').val(info.genero);
          descripcion.setData(info.descripcion);
          preparacion.setData(info.preparacion);
          ingredientes.setData(info.ingredientes);
          $('#txtnombre_preparacion_editar').val(info.nombre_preparacion);
          $('#txtdescripcioneditar').val(info.descripcion);
          
          $('#foto_actual').val(info.imagen_menu);
          $('#foto_remove').val(info.imagen_menu);
          
           //cargar los datos de la foto en el formulario
          var foto = '';
          var classRemove = 'notBlockEdit';
          var url = '../../resources/img/';
          if(info.imagen_menu != 'img_paciente.png'){
          	classRemove = '';
          	url = "../../resources/img/"+info.imagen_menu;
 	
                $("#imgEdit").remove();
                $(".delPhotoEdit").removeClass('notBlockEdit');
                

                $(".prevPhotoEdit").append("<img id='imgEdit' src=" + url + ">");
                $(".upimgEdit labelEdit").remove();
          	
          }
          
          

			
		},
		error:function(error) {
			console.log(error);
		}
		});
		
		abrir_modals_editar();
		//alert(pacienteId);
	});	

//funcion para traer los datos del menu a eliminar
$('.eliminar_menu')	.click(function(e) {
		e.preventDefault();
		var id_menu = $(this).attr('id_menu_eliminar');
		var action  = 'infoMenu';

		$.ajax({
			url: '../../js/controller_menu_comida/controller.menuComida.php',
			type: 'POST',
			async: true,
			data: {action: action, id_menu:id_menu},

		success: function(response){
			
		  var info = JSON.parse(response);
		  var foto = '';

		  console.log(info);
		  $('#id_menu_eliminar').val(info.id_menu_comida);
          $('#nombre_menu_eliminar').val(info.nombre_menu);
          $('#calorias_eliminar').val(info.calorias_total);
          $('#carbohidrato_eliminar').val(info.carbohidratos_total);
          $('#grasa_eliminar').val(info.grasa_total);
          $('#proteina_eliminar').val(info.proteina_total);
          $('#descripcion_preparacion_eliminar').val(info.preparacion);
          //$('#opcion_sexo_editar').val(info.genero);
          $('#descripcion_ingredientes_eliminar').val(info.ingredientes);
          $('#nombre_preparacion_eliminar').val(info.nombre_preparacion);
          $('#descripcion_eliminar').val(info.descripcion);
          
          $('#foto_actual').val(info.imagen_menu);
          $('#foto_remove').val(info.imagen_menu);
          
           //cargar los datos de la foto en el formulario
          var foto = '';
          var classRemove = 'notBlockEdit';
          var url = '../../resources/img/';
          if(info.imagen_menu != 'img_paciente.png'){
          	classRemove = '';
          	url = "../../resources/img/"+info.imagen_menu;
 	
                $("#imgEdit").remove();
                $(".delPhotoEdit").removeClass('notBlockEdit');
                

                $(".prevPhotoEdit").append("<img id='imgEdit' src=" + url + ">");
                $(".upimgEdit labelEdit").remove();
          	
          }
          
          

			
		},
		error:function(error) {
			console.log(error);
		}
		});
		
		abrir_modals_eliminar()
		//alert(pacienteId);
	});	

});
//funcion para registrar un menu de comida
function registrar_menu(){

	var idNutricionista = $("#idNutricionista").val();
	var idPaciente = $("#id_paciente").val();
	var nombreMenu = $("#nombre_menu").val();
	var nombrePreparacion = $("#nombre_preparacion").val();
	var opMenu = $("#opcionMenu").val();
	var calorias = $("#calorias_menu").val();
	var carbohidratos = $("#carbohidrato_menu").val();
	var grasaTotal = $("#grasa_menu").val();
	var proteina = $("#proteina_menu").val();
	var descripcion = descrip.getData();
	var ingredientes = ingred.getData();
	var preparacion = prepara.getData();
	var fechaInicio = $("#txtfecha_inicioEvent").val();
	var fechaFin = $("#txtfecha_finEvent").val();
	var hora = $("#horaEvent").val();
	var horaFin = $("#horaEventFin").val();
	var tittle = $("#id_title").val();
	var descripcion_event = $("#id_descripcion_event").val();
	var color = $("#id_color").val();

	var action = 'registrarMenu';
	var opcionEvaluar = $("#solomenu").val();
	
	 var formData = new FormData();
     var files = $('#foto').prop("files")[0];
     formData.append('files',files);
     formData.append('idPaciente',idPaciente );	
     formData.append('nombreMenu',nombreMenu);		
     formData.append('nombrePreparacion',nombrePreparacion);	
     formData.append('opMenu',opMenu);	
     formData.append('calorias',calorias);	
     formData.append('carbohidratos',carbohidratos);
     formData.append('horaFin',horaFin);
     formData.append('grasaTotal',grasaTotal);
     formData.append('proteina',proteina);
     formData.append('preparacion',preparacion);
     formData.append('descripcion',descripcion);
     formData.append('ingredientes',ingredientes);
     formData.append('idNutricionista',idNutricionista);
     formData.append('fechaInicio',fechaInicio);
     formData.append('fechaFin',fechaFin);
     formData.append('hora',hora);
     formData.append('tittle',tittle);
     formData.append('descripcion_event',descripcion_event);
     formData.append('color',color);
     formData.append('action',action);	

	$.ajax({
		url: '../../js/controller_menu_comida/controller.menuComida.php',
		type: 'POST',
		contentType: false,
        processData: false,
		async: true,
		data: formData,

		success: function(response){

			if(opcionEvaluar == "soloMenu"){
				$("#modals_registro_menu").modal('toggle');
			
			
				//$('#modals_editar_paciente').modal('hide');
				if(response == 'The process was successful'){	
					Limpiar_Campos()
					//return Swal.fire("Mensaje de Confirmación", "El menu registrado con éxito", "success");
					//$('#calendario').fullCalendar('refetchEvents');
				}else if (response == 'error_no_accion'){

					return Swal.fire("Mensaje de Advertencia", "Nutricionista no actualizado", "warning");
				
				}	
			}else{
				recolectar_datos(); 
	            $('#calendario').fullCalendar('renderEvent',nuevo_evento);
	            $("#modals_registro_menu").modal('toggle');
				
				
					//$('#modals_editar_paciente').modal('hide');
				if(response == 'The process was successful'){	
					Limpiar_Campos()
						//return Swal.fire("Mensaje de Confirmación", "El menu registrado con éxito", "success");
					$('#calendario').fullCalendar('refetchEvents');
				}else if (response == 'error_no_accion'){

					return Swal.fire("Mensaje de Advertencia", "Nutricionista no actualizado", "warning");
					
				}
			}
				
			
		},
		error: function(error){
			console.log(error);
			return Swal.fire("Mensaje de Advertencia", "Llene los campos vacios", "warning");
		}
	});


}
//funcion para registrar un menu de comida
function registrar_menu2(){

	var idNutricionista = $("#idNutricionista2").val();
	var idPaciente = $("#id_paciente2").val();
	var nombreMenu = $("#nombre_menu").val();
	var nombrePreparacion = $("#nombre_preparacion").val();
	var opMenu = $("#opcionMenu").val();
	var calorias = $("#calorias_menu").val();
	var carbohidratos = $("#carbohidrato_menu").val();
	var grasaTotal = $("#grasa_menu").val();
	var proteina = $("#proteina_menu").val();
	var descripcion = descrip.getData();
	var ingredientes = ingred.getData();
	var preparacion = prepara.getData();
	var fechaInicio = $("#txtfecha_inicioEvent").val();
	var fechaFin = $("#txtfecha_finEvent").val();
	var hora = $("#horaEvent").val();
	var horaFin = $("#horaEventFin").val();
	var tittle = $("#id_title").val();
	var descripcion_event = $("#id_descripcion_event").val();
	var color = $("#id_color").val();

	var action = 'registrarMenu';
	
	 var formData = new FormData();
     var files = $('#foto').prop("files")[0];
     formData.append('files',files);
     formData.append('idPaciente',idPaciente );	
     formData.append('nombreMenu',nombreMenu);		
     formData.append('nombrePreparacion',nombrePreparacion);	
     formData.append('opMenu',opMenu);	
     formData.append('calorias',calorias);	
     formData.append('carbohidratos',carbohidratos);
     formData.append('horaFin',horaFin);
     formData.append('grasaTotal',grasaTotal);
     formData.append('proteina',proteina);
     formData.append('preparacion',preparacion);
     formData.append('descripcion',descripcion);
     formData.append('ingredientes',ingredientes);
     formData.append('idNutricionista',idNutricionista);
     formData.append('fechaInicio',fechaInicio);
     formData.append('fechaFin',fechaFin);
     formData.append('hora',hora);
     formData.append('tittle',tittle);
     formData.append('descripcion_event',descripcion_event);
     formData.append('color',color);
     formData.append('action',action);	
     
	$.ajax({
		url: '../../js/controller_menu_comida/controller.menuComida.php',
		type: 'POST',
		contentType: false,
        processData: false,
		async: true,
		data: formData,

		success: function(response){

			recolectar_datos(); 
            $('#calendario').fullCalendar('renderEvent',nuevo_evento);
            $("#modals_registro_menu").modal('toggle');
			
			
				//$('#modals_editar_paciente').modal('hide');
				if(response == 'The process was successful'){	
					Limpiar_Campos()
					//return Swal.fire("Mensaje de Confirmación", "El menu registrado con éxito", "success");
					$("#modal_reg_menu").modal('hide');
					$('#calendario').fullCalendar('refetchEvents');

				}else if (response == 'error_no_accion'){

					return Swal.fire("Mensaje de Advertencia", "Nutricionista no actualizado", "warning");
				
				}	
			
		},
		error: function(error){
			console.log(error);
			return Swal.fire("Mensaje de Advertencia", "Llene los campos vacios", "warning");
		}
	});


}
//funcion para asignar un menu de comida ya creado a un nuevo evento
function registrar_menu_cargado(){
	//var idNutricionista = $("#idNutricionista2").val();
	var idPaciente = $("#id_paciente3").val();
	var opcionMenu = $("#menu_cargar").val();
	
	var fechaInicio = $("#fecha_inicio_carg").val();
	var fechaFin = $("#fecha_fin_carg").val();
	var hora = $("#hora_ini_carg").val();
	var horaFin = $("#hora_fin_carg").val();
	var tittle = $("#tittle_carg").val();
	var descripcion_event = $("#descrip_carg").val();
	var color = $("#color_carg").val();
	var action = 'registrarMenu_evento';
	
	 var formData = new FormData();
     
    
     formData.append('idPaciente',idPaciente );	
     formData.append('opcionMenu',opcionMenu );			
     formData.append('horaFin',horaFin);
     formData.append('fechaInicio',fechaInicio);
     formData.append('fechaFin',fechaFin);
     formData.append('hora',hora);
     formData.append('tittle',tittle);
     formData.append('descripcion_event',descripcion_event);
     formData.append('color',color);
     formData.append('action',action);	

	$.ajax({
		url: '../../js/controller_menu_comida/controller.menuComida.php',
		type: 'POST',
		contentType: false,
        processData: false,
		async: true,
		data: formData,

		success: function(response){
			console.log(response);
			recolectar_datos2(); 
            $('#calendario').fullCalendar('renderEvent',nuevo_evento);
			
				//$('#modals_editar_paciente').modal('hide');
				if(response == 'The process was successful'){	
					Limpiar_Campos()
					//return Swal.fire("Mensaje de Confirmación", "El menu registrado con éxito", "success");
					$("#modal_cargar_menu").modal('hide');
					$('#calendario').fullCalendar('refetchEvents');

				}else if (response == 'error_no_accion'){

					return Swal.fire("Mensaje de Advertencia", "Menu no Agregado", "warning");
				
				}	
			
		},
		error: function(error){
			console.log(error);
			return Swal.fire("Mensaje de Advertencia", "Llene los campos vacios", "warning");
		}
	});
}
//funcion para editar un menu de paciente 
function editar_menu(){

	var nombre_menu = $("#txtnombre_menu_editar").val();
	var calorias = $("#txtcalorias_editar").val();
	var carbohidratos = $("#txtcarbohidrato_editar").val();
	var grasa = $("#txtgrasa_editar").val();
	var proteina = $("#txtproteina_editar").val();
	var id_menu = $("#id_menu").val();
	var descripcion1 = descripcion.getData();
	var preparacion1 = preparacion.getData();
	var ingredientes1 = ingredientes.getData();
	var nombre_preparacion = $("#txtnombre_preparacion_editar").val();

	var tipo_menu = $("#opcion_menu_editar").val();
	var fotoActual = $("#foto_actual").val();
	var fotoRemove = $("#foto_remove").val();

	var action = 'actualizar_menu';


	 var formData = new FormData();
     var files = $('#fotoEdit').prop("files")[0];//$('.prevPhotoEdit')[0].files[0];
     formData.append('file',files);
     formData.append('id_menu',id_menu);	
     formData.append('nombre_menu',nombre_menu);	
     formData.append('calorias',calorias);		
     formData.append('carbohidratos',carbohidratos);	
     formData.append('grasa',grasa);	
     formData.append('proteina',proteina);	
     formData.append('preparacion1',preparacion1);	
     formData.append('ingredientes1',ingredientes1);	

     formData.append('descripcion1',descripcion1);	
     formData.append('nombre_preparacion',nombre_preparacion);
     formData.append('tipo_menu',tipo_menu);
     formData.append('fotoActual',fotoActual);
     formData.append('fotoRemove',fotoRemove);
     formData.append('action',action);	

	$.ajax({
		url: '../../js/controller_menu_comida/controller.menuComida.php',
		type: 'POST',
		contentType: false,
        processData: false,
		async: true,
		data: formData,

		success: function(response){
					
				if(response == "The process was successfull"){	
					//Limpiar_Campos();
					$('#modals_editar_menu').modal('hide');
					return Swal.fire("Mensaje de Confirmación", "El menu de comida se actualizo con éxito", "success");					
				}else if(response == "error_campos_vacios"){
					$('#modals_editar_menu').modal('hide');
					return Swal.fire("Mensaje de Advertencia", "Campos vacios", "warning");

					
				}else{
					$('#modals_editar_menu').modal('hide');
					return Swal.fire("Mensaje de Confirmación", "El menu de comida se actualizo con éxito", "success");					

				}
			
			
			
		},
		error: function(error){
			console.log(error);
			return Swal.fire("Mensaje de Advertencia", "Llene los campos vacios", "warning");
		}
	});
}
//funcion para eliminar un menu
function eliminar_menu(){

	var id_menu = $('#id_menu_eliminar').val();
	var action = 'eliminar_menu';

	$.ajax({
		url: '../../js/controller_menu_comida/controller.menuComida.php',
		type: 'POST',
		async: true,
		data: {			
			 action:action,
			 id_menu:id_menu
		},
		success: function(response){
			console.log(response);
			
				
				if(response == "The process was successfull"){	
					$('#modals_eliminar_menu').modal('hide');
					return Swal.fire("Mensaje de Confirmación", "El menu de comida se elimino con éxito", "success");
					
				}else{
					return Swal.fire("Mensaje de Advertencia", "El menu de comdia no se ha eliminado", "warning");
				}
			
			
			
		},
		error: function(error){
			console.log(error);
			return Swal.fire("Mensaje de Advertencia", "Llene los campos vacios", "warning");
		}
	});
}
//funcion para limpiar los campos
 function Limpiar_Campos()
  {
  	var opMenu = $("#opcionMenu").val();
	var nombreMenu = $("#nombre_menu").val();
	var nombrePreparacion = $("#nombre_preparacion").val();
	var calorias = $("#calorias_menu").val();
	var carbohidratos = $("#carbohidrato_menu").val();
	var idPaciente = $("#opcionPaciente").val();
	var grasaTotal = $("#grasa_menu").val();
	var proteina = $("#proteina_menu").val();
	var preparacion = $("#preparacion_menu").val();
	var ingredientes = $("#ingredientes_menu").val();
	var descripcion = $("#descripcion_menu").val();
	var idNutricionista = $("#idNutricionista").val();
  	$("#nombre_menu").val("");
	$("#nombre_preparacion").val("");
	$("#calorias_menu").val("");
	$("#carbohidrato_menu").val("");
	$("#grasa_menu").val("");
	$("#proteina_menu").val("");
	$("#preparacion_menu").val("");
	$("#ingredientes_menu").val("");
	$("#descripcion_menu").val("");


	$('#foto').val('');
        $(".delPhoto").addClass('notBlock');
        $("#img").remove();
  }
//funcion para cerrar el modal de registro de menu
function closeModal(){
  	$('#modals_registro_menu').fadeOut();
}

//funcion para recolectar datos de los eventos
function recolectar_datos(){
        nuevo_evento ={
                title:$('#id_title').val(),
                descripcion:$('#id_descripcion_event').val(),
                color:$('#id_color').val(),
                text_color:"#000000",
                start:$('#txtfecha_inicioEvent').val()+" "+$('#horaEvent').val(),
                end:$('#txtfecha_finEvent').val()
        };
}
//funcion para recolectar datos de los eventos
function recolectar_datos2(){
        nuevo_evento ={
                title:$('#tittle_carg').val(),
                descripcion:$('#descrip_carg').val(),
                color:$('#color_carg').val(),
                text_color:"#000000",
                start:$('#fecha_inicio_carg').val()+" "+$('#hora_ini_carg').val(),
                end:$('#fecha_fin_carg').val()
        };
}
//funcion para abrir el modal para editar un menu
function abrir_modals_editar(){
  $('#modals_editar_menu').modal({backdrop:'static',keyboard:false});
  $('#modals_editar_menu').modal('show');
}
//funcion para abrir el modal para eliminar un menu
function abrir_modals_eliminar(){
  $('#modals_eliminar_menu').modal({backdrop:'static',keyboard:false});
  $('#modals_eliminar_menu').modal('show');
}
function AbrirModalsEditar(){
  $('#modals_editar_menu').modal({backdrop:'static',keyboard:false});
  $('#modals_editar_menu').modal('show');
}
  //Funciones para controlar el ingreso de carbohidrados,grasas
    function parametros(obj,opcion){
    	if(opcion == "grasas"){
    		if(obj.value > 20000){
            	obj.value = 20000;
        	}
    	}    
    }