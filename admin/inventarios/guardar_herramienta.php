<?php
include('../../app/config.php');

$nombre_recurso = $_POST['nombre_recurso'];
$tipo_recurso = $_POST['tipo_recurso'];
$subtipo_recurso = $_POST['subtipo_recurso'] ?? ''; // interceptamos el subtipo
$caracteristicas = $_POST['caracteristicas'] ?? '';
$caracteristicas_final = $subtipo_recurso . ' | ' . $caracteristicas; // empaquetado visual

$stock = $_POST['stock'];
$fyh_creacion = date("Y-m-d H:i:s");
$fyh_actualizacion = date("Y-m-d H:i:s");

// Asumiendo que biblioteca_id es fija o viene por sesión/contexto
$biblioteca_id = 1;

try {
  $sql = "INSERT INTO inventarios (
    biblioteca_id,
    tipo_recurso,
    nombre_recurso,
    caracteristicas,
    stock,
    fyh_creacion,
    fyh_actualizacion
  ) VALUES (
    :biblioteca_id,
    :tipo_recurso,
    :nombre_recurso,
    :caracteristicas,
    :stock,
    :fyh_creacion,
    :fyh_actualizacion
  )";

  $query = $pdo->prepare($sql);
  $query->bindParam(':biblioteca_id', $biblioteca_id);
  $query->bindParam(':tipo_recurso', $tipo_recurso);
  $query->bindParam(':nombre_recurso', $nombre_recurso);
  $query->bindParam(':caracteristicas', $caracteristicas_final); // usamos el empaquetado
  $query->bindParam(':stock', $stock);
  $query->bindParam(':fyh_creacion', $fyh_creacion);
  $query->bindParam(':fyh_actualizacion', $fyh_actualizacion);

  $query->execute();

  // 🎉 Log celebratorio
  header('Location: inventario.php?mensaje=guardado');
} catch (PDOException $e) {
  error_log("❌ Error al guardar herramienta: " . $e->getMessage());
  die("Error al guardar herramienta.");
}
?>