<?php
namespace application\core;
use application\lib\Database;


include 'application/lib/vendor/autoload.php';
use MathisBurger\SurrealDb\SurrealDriver;

abstract class Model{
    public $db;

    public function Cookiecheck(){
        $id = false;
        if (array_key_exists('user',$_COOKIE) == true && array_key_exists('token',$_COOKIE) == true)
        {
            $id = $this->Check_user(urldecode($_COOKIE['user']));
            if($res = $this->checkToken($_COOKIE['token']) == $id)
            {return $id;}
            else
            { echo($id.'.'.$res);return false;}
        }
        return false;
    }
    public function check_auth($user, $pass){
        $macth = [];
        if (preg_match('/^.*@.*\..*$/', $user, $macth) == 1){
            $data =$this->db->query('SELECT * from users where email = "'.$user.'" and password ="'.$pass.'"')[0];
        } else
        {$data =$this->db->query('SELECT * from users where nick = "'.$user.'" and password ="'.$pass.'"')[0];}
        if (count($data['result']) == 1) {
        return $data['result'][0]['id'];}
        else 
        {return false;}
    }
    public function checkToken($token)
    {
        $res = $this->db->query('select user from tokens:'.$token)[0]['result'];
        if ($res != null)
        {return $res[0]['user'];}
        else
        {return false;}
    }

    public function Check_user($id){
        $macth = [];
        $data = false;
        try{
        if (preg_match('/^.*@.*\..*$/', $id, $macth) == 1){
            $data = $this->db->query('select id from users where email ="'.$id.'"')[0]['result'][0]['id'];
        } else {
            $data = $this->db->query('select id from users where id ="'.$id.'"')[0]['result'][0]['id'];
        }
        } catch (\Throwable $th){
            return false;
        }
        return $data;

    }
    public function RandomString()
    {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randstring = '';
    for ($i = 0; $i < 15; $i++) {
        $randstring = $characters[rand(0, strlen($characters))];
    }
    return $randstring;
}
    function __construct(){
        //$this->db = new Database();
        $this->db = null;
        $this->db = new SurrealDriver('ws://127.0.0.1:8000/rpc');
        $this->db->login('root','root');
        $this->db->useDatabase('shop','main');   
    }
}