<?php

include 'db.php';
include 'functions.php';

$consulta = "DELETE FROM ordenes WHERE id > 15";

$conexion->query($consulta);

?>
<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>DVDBA</title>
        <link rel="stylesheet" href="css/styles.css">
    </head>
    <body>
        <h1>LA BASE DE DATOS HA SIDO REESTABLECIDA A SU ESTADO ORIGINAL</h1>
        <a href="verOrden.php">VOLBER</a>
    </body>
</html>