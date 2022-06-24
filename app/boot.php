<?php 

/* System Settings */
require_once '../config.php';

/* Database Crud */
require_once 'library/crud.php'; 

/* mvc Structure */
require_once 'system/routeApp.php';

spl_autoload_register(function($e){
    if(file_exists($file = PATH_APP."/model/{$e}.php")){
        require_once $file;
    }
});

require_once 'controller/mainController.php';

/* */
require_once 'route.php';


/* */
$Route = new Route();


