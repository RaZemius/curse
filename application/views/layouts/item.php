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
    <div class = container>
    <div class = left></div>
    <div class = main>
    <?php
    echo '<h1>'.$data['name'].'</h1>';
    $str = '';
    foreach ($data['tags'] as $key => $value) {
        '<div class = tag>'.$key.'</div>';
    }
    echo $str;
    echo '<p>'.$data['description'].'</p>';
    styles::setimg(explode('items:', $data['id'])[1]);
    ?>
    </div>
    <div class = right>
    <?php
    styles::setProfImg($user['id']); 
    styles::setlink('?p='.$user['id'], $user['nick']);

    ?>
    </div>
    </div>
</body>

</html>