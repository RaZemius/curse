<!DOCTYPE html>
<html>

<head>
    <?php

    use application\lib\Config;
    use application\lib\styles;

    styles::get('items');
    styles::get('profile');
    styles::get('buttons');
    ?>
</head>

<body>
    <section id=main>
        <div class=big>
            <?php echo $content; ?>
        </div>
        <div class=menu>
            <div class=but><?php styles::setlink('profile', 'page') ?></div>
            <div class=but><?php styles::setlink('profile/story', 'cart'); ?></div>
            <div class=but><?php styles::setlink('profile/chats', 'chats') ?></div>
            <div class=but><?php styles::setlink('profile/settings', 'settings') ?></div>
            <div class=but></div>
            <div class=but></div>
        </div>
    </section>
    <script>
        let target = document.querySelectorAll('a')
        console.log(target);
        target.forEach(element => {

            let url = element.href
            if (url == document.URL) {
                element.outerHTML = '<p>' + element.outerText + '</p>'
            }
        });
    </script>
</body>

</html>