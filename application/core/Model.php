<?php
namespace application\core;
use application\lib\Database;


include 'application/lib/vendor/autoload.php';
use MathisBurger\SurrealDb\SurrealDriver;

abstract class Model{
    public $db;

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