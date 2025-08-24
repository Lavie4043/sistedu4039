<?php
// En config.php o antes del include de parte1.php
if (!defined('APP_NAME')) {
    define('APP_NAME', 'Sistema Educativo 4039');
}

if (!defined('APP_URL')) {
    define('APP_URL', 'http://localhost/educativo4039');
}


// Parámetros de conexión
$servidor = "mysql:host=localhost;dbname=esc4039";
$usuario = "root";
$password = "";

try {
    // Crear conexión PDO
    $pdo = new PDO($servidor, $usuario, $password, array(
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
    ));

    // Opcional: activar modo de errores
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Prueba básica
    $stmt = $pdo->query("SELECT 1");
    //echo "✅ Conexión y consulta básica OK";
} catch (PDOException $e) {
    //echo "❌ Error en conexión: " . $e->getMessage();
    exit();
}