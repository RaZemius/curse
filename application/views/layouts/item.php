<!DOCTYPE html>
<html>

<head>
    <?php

use application\core\View;
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
            echo '<button id="cart-add" value ="' . $data['id'] . '">buy this</button>';
            if ($token != false){
                echo '<script>adress = "'.Config::$appConfig['root_url'].'data/create/vote"</script>';
                echo '<form class = new-comment id= form onsubmit="post()">aaa</form>';
                styles::setjs('create_vote');
            } else{
                echo 'you have no access to this';
            }
            $str = '<div class = comments>';
            if (count($data['votes']) > 0) {
                $len = 0;
                $mid = 0;
                foreach ($data['votes'] as $val) {
                    $mid += $val['value'];
                    if (array_key_exists('comment', $val)) {
                        $str .= '<div class = item><div class = item-body >'.styles::setProfImg(explode(':', $val['user'])[1], true, true)
                        .'<div class = item-text><p>user ' . explode(':',$val['user'])[1] . '</p>
                        <p>value of comment '.$val['value'].'</p></div></div>
                       <p>' . $val['comment'] . '</p></div>';
                    }
                    $len++;
                }
                echo 'votes ' . $len . '</br>';
                echo 'average ' . $mid / $len;
            } else {
                echo 'looks like nobody voted yet';
            }
            echo $str.'</div>';
            styles::setjs('carthandler');
            ?>
        </div>
    </div>
</body>

</html>