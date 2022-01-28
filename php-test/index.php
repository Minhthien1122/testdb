<?php

define('ENV', 'development');

require('config.php');
require('core/functions.php');

if (ENV == 'development'){
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    set_error_handler('showError');
}

//load third party libraries
if (file_exists('vendor/autoload.php')){
    require('vendor/autoload.php');
}

$autoloads = [
    'Database',
    'Controller',
    'Model',
    'Request'
];

foreach($autoloads as $file){
    require('core/'.$file.'.php');
}

$request = new request();
$controllerName = $request->get('controller').'Controller';
$methodName = $request->method;

if ( ! file_exists('controllers/'.$controllerName.'.php')){
    show404Error();
}

//create database
$databaseDriverName = $config['database']['driver'].'Driver';
require('libraries/database_drivers/'.$databaseDriverName.'.php');
$database = new $databaseDriverName();

//create controller
require('controllers/'.$controllerName.'.php');
$controller = new $controllerName($database);

if ( ! method_exists($controller, $methodName)){
    show404Error();  
}

$controller->{$methodName}();


?>