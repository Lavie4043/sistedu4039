<?php
include('../../../app/config.php');

$id_kardexprece =     $_POST['id_kardexprece'];
$preceptore_id =    $_POST['preceptore_id'];
$fecha =         $_POST['fecha'];
$estudiante_id = $_POST['estudiante_id'];

$observacion =   $_POST['observacion'];
$nota =          $_POST['nota'];

if($_FILES['file']['name'] !=null){
    $nombre_del_archivo = date('Y-m-d-H-i-s').$_FILES['file']['name'];
    $location = "../../../public/images/kardexprece/".$nombre_del_archivo;
    move_uploaded_file($_FILES['file']['tmp_name'],$location);
    $documentoprece= $nombre_del_archivo;

}else{
    $documentoprece = "";

}



$sentencia = $pdo->prepare('UPDATE kardexsprece
SET preceptore_id=:preceptore_id,
    estudiante_id=:estudiante_id,
    
    fecha=:fecha, 
    observacion=:observacion, 
    nota=:nota,
    documentoprece=:documentoprece,
    fyh_actualizacion=:fyh_actualizacion
    
WHERE id_kardexprece=:id_kardexprece ');

$sentencia->bindParam(':preceptore_id',$preceptore_id);
$sentencia->bindParam(':estudiante_id',$estudiante_id);

$sentencia->bindParam(':fecha',$fecha);
$sentencia->bindParam(':observacion',$observacion);
$sentencia->bindParam(':nota',$nota);
$sentencia->bindParam(':documentoprece',$documentoprece);
$sentencia->bindParam('fyh_actualizacion',$fyh_actualizacion);
$sentencia->bindParam(':id_kardexprece',$id_kardexprece);

if($sentencia->execute()){
    session_start();
    $_SESSION['mensaje'] = "se actualizó el reporte correctamente";
    $_SESSION['icono'] = "success";
    header('Location:'.APP_URL."/admin/kardexprece");
//header('Location:' .$URL.'/');
}else{
    session_start();
    $_SESSION['mensaje'] = "no se pudo actualizar el reporte en la base de datos";
    $_SESSION['icono'] = "error";
    ?><script>window.history.back();</script><?php
    
}