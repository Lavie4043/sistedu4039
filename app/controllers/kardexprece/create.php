<?php

include('../../../app/config.php');

$preceptore_id = $_POST['preceptore_id'];
$fecha = $_POST['fecha'];
$estudiante_id = $_POST['estudiante_id'];

$observacion = $_POST['observacion'];



$nota = $_POST['nota'];




if($_FILES['file']['name'] !=null){
    $nombre_del_archivo = date('Y-m-d-H-i-s').$_FILES['file']['name'];
    $location = "../../../public/images/kardexprece/".$nombre_del_archivo;
    move_uploaded_file($_FILES['file']['tmp_name'],$location);
    $documentoprece= $nombre_del_archivo;

}else{
    $documentoprece = "";

}




$sentencia = $pdo->prepare('INSERT INTO kardexsprece 
        (preceptore_id, estudiante_id, fecha, observacion, documentoprece, nota, fyh_creacion, estado)
VALUES  ( :preceptore_id, :estudiante_id, :fecha, :observacion, :documentoprece, :nota,  :fyh_creacion, :estado)');


$sentencia->bindParam(':preceptore_id',$preceptore_id);
$sentencia->bindParam(':estudiante_id',$estudiante_id);
$sentencia->bindParam(':fecha',$fecha);
$sentencia->bindParam(':observacion',$observacion);
$sentencia->bindParam(':documentoprece',$documentoprece);
$sentencia->bindParam(':nota',$nota);

$sentencia->bindParam(':documentoprece',$documentoprece);
$sentencia->bindParam(':nota',$nota);
$sentencia->bindParam(':fyh_creacion',$fechaHora);
$sentencia->bindParam(':estado',$estado_de_registro);





if($sentencia->execute()){
    session_start();
    $_SESSION['mensaje'] = "se registró el reporte correctamente";
    $_SESSION['icono'] = "success";
    header('Location:'.APP_URL."/admin/kardexprece");
//header('Location:' .$URL.'/');
}else{
    session_start();
    $_SESSION['mensaje'] = "no se pudo registrar el reporte en la base de datos";
    $_SESSION['icono'] = "error";
    ?><script>window.history.back();</script><?php
    
}