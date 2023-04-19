<!DOCTYPE html>
<html>

<head>
    <?php
    use application\lib\styles;
    use application\lib\Config;
    styles::get('style');
    styles::get('smal_img');
    styles::get('item_show');
    styles::get('top');
    styles::get('items');
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
    if (array_key_exists('description', $data))
    {echo '<p>'.$data['description'].'</p>';}
    else
    {echo '<p>hmmm description empty</p>';}
    if(array_key_exists('time', $data)) {
        echo $data['time'];
    }
    if(count($items) >0){
        echo '<p>'.$data['nick'].' created this items</p>';
        echo styles::genitems($items, true);
    } else{
        echo '<p>no items have been created</p>';
    }
    ?>
    </div>
    <div class = right>
    </div>
    </div>
</body>

</html>