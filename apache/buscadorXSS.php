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
        <div class="buscador">
            <form action="buscadorXSS.php" method="get">
                <input name="search" type="text"/>
                <input class="buscar" type="submit" value="Buscar">
            </form>

        </div>
        <?php
        
        $resultados = consulta_store_bien($conexion);
        if (isset($_GET['search'])) {
            $search = $_GET['search'];
            echo "<h2>Resultados de $search</h2><br>";
            //echo "<h2>Resultados de" . htmlspecialchars($search) . "</h2>";
        }
        ?>
        <div class="productos-container">
        <?php
        try {


            foreach ($resultados as $producto) {
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