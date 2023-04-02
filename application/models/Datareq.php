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
    public function create_item()
    {
    }

    public function create_cart()
    {
    }
    public function run($str)
    {
        return $this->db->query($str);
    }
    public function getuser($id){
        return $this->db->query('select id, nick from users where id = "'.$id.'"');
    }
}