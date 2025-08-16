<?php

$id_gestion = $_GET['id'];

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
          <h1>Modificacion de <?=$gestion;?></h1>
        </div>
        
        <div class="row">
          <div class="col-md-8">
            <div class="card card-outline card-success">
              <div class="card-header">
                <h3 class="card-title">LLene los datos</h3>
               
            </div>

            <div class="card-body">
            <form action="<?=APP_URL;?>/app/controllers/configuraciones/gestion/update.php" method="post">
                
                
                    
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                            <input type="text" name="id_gestion" value="<?=$id_gestion;?>" hidden>
                                <label for="">Gestión educativa<b></b></label>
                                <input type="text" value="<?=$gestion;?>" name= "gestion" class="form-control" required>
                            </div>
                        </div>
                    </div>
                        
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="">Estado<b>*</b></label>
                                <select name= "estado" id="" class=form-control>
                                 <?php
                                 if($estado == "1"){ ?>
                                    <option value="ACTIVO">ACTIVO</option>
                                    <option value="INACTIVO">INACTIVO</option>
                                <?php
                                 }else{ ?>
                                    <option value="ACTIVO">ACTIVO</option>
                                    <option value="INACTIVO" selected="selected">INACTIVO</option>
                                <?php
                                 }?>
                                
                                  

                                </select>
                            </div>
                        </div>
                    </div>

                   <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Actualizar</button>
                            <a href="<?=APP_URL;?>/admin/configuraciones/gestion" class="btn btn-secondary">Cancelar</a>
           
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
              