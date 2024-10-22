<?php
include ('../../../../app/config.php');

$gestion = $_POST['gestion'];
$estado = $_POST['estado'];
if($estado =="ACTIVO"){
    $estado = 1;

}else{
    $estado = 0;
}

$sentencia = $pdo->prepare('INSERT INTO gestiones
            (gestion,fyh_creacion, estado)
VALUES ( :gestion,:fyh_creacion,:estado)');

$sentencia->bindParam(':gestion',$gestion);
$sentencia->bindParam('fyh_creacion',$fechaHora);
$sentencia->bindParam('estado',$estado);

if($sentencia->execute()){
    session_start();
    $_SESSION['mensaje'] = "se registró la gestión educativa correctamente";
    $_SESSION['icono'] = "success";
    header('Location:'.APP_URL."/admin/configuraciones/gestion");
//header('Location:' .$URL.'/');
}else{
    session_start();
    $_SESSION['mensaje'] = "no se pudo registrar en la gestión educativa en la base de datos";
    $_SESSION['icono'] = "error";
    ?><script>window.history.back();</script><?php
    
}