<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include('../../app/config.php');

include('../../admin/layout/parte1.php'); // encabezado
include('../../admin/layout/parte2.php'); // cierre

$sql = "SELECT mp.*, e.nombre_completo, e.fecha_ultimo_contacto
        FROM materias_pendientes mp
        JOIN egresados e ON mp.id_egresado = e.id_egresado
        ORDER BY mp.fecha_mesa DESC";

        $query = $pdo->prepare($sql);
$query->execute();
$materias = $query->fetchAll(PDO::FETCH_ASSOC);

         
          
         ?>

<div class="content-wrapper">
    <br>
   <!-- Main content -->
    <div class="content">
      <div class="container">

      <div class="row">
          <h1>Materias Egresados</h1>
          <div class="col-md-12">
          <?php
          if (isset($_GET['mensaje']) && $_GET['mensaje'] == 'materia') {
              echo "<div class='alert alert-success alert-dismissible'>
                      <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                      <h5><i class='icon fas fa-check'></i> ¡Éxito!</h5>
                      Materia guardada correctamente.
                    </div>";
          }
          ?>
        </div>


        <div class="row">
          <div class="col-md-12">
            <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title">Materias egresados</h3>
                <div class="card-tools">
                  
                  <a href="create_materias_pendientes.php" class="btn btn-primary"><i class="bi bi-plus-square"></i>Crear nueva materia</a>
                
                </div>
            </div>

                                    
              
        <div class="card-body">
      <table class="table table-hover table-dark table-bordered table" id="materiasegresadosTable">
        <thead>
          <tr>
            <th>Egresado</th>
            <th>Nombre Materias</th>
            <th>Profesor a cargo</th>
            <th>Horarios</th>
            <th>Fecha mesa</th>
            <th>Estado</th>
            <th>Último contacto chatbot</th>
          </tr>
        </thead>
        <tbody>

       
    <?php foreach ($materias as $fila): ?>
      <tr>
        <td><?= htmlspecialchars($fila['nombre_completo']) ?></td>
        <td><?= htmlspecialchars($fila['materia']) ?></td>
        <td><?= htmlspecialchars($fila['docente_asignado']) ?></td>
        <td><?= htmlspecialchars($fila['horario_consulta']) ?></td>
        <td><?= htmlspecialchars(date('d/m/Y', strtotime($fila['fecha_mesa']))) ?></td>
        <td>
          <?php
            $estado = $fila['estado_materia'];
            if ($estado == 'pendiente') echo "<span class='badge badge-warning'>Pendiente</span>";
            elseif ($estado == 'en curso') echo "<span class='badge badge-info'>En curso</span>";
            elseif ($estado == 'aprobada') echo "<span class='badge badge-success'>Aprobada</span>";
            else echo "<span class='badge badge-secondary'>Desconocido</span>";
          ?>
        </td>
        <td>
          <?php
            if (!empty($fila['fecha_ultimo_contacto'])) {
              echo date('d/m/Y H:i', strtotime($fila['fecha_ultimo_contacto']));
            } else {
              echo "<span class='text-muted'>Sin contacto</span>";
            }
          ?>
        </td>
        <td class="text-center">
    <a href="seguimiento.php?id_egresado=<?= urlencode($fila['id_egresado']) ?>" class="btn btn-info btn-sm mx-1">Seguimiento</a>
    <a href="cargar_material.php?id_materia_pendiente=<?= urlencode($fila['id_materia_pendiente']) ?>" class="btn btn-success btn-sm mx-1">Cargar material</a>


</td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<script>
    