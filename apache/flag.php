<?php
include 'db.php';
include 'functions.php';

$consulta = consulta_flag();
?>
<!doctype html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>DVDBA</title>
        <link rel="stylesheet" href="css/styles.css">
    </head>
    <body>

        <div class="consulta">
            <?php
            echo $consulta;
            ?>
        </div>
        <div class="flag">
            <form action="validacion.php" method="get">
                <label>Introduzca una flag valida</label>
                <input name="flag" type="text"/>
                <input class="buscar" type="submit" value="Comprobar Flag">
            </form>
        </div>

    </body>
</html>