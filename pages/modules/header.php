
<script type="text/javascript" src="../../js/usuario.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="../../js/head.js"></script>
<script src="../../login/js/validaciones.js"></script>


            <header class="main-header">
                <!-- Logo -->
                <a href="sistema/sistema.php" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini"><b>QU</b>IP</span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg"><b>QUIPA</b>NUTRI</span>
                </a>
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>

                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <!-- Messages: style can be found in dropdown.less-->
                            <!-- User Account: style can be found in dropdown.less -->
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                     <i class="fa  fa-user"></i>
                                    <!--<img id="img_nav" class="user-image" alt="User Image">-->
                                    <span class="hidden-xs"></span>
                                </a>

                                <ul class="dropdown-menu">
                                  
                                    <!-- User image -->
                                    <li class="user-header">
                                      
                                      <!-- <img id="img_lateral" class="img-circle" alt="User Image">-->
                                      
                                      <?php if ($_SESSION["user"]->method_user == "direct"): ?>

                                            <?php if ($_SESSION["user"]->image_user == ""): ?>

                                              <img class="img-circle w-50 ml-auto" alt="user" src="../../resources/img/img_default/img_nutricionista.jpg">
                                                
          
                                            <?php else: ?>  
                                              <img class="img-circle w-50 ml-auto" alt="user" src="../../resources/img/<?php echo $_SESSION["user"]->id_user ?>/<?php echo $_SESSION["user"]->image_user  ?>">
                                            <?php endif ?>

                                      <?php else: ?>

                                          <?php if (explode("/", $_SESSION["user"]->image_user)[0] == "https:"): ?>

                                            <img class="img-circle w-50 ml-auto" alt="user" src="<?php echo $_SESSION["user"]->image_user ?>">

                                          <?php else: ?>

                                            <img class="img-circle w-25 ml-auto" alt="user" src="../../resources/img/<?php echo $_SESSION["user"]->id_user ?>/<?php echo $_SESSION["user"]->image_user  ?>">

                                          <?php endif ?>


                                      <?php endif ?>

                                      <div class="br-wrapper">
                                                <button class="btn btn-primary btn-sm rounded-circle" data-toggle="modal" data-target="#changeFoto"><i class="fa fa-pencil"></i></button>
                                      </div>
                                       <div>

                                         <label>
                                            <?php echo $_SESSION['user']->display_name; ?> 
                                            <br>
                                            <?php echo $_SESSION['user']->email_user; ?>
                                        </label>

                                        
                                      </div>

   
                                    </li>
                                    <!-- Menu Body -->

                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <div class="pull-left">
                                          <?php if ($_SESSION['user']->method_user =="direct"): ?>
                                            <button class="btn btn-danger " data-toggle="modal" data-target="#changePassword">Cambiar Password</button>
                                          <?php endif ?>
                                            
                                        </div>
                                        <div class="pull-right">
                                          <?php if (isset($_SESSION["user"])): ?>

                                               <a href="<?php   echo TemplateController::path()?>account&logout" class="btn btn-default btn-flat" ><i class="fa fa-power-off">Cerrar Sesi&oacute;n</i></a>

                                          <?php endif ?>
                                           
                                        </div>
                                    </li>
                                </ul>
                            </li>

                            <!-- Control Sidebar Toggle Button -->
                             <li>
                                 <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                                 
                            </li>


                        </ul>
                    </div>
                </nav>
            </header> <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark" style="display: none;">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      
      
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>


<!-- The Modal -->
<div class="modal" id="changePassword">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Cambiar Contraseña</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
       
      <!-- Modal body -->
      <div class="modal-body">
        <form  method="POST" class="ps-form--account ps-tab-root needs-validation" novalidate>
            <div class="form-group">
              <label for="">Contrase&ntilde;a</label>
              <input type="password" 
              class="form-control" 
              id="txtcontrasena" 
                         
              name="changePassword" 
              laceholder="Ingrese la contraseña" 
              pattern="[#\\=\\$\\;\\*\\_\\?\\¿\\!\\¡\\:\\.\\,\\0-9a-zA-Z]{1,}"
              required><br>
              <label for="" id="passwordOk" style="color: red;"></label>
              <input type="text" id="validarPassw" hidden><br>
                           
          </div>
               <?php   
                $change = new UsersController();
                $change->changePassword();
              ?>
            <div class="form-group submtit">
                
                <button type="submit" class="btn btn-primary">Cambiar</button>
            </div>
        </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

<!-- The Modal para cambiar foto -->
<div class="modal" id="changeFoto">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Cambiar Foto</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
       
      <!-- Modal body -->
      <div class="modal-body">
        <form  method="POST" class="ps-form--account ps-tab-root needs-validation" novalidate enctype="multipart/form-data">
          <small class="helsmall-block small">Dimensiones: 200px * 200px | Max Size. 2MB | Format: JPG o PNG</small>

          <div class="custom-file">
            <input type="file"
            class="custom-file-input"
            id="customFile"
            accept="image/*"
            maxSize="2000000"
            name="changeFoto" 
            onchange="validateJS(event,'image')" 
            required>
            <label for="customFile" class="custom-file-label"></label>
          </div>
          <figure class="text-center py-3">
            <img src="" class="img-fluid rounded-circle changeFoto" style="width: 150px">
          </figure>
          <br>
         
               <?php   
                $changeFoto = new UsersController();
                $changeFoto->changePicture();
              ?>
            <div class="form-group submtit">
                
                <button type="submit" class="btn btn-primary" style="width: 100%">Cambiar</button>
            </div>
           
          
        </form>
         <div class="form-group">
               <button type="button" class="btn btn-danger" data-dismiss="modal" style="width: 100%">Close</button>
            </div>
      </div>

      

    </div>
  </div>
</div>