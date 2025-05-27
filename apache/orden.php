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
                    
                    foreach ($clientes as $cliente){
                        echo '<option value="'. $cliente['id'] .'">' . $cliente['nombre'] . '</option>';
                    }
                    ?>
                    </select><br/>
                    <label>Producto</label>
                    <select name="producto">
                    <?php
                    $productos = datos_productos($conexion);
                    
                    foreach ($productos as $producto){
                        echo '<option value="'. $producto['id'] .'">' . $producto['nombre'] . '</option>';
                    }
                    ?>
                    </select>
                    <input class="Crear orden" type="submit" value="ENTRAR">

                </fieldset>
            </form>
        </div>
    </body>
</html>
