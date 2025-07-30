<?php


include ('../../../app/config.php');
include ('../../../admin/layout/mensajes.php');

$id_asignacionprece = $_POST['id_asignacionprece'];


$sentencia = $pdo->prepare("DELETE FROM asignacionesprece WHERE id_asignacionprece=:id_asignacionprece");

    
    $sentencia->bindParam('id_asignacionprece',$id_asignacionprece);    

    if($sentencia->execute()){
            session_start();
            $_SESSION['mensaje'] = "se eliminó la asignacion de manera correcta";
            $_SESSION['icono'] = "success";
            header('Location:'.APP_URL."/admin/preceptores/asignacion.php");
            }else{
                session_start();
                $_SESSION['mensaje'] = "No se pudo eliminar la asignacion correctamente. Comuniquese con el administrador";
                $_SESSION['icono'] = "error";
                header('Location:'.APP_URL."/admin/preceptores/asignacion.php");
            }
        
            
        



    

    