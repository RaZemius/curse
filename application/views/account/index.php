<?php
use application\lib\styles;
styles::get('profimg');
styles::setProfImg(explode(':', $profile['id'])[1], false);
echo '<p>' . $profile['nick'] . '</p>';
echo '<p>UUID: ' . $profile['id'] . '</p>';
if (count($items) != 0) {
    echo '<p>you have created this items in shop</p>';
    echo styles::genitems($items, true);
} else {
    echo '<p>hmmm... list empty</p>';
}
