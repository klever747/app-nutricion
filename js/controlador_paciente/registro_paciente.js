
//metodo para dibujar en el modal
$(document).ready(function() {

 //--------------------- SELECCIONAR FOTO PACIENTE ---------------------
    $("#foto").on("change", function () {
        var uploadFoto = document.getElementById("foto").value;
        var foto = document.getElementById("foto").files;
        var nav = window.URL || window.webkitURL;
        var contactAlert = document.getElementById('form_alert');

        if (uploadFoto !== '')
        {
            var type = foto[0].type;
            var name = foto[0].name;
            if (type !== 'image/jpeg' && type !== 'image/jpg' && type !== 'image/png')
            {
                contactAlert.innerHTML = '<p class="errorArchivo">El archivo no es válido.</p>';
                $("#img").remove();
                $(".delPhoto").addClass('notBlock');
                $('#foto').val('');
                return false;
            } else {
                contactAlert.innerHTML = '';
                $("#img").remove();
                $(".delPhoto").removeClass('notBlock');
                var objeto_url = nav.createObjectURL(this.files[0]);
                $(".prevPhoto").append("<img id='img' src=" + objeto_url + ">");
                $(".upimg label").remove();

            }
        } else {
            alert("No selecciono foto");
            $("#img").remove();
        }
    });
    /////////////////

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

    $('.delPhoto').click(function () {
        $('#foto').val('');
        $(".delPhoto").addClass('notBlock');
        $("#img").remove();

        if ($("#foto_actual") && $("#foto_remove")) {
            $("#foto_remove").val('img_paciente.png');
        }

    });

    $('.delPhotoEdit').click(function () {
        $('#fotoEdit').val('');
        $(".delPhotoEdit").addClass('notBlockEdit');
        $("#imgEdit").remove();

        if ($("#foto_actualE") && $("#foto_removeE")) {
            $("#foto_removeE").val('img_paciente.png');
          // $(".fotoDatos").append("<input type='hidden' name='foto_removeE' value='img_paciente.png'>");
        }

    });

	//metodo para traer los datos del usuario a actualizar 
	$('.actualizar')	.click(function(e) {
		e.preventDefault();
		var pacienteId = $(this).attr('idPaciente');
		var action = 'infoPaciente';

		$.ajax({
			url: '../../js/controlador_paciente/controller.paciente.php',
			type: 'POST',
			async: true,
			data: {action: action, pacienteId:pacienteId},

		success: function(response){
			
		 
		  var info = JSON.parse(response);
          $('#txtcedula_editar').val(info.ci_user);
          $('#txtnombres_editar').val(info.nombre_usuario);
          $('#txtapellidop_editar').val(info.apellido_user);
          $('#txtmovil_editar').val(info.telefono_user);
          $('#txtdireccion_editar').val(info.direccion_user);
          $('#txtedadEditar').val(info.edad_user);
          $('#idP').val(info.id_user);
          $("#opcion_sexo_editar").append("<option  value="+info.id_genero+" selected='true'>"+info.genero+"</option>");
          $("#opcion_sexo_editar").append("<option  value='1'>Masculino</option>");
          $("#opcion_sexo_editar").append("<option  value='2'>Femenino</option>");
          $("#opcion_sexo_editar").append("<option  value='3'>Otro</option>");

          $('#generoEdit').val(info.genero);
         
          //$('#Profesion_editar').val(info.profesion_paciente);
          $('#ciudad_editar').val(info.ciudad_user);
         $('#txtusuario_editar').val(info.nombre_user);

          
          		
		},
		error:function(error) {
			console.log(error);
		}
		});
		
		AbrirModalsEditarPaciente();
		//alert(pacienteId);
	});

	//metodo para eliminar un paciente
	$('.eliminar')	.click(function(e) {
		e.preventDefault();
		var pacienteId = $(this).attr('idPacienteE');
		var action = 'infoPaciente';

		$.ajax({
			url: '../../js/controlador_paciente/controller.paciente.php',
			type: 'POST',
			async: true,
			data: {action: action, pacienteId:pacienteId},

		success: function(response){
			
		  var info = JSON.parse(response);

		  	
		  
		  $('#idPaciente').val(info.id_user);
          $('#txtcedula_eliminar').val(info.ci_user);
          $('#txtnombres_eliminar').val(info.nombre_usuario);
          $('#txtapellidop_eliminar').val(info.apellido_user);
          $('#txtmovil_eliminar').val(info.telefono_user);
          $('#txtdireccion_eliminar').val(info.direccion_user);
          $('#generoEliminar').val(info.genero);
          //$('#opcion_sexo_editar').val(info.genero);
          $('#txtedadEliminar').val(info.edad_user);
          $('#ciudad_eliminar').val(info.ciudad_user);
         // $('#imagen_editar').val(info.image_paciente);
          $('#txtemail_eliminar').val(info.email_user);
          $('#txtusuario_eliminar').val(info.nombre_user);
		
		},
		error:function(error) {
			console.log(error);
		}
		});
		
		AbrirModalsEliminarPaciente();
		//alert(pacienteId);
	});



});

