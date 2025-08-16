<?php

include('../../../app/config.php');



$id_kardexprece = $_POST['id_kardexprece'];

$sentencia = $pdo->prepare("DELETE FROM kardexsprece WHERE id_kardexprece=:id_kardexprece");

    
$sentencia->bindParam('id_kardexprece',$id_kardexprece);    


if($sentencia->execute()){
    session_start();
    $_SESSION['mensaje'] = "se eliminó la notificación de manera correcta";
    $_SESSION['icono'] = "success";
    header('Location:'.APP_URL."/admin/kardexprece");
    }else{
        session_start();
        $_SESSION['mensaje'] = "No se pudo la notificación correctamente. Comuniquese con el administrador";
        $_SESSION['icono'] = "error";
        header('Location:'.APP_URL."/admin/kardex");
    }