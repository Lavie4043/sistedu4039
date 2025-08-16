<?php
$id_usuario = $_GET['id'];
    include('../../app/config.php');
    include('../../admin/layout/parte1.php');
    include('../../admin/layout/parte2.php');
    include('../../admin/layout/mensajes.php');
    include('../../app/controllers/usuarios/datos_del_usuario.php');
    include('../../app/controllers/roles/listado_de_roles.php');

    ?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <br>
   <!-- Main content -->
    <div class="content">
      <div class="container">

      <div class="row">
          <h1>Modificar usuario: <?=$email;?> </h1>
        </div>
        
        <div class="row">
          <div class="col-md-12">
            <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title">LLene los datos</h3>
               
            </div>

            <div class="card-body">
            <form action="<?=APP_URL;?>/app/controllers/usuarios/update.php" method="post">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">

                            <label for="">Nombre del rol</label>
                            <input type="text" name="id_usuario" value="<?=$id_usuario;?>" hidden>
                            <div class="form-inline">
                            <select name="rol_id" id="" class="form-control">
                            <?php 
                            foreach ($roles as $role){ 
                                $nombre_rol_tabla = $role['nombre_rol'];?>
                                <option value="<?=$role['id_rol'];?>" 
                                <?php if($nombre_rol==$nombre_rol_tabla){ ?> selected="selected"<?php } ?> ><?=$role['nombre_rol'];?></option>
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
                            <input type="email" name= "email" value="<?=$email;?>" class="form-control">

                    </div>
                </div>
                

                <div class="col-md-4">
                        <div class="form-group">

                            <label for="">Password</label>
                            <input type="password" name="password" class="form-control">

                    </div>
                </div>


                
                <div class="col-md-6">
                        <div class="form-group">

                            <label for="">Repetir Password</label>
                            <input type="password" name="password_repetido" class="form-control">

                    </div>
                </div>
                

        <hr>
        <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Actualizar</button>
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

