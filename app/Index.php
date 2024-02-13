<?php /* copyright© Jhon S. Vique */

    // Traer Configiguracion General
    require_once 'Configuration/configuration.php';
    // Traer Modelo Principal
    require_once 'Model/IndexModel.php';
    // Se usa funcion para evitar usar requiere cada vez que se cargue la URL
    spl_autoload_register(function($nombre){
        $filename = strtolower($nombre) . '.php';
        $file = '../app/Core/'.$filename;
        if ( file_exists($file) ) {
            require_once $file;
        }else{
            echo 'Archivo no encontrado'.$file;
        }
    });


?>