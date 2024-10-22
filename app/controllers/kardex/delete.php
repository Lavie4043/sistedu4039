<?php

include('../../../app/config.php');



$id_kardex = $_POST['id_kardex'];

$sentencia = $pdo->prepare("DELETE FROM kardexs WHERE id_kardex=:id_kardex");

    
$sentencia->bindParam('id_kardex',$id_kardex);    


if($sentencia->execute()){
    session_start();
    $_SESSION['mensaje'] = "se eliminó la notificación de manera correcta";
    $_SESSION['icono'] = "success";
    header('Location:'.APP_URL."/admin/kardex");
    }else{
        session_start();
        $_SESSION['mensaje'] = "No se pudo la notificación correctamente. Comuniquese con el administrador";
        $_SESSION['icono'] = "error";
        header('Location:'.APP_URL."/admin/kardex");
    }