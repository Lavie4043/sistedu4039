<?php
$sql_calificaciones = "SELECT 
    cal.*, 
    mat.nombre_materia, 
    est.localidad
FROM calificaciones AS cal
INNER JOIN materias AS mat ON mat.id_materia = cal.materia_id
INNER JOIN estudiantes AS est ON est.id_estudiante = cal.estudiante_id
WHERE cal.estado = '1'";

$query_calificaciones = $pdo->prepare($sql_calificaciones);
$query_calificaciones->execute();
$calificaciones = $query_calificaciones->fetchAll(PDO::FETCH_ASSOC);
?>
    
   


