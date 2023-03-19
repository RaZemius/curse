<?php
namespace application\lib;
use application\lib\Config;
class styles{
    static public function get($name)
    {
        echo '<link rel="stylesheet" href="'.Config::$appConfig['root_url'].'public/styles/'.$name.'.css">';
    }
    static public function setlink($page, $text){
        echo '<a href ="'.Config::$appConfig['root_url'].$page.'">'.$text.'</a>';
    }
}