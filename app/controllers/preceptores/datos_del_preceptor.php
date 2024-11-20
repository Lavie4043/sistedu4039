<?php
$sql_preceptores = "SELECT * FROM usuarios as usu 
INNER JOIN roles as rol ON rol.id_rol = usu.rol_id 
INNER JOIN personas as per ON per.usuario_id = usu.id_usuario 
INNER JOIN preceptores as pre On pre.persona_id = per.id_persona WHERE pre.estado = '1' AND pre.id_preceptore = '$id_preceptore'";
//AND doc.id_docente = '$id_docente'
$query_preceptores = $pdo->prepare($sql_preceptores);
$query_preceptores->execute();
$preceptores = $query_preceptores->fetchAll(PDO::FETCH_ASSOC);

foreach ($preceptores as $preceptore){
    $id_usuario = $preceptore['id_usuario'];
    $id_persona = $preceptore['id_persona'];
    $id_preceptore = $preceptore['id_preceptore'];

   
    $nombres = $preceptore['nombres'];
    $apellidos = $preceptore['apellidos'];
    $nombre_rol = $preceptore['nombre_rol'];
    $ci = $preceptore['ci'];
    $fecha_nacimiento = $preceptore['fecha_nacimiento'];
    $celular = $preceptore['celular'];
    $direccion = $preceptore['direccion'];
    $profesion = $preceptore['profesion'];
    $email = $preceptore['email'];
    $cargo = $preceptore['cargo'];
    $antiguedad = $preceptore['antiguedad'];
    $fyh_creacion = $preceptore['fyh_creacion'];
    $estado = $preceptore['estado'];

    
}
