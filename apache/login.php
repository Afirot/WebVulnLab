<!doctype html>
<html>
    <?php
    include 'db.php';
    include 'functions.php';
    $consulta = consulta_login();
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
            <form class="busqueda" method="post" action="authenticate.php">
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