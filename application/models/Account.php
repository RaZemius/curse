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
        return $this->db->query('SELECT nick, id from users where id = "'.$id.'"')[0]['result'];
    }
    public function get_userid($email){
        $this->db->query('select id from users where email = "'.$email.'"');
    }
    public function setToken($user_id)
    {
        $val = $this->db->query('create tokens set time = time::now(), user = '.$user_id)[0]['result'][0]['id'];
        $val = substr($val, 7);
        return $val;
    }
}
