
/*=============================================
=    Registrar encuesta    =
=============================================*/
function Registrar_encuesta(){

	var id_paciente = $("#opcion_paciente_encuesta").val();
	var estado_encuesta = $("#opcion_estado").val();
	var peso_paciente = $("#txt_peso").val();
	var talla_paciente = $("#txt_talla").val();
	var pliegue_bicipital = $("#txtbicipital").val();
	var pliegue_tricipital = $("#txttricipital").val();
	var pliegue_subescapular = $("#txtsubescapular").val();
	var pliegue_suprailiaco = $("#txt_suprailiaco").val();
	var pliegue_supraespinal = $("#txt_supraespinal").val();
	var pliegue_abdominal = $("#txt_abdominal").val();
	var pliegue_muslo = $("#txtmuslo").val();
	var pliegue_pantorrilla = $("#txtpantorrilla").val();	
	var circ_cintura = $("#txt_circ_cintura").val();
	var circ_cadera = $("#txt_cadera").val();
	var circ_pantorrilla = $("#txt_pantorrilla").val();
	var circ_brazo_relajado = $("#txt_brazo_relajado").val();
	var circ_brazo_contraido = $("#txtbrazo_contraido").val();
	var bicondilio_femur = $("#txt_femur").val();
	var biepicondileo_humero = $("#txt_humero").val();
	var acido_urico = $("#txtacidourico").val();
	var bilirubina_directa = $("#txtbilirubina_directa").val();
	var colesterol_total = $("#txtcolesterol_total").val();
	var colesterol_hdl = $("#txt_colesterolhdl").val();
	var colesterol_ldl = $("#txt_colesterol_ldl").val();
	var trigliceridos = $("#txt_trogliceridos").val();
	var glucosa_ayunas = $("#txtglucosa_ayunas").val();
	var glucosa_postprandial = $("#txtglucosa_post").val();
	var creatinina = $("#txt_creatinina").val();
	var tgo_paciente = $("#txttgo").val();
	var tgp_paciente = $("#txttgp").val();
	var eritocitos = $("#txteritocitos").val();
	var conteo_plaquetario = $("#txtconteo_plaquetario").val();
	var hemoglobina = $("#txthemoglobina").val();
	var hematocritos = $("#txthematocritos").val();
	var leucocitos = $("#txtleucositos").val();
	var linfocitos = $("#txtlinfocitos").val();
	var netrofilos_segmentados= $("#txtneutrofilos_seg").val();
	var neutrofilos_no_segmentados = $("#txtneutrofilos_noseg").val();
	var eosinofilosgm = $("#txteosinofilos").val();
	var basofilos = $("#txtBasofilos").val();
	var monocitos = $("#txtmonocitos").val();
	var descripcion_paciente = dietetico.getData();
	var descripcion_dietetica_paciente = clinico.getData();
	var action = 'registroEncuesta';

	$.ajax({
		url: '../../js/controller_encuesta/controller.encuesta.php',
		type: 'POST',
		async: true,
		data:{action:action,id_paciente:id_paciente, estado_encuesta:estado_encuesta ,
	 		peso_paciente:peso_paciente ,talla_paciente:talla_paciente,pliegue_bicipital:pliegue_bicipital ,
	 pliegue_tricipital:pliegue_tricipital,
	 pliegue_subescapular:pliegue_subescapular,
	 pliegue_suprailiaco:pliegue_suprailiaco,
	 pliegue_supraespinal:pliegue_supraespinal ,
	 pliegue_abdominal:pliegue_abdominal ,
	 pliegue_muslo:pliegue_muslo ,
	 pliegue_pantorrilla:pliegue_pantorrilla ,	
	 circ_cintura:circ_cintura ,
	 circ_cadera:circ_cadera ,
	 circ_pantorrilla:circ_pantorrilla ,
	 circ_brazo_relajado:circ_brazo_relajado ,
	 circ_brazo_contraido:circ_brazo_contraido ,
	 bicondilio_femur:bicondilio_femur ,
	 biepicondileo_humero:biepicondileo_humero ,
	 acido_urico:acido_urico ,
	 bilirubina_directa:bilirubina_directa ,
	 colesterol_total:colesterol_total ,
	 colesterol_hdl:colesterol_hdl ,
	 colesterol_ldl:colesterol_ldl ,
	 trigliceridos:trigliceridos ,
	 glucosa_ayunas:glucosa_ayunas ,
	 glucosa_postprandial:glucosa_postprandial ,
	 creatinina:creatinina ,
	 tgo_paciente:tgo_paciente,
	 tgp_paciente:tgp_paciente ,
	 eritocitos:eritocitos ,
	 conteo_plaquetario:conteo_plaquetario,
	 hemoglobina:hemoglobina ,
	 hematocritos:hematocritos ,
	 leucocitos:leucocitos ,
	 linfocitos:linfocitos ,
	 netrofilos_segmentados:netrofilos_segmentados,
	 neutrofilos_no_segmentados:neutrofilos_no_segmentados,
	 eosinofilosgm:eosinofilosgm,
	 basofilos:basofilos,
	 monocitos:monocitos,
	 descripcion_paciente:descripcion_paciente,
	 descripcion_dietetica_paciente:descripcion_dietetica_paciente},
		success: function(response){
			
			console.log(response);
			if(response == 'The process was successful'){
				limpiarCampos();
				CerrarModalsEncuesta();
				return Swal.fire("Mensaje de Confirmación", "La encuesta se registro con éxito", "success");
			
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
//funcion para limpiar los campos del registro
function limpiarCampos(){

 	$("#opcion_paciente_encuesta").val();
	$("#opcion_estado").val();
	$("#txt_peso").val();
	$("#txt_talla").val();
	$("#txtbicipital").val();
	$("#txttricipital").val();
	$("#txtsubescapular").val();
	$("#txt_suprailiaco").val();
	$("#txt_supraespinal").val();
	$("#txt_abdominal").val();
	$("#txtmuslo").val();
	$("#txtpantorrilla").val();	
	$("#txt_circ_cintura").val();
	$("#txt_cadera").val();
	$("#txt_pantorrilla").val();
	$("#txt_brazo_relajado").val();
	$("#txtbrazo_contraido").val();
	$("#txt_femur").val();
	$("#txt_humero").val();
	$("#txtacidourico").val();
	$("#txtbilirubina_directa").val();
	$("#txtcolesterol_total").val();
	$("#txt_colesterolhdl").val();
	$("#txt_colesterol_ldl").val();
	$("#txt_trogliceridos").val();
	$("#txtglucosa_ayunas").val();
	$("#txtglucosa_post").val();
	$("#txt_creatinina").val();
	$("#txttgo").val();
	$("#txttgp").val();
	$("#txteritocitos").val();
	$("#txtconteo_plaquetario").val();
	$("#txthemoglobina").val();
	$("#txthematocritos").val();
	$("#txtleucositos").val();
	$("#txtlinfocitos").val();
	$("#txtneutrofilos_seg").val();
	$("#txtneutrofilos_noseg").val();
	$("#txteosinofilos").val();
	$("#txtBasofilos").val();
	$("#txtmonocitos").val();
	dietetico.setData(" ");
	clinico.setData(" ");
	 
}
//funcion para actualizar campos de la encuesta Antropometrico
function actualizar_antro(){
	var id_paciente = $("#idPaciente").val();
	var id_encuesta = $("#idEncuesta").val();
	var estado_encuesta = $("#opcion_estado_edit").val();
	var peso_paciente = $("#txt_peso_edit").val();
	var talla_paciente = $("#txt_talla_edit").val();
	var pliegue_bicipital = $("#txtbicipital_edit").val();
	var pliegue_tricipital = $("#txttricipital_edit").val();
	var pliegue_subescapular = $("#txtsubescapular_edit").val();
	var pliegue_suprailiaco = $("#txt_suprailiaco_edit").val();
	var pliegue_supraespinal = $("#txt_supraespinal_edit").val();
	var pliegue_abdominal = $("#txt_abdominal_edit").val();
	var pliegue_muslo = $("#txtmuslo_edit").val();
	var pliegue_pantorrilla = $("#txtpantorrilla_edit").val();	
	var circ_cintura = $("#txt_circ_cintura_edit").val();
	var circ_cadera = $("#txt_cadera_edit").val();
	var circ_pantorrilla = $("#txt_pantorrilla_edit").val();
	var circ_brazo_relajado = $("#txt_brazo_relajado_edit").val();
	var circ_brazo_contraido = $("#txtbrazo_contraido_edit").val();
	var bicondilio_femur = $("#txt_femur_edit").val();
	var biepicondileo_humero = $("#txt_humero_edit").val();
	var action = 'actualizarAntropometrico';
	$.ajax({
		url: '../../js/controller_encuesta/controller.encuesta.php',
		type: 'POST',
		async: true,
		data:{action:action, id_paciente:id_paciente,
		 id_encuesta:id_encuesta, 
		 estado_encuesta:estado_encuesta, 
		 peso_paciente:peso_paciente,
		 talla_paciente:talla_paciente,
		 pliegue_bicipital:pliegue_bicipital, 
		 pliegue_tricipital:pliegue_tricipital, 
		 pliegue_subescapular:pliegue_subescapular,
		 pliegue_suprailiaco:pliegue_suprailiaco, 
		 pliegue_supraespinal:pliegue_supraespinal, 
		 pliegue_abdominal:pliegue_abdominal, 
		 pliegue_muslo:pliegue_muslo,
		 pliegue_pantorrilla:pliegue_pantorrilla, 
		 circ_cintura:circ_cintura, 
		 circ_cadera:circ_cadera,
		 circ_pantorrilla:circ_pantorrilla,
		 circ_brazo_relajado:circ_brazo_relajado, 
		 circ_brazo_contraido:circ_brazo_contraido, 
		 bicondilio_femur:bicondilio_femur, 
		 biepicondileo_humero:biepicondileo_humero},
		success: function(response){
			
	
			if(response == 'The process was successful'){
				limpiarCampos();
				AbrirModalsCloseAntr();
				return Swal.fire("Mensaje de Confirmación", "La encuesta se actualizo con éxito", "success");
				
			}else if(response == 'no_hay_id_nutricionista'){
				AbrirModalsCloseAntr();
				return Swal.fire("Mensaje de Advertencia", "Falta identificacion del nutricionista", "warning");
			}else if(response == 'no_hay_accion'){
				AbrirModalsCloseAntr();
				return Swal.fire("Mensaje de Advertencia", "Falta accion", "warning");
			}else if(response == 'no_hay_datos'){
				AbrirModalsCloseAntr();
				return Swal.fire("Mensaje de Advertencia", "Llene los campos vacios", "warning");
			}
			
			
		},
		error: function(error){
			console.log(error);
			return Swal.fire("Mensaje de Advertencia", "Llene los campos vacios", "warning");
		}
	});
}
//funcion para actualizar campos de la encuesta Bioquimico
function actualizar_bioquimico(){

	var id_paciente = $("#idPacienteBio").val();
	var id_encuesta = $("#idEncuestaBio").val();
	var acido_urico = $("#txtacidourico_edit").val();
	var bilirubina_directa = $("#txtbilirubina_directa_edit").val();
	var colesterol_total = $("#txtcolesterol_total_edit").val();
	var colesterol_hdl = $("#txt_colesterolhdl_edit").val();
	var colesterol_ldl = $("#txt_colesterol_ldl_edit").val();
	var trigliceridos = $("#txt_trogliceridos_edit").val();
	var glucosa_ayunas = $("#txtglucosa_ayunas_edit").val();
	var glucosa_postprandial = $("#txtglucosa_post_edit").val();
	var creatinina = $("#txt_creatinina_edit").val();
	var tgo_paciente = $("#txttgo_edit").val();
	var tgp_paciente = $("#txttgp_edit").val();
	var eritocitos = $("#txteritocitos_edit").val();
	var conteo_plaquetario = $("#txtconteo_plaquetario_edit").val();
	var hemoglobina = $("#txthemoglobina_edit").val();
	var hematocritos = $("#txthematocritos_edit").val();
	var leucocitos = $("#txtleucositos_edit").val();
	var linfocitos = $("#txtlinfocitos_edit").val();
	var netrofilos_segmentados= $("#txtneutrofilos_seg_edit").val();
	var neutrofilos_no_segmentados = $("#txtneutrofilos_noseg_edit").val();
	var eosinofilosgm = $("#txteosinofilos_edit").val();
	var basofilos = $("#txtBasofilos_edit").val();
	var monocitos = $("#txtmonocitos_edit").val();
	var action = 'actualizarBioquimico';

	$.ajax({
		url: '../../js/controller_encuesta/controller.encuesta.php',
		type: 'POST',
		async: true,
		data:{action:action, id_paciente:id_paciente,
		 id_encuesta:id_encuesta, 
		 acido_urico:acido_urico ,
		 bilirubina_directa:bilirubina_directa ,
		 colesterol_total:colesterol_total ,
		 colesterol_hdl:colesterol_hdl ,
		 colesterol_ldl:colesterol_ldl ,
		 trigliceridos:trigliceridos ,
		 glucosa_ayunas:glucosa_ayunas ,
		 glucosa_postprandial:glucosa_postprandial ,
		 creatinina:creatinina ,
		 tgo_paciente:tgo_paciente,
		 tgp_paciente:tgp_paciente ,
		 eritocitos:eritocitos ,
		 conteo_plaquetario:conteo_plaquetario,
		 hemoglobina:hemoglobina,
		 hematocritos:hematocritos,
		 leucocitos:leucocitos,
		 linfocitos:linfocitos ,
		 netrofilos_segmentados:netrofilos_segmentados,
		 neutrofilos_no_segmentados:neutrofilos_no_segmentados,
		 eosinofilosgm:eosinofilosgm,
		 basofilos:basofilos,
		 monocitos:monocitos},
		success: function(response){
			
			if(response == 'The process was successfull'){
				
				AbrirModalsCloseBio();
				return Swal.fire("Mensaje de Confirmación", "La encuesta se actualizo con éxito", "success");
				
			}else if(response == 'no_hay_id_nutricionista'){
				AbrirModalsCloseBio();
				return Swal.fire("Mensaje de Advertencia", "Falta identificacion del nutricionista", "warning");
			}else if(response == 'no_hay_accion'){
				AbrirModalsCloseBio();
				return Swal.fire("Mensaje de Advertencia", "Falta accion", "warning");
			}else if(response == 'no_hay_datos'){
				AbrirModalsCloseBio();
				return Swal.fire("Mensaje de Advertencia", "Llene los campos vacios", "warning");
			}
			
			
		},
		error: function(error){
			console.log(error);
			return Swal.fire("Mensaje de Advertencia", "Llene los campos vacios", "warning");
		}
	});
}
//fucion para actualizar datos clinicos del paciente
function actualizar_clinico(){
	var id_encuesta = $("#idEncuestaCli").val();
	var descripcion_paciente = clinicoEdit.getData();
	var action = 'actualizarClinico';

	$.ajax({
		url: '../../js/controller_encuesta/controller.encuesta.php',
		type: 'POST',
		async: true,
		data:{action:action, id_encuesta:id_encuesta,
		 descripcion_paciente:descripcion_paciente},
		success: function(response){
			console.log(response);
			if(response == 'The process was successfull'){
				
				AbrirModalsCloseCli();
				return Swal.fire("Mensaje de Confirmación", "La encuesta se actualizo con éxito", "success");
				
			}else if(response == 'no_hay_id_nutricionista'){
				AbrirModalsCloseCli();
				return Swal.fire("Mensaje de Advertencia", "Falta identificacion del nutricionista", "warning");
			}else if(response == 'no_hay_accion'){
				AbrirModalsCloseCli();
				return Swal.fire("Mensaje de Advertencia", "Falta accion", "warning");
			}else if(response == 'no_hay_datos'){
				AbrirModalsCloseCli();
				return Swal.fire("Mensaje de Advertencia", "Llene los campos vacios", "warning");
			}
			
			
		},
		error: function(error){
			console.log(error);
			return Swal.fire("Mensaje de Advertencia", "Llene los campos vacios", "warning");
		}
	});
}
//funcion para actualizar datos Dieteticos
function editar_dietetico(){
	var id_encuesta = $("#idEncuestaDie").val();
	var descripcion_dietetico = dieteticoEdit.getData();
	var action = 'actualizarDietetico';

	$.ajax({
		url: '../../js/controller_encuesta/controller.encuesta.php',
		type: 'POST',
		async: true,
		data:{action:action, id_encuesta:id_encuesta,
		 descripcion_dietetico:descripcion_dietetico},
		success: function(response){

			if(response == 'The process was successfull'){
				
				AbrirModalsCloseDie();
				return Swal.fire("Mensaje de Confirmación", "La encuesta se actualizo con éxito", "success");
				
			}else if(response == 'no_hay_id_nutricionista'){
				AbrirModalsCloseDie();
				return Swal.fire("Mensaje de Advertencia", "Falta identificacion del nutricionista", "warning");
			}else if(response == 'no_hay_accion'){
				AbrirModalsCloseDie();
				return Swal.fire("Mensaje de Advertencia", "Falta accion", "warning");
			}else if(response == 'no_hay_datos'){
				AbrirModalsCloseDie();
				return Swal.fire("Mensaje de Advertencia", "Llene los campos vacios", "warning");
			}
			
			
		},
		error: function(error){
			console.log(error);
			return Swal.fire("Mensaje de Advertencia", "Llene los campos vacios", "warning");
		}
	});
}
$(document).ready(function() {
	//funcion para traer la encuesta de antropometria a actualizar
	$('.mostrarEncuestaAntro')	.click(function(e) {
		e.preventDefault();
		var encuestaId = $(this).attr('idEncuestaAnt');
		var action = 'infoAntropometria';

		$.ajax({
			url: '../../js/controller_encuesta/controller.encuesta.php',
			type: 'POST',
			async: true,
			data: {action: action, encuestaId:encuestaId},

		success: function(response){
			
		  var info = JSON.parse(response); 
		  $('#idPaciente').val(info.id_paciente);
		  $('#idEncuesta').val(info.id_encuesta);
          $('#txtnombres_paciente').val(info.display_name);	
          $('#opcion_estado_edit').val(info.estado_encuesta);	
          $('#txt_peso_edit').val(info.peso_paciente);	
          $('#txt_talla_edit').val(info.talla_paciente);	
          $('#txtbicipital_edit').val(info.pliegue_bicipital);	
          $('#txttricipital_edit').val(info.pliegue_tricipital);	
          $('#txtsubescapular_edit').val(info.pliegue_subescapular);	
          $('#txt_suprailiaco_edit').val(info.pliegue_suprailiaco);	
          $('#txt_supraespinal_edit').val(info.pliegue_supraespinal);	
          $('#txt_abdominal_edit').val(info.pliegue_abdominal);	
          $('#txtmuslo_edit').val(info.pliegue_muslo);	
          $('#txtpantorrilla_edit').val(info.pliegue_pantorrilla);	
          $('#txt_circ_cintura_edit').val(info.circ_cintura);	
          $('#txt_cadera_edit').val(info.circ_cadera);	
          $('#txt_pantorrilla_edit').val(info.circ_pantorrilla);	
          $('#txt_brazo_relajado_edit').val(info.circ_brazo_relajado);
          $('#txtbrazo_contraido_edit').val(info.circ_brazo_contraido);	
          $('#txt_femur_edit').val(info.biepicondileo_femur);	
          $('#txt_humero_edit').val(info.biepicondileo_humero);	

		},
		error:function(error) {
			console.log(error);
		}
		});
		
		AbrirModalsAntropometrico();
		//alert(pacienteId);
	});

	//metodo para traer datos de la encuesta datos Bioquimicos a actualizar
	$('.mostrarEncuestaBio').click(function(e) {
		e.preventDefault();
		var idEncuestaBio = $(this).attr('idEncuestaBio');
		var action = 'infoBioquimico';

				$.ajax({
			url: '../../js/controller_encuesta/controller.encuesta.php',
			type: 'POST',
			async: true,
			data: {action: action, idEncuestaBio:idEncuestaBio},

		success: function(response){
				
		  var info = JSON.parse(response); 
		  
		  
		  $('#idPacienteBio').val(info.id_paciente);
		  $('#idEncuestaBio').val(info.id_encuesta);
          $('#txtnombres_paciente_Bio').val(info.display_name);	
          $('#txtacidourico_edit').val(info.acido_urico);	
          $('#txtbilirubina_directa_edit').val(info.bilirubina_directa);	
          $('#txtcolesterol_total_edit').val(info.colesterol_total);	
          $('#txt_colesterolhdl_edit').val(info.colesterol_hdl);	
          $('#txt_colesterol_ldl_edit').val(info.colesterol_ldl);	
          $('#txt_trogliceridos_edit').val(info.trigliceridos);	
          $('#txtglucosa_ayunas_edit').val(info.glucosa_ayunas);	
          $('#txtglucosa_post_edit').val(info.glucosa_postprandial);	
          $('#txt_creatinina_edit').val(info.creatinina);	
          $('#txttgo_edit').val(info.tgo_paciente);	
          $('#txttgp_edit').val(info.tgp_paciente);	
          $('#txteritocitos_edit').val(info.eritocitos);	
          $('#txtconteo_plaquetario_edit').val(info.conteo_plaquetario);	
          $('#txthemoglobina_edit').val(info.hemoglobina);	
          $('#txthematocritos_edit').val(info.hematocritos);
          $('#txtleucositos_edit').val(info.leucocitos);	
          $('#txtlinfocitos_edit').val(info.linfocitos);	
          $('#txtneutrofilos_seg_edit').val(info.netrofilos_segmentados);
          $('#txtneutrofilos_noseg_edit').val(info.neutrofilos_no_segmentados);
          $('#txteosinofilos_edit').val(info.eosinofilosgm);
          $('#txtBasofilos_edit').val(info.basofilos);
          $('#txtmonocitos_edit').val(info.monocitos);	
		
		},
		error:function(error) {
			console.log(error);
		}
		});
		
		AbrirModalsEditarBioquimico();
		//alert(pacienteId);
	});
	//metodo para traer datos de la encuesta datos clinicos a actualizar
	$('.mostrarEncuestaClinico').click(function(e) {
		e.preventDefault();
		var idEncuestaCli = $(this).attr('idEncuestaCli');
		var action = 'infoClinico';

				$.ajax({
			url: '../../js/controller_encuesta/controller.encuesta.php',
			type: 'POST',
			async: true,
			data: {action: action, idEncuestaCli:idEncuestaCli},

		success: function(response){
				
		  var info = JSON.parse(response); 
		  $('#txtnombres_paciente_cli').val(info.display_name);
		  clinicoEdit.setData(info.descripcion_paciente);
		  $('#idEncuestaCli').val(info.id_encuesta);

		},
		error:function(error) {
			console.log(error);
		}
		});
		
		AbrirModalsEditarClinico();
		//alert(pacienteId);
	});

	//metodo para traer los datos de la encusta datos dieteticos a actualizar
	$('.mostrarEncuestaDiet').click(function(e) {
		e.preventDefault();
		var idEncuestaDiet = $(this).attr('idEncuestaDiet');
		var action = 'infoDietetico';

				$.ajax({
			url: '../../js/controller_encuesta/controller.encuesta.php',
			type: 'POST',
			async: true,
			data: {action: action, idEncuestaDiet:idEncuestaDiet},

		success: function(response){
				
		  var info = JSON.parse(response); 
		  console.log(info);
		  $('#txtnombres_paciente_die').val(info.display_name);
		  $('#idEncuestaDie').val(info.id_encuesta);
		  dieteticoEdit.setData(info.descripcion_dietetica_paciente);
		
		},
		error:function(error) {
			console.log(error);
		}
		});
		
		AbrirModalsEditarDietetico();
		//alert(pacienteId);
	});
});

//abrir modal para editar Antropometrico
 ///Abrir Modal Modificar Encuesta ABC
function AbrirModalsAntropometrico(){
    $('#modals_editar_encuesta').modal({backdrop:'static',keyboard:false});
    $('#modals_editar_encuesta').modal('show');
  
}
 ///Modal para cerrar la encuesta a registrar
function CerrarModalsEncuesta(){
    $('#modals_registrar_encuesta').modal({backdrop:'static',keyboard:false});
    $('#modals_registrar_encuesta').modal('hide');
  
}
//funcion para cerrar el modal
function AbrirModalsCloseAntr(){
    $('#modals_editar_encuesta').modal({backdrop:'static',keyboard:false});
    $('#modals_editar_encuesta').modal('hide');
  
}
function AbrirModalsEditarBioquimico(){
    $('#modals_editar_bioquimico').modal({backdrop:'static',keyboard:false});
    $('#modals_editar_bioquimico').modal('show');
  
}
//funcion para cerrar el modal
function AbrirModalsCloseBio(){
    $('#modals_editar_bioquimico').modal({backdrop:'static',keyboard:false});
    $('#modals_editar_bioquimico').modal('hide');
  
}
function AbrirModalsEditarClinico(){
    $('#modals_editar_encuesta_clinico').modal({backdrop:'static',keyboard:false});
    $('#modals_editar_encuesta_clinico').modal('show');
  
}
//funcion para cerrar el modal
function AbrirModalsCloseCli(){
    $('#modals_editar_encuesta_clinico').modal({backdrop:'static',keyboard:false});
    $('#modals_editar_encuesta_clinico').modal('hide');
  
}
function AbrirModalsEditarDietetico(){
    $('#modals_editar_encuesta_dietetico').modal({backdrop:'static',keyboard:false});
    $('#modals_editar_encuesta_dietetico').modal('show');
  
}
//funcion para cerrar el modal
function AbrirModalsCloseDie(){
    $('#modals_editar_encuesta_dietetico').modal({backdrop:'static',keyboard:false});
    $('#modals_editar_encuesta_dietetico').modal('hide');
  
}
//Funciones para controlar el ingreso de parametros en la encuesta ABCD
    function parametros(obj,opcion){
    	if(opcion == "peso"){
    		if(obj.value > 100){
            	obj.value = 800;
        	}
    	}else if(opcion == "talla"){
    		if(obj.value > 250){
            	obj.value = 250;
        	}
    	}else if(opcion == "pliegues"){

    		if(obj.value > 500){
            	obj.value = 500;
        	}
    	}else if(opcion == "circunferencia"){
    		if(obj.value > 1000){
            	obj.value = 1000;
        	}
    	}else if(opcion == "biepicondileo"){
    		if(obj.value > 800){
            	obj.value = 800;
        	}
    	}else if(opcion == "bioquimicos"){
    		if(obj.value > 700){
            	obj.value = 700;
        	}
    	}

        
    }


