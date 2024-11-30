<?php

    include('../../../app/config.php');
    include('../../../admin/layout/parte1.php');
    include('../../../admin/layout/parte2.php');
    include('../../../layout/mensajes.php');
    

    ?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <br>
   <!-- Main content -->
    <div class="content">
      <div class="container">

        <div class="row">
          <h1>Registro de datos de la Institución</h1>
        </div>
        
        <div class="row">
          <div class="col-md-12">
            <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title">LLene los datos</h3>
               
            </div>

            <div class="card-body">
            <form action="<?=APP_URL;?>/app/controllers/configuraciones/institucion/create.php" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-8">
                    
                    <div class="row">
                        <div class="col-md-8">
                            <div class="row">
                            <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nombre de la Institución <b>*</b></label>
                                <input type="text" name="nombre_institucion" class="form-control" required>
                            </div>
                        </div>
                        
                    <div class="col-md-8">
                            <div class="form-group">
                                <label for="">Correo de la Institución<b>*</b></label>
                                <input type="email" name="correo" class="form-control" required>
                            </div>
                            </div>
                            </div>
                    
                            <div class="row">
                            <div class="col-md-6"
                            <div class="form-group">
                                <label for="">teléfono <b>*</b></label>
                                <input type="number" name="telefono" class="form-control" required>
                            </div>
                            </div>
                            </div>
                                                     
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Celular</label>
                                <input type="number" name="celular" class="form-control">
                            </div>
                        </div>                       
        
                        
                            <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Dirección <b>*</b></label>
                                <input type="text" name="direccion" class="form-control requerid">
                            </div>
                            </div>
                            </div>
                            </div>
        
                            
                    <div class="col-md-4">
                        <div class="row">
                      
                        <div class="col-md-12">
                        <div class="form-group">
                        <label for="">Logo de la institución</label>
                                <input type="file" name="file" id="file"  class="form-control">
                                <br />
                                
                                <output id="list"></output>
                            </div>
                            </div>
                            </div>


                            <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Registrar</button>
                            <a href="<?=APP_URL;?>/admin/configuraciones" class="btn btn-secondary">Cancelar</a>
           
                        </div> 
                    </div>
        </div>
            </form>

            <script>
 function filePreview(input) {
 if (input.files && input.files[0]) {
 var reader = new FileReader();
 reader.readAsDataURL(input.files[0]);
 reader.onload = function (e) {
 $('#uploadForm + img').remove();
 $('#uploadForm').after('<img src="'+e.target.result+'" width="450"
height="300"/>');
 }
 }
}
</script>
