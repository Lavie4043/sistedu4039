<?php
include ('../../../app/config.php');
include ('../../../admin/layout/mensajes.php');

$id_docente = $_POST['id_docente'];



    $sentencia = $pdo->prepare("DELETE FROM docentes WHERE id_docente=:id_docente");

    
    $sentencia->bindParam('id_docente',$id_docente);    

    try{
        if($sentencia->execute()){
            session_start();
            $_SESSION['mensaje'] = "se eliminó el docente de manera correcta";
            $_SESSION['icono'] = "success";
            header('Location:'.APP_URL."/admin/docentes");
            }else{
                session_start();
                $_SESSION['mensaje'] = "No se pudo eliminar el docente correctamente. Comuniquese con el administrador";
                $_SESSION['icono'] = "error";
                header('Location:'.APP_URL."/admin/docentes");
            }
    
    
    }catch(Exception $exception){
        session_start();
        $_SESSION['mensaje'] = "No se pudo eliminar el docente porque este registro existe en otras tablas";
        $_SESSION['icono'] = "error";
        header('Location:'.APP_URL."/admin/docentes");


    }