<?php
$id_preceptore = $_GET['id'];

    include('../../app/config.php');
    include('../../admin/layout/parte1.php');
    include('../../admin/layout/parte2.php');
    include('../../layout/mensajes.php');
    include('../../app/controllers/preceptores/datos_del_preceptor.php');
    include('../../app/controllers/roles/listado_de_roles.php');
  

    ?>


<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <br>
   <!-- Main content -->
    <div class="content">
      <div class="container">

      <div class="row">
          <h1>Modificación del preceptor: <?=$nombres." ".$apellidos;?></h1>
        </div>
        
        <div class="row">
          <div class="col-md-12">
            <div class="card card-outline card-success">
              <div class="card-header">
                <h3 class="card-title">Modifique los datos</h3>
               
            </div>

            <div class="card-body">
            <form action="<?=APP_URL;?>/app/controllers/preceptores/update.php" method="post">
                <div class="row">
                    <div class="col-md-4">
                <div class="form-group">

                <label for="">Nombre del rol</label>
                <input type="text" value="<?=$id_usuario;?>" name="id_usuario" hidden></input>
                <input type="text" value="<?=$id_persona;?>" name="id_persona" hidden></input>
                <input type="text" value="<?=$id_preceptore;?>" name="id_preceptore" hidden></input>
                <a href="<?=APP_URL;?>/admin/roles/create.php" style="margin-left: 10px" class="btn btn-primary btn_sm"><i class="bi bi-file-plus"></i></a>  

                <div class="form-inline">
                            
                    <select name="rol_id" id="" class="form-control">
                    <?php 
                        foreach ($roles as $role){ ?>
                        <option value="<?=$role['id_rol'];?>" <?=$role['nombre_rol']=="PRECEPTOR" ? 'selected': ''?>><?=$role['nombre_rol'];?></option>
                       
                        <?php 
                        }
               
                        ?>
                                
                        </select>
                              
                            
           
                        </div> 
                    </div>
                </div>

                                    
                
                        <div class="col-md-4">
                        <div class="form-group">

                            <label for="">Nombres</label>
                            <input type="text" name= "nombres" value="<?=$nombres;?>" class="form-control" required>

                        </div>
                        </div>

                        <div class="col-md-4">
                        <div class="form-group">

                            <label for="">Apellidos</label>
                            <input type="text" name= "apellidos" value="<?=$apellidos;?>" class="form-control" required>

                        </div>
                        </div>

                
                
                <div class="col-md-4">
                        <div class="form-group">

                            <label for="">Documento de identidad</label>
                            <input type="number" name= "ci" value="<?=$ci;?>" class="form-control" required>

                    </div>
                </div>
                
                <div class="col-md-4">
                        <div class="form-group">

                            <label for="">Fecha de nacimiento</label>
                            <input type="date" name= "fecha_nacimiento" value="<?=$fecha_nacimiento;?>" class="form-control">

                        </div>
                        </div>

                        <div class="col-md-4">
                        <div class="form-group">

                            <label for="">Celular</label>
                            <input type="number" name="celular" value="<?=$celular;?>" class="form-control" required>

                        </div>
                        </div>

                        <div class="col-md-4">
                        <div class="form-group">

                            <label for="">Profesión</label>
                            <input type="text" name="profesion" value="<?=$profesion;?>" class="form-control" required>

                        </div>
                        </div>

                        
                        <div class="col-md-8">
                        <div class="form-group">

                            <label for="">dirección</label>
                            <input type="address" name="direccion" value="<?=$direccion;?>" class="form-control" required>

                        </div>
                        </div>

                        <div class="col-md-4">
                        <div class="form-group">

                            <label for="">correo</label>
                            <input type="email" name="email" value="<?=$email;?>" class="form-control" required>

                        </div>
                        </div>

                        <div class="col-md-4">
                        <div class="form-group">

                            <label for="">Cargo</label>
                            <select name="cargo" id="" class="form-control" >
                                <option value="TITULAR" <?=$preceptore['cargo']=="TITULAR" ? 'selected': ''?>>TITULAR</option>
                                <option value="VACANTE" <?=$preceptore['cargo']=="VACANTE" ? 'selected': ''?>>VACANTE</option>
                                <option value="SUPLENTE" <?=$preceptore['cargo']=="SUPLENTE" ? 'selected': ''?>>SUPLENTE</option>
                        


                    </select>

                        </div>
                        </div>

                        <div class="col-md-4">
                        <div class="form-group">

                            <label for="">Antigüedad</label>
                            <input type="text" name="antiguedad" value="<?=$antiguedad;?>" class="form-control" required>

                        </div>
                        </div>
                        



                         
                      
                

        <hr>
        <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Actualizar</button>
                            <a href="<?=APP_URL;?>/admin/preceptores" class="btn btn-secondary">Cancelar</a>
           
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

