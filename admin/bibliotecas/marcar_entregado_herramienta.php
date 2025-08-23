<?php
include('../../app/config.php');
$id = $_POST['id_herramienta'];

try {
  $sql = "UPDATE bibliotecas SET estado_entrega = 'entregada' WHERE id_biblioteca = :id";
  $stmt = $pdo->prepare($sql);

  if (!$stmt) {
    $errorInfo = $pdo->errorInfo();
    echo '❌ error_prepare: ' . $errorInfo[2];
    exit;
  }

  $resultado = $stmt->execute([':id' => $id]);

  if ($resultado) {
    echo 'ok';
  } else {
    $errorInfo = $stmt->errorInfo();
    echo '❌ error_execute: ' . $errorInfo[2];
  }
} catch (PDOException $e) {
  echo '❌ error_db: ' . $e->getMessage();
}