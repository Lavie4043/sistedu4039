<?php
include('../../app/config.php');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$idMateria = $_GET['id_materia_pendiente'] ?? null;

if (!$idMateria) {
    header("Location: index.php?id_materia_pendiente=" . urlencode($idMateria));
exit;
    
}

// Consulta de materiales
$stmt = $pdo->prepare("SELECT * FROM materiales_docentes WHERE id_materia_pendiente = ?");
$stmt->execute([$idMateria]);
$materiales = $stmt->fetchAll();
$stmt->execute([$idMateria, $titulo, $url, $tipo]);


?>


<h2>📚 Materiales para materia pendiente #<?= htmlspecialchars($idMateria) ?></h2>

<?php if (count($materiales) === 0): ?>
    <p>No hay materiales cargados aún.</p>
<?php else: ?>
    <a href="cargar.php?id_materia_pendiente=<?= htmlspecialchars($idMateria) ?>" class="btn btn-primary btn-sm" style="margin-bottom: 15px;">
    ✍️ Cargar nuevo material
</a>
    <table border="1" cellpadding="5">
        <tr>
            <th>Título</th>
            <th>Tipo</th>
            <th>Archivo</th>
            <th>Fecha de subida</th>
        </tr>
        <?php
echo "<div style='background:#f0f8ff;padding:10px;border-left:5px solid #007bff;margin-bottom:15px;'>";
echo "<h4>🔍 Inspección visual de carga</h4>";

echo "<p>📌 ID materia pendiente: <strong>" . htmlspecialchars($idMateria) . "</strong></p>";
echo "<p>📦 Materiales encontrados: <strong>" . count($materiales) . "</strong></p>";

if (count($materiales) > 0) {
    echo "<ul>";
    foreach ($materiales as $mat) {
        echo "<li>📄 <strong>" . htmlspecialchars($mat['titulo_material']) . "</strong> | Tipo: " . htmlspecialchars($mat['tipo_material']) . " | <a href='" . htmlspecialchars($mat['url_archivo']) . "' target='_blank'>Ver archivo</a></li>";
    }
    echo "</ul>";
} else {
    echo "<p>⚠️ No hay materiales cargados aún.</p>";
}

echo "</div>";
?>
        <?php foreach ($materiales as $mat): ?>
            <tr>
                <td><?= htmlspecialchars($mat['titulo_material']) ?></td>
                <td><?= htmlspecialchars($mat['tipo_material']) ?></td>
                <td><a href="<?= htmlspecialchars($mat['url_archivo']) ?>" target="_blank">Ver</a></td>
                <td><?= htmlspecialchars($mat['fecha_subida']) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php endif; ?>