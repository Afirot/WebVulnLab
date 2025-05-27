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
            <form action="timeBased.php" method="get">
                <label>Introduzca una flag valida</label>
                <input name="flag" type="text"/>
                <input class="buscar" type="submit" value="Comprobar Flag">
            </form>
        </div>
        <?php
        try {
            $resultado = $conexion->query($consulta);
            $flag = $resultado->fetch(PDO::FETCH_ASSOC);
            
            if (isset($flag['flag'])) {
                $estado = "Flag valida";
            } else {
                $estado = "Flag no valida";
            }
        } catch (PDOException $ex) {
            //En caso de error, no devuelbe nada
        }
        ?>
    </body>
</html>