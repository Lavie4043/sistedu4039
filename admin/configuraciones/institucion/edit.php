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
          <h1>Modificar datos de la Institución</h1>
        </div>
        
        <div class="row">
          <div class="col-md-12">
            <div class="card card-outline card-success">
              <div class="card-header">
                <h3 class="card-title">LLene los datos</h3>
               
            </div>

            <div class="card-body">
            <form action="<?=APP_URL;?>/app/controllers/configuraciones/institucion/update.php" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-8">
                    
                    <div class="row">
                        <div class="col-md-8">
                            <div class="row">
        <div class="col-md-6">
          <div class="form-group">
          <input type="text" name= "id_config_institucion" value="<?=$id_config_institucion;?>" hidden>
          <input type="text" name= "logo" value="<?=$logo;?>" hidden>
          <label for="">Nombre de la Institución <b>*</b></label>
          <input type="text" name="nombre_institucion" value="<?=$nombre_institucion;?>" class="form-control" required>
          </div>
        </div>
                        
                    <div class="col-md-8">
                            <div class="form-group">
                                <label for="">Correo de la Institución<b>*</b></label>
                                <input type="email" name="correo" value="<?=$correo;?>"  class="form-control" required>
                            </div>
                            </div>
                            </div>
                    
                            <div class="row">
                            <div class="col-md-6"
                            <div class="form-group">
                                <label for="">teléfono <b>*</b></label>
                                <input type="number" name="telefono" value="<?=$telefono;?>" class="form-control" required>
                            </div>
                            </div>
                            </div>
                                                     
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Celular</label>
                                <input type="number" name="celular" value="<?=$celular;?>" class="form-control">
                            </div>
                        </div>                       
        
                        
                            <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Dirección <b>*</b></label>
                                <input type="text" name="direccion" value="<?=$direccion;?>" class="form-control requerid">
                            </div>
                            </div>
                            </div>
                            </div>
        
                            
                    <div class="col-md-4">
                        <div class="row">
                      
                        <div class="col-md-12">
                        <div class="form-group">
                        <label for="">Logo de la institución</label>
                                <input type="file" name="file" value="<?=$logo;?>" id="file"  class="form-control">  
                                <br />
                                
                                <output id="list">
                                <img src="<?=APP_URL."/public/images/configuracion/".$institucion['logo'];?>" width="100px" alt="">
                                </output>
                            </div>
                            </div>
                            </div>


                            <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Actualizar</button>
                        
                            <a href="<?=APP_URL;?>/admin/configuraciones/" class="btn btn-secondary">Cancelar</a>
           institucion
                        </div> 
                    </div>
        </div>
            </form>
  
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
              