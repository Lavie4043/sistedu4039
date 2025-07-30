<?php
$id_config_institucion = $_GET['id'];
    include('../../../app/config.php');
    include('../../../admin/layout/parte1.php');
    include('../../../admin/layout/parte2.php');
    include('../../../layout/mensajes.php');
    include('../../../app/controllers/configuraciones/institucion/datos_institucion.php');

    ?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <br>
   <!-- Main content -->
    <div class="content">
      <div class="container">

        <div class="row">
          <h1>Institución: <?=$nombre_institucion;?></h1>
        </div>
        
        <div class="row">
          <div class="col-md-12">
            <div class="card card-outline card-info">
              <div class="card-header">
                <h3 class="card-title">Datos registrados</h3>
               
            </div>

            <div class="card-body">
            
                <div class="row">
                    <div class="col-md-8">
                    
                    <div class="row">
                        <div class="col-md-8">
                            <div class="row">
                            <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nombre de la Institución</label>
                                <p><?=$nombre_institucion;?></p>
                            </div>
                        </div>
                        
                    <div class="col-md-8">
                            <div class="form-group">
                                <label for="">Correo de la Institución</label>
                                <p><?=$correo;?></p>
                            </div>
                            </div>
                            </div>
                    
                            <div class="row">
                            <div class="col-md-6"
                            <div class="form-group">
                                <label for="">teléfono</label>
                                <p><?=$telefono;?></p>
                            </div>
                            </div>
                            </div>
                                                     
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Celular</label>
                                <p><?=$celular;?></p>
                            </div>
                        </div>                       
        
                        
                            <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Dirección</label>
                                <p><?=$direccion;?></p>
                            </div>
                            </div>
                            </div>
                            </div>
        
                            
                    <div class="col-md-4">
                        <div class="row">
                      
                        <div class="col-md-12">
                        <div class="form-group">
                        <label for="">Logo de la institución</label>
                        <br>
                        
                        <img src="<?=APP_URL."/public/images/configuracion/".$logo;?>" width="200px" alt="">
                                
                            
                            </div>
                            </div>
                            </div>
                            </div>
                            </div>


                            <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            
                            <a href="<?=APP_URL;?>/admin/configuraciones/institucion" class="btn btn-secondary">Volver</a>
           
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
              