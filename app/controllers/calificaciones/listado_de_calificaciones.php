<?php
<<<<<<< HEAD
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
    
   


=======

$sql_calificaciones = "SELECT * FROM calificaciones as cal
INNER JOIN materias as mat ON mat.id_materia = cal.materia_id
WHERE cal.estado = '1' ";

$query_calificaciones = $pdo->prepare($sql_calificaciones);
$query_calificaciones->execute();
$calificaciones = $query_calificaciones->fetchAll(fetch_style: PDO::FETCH_ASSOC);
>>>>>>> b293d0af06a5c19534cfa1d275279fd522e5cdb8
