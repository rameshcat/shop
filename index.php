<?php
/**
 * Created by PhpStorm.
 * User: roma
 * Date: 17.04.19
 * Time: 0:31
 */
define('ROOT', dirname(__FILE__));
ini_set('display_errors', 'on');
error_reporting(E_ALL);
session_start();

spl_autoload_register(function ($class) {

    $file = ROOT . '/components/' . $class . '.php';

    if (file_exists($file)) {
        include_once $file;
    } else {
        $file = ROOT . '/models/' . $class . '.php';
        if (file_exists($file)) {
            include_once $file;
        }
    }
});

$router = new Router();
$router->run();