<?php
namespace application\core;
use application\lib\Database;
use application\lib\SurrealDriver;
abstract class Model{
    public $db;
    function __construct(){
        //$this->db = new Database();
        $this->db = new SurrealDriver('http://localhost:8080');
        $this->db->login('root','root');
        $this->db->useDatabase('shop','main');   
    }
}