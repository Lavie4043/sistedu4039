<?php
function obtenerPrestamosHerramientas($pdo) {
    $sql = "SELECT 
        b.id_biblioteca,
        b.tipo_recurso,
        b.fecha_prestamo,
         b.estado_entrega,
        b.fecha_devolucion,
        b.nombre_herramienta,
        b.cantidad_herramientas,
        b.herramienta_inventario,
        p.ci,
        p.nombres,
        p.apellidos,
        g.curso,
        g.paralelo,
        m.nombre_materia
    FROM bibliotecas AS b
    JOIN personas AS p ON p.id_persona = b.persona_id
    JOIN grados AS g ON g.id_grado = b.grado_id
    JOIN materias AS m ON m.id_materia = b.materia_id
    WHERE b.estado_entrega IS NOT NULL
    ORDER BY b.fecha_prestamo DESC";

  

    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}