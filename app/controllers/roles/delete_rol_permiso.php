<?php
include ('../../../app/config.php');
include ('../../../admin/layout/mensajes.php');

$id_rol_permiso = $_POST['id_rol_permiso'];



    $sentencia = $pdo->prepare("DELETE FROM roles_permisos WHERE id_rol_permiso=:id_rol_permiso");

    
    $sentencia->bindParam('id_rol_permiso',$id_rol_permiso);    

    
        if($sentencia->execute()){
            session_start();
            $_SESSION['mensaje'] = "se eliminó el permiso de manera correcta";
            $_SESSION['icono'] = "success";
            header('Location:'.APP_URL."/admin/roles");
            }else{
                session_start();
                $_SESSION['mensaje'] = "No se pudo eliminar el permiso correctamente. Comuniquese con el administrador";
                $_SESSION['icono'] = "error";
                header('Location:'.APP_URL."/admin/roles");
            }
        
            
        

    