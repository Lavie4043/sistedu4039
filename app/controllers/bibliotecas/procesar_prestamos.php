<?php
// ⚠️ Nada antes del <?php, ni espacios ni saltos de línea
include('../../../app/config.php');
session_start(); // 🔹 Necesario para usar $_SESSION

$persona_id = $_POST['persona_id'];
$grado_id = $_POST['grado_id'];
$materia_id = $_POST['materia_id'];
$tipo_recurso = $_POST['tipo_recurso'];
$fecha_prestamo = $_POST['fecha_prestamo'];
$fecha_devolucion = $_POST['fecha_devolucion'];

try {
    if ($tipo_recurso === 'libro') {
        $titulo = $_POST['titulo'];
        $autor = $_POST['nombre_autor'];
        $cantidad = $_POST['cantidad_libros'];
        $editorial = $_POST['editorial'];
        $inventario = $_POST['libro_inventario'];

        $sql = "INSERT INTO bibliotecas
                (persona_id, grado_id, materia_id, titulo, autor, cantidad_libros, editorial, inventario_libros, fecha_prestamo, fecha_devolucion)
                VALUES (:persona_id, :grado_id, :materia_id, :titulo, :autor, :cantidad_libros, :editorial, :inventario_libros, :fecha_prestamo, :fecha_devolucion)";
        
        $stmt = $pdo->prepare($sql);
        if ($tipo_recurso === 'libro') {
    $titulo = $_POST['titulo'];
    $nombre_autor = $_POST['nombre_autor'];
    $cantidad_libros = $_POST['cantidad_libros'];
    $editorial = $_POST['editorial'];
    $libro_inventario = $_POST['libro_inventario'];
    $fyh_creacion = date('Y-m-d H:i:s');

    $sql = "INSERT INTO bibliotecas (
        persona_id, grado_id, materia_id,
        nombre_autor, titulo, editorial, libro_inventario,
        estado_entrega, fecha_prestamo, fecha_devolucion,
        tipo_recurso, fyh_creacion, cantidad_libros
    ) VALUES (
        :persona_id, :grado_id, :materia_id,
        :nombre_autor, :titulo, :editorial, :libro_inventario,
        :estado_entrega, :fecha_prestamo, :fecha_devolucion,
        :tipo_recurso, :fyh_creacion, :cantidad_libros
    )";

    $stmt = $pdo->prepare($sql);
    if (!$stmt->execute([
        ':persona_id' => $persona_id,
        ':grado_id' => $grado_id,
        ':materia_id' => $materia_id,
        ':nombre_autor' => $nombre_autor,
        ':titulo' => $titulo,
        ':editorial' => $editorial,
        ':libro_inventario' => $libro_inventario,
        ':estado_entrega' => 'pendiente',
        ':fecha_prestamo' => $fecha_prestamo,
        ':fecha_devolucion' => $fecha_devolucion,
        ':tipo_recurso' => 'libro',
        ':fyh_creacion' => $fyh_creacion,
        ':cantidad_libros' => $cantidad_libros
    ])) {
        throw new PDOException("Error al registrar libro");
    }
}

    } elseif ($tipo_recurso === 'herramienta') {
        $nombre_herramienta = $_POST['nombre_herramienta'];
        $cantidad_herramienta = $_POST['cantidad_herramientas'];
        $herramienta_inventario = $_POST['herramienta_inventario'];

        $sql = "INSERT INTO bibliotecas 
                (persona_id, grado_id, materia_id, nombre_herramienta, cantidad_herramientas, herramienta_inventario, fecha_prestamo, fecha_devolucion)
                VALUES (:persona_id, :grado_id, :materia_id, :nombre_herramienta, :cantidad_herramientas, :herramienta_inventario, :fecha_prestamo, :fecha_devolucion)";
        
        $stmt = $pdo->prepare($sql);
        if (!$stmt->execute([
            ':persona_id' => $persona_id,
            ':grado_id' => $grado_id,
            ':materia_id' => $materia_id,
            ':nombre_herramienta' => $nombre_herramienta,
            ':cantidad_herramientas' => $cantidad_herramientas,
            ':herramienta_inventario' => $herramienta_inventario,
            ':fecha_prestamo' => $fecha_prestamo,
            ':fecha_devolucion' => $fecha_devolucion
        ])) {
            throw new PDOException("Error al registrar herramienta");
        }
    }

    $_SESSION['mensaje'] = "✅ Préstamo registrado correctamente";
    $_SESSION['icono'] = "success";
    header("Location: " . APP_URL . "/admin/bibliotecas/bibliotecas.php");
    exit();

} catch (PDOException $e) {
    $_SESSION['mensaje'] = "❌ Error al registrar el préstamo: " . $e->getMessage();
    $_SESSION['icono'] = "error";
    echo "<script>window.history.back();</script>";
}