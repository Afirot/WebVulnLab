<?php

//La siguiente forma de definir la conexion supone una mala practica grave, pues usa al usuario root de la db para todas las 
//acciones de la base de datos, incumpliendo el principio del privilegio minimo
$servidor = 'lamp-mariaDB-1';
$usuario = 'root';
$clave = 'Contraseca1234';
$database = 'dvdba_db';

$conexion = new PDO("mysql:host=$servidor;dbname=$database", $usuario, $clave, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
/* 
//La siguiente funcion es un ejemplo de una solucion que cumple el principio del minimo privilegio y que se puede utilizar en todas las aplicaciones
function conexion($usuario, $clave) {
    $servidor = 'lamp-mariaDB-1';
    $database = 'dvdba_db';

    return new PDO("mysql:host=$servidor;dbname=$database", $usuario, $clave, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
}

$conexion = conexion('user_store', 'password_store'); //Ejemplo de llamada

 */