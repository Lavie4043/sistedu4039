<?php
include('../../app/config.php');

// Validación de datos recibidos
if (!isset($_POST['id_inventario'])) {
  echo "<div class='alert alert-danger'>❌ No se recibió el ID del recurso.</div>";
  exit();
}

$id_inventario = $_POST['id_inventario'];
$nombre_recurso = $_POST['nombre_recurso'];
$tipo_recurso = $_POST['tipo_recurso'];
$subtipo_recurso = $_POST['subtipo_recurso'];
$stock = $_POST['stock'];
$caracteristicas = $_POST['caracteristicas'];

// Reconstrucción quirúrgica del campo caracteristicas
$caracteristicas_final = $subtipo_recurso . ' | ' . $caracteristicas;

// Consulta de actualización
$sql = "UPDATE inventarios SET 
  nombre_recurso = :nombre,
  tipo_recurso = :tipo,
  stock = :stock,
  caracteristicas = :caracteristicas
  WHERE id_inventario = :id";

$query = $pdo->prepare($sql);
$query->bindParam(':nombre', $nombre_recurso);
$query->bindParam(':tipo', $tipo_recurso);
$query->bindParam(':stock', $stock);
$query->bindParam(':caracteristicas', $caracteristicas_final);
$query->bindParam(':id', $id_inventario);

if ($query->execute()) {
  echo "<div class='alert alert-success text-center'>✅ Recurso actualizado con éxito.</div>";
  header("refresh:2;url=inventario.php");
} else {
  echo "<div class='alert alert-danger text-center'>❌ Error al actualizar el recurso.</div>";
}
?>