<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<!-- CSS de DataTables -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

<!-- jQuery (requerido por DataTables) -->
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

<!-- JS de DataTables -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<?php
include('../../app/config.php');
include('../../admin/layout/parte1.php');


include('../../app/controllers/docentes/listado_de_docentes.php');
include('../../app/controllers/niveles/listado_de_niveles.php');
include('../../app/controllers/grados/listado_de_grados.php');
include('../../app/controllers/materias/listado_de_materias.php');
include('../../app/controllers/bibliotecas/listado_de_bibliotecas.php');
include('../../app/controllers/estudiantes/listado_de_estudiantes.php');
include('../../app/controllers/docentes/listado_de_asignaciones.php');
include('../../app/controllers/usuarios/listado_de_usuarios.php');
include('../../app/controllers/bibliotecas/prestamos_validos.php');
include('../../app/controllers/bibliotecas/prestamos_validos_herramientas.php');
include('../../app/controllers/bibliotecas/prestamos_detallados.php');


include('../../app/controllers/bibliotecas/prestamos_detallados_herramientas.php');
include('../../app/controllers/bibliotecas/prestamos_por_tipo.php');




// Obtener todos los préstamos detallados

$prestamosDetallados = obtenerTodosLosPrestamos($pdo);
if (!is_array($prestamosDetallados)) {
    echo '<p class="text-danger">Error: $prestamosDetallados no es un array válido.</p>';
}

$prestamosLibros = filtrarPrestamosLibros($prestamosDetallados);

$prestamosHerramientas = filtrarPrestamosHerramientas($prestamosDetallados);


$prestamosRegistrados = array_filter($biblioteca, function($item) {
    $esLibro = $item['tipo_recurso'] === 'libro' && !empty($item['titulo']) && !empty($item['nombre_autor']) && $item['cantidad_libros'] > 0;
    
    
    $esHerramienta = $item['tipo_recurso'] === 'herramienta' && !empty($item['nombre_herramienta']) && $item['cantidad_herramientas'] > 0;
    return $esLibro || $esHerramienta;
});


?>





<div class="row mb-4">
  <div class="col-md-12">
    <div class="card card-outline card-primary">
      <div class="card-header">
        <h3 class="card-title">Préstamos Registrados</h3>
        <div class="card-tools"></div>
      </div>
<?php if (empty($prestamosLibros)): ?>
  <p class="text-center text-warning">⚠️ No hay préstamos de libros registrados.</p>
<?php else: ?>
  <p class="text-center text-success">✅ Se encontraron <?= count($prestamosLibros) ?> préstamos de libros.</p>
<?php endif; ?>

      <div class="card-body d-flex justify-content-center">
        <div class="table-responsive" style="max-width: 1000px; width: 100%; margin: auto;">
          <table id="examplePrestamos" class="table table-hover table-dark table-bordered table-sm text-center datatable">
  <thead>
    <tr>
      <th>N°</th>
      <th>DNI</th>
      <th>USUARIO</th>
      <th>Curso</th>
      <th>nombre_autor</th>
      <th>titulo</th>
      <th>Cantidad</th>
      <th>fecha_prestamo</th>
      <th>Acción</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($prestamosLibros as $index => $item): ?>
      <tr>
        <td><?= $index + 1 ?></td>
        <td><?= $item['ci'] ?></td>
        <td><?= $item['nombres'] . ' ' . $item['apellidos'] ?></td>
        <td><?= $item['curso'] . ' ' . $item['paralelo'] ?></td>
        <td><?= $item['nombre_materia'] ?></td>
        <td><?= $item['titulo'] ?></td>
        <td><?= $item['cantidad_libros'] ?></td>
        <td><?= $item['fecha_prestamo'] ?></td>
        <td><!-- acción --></td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Al final de biblioteca.php -->
...
<!-- Tu tabla ya está arriba en el HTML -->


<!-- Scripts: jQuery primero, luego DataTables, luego tu script -->
<script src="public/plugins/jquery/jquery.min.js"></script>
<script src="public/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="public/plugins/datatables/dataTables.buttons.min.js"></script>
<script src="public/plugins/datatables/buttons.html5.min.js"></script>
<script src="public/plugins/datatables/buttons.print.min.js"></script>
<script src="public/plugins/datatables/buttons.colVis.min.js"></script>

<!-- Script personalizado -->
<script>
    $(function () {
        $(     "language": {
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Usuarios",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Usuarios",
                "infoEmpty": "Mostrando 0 a 0 de 0 ",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Usuarios",
                "infoFiltered": "(Filtrado de _MAX_ total )",
                "infoPostFix": "",
                "thousands": ",",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Usuarios",
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
        })
    });
</script>



