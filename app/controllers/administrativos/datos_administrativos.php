<?php
$sql_administrativos = "SELECT * FROM usuarios as usu 
INNER JOIN roles as rol ON rol.id_rol = usu.rol_id 
INNER JOIN personas as per ON per.usuario_id = usu.id_usuario 
INNER JOIN administrativos as adm On adm.persona_id = per.id_persona WHERE adm.estado = '1' AND adm.id_administrativo = '$id_administrativo'";

$query_administrativos = $pdo->prepare($sql_administrativos);
$query_administrativos->execute();
$administrativos = $query_administrativos->fetchAll(fetch_style: PDO::FETCH_ASSOC);

foreach ($administrativos as $administrativo){
    $id_usuario = $administrativo['id_usuario'];
    $id_persona = $administrativo['id_persona'];
    $id_administrativo = $administrativo['id_administrativo'];

   
    $nombres = $administrativo['nombres'];
    $apellidos = $administrativo['apellidos'];
    $nombre_rol = $administrativo['nombre_rol'];
    $ci = $administrativo['ci'];
    $fecha_nacimiento = $administrativo['fecha_nacimiento'];
    $celular = $administrativo['celular'];
    $profesion = $administrativo['profesion'];
    $direccion = $administrativo['direccion'];
    $email = $administrativo['email'];
    $fyh_creacion = $administrativo['fyh_creacion'];
    $estado = $administrativo['estado'];

    
}



