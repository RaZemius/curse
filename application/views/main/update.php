

<?php
//var_dump($data);
if ($data['status'] == 'OK' && count($data['result']) != 0 ){
echo '<div class = items>';
foreach($data['result'] as $list){
    echo'<div class = item>';
    echo '<a>'.$list['name'].'</a>';
    echo '<a>'.$list['value'].'</a>';
    echo '<a>author '.$list['author']['nick'].'</a>';
    echo '</div>';
}
echo '</div>';
}
else{
    echo 'ops...';
}