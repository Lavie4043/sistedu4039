<?php


?>
<!-- CSS de DataTables -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

<!-- jQuery (requerido por DataTables) -->
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

<!-- JS de DataTables -->
 <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
 <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">

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
include('../../app/controllers/inventarios/listado_de_inventarios.php');


include('../../app/controllers/bibliotecas/prestamos_detallados_herramientas.php');
include('../../app/controllers/bibliotecas/prestamos_por_tipo.php');


?>

<div class="row justify-content-center">
  <div class="col-auto">
    <h1 class="text-center">INVENTARIO</h1>
  </div>
</div>

<div class="row mb-4">
  <div class="col-md-12">
    <div class="card card-outline card-primary">
      <div class="card-header">
  <h3 class="card-title">INVENTARIO</h3>
  <div class="card-tools">
    <button class="btn btn-primary btn" data-toggle="modal" data-target="#modalHerramienta">
      ➕ Herramienta
    </button>
  </div>
</div>

      <div class="card-body d-flex justify-content-center">
        <div class="table-responsive" style="max-width: 1000px; width: 100%; margin: auto;">
          <table id="exampleInventario" class="table table-hover table-dark table-bordered table-sm text-center datatable">
  <thead>
    <tr>
      <th>N°</th>
      <th>Tipo recurso</th>
      <th>Subtipo</th>
      <th>Nombre Recurso</th>
      <th>Cantidad</th>
      <th>Caracteristicas</th>
      
      <th>Acción</th>
    </tr>
  </thead>
  <tbody>
    <?php $contador = 1; ?>
<?php foreach ($inventarios as $inventario): ?>
  <tr>
    <?php
  $partes = explode(' | ', $inventario['caracteristicas']);
  $subtipo = $partes[0] ?? '—';
  $carac = $partes[1] ?? $inventario['caracteristicas'];
?>

  <td><?= $contador++ ?></td>
  <td><?= $inventario['tipo_recurso'] ?></td>
  <td><?= $subtipo ?></td> <!-- Subtipo extraído -->
  <td><?= $inventario['nombre_recurso'] ?></td>
  <td><?= $inventario['stock'] ?></td>
  <td><?= $carac ?></td> <!-- Características limpias -->

  <td><?= $inventario['id_inventario'] ?? '❌ Sin ID' ?></td>

  
  <td>
  <a href="editar.php?id=<?= $inventario['id'] ?>" class="btn btn-sm btn-warning">Editar</a> </td>
</tr>
    
<?php endforeach; ?>
  </tbody>
</table>
        </div>
      </div>
    </div>
  </div>
</div>



<!-- Scripts: jQuery primero, luego DataTables, luego tu script -->

<script src="public/plugins/datatables/dataTables.buttons.min.js"></script>
<script src="public/plugins/datatables/buttons.html5.min.js"></script>
<script src="public/plugins/datatables/buttons.print.min.js"></script>
<script src="public/plugins/datatables/buttons.colVis.min.js"></script>

<!-- Script personalizado -->
<script>
  $(document).ready(function () {
    console.log("✅ DataTable inicializado");
    console.log("🧪 Script de DataTable activado");
    $('#exampleInventario').DataTable({
      order: [[2, 'asc']], // 👉 columna 2 = Subtipo
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
      responsive: true,
      lengthChange: true,
      autoWidth: false,
      buttons: [
        {
          extend: 'collection',
          text: 'Reportes',
          buttons: ['copy', 'pdf', 'csv', 'excel', 'print']
        },
        {
          extend: 'colvis',
          text: 'Visor de columnas'
        }
      ],
      dom: 'Bfrtip'
    });
  });
</script>

 

<?php include('../../admin/layout/parte2.php'); ?>
<?php include('../../layout/mensajes.php'); ?>

<!-- Modal: Ingreso de Herramienta -->
<div class="modal fade" id="modalHerramienta" tabindex="-1" role="dialog" aria-labelledby="modalHerramientaLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <form action="guardar_herramienta.php" method="POST" id="formHerramienta">
      <div class="modal-content">
        <div class="modal-header bg-primary text-white">
          <h5 class="modal-title" id="modalHerramientaLabel">Ingresar nueva herramienta</h5>
          <button type="button" class="close text-white" data-dismiss="modal" aria-label="Cerrar">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
          <div class="form-group">
            <label for="nombre_recurso">Nombre de la herramienta</label>
            <input type="text" class="form-control" name="nombre_recurso" required>
          </div>

  <div class="form-group">
  <label for="tipo_recurso">Tipo de recurso</label>
  <input type="text" class="form-control" name="tipo_recurso" value="Herramienta" readonly>
</div>

<div class="form-group">
  <label for="subtipo_recurso">Subtipo</label>
  <select class="form-control" name="subtipo_recurso">
    <option value="Mapas pizarrón">Mapas pizarrón</option>
    <option value="Mapas pequeños">Mapas pequeños</option>
    <option value="Sonido">Sonido</option>
    <option value="Instrumentos">Instrumentos</option>
    <option value="Librería">Librería</option>
    <option value="Material de Trazado">Material de Trazado</option>
    <option value="Calculadoras">Calculadoras</option>
    <option value="Tablet">Tablet</option>
    <option value="Juegos">Juegos</option>
    <option value="Cables">Cables</option>
    <option value="Otros">Otros</option>
  </select>
</div>


          <div class="form-group">
            <label for="stock">Cantidad</label>
            <input type="number" class="form-control" name="stock" min="1" required>
          </div>

          <div class="form-group">
            <label for="caracteristicas">Características</label>
            <input type="text" class="form-control" name="caracteristicas">
          </div>


          
                
            
          

        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Guardar herramienta</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        </div>
      </div>
    </form>
  </div>
</div>
</body>
</html>