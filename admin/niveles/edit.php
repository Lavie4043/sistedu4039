<?php
$id_nivel = $_GET['id'];

    include('../../app/config.php');
    include('../../admin/layout/parte1.php');
    include('../../admin/layout/parte2.php');
    include('../../layout/mensajes.php');
    include('../../app/controllers/configuraciones/gestion/listado_de_gestiones.php');
    include('../../app/controllers/niveles/datos_nivel.php');
    

    ?>


<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <br>
   <!-- Main content -->
    <div class="content">
      <div class="container">

        <div class="row">
          <h1>Modificar niveles: <?=$nivel;?></h1>
        </div>
        
        <div class="row">
          <div class="col-md-8">
            <div class="card card-outline card-success">
              <div class="card-header">
                <h3 class="card-title">LLene los datos</h3>
               
            </div>

            <div class="card-body">
            <form action="<?=APP_URL;?>/app/controllers/niveles/update.php" method="post">
                
                
                    
                    <div class="row">
                 <div class="col-md-8">
                    <div class="form-group">
                        <label for="">Gestión educativa<b></b></label>
                        <input type="text" name="id_nivel" value="<?=$id_nivel;?>" hidden> </input> 
                        <select name="gestion_id" id="" class="form-control">
                            <?php
                            foreach ($gestiones as $gestione){ 
                                if($gestione['estado']=="1"){ ?>
                                <option value="<?=$gestione['id_gestion'];?>" 
                                    <?php if($gestion_id == $gestione['id_gestion']) {?> selected="selected" <?php } ?> >
                                    <?=$gestione['gestion'];?>
                                </option>
                                <?php
                                } ?>
                                <?php
                                }
                                ?>
                        </select>

                        </div>
                        </div>
                    </div>
                        
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="">Niveles<b>*</b></label>
                                <select name= "nivel" id="" class=form-control>

                                  <option value="INICIAL"<?php if($nivel == 'INICIAL') {?> selected="selected" <?php } ?>>INICIAL</option>

                                  <option value="PRIMARIA"<?php if($nivel == 'PRIMARIA') {?> selected="selected" <?php } ?>>PRIMARIA</option>
                                  <option value="SECUNDARIA"<?php if($nivel == 'SECUNDARIA') {?> selected="selected" <?php } ?>>SECUNDARIA</option>

                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="">Turnos<b></b></label>
                                <select name= "turno" id="" class=form-control>
                                  <option value="MAÑANA"<?php if($turno == 'MAÑANA') {?> selected="selected" <?php } ?>>MAÑANA</option>
                                  <option value="TARDE"<?php if($turno == 'TARDE') {?> selected="selected" <?php } ?>>TARDE</option>
                                  <option value="NOCHE"<?php if($turno == 'NOCHE') {?> selected="selected" <?php } ?>>NOCHE</option>

                                </select>
                            </div>
                        </div>
                    </div>


                   <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Actualizar</button>
                            <a href="<?=APP_URL;?>/admin/niveles" class="btn btn-secondary">Cancelar</a>
           
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
              