<?php
include('../../../app/config.php');

$id_grado = $_POST['id_grado'];
$nivel_id = $_POST['nivel_id'];
$curso = $_POST['curso'];
$paralelo = $_POST['paralelo'];

$sentencia = $pdo->prepare('UPDATE grados
SET nivel_id=:nivel_id,
    curso=:curso,
    paralelo=:paralelo, 
    fyh_actualizacion=:fyh_actualizacion

WHERE id_grado=:id_grado');

$sentencia->bindParam('id_grado',$id_grado);
$sentencia->bindParam(':nivel_id',$nivel_id);
$sentencia->bindParam(':curso',$curso);
$sentencia->bindParam(':paralelo',$paralelo);
$sentencia->bindParam('fyh_actualizacion',$fechaHora);


if($sentencia->execute()){
    session_start();
    $_SESSION['mensaje'] = "se actualizó el grado correctamente";
    $_SESSION['icono'] = "success";
    header('Location:'.APP_URL."/admin/grados");
//header('Location:' .$URL.'/');
}else{
    session_start();
    $_SESSION['mensaje'] = "no se pudo actualizar el grado en la base de datos";
    $_SESSION['icono'] = "error";
    ?><script>window.history.back();</script><?php
    
}