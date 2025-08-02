<?php

define('SERVIDOR','localhost');
define('USUARIO','root');
define('PASSWORD','');

define('BD','esc4039');
define('APP_NAME','SISTEMA DE GESTION ESCOLAR 4039');
define('APP_URL','http://localhost/educativo4039');


define('KEY_API_MAPS','');

$servidor = "mysql:dbname=".BD.";host=".SERVIDOR;

try{
    $pdo = new PDO ($servidor,USUARIO,PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND=> "SET NAMES utf8")); 
    //echo "conexion exitosa a la base de datos";
}catch (PDOException $e){
    echo "error no se pudo conectar a la base de datos";
}

date_default_timezone_set("America/Argentina/Mendoza");
date_default_timezone_get();


$fechaHora= date('Y-m-d H:i:s');
$fecha_actual= date('Y-m-d');
$dia_actual= date('d');
$mes_actual= date('m');
$anio_actual= date('Y');
$estado_de_registro = '1';

