<?php
include 'db.php';
include 'functions.php';

$consulta = consulta_store();
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
        <div class="buscador">
            <form action="store.php" method="get">
                <input name="search" type="text"/>
                <input class="buscar" type="submit" value="Buscar">
            </form>

        </div>
        <div class="productos-container">
            <?php
            try {

                //Para evitar errores, indico que, si hay algo en search, y si ese algo no es un espacio en blanco, se ejecute 
                //Es siguiente codigo, en caso contrario, no debe hacer nada
                if (isset($_GET['search'])) {
                    if (!$_GET['search'] == "") {
                        $resultado = $conexion->query($consulta);

                        while ($producto = $resultado->fetch(PDO::FETCH_ASSOC)) {
                            $id = htmlspecialchars($producto['id']);
                            $nombre = htmlspecialchars($producto['nombre']);
                            $descripcion = htmlspecialchars($producto['descripcion']);
                            $precio = number_format(htmlspecialchars($producto['precio']), 2, ",");
                            $status = htmlspecialchars($producto['status']);

                            echo '<div class="producto">';
                            echo '<h3>' . $nombre . '</h3>';
                            echo '<h5>' . $precio . '€</h5>';
                            echo '<img src="img/store/' . $id . '.png">';
                            echo '<p>' . $descripcion . '</p>';
                            echo '<p>Status: ' . $status . '</p>';
                            echo '</div>';
                        }
                    }
                }
            } catch (PDOException $ex) {
                http_response_code(500);
                echo "<div class='error'>";
                echo "<h2>Error interno del servidor.</h2>";
                echo "</div>";
                exit();
            }
            ?>
        </div>

    </body>
</html>