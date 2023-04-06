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
    styles::setProfImg (explode(':', $data['id'])[1]);
    echo '<h1>'.$data['nick'].'</h1>';
    if (array_key_exists('tags', $data ))
    {echo '<p>'.$data['description'].'</p>';}
    else
    {echo '<p>hmmm description empty</p>';}
    if(array_key_exists('time', $data)) {
        echo $data['time'];
    }
    ?>
    </div>
    <div class = right>
    </div>
    </div>
</body>

</html>