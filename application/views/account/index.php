<?php
use application\lib\styles;
echo '<div class = user>'.
styles::setProfImg(explode(':', $profile['id'])[1], false, true).
'<div id = utext><p>' . $profile['nick'] . '</p>'.
'<p>UUID: ' . $profile['id'] . '</p>
</div></div>';

if (count($items) != 0) {
    echo '<p>you have created this items in shop</p>';
    echo styles::genitems($items, true);
} else {
    echo '<p>hmmm... list empty</p>';
}
