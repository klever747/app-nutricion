//funcion para registrar el monitoreo de un paciente dado
function registrarMonitoreo()
{
	var id_paciente = $("#opcion_paciente_monioreo").val();
	var descripcion = editor.getData();
	var action = 'registroMonitoreo';
	
	$.ajax({
		url: '../../js/controller_monitoreo/controller.monitoreo.php',
		type: 'POST',
		async: true,
		data:{action:action,id_paciente:id_paciente,descripcion:descripcion}
        ,
		success: function(response){
			
			if(response == 'The process was successful'){
				limpiar_campos();
				CerrarModalsRegistroMonitoreo();
				return Swal.fire("Mensaje de Confirmación", "El diagnostico se registro con éxito", "success");
			
			}else if(response == 'no_hay_id_nutricionista'){

				return Swal.fire("Mensaje de Advertencia", "Falta identificacion del nutricionista o campo vacio", "warning");
			}else if(response == 'no_hay_accion'){

				return Swal.fire("Mensaje de Advertencia", "Falta accion", "warning");
			}else if(response == 'no_hay_datos'){

				return Swal.fire("Mensaje de Advertencia", "Llene los campos vacios", "warning");
			}
			
		},
		error: function(error){
			console.log(error);
			return Swal.fire("Mensaje de Advertencia", "Llene los campos vacios", "warning");
		}
	});

}
//funcion para editar datos de un monitoreo
function editarMonitoreo(){
	var id_monitoreo = $("#idMonitoreo").val();
	var descripcion_monitoreo = monitoreoEdit.getData();
	var action = 'actualizarMonitoreo';

	$.ajax({
		url: '../../js/controller_monitoreo/controller.monitoreo.php',
		type: 'POST',
		async: true,
		data:{action:action, id_monitoreo:id_monitoreo, 
			descripcion_monitoreo:descripcion_monitoreo},
		success: function(response){

			if(response == 'The process was successfull'){
				
				CerrarModalsEditarMonitoreo();
				return Swal.fire("Mensaje de Confirmación", "El monitoreo del paciente se actualizo con éxito", "success");
				
			}else if(response == 'No_user_and_id_monitoreo'){
				CerrarModalsEditarMonitoreo();
				return Swal.fire("Mensaje de Advertencia", "Falta identificacion del nutricionista", "warning");
			}else if(response == 'no_hay_accion'){
				CerrarModalsEditarMonitoreo();
				return Swal.fire("Mensaje de Advertencia", "Falta accion", "warning");
			}else if(response == "Error: Fields in the form do not match the database"){
				CerrarModalsEditarMonitoreo();
				return Swal.fire("Mensaje de Advertencia", "Error en la sintaxis a editar, no deje espacios al final", "warning");
			}else if(response == 'no_hay_datos'){
				CerrarModalsEditarMonitoreo();
				return Swal.fire("Mensaje de Advertencia", "Llene los campos vacios", "warning");
			}
			
			
		},
		error: function(error){
			console.log(error);

			return Swal.fire("Mensaje de Advertencia", "Llene los campos vacios", "warning");
		}
	});
}
$('.actualizar_monitoreo').click(function(e){
	e.preventDefault();
	var monitoreoId = $(this).attr('id_monitoreo');
	var action = 'infoPaciente';

	$.ajax({
			url: '../../js/controller_monitoreo/controller.monitoreo.php',
			type: 'POST',
			async: true,
			data: {action: action, monitoreoId:monitoreoId},

		success: function(response){

		 var info = JSON.parse(response);

		 if(response != 'no_hay_id_paciente' && response != 'no_hay_accion' && response != 'no_hay_datos'){
		 	
		 	AbrirModalsEditarMonitoreo();

		 	$('#idMonitoreo').val(info.id_monitoreo);
		 	$('#opcion_paciente_monitoreo_editar').val(info.display_name);
		  	monitoreoEdit.setData(info.descripcion_monitoreo);
		  	
		 }else{

		 	return Swal.fire("Mensaje de Advertencia", "Llene los campos vacios", "warning");

		 }
		  

		  		
		},
		error:function(error) {
			console.log(error);
		}
		});
		
		

});

//mostrar datos solo para que visualice el paciente
$('.mostrar_monitoreo').click(function(e){
	e.preventDefault();
	var monitoreoId = $(this).attr('id_monitoreo');
	var action = 'infoPaciente';

	$.ajax({
			url: '../../js/controller_monitoreo/controller.monitoreo.php',
			type: 'POST',
			async: true,
			data: {action: action, monitoreoId:monitoreoId},

		success: function(response){
			
		 var info = JSON.parse(response);

		 if(response != 'no_hay_id_paciente' && response != 'no_hay_accion' && response != 'no_hay_datos'){
		 	
		 	 AbrirModalsMostrarMonitoreo();

		 	$('#nombrePac').val(info.display_name);
		 	$('#detalle').html(info.descripcion_monitoreo);
		  	
		 }else{

		 	return Swal.fire("Mensaje de Advertencia", "Llene los campos vacios", "warning");

		 }
		  

		  		
		},
		error:function(error) {
			console.log(error);
		}
		});
		
		

});
function limpiar_campos(){
	
	editor.setData(" ");
}
//Abrir Modal Registro de consultas
function AbrirModalsRegistroMonitoreo(){
    $('#modals_registro_monitoreo').modal({backdrop:'static',keyboard:false});
    $('#modals_registro_monitoreo').modal('show');
  
}
function CerrarModalsRegistroMonitoreo(){
    $('#modals_registro_monitoreo').modal({backdrop:'static',keyboard:false});
    $('#modals_registro_monitoreo').modal('hide');
  
}
//Abrir Modal Registro de consultas
function AbrirModalsEditarMonitoreo(){
    $('#modals_editar_monitoreo').modal({backdrop:'static',keyboard:false});
    $('#modals_editar_monitoreo').modal('show');
  
}
//cerrar Modal Registro de consultas
function CerrarModalsEditarMonitoreo(){
    $('#modals_editar_monitoreo').modal({backdrop:'static',keyboard:false});
    $('#modals_editar_monitoreo').modal('hide');
  
}
//modal para mostrar el monitoreo del paciente solo paciente
function AbrirModalsMostrarMonitoreo(){
    $('#modals_mostrar_monitoreo_pac').modal({backdrop:'static',keyboard:false});
    $('#modals_mostrar_monitoreo_pac').modal('show');
  
}
function CerrarModalsMostrarMonitoreo(){
    $('#modals_mostrar_monitoreo_pac').modal({backdrop:'static',keyboard:false});
    $('#modals_mostrar_monitoreo_pac').modal('hide');
  
}