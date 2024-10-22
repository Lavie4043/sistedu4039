<?php

$id_estudiante_get = $_GET['id_estudiante'];

    include('../../app/config.php');
    include('../../admin/layout/parte1.php');
    include('../../admin/layout/parte2.php');
    include('../../app/controllers/estudiantes/listado_de_estudiantes.php');
    include('../../app/controllers/calificaciones/listado_de_calificaciones.php');

$curso ="";
$paralelo ="";
    foreach ($estudiantes as $estudiante){
        if($id_estudiante_get == $estudiante['id_estudiante']){ 
            $nombres = $estudiante['nombres'];
            $apellidos = $estudiante['apellidos'];
            $curso = $estudiante['curso'];
            $paralelo = $estudiante['paralelo'];
          
        }
      
      }
?>  




<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <br>
   <!-- Main content -->
    <div class="content">
      <div class="container">

      <div class="row">
          <h2>Calificaciones: <?=$apellidos;?> <?=$nombres;?>  </h2>
      </div>

        <div class="row">
          <div class="col-md-12">
            <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title">Calificaciones registradas</h3>
       </div>
           <div class="card-body">
           <table id="example1" class="table table-hover table-dark table-bordered table-sm">
                <thead>
                                    
                <tr>    
                    <th><center>N°</center></th>
                    <th><center>Materia</center></th>                                         
                    <th><center>1° ETAPA</center></th>
                    <th><center>2° ETAPA</center></th>
                 
                    
                    </tr>
                </thead>
                <tbody>

            <?php
              $contador_calificaciones = 0;
              $nota1 = "";
              $nota2 = "";
              foreach ($calificaciones as $calificacione){
                if($id_estudiante_get == $calificacione['estudiante_id']){ 
                  
                    $contador_calificaciones = $contador_calificaciones + 1; 
                    ?>                
                         
              <tr>
                 <td><center><?=$contador_calificaciones;?></center></td>
                 <td style="text-align: center"><?=$calificacione['nombre_materia'];?></td>
                 <td style="text-align: center"><?=$calificacione['nota1'];?></td>

                 <td style="text-align: center"><?=$calificacione['nota2'];?></td>

                </tr>
                 
                    <?php
                }
            }
            ?>                       
                </tbody>
            </table>
       
            
           
           </div> 
     </div>
  </div>
  </div>
      
            
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
                "info": "Mostrando _START_ a _END_ de _TOTAL_Calificaciones",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Calificaciones",
                "infoEmpty": "Mostrando 0 a 0 de 0 ",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Calificaciones",
                "infoFiltered": "(Filtrado de _MAX_ total )",
                "infoPostFix": "",
                "thousands": ",",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Calificaciones",
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

  
            