<?php
include($_SERVER['DOCUMENT_ROOT'] . '/educativo4039/app/config.php');

if (!isset($pdo)) {
    //echo "❌ La conexión \$pdo no está disponible.";
    exit();
}

try {
    $stmt = $pdo->query("SELECT 1");
    //echo "✅ Conexión y consulta básica OK";
} catch (PDOException $e) {
    //echo "❌ Error en consulta: " . $e->getMessage();
}
