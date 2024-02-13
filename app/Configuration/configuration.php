<?php /* copyright© Jhon S. Vique */
    $env = parse_ini_file('../.env');

    define('RUTA_URL', 'http://'.$_SERVER['HTTP_HOST'].'/'.$env['APP_NAME'].'/');
    define('RUTA_APP', dirname(dirname(__FILE__)));
    define('NAME', $env['APP_NAME']);

    /*Nombre del servidor*/
    define('HOST', $env['DB_HOST']);
    /*Nombre de la base de datos*/
    define('DBNAME', $env['DB_DATABASE']);
    /*Nombre del usuario*/
    define('USER', $env['DB_USERNAME']);
    /*Contraseña del usuario*/
    define('PASSWORD', $env['DB_PASSWORD']);

    /*Charset BD*/
    define('DBCHARSET', $env['DB_CHARSET']);

    /*Motor Base de datos*/
    define('DRIVERBD', $env['DB_CONNECTION']);
?>