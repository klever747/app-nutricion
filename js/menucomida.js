


function filterGlobal() {
    $('#tabla_menu_comida').DataTable().search(
        $('#global_filter').val(),
    ).draw();
}
//Abrir Modal Registro menú comida
function AbrirModalsRegistro(){
    $('#modals_registro_menu').modal({backdrop:'static',keyboard:false});
    $('#modals_registro_menu').modal('show');
  
}
function AbrirModalsEditar(){
  $('#modals_editar_menu').modal({backdrop:'static',keyboard:false});
  $('#modals_editar_menu').modal('show');
}



        
                

