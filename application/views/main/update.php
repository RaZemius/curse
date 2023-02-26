

<?php
var_dump($data);
if ($data['status'] == 'OK' && count($data['result']) != 0 ){
echo '<div class = items>';
foreach($data['result'] as $list){
    echo '<p>'.$list['name'].'</p';
    echo '<p>'.$list['value'].'</p>';
    echo '<p>'.$list['author']['nick'].'</p>';
}
echo '</div>';
}
else{
    echo 'ops...';
}