<!DOCTYPE html>
<html>

<head>
    <?php

    use application\lib\Config;
    use application\lib\styles;

    styles::get('style');
    styles::get('items');

    styles::get('profile');
    styles::get('smal_img');
    styles::get('buttons');
    ?>
</head>

<body>
    <section id=main>
        <div class=big>
            <?php echo $content; ?>
        </div>
        <div class=menu>

            <div class=but><?php styles::setlink('', 'go back to main') ?></div>
            <div class=but><?php styles::setlink('profile', 'page') ?></div>
            <div class=but><?php styles::setlink('profile/create', 'create') ?></div>
            <div class=but><?php styles::setlink('profile/chats', 'chats') ?></div>
            <div class=but><?php styles::setlink('profile/story', 'cart'); ?></div>
            <div class=but><?php styles::setlink('profile/settings', 'settings') ?></div>
            <div class=but><?php styles::setlink('profile/exit', 'exit') ?></div>
        </div>
    </section>
    <script>
        let target = document.querySelectorAll('a')
        target.forEach(element => {

            let url = element.href
            if (url == document.URL) {
                element.outerHTML = '<p>' + element.outerText + '</p>'
            }
        });
    </script>
</body>

</html>