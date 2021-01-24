//funcion para registrar el diagnostico de un paciente dado
function registrarDiagnostico()
{
	var id_paciente = $("#opcion_paciente_consulta").val();
	var descripcion = editor.getData();
	var action = 'registroDiagnostico';
	
	$.ajax({
		url: '../../js/controller_diagnostico/controller.diagnostico.php',
		type: 'POST',
		async: true,
		data:{action:action,id_paciente:id_paciente,descripcion:descripcion}
        ,
		success: function(response){
			console.log(response);
			if(response == 'The process was successful'){
				limpiarCampos();
				CerrarModalsDiagnostico();
				return Swal.fire("Mensaje de Confirmación", "El diagnostico se registro con éxito", "success");
			
			}else if(response == 'no_hay_id_nutricionista'){

				return Swal.fire("Mensaje de Advertencia", "Falta identificacion del nutricionista", "warning");
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
$('.actualizarDiagnostico').click(function(e){
	e.preventDefault();
	var diagnosticoId = $(this).attr('idDiagnostico');
	var action = 'infoPaciente';

	$.ajax({
			url: '../../js/controller_diagnostico/controller.diagnostico.php',
			type: 'POST',
			async: true,
			data: {action: action, diagnosticoId:diagnosticoId},

		success: function(response){

		 var info = JSON.parse(response);
		 
		 if(response != 'no_hay_id_paciente' && response != 'no_hay_accion' && response != 'no_hay_datos'){
		 	
		 	AbrirModalsEditarDiagnostico();

		 	$('#idDiagnostico').val(info.id_diagnostico);
		 	$('#opcion_paciente_diagnostico_editar').val(info.display_name);
		  	editor1.setData(info.descripcion_diagnostico);
		  	
		 }else{

		 	return Swal.fire("Mensaje de Advertencia", "Llene los campos vacios", "warning");

		 }
		  

		  		
		},
		error:function(error) {
			console.log(error);
		}
		});
		
		

});
//funcion para editar el diagnostico
function editarDiagnostico(){

	var diagnosticoEdit = editor1.getData();
	var idDiagnostico = $("#idDiagnostico").val();
	var action = 'editarDiagnostico';

	$.ajax({
			url: '../../js/controller_diagnostico/controller.diagnostico.php',
			type: 'POST',
			async: true,
			data: {action: action, diagnosticoEdit:diagnosticoEdit,idDiagnostico :idDiagnostico },

		success: function(response){
		 console.log(response);
		  //var info = JSON.parse(response);
		  
		  if(response == 'The process was successfull'){
		  	$('#modals_editar_diagnostico').modal('hide');
		  	return Swal.fire("Mensaje de Confirmación", "El diagnostico se actualizo con éxito", "success");
		 	 
		  }else{

		  	return Swal.fire("Mensaje de Advertencia", "Diagnostico no actualizado", "warning");
		  }
			
		},
		
		error:function(error) {
			console.log(error);
		}
	});
}
//funcion para abrir el modal para editar el diagnostico
function AbrirModalsEditarDiagnostico(){
    $('#modals_editar_diagnostico').modal({backdrop:'static',keyboard:false});
    $('#modals_editar_diagnostico').modal('show');
  
}
//funcion para cerrar el modal para registrar un diagnostico
function CerrarModalsDiagnostico(){
    $('#modals_registro_diagnostico').modal({backdrop:'static',keyboard:false});
    $('#modals_registro_diagnostico').modal('hide');
  
}
//funcion para limpiar los campos del registro
function limpiarCampos(){

    $("#txtdescripcion_diagnostico").val("");
	editor1.setData(" ");
}