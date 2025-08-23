<?php
include('../../app/config.php'); // Ajustá la ruta si hace falta

try {
  // Verificar conexión y base activa
  $stmt = $pdo->query("SELECT DATABASE()");
  $dbName = $stmt->fetchColumn();
  echo "🧠 Base conectada: " . $dbName . "<br>";

  // Verificar existencia de tabla y columna
  $stmt = $pdo->query("SHOW COLUMNS FROM bibliotecas");
  $columnas = $stmt->fetchAll(PDO::FETCH_COLUMN);
  echo "📦 Columnas en 'bibliotecas':<br>";
  echo implode(', ', $columnas) . "<br>";

  // Verificar si hay registros con estado pendiente
  $stmt = $pdo->query("SELECT id_biblioteca, estado_entrega FROM bibliotecas WHERE estado_entrega = 'pendiente' LIMIT 5");
  $registros = $stmt->fetchAll(PDO::FETCH_ASSOC);
  echo "📘 Registros pendientes:<br>";
  foreach ($registros as $r) {
    echo "ID: {$r['id_biblioteca']} | Estado: {$r['estado_entrega']}<br>";
  }

} catch (PDOException $e) {
  echo "❌ Error de conexión o consulta: " . $e->getMessage();
}