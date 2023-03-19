<?php

namespace application\models;
use application\core\Model;

class Account extends Model
{

    // public function getNews() {
    // 	$result = $this->db->row('SELECT title, description FROM news');
    // 	return $result;
    // }
    public function get_user($id)
    {
        return $this->db->query('SELECT nick, id, json from users where id = "'.$id.'"')[0]['result'][0];
    }
    public function get_user_items($id){
        return $this->db->query('select value, name from items where author = "'.$id.'"')[0]['result'];
    }
    public function get_settings($user_id){
        return $this->db->query('select json from users where id="'.$user_id.'"');
    }
    public function setToken($user_id)
    {
        $val = $this->db->query('create tokens set time = time::now(), user = '.$user_id)[0]['result'][0]['id'];
        $val = substr($val, 7);
        return $val;
    }
    public function getarraydata(array $pointers_array)
    {
        $query = 'select value, author, name from ';
        foreach($pointers_array as $key){
            $query = $query.$key.', '; 
        }
        echo $query;
        return $this->db->query($query)[0]['result'];
    }
    public function getcart($id)
    {
        return $this->db->query('select * from customers where customer = "'.$id.'"')[0]["result"][0];
    }

}
