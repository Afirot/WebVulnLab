<!doctype html>
<html>
    <?php
    include 'db.php';
    include 'functions.php';
    $consulta = registra_orden();
    ?>
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
        <div>
            <form class="busqueda" method="get" action="ordenInsert.php">
                <fieldset>
                    <legend>Introduzca la orden</legend>
                    <label>Nombre Orden<br/> </label><input name="nombre" type="text"></input><br/>
                    <label>Cliente</label><br/>
                    <select name="cliente">
                        <?php
                        $clientes = datos_clientes($conexion);

                        foreach ($clientes as $cliente) {
                            echo '<option value="' . $cliente['id'] . '">' . $cliente['nombre'] . '</option>';
                        }
                        ?>
                    </select><br/>
                    <label>Producto</label>
                    <select name="producto">
                        <?php
                        $productos = datos_productos($conexion);

                        foreach ($productos as $producto) {
                            echo '<option value="' . $producto['id'] . '">' . $producto['nombre'] . '</option>';
                        }
                        ?>
                    </select>
                    <input class="Crear orden" type="submit" value="ENTRAR">

                </fieldset>
            </form>
        </div>
        <?php
        try {
            $consulta = $consulta = "INSERT INTO `ordenes` (`nombre`, `id_cliente`, `id_producto`)"
                    . " VALUES (:nombre, :id_cliente, :id_producto);";
            $insert = $conexion->prepare($consulta);

            $insert->bindParam(':nombre', $_GET['nombre']);
            $insert->bindParam(':id_cliente', $_GET['cliente']);
            $insert->bindParam(':id_producto', $_GET['producto']);
            $insert->execute();
            echo "La orden se inserto con exito <a href='verOrden.php'>Ver ordenes</a>";
        } catch (PDOException $ex) {
            echo "La orden no pudo ser insertada <a href='verOrden.php'>Ver ordenes</a>";
        }
            ?>
         <?php
         /*CONSULTA NO  VULNERABLE
        try {
            $consulta = $consulta = "INSERT INTO `ordenes` (`nombre`, `id_cliente`, `id_producto`)"
                    . " VALUES (:nombre, :id_cliente, :id_producto);";
            $insert = $conexion->prepare($consulta);

            $insert->bindParam(':nombre', htmlspecialchars($_GET['nombre']));
            $insert->bindParam(':id_cliente',  htmlspecialchars($_GET['cliente']));
            $insert->bindParam(':id_producto',  htmlspecialchars($_GET['producto']));
            $insert->execute();
            echo "La orden se inserto con exito <a href='verOrden.php'>Ver ordenes</a>";
        } catch (PDOException $ex) {
            echo "La orden no pudo ser insertada <a href='verOrden.php'>Ver ordenes</a>";
        }
           */?>
    </body>
</html>