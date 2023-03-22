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
    static public function setimg($id){
        $format = null;
        $ah = Config::$appConfig['path'] . 'public/images/' . $id ;
        $list = ['.png', '.jpg', '.jpeg', '.webp'];
        foreach ($list as $key) {
            if(file_exists($ah.$key)){
                $format = $key;
                break;
            }
        }
        if($format != null)
        {echo '<img class = "img" src = "'.Config::$appConfig['root_url'].'public/images/'.$id.$format.'" width = "100%" height = "100%"></img>';}
        else
        {echo '<p>no such image found</p>';}
        
    }
}