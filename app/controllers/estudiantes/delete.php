<?php
include ('../../../app/config.php');
include ('../../../admin/layout/mensajes.php');

$id_estudiante = $_POST['id_estudiante'];



    $sentencia = $pdo->prepare("DELETE FROM estudiantes WHERE id_estudiante=:id_estudiante");

    
    $sentencia->bindParam('id_estudiante',$id_estudiante);    

    try{
        if($sentencia->execute()){
            session_start();
            $_SESSION['mensaje'] = "se eliminó el estudiante de manera correcta";
            $_SESSION['icono'] = "success";
            header('Location:'.APP_URL."/admin/estudiantes");
            }else{
                session_start();
                $_SESSION['mensaje'] = "No se pudo eliminar el estudiante correctamente. Comuniquese con el administrador";
                $_SESSION['icono'] = "error";
                header('Location:'.APP_URL."/admin/estudiantes");
            }
    
    
    }catch(Exception $exception){
        session_start();
        $_SESSION['mensaje'] = "No se pudo eliminar el estudiante porque este registro existe en otras tablas";
        $_SESSION['icono'] = "error";
        header('Location:'.APP_URL."/admin/estudiantes");


    }