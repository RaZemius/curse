<?php use application\lib\styles;
use application\lib\Config;

if ($list != false) {
	echo '<div class = items>';
    foreach ($list as $post) {
        echo '<a class = link href="' . Config::$appConfig['root_url'] . '?i=' . explode('items:', $post['id'])[1] . '">';
        echo "<div class='item'>";
        echo '<p>' . $post["name"] . '</p>' . '<div class=imgcon>' . styles::setimg(explode('items:', $post['id'])[1]) . '</div>';
        echo '<p>' . $post["value"] . '</p>';
        echo '<p>author ' . $post["author"] . '</p>';
        echo '</div>';
        echo '</a>';
    }
	echo '</div>';
} else {
    echo 'its fully empty';
}