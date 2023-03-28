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
    ?>
    <title><?php echo $title; ?></title>
</head>

<body>

    <div class=container>
        <div class=left></div>
        <div class=main></div>

</body>


</html>