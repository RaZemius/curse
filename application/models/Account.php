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
        $query = 'select value, author, name, id, author.nick from ';
        $size = count($pointers_array);
        for ($i=0; $i < $size; $i++) { 
            $query = $query.$pointers_array[$i];
            if ($i < $size-1)
            {$query = $query.', ';}
        }
        return $this->db->query($query)[0]['result'];
    }
    public function getcart($id)
    {
        $data= $this->db->query('select * from customers where customer = "'.$id.'"');

        if(array_key_exists(0, $data[0]['result']) ){
            return $data[0]['result'][0];
        } else {
            return false;
        }
    }
    public function createuser($pass, $nick, $email)
    {
        $pass = $this->del_char($pass);
        $nick = $this->del_char($nick);
        $email = $this->del_char($email);
        return $this->db->query('create users set nick = "'.$nick.'", email = "'.$email.'", password = "'.$pass.'"')[0]['result'][0];

    }
    public function deltoken($id)
    {
        echo $id;
        $this->db->query('delete tokens where user = '.$id);
    }
    public function getchats($id)
    {
        return $this->db->query('select * from chats where writer = "'.$id.'" or adress = "'.$id.'"');
    }

}
