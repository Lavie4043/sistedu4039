<?php
include ('../../../app/config.php');
include ('../../../admin/layout/mensajes.php');

$id_usuario = $_POST['id_usuario'];



    $sentencia = $pdo->prepare("DELETE FROM usuarios WHERE id_usuario=:id_usuario");

    
    $sentencia->bindParam('id_usuario',$id_usuario);    

    try{
        if($sentencia->execute()){
            session_start();
            $_SESSION['mensaje'] = "se eliminó el usuario de manera correcta";
            $_SESSION['icono'] = "success";
            header('Location:'.APP_URL."/admin/usuarios");
            }else{
                session_start();
                $_SESSION['mensaje'] = "No se pudo eliminar el usuario correctamente. Comuniquese con el administrador";
                $_SESSION['icono'] = "error";
                header('Location:'.APP_URL."/admin/usuarios");
            }
    
    
    }catch(Exception $exception){
        session_start();
        $_SESSION['mensaje'] = "No se pudo eliminar el usuario porque este registro existe en otras tablas";
        $_SESSION['icono'] = "error";
        header('Location:'.APP_URL."/admin/usuarios");


    }
