<?php
namespace application\core;
use application\lib\Database;


include 'application/lib/vendor/autoload.php';
use MathisBurger\SurrealDb\SurrealDriver;

abstract class Model{
    public $db;
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