<?php

    include('../../app/config.php');
    include('../../admin/layout/parte1.php');
    include('../../admin/layout/parte2.php');
    include('../../app/controllers/kardexprece/listado_de_kardexs.php');

    $id_estudiante = $_GET['id_estudiante'];

   
    ?>


<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <br>
   <!-- Main content -->
    <div class="content">
      <div class="container">

      <div class="row">
          <h1>Listado de Notificaciones</h1>
        </div>

        
       <br> <br>
        <div class="row">
          <div class="col-md-12">
            <div class="card card-outline card-info">
              <div class="card-header">
                <h3 class="card-title">Reportes registrados</h3>
              </div>

            <div class="card-body">
             
           <table class="table table-hover table-dark table-bordered table-sm" id="example1" >
                <thead>
                                           
                <tr>    
                    <th><center>N°</center></th>
                    <th><center>Materia</center></th>
                    <th><center>Fecha de reporte</center></th>
                    <th><center>Observacion</center></th>
                    <th><center>Nota</center></th>
                   
                </tr>
                </thead>
                <tbody>
                <?php
                $contador_reportes = 0;
                foreach ($kardexs as $kardex){
                   
                    if($id_estudiante == $kardex['estudiante_id']){ 
                    $id_kardex = $kardex['id_kardex'];
                    $nombre_materia = $kardex['nombre_materia'];   
                    $fecha = $kardex['fecha']; 
                    $observacion = $kardex['observacion']; 
                    $nota = $kardex['nota'];  
                     

                    $contador_reportes = $contador_reportes + 1; ?>
                    <td><center><?=$estudiante['turno'];?></center></td>
                    

                    <tr>

                    <td><center><?=$contador_reportes;?></td></center>
                    <td><center><?=$nombre_materia;?></td></center>
                    <td><center><?=$fecha;?></td></center>
                    <td><center><?=$observacion;?></td></center>
                    <td><?=$nota;?></td>
                  

                    <?php
                     foreach($estudiantes as $estudiante){
                        if($estudiante['id_estudiante']==$estudiante_id){ ?>
                    <td><center><?=$contador_reportes;?></center></td>
                        
                        <td><center><?=$estudiante['turno'];?></center></td>
                        <td><center><?=$estudiante['curso'];?></center></td>
                        <td><center><?=$estudiante['paralelo'];?></center></td>
                        <td><center><?=$kardex['nombre_materia'];?></center></td>
                        
                        <td><center><?=$estudiante['apellidos']."  ".$estudiante['nombres'];?></center></td>
                        <td><center><?=$kardex['fecha'];?></center></td>
                        <td><center><?=$kardex['observacion'];?></center></td>
                        <td><center><?=$kardex['nota'];?></center></td>
                    <?php
                        }
                     }
                     ?>  
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
  </div>
  </div>
  </div>

  <script>
    $(function () {
        $("#example1").DataTable({
            "pageLength": 5,
            "language": {
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Notificaciones",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Notificaciones",
                "infoEmpty": "Mostrando 0 a 0 de 0 ",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Notificaciones",
                "infoFiltered": "(Filtrado de _MAX_ total )",
                "infoPostFix": "",
                "thousands": ",",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Notificaciones",
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
  