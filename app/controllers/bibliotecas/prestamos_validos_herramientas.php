<?php
$sql = "SELECT * FROM bibliotecas WHERE estado_entrega IS NOT NULL";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$biblioteca = $stmt->fetchAll(PDO::FETCH_ASSOC);