<?php
include ('../../../../app/config.php');
include ('../../../../admin/layout/mensajes.php');

$id_gestion = $_POST['id_gestion'];



    $sentencia = $pdo->prepare("DELETE FROM gestiones WHERE id_gestion=:id_gestion");

    
    $sentencia->bindParam('id_gestion',$id_gestion);    

try{
    if($sentencia->execute()){
        session_start();
        $_SESSION['mensaje'] = "se eliminó la gestión de manera correcta";
        $_SESSION['icono'] = "success";
        header('Location:'.APP_URL."/admin/configuraciones/gestion");
        }else{
            session_start();
            $_SESSION['mensaje'] = "No se pudo eliminar la gestión. Comuniquese con el administrador";
            $_SESSION['icono'] = "error";
            header('Location:'.APP_URL."/admin/configuraciones/gestion");
        }

}catch(Exception $exception){
    session_start();
            $_SESSION['mensaje'] = "No se pudo eliminar en la base de datos porque existe este registro en otras tablas";
            $_SESSION['icono'] = "error";
            header('Location:'.APP_URL."/admin/configuraciones/gestion");

}


    






