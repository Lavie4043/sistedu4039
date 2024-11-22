<?php
$sql_asignaciones = "SELECT * FROM asignaciones as asi
INNER JOIN preceptores as pre ON pre.id_preceptore = asi.preceptore_id 
INNER JOIN personas as per ON per.id_persona = pre.persona_id 
INNER JOIN usuarios as usu ON usu.id_usuario = per.usuario_id 
INNER JOIN niveles as niv ON niv.id_nivel = asi.nivel_id 
INNER JOIN grados as gra On gra.id_grado = asi.grado_id 



WHERE asi.estado = '1' ";

$query_asignaciones = $pdo->prepare($sql_asignaciones);
$query_asignaciones->execute();
$asignaciones = $query_asignaciones->fetchAll(PDO::FETCH_ASSOC);

 




