<?php
echo '<p>' . $profile['nick'] . '</p>';
echo '<p>UUID: ' . $profile['id'] . '</p>';
if (count($items) != 0) {
    echo '<p>you have created this items in shop</p>';

    echo '<div class = items>';
    foreach ($items as $key) {
        echo '<div class = item>';
        foreach ($key as $part) {
            echo '<p>' . $part . '</p>';
        }
        echo '</div>';
    }
    echo '</div>';
} else {
    echo '<p>hmmm... list empty</p>';
}
