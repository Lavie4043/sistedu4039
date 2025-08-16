
<?php
function filtrarPrestamosLibros($array) {
    if (!is_array($array)) return [];
    return array_values(array_filter($array, function($item) {
        return isset($item['tipo_recurso']) &&
               strtolower(trim($item['tipo_recurso'])) === 'libro' &&
               !empty($item['titulo']) &&
               !empty($item['nombre_autor']) &&
               isset($item['cantidad_libros']) &&
               $item['cantidad_libros'] > 0;
    }));
}

function filtrarPrestamosHerramientas($array) {
    if (!is_array($array)) return [];
    return array_values(array_filter($array, function($item) {
        return isset($item['tipo_recurso']) &&
               strtolower(trim($item['tipo_recurso'])) === 'herramienta' &&
               !empty($item['nombre_herramienta']) &&
               isset($item['cantidad_herramientas']) &&
               $item['cantidad_herramientas'] > 0;
    }));
}