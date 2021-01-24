


function filterGlobal() {
    $('#tabla_medico').DataTable().search(
        $('#global_filter').val(),
    ).draw();
}
///Abrir modal para editar Nutricionista
function AbrirModalsRegistroNutricionista(){
    $('#modals_registro_nutricionista').modal({backdrop:'static',keyboard:false});
    $('#modals_registro_nutricionista').modal('show');
  
}

//Abrir Modal Editar nutricionista
function AbrirModalsEditarNutricionista(){
    $('#modals_nutricionista_editar').modal({backdrop:'static',keyboard:false});
    $('#modals_nutricionista_editar').modal('show');
  
}
