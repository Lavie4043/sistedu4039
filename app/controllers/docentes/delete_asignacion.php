<?php


include ('../../../app/config.php');
include ('../../../admin/layout/mensajes.php');

$id_asignacion = $_POST['id_asignacion'];


$sentencia = $pdo->prepare("DELETE FROM asignaciones WHERE id_asignacion=:id_asignacion");

    
    $sentencia->bindParam('id_asignacion',$id_asignacion);    

    if($sentencia->execute()){
            session_start();
            $_SESSION['mensaje'] = "se eliminó la asignacion de manera correcta";
            $_SESSION['icono'] = "success";
            header('Location:'.APP_URL."/admin/docentes/asignacion.php");
            }else{
                session_start();
                $_SESSION['mensaje'] = "No se pudo eliminar la asignacion correctamente. Comuniquese con el administrador";
                $_SESSION['icono'] = "error";
                header('Location:'.APP_URL."/admin/docentes/asignacion.php");
            }
        
            
        



    

    