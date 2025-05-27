<?php
ob_start();
include 'db.php';
include 'functions.php';
if (!isset($_COOKIE['flag'])) {
    $consulta = "SELECT * FROM flags ORDER BY RAND() LIMIT 1;";
    $resultado = $conexion->query($consulta);
    $flags = $resultado->fetchAll();
    $flag = $flags[0][0];
    setcookie("flag", $flag, time() + 3600, "/", "");
}
?>
<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>DVDBA</title>
        <link rel="stylesheet" href="css/styles.css">
    </head>
    <body>
<?php
$mensajes = mensajes($conexion);

foreach ($mensajes as $mensaje) {
    echo "<div>"
    . "<h2> DE: "
    . $mensaje['email']
    . "</h2>"
    . "<p>"
    . $mensaje['mensaje']
    . "</p>"
    . "<h5>"
    . $mensaje['fecha']
    . "</h5>"
    . "</div>";
}
?>
        <a href="mensajeAdmin.php">Volver</a>
    </body>
</html>