//funcion para mostrar el modal para editar pacientes
function AbrirModalsEditarPaciente(){
    $('#modals_editar_paciente').modal({backdrop:'static',keyboard:false});
    $('#modals_editar_paciente').modal('show');
  
}
//funcion para mostrar el modal para eliminar pacientes
function AbrirModalsEliminarPaciente(){
    $('#modals_eliminar_paciente').modal({backdrop:'static',keyboard:false});
    $('#modals_eliminar_paciente').modal('show');
  
}
//funcion para registrar un paciente
function registrarPaciente()
{
	

	var cedula = $("#txtcedula").val();
	var nombres = $("#txtnombres").val();
	var apellidos = $("#txtapellidop").val();
	var movil = $("#txtmovil").val();
	var direccion = $("#txtdireccion").val();
	var sexo = $("#opcion_sexo").val();
	var edad = $("#txtedad").val();
	var profesion = $("#Profesion").val();
	var ciudad = $("#ciudad").val();
	var imagen = $("#foto").val();
	var email = $("#txtemail").val();
	var usuario = $("#txtusuario").val();
	var password = $("#txtPass").val();
	var action = 'registroPaciente';
	
	 var formData = new FormData();
     formData.append('cedula',cedula );	
     formData.append('nombres',nombres);		
     formData.append('apellidos',apellidos);	
     formData.append('movil',movil);	
     formData.append('direccion',direccion);	
     formData.append('sexo',sexo);	
     formData.append('edad',edad);	
     formData.append('profesion',profesion);	
     formData.append('ciudad',ciudad);	
     formData.append('email',email);	
     formData.append('usuario',usuario);
     formData.append('password',password);
     formData.append('action',action);	

	$.ajax({
		url: '../../js/controlador_paciente/controller.paciente.php',
		type: 'POST',
		contentType: false,
        processData: false,
		async: true,
		data:formData
        ,
		success: function(response){
			//console.log(response);
			
			if(response == "The process was successful"){	
				Limpiar_Campos();
				CerrarModalsRegistro();
				return Swal.fire("Mensaje de Confirmación", "El paciente se registro con éxito", "success");
				
			}else if(response == "error_campos_vacios"){
				return Swal.fire("Mensaje de Advertencia", "Llene los campos vacios", "warning");
			}else if(response == "error_id"){
				return Swal.fire("Mensaje de Advertencia", "No existe id del nutricionista", "warning");
			}
			
			
		},
		error: function(error){
			console.log(error);
			return Swal.fire("Mensaje de Advertencia", "Llene los campos vacios", "warning");
		}
	});

}
//funcion para editar un paciente 
function editarPaciente(){

	var cedula = $("#txtcedula_editar").val();
	var nombres = $("#txtnombres_editar").val();
	var apellidos = $("#txtapellidop_editar").val();
	var movil = $("#txtmovil_editar").val();
	var direccion = $("#txtdireccion_editar").val();
	var sexo = $("#opcion_sexo_editar").val();
	var edad = $("#txtedadEditar").val();
	//var profesion = $("#Profesion_editar").val();
	var ciudad = $("#ciudad_editar").val();
	var idP = $("#idP").val();
	
	var action = 'actualizarPaciente';


	 var formData = new FormData();
     
     
     formData.append('cedula',cedula );	
     formData.append('nombres',nombres);		
     formData.append('apellidos',apellidos);	
     formData.append('movil',movil);	
     formData.append('direccion',direccion);	
     formData.append('sexo',sexo);	
     formData.append('edad',edad);	    
     formData.append('ciudad',ciudad);	     	
     formData.append('idP',idP);
     formData.append('action',action);	

	$.ajax({
		url: '../../js/controlador_paciente/controller.paciente.php',
		type: 'POST',
		contentType: false,
        processData: false,
		async: true,
		data: formData,

		success: function(response){
			
				//$('#modals_editar_paciente').modal('hide');
				
				if(response == "The process was successfull"){	
					cerrar_modal();
					Limpiar_Campos();
					return Swal.fire("Mensaje de Confirmación", "El paciente se actualizo con éxito", "success");
					
				}else{
					return Swal.fire("Mensaje de Advertencia", "Paciente no actualizado", "warning");
				}
			
			
			
		},
		error: function(error){
			console.log(error);
			return Swal.fire("Mensaje de Advertencia", "Llene los campos vacios", "warning");
		}
	});
}

