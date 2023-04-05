<?php use application\lib\styles;
styles::get('forms');

?>
<form method="post">
    <input type="text" name="name" id="" placeholder="name of item" class = form>
    <input type="text" name="description" id="huge" placeholder="any description" class = form>
    <input type="text" name = 'tags', placeholder = "tags separate with #" class = form>
    <input type="submit" value="item" class = form>

</form>
<?php
styles::setjs('create item');

?>