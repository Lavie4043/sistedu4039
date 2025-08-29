<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

include('../../../app/config.php');

$id_egresado = $_POST['egresado_id'];

for ($i = 1; $i <= 10; $i++) {
  $materia = $_POST["materia$i"] ?? '';
  $docente_asignado = $_POST["docente_asignado$i"] ?? '';
  $horario_consulta = $_POST["horario_consulta$i"] ?? '';
  $fecha_mesa = $_POST["fecha_mesa$i"] ?? '';
  $estado_materia = strtolower(trim($_POST["estado_materia$i"] ?? ''));

$estados_validos = ['pendiente', 'en curso', 'aprobada'];
if (!in_array($estado_materia, $estados_validos)) {
    $estado_materia = 'pendiente'; // valor por defecto
}

  if (!empty($materia)) {
    $sql = "INSERT INTO materias_pendientes 
    (id_egresado, materia, docente_asignado, horario_consulta, fecha_mesa, estado_materia) 
    VALUES (:id_egresado, :materia, :docente_asignado, :horario_consulta, :fecha_mesa, :estado_materia)";

    $query = $pdo->prepare($sql);
    $query->bindParam(':id_egresado', $id_egresado);
    $query->bindParam(':materia', $materia);
    $query->bindParam(':docente_asignado', $docente_asignado);
    $query->bindParam(':horario_consulta', $horario_consulta);
    $query->bindParam(':fecha_mesa', $fecha_mesa);
    $query->bindParam(':estado_materia', $estado_materia);
    $query->execute();
  }
}

// Ahora sí, redirigimos
  header('Location:'.APP_URL."/admin/materias_pendientes?mensaje=materia");