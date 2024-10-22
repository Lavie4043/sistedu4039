
<?php
$id_grado = $_GET['id'];

include('../../app/config.php');
include('../../admin/layout/parte1.php');
include('../../admin/layout/parte2.php');
include('../../layout/mensajes.php');
include('../../app/controllers/grados/datos_grados.php');
include('../../app/controllers/niveles/listado_de_niveles.php');

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<br>
<!-- Main content -->
<div class="content">
  <div class="container">

    <div class="row">
      <h1>Modificación del grado: <?=$curso;?> </h1>
    </div>
    
    <div class="row">
      <div class="col-md-8">
        <div class="card card-outline card-success">
          <div class="card-header">
            <h3 class="card-title">LLene los datos</h3>
           
        </div>

        <div class="card-body">
        <form action="<?=APP_URL;?>/app/controllers/grados/update.php" method="post">
            
            
                
                <div class="row">
             <div class="col-md-8">
                <div class="form-group">
                    <label for="">Nivel<b></b></label>
                    <input type="text" name="id_grado" value="<?=$id_grado;?>" hidden> </input>
                    <select name="nivel_id" id="" class="form-control">
                      
                        <?php
                        foreach ($niveles as $nivele){ 
                             ?>
                            <option value="<?=$nivele['id_nivel'];?>"<?=$nivel_id==$nivele['id_nivel'] ? 'selected' : ''?>><?=$nivele['nivel']." - ".$nivele['turno'];?></option>

                            <?php
                            } ?>
                            
                            
                        
                    </select>

                    </div>
                    </div>
                </div>
                    
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="">Curso<b></b></label>
                            <select name= "curso" id="" class=form-control>
                              <option value="INICIAL MATERNAL"<?=$curso== 'INICIAL MATERNAL'? 'selected': ''?>>INICIAL MATERNAL</option>
                              <option value="INICIAL JARDÍN DE INFANTES"<?=$curso=='INICIAL JARDÍN DE INFANTES'? 'selected': ''?>>INICIAL JARDÍN DE INFANTES</option>
                              <option value="PRIMARIA PRIMERO"<?=$curso=='PRIMARIA PRIMERO'? 'selected': ''?>>PRIMARIA PRIMERO</option>
                              
                              <option value="PRIMARIA SEGUNDO" <?=$curso=='PRIMARIA SEGUNDO'? 'selected': ''?>>PRIMARIA SEGUNDO</option>
                              <option value="PRIMARIA TERCERO"<?=$curso=='PRIMARIA TERCERO'? 'selected': ''?>>PRIMARIA TERCERO</option>
                              <option value="PRIMARIA CUARTO"<?=$curso=='PRIMARIA CUARTO'? 'selected': ''?>>PRIMARIA CUARTO</option>
                              <option value="PRIMARIA QUINTO"<?=$curso=='PRIMARIA QUINTO'? 'selected': ''?>>PRIMARIA QUINTO</option>
                              <option value="PRIMARIA SEXTO"<?=$curso=='PRIMARIA SEXTO'? 'selected': ''?>>PRIMARIA SEXTO</option>
                              <option value="PRIMARIA SÉPTIMO"<?=$curso=='PRIMARIA SÉPTIMO'? 'selected': ''?>>PRIMARIA SÉPTIMO</option>
                              <option value="SECUNDARIA PRIMERO"<?=$curso=='SECUNDARIA PRIMERO'? 'selected': ''?>>SECUNDARIA PRIMERO</option>
                              <option value="SECUNDARIA SEGUNDO"<?=$curso=='SECUNDARIA SEGUNDO'? 'selected': ''?>>SECUNDARIA SEGUNDO</option>
                              <option value="SECUNDARIA TERCERO"<?=$curso=='SECUNDARIA TERCERO'? 'selected': ''?>>SECUNDARIA TERCERO</option>
                              <option value="SECUNDARIA CUARTO"<?=$curso=='SECUNDARIA CUARTO'? 'selected': ''?>>SECUNDARIA CUARTO</option>
                              <option value="SECUNDARIA QUINTO"<?=$curso=='SECUNDARIA QUINTO'? 'selected': ''?>>SECUNDARIA QUINTO</option>
                              <option value="SECUNDARIA SEXTO"<?=$curso=='SECUNDARIA SEXTO'? 'selected': ''?>>SECUNDARIA SEXTO</option>

                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="">Division<b></b></label>
                            <select name= "paralelo" id="" class=form-control>
                              <option value="PRIMERA"<?=$paralelo=='PRIMERA' ? 'selected' : ''?>>PRIMERA</option>
                              <option value="SEGUNDA"<?=$paralelo=='SEGUNDA' ? 'selected' : ''?>>SEGUNDA</option>
                              <option value="TERCERA"<?=$paralelo=='TERCERA' ? 'selected' : ''?>>TERCERA</option>
                              <option value="CUARTA"<?=$paralelo=='CUARTA' ? 'selected' : ''?>>CUARTA</option>

                            </select>
                        </div>
                    </div>
                </div>


               <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Actualizar</button>
                        <a href="<?=APP_URL;?>/admin/grados" class="btn btn-secondary">Cancelar</a>
       
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
          