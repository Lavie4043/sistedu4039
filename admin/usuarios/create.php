<?php

    include('../../app/config.php');
    include('../../admin/layout/parte1.php');
    include('../../admin/layout/parte2.php');
    include('../../layout/mensajes.php');
    include('../../app/controllers/roles/listado_de_roles.php');

    ?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <br>
   <!-- Main content -->
    <div class="content">
      <div class="container">

      <div class="row">
          <h1>Creación de un nuevo usuario</h1>
        </div>
        
        <div class="row">
          <div class="col-md-12">
            <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title">LLene los datos</h3>
               
            </div>

            <div class="card-body">
            <form action="<?=APP_URL;?>/app/controllers/usuarios/create.php" method="post">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">

                            <label for="">Nombre del rol</label>
                            <div class="form-inline">
                            <select name="rol_id" id="" class="form-control">
                            <?php 
                            foreach ($roles as $role){ ?>
                                <option value="<?=$role['id_rol'];?>"><?=$role['nombre_rol'];?></option>
                            <?php
                            }
                            
                            ?>
                                
                              </select>
                              <a href="<?=APP_URL;?>/admin/roles/create.php" style="margin-left: 10px" class="btn btn-primary btn_sm"><i class="bi bi-file-plus"></i></a>


                            
           
                        </div> 
                    </div>
                </div>

                

                
                
                <div class="col-md-4">
                        <div class="form-group">

                            <label for="">Email</label>
                            <input type="email" name= "email" class="form-control" >

                    </div>
                </div>
                

                <div class="col-md-4">
                        <div class="form-group">

                            <label for="">Password</label>
                            <input type="ci" name="ci" class="form-control" required>

                    </div>
                </div>


                
                <div class="col-md-6">
                        <div class="form-group">

                            <label for="">Repetir Password</label>
                            <input type="ci" name="ci_repetido" class="form-control">

                    </div>
                </div>
                

        <hr>
        <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Registrar</button>
                            <a href="" class="btn btn-secondary">Cancelar</a>
           
                        </div> 
                    </div>
        </div>
            </form>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  </div> 

