<?php
include('../../../app/config.php');

$id_preceptore = $_POST['id_preceptore'];
$id_nivel = $_POST['id_nivel'];
$id_grado = $_POST['id_grado'];


$sentencia = $pdo->prepare('INSERT INTO asignacionesprece
       (  preceptore_id, nivel_id, grado_id, fyh_creacion, estado)
VALUES ( :preceptore_id,:nivel_id, :grado_id, :fyh_creacion,:estado)');


$sentencia->bindParam(':preceptore_id',$id_preceptore);
$sentencia->bindParam(':nivel_id',$id_nivel);
$sentencia->bindParam(':grado_id',$id_grado);

$sentencia->bindParam('fyh_creacion',$fechaHora);
$sentencia->bindParam('estado',$estado_de_registro);

if($sentencia->execute()){
    session_start();
    $_SESSION['mensaje'] = "se registró la asignación del curso correctamente";
    $_SESSION['icono'] = "success";
    header('Location:'.APP_URL."/admin/preceptores/asignacion.php");
//header('Location:' .$URL.'/');
}else{
    session_start();
    $_SESSION['mensaje'] = "no se pudo registrar  en la base de datos";
    $_SESSION['icono'] = "error";
    ?><script>window.history.back();</script><?php
    
}