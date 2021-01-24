//funcion para editar al nutricionista 
function editarNutricionista(){

	var cedula = $("#txtcedula").val();
	var nombres = $("#txtnombres_editar").val();
	var apellidos = $("#txtapellido_editar").val();
	var movil = $("#txtmovil_editar").val();
	var direccion = $("#txtdireccion_editar").val();
	var sexo = $("#opcion_sexo").val();
	var usuario = $("#txtusuario_editar").val();
	
	//datos para actualizar la foto
	var idN = $("#idN").val();
	var action = 'actualizarNutricionista';


	 var formData = new FormData();

     formData.append('cedula',cedula );	
     formData.append('nombres',nombres);		
     formData.append('apellidos',apellidos);	
     formData.append('movil',movil);	
     formData.append('direccion',direccion);	
     formData.append('sexo',sexo);

     formData.append('idN',idN);
     formData.append('action',action);	

	$.ajax({
		url: '../../js/controller_nutricionista/controller.nutricionista.php',
		type: 'POST',
		contentType: false,
        processData: false,
		async: true,
		data: formData,

		success: function(response){

			
			
				//$('#modals_editar_paciente').modal('hide');
				if(response == 'The process was successfull'){	
					//Limpiar_Campos();
					return Swal.fire("Mensaje de Confirmación", "El nutricionista se actualizo con éxito", "success");
					AbrirModalsEditarNutricionista();
				}else if (response == 'error_campos_vacios'){

					return Swal.fire("Mensaje de Advertencia", "Nutricionista no actualizado", "warning");
				
				}else{
					return Swal.fire("Mensaje de Confirmación", "El nutricionista se actualizo con éxito", "success");
				}
			
			
			
		},
		error: function(error){
			console.log(error);
			return Swal.fire("Mensaje de Advertencia", "Llene los campos vacios", "warning");
		}
	});
}
//Abrir Modal Editar nutricionista
function AbrirModalsEditarNutricionista(){
    $('#modals_nutricionista_editar').modal({backdrop:'static',keyboard:false});
    $('#modals_nutricionista_editar').modal('show');
  
}