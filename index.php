<?php
require 'application/lib/Autoloader.php';
use application\lib\Debug;
use application\lib\Config;
use application\core\Router;

Autoloader::register();
session_start();
Config::init();
try{
$router = new Router();
$router->run();
        } catch (Throwable $th) {
            echo '<a>'.$th->getMessage().'</a></br>';
            echo '<a>'.$th->getFile().'</a>';
            echo '<a>'.$th->getLine().'</a>';
            $var = explode('#', $th->getTraceAsString());
            foreach ($var as $key => $value) {
                echo explode(Config::$appConfig['path'],$value)[1].'<br>';
            }
            /*
            $var = $th->getTrace();
            foreach ($var as $key => $value) {
                echo $value['file'].'<br>';
            }*/
        }