<!-- Para herramientas -->
 <?php if (empty($prestamosHerramientas)): ?>
  <p class="text-center text-warning">⚠️ No hay préstamos de herramientas registrados.</p>
<?php else: ?>
  <p class="text-center text-success">✅ Se encontraron <?= count($prestamosHerramientas) ?> préstamos de herramientas.</p>
<?php endif; ?>


<div class="row mb-4">
  <div class="col-md-12">
    <div class="card card-outline card-primary">
      <div class="card-header">
        <h3 class="card-title">Préstamos Registrados</h3>
        <div class="card-tools"></div>
      </div>

      <div class="card-body d-flex justify-content-center">
        <div class="table-responsive" style="max-width: 1000px; width: 100%; margin: auto;">
          <table id="examplePrestamosHerramientas" class="table table-hover table-dark table-bordered table-sm text-center datatable">
  <thead>
    <tr>
      <th>N°</th>
      <th>DNI</th>
      <th>USUARIO</th>
      <th>Curso</th>
      <th>Materia</th>
      <th>Nombre Herramienta</th>
      <th>Cantidad</th>
      <th>Inventario</th>
      <th>Fecha Préstamo</th>
      <th>Acción</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($prestamosHerramientas as $index => $item): ?>
    <tr>
      <td><?= $index + 1 ?></td>
      <td><?= $item['ci'] ?></td>
      <td><?= $item['nombres'] . ' ' . $item['apellidos'] ?></td>
      <td><?= $item['curso'] . ' ' . $item['paralelo'] ?></td>
      <td><?= $item['nombre_materia'] ?></td>
      <td><?= $item['tipo_recurso'] === 'herramienta' ? $item['nombre_herramienta'] : '—' ?></td>
      <td><?= $item['cantidad_herramientas'] ?></td>
      <td><?= $item['herramienta_inventario'] ?></td>
      <td><?= $item['fecha_prestamo'] ?></td>
      <td><!-- Botón o acción --></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
$(document).ready(function () {
  $('#examplePrestamosHerramientas').DataTable({
    responsive: true,
    lengthChange: true,
    autoWidth: false,
    language: {
      emptyTable: "No hay información",
      info: "Mostrando _START_ a _END_ de _TOTAL_ registros",
      infoEmpty: "Mostrando 0 a 0 de 0 registros",
      infoFiltered: "(filtrado de _MAX_ registros totales)",
      lengthMenu: "Mostrar _MENU_ registros",
      loadingRecords: "Cargando...",
      processing: "Procesando...",
      search: "Buscador:",
      zeroRecords: "Sin resultados encontrados",
      paginate: {
        first: "Primero",
        last: "Último",
        next: "Siguiente",
        previous: "Anterior"
      }
    },
    dom: 'Bfrtip',
    buttons: [
      {
        extend: 'collection',
        text: 'Reportes',
        orientation: 'landscape',
        buttons: [
          { extend: 'copy', text: 'Copiar' },
          { extend: 'pdf' },
          { extend: 'csv' },
          { extend: 'excel' },
          { extend: 'print', text: 'Imprimir' }
        ]
      },
      {
        extend: 'colvis',
        text: 'Visor de columnas',
        collectionLayout: 'fixed three-column'
      }
    ]
  });
});
</script>
    <!-- Para registrar -->



      <div class="row">
        <div class="col-md-12">
          <div class="card card-outline card-primary">
            <div class="card-header">
              <h3 class="card-title">Préstamos</h3>
              <div class="card-tools">
                
            <div class="card-body d-flex justify-content-center">
  <div class="table-responsive">
  <table id="example1" class="table table-hover table-dark table-bordered table-sm text-center">
    <thead>
      <tr>
        <th>N°</th>
        <th>DNI</th>
        <th>USUARIO</th>
        <th>ROL</th>
        <th>Acción</th>
      </tr>
    </thead>
   <tbody>
  <?php foreach ($bibliotecas as $index => $persona): ?>
    <tr>
      <td><?= $index + 1 ?></td>
      <td><?= $persona['ci'] ?></td>
      <td><?= $persona['nombres'] . ' ' . $persona['apellidos'] ?></td>
      <td><?= $persona['rol'] ?></td>
      <td>
        <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modalPrestamo<?= $persona['persona_id'] ?>">
          Prestar
        </button>
      </td>
    </tr>

   <!-- Modal individual -->
    <div class="modal fade" id="modalPrestamo<?= $persona['persona_id'] ?>" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            
         
          <form action="<?=APP_URL;?>/app/controllers/bibliotecas/procesar_prestamos.php" method="post">
            <input type="hidden" name="debug" value="funciona">

            <div class="modal-header bg-primary text-white">
              <h5 class="modal-title">Registrar Préstamo</h5>
              <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
              <input type="hidden" name="persona_id" value="<?= $persona['persona_id'] ?>">

              <div class="form-group">
                <label>Usuario:</label>
                <input type="text" class="form-control" value="<?= $persona['nombres'] . ' ' . $persona['apellidos'] ?>" readonly>
              </div>

              <div class="form-group">
                <label>Curso:</label>
                


                <select name="grado_id" class="form-control">
                  <?php foreach ($grados as $grado): ?> <option value="<?= $grado['id_grado'] ?>" <?= isset($persona['grado_id']) && $grado['id_grado'] == $persona['grado_id'] ? 'selected' : '' ?>>
  <?= $grado['curso'] ?> - <?= $grado['paralelo'] ?>
