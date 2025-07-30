<?php
include('../../../app/config.php');

$nombre_materia = $_POST['nombre_materia'];
$id_materia = $_POST['id_materia'];

$sentencia = $pdo->prepare('UPDATE materias
SET nombre_materia=:nombre_materia,
    fyh_actualizacion=:fyh_actualizacion
    
WHERE id_materia=:id_materia');

$sentencia->bindParam('id_materia',$id_materia);
$sentencia->bindParam('nombre_materia',$nombre_materia);
$sentencia->bindParam('fyh_actualizacion',$fechaHora);


if($sentencia->execute()){
    session_start();
    $_SESSION['mensaje'] = "se actualizó la materia correctamente";
    $_SESSION['icono'] = "success";
    header('Location:'.APP_URL."/admin/materias");
//header('Location:' .$URL.'/');
}else{
    session_start();
    $_SESSION['mensaje'] = "no se pudo actualizar la materia en la base de datos";
    $_SESSION['icono'] = "error";
    ?><script>window.history.back();</script><?php
    
}