<?php
include('../../../app/config.php');

$id_asignacionprece = $_POST['id_asignacionprece'];
$id_nivel =      $_POST['id_nivel'];
$id_grado =      $_POST['id_grado'];



$sentencia = $pdo->prepare('UPDATE asignacionesprece
SET nivel_id=:nivel_id,
    grado_id=:grado_id,
    
    fyh_actualizacion=:fyh_actualizacion
    
WHERE id_asignacionprece=:id_asignacionprece');


$sentencia->bindParam(':nivel_id',$id_nivel);
$sentencia->bindParam(':grado_id',$id_grado);

$sentencia->bindParam(':fyh_actualizacion',$fechaHora);
$sentencia->bindParam(':id_asignacionprece',$id_asignacionprece);



if($sentencia->execute()){
    session_start();
    $_SESSION['mensaje'] = "se actualizó la asignación correctamente";
    $_SESSION['icono'] = "success";
    header('Location:'.APP_URL."/admin/preceptores/asignacion.php");

}else{
    session_start();
    $_SESSION['mensaje'] = "no se pudo actualizar la asignación en la base de datos";
    $_SESSION['icono'] = "error";
    ?><script>window.history.back();</script><?php
    
}