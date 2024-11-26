<?php

    include('../../app/config.php');
    include('../../admin/layout/parte1.php');
    include('../../admin/layout/parte2.php');
    include('../../app/controllers/preceptores/listado_de_preceptores.php');
    include('../../app/controllers/niveles/listado_de_niveles.php');
    include('../../app/controllers/grados/listado_de_grados.php');
    include('../../app/controllers/preceptores/listado_de_asignaciones.php');


  
    ?>


<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <br>
   <!-- Main content -->
    <div class="content">
      <div class="container">

      <div class="row">
          <h1>Listado del preceptor asignado a los cursos</h1>
        </div>

        <div class="row">
          <div class="col-md-12">
            <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title">Preceptores asignados</h3>
                <div class="card-tools">
                  
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Modal_asignacion"><i class="bi bi-plus-square"></i>
                Asignar Cursos
                </button>
                    
                  
                </div>
            </div>

            <div class="card-body">
           <table id="example1" class="table table-hover table-dark table-bordered table-sm">
                <thead>
                <body>
                                
                <tr>    
                    <th><center>N°</center></th>
                    <th><center>Nombre del preceptor</center></th>
                    <th><center>DNI</center></th>
                    <th><center>Fecha de nacimiento</center></th>
                    <th><center>email</center></th>
                    <th><center>Estado</center></th>
                    <th>k <center>Cursos asignados</center></th>
                    
                  </tr>
                </thead>
                <tbody>

            <?php
              $contador_preceptores = 0;
              foreach ($preceptores as $preceptore){
              $id_preceptore = $preceptore['id_preceptore'];
              $contador_preceptores = $contador_preceptores + 1 ;?>                
                         
              <tr>
                 <td style="text-align: center"><?=$contador_preceptores;?></td>
                 <td><?=$preceptore['nombres']." ".$preceptore['apellidos'];?></td>
                 <td><?=$preceptore['ci'];?></td>
                 <td><?=$preceptore['fecha_nacimiento'];?></td>
                 <td><?=$preceptore['email'];?></td>
                 <td style="text-align: center">
                    <?php
                    if($preceptore['estado']=="1") echo "ACTIVO";
                    else echo "INACTIVO";
                    ?>
                </td>
                <td>
                    <center>
                        
                <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#Modal_materias<?=$id_preceptore;?>"><i class="bi bi-postcard"></i> Ver Cursos
                
                </button>
              </center>
              <!-- Modal -->
<div class="modal fade" id="Modal_materias<?=$id_preceptore;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #6495ED">
        <h5 class="modal-title" id="exampleModalLabel"><b> Cursos asignados</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <b style="color:#000000"> Preceptor: <?=$preceptore['apellidos']." ".$preceptore['nombres'];?> </b>
        <hr>
        <table class="table table-bordered table-striped table-sm table-hover  ">
            <tr>
               
                <th style="color:#000000"><center>N°</center></th>
                <th style="color:#000000"><center>Nivel</center></th>
                <th style="color:#000000"><center>Turno</center></th>
                <th style="color:#000000"><center>Grado</center></th>
                <th style="color:#000000"><center>División</center></th>
                <th style="color:#000000"><center>Acciones</center></th>


            </tr>
                <?php
                $contador = 0;
                foreach ($asignacionesprece as $asignacionprece){
                  $id_asignacionprece = $asignacionprece['id_asignacionprece'];
                    
                    if($asignacionprece['preceptore_id']==$id_preceptore){ $contador = $contador + 1; ?>
                        <tr>
                            <td style="color:#000000"> <center><?=$contador;?></center></td>
                            
                            <td style="color:#000000"><?=$asignacionprece['nivel'];?></td>
                            <td style="color:#000000"><?=$asignacionprece['turno'];?></td>
                            <td style="color:#000000"><?=$asignacionprece['curso'];?></td>
                            <td style="color:#000000"><?=$asignacionprece['paralelo'];?></td>
                            <td>
                            
                <div class="btn-group" usuario="group" aria-label="Basic example">
                     
              <a data-toggle="modal" data-target="#Modal_edicion<?=$id_asignacionprece;?>" type="button" class="btn btn-success btn-sm"><i class="bi bi-pencil"></i></a>

              <div class="modal fade" id="Modal_edicion<?=$id_asignacionprece;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #0fbf0d">
        <h5 class="modal-title" id="exampleModalLabel"><b>Asignación de cursos</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body"> 

      <form action="<?=APP_URL;?>/app/controllers/preceptores/update_asignaciones.php" method="post">
      
                      <div class="row"> 
                        <div class="col-md-12">
                       
            <div class="form-group"> 
            <input type="text" name="id_asignacionprece" value="<?=$id_asignacionprece;?>" hidden>
              
              <label for="" style="color:#000000">Nivel</label>
              <select name="id_nivel" id"" class="form-control>
                <?php
                foreach ($niveles as $nivele){
                  $id_nivel = $nivele['id_nivel']; ?>
                    <option value="<?=$id_nivel;?>" <?=$nivele['id_nivel']==$asignacionprece['nivel_id'] ? 'selected' : ''?>><?=$nivele['nivel']." ".$nivele['turno'];?></option>
                <?php
                }
                ?>
                
              </select>
            </div>

          </div>

          <div class="col-md-12"> 
            <div class="form-group"> 
              <label for="" style="color:#000000">Cursos</label>
              <select name="id_grado" id"" class="form-control>
                <?php
                foreach ($grados as $grado){
                  $id_grado = $grado['id_grado']; ?>
                    <option value="<?=$id_grado;?>"<?=$grado['id_grado']==$asignacionprece['grado_id'] ? 'selected' : ''?>><?=$grado['curso']." ".$grado['paralelo'];?></option>
                <?php
                }
                ?>
                
              </select>
            </div>

          </div>

         
            

          </div>
          
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Registrar</button>
      </div>
              </form>
    </div>
  </div>
</div>  
      

                    
                    <form action="<?=APP_URL;?>/app/controllers/preceptores/delete_asignacion.php" onclick="preguntar<?=$id_asignacionprece;?>(event)" method="post" id="miFormulario<?=$id_asignacionprece;?>">
                        <input type="text" name="id_asignacionprece" value="<?=$id_asignacionprece;?>" hidden>
                        <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>

                    </form>
                    </tr>
                    


                    <?php

                    }
                }
                ?>
        </table> 
            

      </div>
      </div>
    </div>
  </div>

                </td>

                    
                 
    <script>
    function preguntar<?=$id_asignacionprece;?>(event) {
      event.preventDefault();
      Swal.fire({
        title: 'Eliminar registro',
        text: '¿Desea eliminar este registro',
        icon: 'question',
        showDenyButton: true,
        confirmButtonText: 'Eliminar',
        confirmButtonColor: '#a5161d',
        denyButtonColor: '#3B033B', 
        denyButtonText: 'Cancelar', 

     }).then ((result) => {
      if (result.isConfirmed) {
        var form = $('#miFormulario<?=$id_asignacionprece;?>');
        form.submit();
      }
     });
    }
</script> 
                  </div>
                  </td>
                </tr>
              <?php
              }
              ?>  
              
              </tbody>
            </table>
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

  
  <script>
    $(function () {
        $("#example1").DataTable({
            "pageLength": 5,
            "language": {
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Asignaciones",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Asignaciones",
                "infoEmpty": "Mostrando 0 a 0 de 0 ",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Asignaciones",
                "infoFiltered": "(Filtrado de _MAX_ total )",
                "infoPostFix": "",
                "thousands": ",",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Asignaciones",
                "lengthMenu": "Mostrar _MENU_ ",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscador:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            },
            "responsive": true, "lengthChange": true, "autoWidth": false,
            buttons: [{
                extend: 'collection',
                text: 'Reportes',
                orientation: 'landscape',
                buttons: [{
                    text: 'Copiar',
                    extend: 'copy',
                }, {
                    extend: 'pdf'
                },{
                    extend: 'csv'
                },{
                    extend: 'excel'
                },{
                    text: 'Imprimir',
                    extend: 'print'
                }
                ]
            },
                {
                    extend: 'colvis',
                    text: 'Visor de columnas',
                    collectionLayout: 'fixed three-column'
                }
            ],
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>

<!-- Modal -->
<div class="modal fade" id="Modal_asignacion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #6495ED">
        <h5 class="modal-title" id="exampleModalLabel"><b>Asignación de Cursos</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <form action="<?=APP_URL;?>/app/controllers/preceptores/create_asignaciones.php" method="post">

      <div class="col-md-12"> 
            <div class="form-group"> 
              <label for="">Preceptor</label>
              <select name="id_preceptore" id"" class="form-control>
                <?php
                foreach ($preceptores as $preceptore){
                  $id_preceptore = $preceptore['id_preceptore']; ?>
                    <option value="<?=$id_preceptore;?>"><?=$preceptore['apellidos']." ".$preceptore['nombres'];?></option>
                <?php
                }
                ?>
                
              </select>
            </div>

          </div>


      <div class="col-md-12"> 
            <div class="form-group"> 
              <label for="">Nivel</label>
              <select name="id_nivel" id"" class="form-control>
                <?php
                foreach ($niveles as $nivele){
                  $id_nivel = $nivele['id_nivel']; ?>
                    <option value="<?=$id_nivel;?>"><?=$nivele['nivel']." ".$nivele['turno'];?></option>
                <?php
                }
                ?>
                
              </select>
            </div>

          </div>

          
          <div class="col-md-12"> 
            <div class="form-group"> 
              <label for="">Cursos</label>
              <select name="id_grado" id"" class="form-control>
                <?php
                foreach ($grados as $grado){
                  $id_grado = $grado['id_grado']; ?>
                    <option value="<?=$id_grado;?>"><?=$grado['curso']." ".$grado['paralelo'];?></option>
                <?php
                }
                ?>
                
              </select>
            </div>

          </div>

          
        

      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Registrar</button>
      </div>
              </form>
    </div>
  </div>
</div>