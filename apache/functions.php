<?php

//////////////////////////////////////////SQL INYECTION//////////////////////////////////////////////////
//ESta es una consulta vulnerable para las pantallas de login
//Vulnerable
function consulta_login() {
    if (isset($_POST['user'])) {
        $from_user = $_POST['user'];
    } else {
        $from_user = '__USERNAME__';
    }

    if (isset($_POST['pass'])) {
        $from_pass = $_POST['pass'];
    } else {
        $from_pass = '__PASSWORD__';
    }

    //Esta es la parte vulnerable, no se usa bind param para procesar los imput dados por los usuarios, lo cual
    //causa que este imput entre como parte del codigo y no como texto plano.
    return $consulta = "SELECT id, nombre FROM usuarios WHERE nombre = '$from_user' AND password = '$from_pass';";
}
//Version no vulnerable de la anterior funcion
/*
function consulta_login_bien() {
    if (isset($_POST['user'])) {
        $from_user = $_POST['user'];
    } else {
        $from_user = '__USERNAME__';
    }

    if (isset($_POST['pass'])) {
        $from_pass = $_POST['pass'];
    } else {
        $from_pass = '__PASSWORD__';
    }

    //Definimos la consulta usando variables de PDO
    $consulta = "SELECT id, nombre FROM usuarios WHERE nombre = :user AND password = :pass;";
     //Preparamos la consulta
    $resultado = $conexion->prepare($consulta);
    
    //Entregamos los datos de los imput a la consulta
    $resultado->bindParam(':user', $from_user);
    $resultado->bindParam(':pass', $from_pass);
    
    //Ejecutamos la consulta, permitiendo que el usuario mas adelante la utiliza como guste
    
    return $resultado->execute();
}*/

//Esta sera la consulta para las tiendas
//Vulnerable
function consulta_store() {

    if (isset($_GET['search'])) {
        $from_store =  $_GET['search'];
    } else {
        $from_store = '__BUSQUEDA__';
    }

    //Se introduce el imput directamente a la consulta, sin filtrar ni sanitizar nada
    return $consulta = "SELECT id, nombre, precio, descripcion, status FROM store WHERE nombre LIKE '%$from_store%' AND status = '1'";
}


//Esta sera la consulta para las tiendas
//NO VULNERABLE
function consulta_store_bien($conexion) {

    if (isset($_GET['search'])) {
        $from_store = '%' . $_GET['search'] . '%';
    } else {
        $from_store = '__BUSQUEDA__';
    }

    //Se define la consulta
    $consulta = "SELECT id, nombre, precio, descripcion, status FROM store WHERE nombre LIKE :search AND status = '1'";
    
    //Preparamos la consulta
    $resultado = $conexion->prepare($consulta);
    //Introducimos los parametros de forma segura
    $resultado->bindParam(':search', $from_store);
    
    //Devolbemos la ejecucion de la consulta
    $resultado->execute();
    return $resultado->fetchAll(PDO::FETCH_ASSOC);
}

//Consulta usada en las paginas flag
//Vulnerable
function consulta_flag() {
    if (isset($_GET['flag'])) {
        $from_flag = $_GET['flag'];
    } else {
        $from_flag = '__FLAG__';
    }

    //Aqui no se ha usado bindParam, lo cual hace que se interprete el imput del usuario como codigo
    return $consulta = "SELECT * FROM flags WHERE flag = '$from_flag'";
}

/*
//Consulta usada en las paginas flag
//NO ES Vulnerable
function consulta_flag_bien($conexion) {
    if (isset($_GET['flag'])) {
        $from_flag = $_GET['flag'];
    } else {
        $from_flag = '__FLAG__';
    }

    //Aqui no se ha usado bindParam, lo cual hace que se interprete el imput del usuario como codigo
    $consulta = "SELECT * FROM flags WHERE flag = :flag";
    
    //Preparamos la consulta
    $resultado = $conexion->prepare($consulta);
    
    //Asignamos los parametros
    $resultado->bindParam(':flag', $from_flag);
    
    return $resultado->execute();
}*/
//Funciones de orden.php, tanto las no vulnerables como la vulnerable
//Devuelbe los datos de la tabla clientes
//NO ES VULNERABLE

function datos_clientes($conexion) {
    $consulta = "SELECT * FROM clientes";
    $resultado = $conexion->query($consulta);

    return $resultado->fetchAll(PDO::FETCH_ASSOC);
}

//Funciones de orden.php, tanto las no vulnerables como la vulnerable
//Devuelbe los datos de la tabla productos
//NO ES VULNERABLE

function datos_productos($conexion) {
    $consulta = "SELECT * FROM productos";
    $resultado = $conexion->query($consulta);

    return $resultado->fetchAll(PDO::FETCH_ASSOC);
}

//Devuelbe los datos de la tabla productos
//NO ES VULNERABLE
function datos_ordenes($conexion) {
    $consulta = "SELECT * FROM ordenes";
    $resultado = $conexion->query($consulta);

    return $resultado->fetchAll(PDO::FETCH_ASSOC);
}

//Sirve para introducir una orden a la base de datos
//NO es vulnerable como tal, sin embargo, deberia de usar htmlspecialchars para filtrar los datos que introduce a la base de datos
//para evitar XSS.
function registra_orden() {

    return $consulta = "INSERT INTO `ordenes` (`nombre`, `id_cliente`, `id_producto`)"
            . " VALUES (:nombre, :id_cliente, :id_producto);";
}

//Sirve para extraer datos tanto del cliente como del producto de una orden a partir de su nombre
//ES VULNERABLE, pues extrae datos de la tabla ordenes, que se almacenan sin cuidado, y no los sanitiza
//Para solucionar esta vulnerabilidad deberia de usar bind_param y htmlspecialchars

function todos_datos($conexion, $nombre) {
    $consulta = "SELECT o.id AS orden_id, o.nombre AS orden_nombre, 
                    p.id AS producto_id, p.nombre AS producto_nombre, p.status AS producto_status, 
                    c.id AS cliente_id, c.nombre AS cliente_nombre, c.direccion AS cliente_direccion 
                  FROM ordenes o "
            . "INNER JOIN productos p ON o.id_producto = p.id "
            . "INNER JOIN clientes c ON c.id = o.id_cliente "
            . "WHERE o.nombre = '$nombre'";

    $resultado = $conexion->query($consulta);

    return $resultado->fetch(PDO::FETCH_ASSOC);
}

//////////////////////////////////////////CROSS SITE SCRIPTING//////////////////////////////////////////////////
//La siguiente funcion introduce un mensaje a la base de datos, pero, lo hace sin usar htmlspecialchars, lo cual, la hace vulnerable a XSS
//VULNERABLE

function enviaMensaje($conexion, $email, $mensaje) {
    $consulta = "INSERT INTO `mensajes` (`email`, `mensaje`, `fecha`)"
            . " VALUES (:email, :mensaje, :fecha);";
    $fecha = date('Y-m-d');
    $resultado = $conexion->prepare($consulta);
    $resultado->bindParam(':email', $email);
    $resultado->bindParam(':mensaje', $mensaje);
    $resultado->bindParam(':fecha', $fecha);
    $resultado->execute();
}

//Devuelbe los datos de la tabla mensajes
//NO ES VULNERABLE
function mensajes($conexion) {
    $consulta = "SELECT * FROM mensajes";
    $resultado = $conexion->query($consulta);

    return $resultado->fetchAll(PDO::FETCH_ASSOC);
}
?>

