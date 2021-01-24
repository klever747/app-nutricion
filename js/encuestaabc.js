/*var table_historial
function listar_historial(){
        var feinicio=$("#txtfecha_inicio").val();
        var fefin=$("#txtfecha_fin").val();
        table_historial = $("#tabla_historial").DataTable({
        "ordering":false,
         "blengthChange":false,
        "blengthChange":false,
        "paging": true,
        "searching": { "regex": false },
        "lengthMenu": [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ],
        "pageLength": 10,
        "destroy":true,
        "async": false ,
        "processing": true,
        "ajax":{
            "url":"../Controlador/historial/listar_historial.php",
            type:'POST',
            data:{
                fechainicio:feinicio,
                fechafin:fefin
            }
        },
        "order":[[1,'asc']],
        "columns":[
                       {"defaultContent":""},
                       {"data":"fua_fecharegistro"},
                       {"data":"paciente_cedula"},
                       {"data":"paciente"},
                    {"defaultContent":"<button style='font-size:13px;' type='button' class='diagnostico btn btn-default' title='diagnostico_con'><i class='fa fa-eye'></i></button>"},
                    {"defaultContent":"<button style='font-size:13px;' type='button' class='detalle btn btn-default' title='verdetalle'><i class='fa fa-eye'></i></button>"},
                    {"data":"fua_id",
                     render: function (data, type, row ) {
                    return"<button style='font-size:13px;' type='button' class='pdf btn btn-danger' title='verpdf'><i class='fa fa-print'></i></button>"
                    }
                  }
                           
        ],

        "language":idioma_espanol,
        select: true
    });

  

   table_historial.on( 'draw.dt', function () {
        var PageInfo = $('#tabla_historial').DataTable().page.info();
       table_historial.column(0, { page: 'current' }).nodes().each( function (cell, i) {
                cell.innerHTML = i + 1 + PageInfo.start;
            } );
        } );

}
//Imprimir historial
 $('#tabla_historial').on('click','.pdf',function(){
    var data = table_historial.row($(this).parents('tr')).data();
    if(table_historial.row(this).child.isShown())
    {
        var data =table_historial.row(this).data();
    }
    window.open("../Vista/libreriareporte/Reportes/ReporteHistorial.php?id="+parseInt(data.fua_id)+"#zoom=100%","Tiket","Scrollbars=No");
  })*/

  ///Abrir Modal Agregar Encuesta ABC
   function AbrirModalsRegistro(){
    $('#modals_registrar_encuesta').modal({backdrop:'static',keyboard:false});
    $('#modals_registrar_encuesta').modal('show');
  
}
 ///Abrir Modal Modificar Encuesta ABC
