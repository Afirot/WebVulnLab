<!doctype html>
<html>
    <?php
    include 'db.php';
    include 'functions.php';

    //Comenzamos a realizar la consulta no vulnerable que extraera los nombres de la base de datos
    //que suego se usaran en la consulta que SI es vulnerable
    $ordenes = datos_ordenes($conexion);
    ?>
    <head>
        <meta charset="UTF-8">
        <title>DVDBA</title>
        <link rel="stylesheet" href="css/styles.css">
    </head>
    <body>
        <a href="orden.php">Volber</a>
        <a class="reset" href="resetDatabase.php">Reestablecer base de datos</a>
        <div class="ordenes-container">
            <?php
            foreach ($ordenes as $orden) {      
                try{
                    $nombre = $orden['nombre'];
                
                $consulta = "SELECT o.id, o.nombre, p.id, p.nombre, p.status, c.nombre, c.id, c.direccion FROM ordenes o "
                        . "INNER JOIN productos p ON o.id_producto = p.id "
                        . "INNER JOIN clientes c ON c.id = o.id_cliente "
                        . "WHERE o.nombre = '$nombre'";
                
                /*$consulta_bien = "SELECT o.id, o.nombre, p.id, p.nombre, p.status, c.nombre, c.id, c.direccion FROM ordenes o "
                        . "INNER JOIN productos p ON o.id_producto = p.id "
                        . "INNER JOIN clientes c ON c.id = o.id_cliente "
                        . "WHERE o.nombre = :nombre";
                $resultado = $conexion->prepare($consulta_bien);
                
                $resultado->bindParam(':nombre', $nombre);
                
                $datos = $resultado->fetchAll();
                
                $datos = todos_datos($conexion, $nombre);*/
                //var_dump($datos);
                echo '<div class="orden">';
                echo '<div class="consulta">'
                . $consulta
                . '</div>';
                echo '<h2>' . $nombre . '<h2/>';
                echo '<h4> ID ORDEN = ' . $datos['orden_id'] . '</h4>';
                echo '<h3> Cliente = ' . $datos['cliente_nombre'] . '</h3>';
                echo '<h4>' . $datos['cliente_direccion'] . ' </h4>';
                echo '<h3> Producto = ' . $datos['producto_nombre'] . '</h3>';

                echo '</div>';
                } catch (Exception $ex) {
                    
                }
                
            }
            ?>
        </div>
    </body>
</html>