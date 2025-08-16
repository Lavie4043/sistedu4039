<?php

$sql_kardexsestudiante = "SELECT * FROM kardexsestudiante as kap
INNER JOIN estudiantes as est On est.id_estudiante = kap.estudiante_id 
INNER JOIN personas as per ON per.id_persona = est.persona_id 
INNER JOIN usuarios as usu ON usu.id_usuario = est.usuario_id 

INNER JOIN preceptores as pre On pre.id_preceptore = kap.preceptore_id
";



$query_kardexsprece = $pdo->prepare($sql_kardexsprece);
$query_kardexsprece->execute();
$kardexsprece = $query_kardexsprece->fetchAll(PDO::FETCH_ASSOC);