//funcion para eliminar un paciente 
function eliminarPaciente(){

	var idPaciente = $("#idPaciente").val();
	var action = 'eliminarPaciente';	
	$.ajax({
		url: '../../js/controlador_paciente/controller.paciente.php',
		type: 'POST',
		async: true,
		data: {			
			 action:action,
			 idPaciente:idPaciente
		},
		success: function(response){
			
			
				$('#modals_eliminar_paciente').modal('hide');
				if(response == "The process was successfull"){	
				
					return Swal.fire("Mensaje de Confirmación", "El paciente se elimino con éxito", "success");
					
				}else{
					return Swal.fire("Mensaje de Advertencia", "Paciente no eliminado", "warning");
				}
			
			
			
		},
		error: function(error){
			console.log(error);
			return Swal.fire("Mensaje de Advertencia", "Llene los campos vacios", "warning");
		}
	});
}

//funcion para limpiar los campos despues de registrar el paciente
 function Limpiar_Campos()
  {
  	$("#txtcedula").val("");
	$("#txtnombres").val("");
	$("#txtapellidop").val("");
	$("#txtmovil").val("");
	$("#txtdireccion").val("");
	$("#opcion_sexo").val("");
	$("#txtedad").val("");
	$("#Profesion").val("");
	$("#ciudad").val("");
	//$("#foto").val("");
	$("#txtemail").val("");
	$("#txtusuario").val("");
	$("#txtPass").val("");

	$('#foto').val('');
        $(".delPhoto").addClass('notBlock');
        $("#img").remove();
  }
  //funcion para cerrar el modal
  function cerrar_modal(){
  	 $("#opcion_sexo_editar").html("<option  value=''></option>");
  	 $('#modals_editar_paciente').modal({backdrop:'static',keyboard:false});
     $('#modals_editar_paciente').modal('hide');
  }
  //funcion para cerrar el modal de actualizar pacientes
  function closeModal(){
  	$('#modals_registro_paciente').fadeOut();
  }
  //Funciones para controlar el ingreso de la edad de un paciente
    function parametros(obj,opcion){
    	if(opcion == "edad"){
    		if(obj.value > 120){
            	obj.value = 120;
        	}
    	}    
    }

	

function CerrarModalsRegistro(){
    $('#modals_registro_paciente').modal({backdrop:'static',keyboard:false});
    $('#modals_registro_paciente').modal('hide');
  
}
