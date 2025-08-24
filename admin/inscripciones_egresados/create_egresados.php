<?php

    include('../../app/config.php');
    include('../../admin/layout/parte1.php');
    include('../../admin/layout/parte2.php');
    include('../../layout/mensajes.php');
    
  
  

    ?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <br>
   <!-- Main content -->
    <div class="content">
      <div class="container">

      <div class="row">
          <h1>Creación nuevo egresado</h1>
        </div>
        <br>
        <form action="<?=APP_URL;?>/app/controllers/inscripciones_egresados/create.php" method="post">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title"><b>LLene los datos del egresado</b></h3>
               
            </div>

            <div class="card-body">

            
                <div class="row">
            
                
                                       
                
                        <div class="col-md-4">
                        <div class="form-group">

                            
                            <label>DNI:</label>
                            <input type="text" name="dni" required><br>


                        </div>
                        </div>

                        <div class="col-md-4">
                        <div class="form-group">

                            <label>Nombre completo:</label>
                            <input type="text" name="nombre_completo" required><br>


                        </div>
                        </div>

                
                
                <div class="col-md-4">
                        <div class="form-group">

                            <label>Año de egreso:</label>
  <input type="number" name="anio_egreso" min="2000" max="2025" required><br>


                    </div>
                </div>
                
                <div class="col-md-4">
                        <div class="form-group">

                            <label>Teléfono:</label>
  <input type="text" name="telefono"><br>


                        </div>
                        </div>

                        <div class="col-md-4">
      <div class="form-group">
        <label>Estado de contacto:</label>
        <select name="estado_contacto" required>
          <option value="sin_contacto">Sin contacto</option>
          <option value="activo">Activo</option>
          <option value="en seguimiento">En seguimiento</option>
        </select>
      </div>
    </div>

    <div class="col-md-12">
      <div class="form-group">
        <button type="submit">Guardar egresado</button>
      </div>
    </div>
  </div>

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  </div> 

                    

