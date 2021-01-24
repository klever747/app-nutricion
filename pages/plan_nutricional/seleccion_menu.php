 <script type="text/javascript" src="../../js/controller_plan_nutricional/plan_nutricional.js"></script>

        <div class="modal fade" id="modals_opcion_menu" role="dialog">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
                <div class="modal-header" style="text-align: center;">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title"><b>SELECCIONAR EL TIPO DE MENU</b></h4>
                </div>
                <div class="modal-body">
                    <input type="hidden"  id="id_paciente" value="">
                    <div class="container">
                        <div class="accordion" id="menus">
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <h3 class="mb-0">
                                    <button class="btn btn-link modalMenu fa  fa-plus-square-o" type="button" data-toggle="collapse" data-taget="#collapse" >Agregar Nueva Dieta</button>
                                </h3>
                            </div>
                            
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <h3 class="mb-0">
                                    <button class="btn btn-link modalCargarMenu fa  fa-plus-square-o" type="button" data-toggle="collapse" data-taget="#collapse" >Cargar Menú</button>
                                </h3>
                            </div>
                            
                        </div>
                        
                    </div>
                    </div>
                </div>
                
                <div class="modal-footer">
                    
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"> Cerrar</i></button>
                </div>

            </div>
          </div>
        </div>

    </div>


 <?php   include "registro_menu.php" ?>

    <script type="text/javascript">
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
          $('#nombre_paciente2').val(info.display_name);
          $('#id_paciente2').val(info.id_paciente); 
          $('#idNutricionista2').val(info.id_nutricionista); 
        },
        error:function(error) {
            console.log(error);
        }

        });
    }
    function traer_paciente2(){

            var action = 'infoPaciente';
            var pacienteId = $('#id_paciente_cal').val();

        $.ajax({
            url: '../../js/controller_plan_nutricional/controller.plan_nutricional.php',
            type: 'POST',
            async: true,
            data: {action: action, pacienteId:pacienteId},

        success: function(response){   
             
           var info = JSON.parse(response); 

          $('#nombre_paciente3').val(info.display_name);
          $('#id_paciente3').val(info.id_paciente); 
          $('#idNutricionista3').val(info.id_nutricionista); 
        },
        error:function(error) {
            console.log(error);
        }

        });
    }
    //funcion para traer los menus que tiene un paciente asignado
     function traer_menu_paciente(){

            var action = 'infoMenu';
            var pacienteId = $('#id_paciente').val();

        $.ajax({
            url: '../../js/controller_plan_nutricional/controller.plan_nutricional.php',
            type: 'POST',
            async: true,
            data: {action: action, pacienteId:pacienteId},

        success: function(response){   
             
           var info = JSON.parse(response); 
           for (var i = 0; i < info.length; i++) {

                $('#menu_cargar').append("<option value="+info[i].id_menu_comida+">"+info[i].nombre_menu+"</option>")
           }
           
         

        },
        error:function(error) {
            console.log(error);
        }

        });
    }
    $('.modalMenu').click(function(e){
        e.preventDefault();
        //$("#modals_opcion_menu").modal('hide');
        traer_paciente();
        $('#modal_reg_menu').modal({backdrop:'static',keyboard:false});
        $('#modal_reg_menu').modal('show');
            
    });

    $('.modalCargarMenu').click(function(e){
        e.preventDefault();
        //$("#modals_opcion_menu").modal('hide');
        traer_paciente2();
        traer_menu_paciente();
        $('#modal_cargar_menu').modal({backdrop:'static',keyboard:false});
        $('#modal_cargar_menu').modal('show');
            
    });


    </script>