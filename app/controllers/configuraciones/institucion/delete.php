<?php
include ('../../../../app/config.php');


$id_config_institucion = $_POST['id_config_institucion'];



    $sentencia = $pdo->prepare("DELETE FROM configuracion_instituciones WHERE id_config_institucion=:id_config_institucion");

    
    $sentencia->bindParam('id_config_institucion' ,$id_config_institucion);    

    if($sentencia->execute()){
    session_start();
    $_SESSION['mensaje'] = "se eliminó la institución de manera correcta";
    $_SESSION['icono'] = "success";
    header('Location:'.APP_URL."/admin/configuraciones/institucion");
    }else{
        session_start();
        $_SESSION['mensaje'] = "No se pudo eliminar la institución correctamente. Comuniquese con el administrador";
        $_SESSION['icono'] = "error";
        header('Location:'.APP_URL."/admin/configuraciones/institucion");
    }




