//funcion para validar la cedular 
function validar()
     {
       var cedula = $('#txtcedula').val();
       array = cedula.split( "" );
       num = array.length;
       if ( num == 10 )
       {
         total = 0;
         digito = (array[9]*1);
         for( i=0; i < (num-1); i++ ) { mult = 0; if ( ( i%2 ) != 0 ) { total = total + ( array[i] * 1 ); } else { mult = array[i] * 2; if ( mult > 9 )
               total = total + ( mult - 9 );
             else
               total = total + mult;
           }
         }
         decena = total / 10;
         decena = Math.floor( decena );
         decena = ( decena + 1 ) * 10;
         final = ( decena - total );
         if ( ( final == 10 && digito == 0 ) || ( final == digito ) ) {
           $(this).css("border","");
           $("#cedulaOK").html("");

           $("#validarcedula").val("Correcto");
           //return true;
         }
         else
         {
           $(this).css("border","1px solid red");

           $("#cedulaOK").html("Cedula Incorrecta");
           $("#txtcedula").val("")
           $("#validarcedula").val("Incorrecto");
         }
       }
       else
       {   $(this).css("border","1px solid red");
           $("#cedulaOK").html("Cedula Incorrecta");
           $("#txtcedula").val("")
           $("#validarcedula").val("Incorrecto");
       }
}
 //Funcion solo Numeros
function soloNumeros(e){
  tecla = (document.all) ? e.keyCode : e.which;
  if (tecla==8){
      return true;
  }
              // Patron de entrada, en este caso solo acepta numeros
  patron =/[0-9.,]/;
              
  tecla_final = String.fromCharCode(tecla);
              
   return patron.test(tecla_final);
                          
}
//Función solo letras
function soloLetras(e){
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
    especiales = "8-37-39-46";
    tecla_especial = false
    for(var i in especiales){
        if(key == especiales[i]){
            tecla_especial = true;
            break;
        }
    }
    if(letras.indexOf(tecla)==-1 && !tecla_especial){
        return false;
    }
}
//funcion para cargar el datatable
$(document).ready( function () {
        $('#dataTableD').DataTable({
            language: {
                search: "Buscar:",
                "sProcessing":       "Procesando..",
            "sLengthMenu":       "Mostrar_MENU_registro",
            "sZeroRecords":       "No se encuentran Resultados",
            "sEmptyTable":       "Ning&oacute;n dato disponible en esta tabla",
                "sInfo":          "Registros del ( _START_ al _END_ ) total de _TOTAL_ registros",
                "sInfoEmpty":     "Registros del (0 al 0) total de 0 registros",
                "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix":    "",
                "sSearch":        "Buscar",
                "sUrl":           "",
                "sInfoThousands": ",",
                "sLoadingRecords": "<b>No se encontraron Datos</b>",
                "oPaginate":{
                    "sFirst":   "Primero",
                    "sLast":    "Último",
                    "sNext":    "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria":{
                    "sSortAscending": ": Activar para ordenar la columna de order ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de order descendente"
                }
            }
        });
    });