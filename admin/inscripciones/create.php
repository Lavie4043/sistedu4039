<?php

    include('../../app/config.php');
    include('../../admin/layout/parte1.php');
    include('../../admin/layout/parte2.php');
    include('../../layout/mensajes.php');
    include('../../app/controllers/roles/listado_de_roles.php');
    include('../../app/controllers/niveles/listado_de_niveles.php');
    include('../../app/controllers/grados/listado_de_grados.php');
  
  

    ?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <br>
   <!-- Main content -->
    <div class="content">
      <div class="container">

      <div class="row">
          <h1>Creación nuevo estudiante</h1>
        </div>
        <br>
        <form action="<?=APP_URL;?>/app/controllers/inscripciones/create.php" method="post">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title"><b>LLene los datos del estudiante</b></h3>
               
            </div>

            <div class="card-body">

            
                <div class="row">
            
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">

                            <label for="">Nombre del rol</label>
                            <a href="<?=APP_URL;?>/admin/roles/create.php" style="margin-left: 10px" class="btn btn-primary btn_sm"><i class="bi bi-file-plus"></i></a>  

                            <div class="form-inline">
                            
                    <select name="rol_id" id="" class="form-control">
                    <?php 
                        foreach ($roles as $role){ ?>
                        <option value="<?=$role['id_rol'];?>" <?=$role['nombre_rol']=="ESTUDIANTE" ? 'selected': ''?>><?=$role['nombre_rol'];?></option>
                       
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
                            <input type="text" name= "nombres" class="form-control" required>

                        </div>
                        </div>

                        <div class="col-md-4">
                        <div class="form-group">

                            <label for="">Apellidos</label>
                            <input type="text" name= "apellidos" class="form-control" required>

                        </div>
                        </div>

                
                
                <div class="col-md-4">
                        <div class="form-group">

                            <label for="">Documento de identidad</label>
                            <input type="number" name= "ci" class="form-control" required>

                    </div>
                </div>
                
                <div class="col-md-4">
                        <div class="form-group">

                            <label for="">Fecha de nacimiento</label>
                            <input type="date" name= "fecha_nacimiento" class="form-control">

                        </div>
                        </div>

                        <div class="col-md-4">
                        <div class="form-group">

                            <label for="">Celular</label>
                            <input type="number" name="celular" class="form-control" >

                        </div>
                        </div>

                        

                        
                        <div class="col-md-8">
                        <div class="form-group">

                            <label for="">dirección</label>
                            <input type="address" name="direccion" class="form-control" >

                        </div>
                        </div>

                        <div class="col-md-4">
                        <div class="form-group">

                            <label for="">correo</label>
                            <input type="email" name="email" class="form-control" >

                        </div>
                        </div>
                        </div>

                        </div>
                        </div>
                        </div>
                        </div>
        
                        <br> <br>

        <div class="row">
          <div class="col-md-12">
            <div class="card card-outline card-warning">
                <div class="card-header">
                <h3 class="card-title"><b>LLene los datos académicos del estudiante</b></h3>
               
                </div>

            <div class="card-body">

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">

                            <label for="">Nivel</label>
                            <a href="<?=APP_URL;?>/admin/niveles/create.php" style="margin-left: 10px" class="btn btn-primary btn_sm"><i class="bi bi-file-plus"></i></a>  

                            
                            
                    <select name="nivel_id" id="" class="form-control">
                    <?php 
                        foreach ($niveles as $nivele){ ?>
                        <option value="<?=$nivele['id_nivel'];?>"><?=$nivele['nivel']." - ".$nivele['turno'];?></option>
                       
                        <?php 
                        }
               
                        ?>
                                
                        </select>
                              
                                             
                    </div>
                    </div>
                    
             
                        
                        <div class="col-md-4">
                        <div class="form-group">

                            <label for="">Grado</label>
                            <select name="grado_id" id="" class="form-control">
                    <?php 
                        foreach ($grados as $grado){ ?>
                        <option value="<?=$grado['id_grado'];?>"><?=$grado['curso']." - ".$grado['paralelo'];?></option>
                       
                        <?php 
                        }
               
                        ?>
                                
                        </select>

                        </div>
                        </div>

                        
                        
                    

                        <div class="col-md-4">
                        <div class="form-group">

                            <label for="">Legajo</label>
                            <input type="number" name= "rude" class="form-control" >

                        </div>
                        </div>
                        

                        </div>
                        </div>
                        </div>
                        </div>
                    
                    
                    

                    
                    
<br> <br>
                    
                    <div class="row">
          <div class="col-md-12">
            <div class="card card-outline card-danger">
              <div class="card-header">
                <h3 class="card-title"><b>LLene los datos del tutor del estudiante</b></h3>
               
            </div>

            <div class="card-body">

            
            
                <div class="row">
                                           
                
                        <div class="col-md-4">
                        <div class="form-group">

                            <label for="">Apellidos y Nombres</label>
                            <input type="text" name= "nombres_apellidos_ppff" class="form-control" required>

                        </div>
                        </div>

                                     
                
                <div class="col-md-4">
                        <div class="form-group">

                            <label for="">Documento de identidad</label>
                            <input type="number" name= "ci_ppff" class="form-control" >

                    </div>
                </div>
                <div class="col-md-4">
                        <div class="form-group">

                            <label for="">Celular tutor</label>
                            <input type="number" name="celular_ppff" class="form-control" required>

                        </div>
                        </div>

                        <div class="col-md-4">
                        <div class="form-group">

                            <label for="">Ocupación tutor</label>
                            <input type="text" name="ocupacion_ppff" class="form-control" >

                        </div>
                        </div>
                <div class="col-md-4">
                        <div class="form-group">

                            <label for="">Apellidos y nombres de referencia</label>
                            <input type="text" name= "ref_nombre" class="form-control">

                        </div>
                        </div>

                        

                        <div class="col-md-4">
                        <div class="form-group">

                        <label for="">Parentezco de la referencia</label>
                            <input type="text" name= "ref_parentezco" class="form-control" >

                        </div>
                        </div>
                        

                        
                        

                        <div class="col-md-4">
                        <div class="form-group">

                            <label for="">Celular de referencia</label>
                            <input type="number" name="ref_celular" class="form-control" >

                        </div>
                        </div>
                        </div>

                        </div>
                        </div>
                        </div>
                        </div>
                        <hr>
        <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Registrar</button>
                            <a href="<?=APP_URL;?>/admin/estudiantes" class="btn btn-secondary">Cancelar</a>
           
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
