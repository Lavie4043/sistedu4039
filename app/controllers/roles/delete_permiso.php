<?php
include ('../../../app/config.php');
include ('../../../admin/layout/mensajes.php');

$id_permiso = $_POST['id_permiso'];



    $sentencia = $pdo->prepare("DELETE FROM permisos WHERE id_permiso=:id_permiso");

    
    $sentencia->bindParam('id_permiso',$id_permiso);    

    
    try{
        if($sentencia->execute()){
            session_start();
            $_SESSION['mensaje'] = "se eliminó el permiso de manera correcta";
            $_SESSION['icono'] = "success";
            header('Location:'.APP_URL."/admin/roles/permisos.php");
            }else{
                session_start();
                $_SESSION['mensaje'] = "No se pudo eliminar el permiso correctamente. Comuniquese con el administrador";
                $_SESSION['icono'] = "error";
                header('Location:'.APP_URL."/admin/roles/permisos.php");
            }
    
    
    }catch(Exception $exception){
        session_start();
        $_SESSION['mensaje'] = "No se pudo eliminar el permiso porque este registro existe en otras tablas";
        $_SESSION['icono'] = "error";
        header('Location:'.APP_URL."/admin/roles/permisos.php");
    }