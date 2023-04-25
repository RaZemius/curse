<?php

namespace application\lib;

use application\lib\Config;

class styles
{
    static public function get($name)
    {
        echo '<link rel="stylesheet" href="' . Config::$appConfig['root_url'] . 'public/styles/' . $name . '.css">';
    }
    static public function setlink($page, $text, $sting = false)
    {
        $str =
        '<a href ="' . Config::$appConfig['root_url'] . $page . '">' . $text . '</a>';
        if (!$sting) {
            echo $str;
        }else{
            return $str;
        }
    }
    static public function setimg($id, $ret = false)
    {
        $format = null;
        $ah = Config::$appConfig['path'] . 'public/images/' . $id;
        $list = ['.png', '.jpg', '.jpeg', '.webp'];
        foreach ($list as $key) {
            if (file_exists($ah . $key)) {
                $format = $key;
                break;
            }
        }
        if ($format != null) {
            $str = '<img class = "img" src = "' . Config::$appConfig['root_url'] . 'public/images/' . $id . $format . '" width = "100%" height = "100%"></img>';
        } else {
            $str = '<img class = "img" src = "' . Config::$appConfig['root_url'] . 'public/images/' . $id . '" width = "100%" height = "100%"></img>';
        }
        if ($ret != false) {
            return $str;
        } else {
            echo $str;
        }
    }
    static function setProfImg($id, $link = true, $text = false)
    {
        $val = null;
        $format = null;
        $ah = Config::$appConfig['path'] . 'public/images/profiles/' . $id;
        $list = ['.png', '.jpg', '.jpeg', '.webp'];
        foreach ($list as $key) {
            if (file_exists($ah . $key)) {
                $format = $key;
                break;
            }
        }
        if ($format != null) {
            $val = '<div class = profimg-con><img class = "profimg" src = "' . Config::$appConfig['root_url'] . 'public/images/profiles/' . $id . $format . '"></img></div>';
        } else {
            $val = '<div class = profimg-con><img class = "profimg" src = "' . Config::$appConfig['root_url'] . 'public/images/profiles/default.jpg"></img></div>';
        }
        if ($text == false) {
            #здесь баг починить. нет линка при вызове через текст нежели echo
            if ($link == true) {
                styles::setlink('?p=' . $id, $val);
            } else {
                echo $val;
            }
        } else {
            return $val;
        }
    }

    static function setjs($name)
    {
        $path = Config::$appConfig['path'] . 'public/scripts/' . $name . '.js';
        if (file_exists($path) == true) {

            echo '<script>' . file_get_contents($path) . '</script>';
        }
    }
    static function genitems($array, $link = false)
    {
        $str = '';
        $str .= '<div class = items>';
        foreach ($array as $key) {
            if ($link != false) {
                $str .= '<a class = item href="?i=' . explode(':', $key['id'])[1] . '">';
            } else {
                $str .= '<div class = item>';
            }
            $str .= styles::setimg(explode(':', $key['id'])[1], true);
            unset($key['id'], $key['author'], $key['description']);
            $str .= '<div class = names>';
            foreach ($key as $part) {
                $str .= '<p>' . $part . '</p>';
            }
            $str .= '</div>';
            if ($link != false) {
                $str .= '</a>';
            } else {
                $str .= '</div>';
            }
        }
        $str .= '</div>';
        return $str;
    }
}
