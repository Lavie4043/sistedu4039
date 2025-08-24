<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include('../../app/config.php');

include('../../admin/layout/parte1.php'); // encabezado
include('../../admin/layout/parte2.php'); // cierre

$sql = "SELECT * FROM egresados ORDER BY fecha_ultimo_contacto DESC";
$query = $pdo->prepare($sql);
$query->execute();
$egresados = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="content-wrapper">
    <br>
   <!-- Main content -->
    <div class="content">
      <div class="container">

      <div class="row">
          <h1>Listado Egresados</h1>
          <div class="col-md-12">
          <?php
          if (isset($_GET['mensaje']) && $_GET['mensaje'] == 'egresado_guardado') {
              echo "<div class='alert alert-success alert-dismissible'>
                      <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                      <h5><i class='icon fas fa-check'></i> ¡Éxito!</h5>
                      Egresado guardado correctamente.
                    </div>";
          }
          ?>
        </div>

        <div class="row">
          <div class="col-md-12">
            <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title">Egresados registrados</h3>
                <div class="card-tools">
                  
                  <a href="create_egresados.php" class="btn btn-primary"><i class="bi bi-plus-square"></i>Crear nuevo egresado</a>
                
                </div>
            </div>

                                    
                
        <div class="card-body">
      <table class="table table-hover table-dark table-bordered table" id="egresadosTable">
        <thead>
          <tr>
            <th>DNI</th>
            <th>Nombre</th>
            <th>Año</th>
            <th>Teléfono</th>
            <th>Estado</th>
            <th>Último contacto chatbot</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($egresados as $egresado): ?>
            <tr>
              <td><?= $egresado['dni'] ?></td>
              <td><?= $egresado['nombre_completo'] ?></td>
              <td><?= $egresado['anio_egreso'] ?></td>
              <td><?= $egresado['telefono'] ?></td>
              <td>
                <?php
                  $estado = $egresado['estado_contacto'];
                  if ($estado == 'activo') echo "<span class='badge badge-warning'>Activo</span>";
                  elseif ($estado == 'en seguimiento') echo "<span class='badge badge-success'>En seguimiento</span>";
                  else echo "<span class='badge badge-secondary'>Sin contacto</span>";
                ?>
              </td>
            <td><?php
if (!empty($egresado['fecha_ultimo_contacto'])) {
  echo date('d/m/Y H:i', strtotime($egresado['fecha_ultimo_contacto']));
} else {
  echo "<span class='text-muted'>Sin contacto registrado</span>";
}
?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<script>
    $(function () {
        $("#egresadosTable").DataTable({
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