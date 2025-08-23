<?php
$sql_inventarios = "SELECT
    inv.id_inventario AS id_inventario,
    inv.tipo_recurso,
    inv.nombre_recurso,
    inv.caracteristicas,
    inv.stock
    
FROM bibliotecas AS bib
JOIN inventarios AS inv ON inv.biblioteca_id = bib.id_biblioteca
WHERE id_biblioteca = 1";

try {
  $query_inventarios = $pdo->prepare($sql_inventarios);
  $query_inventarios->execute();
  $inventarios = $query_inventarios->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
  error_log("❌ Error en inventario: " . $e->getMessage());
  die("Error al cargar inventario.");
}



