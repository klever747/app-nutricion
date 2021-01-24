
function CrearGrafico(titulo, cantidad, colores, tipo, encabezado, id) {
    var ctx = document.getElementById(id);
    var myChart = new Chart(ctx, {
        type: tipo,
        data: {
            labels: titulo,
            datasets: [{
                    label: encabezado,
                    data: cantidad,
                    backgroundColor: colores,
                    borderColor: colores,
                    borderWidth: 1
                }]
        },
        options: {
            scales: {
                yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
            }
        }
    });

}
function CrearGraficoSomatocarta(datos,colores,  tipo, encabezado, id) {
    var ctx = document.getElementById(id);
    var myChart = new Chart(ctx, {
        type: tipo,
        data: {
            //labels: x,
            datasets: [{
                    label: encabezado,
                    data:datos,
                    BackgroundColor:'white',
                    pointBackgroundColor:colores,
                    pointBorderColor:colores,
                    borderColor: colores,
                    pointradius:6,
                    pointStyle:'circle',
                    borderWidth: 1,
                    showLine: false,
                   
                }]
        },
        options: {
            scales: {
                xAxes: [{ 
                        ticks: {
                             min: -9,
                              max: 9,
                               stepSize: 1,
                                  stacked: true
                        }
                    }],
                     yAxes: [{
                        ticks: {
                             min: -12,
                              max: 16,
                               stepSize: 2,
                                  stacked: true
                        }
                    }],


            }
        }
    });
    

}
//funcion para dibujar la somatocarta
function somatotipocarta(){
    var fechainicio = $("#txtfecha_inicio").val();
    var fechafin = $("#txtfecha_fin").val();
    var paciente = $("#opcion_paciente_diagnostico").val();
    var action = 'infoBicipital';
    $.ajax({
        url: '../../js/controller_evaluacion/controller.evaluacion.php',
        type: 'POST',
        async: true,
        data:{
            action:action,
            fechainicio:fechainicio,
            fechafin:fechafin,
            paciente:paciente
        },
        success: function(resp){ 
        
        if (resp.length > 0) {

            var colores = [];
            var datos  = [];
            var objeto = {};
            var data = JSON.parse(resp);

            var x = (data[0].ectomorfia - data[0].endomorfia).toFixed(4);
            var y = (2*(parseFloat(data[0].mesomorfia)) - (parseFloat(data[0].ectomorfia) + parseFloat(data[0].endomorfia))).toFixed(4);
           //for (var i = 0; i < data.length; i++) {
               
               $("#endomorfia").html(data[0].endomorfia);   
               $("#mesomorfia").html(data[0].mesomorfia); 
               $("#ectomorfia").html(data[0].ectomorfia);
               $("#x").html(x); 
               $("#y").html(y);
               
                // var punto = i;

                   datos.push({ 
                        "x"    : (x),
                        "y"  : (y)         
                   });
       
                colores.push(colorRGB());     

           //}
           objeto.datos=datos;
       

            CrearGraficoSomatocarta(datos, colores,'scatter','SOMATOTIPO','somatocarta');

        }
        
        },
        error: function(error){
            console.log(error);
            return Swal.fire("Mensaje de Advertencia", "Llene los campos vacios", "warning");
        }
    
    });
}

function imc() {
    var fechainicio = $("#txtfecha_inicio").val();
    var fechafin = $("#txtfecha_fin").val();
    var paciente = $("#opcion_paciente_diagnostico").val();
    var action = 'infoBicipital';
    

    $.ajax({
        url: '../../js/controller_evaluacion/controller.evaluacion.php',
        type: 'POST',
        async: true,
        data:{
            action:action,
            fechainicio:fechainicio,
            fechafin:fechafin,
            paciente:paciente
        },
        success: function(resp){ 
        
            if (resp.length > 0) {
                var titulo= [];
                var cantidad = [];
                var colores = [];
                var data = JSON.parse(resp);
                
                for (var i = 0; i < data.length; i++) {
                    titulo.push(data[i].date_create);
                    cantidad.push(data[i].imc_paciente);
                    colores.push(colorRGB());
                }
                

                CrearGrafico(titulo, cantidad, colores, 'bar', 'IMC(kg/m2)', 'imc_grafico');

                

            }
        
        },
        error: function(error){
            console.log(error);
            return Swal.fire("Mensaje de Advertencia", "Llene los campos vacios", "warning");
        }
    });

}

