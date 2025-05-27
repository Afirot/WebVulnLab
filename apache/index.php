<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>DVDBA</title>
        <link rel="stylesheet" href="css/styles.css">
    </head>
    <body>
        <h1>INYECCION SQL</h1>
        <div class="container">
            <a href="login.php" class="link-card">
                <img src="img/login.png" />
                <div class="text-content">
                    <h3>Pagina de Login</h3>
                    <ul>
                        <li>Bypass login</li>
                        <li>Explotacion de la logica de la aplicacion</li>
                    </ul>
                </div>
            </a>

            <a href="store.php" class="link-card">
                <img src="img/store.png" />
                <div class="text-content">
                    <h3>Tienda</h3>
                    <ul>
                        <li>Exfiltracion de datos de la propia tabla</li>
                        <li>Sentencia UNION</li>
                        <li>Exfiltracion de datos de otras tablas</li>
                    </ul>
                </div>
            </a>

            <a href="flag.php" class="link-card">
                <img src="img/flag.png" />
                <div class="text-content">
                    <h3>Pagina que permite introducir una flag</h3>
                    <ul>
                        <li>Blind SQLI condicional</li>
                        <li>Fuerza bruta</li>
                        <li>Scripting python</li>
                    </ul>
                </div>
            </a>
            <a href="errorFlag.php" class="link-card">
                <img src="img/errorFlag.png" />
                <div class="text-content">
                    <h3>Flag de seguimiento Error visual</h3>
                    <li>Error based SQLI visual</li>
                </div>
            </a>
            <a href="errorCondFlag.php" class="link-card">
                <img src="img/errorCondFlag.png" />
                <div class="text-content">
                    <h3>Flag de seguimiento Error condicional</h3>
                    <li>Error based SQLI condicional</li>
                    <li>Fuerza bruta</li>
                    <li>Scripting python</li>
                </div>
            </a>
            <a href="timeBased.php" class="link-card">
                <img src="img/timeBased.png" />
                <div class="text-content">
                    <h3>Flag de seguimiento sin error</h3>
                    <li>Time based SQLI condicional</li>
                    <li>Fuerza bruta</li>
                    <li>Scripting python</li>
                </div>
            </a>
            <a href="orden.php" class="link-card">
                <img src="img/orden.png" />
                <div class="text-content">
                    <h3>Pagina de soporte</h3>
                    <li>Second order sqli</li>
                </div>
            </a>
        </div>
        <h1>CROSS SITE SCRIPTING</h1>
            

        <div class="container">
            <a href="buscadorXSS.php" class="link-card">
                <img src="img/buscadorXSS.png" />
                <div class="text-content">
                    <h3>Buscador XSS</h3>
                    <li>Reflected XSS</li>
                </div>
            </a>    
            <a href="mensajeAdmin.php" class="link-card">
                <img src="img/mensajeAdmin.png" />
                <div class="text-content">
                    <h3>Mensaje al Administrador</h3>
                    <li>Stored XSS</li>
                </div>
            </a>
        </div>
    </body>
</html>