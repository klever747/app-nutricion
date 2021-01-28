
function CrearGrafico(titulo, cantidad, colores, tipo, encabezado, id) {
    var ctx = document.getElementById(id);
    if (window.myChart) {
        window.myChart.clear();
        window.myChart.destroy();
    }
     window.myChart = new Chart(ctx, {
        type: tipo,
        data: {
            labels: titulo,
            datasets: [{
                    label: encabezado,
                    data: cantidad,
                    backgroundColor:" rgba(117,235,213,92)" ,
                    borderColor:"rgba(29,38,235,92)" ,
                    borderWidth: 1,
                    fill:false
                }]
        },
        options: {
            responsive: true,
                title: {
                    display: true,
                    text: 'Datos del IMC'
                },
                tooltips: {
                    mode: 'index',
                    intersect: false,
                },
                hover: {
                    mode: 'nearest',
                    intersect: true
                },
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
//funcion para limpiar campos imc
function limpiarIMC(id) {
    var ctx = document.getElementById(id);
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: " ",
            datasets: [{
                    label: " ",
                    data: " ",
                    backgroundColor:" rgba(255,255,255,255)" ,
                    borderColor:"rgba(255,255,255,255)" ,
                    borderWidth: 1,
                    fill:false
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
    myChart.update();
}
function CrearGraficoPliegues(titulo, cantidad,cantPlieBicip,cantPlieTricp,cantPlieSub,cantPlieSuprailiaco,cantPlieAbdomen, colores, tipo, id) {
    var ctx = document.getElementById(id);
    if (window.chartPliegues) {
        window.chartPliegues.clear();
        window.chartPliegues.destroy();
    }
     window.chartPliegues = new Chart(ctx, {
        type: tipo,
        data: {
            labels: titulo,
            datasets: [{
                    label: 'P Bicipital(mm)',
                    data: cantPlieBicip,
                    backgroundColor: " rgba(245,77,110,96)",
                    borderColor: " rgba(245,127,110,96)",
                    fill:false
                },
                {
                    label: 'P Tricipital(mm)',
                    data: cantPlieTricp,
                    backgroundColor: " rgba(115,212,54,83)"   ,
                    borderColor: " rgba(115,212,95,83)",
                    fill:false
                },
                {
                    label: 'P Susescapular(mm)',
                    data: cantPlieSub,
                    backgroundColor: " rgba(81,176,123,84)",
                    borderColor: " rgba(81,176,214,84)",
                    fill:false
                },
                {
                    label: 'P Suprailiaco(mm)',
                    data: cantPlieSuprailiaco,
                    backgroundColor: " rgba(250,166,42,98)"   ,
                    borderColor: " rgba(250,60,42,98)",
                    fill:false
                },
                {
                    label: 'P Abdomen(mm)',
                    data: cantPlieAbdomen,
                    backgroundColor: " rgba(139,38,235,92)",
                    borderColor: " rgba(92,81,176,69)",
                    fill:false
                }]
        },
        options: {
             responsive: true,
                title: {
                    display: true,
                    text: 'Datos de los Pliegues'
                },
                tooltips: {
                    mode: 'index',
                    intersect: false,
                },
                hover: {
                    mode: 'nearest',
                    intersect: true
                },
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
//funcion para cargar la composicion corporal del paciente
function CrearGraficoComposicion(titulo,cantPesoGraso,cantPesoMagro,pesoPac, colores, tipo, id) {
    var ctx = document.getElementById(id);
    if (window.chartComposicion) {
        window.chartComposicion.clear();
        window.chartComposicion.destroy();
    }
     window.chartComposicion = new Chart(ctx, {
        type: tipo,
        data: {
            labels: titulo,
            datasets: [{
                    label: 'Peso Graso(Kg)',
                    data: cantPesoGraso,
                    backgroundColor: " rgba(245,77,110,96)",
                    borderColor: " rgba(245,127,110,96)",
                    fill:false
                },
                {
                    label: 'Peso Magro(Kg)',
                    data: cantPesoMagro,
                    backgroundColor: " rgba(115,212,54,83)"   ,
                    borderColor: " rgba(115,212,95,83)",
                    fill:false
                },
                {
                    label: 'Peso Paciente(Kg)',
                    data: pesoPac,
                    backgroundColor: " rgba(81,176,123,84)",
                    borderColor: " rgba(81,176,214,84)",
                    fill:false
                }]
        },
        options: {
             responsive: true,
                title: {
                    display: true,
                    text: 'Composicion Corporal'
                },
                tooltips: {
                    mode: 'index',
                    intersect: false,
                },
                hover: {
                    mode: 'nearest',
                    intersect: true
                },
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
//funcion para cargar graficos de trigliceridos,bilirubina,acido
function CrearGraficoBioq(titulo,cantAcidoUri,cantBilirubina,cantTrigliceridos, colores, tipo, id) {
    var ctx = document.getElementById(id);
    if (window.chartBioquimico) {
        window.chartBioquimico.clear();
        window.chartBioquimico.destroy();
    }
     window.chartBioquimico = new Chart(ctx, {
        type: tipo,
        data: {
            labels: titulo,
            datasets: [{
                    label: 'Acido Úrico(mg/dl)',
                    data: cantAcidoUri,
                    backgroundColor: " rgba(245,77,110,96)",
                    borderColor: " rgba(245,127,110,96)",
                    fill:false
                },
                {
                    label: 'Bilirubina Directa(mg/dl)',
                    data: cantBilirubina,
                    backgroundColor: " rgba(115,212,54,83)"   ,
                    borderColor: " rgba(115,212,95,83)",
                    fill:false
                },
                {
                    label: 'Trigliceridos(mg/dl)',
                    data: cantTrigliceridos,
                    backgroundColor: " rgba(81,176,123,84)",
                    borderColor: " rgba(81,176,214,84)",
                    fill:false
                }]
        },
        options: {
             responsive: true,
                title: {
                    display: true,
                    text: 'Datos Bioquimicos'
                },
                tooltips: {
                    mode: 'index',
                    intersect: false,
                },
                hover: {
                    mode: 'nearest',
                    intersect: true
                },
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
//funcion para graficar datos del colesterol
function CrearGraficoBioqColes(titulo,cantColesTotal,cantColesLdl,cantColesHdl, colores, tipo, id) {
    var ctx = document.getElementById(id);
    var myChart = new Chart(ctx, {
        type: tipo,
        data: {
            labels: titulo,
            datasets: [{
                    label: 'Colesterol Total(mg/dl)',
                    data: cantColesTotal,
                    backgroundColor: " rgba(245,77,110,96)",
                    borderColor: " rgba(245,127,110,96)",
                    fill:false
                },
                {
                    label: 'Colesterol LDL(mg/dl)',
                    data: cantColesLdl,
                    backgroundColor: " rgba(115,212,54,83)"   ,
                    borderColor: " rgba(115,212,95,83)",
                    fill:false
                },
                {
                    label: 'Colesterol HDL(mg/dl)',
                    data: cantColesHdl,
                    backgroundColor: " rgba(81,176,123,84)",
                    borderColor: " rgba(81,176,214,84)",
                    fill:false
                }]
        },
        options: {
             responsive: true,
                title: {
                    display: true,
                    text: 'Datos Bioquimicos Colesterol'
                },
                tooltips: {
                    mode: 'index',
                    intersect: false,
                },
                hover: {
                    mode: 'nearest',
                    intersect: true
                },
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
//funcion para graficar datos de la glucosa del paciente
function CrearGraficoBioqGlucosa(titulo,cantGluAyun,cantGluPost, colores, tipo, id) {
    var ctx = document.getElementById(id);
    var myChart = new Chart(ctx, {
        type: tipo,
        data: {
            labels: titulo,
            datasets: [{
                    label: 'Glucosa Ayunas(mg/dl)',
                    data: cantGluAyun,
                    backgroundColor: " rgba(245,77,110,96)",
                    borderColor: " rgba(245,127,110,96)",
                    fill:false
                },
                {
                    label: 'Glucosa Post(mg/dl)',
                    data: cantGluPost,
                    backgroundColor: " rgba(115,212,54,83)"   ,
                    borderColor: " rgba(115,212,95,83)",
                    fill:false
                }]
        },
        options: {
             responsive: true,
                title: {
                    display: true,
                    text: 'Datos Bioquimicos Glucosa'
                },
                tooltips: {
                    mode: 'index',
                    intersect: false,
                },
                hover: {
                    mode: 'nearest',
                    intersect: true
                },
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
//funcion para el IMC
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
                var cantImc = [];
                var cantPlieBicip = [];
                var cantPlieTricp = [];
                var cantPlieSub = [];
                var colores = [];
                var data = JSON.parse(resp);
                
                for (var i = 0; i < data.length; i++) {
                    titulo.push(data[i].date_create);
                    cantImc.push(data[i].imc_paciente);
                    colores.push(colorRGB());
                }
                
                //limpiarIMC('imc_grafico');
                CrearGrafico(titulo, cantImc, colores, 'bar','IMC(kg/m2)', 'imc_grafico');

                

            }
        
        },
        error: function(error){
            console.log(error);
            return Swal.fire("Mensaje de Advertencia", "Llene los campos vacios", "warning");
        }
    });

}
function plieguesPaciente() {
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
                var cantImc = [];
                var cantPlieBicip = [];
                var cantPlieTricp = [];
                var cantPlieSub = [];
                var cantPlieSuprailiaco = [];
                var cantPlieAbdomen = [];
                var colores = [];
                var data = JSON.parse(resp);
                
                for (var i = 0; i < data.length; i++) {
                    titulo.push(data[i].date_create);
                    cantImc.push(data[i].imc_paciente);
                    cantPlieBicip.push(data[i].pliegue_bicipital);
                    cantPlieTricp.push(data[i].pliegue_tricipital);
                    cantPlieSub.push(data[i].pliegue_subescapular);
                    cantPlieSuprailiaco.push(data[i].pliegue_suprailiaco);
                    cantPlieAbdomen.push(data[i].pliegue_abdominal);

                    colores.push(colorRGB());
                }
                

               CrearGraficoPliegues(titulo, cantImc,cantPlieBicip,cantPlieTricp,cantPlieSub,cantPlieSuprailiaco,cantPlieAbdomen, colores, 'line', 'pliegues_grafico');

                

            }
        
        },
        error: function(error){
            console.log(error);
            return Swal.fire("Mensaje de Advertencia", "Llene los campos vacios", "warning");
        }
    });

}
function composicionCorporal() {
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
                var cantPesoGraso = [];
                var cantPesoMagro = [];
                var pesoPac = [];
                var colores = [];
                var data = JSON.parse(resp);
                
                for (var i = 0; i < data.length; i++) {
                    titulo.push(data[i].date_create);
                    cantPesoGraso.push(data[i].peso_graso);
                    cantPesoMagro.push(data[i].peso_magro);
                    pesoPac.push(data[i].peso_paciente);
                    colores.push(colorRGB());
                }
                

                CrearGraficoComposicion(titulo, cantPesoGraso,cantPesoMagro,pesoPac, colores, 'bar', 'comp_corporal');

                

            }
        
        },
        error: function(error){
            console.log(error);
            return Swal.fire("Mensaje de Advertencia", "Llene los campos vacios", "warning");
        }
    });

}
//funcion para mostrar los datos quimicos del paciente
function datosQuimicosAcBi(){
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
            var cantAcidoUri = [];
            var cantBilirubina = [];
            var cantTrigliceridos = [];
            var colores = [];
            var data = JSON.parse(resp);
            
            for (var i = 0; i < data.length; i++) {
                titulo.push(data[i].date_create);
                cantAcidoUri.push(data[i].acido_urico);
                cantBilirubina.push(data[i].bilirubina_directa);
                cantTrigliceridos.push(data[i].trigliceridos);
                colores.push(colorRGB());
            }
            CrearGraficoBioq(titulo, cantAcidoUri,cantBilirubina,cantTrigliceridos, colores, 'line', 'datos_quim_ABT');

        }
        
        },
        error: function(error){
            console.log(error);
            return Swal.fire("Mensaje de Advertencia", "Llene los campos vacios", "warning");
        }
    });

}
//funcion para mostrar datos del colesterol
function datosQuimicosColesterol(){
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
            var cantColesTotal = [];
            var cantColesLdl = [];
            var cantColesHdl = [];
            var colores = [];
            var data = JSON.parse(resp);
            
            for (var i = 0; i < data.length; i++) {
                titulo.push(data[i].date_create);
                cantColesTotal.push(data[i].colesterol_total);
                cantColesLdl.push(data[i].colesterol_ldl);
                cantColesHdl.push(data[i].colesterol_hdl);
                colores.push(colorRGB());
            }
            CrearGraficoBioqColes(titulo, cantColesTotal,cantColesLdl,cantColesHdl, colores, 'line', 'datos_colesterol');

        }
        
        },
        error: function(error){
            console.log(error);
            return Swal.fire("Mensaje de Advertencia", "Llene los campos vacios", "warning");
        }
    });

}
//funcion para mostrar datos de la glucosa
function datosQuimicosColesterol(){
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
            var cantGluAyun = [];
            var cantGluPost = [];
            var colores = [];
            var data = JSON.parse(resp);
            
            for (var i = 0; i < data.length; i++) {
                titulo.push(data[i].date_create);
                cantGluAyun.push(data[i].glucosa_ayunas);
                cantGluPost.push(data[i].glucosa_postprandial);
                colores.push(colorRGB());
            }
            CrearGraficoBioqGlucosa(titulo, cantGluAyun,cantGluPost, colores, 'line', 'datos_glucosa');

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
    plieguesPaciente();
    composicionCorporal();
    datosQuimicosAcBi();
    datosQuimicosColesterol();
        /*
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
    */
}
