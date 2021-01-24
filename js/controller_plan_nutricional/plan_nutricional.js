

$(document).ready(function() {
	$('.calendario_menuId').click(function(e) {
		e.preventDefault();
		var id_paciente = $(this).attr('idPacienteC');
		var action = 'info_paciente_cal';
		
		$.ajax({
			url: '../../js/controller_plan_nutricional/controller.plan_nutricional.php',
			type: 'POST',
			async: true,
			data: {action: action,id_paciente:id_paciente},

		success: function(response){
			
			var info = JSON.parse(response);
			$('#id_paciente_cal').val(info.id_paciente)
		 	
              		
		},
		error:function(error) {
			console.log(error);
		}
		});
	});


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
function AbrirModalsCalendarioPaciente(){
    $('#modals_calendario_menu').modal({backdrop:'static',keyboard:false});
    $('#modals_calendario_menu').modal('show');
  
}