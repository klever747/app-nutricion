//funcion para cargar automaticamente los datos en el datatable
function consultarDiagnosticos(){
	$.ajax({
		data:{"action":"consultar"},
		url: '../../js/controller_diagnostico/controller.diagnostico.php',
		type: 'POST',
		dataType:'json'
	}).done(function(response){
		var html = "";
		$.each(response,function(index, data) {
			html +="<tr>";
			html +="<td>"+data.id_diagnostico+"</td>";
			html +="<td>"+data.ci_user+"</td>";
			html +="<td>"+data.nombre_user+"</td>";
			html +="<td>"+data.apellido_user+"</td>";
			html +="<td>"+data.date_create+"</td>";
			html +="<td>";
			html +="<button class='btn_modificar' onclick='actualizarDiagnostico("+data.id_diagnostico+");'><i class='fa fa-edit'></i></button>";
			html +="</td>";

		});
		document.getElementById("datDiagnostico").innerHTML = html;
	}).fail(function(response){
		console.log(response);
	});
}
//funcion para registrar el diagnostico de un paciente dado
function registrarDiagnostico()
{
	var id_paciente = $("#opcion_paciente_consulta").val();
	var descripcion = editor.getData();
	var contenido = descripcion.replace(/&nbsp;/gi, ' ');
  	contenido = contenido.replace(/&ntilde;/gi, "ñ");
	var action = 'registroDiagnostico';
	
	$.ajax({
		url: '../../js/controller_diagnostico/controller.diagnostico.php',
		type: 'POST',
		async: true,
		data:{action:action,id_paciente:id_paciente,contenido:contenido}
        ,
		success: function(response){
			
			if(response == 'The process was successful'){
				console.log(response);
				limpiarCampos();
				consultarDiagnosticos(); 
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
function actualizarDiagnostico(diagnosticoId){
	var diagnosticoId = diagnosticoId;
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
		
		

};

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
	var contenido = diagnosticoEdit.replace(/&nbsp;/gi, ' ');
  	contenido = contenido.replace(/&ntilde;/gi, "ñ");
	var action = 'editarDiagnostico';

	$.ajax({
			url: '../../js/controller_diagnostico/controller.diagnostico.php',
			type: 'POST',
			async: true,
			data: {action: action, contenido:contenido,idDiagnostico :idDiagnostico },

		success: function(response){
		  //var info = JSON.parse(response);
		  
		  if(response == 'The process was successfull'){
		  	$('#modals_editar_diagnostico').modal('hide');
		  	return Swal.fire("Mensaje de Confirmación", "El diagnostico se actualizo con éxito", "success");
		 	 
		  }else if(response == 'campos_vacios'){

		  		return Swal.fire("Mensaje de Advertencia", "Diagnostico no actualizado llene los campos vacios", "warning");
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