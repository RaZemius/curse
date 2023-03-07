<?php
require 'application/lib/Autoloader.php';
use application\lib\Debug;
use application\lib\Config;
use application\core\Router;

Autoloader::register();

session_start();

Config::init();
try{
$debug = new Debug();
$router = new Router();
//var_dump($_POST);
$router->run();
        } catch (Throwable $th) {
            echo '<a>'.$th->getMessage().'</a></br>';
            echo '<a>'.$th->getFile().'</a>';
            echo '<a>'.$th->getLine().'</a>';
            echo '<p>'.$th->getTraceAsString().'</p>';
        }