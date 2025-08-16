<?php
$sql_bibliotecas = "SELECT
  per.id_persona AS persona_id,
  per.ci,
  per.nombres,
  per.apellidos,
  r.nombre_rol AS rol,
  gra.id_grado AS id_grado,
  CONCAT(niv.nivel, ' ', gra.curso) AS curso,
  gra.paralelo AS paralelo,
  niv.nivel
FROM personas AS per
JOIN usuarios AS usu ON usu.id_usuario = per.usuario_id
JOIN roles AS r ON r.id_rol = usu.rol_id
LEFT JOIN estudiantes AS est ON est.persona_id = per.id_persona
LEFT JOIN grados AS gra ON gra.id_grado = est.grado_id
LEFT JOIN niveles AS niv ON niv.id_nivel = gra.nivel_id";

$query_bibliotecas = $pdo->prepare($sql_bibliotecas);
$query_bibliotecas->execute();
$bibliotecas = $query_bibliotecas->fetchAll(PDO::FETCH_ASSOC);
