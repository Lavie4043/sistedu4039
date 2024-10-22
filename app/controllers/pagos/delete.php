<?php
include ('../../../app/config.php');


$id_pago = $_POST['id_pago'];



    $sentencia = $pdo->prepare("DELETE FROM pagos WHERE id_pago=:id_pago");

    
    $sentencia->bindParam('id_pago',$id_pago);    


    if($sentencia->execute()){
        session_start();
        $_SESSION['mensaje'] = "se eliminó el pago de manera correcta";
        $_SESSION['icono'] = "success";
        header('Location:'.APP_URL."/admin/pagos");
        }else{
            session_start();
            $_SESSION['mensaje'] = "No se pudo eliminar el pago correctamente. Comuniquese con el administrador";
            $_SESSION['icono'] = "error";
            header('Location:'.APP_URL."/admin/pagos");
        }
    

    
    