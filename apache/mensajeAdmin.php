<!doctype html>
<?php
include 'db.php';
include 'functions.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>DVDBA</title>
        <link rel="stylesheet" href="css/styles.css">
    </head>
    <body>
    <div>
        <form method="post" action="mensajeAdmin.php">
            <fieldset>
                <legend>Mensaje</legend>
                <label>email</label><input name="email" type="text"></input><br/>
                <label>Texto</label>
                <textarea name="mensaje"></textarea><br/>
                <input class="acceso" type="submit" value="Enviar">
            </fieldset>
        </form>
        <?php
        
        if (isset($_POST['email']) and isset($_POST['mensaje'])) {
            try {
                enviaMensaje($conexion, $_POST['email'], $_POST['mensaje']);
                //enviaMensaje($conexion, htmlspecialchars($_GET['email']), htmlspecialchars($_GET['mensaje']));
                echo "<p>Mensaje enviado, gracias por confiar en nosotros</p>";
            } catch (PDOexception $ex) {
                echo "Ups, algo a salido mal";
            }
        }
        ?>  
        <a href="mensajes.php">Ver mensajes</a>
    </div>

</body>
</html>