function AbrirModalsEditar(){
    $('#modals_editar_encuesta').modal({backdrop:'static',keyboard:false});
    $('#modals_editar_encuesta').modal('show');
  
}
function AbrirModalsEditarBioquimico(){
    $('#modals_editar_bioquimico').modal({backdrop:'static',keyboard:false});
    $('#modals_editar_bioquimico').modal('show');
  
}
function AbrirModalsEditarClinico(){
    $('#modals_editar_encuesta_clinico').modal({backdrop:'static',keyboard:false});
    $('#modals_editar_encuesta_clinico').modal('show');
  
}
function AbrirModalsEditarDietetico(){
    $('#modals_editar_encuesta_dietetico').modal({backdrop:'static',keyboard:false});
    $('#modals_editar_encuesta_dietetico').modal('show');
  
}
/*  $('#tabla_historial').on('click','.diagnostico',function(){
    var data = table_historial.row($(this).parents('tr')).data();
    if(table_historial.row(this).child.isShown())
    {
        var data =table_historial.row(this).data();
    }
     $('#modals_diagnostico').modal({backdrop:'static',keyboard:false});
    $('#modals_diagnostico').modal('show'); 
    $("#txt_diagnostico").val(data.consulta_diagnostica);
    
  })

  ///Detalle
    $('#tabla_historial').on('click','.detalle',function(){
    var data = table_historial.row($(this).parents('tr')).data();
    if(table_historial.row(this).child.isShown())
    {
        var data =table_historial.row(this).data();
    }
     $('#modals_detalle_Consulta').modal({backdrop:'static',keyboard:false});
    $('#modals_detalle_Consulta').modal('show'); 
    listar_procedimiento_detalles(data.fua_id);
    listar_medicamento_detalles(data.fua_id);
    listar_insumo_detalles(data.fua_id);
    
  })
 var table_consulta_historial
function listar_consultahistorial(){
        table_consulta_historial = $("#tabla_consultahistorial").DataTable({
        "ordering":false,
         "blengthChange":false,
        "blengthChange":false,
        "paging": true,
        "searching": { "regex": false },
        "lengthMenu": [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ],
        "pageLength": 10,
        "destroy":true,
        "async": false ,
        "processing": true,
        "ajax":{
            "url":"../Controlador/historial/listar_historialconsulta.php",
            type:'POST'
        },
        "order":[[1,'asc']],
        "columns":[
                       {"defaultContent":""},
                       {"data":"consulta_fecharegistro"},
                       {"data":"paciente_cedula"},
                       {"data":"paciente"},
                       {"defaultContent":"<button style='font-size:13px;' type='button' class='enviar btn btn-success' title='Enviar'><i class='fa fa-sign-in'></i></button>"}

        ],

        "language":idioma_espanol,
        select: true
    });

  

   table_consulta_historial.on( 'draw.dt', function () {
        var PageInfo = $('#tabla_consultahistorial').DataTable().page.info();
       table_consulta_historial.column(0, { page: 'current' }).nodes().each( function (cell, i) {
                cell.innerHTML = i + 1 + PageInfo.start;
            } );
        } );

  

}
///Enviar
 $('#tabla_consultahistorial').on('click','.enviar',function(){
    var data = table_consulta_historial.row($(this).parents('tr')).data();
    if(table_consulta_historial.row(this).child.isShown())
    {
        var data =table_consulta_historial.row(this).data();
    }
    $('#txtcodigo_historial').val(data.historia_id);
    $('#txtpaciente').val(data.paciente);
    $('#txtdescripcion').val(data.consulta_descripcion);
    $('#txtdiagnostico').val(data.consulta_diagnostica);
    $('#txt_idconsulta').val(data.consulta_id);
    $('#modals_consulta').modal('hide');
  })
 //diagnostico
 

function Listar_insumo_historial(){
    
    $.ajax({
        url:'../Controlador/historial/listar_insumohistorial.php',
        type:'POST'
        
    }).done(function (resp) {
        var data =JSON.parse(resp);
        cadena="";
        if(data.length>0){
            for(var i=0;i<data.length;i++)
            {
                 cadena+="<option value='"+data[i][0]+"'>"+data[i][1]+"</option>";
            }
            $('#opcion_Insumos').html(cadena);
             var idin = $('#opcion_Insumos').val();
            Traer_Stock_insumo(idin)
        }else{
              cadena+="<option value=''>NO SE ENCONTRARON REGISTROS</option>";
               $('#opcion_Insumos').html(cadena);
       }
        
    })
}
/////Listar procedimiento
function Listar_procedimiento_historial(){
    
    $.ajax({
        url:'../Controlador/historial/listar_procedimientohistorial.php',
        type:'POST'
        
    }).done(function (resp) {
        var data =JSON.parse(resp);
        cadena="";
        if(data.length>0){
            for(var i=0;i<data.length;i++)
            {
                 cadena+="<option value='"+data[i][0]+"'>"+data[i][1]+"</option>";
            }
            $('#opcion_procedimiento').html(cadena);
        }else{
              cadena+="<option value=''>NO SE ENCONTRARON REGISTROS</option>";
               $('#opcion_procedimiento').html(cadena);
       }
        
    })
}
/////Listar procedimiento
function Listar_medicamento_historial(){
    
    $.ajax({
        url:'../Controlador/historial/listar_medicamentohistorial.php',
        type:'POST'
        
    }).done(function (resp) {
        var data =JSON.parse(resp);
        cadena="";
        if(data.length>0){
            for(var i=0;i<data.length;i++)
            {
                cadena+="<option value='"+data[i][0]+"'>"+data[i][1]+"</option>";
            }
            $('#opcion_medicamento').html(cadena);
             var id = $('#opcion_medicamento').val();
             Traer_Stock_medicamento(id);

        }else{
              cadena+="<option value=''>NO SE ENCONTRARON REGISTROS</option>";
               $('#opcion_medicamento').html(cadena);
       }
        
    })
}
///Agregar procedimiento

function Agregar_Procedimiento(){
  var idprocedimiento=$("#opcion_procedimiento").val();
  var procedimiento=$("#opcion_procedimiento option:selected").text();

  if(procedimiento==""){
    return Swal.fire("Mensaje de Advertencia","No hay procedimientos disponibles","warning");
  }
  if(Verificarid(idprocedimiento))
  {
     return Swal.fire("Mensaje de Advertencia","El procedimiento ya fue agregado a la tabla","warning");
  }
  var datos_agregar="<tr>";
  datos_agregar+="<td for='id'>"+idprocedimiento+"</td>";
  datos_agregar+="<td >"+procedimiento+"</td>";
   datos_agregar+="<td><button class='btn btn-danger' onclick='remove(this)'><i class='fa fa-trash'></i></button></td>";
   datos_agregar+="</tr>";
   $("#tb_tabla_procedimiento").append(datos_agregar);
}

///Verificar que exista un procedimiento en la tabla
function Verificarid(id){
  let idverificar = document.querySelectorAll('#tb_tabla_procedimiento td[for="id"]');
  return [].filter.call(idverificar, td=> td.textContent === id).length===1;
}
///Funcion para eliminar un procedimientp
function remove(p){
  var td=p.parentNode;
  var tr=td.parentNode;
  var table =tr.parentNode;
  table.removeChild(tr);
}

function Agregar_Medicamento(){
  var idmedicamento=$("#opcion_medicamento").val();
  var medicamento=$("#opcion_medicamento option:selected").text();
  var medicamentoactual=$("#txt_stock_medi").val();
  var cantidadIngresada=$("#txt_Actual_medi").val();
  if(medicamento==""){
        return Swal.fire("Mensaje de Advertencia","No hay medicamentos disponibles","warning");

  }
   if(Verificaridme(idmedicamento))
  {
     return Swal.fire("Mensaje de Advertencia","El procedimiento ya fue agregado a la tabla","warning");
  }
  if (parseInt(cantidadIngresada)>parseInt(medicamentoactual)) {
    return Swal.fire("Mensaje de Advertencia","El medicamento esta agotado","warning");
  }
  if (cantidadIngresada<0) {
    return Swal.fire("Mensaje de Advertencia","No ingrese valores negativos","warning");
  }
    var datos_agregar="<tr>";
  datos_agregar+="<td for='id'>"+idmedicamento+"</td>";
  datos_agregar+="<td >"+medicamento+"</td>";
  datos_agregar+="<td>"+cantidadIngresada+"</td>";
   datos_agregar+="<td><button class='btn btn-danger'onclick='remove(this)'><i class='fa fa-trash'></i></button></td>";
   datos_agregar+="</tr>";
   $("#tb_tabla_medicamento").append(datos_agregar);
}
///Verificcar que no se
function Verificaridme(id){
  let idverificar = document.querySelectorAll('#tabla_medicamento td[for="id"]');
  return [].filter.call(idverificar, td=> td.textContent === id).length===1;
}
/////Funcion para traer el stock del medicamento
 function Traer_Stock_medicamento(id){
    
    $.ajax({
        url:'../Controlador/historial/Traer_stock_medicamento.php',
        type:'POST',
        data:{
              id:id
        }
        
    }).done(function (resp) {
        var data =JSON.parse(resp);
        cadena="";
        if(data.length>0){
        $("#txt_stock_medi").val(data[0][3]);
            
        }else{
              Swal.fire("Mensaje de Error","No se pudo traer el stock","error");
       }
        
    })
}


function Agregar_Insumos(){
  var idinsumos=$("#opcion_Insumos").val();
  var insumo=$("#opcion_Insumos option:selected").text();
  var cantidadactual=$("#txt_stock_insumo").val();
  var cantidadIngresada=$("#txt_Actual_insumo").val();
  if(insumo==""){
    return Swal.fire("Mensaje de Advertencia","No hay procedimientos disponibles","warning");

  }
  if(VerificaridIn(idinsumos))
  {
     return Swal.fire("Mensaje de Advertencia","El procedimiento ya fue agregado a la tabla","warning");
  }
  if (cantidadactual<0) {
    return Swal.fire("Mensaje de Advertencia","No ingrese valores negativos","warning");
  }
  if(parseInt(cantidadIngresada)>parseInt(cantidadactual)){
     return Swal.fire("Mensaje de Advertencia","El insumo esta agotado","warning");
  }

   var datos_agregar="<tr>";
  datos_agregar+="<td for='id'>"+idinsumos+"</td>";
  datos_agregar+="<td >"+insumo+"</td>";
   datos_agregar+="<td >"+cantidadIngresada+"</td>";
   datos_agregar+="<td><button class='btn btn-danger' onclick='remove(this)'><i class='fa fa-trash'></i></button></td>";
   datos_agregar+="</tr>";
   $("#tb_tabla_Insumo").append(datos_agregar);
  
}
////
///Verificcar que no se repita el insumo
function VerificaridIn(id){
  let idverificar = document.querySelectorAll('#tabla_Insumos td[for="id"]');
  return [].filter.call(idverificar, td=> td.textContent === id).length===1;
}
/////Funcion para traer el stock del insumo
 function Traer_Stock_insumo(idin){
    
    $.ajax({
        url:'../Controlador/historial/Traer_stock_insumo.php',
        type:'POST',
        data:{
              id:idin
        }
        
    }).done(function (resp) {
        var data =JSON.parse(resp);
        cadena="";
        if(data.length>0){
        $("#txt_stock_insumo").val(data[0][2]);
            
        }else{
              Swal.fire("Mensaje de Error","No se pudo traer el stock","error");
       }
        
    })
}
////Registrar Historial
function Agregar_Historial(){
    var idhistorial=$("#txtcodigo_historial").val();
    var idconsulta=$("#txt_idconsulta").val();
    if(idhistorial.length===0 || idconsulta.length===0)
    {
      return Swal.fire("Mensaje de Advertencia", "Los campos estan vacios", "warning"); 

    }
     $.ajax({
           "url":"../Controlador/historial/agregar_historial.php",
            type:'POST',
            data:{
                 idhistorial:idhistorial,
                 idconsulta:idconsulta
            }
            }).done(function(resp){
             if(resp>0)
             {
                  registrar_detalle_procedimiento(parseInt(resp));
                  registrar_detalle_medicamento(parseInt(resp));
                  registrar_detalle_insumos(parseInt(resp));
                   Swal.fire("Mensaje de Confirmación", "El historial se registro con éxito", "success");
                   $("#contenida_principal").load("historial/historial_vista.php");
             }else{
                Swal.fire("Mensaje de Error", "Lo sentimos, no se pudo completar el registro", "error"); 
             }
 
        })
}

function registrar_detalle_procedimiento(id){
  var count=0;
  var arreglo_idprocedimiento= new Array();
  $("#tabla_procedimiento tbody#tb_tabla_procedimiento tr").each(function(){
    arreglo_idprocedimiento.push($(this).find('td').eq(0).text());
    count++;
    
  })
  var idprocedimiento=arreglo_idprocedimiento.toString();

  if(count==0){
    return;
  }
   $.ajax({
           "url":"../Controlador/historial/agregar_detalle_historial.php",
            type:'POST',
            data:{
                 id:id,
                 idprocedimiento:idprocedimiento
            }
            }).done(function(resp){
             console.log(resp);
             
 
        })
  }
  ///Funcion para llenar la tabla de detalle de medicamentos
  function registrar_detalle_medicamento(id){
  var count=0;
  var arreglo_medicamento= new Array();
  var arreglo_cantidad= new Array();
  $("#tabla_medicamento tbody#tb_tabla_medicamento tr").each(function(){
    arreglo_medicamento.push($(this).find('td').eq(0).text());
    arreglo_cantidad.push($(this).find('td').eq(2).text());
    count++;
    
  })
  var idmedicamento=arreglo_medicamento.toString();
  var cantidad=arreglo_cantidad.toString();
  if(count==0){
    return;
  }
   $.ajax({
           "url":"../Controlador/historial/agregar_detalle_medicamento.php",
            type:'POST',
            data:{
                 id:id,
                 idmedicamento:idmedicamento,
                 cantidad:cantidad
            }
            }).done(function(resp){
             console.log(resp);
             
 
        })

  }
  function  registrar_detalle_insumos(id){
  var count=0;
  var arreglo_insumo= new Array();
  var arreglo_cantidad= new Array();
  $("#tabla_Insumos tbody#tb_tabla_Insumo tr").each(function(){
    arreglo_insumo.push($(this).find('td').eq(0).text());
    arreglo_cantidad.push($(this).find('td').eq(2).text());
    count++;
    
  })
  var idinsumo=arreglo_insumo.toString();
  var cantidad=arreglo_cantidad.toString();
  if(count==0){
    return;
  }
   $.ajax({
           "url":"../Controlador/historial/agregar_detalle_insumo.php",
            type:'POST',
            data:{
                 id:id,
                 idinsumo:idinsumo,
                 cantidad:cantidad
            }
            }).done(function(resp){
             console.log(resp);
             
 
        })

  }

  ////LISTAR DETALLE PROCEDIMIENTO
var table_detalle_procedimiento
function listar_procedimiento_detalles(idfua){
        table_detalle_procedimiento = $("#tabla_procedimiento").DataTable({
        "ordering":false,
         "blengthChange":false,
        "blengthChange":false,
        "paging": true,
        "searching": { "regex": false },
        "lengthMenu": [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ],
        "pageLength": 10,
        "destroy":true,
        "async": false ,
        "processing": true,
        "ajax":{
            "url":"../Controlador/historial/listar_procedimiento_detalle.php",
            type:'POST',
            data:{
                id:idfua

            }
        },
        "order":[[1,'asc']],
        "columns":[
                       {"defaultContent":""},
                       {"data":"procedimiento_nombre"}


        ],

        "language":idioma_espanol,
        select: true
    });

  

   table_detalle_procedimiento.on( 'draw.dt', function () {
        var PageInfo = $('#tabla_procedimiento').DataTable().page.info();
       table_detalle_procedimiento.column(0, { page: 'current' }).nodes().each( function (cell, i) {
                cell.innerHTML = i + 1 + PageInfo.start;
            } );
        } );

}
///LISTAR DETALLE DE MEDICAMENTO
var table_detalle_medicamento
function listar_medicamento_detalles(idfua){
        table_detalle_medicamento = $("#tabla_medicamento").DataTable({
        "ordering":false,
         "blengthChange":false,
        "blengthChange":false,
        "paging": true,
        "searching": { "regex": false },
        "lengthMenu": [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ],
        "pageLength": 10,
        "destroy":true,
        "async": false ,
        "processing": true,
        "ajax":{
            "url":"../Controlador/historial/listar_medicamento_detalle.php",
            type:'POST',
            data:{
                id:idfua

            }
        },
        "order":[[1,'asc']],
        "columns":[
                       {"defaultContent":""},
                       {"data":"medicamento_nombre"},
                       {"data":"datame_cantidad"}


        ],

        "language":idioma_espanol,
        select: true
    });

  

   table_detalle_medicamento.on( 'draw.dt', function () {
        var PageInfo = $('#tabla_medicamento').DataTable().page.info();
       table_detalle_medicamento.column(0, { page: 'current' }).nodes().each( function (cell, i) {
                cell.innerHTML = i + 1 + PageInfo.start;
            } );
        } );

}

///Listar 
///LISTAR DETALLE DE INSUMO
var table_detalle_insumo
function listar_insumo_detalles(idfua){
        table_detalle_insumo = $("#tabla_insumos").DataTable({
        "ordering":false,
         "blengthChange":false,
        "blengthChange":false,
        "paging": true,
        "searching": { "regex": false },
        "lengthMenu": [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ],
        "pageLength": 10,
        "destroy":true,
        "async": false ,
        "processing": true,
        "ajax":{
            "url":"../Controlador/historial/listar_insumo_detalle.php",
            type:'POST',
            data:{
                id:idfua

            }
        },
        "order":[[1,'asc']],
        "columns":[
                       {"defaultContent":""},
                       {"data":"insumo_nombre"},
                       {"data":"detain_cantidad"}


        ],

        "language":idioma_espanol,
        select: true
    });

  

   table_detalle_insumo.on( 'draw.dt', function () {
        var PageInfo = $('#tabla_insumos').DataTable().page.info();
       table_detalle_insumo.column(0, { page: 'current' }).nodes().each( function (cell, i) {
                cell.innerHTML = i + 1 + PageInfo.start;
            } );
        } );

}*/
  
  




