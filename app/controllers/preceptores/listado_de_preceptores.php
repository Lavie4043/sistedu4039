<?php
$sql_preceptores = "SELECT * FROM usuarios as usu 
INNER JOIN roles as rol ON rol.id_rol = usu.rol_id 
INNER JOIN personas as per ON per.usuario_id = usu.id_usuario 
INNER JOIN preceptores as pre On pre.persona_id = per.id_persona WHERE pre.estado = '1' ";

$query_preceptores = $pdo->prepare($sql_preceptores);
$query_preceptores->execute();
$preceptores = $query_preceptores->fetchAll(PDO::FETCH_ASSOC);


