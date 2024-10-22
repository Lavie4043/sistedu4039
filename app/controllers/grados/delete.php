<?php
include ('../../../app/config.php');


$id_grado = $_POST['id_grado'];



    $sentencia = $pdo->prepare("DELETE FROM grados WHERE id_grado=:id_grado");

    
    $sentencia->bindParam('id_grado',$id_grado);    

try{
    if($sentencia->execute()){
        session_start();
        $_SESSION['mensaje'] = "se eliminó el nivel de manera correcta";
        $_SESSION['icono'] = "success";
        header('Location:'.APP_URL."/admin/grados");
        }else{
            session_start();
            $_SESSION['mensaje'] = "No se pudo eliminar la gestión. Comuniquese con el administrador";
            $_SESSION['icono'] = "error";
            header('Location:'.APP_URL."/admin/grados");
        }

}catch(Exception $exception){
    session_start();
            $_SESSION['mensaje'] = "No se pudo eliminar en la base de datos porque existe este registro en otras tablas";
            $_SESSION['icono'] = "error";
            header('Location:'.APP_URL."/admin/grados");

}


    








