<?php

    include('../../app/config.php');
    include('../../admin/layout/parte1.php');
    include('../../admin/layout/parte2.php');
    
  
    ?>


<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <br>
   <!-- Main content -->
    <div class="content">
      <div class="container">

      <div class="row">
          <h1>Inscripciones del alumnado: <?=$anio_actual;?></h1>
        </div>

        <div class="row">

          <div class="col-md-12">

            <div class="col-md-6 col-sm-6 col-20">
                <div class="info-box">
                        <span class="info-box-icon bg-primary"><i class="bi bi-person-video"></i></span>
                        <div class="info-box-content">
                        <span class="info-box-text">Inscripciones individuales</span>
                        <a href = "create.php" class="btn btn-primary btn-sm">Nuevo estudiante</a>
                        
                        </div>

                </div>
            </div>

            <div class="col-md-12">

            <div class="col-md-6 col-sm-6 col-20">
                <div class="info-box">
                        <span class="info-box-icon bg-success"><i class="bi bi-person-plus"></i></span>
                        <div class="info-box-content">
                        <span class="info-box-text">Importar estudiantes</span>
                        <a href = "importar" class="btn btn-success btn-sm">Importar</a>
                        
                        </div>

                </div>
            </div>
           

           

    
           </div> 
     </div>
  </div>
        <br> <br>
            
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  
  