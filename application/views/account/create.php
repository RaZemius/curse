<?php

use application\lib\Config;
use application\lib\styles;

styles::get('forms');


echo '<script> let path = "' . Config::$appConfig['root_url'] . 'data/create/item"</script>';




?>
<form name='panic' onsubmit="run(this);return false;">
    <input type="text" name="name" id="" placeholder="name of item" class=form required>

    <textarea name="description" id="huge" class="form" placeholder= "любое описание что хотите"></textarea>
    <input type="text" name='tags' placeholder="разделять с #" class=form>
    <input type="text" name="value" placeholder="цена" class=form required>
    <input type="file" name="img" class=form>
    <input type="submit" value="create" class="form create">

</form>
<?php

styles::setjs('post');
styles::setjs('create_item');
?>