<?php
$sql_asignacionesprece = "SELECT * FROM asignacionesprece as asp
INNER JOIN preceptores as pre ON pre.id_preceptore = asp.preceptore_id 
INNER JOIN personas as per ON per.id_persona = pre.persona_id 
INNER JOIN usuarios as usu ON usu.id_usuario = per.usuario_id 
INNER JOIN niveles as niv ON niv.id_nivel = asp.nivel_id 
INNER JOIN grados as gra On gra.id_grado = asp.grado_id 


WHERE asp.estado = '1' ";

$query_asignacionesprece = $pdo->prepare($sql_asignacionesprece);
$query_asignacionesprece->execute();
$asignacionesprece = $query_asignacionesprece->fetchAll(PDO::FETCH_ASSOC);