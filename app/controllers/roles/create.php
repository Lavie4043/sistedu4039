<?php
include ('../../../app/config.php');
$nombre_rol = $_POST['nombre_rol'];
if($nombre_rol == ""){
    session_start();
    $_SESSION['mensaje'] = "Llene el campo nombre del rol";
    $_SESSION['icono'] = "error";
    header('Location:'.APP_URL."/admin/roles/create.php");

}else{
    $sentencia = $pdo->prepare("INSERT INTO roles 
    (nombre_rol, fyh_creacion, estado) 
    VALUES (:nombre_rol, :fyh_creacion, :estado)");

    $sentencia->bindParam('nombre_rol',$nombre_rol);
    $sentencia->bindParam('fyh_creacion',$fechaHora);
    $sentencia->bindParam('estado',$estado_de_registro);    

    try{
        if($sentencia->execute()){
            session_start();
            $_SESSION['mensaje'] = "se registró el rol de manera correcta";
            $_SESSION['icono'] = "success";
            header('Location:'.APP_URL."/admin/roles");
            }else{
                session_start();
                $_SESSION['mensaje'] = "No se registraron los datos correctamente. Comuniquese con el administrador";
                $_SESSION['icono'] = "error";
                header('Location:'.APP_URL."/admin/roles/create.php");
            }

    }catch(Exception $Exception){
        session_start();
                $_SESSION['mensaje'] = "Este rol ya existe en la base de datos";
                $_SESSION['icono'] = "error";
                header('Location:'.APP_URL."/admin/roles/create.php");
        
    }

    
}