function bicipital() {
    var fechainicio = $("#txtfecha_inicio").val();
    var fechafin = $("#txtfecha_fin").val();
    var paciente = $("#opcion_paciente_diagnostico").val();
    var action = 'infoBicipital';
    

    $.ajax({
        url: '../../js/controller_evaluacion/controller.evaluacion.php',
        type: 'POST',
        async: true,
        data:{
            action:action,
            fechainicio:fechainicio,
            fechafin:fechafin,
            paciente:paciente
        },
        success: function(resp){ 
        
            if (resp.length > 0) {
                var titulo= [];
                var cantidad = [];
                var colores = [];
                var data = JSON.parse(resp);
                
                for (var i = 0; i < data.length; i++) {
                    titulo.push(data[i].date_create);
                    cantidad.push(data[i].pliegue_bicipital);
                    colores.push(colorRGB());
                }
                

                CrearGrafico(titulo, cantidad, colores, 'line', 'P BICIPITAL(mm)', 'bicipital_grafico');

                

            }
        
        },
        error: function(error){
            console.log(error);
            return Swal.fire("Mensaje de Advertencia", "Llene los campos vacios", "warning");
        }
    });

}

function tricipital() {
    var fechainicio = $("#txtfecha_inicio").val();
    var fechafin = $("#txtfecha_fin").val();
    var paciente = $("#opcion_paciente_diagnostico").val();
    var action = 'infoBicipital';
    

    $.ajax({
        url: '../../js/controller_evaluacion/controller.evaluacion.php',
        type: 'POST',
        async: true,
        data:{
            action:action,
            fechainicio:fechainicio,
            fechafin:fechafin,
            paciente:paciente
        },
        success: function(resp){
             
        
        if (resp.length > 0) {
            var titulo= [];
            var cantidad = [];
            var colores = [];
            var data = JSON.parse(resp);
            
            for (var i = 0; i < data.length; i++) {
                titulo.push(data[i].date_create);
                cantidad.push(data[i].pliegue_tricipital);
                colores.push(colorRGB());
            }
            CrearGrafico(titulo, cantidad, colores, 'line', 'PLIEGUE TRICIPITAL(mm)', 'tricipital_grafico');

        }
        
        },
        error: function(error){
            console.log(error);
            return Swal.fire("Mensaje de Advertencia", "Llene los campos vacios", "warning");
        }
    });

}
function subescapular() {
   var fechainicio = $("#txtfecha_inicio").val();
    var fechafin = $("#txtfecha_fin").val();
    var paciente = $("#opcion_paciente_diagnostico").val();
    var action = 'infoBicipital';
    

    $.ajax({
        url: '../../js/controller_evaluacion/controller.evaluacion.php',
        type: 'POST',
        async: true,
        data:{
            action:action,
            fechainicio:fechainicio,
            fechafin:fechafin,
            paciente:paciente
        },
        success: function(resp){
             
        
        if (resp.length > 0) {
            var titulo= [];
            var cantidad = [];
            var colores = [];
            var data = JSON.parse(resp);
            
            for (var i = 0; i < data.length; i++) {
                titulo.push(data[i].date_create);
                cantidad.push(data[i].pliegue_subescapular);
                colores.push(colorRGB());
            }
            CrearGrafico(titulo, cantidad, colores, 'line', 'SUBESCAPULAR(mm)', 'subescapular_grafico');

        }
        
        },
        error: function(error){
            console.log(error);
            return Swal.fire("Mensaje de Advertencia", "Llene los campos vacios", "warning");
        }
    });

}
function peso_graso() {
   var fechainicio = $("#txtfecha_inicio").val();
    var fechafin = $("#txtfecha_fin").val();
    var paciente = $("#opcion_paciente_diagnostico").val();
    var action = 'infoBicipital';
    

    $.ajax({
        url: '../../js/controller_evaluacion/controller.evaluacion.php',
        type: 'POST',
        async: true,
        data:{
            action:action,
            fechainicio:fechainicio,
            fechafin:fechafin,
            paciente:paciente
        },
        success: function(resp){
             
        
        if (resp.length > 0) {
            var titulo= [];
            var cantidad = [];
            var colores = [];
            var data = JSON.parse(resp);
            
            for (var i = 0; i < data.length; i++) {
                titulo.push(data[i].date_create);
                cantidad.push(data[i].peso_graso);
                colores.push(colorRGB());
            }
            CrearGrafico(titulo, cantidad, colores, 'line', 'PESO GRASO', 'peso_graso');

        }
        
        },
        error: function(error){
            console.log(error);
            return Swal.fire("Mensaje de Advertencia", "Llene los campos vacios", "warning");
        }
    });

}
function peso_magro(){
   var fechainicio = $("#txtfecha_inicio").val();
    var fechafin = $("#txtfecha_fin").val();
    var paciente = $("#opcion_paciente_diagnostico").val();
    var action = 'infoBicipital';
    

    $.ajax({
        url: '../../js/controller_evaluacion/controller.evaluacion.php',
        type: 'POST',
        async: true,
        data:{
            action:action,
            fechainicio:fechainicio,
            fechafin:fechafin,
            paciente:paciente
        },
        success: function(resp){
             
        
        if (resp.length > 0) {
            var titulo= [];
            var cantidad = [];
            var colores = [];
            var data = JSON.parse(resp);
            
            for (var i = 0; i < data.length; i++) {
                titulo.push(data[i].date_create);
                cantidad.push(data[i].peso_magro);
                colores.push(colorRGB());
            }
            CrearGrafico(titulo, cantidad, colores, 'line', 'PESO MAGRO', 'peso_magro');

        }
        
        },
        error: function(error){
            console.log(error);
            return Swal.fire("Mensaje de Advertencia", "Llene los campos vacios", "warning");
        }
    });

}
function porcentaje_masa_grasa(){
   var fechainicio = $("#txtfecha_inicio").val();
    var fechafin = $("#txtfecha_fin").val();
    var paciente = $("#opcion_paciente_diagnostico").val();
    var action = 'infoBicipital';
    

    $.ajax({
        url: '../../js/controller_evaluacion/controller.evaluacion.php',
        type: 'POST',
        async: true,
        data:{
            action:action,
            fechainicio:fechainicio,
            fechafin:fechafin,
            paciente:paciente
        },
        success: function(resp){
             
        
        if (resp.length > 0) {
            var titulo= [];
            var cantidad = [];
            var colores = [];
            var data = JSON.parse(resp);
            
            for (var i = 0; i < data.length; i++) {
                titulo.push(data[i].date_create);
                cantidad.push(data[i].porcentaje_masa_grasa);
                colores.push(colorRGB());
            }
            CrearGrafico(titulo, cantidad, colores, 'line', '% M-GRASA', 'porcentaje_masa_grasa');

        }
        
        },
        error: function(error){
            console.log(error);
            return Swal.fire("Mensaje de Advertencia", "Llene los campos vacios", "warning");
        }
    });

}
function peso_paciente(){
   var fechainicio = $("#txtfecha_inicio").val();
    var fechafin = $("#txtfecha_fin").val();
    var paciente = $("#opcion_paciente_diagnostico").val();
    var action = 'infoBicipital';
    

    $.ajax({
        url: '../../js/controller_evaluacion/controller.evaluacion.php',
        type: 'POST',
        async: true,
        data:{
            action:action,
            fechainicio:fechainicio,
            fechafin:fechafin,
            paciente:paciente
        },
        success: function(resp){
             
        
        if (resp.length > 0) {
            var titulo= [];
            var cantidad = [];
            var colores = [];
            var data = JSON.parse(resp);
            
            for (var i = 0; i < data.length; i++) {
                titulo.push(data[i].date_create);
                cantidad.push(data[i].peso_paciente);
                colores.push(colorRGB());
            }
            CrearGrafico(titulo, cantidad, colores, 'line', 'PESO Kg', 'peso_paciente');

        }
        
        },
        error: function(error){
            console.log(error);
            return Swal.fire("Mensaje de Advertencia", "Llene los campos vacios", "warning");
        }
    });

}
function acido_urico(){
   var fechainicio = $("#txtfecha_inicio").val();
    var fechafin = $("#txtfecha_fin").val();
    var paciente = $("#opcion_paciente_diagnostico").val();
    var action = 'info_bioquimico';
    

    $.ajax({
        url: '../../js/controller_evaluacion/controller.evaluacion.php',
        type: 'POST',
        async: true,
        data:{
            action:action,
            fechainicio:fechainicio,
            fechafin:fechafin,
            paciente:paciente
        },
        success: function(resp){
             
        
        if (resp.length > 0) {
            var titulo= [];
            var cantidad = [];
            var colores = [];
            var data = JSON.parse(resp);
            
            for (var i = 0; i < data.length; i++) {
                titulo.push(data[i].date_create);
                cantidad.push(data[i].acido_urico);
                colores.push(colorRGB());
            }
            CrearGrafico(titulo, cantidad, colores, 'line', 'Acido Urico', 'acido_urico_paciente');

        }
        
        },
        error: function(error){
            console.log(error);
            return Swal.fire("Mensaje de Advertencia", "Llene los campos vacios", "warning");
        }
    });

}
function bilirubina_paciente(){
   var fechainicio = $("#txtfecha_inicio").val();
    var fechafin = $("#txtfecha_fin").val();
    var paciente = $("#opcion_paciente_diagnostico").val();
    var action = 'info_bioquimico';

    $.ajax({
        url: '../../js/controller_evaluacion/controller.evaluacion.php',
        type: 'POST',
        async: true,
        data:{
            action:action,
            fechainicio:fechainicio,
            fechafin:fechafin,
            paciente:paciente
        },
        success: function(resp){
        
        if (resp.length > 0) {
            var titulo= [];
            var cantidad = [];
            var colores = [];
            var data = JSON.parse(resp);
            
            for (var i = 0; i < data.length; i++) {
                titulo.push(data[i].date_create);
                cantidad.push(data[i].bilirubina_directa);
                colores.push(colorRGB());
            }
            CrearGrafico(titulo, cantidad, colores, 'line', 'Bilirrubina', 'bilirubina_paciente');

        }
        
        },
        error: function(error){
            console.log(error);
            return Swal.fire("Mensaje de Advertencia", "Llene los campos vacios", "warning");
        }
    });

}
function colesterol_paciente(){
   var fechainicio = $("#txtfecha_inicio").val();
    var fechafin = $("#txtfecha_fin").val();
    var paciente = $("#opcion_paciente_diagnostico").val();
    var action = 'info_bioquimico';

    $.ajax({
        url: '../../js/controller_evaluacion/controller.evaluacion.php',
        type: 'POST',
        async: true,
        data:{
            action:action,
            fechainicio:fechainicio,
            fechafin:fechafin,
            paciente:paciente
        },
        success: function(resp){
        
        if (resp.length > 0) {
            var titulo= [];
            var cantidad = [];
            var colores = [];
            var data = JSON.parse(resp);
            
            for (var i = 0; i < data.length; i++) {
                titulo.push(data[i].date_create);
                cantidad.push(data[i].colesterol_total);
                colores.push(colorRGB());
            }
            CrearGrafico(titulo, cantidad, colores, 'line', 'COLESTEROL', 'colesterol_paciente');

        }
        
        },
        error: function(error){
            console.log(error);
            return Swal.fire("Mensaje de Advertencia", "Llene los campos vacios", "warning");
        }
    });

}
function hdl_paciente(){
   var fechainicio = $("#txtfecha_inicio").val();
    var fechafin = $("#txtfecha_fin").val();
    var paciente = $("#opcion_paciente_diagnostico").val();
    var action = 'info_bioquimico';

    $.ajax({
        url: '../../js/controller_evaluacion/controller.evaluacion.php',
        type: 'POST',
        async: true,
        data:{
            action:action,
            fechainicio:fechainicio,
            fechafin:fechafin,
            paciente:paciente
        },
        success: function(resp){
        
        if (resp.length > 0) {
            var titulo= [];
            var cantidad = [];
            var colores = [];
            var data = JSON.parse(resp);
            
            for (var i = 0; i < data.length; i++) {
                titulo.push(data[i].date_create);
                cantidad.push(data[i].colesterol_hdl);
                colores.push(colorRGB());
            }
            CrearGrafico(titulo, cantidad, colores, 'line', 'HDL', 'hdl_paciente');

        }
        
        },
        error: function(error){
            console.log(error);
            return Swal.fire("Mensaje de Advertencia", "Llene los campos vacios", "warning");
        }
    });

}
function ldl_paciente(){
   var fechainicio = $("#txtfecha_inicio").val();
    var fechafin = $("#txtfecha_fin").val();
    var paciente = $("#opcion_paciente_diagnostico").val();
    var action = 'info_bioquimico';

    $.ajax({
        url: '../../js/controller_evaluacion/controller.evaluacion.php',
        type: 'POST',
        async: true,
        data:{
            action:action,
            fechainicio:fechainicio,
            fechafin:fechafin,
            paciente:paciente
        },
        success: function(resp){
        
        if (resp.length > 0) {
            var titulo= [];
            var cantidad = [];
            var colores = [];
            var data = JSON.parse(resp);
            
            for (var i = 0; i < data.length; i++) {
                titulo.push(data[i].date_create);
                cantidad.push(data[i].colesterol_ldl);
                colores.push(colorRGB());
            }
            CrearGrafico(titulo, cantidad, colores, 'line', 'LDL', 'ldl_paciente');

        }
        
        },
        error: function(error){
            console.log(error);
            return Swal.fire("Mensaje de Advertencia", "Llene los campos vacios", "warning");
        }
    });

}
function glucosaAyunas_paciente(){
   var fechainicio = $("#txtfecha_inicio").val();
    var fechafin = $("#txtfecha_fin").val();
    var paciente = $("#opcion_paciente_diagnostico").val();
    var action = 'info_bioquimico';

    $.ajax({
        url: '../../js/controller_evaluacion/controller.evaluacion.php',
        type: 'POST',
        async: true,
        data:{
            action:action,
            fechainicio:fechainicio,
            fechafin:fechafin,
            paciente:paciente
        },
        success: function(resp){
        
        if (resp.length > 0) {
            var titulo= [];
            var cantidad = [];
            var colores = [];
            var data = JSON.parse(resp);
            
            for (var i = 0; i < data.length; i++) {
                titulo.push(data[i].date_create);
                cantidad.push(data[i].glucosa_ayunas);
                colores.push(colorRGB());
            }
            CrearGrafico(titulo, cantidad, colores, 'line', 'GLUCOSA AYUNAS', 'glucosaAyunas_paciente');

        }
        
        },
        error: function(error){
            console.log(error);
            return Swal.fire("Mensaje de Advertencia", "Llene los campos vacios", "warning");
        }
    });

}
function glucosaPost_paciente(){
   var fechainicio = $("#txtfecha_inicio").val();
    var fechafin = $("#txtfecha_fin").val();
    var paciente = $("#opcion_paciente_diagnostico").val();
    var action = 'info_bioquimico';

    $.ajax({
        url: '../../js/controller_evaluacion/controller.evaluacion.php',
        type: 'POST',
        async: true,
        data:{
            action:action,
            fechainicio:fechainicio,
            fechafin:fechafin,
            paciente:paciente
        },
        success: function(resp){
        
        if (resp.length > 0) {
            var titulo= [];
            var cantidad = [];
            var colores = [];
            var data = JSON.parse(resp);
            
            for (var i = 0; i < data.length; i++) {
                titulo.push(data[i].date_create);
                cantidad.push(data[i].glucosa_postprandial);
                colores.push(colorRGB());
            }
            CrearGrafico(titulo, cantidad, colores, 'line', 'GLUCOSA POST', 'glucosaPost_paciente');

        }
        
        },
        error: function(error){
            console.log(error);
            return Swal.fire("Mensaje de Advertencia", "Llene los campos vacios", "warning");
        }
    });

}
function generarNumero(numero) {
    return (Math.random() * numero).toFixed(0);
}

function colorRGB() {
    var coolor = "(" + generarNumero(255) + "," + generarNumero(255) + "," + generarNumero(255) + ")";
    return "rgb" + coolor;
}
function cargar_graficos()
{
    somatotipocarta();
    imc();
    bicipital();  
    tricipital();
    subescapular();
    peso_graso();
    peso_magro();
    porcentaje_masa_grasa();
    peso_paciente();
    acido_urico();
    bilirubina_paciente();
    colesterol_paciente();
    hdl_paciente();
    ldl_paciente();
    glucosaAyunas_paciente();
    glucosaPost_paciente();
}
