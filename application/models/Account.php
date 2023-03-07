<?php

namespace application\models;

use application\core\Model;

class Account extends Model
{

    // public function getNews() {
    // 	$result = $this->db->row('SELECT title, description FROM news');
    // 	return $result;
    // }
    public function get_databy($id)
    {
        return $this->db->query('SELECT * from users where id = '.$id);
    }
    public function get_userid($email){
        $this->db->query('select id from users where email = "'.$email.'"');
    }
    public function getby_atrib($dict)
    {
        $str ='';
        $names = array_keys($dict);
        foreach ($dict as $key => $value) {
            echo 'value:'.$value;
            echo 'name:'.$dict[$key];
        }
    }
    public function check_auth($user, $pass){
        $macth = [];
        if (preg_match('/^.*@.*\..*$/', $user, $macth) == 1){
            $data =$this->db->query('SELECT * from users where email = "'.$user.'" and password ="'.$pass.'"')[0];
        } else
        {$data =$this->db->query('SELECT * from users where nick = "'.$user.'" and password ="'.$pass.'"')[0];}
            if (count($data['result']) == 1) {
                return $data['result'][0]['id'];
            } else {return false;}
        
    }
    public function checkToken($token)
    {
        $res = $this->db->query('select user from tokens:'.$token)[0]['result'];
        if ($res != null)
        {return true;}
        else
        {return false;}
    }
    public function setToken($user_id)
    {
        $val = $this->db->query('create tokens set time = time::now(), user = '.$user_id)[0]['result'][0]['id'];
        $val = substr($val, 7);
        return $val;
    }
    public function set_data(){}
    public function eddit(){}
    
}
