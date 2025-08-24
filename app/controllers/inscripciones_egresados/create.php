<?php
include('../../config.php'); // conexión a la base

// Capturar datos del formulario
$dni = $_POST['dni'];
$nombre = $_POST['nombre_completo'];
$anio = $_POST['anio_egreso'];
$telefono = $_POST['telefono'];
$estado_contacto = $_POST['estado_contacto'];

// Validación básica
if (empty($dni) || empty($nombre) || empty($anio)) {
    echo "❌ Faltan datos obligatorios.";
    exit;
}

// Insertar en la base
$sql = "INSERT INTO egresados (dni, nombre_completo, anio_egreso, telefono, estado_contacto)
        VALUES (:dni, :nombre, :anio, :telefono, :estado_contacto)";

$query = $pdo->prepare($sql);
$query->bindParam(':dni', $dni);
$query->bindParam(':nombre', $nombre);
$query->bindParam(':anio', $anio);
$query->bindParam(':telefono', $telefono);
$query->bindParam(':estado_contacto', $estado_contacto);

if ($query->execute()) {
    // Redirección con mensaje
    header("Location: " . APP_URL . "/admin/inscripciones_egresados/index_egresados.php?mensaje=egresado_guardado");
    exit;
} else {
    echo "❌ Error al guardar el egresado.";
}
?>