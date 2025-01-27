<?php

$sql_kardexsprece = "SELECT * FROM kardexsprece as kap
INNER JOIN preceptores as pre On pre.id_preceptore = kap.preceptore_id 
INNER JOIN personas as per ON per.id_persona = pre.persona_id 
INNER JOIN usuarios as usu ON usu.id_usuario = per.usuario_id 

INNER JOIN estudiantes as est On est.id_estudiante = kap.estudiante_id
";



$query_kardexsprece = $pdo->prepare($sql_kardexsprece);
$query_kardexsprece->execute();
$kardexsprece = $query_kardexsprece->fetchAll(PDO::FETCH_ASSOC);

