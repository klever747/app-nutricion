

function filterGlobal() {
    $('#tabla_paciente').DataTable().search(
        $('#global_filter').val(),
    ).draw();
}
//Abrir Modal Registro Insumos
function AbrirModalsRegistroPaciente(){
    $('#modals_registro_paciente').modal({backdrop:'static',keyboard:false});
    $('#modals_registro_paciente').modal('show');

    
}


function AbrirModalsEditarPaciente(){
    $('#modals_editar_paciente').modal({backdrop:'static',keyboard:false});
    $('#modals_editar_paciente').modal('show');
  
}

//Listar rol
