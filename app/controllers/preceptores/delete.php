<?php
include ('../../../app/config.php');
include ('../../../admin/layout/mensajes.php');

$id_preceptore = $_POST['id_preceptore'];



    $sentencia = $pdo->prepare("DELETE FROM preceptores WHERE id_preceptore=:id_preceptore");

    
    $sentencia->bindParam('id_preceptore',$id_preceptore);    

    try{
        if($sentencia->execute()){
            session_start();
            $_SESSION['mensaje'] = "se eliminó al preceptor de manera correcta";
            $_SESSION['icono'] = "success";
            header('Location:'.APP_URL."/admin/preceptores");
            }else{
                session_start();
                $_SESSION['mensaje'] = "No se pudo eliminar al preceptor correctamente. Comuniquese con el administrador";
                $_SESSION['icono'] = "error";
                header('Location:'.APP_URL."/admin/preceptores");
            }
    
    
    }catch(Exception $exception){
        session_start();
        $_SESSION['mensaje'] = "No se pudo eliminar al preceptor porque este registro existe en otras tablas";
        $_SESSION['icono'] = "error";
        header('Location:'.APP_URL."/admin/preceptores");


    }