</option>

                  <?php endforeach; ?>
                </select>
                
              </div>

              <div class="form-group">
                <label>Materia:</label>
                <select name="materia_id" class="form-control">
                  <?php foreach ($materias as $materia): ?>
                    <option value="<?= $materia['id_materia'] ?>"><?= $materia['nombre_materia'] ?></option>
                  <?php endforeach; ?>
                </select>
              </div>

              <div class="form-group">
                <label>Tipo de recurso:</label>
                <select name="tipo_recurso" class="form-control" onchange="toggleCampos(this.value, <?= $persona['persona_id'] ?>)" required>
                  <option value="">-- Seleccionar --</option>
                  <option value="libro">Libro</option>
                  <option value="herramienta">Herramienta</option>
                </select>
              </div>


              <!-- Sección libro -->
              <div id="camposLibro<?= $persona['persona_id'] ?>" style="display:none;">
                <div class="form-group">
                  <label>Título del libro:</label>
                  <input type="text" name="titulo" class="form-control">
                </div>
                <div class="form-group">
                  <label>Autor:</label>
                  <input type="text" name="nombre_autor" class="form-control">
                </div>
                <div class="form-group">
                  <label>Cantidad:</label>
                  <input type="number" name="cantidad_libros" class="form-control" min="1">
                </div>
                <div class="form-group">
                  <label>Editorial (opcional):</label>
                  <input type="text" name="editorial" class="form-control">
                </div>
                <div class="form-group">
                  <label>Inventario (opcional):</label>
                  <input type="text" name="libro_inventario" class="form-control">
                </div>
              </div>

              <!-- Sección herramienta -->
              <div id="camposHerramienta<?= $persona['persona_id'] ?>" style="display:none;">
                <div class="form-group">
                  <label>Nombre de la herramienta:</label>
                  <input type="text" name="nombre_herramienta" class="form-control">
                </div>
                <div class="form-group">
                  <label>Cantidad:</label>
                  <input type="number" name="cantidad_herramientas" class="form-control" min="1">
                </div>
                <div class="form-group">
                  <label>Inventario (opcional):</label>
                  <input type="text" name="herramienta_inventario" class="form-control">
                </div>
              </div>

              <div class="form-group">
                <label>Fecha de préstamo:</label>
                <input type="date" name="fecha_prestamo" class="form-control" value="<?= date('Y-m-d') ?>">
              </div>

              <div class="form-group">
                <label>Fecha de devolución:</label>
                <input type="date" name="fecha_devolucion" class="form-control">
              </div>
            </div>

            <div class="modal-footer">
              <button type="submit" class="btn btn-success">Registrar</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
  
</tbody>
  </table>
  </div>       

  <script>
function toggleCampos(tipo, personaId) {
  const libroDiv = document.getElementById('camposLibro' + personaId);
  const herramientaDiv = document.getElementById('camposHerramienta' + personaId);

  if (tipo === 'libro') {
    libroDiv.style.display = 'block';
    herramientaDiv.style.display = 'none';
  } else if (tipo === 'herramienta') {
    libroDiv.style.display = 'none';
    herramientaDiv.style.display = 'block';
  } else {
    libroDiv.style.display = 'none';
    herramientaDiv.style.display = 'none';
  }
}
</script>

<script>
    $(function () {
        $(     "language": {
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Usuarios",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Usuarios",
                "infoEmpty": "Mostrando 0 a 0 de 0 ",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Usuarios",
                "infoFiltered": "(Filtrado de _MAX_ total )",
                "infoPostFix": "",
                "thousands": ",",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Usuarios",
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
        })
            dom: 'Bfrtip'

    });
</script>
            </div>
          </div>
        </div>
      </div>
    </div>

<!-- Otros scripts -->

<script src="<?= APP_URL ?>/public/js/datatables-init.js"></script>

<script>
  $(document).ready(function() {
    inicializarTabla('#examplePrestamos');
    inicializarTabla('#examplePrestamosHerramientas');
    inicializarTabla('#example1');
  });
</script>

<?php include('../../admin/layout/parte2.php'); ?>
<?php include('../../layout/mensajes.php'); ?>
</body>
</html>