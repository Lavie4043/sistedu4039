<?php
include ('../../../app/config.php');
include ('../../../admin/layout/mensajes.php');

$id_administrativo = $_POST['id_administrativo'];



    $sentencia = $pdo->prepare("DELETE FROM administrativos WHERE id_administrativo=:id_administrativo");

    
    $sentencia->bindParam('id_administrativo',$id_administrativo);    

    try{
        if($sentencia->execute()){
            session_start();
            $_SESSION['mensaje'] = "se eliminó el administrativo de manera correcta";
            $_SESSION['icono'] = "success";
            header('Location:'.APP_URL."/admin/administrativos");
            }else{
                session_start();
                $_SESSION['mensaje'] = "No se pudo eliminar el administrativo correctamente. Comuniquese con el administrador";
                $_SESSION['icono'] = "error";
                header('Location:'.APP_URL."/admin/administrativos");
            }
    
    
    }catch(Exception $exception){
        session_start();
        $_SESSION['mensaje'] = "No se pudo eliminar el administrativo porque este registro existe en otras tablas";
        $_SESSION['icono'] = "error";
        header('Location:'.APP_URL."/admin/administrativos");


    }