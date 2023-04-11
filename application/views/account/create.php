<?php

use application\lib\Config;
use application\lib\styles;

styles::get('forms');


echo '<script> let path = "' . Config::$appConfig['root_url'] . 'data/create/item"</script>';




?>
<form name='panic' onsubmit="run(this);return false;">
    <input type="text" name="name" id="" placeholder="name of item" class=form>
    <input type="text" name="description" id="huge" placeholder="any description" class=form>
    <input type="text" name='tags' placeholder="tags separate with #" class=form>
    <input type="text" name="value" class=form>
    <input type="file" name="img" class = form>
    <input type="submit" value="item" class=form>

</form>
<?php

styles::setjs('post');
styles::setjs('create_item');
?>
