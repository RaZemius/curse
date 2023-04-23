<!DOCTYPE html>
<html>

<head>
    <?php

    use application\lib\styles;
    use application\lib\Config;

    styles::get('style');
    styles::get('top');
    styles::get('item_show');
    styles::get('tag');
    styles::get('profimg');
    ?>

    <title><?php echo $title; ?></title>
</head>

<body>
    <div class=container>
        <div class=main>
            <?php
            echo '<h1>' . $data['name'] . '</h1>';
            $str = '';
            if (array_key_exists('tags', $data)) {
                $str .= '<div class = tags>';
                foreach ($data['tags'] as $key => $value) {
                    $str .= '<div class = tag>#' . $value . '</div>';
                }
                $str .= '</div>';
            } else {
                $str = '<div class = tag>no tags</div>';
            }
            echo $str;
            echo '<p>' . $data['description'] . '</p>';
            styles::setimg(explode(':', $data['id'])[1]);
            ?>
        </div>
        <div class=right>
            <?php
            styles::setProfImg($user['id']);
            styles::setlink('?p=' . $user['id'], $user['nick']);

            $str = '<div class = comments>';
            if (count($data['votes']) > 0) {
                $len = 0;
                $mid = 0;
                foreach ($data['votes'] as $val) {
                    $mid += $val['value'];
                    if (array_key_exists('comment', $val)) {
                        $str .= '<p>user ' . explode(':',$val['user'])[1] . '</p><p>' . $val['comment'] . '</p>';
                    }
                    $len++;
                }
                echo 'votes ' . $len . '</br>';
                echo 'average ' . $mid / $len;
            } else {
                echo 'looks like nobody voted yet';
            }
            echo $str ;
            ?>
        </div>
    </div>
</body>

</html>