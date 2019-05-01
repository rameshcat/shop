<?php
/**
 * Created by PhpStorm.
 * User: roma
 * Date: 17.04.19
 * Time: 0:31
 */


ini_set('display_errors', 'on');
error_reporting(E_ALL);

define('ROOT', dirname(__FILE__));
require_once (ROOT.'/components/Router.php');
require_once (ROOT.'/components/Db.php');

session_start();

$router = new Router();
$router->run();