<?php
namespace application\core;
use application\lib\Database;


include 'application/lib/vendor/autoload.php';
use MathisBurger\SurrealDb\SurrealDriver;

abstract class Model{
    public $db;
    function __construct(){
        //$this->db = new Database();
        $this->db = new SurrealDriver('ws://127.0.0.1:8000/rpc');
        $this->db->login('root','root');
        $this->db->useDatabase('shop','main');   
    }
}