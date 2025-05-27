<!doctype html>
<?php
include 'db.php';
include 'functions.php';

$consulta = consulta_login();
?>
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
        <?php
        try {
            //Ejecuta la consulta VULNERABLE
            $resultado = $conexion->query($consulta);
            $user = $resultado->fetch();
            //Si la consulta devuelbe algo, entonces, da un mensaje de bienvenido
            if (isset($user['nombre'])) {
                echo "<div class='successfull'>";
                echo "Bienvenido ", $user['nombre'];
                echo "</div>";
            //En caso de que la consulta no devuelba nada, no dejara pasar.
            } else {
                echo "<div class='unsuccessfull'>";
                echo "Usuario o contraseña incorrectos";
                echo "</div>";
            }
        } catch (PDOException $ex) {
            http_response_code(500);
            echo "<div class='error'>";
            echo "<h2>Error interno del servidor.</h2>";
            echo "</div>";
            exit();
        }
        ?>
        <div>
            <form method="post" action="authenticate.php">
                <fieldset>
                    <legend>Login</legend>
                    <label>Username<br/> </label><input name="user" type="text"></input><br/>
                    <label>Password<br/> </label><input name="pass" type="password"></input><br/>
                    <input class="acceso" type="submit" value="ENTRAR">
                </fieldset>
            </form>
        </div>
    </body>
</html>