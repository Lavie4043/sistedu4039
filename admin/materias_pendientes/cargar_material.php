<?php
include('../../app/config.php');
include('../../admin/layout/parte1.php');
include('../../admin/layout/parte2.php');
include('../../layout/mensajes.php');

$idMateria = $_GET['id_materia_pendiente'] ?? null;

ini_set('display_errors', 1);
error_reporting(E_ALL);

if (!$idMateria) {
    echo "⚠️ No se especificó una materia pendiente.";
    exit;
}

$stmt = $pdo->prepare("SELECT materia FROM materias_pendientes WHERE id_materia_pendiente = ?");
$stmt->execute([$idMateria]);
$materiaData = $stmt->fetch(PDO::FETCH_ASSOC);
$nombreMateria = isset($materiaData['materia']) ? $materiaData['materia'] : 'Materia no definida';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $_POST['titulo_material'] ?? '';
    $url = $_POST['url_archivo'] ?? '';
    $tipo = $_POST['tipo_material'] ?? '';
    $tiposValidos = ['pdf', 'video', 'imagen', 'link', 'doc', 'docx', 'txt'];

    if (!in_array($tipo, $tiposValidos)) {
        echo "<div style='color:red;'>❌ Tipo de material no válido</div>";
        exit;
    }

    $archivo = $_FILES['archivo_material'] ?? null;

    if ($archivo && $archivo['error'] === UPLOAD_ERR_OK) {
        $nombreOriginal = basename($archivo['name']);
        $extension = pathinfo($nombreOriginal, PATHINFO_EXTENSION);
        $nombreSeguro = uniqid('material_') . '.' . $extension;
        $rutaDestino = '../../public/images/' . $nombreSeguro;

        if (move_uploaded_file($archivo['tmp_name'], $rutaDestino)) {
            $url = '/public/images/' . $nombreSeguro;
            $origen = 'archivo';
        } else {
            echo "<div style='color:red;'>❌ Error al mover el archivo</div>";
            $origen = 'url';
        }
    } else {
        $origen = 'url';
    }

    $idUsuario = $_SESSION['id_usuario'] ?? 0;
    $observaciones = 'Carga inicial desde módulo de materias pendientes';

    if ($titulo && $tipo && $url) {
        $stmt = $pdo->prepare("INSERT INTO materiales_docente 
            (id_materia_pendiente, titulo_material, url_archivo, tipo_material, origen_material, id_usuario, observaciones) 
            VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$idMateria, $titulo, $url, $tipo, $origen, $idUsuario, $observaciones]);

        echo "<div style='background:#d4edda;padding:10px;border-left:5px solid #28a745;margin-top:20px;'>";
        echo "🎉 Material cargado con éxito";
        echo "</div>";
    } else {
        echo "<div style='color:red;'>⚠️ Faltan datos para cargar el material</div>";
    }
}
?>

<div class="content-wrapper">
  <br>
  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col">
          <h1>Carga de material</h1>
        </div>
      </div>

      <div class="row justify-content-center">
        <div class="col-md-10">
          <div class="card card-outline card-primary">
            <div class="card-header">
              <h2>✍️ Cargar material para <strong><?= htmlspecialchars($nombreMateria) ?></strong> (Materia pendiente #<?= htmlspecialchars($idMateria) ?>)</h2>
            </div>

            <div class="card-body">
              <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                  <label>Título del Material:</label>
                  <input type="text" class="form-control" name="titulo_material" required>
                </div>

                <div class="form-group">
                  <label>Suba el documento desde su PC:</label>
                  <input type="file" class="form-control-file" name="archivo_material" id="file">
                </div>

                <div class="form-group">
                  <label>O ingrese una URL externa (YouTube, Drive, etc.):</label>
                  <input type="text" class="form-control" name="url_archivo">
                </div>

                <div class="form-group">
                  <label>Tipo de Material:</label>
                  <select class="form-control" name="tipo_material" required>
                    <option value="pdf">PDF</option>
                    <option value="video">Video</option>
                    <option value="imagen">Imagen</option>
                    <option value="link">Link</option>
                    <option value="doc">Doc</option>
                    <option value="Docx">Docx</option>
                    <option value="txt">Txt</option>
                  </select>
                </div>

                <button type="submit" class="btn btn-primary">📎 Subir material</button>
              </form>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
        <script>
              function archivo(evt) {
                  var files = evt.target.files; // FileList object
             
                  // Obtenemos la imagen del campo "file".
                  for (var i = 0, f; f = files[i]; i++) {
                    //Solo admitimos imágenes.
                    if (!f.type.match('image.*')) {
                        continue;
                    }
             
                    var reader = new FileReader();
             
                    reader.onload = (function(theFile) {
                        return function(e) {
                          // Insertamos la imagen
                         // Insertamos la imagen
                         document.getElementById("list").innerHTML = ['<img class="thumb" src="', e.target.result,'" width="300px" title="', escape(theFile.name), '"/>'].join('');
                        };
                    })(f);
             
                    reader.readAsDataURL(f);
                  }
              }
             
              document.getElementById('file').addEventListener('change', archivo, false);
      </script>

        