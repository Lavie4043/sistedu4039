<?php
include ('../../../app/config.php');

$id_rol = $_POST['id_rol'];

$sentencia = $pdo->prepare("DELETE FROM roles WHERE id_rol=:id_rol");
        
$sentencia->bindParam('id_rol',$id_rol);    

try{
    if($sentencia->execute()){
        session_start();
        $_SESSION['mensaje'] = "se eliminó el rol de manera correcta";
        $_SESSION['icono'] = "success";
        header('Location:'.APP_URL."/admin/roles");
        }else{
            session_start();
            $_SESSION['mensaje'] = "No se pudo eliminar el rol correctamente. Comuniquese con el administrador";
            $_SESSION['icono'] = "error";
            header('Location:'.APP_URL."/admin/roles");
        }


}catch(Exception $exception){
    session_start();
    $_SESSION['mensaje'] = "No se pudo eliminar el rol porque este registro existe en otras tablas";
    $_SESSION['icono'] = "error";
    header('Location:'.APP_URL."/admin/roles");
}