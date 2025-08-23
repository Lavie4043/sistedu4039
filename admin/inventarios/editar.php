<?php
include('../../app/config.php'); // conexión a la base
include('../../admin/layout/parte1.php'); // encabezado visual

// Validación del ID recibido
if (!isset($_GET['id']) || empty($_GET['id'])) {
  echo "<div class='alert alert-danger text-center'>❌ No se recibió el ID del inventario.</div>";
  exit();
}

$id_inventario = $_GET['id'];

// Consulta del recurso
$sql = "SELECT * FROM inventarios WHERE id_inventario = :id";
$query = $pdo->prepare($sql);
$query->bindParam(':id', $id_inventario);
$query->execute();
$inventario = $query->fetch(PDO::FETCH_ASSOC);

if (!$inventario) {
  echo "<div class='alert alert-warning text-center'>⚠️ Recurso no encontrado.</div>";
  exit();
}
?>

<div class="container mt-4">
  <h2 class="text-center">Editar recurso</h2>
  <form action="actualizar_inventario.php" method="POST">
    <input type="hidden" name="id_inventario" value="<?= $inventario['id_inventario'] ?>">

    <div class="form-group">
      <label>Nombre del recurso</label>
      <input type="text" name="nombre_recurso" class="form-control" value="<?= $inventario['nombre_recurso'] ?>" required>
    </div>

    <div class="form-group">
      <label>Tipo de recurso</label>
      <input type="text" name="tipo_recurso" class="form-control" value="<?= $inventario['tipo_recurso'] ?>" readonly>
    </div>

    <div class="form-group">
      <label>Subtipo</label>
      <select name="subtipo_recurso" class="form-control">
        <option value="<?= explode(' | ', $inventario['caracteristicas'])[0] ?>"><?= explode(' | ', $inventario['caracteristicas'])[0] ?></option>
        <option value="Mapas pizarrón">Mapas pizarrón</option>
        <option value="Mapas pequeños">Mapas pequeños</option>
        <option value="Sonido">Sonido</option>
        <option value="Instrumentos">Instrumentos</option>
        <option value="Librería">Librería</option>
        <option value="Material de Trazado">Material de Trazado</option>
        <option value="Calculadoras">Calculadoras</option>
        <option value="Tablet">Tablet</option>
        <option value="Juegos">Juegos</option>
        <option value="Cables">Cables</option>
        <option value="Otros">Otros</option>
      </select>
    </div>

    <div class="form-group">
      <label>Cantidad</label>
      <input type="number" name="stock" class="form-control" value="<?= $inventario['stock'] ?>" required>
    </div>

    <div class="form-group">
      <label>Características</label>
      <input type="text" name="caracteristicas" class="form-control" value="<?= explode(' | ', $inventario['caracteristicas'])[1] ?? '' ?>">
    </div>

    <button type="submit" class="btn btn-success">Guardar cambios</button>
    <a href="inventario.php" class="btn btn-secondary">Cancelar</a>
  </form>
</div>

<?php include('../../admin/layout/parte2.php'); ?>