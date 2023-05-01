<?php

namespace application\models;
use application\core\Model;

class Datareq extends Model
{
    public function get_item($word)
    {
        $this->del_char($word);
        $match = $this->db->query('select * from items where name ~? "'.$word.'"');
        return $match;
    }
    public function create_item($str, $arr)
    {
        return $this->db->create($str, $arr);
    }
    public function makevote(&$obj){
        if(array_key_exists('item', $obj) && array_key_exists('id', $obj) && array_key_exists('value',$obj)){
            return $this->db->create('votes', $obj);
        }
        else{
            return false;
        }
        
    }

    public function create_cart(&$items, &$full_uid)
    {
        $str = '';
        $len =count($items);
        for ($i=0; $i < $len; $i++) { 
            $str .= '"'.$items[$i].'"';
            if($i != $len)
            {
                $str .= ',';
            }
        }
        return $this->db->query('create customers set customer = "'.$full_uid.'", reg_time = time::now(), item = ['.$str.']')[0]['result'][0];
    }
    public function run($str)
    {
        return $this->db->query($str);
    }
    public function getuser($id){
        return $this->db->query('select id, nick from users where id = "'.$id.'"');
    }
}