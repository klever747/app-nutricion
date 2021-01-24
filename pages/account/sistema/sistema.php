<?php 
/*
include  "../../controllers/curl.controller.php";
session_start();

$url = CurlController::api()."relations?rel=nutricionista,genero&type=nutricionista,genero&linkTo=id_nutricionista&equalTo=".$_SESSION['id_nutricionista']."&tabla_estado=nutricionista&select=nombre_nutricionista,apellido_nutricionista,image_nutricionista";
$method = "GET";
$fields = array();
$header = array();

$nutricionista = CurlController::request($url, $method, $fields, $header)->results;


$url = CurlController::api()."nutricionista?tabla_estado&select=*";
$method = "GET";
$fields = array();
$header = array();
$total_nutricionista = CurlController::request($url, $method, $fields, $header)->total;


$fotoLat = '<img id="img_subnav" class="img-circle" src = "../../resources/img/'.$nutricionista[0]->image_nutricionista.'" alt = "nutricionista">';

if(empty($_SESSION['active'])){
    
    header('location: ../../../index.php');
    
}
*/
 ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>QuipaNutri | Ecuador</title>
        <base href="../">
        <!-- llamado a la libreria jquery para el calendario-->
        <script src="../../resources/js/jquery.min.js"></script>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="../../../plantilla/bower_components/bootstrap/dist/css/bootstrap-theme.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="../../../plantilla/bower_components/font-awesome/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="../../../plantilla/bower_components/Ionicons/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="../../../plantilla/dist/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="../../../plantilla/dist/css/skins/_all-skins.min.css">
        <!-- Morris chart -->
        <link rel="stylesheet" href="../../../plantilla/bower_components/morris.js/morris.css">
        <!-- jvectormap -->
        <link rel="stylesheet" href="../../../plantilla/bower_components/jvectormap/jquery-jvectormap.css">
        <!-- Date Picker -->
        <link rel="stylesheet" href="../../../plantilla/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="../../../plantilla/bower_components/bootstrap-daterangepicker/daterangepicker.css">
        <!-- bootstrap wysihtml5 - text editor -->
        <link rel="stylesheet" href="../../../plantilla/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
        <link rel="Stylesheet" href="../../../plantilla/plugins/DataTables/datatables.min.css">
        <link rel="Stylesheet" href="../../../plantilla/plugins/Select2/Select2.css.min.css">
        <style>
            .swal2-popup{
                font-size:1.6rem !important;
            }
        </style>
        <link href="../../../plantilla/style.css" rel="stylesheet" type="text/css"/>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Google Font -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">

            <!--=================================================== 
                Contenido del Header o encabezado
            ====================================================-->
            <?php 

                include "pages/account/modules/header.php";
             ?>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <?php echo $fotoLat; ?>
                         <!--   <img id="img_subnav" class="img-circle" alt="User Image">-->
                        </div>
                        <div class="pull-left info">
                            <p><?php echo $nutricionista[0]->nombre_nutricionista;?>  <?php  echo $nutricionista[0]->apellido_nutricionista;  ?></p>
                            <a href="sistema/sistema.php"><i class="fa fa-circle text-success"></i>Online</a>
                            <br>
                        </div>
                    </div>

                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu" data-widget="tree">
                        
                        
                        <li class="header" >MODULOS DE DESEMPEÑO</li> 

                        <li class="active treeview " >
                             <a href="#" onclick="cargar_contenido('contenido_principal','../Nutricionista/nutricionista_vista.php')">
                                <i class="fa  fa-user-md "></i> <span >Nutricionista</span>
                                 <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span><br><br>
                            </a>

                        </li>
                        <li class="treeview">
                            <a href="#" onclick="cargar_contenido('contenido_principal','../paciente/paciente_vista.php')">
                                <i class="fa  fa-users"></i> <span>Pacientes</span>
                                 <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span><br><br>
                            </a>
                        </li>
                        <li class="treeview">
                             <a href="#" onclick="cargar_contenido('contenido_principal','../menu_comida/menucomida_vista.php')">
                                <i class="fa  fa-cutlery"></i> <span>Menús</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span><br><br>
                            </a>
                        </li>
                        <li class="treeview">
                              <a href="#" onclick="cargar_contenido('contenido_principal','../diagnostico/diagnostico_vista.php')">
                                <i class="fa   fa-stethoscope"></i> <span>Diagnostico</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span><br><br>
                            </a>
                        </li>
                        <li class="treeview">
                            <a href="#" onclick="cargar_contenido('contenido_principal','../plan_nutricional/vista_usuario_lista.php')">
                                <i class="fa  fa-calendar-check-o"></i> <span>Plan Nutricional</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span><br><br>
                            </a>
                        </li>
                        <li class="treeview">
                             <a href="#" onclick="cargar_contenido('contenido_principal','../monitoreo/monitoreo_vista.php')">
                                <i class="fa  fa-pie-chart"></i> <span>Monitoreo</span>
                                 <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span><br><br>
                            </a>
                        </li>
                        <li class="treeview">
                             <a href="#" onclick="cargar_contenido('contenido_principal','../EncuestaABC/encuesta_vista.php')">
                                <i class="fa  fa-file-text-o"></i> <span>Encuesta ABC</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span><br><br>
                            </a>
                        </li>

                        <li class="treeview">
                             <a href="#" onclick="cargar_contenido('contenido_principal','../evaluacion/evaluacion_vista.php')">
                                <i class="fa   fa-line-chart"></i> <span>Evaluacion</span>
                                 <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span><br><br><br>
                            </a>
                        </li>
                        </li>

                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->


                <!-- Main content -->
                <section class="content">
                    <input type="text" id="txtprincipal" value="" hidden>
                    <input type="text" id="usuarioprincipal" value="" hidden>
                    <div class="row" id="contenido_principal">
                        <div class="col-md-12">
                             <div class="box box-primary box-solid">

                                <div class="box-header with-border">
                                    <h3 class="box-title">BIENVENIDOS AL CONTENIDO PRINCIPAL</h3>

                                    <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    <!-- /.box-tools -->
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                      <div class="col-lg-12 " style="text-align: center;">
                                            <div class="col-lg-4">
                                                <label for="" ><b>&nbsp;PACIENTES</b></label><br><br>
                                                <a onclick="cargar_contenido('contenido_principal','../paciente/paciente_vista.php')"><i class="fa fa-users fa-lg" style="font-size: 100px" width="100" height="100"/></i></a><br><br><br>
                                            </div>

                                            <div class="col-lg-4">
                                                <label for="" style="text-align: center;"><b>&nbsp;&nbsp;NUTRICIONISTA</b></label><br><br>
                                                <a onclick="cargar_contenido('contenido_principal','../Nutricionista/nutricionista_vista.php')"><i class="fa fa-user-md fa-lg" style="font-size: 100px" width="100" height="100"/></i></a><br><br><br>
                                            </div>
                                            <div class="col-lg-4">
                                                <label for="" style="text-align: center;"><b>&nbsp;&nbsp;ENCUESTA</b></label><br><br>
                                                <a onclick="cargar_contenido('contenido_principal','../EncuestaABC/encuesta_vista.php')"><i class="fa fa-file-text-o fa-lg" style="font-size: 100px" width="100" height="100"/></i></a><br><br><br>
                                            </div>

                                    </div>

                                    <div class="col-lg-12 " style="text-align: center;" >
                                             <div class="col-lg-4">
                                                <label for="" ><b>&nbsp;DIAGNÓSTICO</b></label><br><br>
                                                <a onclick="cargar_contenido('contenido_principal','../diagnostico/diagnostico_vista.php')"><i class="fa fa-stethoscope fa-lg" style="font-size: 100px" width="100" height="100"/></i></a><br><br><br>
                                            </div>

                                            <div class="col-lg-4">
                                                <label for="" ><b>&nbsp;MENÚ</b></label><br><br>
                                                <a onclick="cargar_contenido('contenido_principal','../menu_comida/menucomida_vista.php')"><i class="fa fa-cutlery fa-lg" style="font-size: 100px" width="100" height="100"/></i></a><br><br>
                                            </div>
                                            <div class="col-lg-4">
                                                <label for="" ><b>&nbsp;PLAN NUTRICIONAL</b></label><br><br>
                                                <a onclick="cargar_contenido('contenido_principal','../plan_nutricional/vista_usuario_lista.php')"><i class="fa fa-calendar-check-o fa-lg" style="font-size: 100px" width="100" height="100"/></i></a><br><br>
                                            </div>


                                    </div>
                                        <div class="col-lg-12 " style="text-align: center;" >
                                             <div class="col-lg-4">
                                                <label for="" ><b>&nbsp;MONITOREO</b></label><br><br>
                                                <a onclick="cargar_contenido('contenido_principal','../monitoreo/monitoreo_vista.php')"><i class="fa  fa-pie-chart fa-lg" style="font-size: 100px" width="100" height="100"/></i></a><br><br><br>
                                            </div>
                                             <div class="col-lg-4">


                                            </div>

                                            <div class="col-lg-4">
                                                <label for="" ><b>&nbsp;EVALUACIÓN</b></label><br><br>
                                                <a onclick="cargar_contenido('contenido_principal','../paciente/paciente_vista.php')"><i class="fa  fa-line-chart fa-lg" style="font-size: 100px" width="100" height="100"/></i></a><br><br>
                                            </div>



                                    </div>


                                </div>
                                <!-- /.box-body -->
                            </div>
                        </div>
                    </div>
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
            <footer class="main-footer">
                <div class="pull-right hidden-xs">
                    <b>Nutrilife</b>1
                </div>
                <strong>Desarrollo de calidad <a href="quipanutri@gmail.com">QUIPANUTRI</a>.</strong>
            </footer>

            <!-- Control Sidebar -->

        </div>
        <!-- ./wrapper -->
      <div class="modal fade in" id="modals_editar_contra">
          <div class="modal-dialog">
            <div class="modal-content">
                  <div class="modal-header" >
                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                     <h4 class="modal-title" style="text-align: center;"><b>Cambiar Contraseña</b></h4>
                   </div>
                    <div class="modal-body">
                         <div class="row">
                            <div class="col-lg-12" >
                                     <input type="text" id="txtcontrabd" hidden><br>
                                     <label for="">Contraseña Actual</label>
                                     <input type="password" class="form-control" id="txtcontraactual_editar" placeholder="Contrase&ntilde;a Actual"><br>

                             </div>
                            <div class="col-lg-12">

                                <label for="">Contrase&ntilde;a Nueva</label>
                                <input type="password" class="form-control" id="txtcontranueva" placeholder="Contrase&ntilde;a Nueva"><br>
                            </div>
                                 <div class="col-lg-12">

                                     <label for=""> Repita Contrase&ntilde;a </label>
                                     <input type="password" class="form-control" id="txtcontrarepetida" placeholder="Repita Contrase&ntilde;a"><br>
                               </div>
                        </div>

                     </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" onclick="editar_Contrase()"><i class="fa fa-save"> Guardar</i></button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"> Cancelar</i></button>
                    </div>
          </div>


            <!-- /.modal-content -->
        </div>
          <!-- /.modal-dialog -->
    </div>

        <!-- jQuery 3 -->
        <script src="../../../plantilla/bower_components/jquery/dist/jquery.min.js"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="../../../plantilla/bower_components/jquery-ui/jquery-ui.min.js"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>

            var idioma_espanol = {
             select:{
             rows:"%d fila seleccionada"
             },
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
            function cargar_contenido(contenedor, contenido) {
                $("#" + contenedor).load(contenido);
            }
            $.widget.bridge('uibutton', $.ui.button);
            
        </script>
        <!-- Bootstrap 3.3.7 -->
        <script src="../../../plantilla/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

        <!-- Morris.js charts -->
        <script src="../../../plantilla/bower_components/raphael/raphael.min.js"></script>
        <!--<script src="../plantilla/bower_components/morris.js/morris.min.js"></script>-->
        <!-- Sparkline -->
        <script src="../../../plantilla/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
        <!-- jvectormap -->
        <script src="../../../plantilla/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="../../../plantilla//plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
        <!-- jQuery Knob Chart -->
        <script src="../../../plantilla/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
        <!-- daterangepicker -->
        <script src="../../../plantilla/bower_components/moment/min/moment.min.js"></script>
        <script src="../../../plantilla/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
        <!-- datepicker -->
        <script src="../../../plantilla/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="../../../plantilla/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
        <!-- Slimscroll -->
        <script src="../../../plantilla/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <!-- FastClick -->
        <script src="../../../plantilla/bower_components/fastclick/lib/fastclick.js"></script>
        <!-- AdminLTE App -->
        <script src="../../../plantilla/dist/js/adminlte.min.js"></script>
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
      <!--  <script src="../plantilla/dist/js/pages/dashboard.js"></script>-->
        <!-- AdminLTE for demo purposes -->
        <script src="../../../plantilla/dist/js/demo.js"></script>
        
        <script src="../../../plantilla/plugins/DataTables/datatables.min.js"></script>
        <script src="../../../plantilla/plugins/Select2/Select2.min.js"></script>
        <script src="../../../plantilla/plugins/sweetalert2/sweetalert2.js" type="text/javascript"></script>
        <script src="../../../js/usuario.js" type="text/javascript"></script>
        <script src="../../../js/restricciones.js"></script>
        <script>
           // TraerDatosUsuario();
        </script>
    </body>
</html>
