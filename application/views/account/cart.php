<?php

use application\lib\styles;
use application\lib\Config;

if ($cart != false) {
    $str = '';
    $str .= '<div class = cart>';
    foreach ($cart as $list) {
        $str.='<div class = items>';

        foreach ($list['item'] as $post) {
            $str .= '<a class = link href="' . Config::$appConfig['root_url'] . '?i=' . explode('items:', $post['id'])[1] . '">';
            $str .= "<div class='item'>";
            $str .= '<p>' . $post["name"] . '</p>' . '<div class=imgcon>' . styles::setimg(explode('items:', $post['id'])[1], true) . '</div>';
            $str .= '<p>' . $post["value"] . '</p>';
            $str .= '<p>author ' . $post["author"] . '</p>';
            $str .= '</div>';
            $str .= '</a>';
        }
        $str.='</div>';
    }
    $str .= '</div>';
} else {
    $str .= 'its fully empty';
}
echo $str;