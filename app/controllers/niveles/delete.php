<?php
include ('../../../app/config.php');


$id_nivel = $_POST['id_nivel'];



    $sentencia = $pdo->prepare("DELETE FROM niveles WHERE id_nivel=:id_nivel");

    
    $sentencia->bindParam('id_nivel',$id_nivel);    

try{
    if($sentencia->execute()){
        session_start();
        $_SESSION['mensaje'] = "se eliminó el nivel de manera correcta";
        $_SESSION['icono'] = "success";
        header('Location:'.APP_URL."/admin/niveles");
        }else{
            session_start();
            $_SESSION['mensaje'] = "No se pudo eliminar la gestión. Comuniquese con el administrador";
            $_SESSION['icono'] = "error";
            header('Location:'.APP_URL."/admin/niveles");
        }

}catch(Exception $exception){
    session_start();
            $_SESSION['mensaje'] = "No se pudo eliminar en la base de datos porque existe este registro en otras tablas";
            $_SESSION['icono'] = "error";
            header('Location:'.APP_URL."/admin/niveles");

}


    






