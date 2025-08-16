<?php
$id_gestion = $_GET['id'];
$id_grado = $_GET['id'];

    include('../../../app/config.php');
    include('../../../admin/layout/parte1.php');
    include('../../../admin/layout/parte2.php');
    include('../../../layout/mensajes.php');
    include('../../../app/controllers/configuraciones/gestion/datos_gestion.php');

    ?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <br>
   <!-- Main content -->
    <div class="content">
      <div class="container">

        <div class="row">
          <h1>Gestion educativa: <?=$gestion;?></h1>
        </div>
        
        <div class="row">
          <div class="col-md-8">
            <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title">Datos registrados</h3>
               
            </div>

            <div class="card-body">
            
                
                
                    
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="">Gestión educativa<b>*</b></label>
                                <p><?=$gestion;?> </p>
                            </div>
                        </div>
                    </div>
                        
                    <div class="col-md-8">
                            <div class="form-group">
                                <label for="">Fecha y hora de creación<b>*</b></label>
                                <p><?=$fyh_creacion;?> </p>
                            </div>
                        </div>

                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="">Estado<b></b></label>
                                <p>
                                  <?php 
                                  if ($estado == "1") echo "ACTIVO";
                                  else echo "INACTIVO";
                                  ?> 
                                </p>
                            </div>
                        </div>
                    </div>

                   <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            
                            <a href="<?=APP_URL;?>/admin/configuraciones/gestion" class="btn btn-secondary">Volver</a>
           
                        </div> 
                    </div>
        </div>
            
  
            <script>
              function archivo(evt) {
                  var files = evt.target.files; // FileList object
             
                  // Obtenemos la imagen del campo "file".
                  for (var i = 0, f; f = files[i]; i++) {
                    //Solo admitimos imágenes.
                    if (!f.type.match('image.*')) {
                        continue;
                    }
             
                    var reader = new FileReader();
             
                    reader.onload = (function(theFile) {
                        return function(e) {
                          // Insertamos la imagen
                         document.getElementById("list").innerHTML = ['<img class="thumb thumbnail" src="', e.target.result,'" whidth="300px" title="', escape(theFile.name), '"/>'].join('');
                        };
                    })(f);
             
                    reader.readAsDataURL(f);
                  }
              }
             
              document.getElementById('files').addEventListener('change', archivo, false);
            </script>
            <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  </div> 

  <script>
              function archivo(evt) {
                  var files = evt.target.files; // FileList object
             
                  // Obtenemos la imagen del campo "file".
                  for (var i = 0, f; f = files[i]; i++) {
                    //Solo admitimos imágenes.
                    if (!f.type.match('image.*')) {
                        continue;
                    }
             
                    var reader = new FileReader();
             
                    reader.onload = (function(theFile) {
                        return function(e) {
                          // Insertamos la imagen
                         document.getElementById("list").innerHTML = ['<img class="thumb thumbnail" src="', e.target.result,'" whidth="300px" title="', escape(theFile.name), '"/>'].join('');
                        };
                    })(f);
             
                    reader.readAsDataURL(f);
                  }
              }
             
              document.getElementById('files').addEventListener('change', archivo, false);
            </script>
              

              