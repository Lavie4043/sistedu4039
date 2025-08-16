<?php
include ('../../../app/config.php');
include ('../../../admin/layout/mensajes.php');

$id_materia = $_POST['id_materia'];



    $sentencia = $pdo->prepare("DELETE FROM materias WHERE id_materia=:id_materia");

    
    $sentencia->bindParam('id_materia',$id_materia);    

    try{
        if($sentencia->execute()){
            session_start();
            $_SESSION['mensaje'] = "se eliminó la materia de manera correcta";
            $_SESSION['icono'] = "success";
            header('Location:'.APP_URL."/admin/materias");
            }else{
                session_start();
                $_SESSION['mensaje'] = "No se pudo eliminar la materia correctamente. Comuniquese con el administrador";
                $_SESSION['icono'] = "error";
                header('Location:'.APP_URL."/admin/materias");
            }
        
            
        

}catch(Exception $exception) {
    session_start();
    $_SESSION['mensaje'] = "No se pudo eliminar la materia correctamente. Comuniquese con el administrador";
    $_SESSION['icono'] = "error";
    header('Location:'.APP_URL."/admin/materias");
}


    

    