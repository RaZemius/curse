<?php

namespace application\models;

use application\core\Model;

class Account extends Model
{

    // public function getNews() {
    // 	$result = $this->db->row('SELECT title, description FROM news');
    // 	return $result;
    // }
    public function getuser_prof($id)
    {
        return $this->db->query('SELECT * from users where id = {$id}');
    }
    public function check_auth($user, $pass){
        if (preg_match('/^.*@.*\..*$/', $user, $macth) == 1){
            $data =$this->db->query('SELECT from users where email = "'.$user.'" and password ="'.$pass.'"');
        } else
        {$data =$this->db->query('SELECT from users where id = "'.$user.'" and password ="'.$pass.'"');}
        
        if (count($data['result']) == 1)
        {return true;}
        else
        {return false;}
    }
    public function checkToken($token)
    {
        $res = $this->db->query('select token.id from tokens:'.$token)['result'];
        if ($res['token'] == $token)
        {return true;}
        else
        {return false;}
    }
    public function setToken($user_id)
    {
        return $this->db->query('create tokens set users:'.$user_id)['result']['id'];
    }
    public function set_data(){}
    public function eddit(){}
    
}
