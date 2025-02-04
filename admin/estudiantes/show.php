<?php
$id_estudiante = $_GET['id'];

    include('../../app/config.php');
    include('../../admin/layout/parte1.php');
    include('../../admin/layout/parte2.php');
    include('../../layout/mensajes.php');
    include('../../app/controllers/estudiantes/datos_del_estudiante.php');
    
  
  

    ?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <br>
   <!-- Main content -->
    <div class="content">
      <div class="container">

      <div class="row">
          <h1>Datos del Estudiante: <?=$apellidos." ".$nombres;?></h1>
        </div>
        <br>
        
        <div class="row">
          <div class="col-md-12">
            <div class="card card-outline card-info">
              <div class="card-header">
                <h3 class="card-title"><b>Datos del estudiante</b></h3>
               
            </div>

            <div class="card-body">

            
                <div class="row">
            
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">

                            <label for="">Nombre del rol</label>
                            <p><?=$nombre_rol;?></p>
                            
                              
                            
           
                         
                    </div>
                </div>

                                    
                
                        <div class="col-md-4">
                        <div class="form-group">

                            <label for="">Nombres</label>
                            <p><?=$nombres;?></p>

                        </div>
                        </div>

                        <div class="col-md-4">
                        <div class="form-group">

                            <label for="">Apellidos</label>
                            <p><?=$apellidos;?></p>

                        </div>
                        </div>

                
                
                <div class="col-md-4">
                        <div class="form-group">

                            <label for="">Documento de identidad</label>
                            <p><?=$ci;?></p>

                    </div>
                </div>
                
                <div class="col-md-4">
                        <div class="form-group">

                            <label for="">Fecha de nacimiento</label>
                            <p><?=$fecha_nacimiento;?></p>

                        </div>
                        </div>

                        <div class="col-md-4">
                        <div class="form-group">

                            <label for="">Celular</label>
                            <p><?=$celular;?></p>

                        </div>
                        </div>

                        

                        
                        <div class="col-md-8">
                        <div class="form-group">

                            <label for="">dirección</label>
                            <p><?=$direccion;?></p>

                        </div>
                        </div>

                        <div class="col-md-4">
                        <div class="form-group">

                            <label for="">correo</label>
                            <p><?=$email;?></p>

                        </div>
                        </div>

                        
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">departamento<b></b></label>
                                <p><?=$departamento;?> </p>
                                
                            </div>
                        </div>
                    

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">localidad<b></b></label>
                                <p><?=$localidad;?> </p>
                                
                            </div>
                        </div>
                    

                        <div class="col-md-4">
                        <div class="form-group">

                            <label for="">Fecha y hora de registro</label>
                            <p><?=$fyh_creacion;?></p>

                        </div>
                        </div>

                        <div class="col-md-4">
                        <div class="form-group">

                            <label for="">Estado</label>
                            <p>
                                  <?php 
                                  if ($estado == "1") echo "ACTIVO";
                                  else echo "INACTIVO";
                                  ?> 
                                </p>

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
                            <p><?=$nivel." - ".$turno;?></p>
                            
                              
                                             
                    </div>
                    </div>
                    
             
                        
                        <div class="col-md-4">
                        <div class="form-group">

                            <label for="">Grado</label>
                            <p><?=$curso." - ".$paralelo;?></p>
                            
                        </div>
                        </div>

                        
                        
                    

                        <div class="col-md-4">
                        <div class="form-group">

                            <label for="">Legajo</label>
                            <p><?=$rude;?></p>

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
                <h3 class="card-title"><b>Datos del tutor del estudiante</b></h3>
               
            </div>

            <div class="card-body">

            
            
                <div class="row">
                                           
                
                        <div class="col-md-4">
                        <div class="form-group">

                            <label for="">Apellidos y Nombres</label>
                            <p><?=$nombres_apellidos_ppff;?></p>

                        </div>
                        </div>

                                     
                
                <div class="col-md-4">
                        <div class="form-group">

                            <label for="">Documento de identidad</label>
                            <p><?=$ci_ppff;?></p>

                    </div>
                </div>
                <div class="col-md-4">
                        <div class="form-group">

                            <label for="">Celular tutor</label>
                            <p><?=$celular_ppff;?></p>


                        </div>
                        </div>

                        <div class="col-md-4">
                        <div class="form-group">

                            <label for="">Ocupación tutor</label>
                            <p><?=$ocupacion_ppff;?></p>


                        </div>
                        </div>
                <div class="col-md-4">
                        <div class="form-group">

                            <label for="">Apellidos y nombres de referencia</label>
                            <p><?=$ref_nombre;?></p>

                        </div>
                        </div>

                        

                        <div class="col-md-4">
                        <div class="form-group">

                        <label for="">Parentezco de la referencia</label>
                        <p><?=$ref_parentezco;?></p>


                        </div>
                        </div>
                        

                        
                        

                        <div class="col-md-4">
                        <div class="form-group">

                            <label for="">Celular de referencia</label>
                            <p><?=$ref_celular;?></p>


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
                            
                            <a href="<?=APP_URL;?>/admin/estudiantes" class="btn btn-secondary">Volver</a>
           
                        </div> 
                    </div>
        </div>
                    
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  </div> 
